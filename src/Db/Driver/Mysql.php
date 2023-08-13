<?php declare(strict_types=1);

/**
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2023 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto\Db\Driver;

use Amp\Mysql\MysqlConfig;
use Amp\Mysql\MysqlConnectionPool;
use Amp\Sync\LocalKeyedMutex;
use danog\MadelineProto\Exception;
use danog\MadelineProto\Logger;
use danog\MadelineProto\Settings\Database\Mysql as DatabaseMysql;
use PDO;
use Throwable;

/**
 * MySQL driver wrapper.
 *
 * @internal
 */
final class Mysql
{
    /** @var array<list{MysqlConnectionPool, \PDO}> */
    private static array $connections = [];

    private static ?LocalKeyedMutex $mutex = null;
    /** @return list{MysqlConnectionPool, \PDO} */
    public static function getConnection(DatabaseMysql $settings): array
    {
        self::$mutex ??= new LocalKeyedMutex;
        $dbKey = $settings->getKey();
        $lock = self::$mutex->acquire($dbKey);

        try {
            if (!isset(self::$connections[$dbKey])) {
                $config = MysqlConfig::fromString('host='.\str_replace('tcp://', '', $settings->getUri()))
                    ->withUser($settings->getUsername())
                    ->withPassword($settings->getPassword())
                    ->withDatabase($settings->getDatabase());

                self::createDb($config);

                $host = $config->getHost();
                $port = $config->getPort();
                if (!\extension_loaded('pdo_mysql')) {
                    throw Exception::extension('pdo_mysql');
                }

                self::$connections[$dbKey] = [
                    new MysqlConnectionPool($config, $settings->getMaxConnections(), $settings->getIdleTimeout()),
                    new PDO(
                        "mysql:host={$host};port={$port};charset=UTF8",
                        $settings->getUsername(),
                        $settings->getPassword(),
                    )
                ];
            }
        } finally {
            $lock->release();
        }

        return self::$connections[$dbKey];
    }

    private static function createDb(MysqlConfig $config): void
    {
        try {
            $db = $config->getDatabase();
            $connection = new MysqlConnectionPool($config->withDatabase(null));
            $connection->query("
                    CREATE DATABASE IF NOT EXISTS `{$db}`
                    CHARACTER SET 'utf8mb4' 
                    COLLATE 'utf8mb4_general_ci'
                ");
            try {
                $max = (int) $connection->query("SHOW VARIABLES LIKE 'max_connections'")->fetchRow()['Value'];
                if ($max < 100000) {
                    $connection->query("SET GLOBAL max_connections = 100000");
                }
            } catch (Throwable) {
            }
            $connection->close();
        } catch (Throwable $e) {
            Logger::log($e->getMessage(), Logger::ERROR);
        }
    }
}
