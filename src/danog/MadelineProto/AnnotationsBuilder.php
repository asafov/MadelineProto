<?php

/**
 * AnnotationsBuilder module.
 *
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2020 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto;

use Amp\Promise;
use danog\MadelineProto\Settings\TLSchema;
use danog\MadelineProto\TL\TL;
use danog\MadelineProto\TL\TLCallback;
use Generator;
use phpDocumentor\Reflection\DocBlockFactory;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionUnionType;

class AnnotationsBuilder
{
    /**
     * Reflection classes.
     */
    private array $reflectionClasses = [];
    /**
     * Logger.
     */
    private Logger $logger;
    /**
     * Namespace.
     */
    private string $namespace;
    /**
     * TL instance.
     */
    private TL $TL;
    /**
     * Settings.
     */
    private array $settings;
    /**
     * Output file.
     */
    private string $output;
    public function __construct(Logger $logger, array $settings, string $output, array $reflectionClasses, string $namespace)
    {
        $this->reflectionClasses = $reflectionClasses;
        $this->logger = $logger;
        $this->namespace = $namespace;
        /** @psalm-suppress InvalidArgument */
        $this->TL = new TL(new class($logger) {
            public Logger $logger;
            public function __construct(Logger $logger)
            {
                $this->logger = $logger;
            }
        });
        $tlSchema = new TLSchema;
        $tlSchema->mergeArray($settings);
        $this->TL->init($tlSchema);
        $this->settings = $settings;
        $this->output = $output;
    }
    public function mkAnnotations(): void
    {
        Logger::log('Generating annotations...', Logger::NOTICE);
        $this->setProperties();
        $this->createInternalClasses();
    }
    /**
     * Open file of class APIFactory
     * Insert properties
     * save the file with new content.
     */
    private function setProperties(): void
    {
        Logger::log('Generating properties...', Logger::NOTICE);
        $fixture = DocBlockFactory::createInstance();
        $class = new ReflectionClass($this->reflectionClasses['APIFactory']);
        $content = \file_get_contents($filename = $class->getFileName());
        foreach ($class->getProperties() as $property) {
            if ($raw_docblock = $property->getDocComment()) {
                $docblock = $fixture->create($raw_docblock);
                if ($docblock->hasTag('internal')) {
                    $content = \str_replace("\n    ".$raw_docblock."\n    public \$".$property->getName().';', '', $content);
                }
            }
        }
        foreach ($this->TL->getMethodNamespaces() as $namespace) {
            $content = \preg_replace('/(class( \\w+[,]?){0,}\\n{\\n)/', '${1}'."    /**\n"."     * @internal this is a internal property generated by build_docs.php, don't change manually\n"."     *\n"."     * @var {$namespace}\n"."     */\n"."    public \${$namespace};\n", $content);
        }
        \file_put_contents($filename, $content);
    }
    /**
     * Create internalDoc.
     */
    private function createInternalClasses(): void
    {
        Logger::log('Creating internal classes...', Logger::NOTICE);
        $handle = \fopen($this->output, 'w');
        \fwrite($handle, "<?php namespace {$this->namespace}; class InternalDoc extends APIFactory {}");
        $class = new ReflectionClass($this->reflectionClasses['API']);
        $methods = $class->getMethods(ReflectionMethod::IS_STATIC | ReflectionMethod::IS_PUBLIC);
        $ignoreMethods = ['fetchserializableobject'];
        foreach ($methods as $method) {
            $ignoreMethods[$method->getName()] = $method->getName();
        }
        $class = new ReflectionClass(TLCallback::class);
        $methods = $class->getMethods(ReflectionMethod::IS_STATIC | ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method) {
            $ignoreMethods[$method->getName()] = $method->getName();
        }
        \fclose($handle);
        $handle = \fopen($this->output, 'w');
        $internalDoc = [];
        foreach ($this->TL->getMethods()->by_id as $id => $data) {
            if (!\strpos($data['method'], '.')) {
                continue;
            }
            [$namespace, $method] = \explode('.', $data['method']);
            if (!\in_array($namespace, $this->TL->getMethodNamespaces())) {
                continue;
            }
            $internalDoc[$namespace][$method]['title'] = \str_replace(['](../', '.md'], ['](https://docs.madelineproto.xyz/API_docs/', '.html'], Lang::$lang['en']["method_{$data['method']}"] ?? '');
            $type = \str_ireplace(['vector<', '>'], [' of ', '[]'], $data['type']);
            foreach ($data['params'] as $param) {
                if (\in_array($param['name'], ['flags', 'flags2', 'random_id', 'random_bytes'])) {
                    continue;
                }
                if ($param['name'] === 'data' && $type === 'messages.SentEncryptedMessage') {
                    $param['name'] = 'message';
                    $param['type'] = 'DecryptedMessage';
                }
                if ($param['name'] === 'chat_id' && $data['method'] !== 'messages.discardEncryption') {
                    $param['type'] = 'InputPeer';
                }
                if ($param['name'] === 'hash' && $param['type'] === 'int') {
                    $param['pow'] = 'hi';
                    $param['type'] = 'Vector t';
                    $param['subtype'] = 'int';
                }
                $stype = 'type';
                if (isset($param['subtype'])) {
                    $stype = 'subtype';
                }
                $ptype = $param[$stype];
                switch ($ptype) {
                    case 'true':
                    case 'false':
                        $ptype = 'boolean';
                }
                $ptype = $stype === 'type' ? $ptype : "[{$ptype}]";
                $opt = $param['pow'] ?? false ? 'Optional: ' : '';
                $internalDoc[$namespace][$method]['attr'][$param['name']] = ['type' => $ptype, 'description' => \str_replace(['](../', '.md'], ['](https://docs.madelineproto.xyz/API_docs/', '.html'], $opt.(Lang::$lang['en']["method_{$data['method']}_param_{$param['name']}_type_{$param['type']}"] ?? ''))];
            }
            if ($type === 'Bool') {
                $type = \strtolower($type);
            }
            $internalDoc[$namespace][$method]['return'] = $type;
        }
        $class = new ReflectionClass($this->reflectionClasses['MTProto']);
        $methods = $class->getMethods((ReflectionMethod::IS_STATIC & ReflectionMethod::IS_PUBLIC) | ReflectionMethod::IS_PUBLIC);
        $class = new ReflectionClass(Tools::class);
        $methods = \array_merge($methods, $class->getMethods((ReflectionMethod::IS_STATIC & ReflectionMethod::IS_PUBLIC) | ReflectionMethod::IS_PUBLIC));
        foreach ($methods as $key => $method) {
            $name = $method->getName();
            if ($method == 'methodCallAsyncRead') {
                unset($methods[\array_search('methodCall', $methods)]);
            } elseif (\strpos($name, '__') === 0) {
                unset($methods[$key]);
            } elseif (\stripos($name, 'async') !== false) {
                if (\strpos($name, '_async') !== false) {
                    unset($methods[\array_search(\str_ireplace('_async', '', $method), $methods)]);
                } else {
                    unset($methods[\array_search(\str_ireplace('async', '', $method), $methods)]);
                }
            }
        }

        $sortedMethods = [];
        foreach ($methods as $method) {
            $sortedMethods[$method->getName()] = $method;
        }
        \ksort($sortedMethods);
        $methods = \array_values($sortedMethods);

        foreach ($methods as $method) {
            $name = $method->getName();
            if (isset($ignoreMethods[$name])) {
                continue;
            }
            if (\strpos($method->getDocComment() ?? '', '@internal') !== false) {
                continue;
            }
            $static = $method->isStatic();
            if (!$static) {
                $code = \file_get_contents($method->getFileName());
                $code = \implode("\n", \array_slice(\explode("\n", $code), $method->getStartLine(), $method->getEndLine() - $method->getStartLine()));
                if (\strpos($code, '$this') === false) {
                    Logger::log("{$name} should be STATIC!", Logger::FATAL_ERROR);
                }
            }
            if ($name == 'methodCallAsyncRead') {
                $name = 'methodCall';
            } elseif (\stripos($name, 'async') !== false) {
                if (\strpos($name, '_async') !== false) {
                    $name = \str_ireplace('_async', '', $name);
                } else {
                    $name = \str_ireplace('async', '', $name);
                }
            }
            $name = StrTools::toCamelCase($name);
            $name = \str_ireplace(['mtproto', 'api'], ['MTProto', 'API'], $name);
            $doc = 'public ';
            if ($static) {
                $doc .= 'static ';
            }
            $doc .= 'function ';
            $doc .= $name;
            $doc .= '(';
            $paramList = '';
            $hasVariadic = false;
            foreach ($method->getParameters() as $param) {
                if ($type = $param->getType()) {
                    if ($type instanceof ReflectionNamedType) {
                        if ($type->allowsNull()) {
                            $doc .= '?';
                        }
                        if (!$type->isBuiltin()) {
                            $doc .= '\\';
                        }
                        $doc .= $type->getName();
                        $doc .= ' ';
                    } elseif ($type instanceof ReflectionUnionType) {
                        foreach ($type->getTypes() as $t) {
                            if (!$t->isBuiltin()) {
                                $doc .= '\\';
                            }
                            $doc .= $t->getName();
                            $doc .= '|';
                        }
                        $doc[\strlen($doc)-1] = ' ';
                    }
                } else {
                    Logger::log($name.'.'.$param->getName()." has no type!", Logger::WARNING);
                }
                if ($param->isVariadic()) {
                    $doc .= '...';
                }
                if ($param->isPassedByReference()) {
                    $doc .= '&';
                }
                $doc .= '$';
                $doc .= $param->getName();
                if ($param->isOptional() && !$param->isVariadic()) {
                    $doc .= ' = ';
                    if ($param->isDefaultValueConstant()) {
                        $doc .= '\\'.\str_replace(['NULL', 'self'], ['null', 'danog\\MadelineProto\\MTProto'], $param->getDefaultValueConstantName());
                    } else {
                        $doc .= \str_replace('NULL', 'null', \var_export($param->getDefaultValue(), true));
                    }
                }
                $doc .= ', ';
                if ($param->isVariadic()) {
                    $hasVariadic = true;
                    $paramList .= '...';
                }
                $paramList .= '$'.$param->getName().', ';
            }
            $type = $method->getReturnType();
            $hasReturnValue = $type !== null;
            if ($type instanceof ReflectionNamedType && \in_array($type->getName(), [Generator::class, Promise::class])) {
                $hasReturnValue = false;
            }
            if (!$hasVariadic && !$static && !$hasReturnValue) {
                $paramList .= '$extra, ';
                $doc .= 'array $extra = []';
            }
            $doc = \rtrim($doc, ', ');
            $paramList = \rtrim($paramList, ', ');
            $doc .= ")";
            $async = true;
            if ($hasReturnValue && $static) {
                $doc .= ': ';
                if ($type->allowsNull()) {
                    $doc .= '?';
                }
                if (!$type->isBuiltin()) {
                    $doc .= '\\';
                }
                $doc .= $type->getName() === 'self' ? $this->reflectionClasses['API'] : $type->getName();
                $async = false;
            }
            if ($method->getDeclaringClass()->getName() == Tools::class) {
                $async = false;
            }
            if ($method->getDeclaringClass()->getName() == StrTools::class) {
                $async = false;
            }
            $finalParamList = $hasVariadic ? "Tools::arr({$paramList})" : "[{$paramList}]";
            $ret = $type && $type instanceof ReflectionNamedType && \in_array($type->getName(), ['self', 'void']) ? '' : 'return';
            $doc .= "\n{\n";
            if ($async) {
                $doc .= "    {$ret} \$this->__call(__FUNCTION__, {$finalParamList});\n";
            } elseif (!$static) {
                $doc .= "    {$ret} \$this->API->{$name}({$paramList});\n";
            } else {
                $doc .= "    {$ret} \\".$method->getDeclaringClass()->getName()."::".$name."({$paramList});\n";
            }
            if (!$ret && $type->getName() === 'self') {
                $doc .= "    return \$this;\n";
            }
            $doc .= "}\n";
            if (!$method->getDocComment()) {
                Logger::log("{$name} has no PHPDOC!", Logger::FATAL_ERROR);
            }
            if (!$type) {
                Logger::log("{$name} has no return type!", Logger::FATAL_ERROR);
            }
            $promise = '\\'.Promise::class;
            $phpdoc = $method->getDocComment() ?? '';
            if (!\str_contains($phpdoc, '@return')) {
                if (!\trim($phpdoc)) {
                    $phpdoc = '/** @return '.$type.' */';
                } else {
                    $phpdoc = \str_replace('*/', ' * @return '.$type."\n     */", $phpdoc);
                }
            }
            $phpdoc = \str_replace("@return \\Generator", "@return $promise", $phpdoc);
            $phpdoc = \str_replace("@return \\Promise", "@return $promise", $phpdoc);
            $phpdoc = \str_replace("@return Generator", "@return $promise", $phpdoc);
            $phpdoc = \str_replace("@return Promise", "@return $promise", $phpdoc);
            if ($hasReturnValue && $async && \preg_match("/@return (.*)/", $phpdoc, $matches)) {
                $ret = $matches[1];
                $new = $ret;
                if ($type && !\str_contains($ret, '<')) {
                    $new = '';
                    if ($type instanceof ReflectionNamedType) {
                        if ($type->allowsNull()) {
                            $new .= '?';
                        }
                        if (!$type->isBuiltin()) {
                            $new .= '\\';
                        }
                        $new .= $type->getName() === 'self' ? $this->reflectionClasses['API'] : $type;
                    } elseif ($type instanceof ReflectionUnionType) {
                        foreach ($type->getTypes() as $t) {
                            if (!$t->isBuiltin()) {
                                $new .= '\\';
                            }
                            $new .= $t->getName() === 'self' ? $this->reflectionClasses['API'] : $t;
                            $new .= '|';
                        }
                        $new = \substr($new, 0, -1);
                    }
                }
                $phpdoc = \str_replace("@return ".$ret, "@return mixed", $phpdoc);
                if (!\str_contains($phpdoc, '@psalm-return')) {
                    $phpdoc = \str_replace("@return ", "@psalm-return $new|$promise<$new>\n     * @return ", $phpdoc);
                }
            }
            $phpdoc = \preg_replace(
                "/@psalm-return \\\\Generator<(?:[^,]+), (?:[^,]+), (?:[^,]+), (.+)>/",
                "@psalm-return $promise<$1>",
                $phpdoc,
            );
            $internalDoc['InternalDoc'][$name]['method'] = $phpdoc;
            $internalDoc['InternalDoc'][$name]['method'] .= "\n    ".\implode("\n    ", \explode("\n", $doc));
        }
        \fwrite($handle, "<?php\n");
        \fwrite($handle, "/**\n");
        \fwrite($handle, " * This file is automatic generated by build_docs.php file\n");
        \fwrite($handle, " * and is used only for autocomplete in multiple IDE\n");
        \fwrite($handle, " * don't modify manually.\n");
        \fwrite($handle, " */\n\n");
        \fwrite($handle, "namespace {$this->namespace};\n");
        foreach ($internalDoc as $namespace => $methods) {
            if ($namespace === 'InternalDoc') {
                \fwrite($handle, "\nclass {$namespace} extends APIFactory\n{\n");
            } else {
                \fwrite($handle, "\ninterface {$namespace}\n{");
            }
            foreach ($methods as $method => $properties) {
                if (isset($properties['method'])) {
                    \fwrite($handle, $properties['method']);
                    continue;
                }
                $title = \implode("\n     * ", \explode("\n", $properties['title']));
                \fwrite($handle, "\n    /**\n");
                \fwrite($handle, "     * {$title}\n");
                \fwrite($handle, "     *\n");
                if (isset($properties['attr'])) {
                    \fwrite($handle, "     * Parameters: \n");
                    $longest = [0, 0, 0];
                    foreach ($properties['attr'] as $name => $param) {
                        $longest[0] = \max($longest[0], \strlen($param['type']));
                        $longest[1] = \max($longest[1], \strlen($name));
                        $longest[2] = \max($longest[2], \strlen($param['description']));
                    }
                    foreach ($properties['attr'] as $name => $param) {
                        $param['type'] = \str_pad('`'.$param['type'].'`', $longest[0] + 2);
                        $name = \str_pad('**'.$name.'**', $longest[1] + 4);
                        $param['description'] = \str_pad($param['description'], $longest[2]);
                        \fwrite($handle, "     * * {$param['type']} {$name} - {$param['description']}\n");
                    }
                    \fwrite($handle, "     * \n");
                    \fwrite($handle, "     * @param array \$params Parameters\n");
                    \fwrite($handle, "     *\n");
                }
                \fwrite($handle, "     * @return {$properties['return']}\n");
                \fwrite($handle, "     */\n");
                \fwrite($handle, "    public function {$method}(");
                if (isset($properties['attr'])) {
                    \fwrite($handle, '$params');
                }
                \fwrite($handle, ");\n");
            }
            \fwrite($handle, "}\n");
        }
        \fclose($handle);
    }
}
