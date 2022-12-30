<?php
/**
 * Lang module.
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
 * @link      https://docs.madelineproto.xyz MadelineProto documentation
 */

namespace danog\MadelineProto;

class Lang
{
    public static $lang = [
    'it' =>
    [
    'phpseclib_fork' => 'Per favore installa questo fork di phpseclib: https://github.com/danog/phpseclib',
    'nearest_dc' => 'Siamo in %s, il DC più vicino è %d.',
    'serialization_ofd' => 'La serializzazione non è aggiornata, reistanziamento dell\'oggetto in corso!',
    'getupdates_deserialization' => 'Ottenimento aggiornamenti dopo deserializzazione...',
    'api_not_set' => 'Devi specificare una chiave ed un ID API, ottienili su https://my.telegram.org',
    'session_corrupted' => 'La sessione si è corrotta!',
    'gen_perm_auth_key' => 'Generando chiave di autorizzazione permanente per il DC %s...',
    'gen_temp_auth_key' => 'Generando chiave di autorizzazione temporanea per il DC %s...',
    'write_client_info' => 'Scrittura info sul client (eseguendo nel contempo il metodo %s)...',
    'config_updated' => 'La configurazione è stata aggiornata!',
    'length_not_4' => 'The specified base256 32-bit integer must be exactly 4 bytes long.',
    'length_not_8' => 'The specified base256 64-bit integer must be exactly 8 bytes long.',
    'value_bigger_than_2147483647' => 'Il valore fornito (%s) è maggiore di 2147483647',
    'value_smaller_than_2147483648' => 'Il valore fornito (%s) è minore di -2147483648',
    'value_bigger_than_9223372036854775807' => 'Il valore fornito (%s) è maggiore di 9223372036854775807',
    'value_smaller_than_9223372036854775808' => 'Il valore fornito (%s) è minore di -9223372036854775808',
    'value_bigger_than_4294967296' => 'Il valore fornito (%s) è maggiore di 4294967296',
    'value_smaller_than_0' => 'Il valore fornito (%s) è minore di 0',
    'encode_double_error' => 'Non sono riuscito a codificare il numero a virgola mobile fornito',
    'file_not_exist' => 'Il file specificato non esiste',
    'deserialization_error' => 'C\'è stato un errore durante la deserializzazione',
    'rpc_tg_error' => 'Telegram ha ritornato un errore RPC: %s (%s), causato da %s:%s%sTL trace:',
    'v_error' => '506572206661766f726520616767696f726e612071756573746120696e7374616c6c617a696f6e65206469204d6164656c696e6550726f746f20636f6e206769742070756c6c206520636f6d706f73657220757064617465',
    'v_tgerror' => '506572206661766f726520616767696f726e61207068702d6c69627467766f6970',
    'protocol_invalid' => 'È stato fornito un protocollo non valido',
    'script_not_exist' => 'Lo script fornito non esiste',
    'madelineproto_ready' => 'MadelineProto è pronto!',
    'logout_ok' => 'Il logout è stato eseguito correttamente!',
    'already_loggedIn' => 'Questa istanza di MadelineProto è già loggata, prima faccio il logout...',
    'login_ok' => 'Il login è stato eseguito correttamente!',
    'login_user' => 'Sto eseguendo il login come utente normale...',
    'login_bot' => 'Sto eseguendo il login come bot...',
    'login_code_sending' => 'Sto inviando il codice...',
    'login_code_sent' => 'Il codice è stato inviato correttamente! Una volta ricevuto il codice dovrai usare la funzione completePhoneLogin.',
    'login_code_uncalled' => 'Non sto aspettando il codice! Usa la funzione phoneLogin.',
    'login_2fa_enabled' => 'L\'autenticazione a due fattori è abilitata, dovrai chiamare il metodo complete2falogin...',
    'login_need_signup' => 'Questo numero non è registrato su telegram, dovrai chiamare la funzione completeSignup...',
    'login_auth_key' => 'Sto facendo il login con la chiave di autorizzazione...',
    'not_loggedIn' => 'Non ho ancora fatto il login!',
    'signup_uncalled' => 'Chiama prima le funzioni phoneLogin e completePhoneLogin.',
    'signing_up' => 'Mi sto registrando su telegram come utente normale...',
    'signup_ok' => 'Mi sono registrato su Telegram!',
    '2fa_uncalled' => 'Non sto aspettando la password, chiama prima le funzioni phoneLogin e completePhoneLogin!',
    'libtgvoip_required' => 'È necessario installare l\'estensione php-libtgvoip per accettare e gestire chiamate vocali, vistate https://docs.madelineproto.xyz per più info.',
    'peer_not_in_db' => 'Questo utente/gruppo/canale non è presente nel database interno MadelineProto',
    'generating_a' => 'Sto generando a...',
    'generating_g_a' => 'Sto generando g_a...',
    'call_error_1' => 'Impossibile trovare ed accettare la chiamata %s',
    'accepting_call' => 'Sto accettando una chiamata da %s...',
    'generating_b' => 'Sto generando b...',
    'call_already_accepted' => 'La chiamata %s è già stata accettata.',
    'call_already_declined' => 'La chiamata %s è già stata annullata.',
    'call_error_2' => 'Impossibile trovare e confermare la chiamata %s',
    'call_confirming' => 'Sto confermando una chiamata da %s',
    'call_error_3' => 'Impossibile trovare e completare la chiamata %s',
    'call_completing' => 'Sto completando una chiamata da %s...',
    'invalid_g_a' => 'g_a non valido!',
    'fingerprint_invalid' => 'fingerprint della chiave non valido!',
    'call_discarding' => 'Sto rifiutando la chiamata %s...',
    'call_set_rating' => 'Sto inviando la recensione della chiamata %s...',
    'call_debug_saving' => 'Sto inviando i dati di debug della chiamata %s...',
    'TL_loading' => 'Sto caricando gli schemi TL...',
    'file_parsing' => 'Leggendo %s...',
    'crc32_mismatch' => 'CRC32 non valido (%s diverso da %s) per %s',
    'src_file_invalid' => 'È stato fornito un file sorgente non valido: ',
    'translating_obj' => 'Traducendo gli oggetti...',
    'translating_methods' => 'Traducendo i metodi...',
    'bool_error' => 'Non sono riuscito ad estrarre un booleano',
    'not_numeric' => 'Il valore fornito non è numerico',
    'long_not_16' => 'Il valore fornito non è lungo 16 byte',
    'long_not_32' => 'Il valore fornito non è lungo 32 byte',
    'long_not_64' => 'Il valore fornito non è lungo 64 byte',
    'array_invalid' => 'Il valore fornito non è un array',
    'predicate_not_set' => 'Il predicato (valore sotto chiave _, esempio [\'_\' => \'inputPeer\']) non è impostato!',
    'type_extract_error' => 'Impossibile estrarre il tipo "%s"',
    'method_not_found' => 'Impossibile trovare il seguente metodo: ',
    'params_missing' => 'Non hai fornito un parametro obbligatorio, rileggi la documentazione API',
    'sec_peer_not_in_db' => 'La chat segreta non è presente nel database interno MadelineProto',
    'stream_handle_invalid' => 'Il valore fornito non è uno stream',
    'length_too_big' => 'Il valore fornito è troppo lungo',
    'type_extract_error_id' => 'Non sono riuscito ad estrarre il tipo %s con ID %s',
    'constructor_not_found' => 'Costruttore non trovato per tipo: ',
    'rand_bytes_too_small' => 'random_bytes è troppo corto!',
    'botapi_conversion_error' => 'Non sono risucito a convertire %s in un oggetto bot API',
    'non_text_conversion' => 'Non posso ancora convertire messaggi media',
    'last_byte_invalid' => 'L\'ultimo byte non è valido',
    'file_type_invalid' => 'È stato fornito un tipo file errato',
    'secret_chat_skipping' => 'Non ho la chat segreta %s nel database, ignorando messaggio',
    'fingerprint_mismatch' => 'Fingerprint della chiave non valido',
    'msg_data_length_too_big' => 'message_data_length è troppo grande',
    'length_not_divisible_16' => 'La lunghezza dei dati decifrati non è divisibile per 16',
    'done' => 'Fatto!',
    'cdn_reupload' => 'Il file non è disponibile sul nostro CDN, richiedo la copia!',
    'stored_on_cdn' => 'Il file è scaricabile tramite CDN!',
    'apiAppInstructionsAuto0' => 'Inserisci il nome dell\'app, può essere qualsiasi cosa: ',
    'apiAppInstructionsAuto1' => 'Inserisci il nome ridotto dell\'app, caratteri alfanumerici: ',
    'apiAppInstructionsAuto2' => 'Inserisci il sito internet dell\'app, oppure t.me/username: ',
    'apiAppInstructionsAuto3' => 'Inserisci la piattaforma dell\'app: ',
    'apiAppInstructionsAuto4' => 'Descrivi la tua app: ',
    'apiAppInstructionsManual0' => 'titolo dell\'app, può essere qualsiasi cosa',
    'apiAppInstructionsManual1' => 'il nome ridotto dell\'app, caratteri alfanumerici: ',
    'apiAppInstructionsManual2' => 'L\'indirizzo del tuo sito, oppure t.me/username',
    'apiAppInstructionsManual3' => 'Qualsiasi',
    'apiAppInstructionsManual4' => 'Descrivi la tua app',
    'apiAutoPrompt0' => 'Inserisci un numero di telefono che è già registrato su Telegram: ',
    'apiAutoPrompt1' => 'Inserisci il codice di verifica che hai ricevuto su Telegram: ',
    'apiChooseManualAutoTip' => 'Nota che puoi anche fornire i parametri API direttamente nelle impostazioni: %s',
    'apiChoosePrompt' => 'La tua scelta (m/a): ',
    'apiError' => 'ERRORE: %s. Prova ancora.',
    'apiManualInstructions0' => 'Effettua il login su https://my.telegram.org',
    'apiManualInstructions1' => 'Vai su API development tools',
    'apiManualInstructions2' => 'Clicca su create application',
    'apiManualPrompt0' => 'Inserisci il tuo API ID: ',
    'apiManualPrompt1' => 'Inserisci il tuo API hash: ',
    'apiParamsError' => 'Non hai fornito tutti i parametri richiesti!',
    'loginBot' => 'Inserisci il tuo bot token: ',
    'loginChoosePrompt' => 'Vuoi effettuare il login come utente o come bot (u/b)? ',
    'loginNoCode' => 'Non hai fornito un codice di verifica!',
    'loginNoName' => 'Non hai fornito un nome!',
    'loginNoPass' => 'Non hai fornito la password!',
    'loginUser' => 'Inserisci il tuo numero di telefono: ',
    'loginUserPass' => 'Inserisci la tua password (suggerimento %s): ',
    'loginUserPassHint' => 'Suggerimento: %s',
    'loginUserPassWeb' => 'Inserisci la tua password: ',
    'loginUserCode' => 'Inserisci il codice di verifica: ',
    'signupFirstName' => 'Inserisci il tuo nome: ',
    'signupFirstNameWeb' => 'Nome',
    'signupLastName' => 'Inserisci il tuo cognome: ',
    'signupLastNameWeb' => 'Cognome',
    'signupWeb' => 'Registrazione',
    'go' => 'Vai',
    'loginChoosePromptWeb' => 'Vuoi effettuare il login come utente o come bot?',
    'loginOptionBot' => 'Bot',
    'loginOptionUser' => 'Utente',
    'loginBotTokenWeb' => 'Token del bot',
    'loginUserPhoneCodeWeb' => 'Codice di verifica',
    'loginUserPhoneWeb' => 'Numero di telefono',
    'apiAutoWeb' => 'Inserisci un numero di telefono <b>gi&agrave; registrato su Telegram</b> per ottenere l&apos;API ID',
    'apiChooseManualAuto' => 'You did not define a valid API ID/API hash. Do you want to define it now manually, or automatically? (m/a)',
    'apiManualWeb' => 'Inserisci il tuo API ID e API hash',
    'apiAppInstructionsAutoTypeOther' => 'Altro (specificare nella descrizione)',
    'apiAppWeb' => 'Inserire informazioni API',
    'apiChooseAutomaticallyWeb' => 'Automaticamente',
    'apiChooseManualAutoTipWeb' => 'Nota che puoi anche fornire i parametri API direttamente nelle <a target="_blank" href="%s">impostazioni</a>.',
    'apiChooseManualAutoWeb' => 'Vuoi configurare il tuo API ID/hash manualmente o automaticamente?',
    'apiChooseManuallyWeb' => 'Manualmente',
    ],
    'en' =>
    [
    'go' => 'Go',
    'apiChooseManualAuto' => 'Do you want to enter the API id and the API hash manually or automatically? (m/a)',
    'apiChooseManualAutoWeb' => 'Do you want to enter the API id and the API hash manually or automatically?',
    'apiChooseManualAutoTip' => 'Note that you can also provide them directly in the code using the settings: %s',
    'apiChooseManualAutoTipWeb' => 'Note that you can also provide them directly in the code using the <a target="_blank" href="%s">settings</a>.',
    'apiChoosePrompt' => 'Your choice (m/a): ',
    'apiChooseAutomaticallyWeb' => 'Automatically',
    'apiChooseManuallyWeb' => 'Manually',
    'apiManualInstructions0' => 'Login to https://my.telegram.org',
    'apiManualInstructions1' => 'Go to API development tools',
    'apiManualInstructions2' => 'Click on create application',
    'apiAppInstructionsManual0' => 'your app\'s name, can be anything',
    'apiAppInstructionsManual1' => 'your app\'s short name, alphanumeric, 5-32 characters',
    'apiAppInstructionsManual2' => 'your app/website\'s URL, or t.me/yourusername',
    'apiAppInstructionsManual3' => 'anything',
    'apiAppInstructionsManual4' => 'Describe your app here',
    'apiManualWeb' => 'Enter your API ID and API hash',
    'apiManualPrompt0' => 'Enter your API ID: ',
    'apiManualPrompt1' => 'Enter your API hash: ',
    'apiAutoWeb' => 'Enter a phone number that is <b>already registered</b> on telegram to get the API ID',
    'apiAutoPrompt0' => 'Enter a phone number that is already registered on Telegram: ',
    'apiAutoPrompt1' => 'Enter the verification code you received in Telegram: ',
    'apiAppWeb' => 'Enter API information',
    'apiAppInstructionsAuto0' => 'Enter the app\'s name, can be anything: ',
    'apiAppInstructionsAuto1' => 'Enter the app\'s short name, alphanumeric, 5-32 characters: ',
    'apiAppInstructionsAuto2' => 'Enter the app/website\'s URL, or t.me/yourusername: ',
    'apiAppInstructionsAuto3' => 'Enter the app platform: ',
    'apiAppInstructionsAuto4' => 'Describe your app: ',
    'apiAppInstructionsAutoTypeOther' => 'Other (specify in description)',
    'apiParamsError' => 'You didn\'t provide all of the required parameters!',
    'apiError' => 'ERROR: %s. Try again.',
    'loginChoosePrompt' => 'Do you want to login as user or bot (u/b)? ',
    'loginChoosePromptWeb' => 'Do you want to login as user or bot?',
    'loginOptionBot' => 'Bot',
    'loginOptionUser' => 'User',
    'loginBot' => 'Enter your bot token: ',
    'loginUser' => 'Enter your phone number: ',
    'loginUserCode' => 'Enter the code: ',
    'loginUserPass' => 'Enter your password (hint %s): ',
    'loginUserPassWeb' => 'Enter your password: ',
    'loginUserPassHint' => 'Hint: %s',
    'signupFirstName' => 'Enter your first name: ',
    'signupLastName' => 'Enter your last name (can be empty): ',
    'signupWeb' => 'Sign up please',
    'signupFirstNameWeb' => 'First name',
    'signupLastNameWeb' => 'Last name',
    'loginNoCode' => 'You didn\'t provide a phone code!',
    'loginNoPass' => 'You didn\'t provide the password!',
    'loginNoName' => 'You didn\'t provide the first name!',
    'loginBotTokenWeb' => 'Bot token',
    'loginUserPhoneWeb' => 'Phone number',
    'loginUserPhoneCodeWeb' => 'Code',
    'done' => 'Done!',
    'cdn_reupload' => 'File is not stored on CDN, requesting reupload!',
    'stored_on_cdn' => 'File is stored on CDN!',
    'phpseclib_fork' => 'Please install this fork of phpseclib: https://github.com/danog/phpseclib',
    'nearest_dc' => 'We\'re in %s, nearest DC is %d.',
    'serialization_ofd' => 'Serialization is out of date, reconstructing object!',
    'getupdates_deserialization' => 'Getting updates after deserialization...',
    'api_not_set' => 'You must provide an api key and an api id, get your own @ my.telegram.org',
    'session_corrupted' => 'The session is corrupted!',
    'gen_perm_auth_key' => 'Generating permanent authorization key for DC %s...',
    'gen_temp_auth_key' => 'Generating temporary authorization key for DC %s...',
    'write_client_info' => 'Writing client info (also executing %s)...',
    'config_updated' => 'Updated config!',
    'length_not_4' => 'The specified base256 32-bit integer must be exactly 4 bytes long.',
    'length_not_8' => 'The specified base256 64-bit integer must be exactly 8 bytes long.',
    'value_bigger_than_2147483647' => 'Provided value %s is bigger than 2147483647',
    'value_smaller_than_2147483648' => 'Provided value %s is smaller than -2147483648',
    'value_bigger_than_9223372036854775807' => 'Provided value %s is bigger than 9223372036854775807',
    'value_smaller_than_9223372036854775808' => 'Provided value %s is smaller than -9223372036854775808',
    'value_bigger_than_4294967296' => 'Provided value %s is bigger than 4294967296',
    'value_smaller_than_0' => 'Provided value %s is smaller than 0',
    'encode_double_error' => 'Could not properly encode double',
    'file_not_exist' => 'File does not exist',
    'deserialization_error' => 'An error occurred on deserialization',
    'rpc_tg_error' => 'Telegram returned an RPC error: %s (%s), caused by %s:%s%sTL trace:',
    'v_error' => '506c656173652075706461746520746f20746865206c61746573742076657273696f6e206f66204d6164656c696e6550726f746f2e',
    'v_tgerror' => '506c6561736520757064617465207068702d6c69627467766f6970',
    'protocol_invalid' => 'Connection: invalid protocol specified.',
    'script_not_exist' => 'Provided script does not exist',
    'madelineproto_ready' => 'MadelineProto is ready!',
    'logout_ok' => 'Logged out successfully!',
    'already_loggedIn' => 'This instance of MadelineProto is already logged in. Logging out first...',
    'login_ok' => 'Logged in successfully!',
    'login_user' => 'Logging in as a normal user...',
    'login_bot' => 'Logging in as a bot...',
    'login_code_sending' => 'Sending code...',
    'login_code_sent' => 'Code sent successfully! Once you receive the code you should use the completePhoneLogin function.',
    'login_code_uncalled' => 'I\'m not waiting for the code! Please call the phoneLogin method first',
    'login_2fa_enabled' => '2FA enabled, you will have to call the complete2falogin function...',
    'login_need_signup' => 'An account has not been created for this number, you will have to call the completeSignup function...',
    'login_auth_key' => 'Logging in using auth key...',
    'not_loggedIn' => 'I\'m not logged in!',
    'signup_uncalled' => 'I\'m not waiting to signup! Please call the phoneLogin and the completePhoneLogin methods first!',
    'signing_up' => 'Signing up as a normal user...',
    'signup_ok' => 'Signed up in successfully!',
    '2fa_uncalled' => 'I\'m not waiting for the password! Please call the phoneLogin and the completePhoneLogin methods first!',
    'libtgvoip_required' => 'The php-libtgvoip extension is required to accept and manage calls. See daniil.it/MadelineProto for more info.',
    'peer_not_in_db' => 'This peer is not present in the internal peer database',
    'generating_a' => 'Generating a...',
    'generating_g_a' => 'Generating g_a...',
    'call_error_1' => 'Could not find and accept call %s',
    'accepting_call' => 'Accepting call from %s...',
    'generating_b' => 'Generating b...',
    'call_already_accepted' => 'Call %s already accepted',
    'call_already_declined' => 'Call %s already declined',
    'call_error_2' => 'Could not find and confirm call %s',
    'call_confirming' => 'Confirming call from %s...',
    'call_error_3' => 'Could not find and complete call %s',
    'call_completing' => 'Completing call from %s...',
    'invalid_g_a' => 'Invalid g_a!',
    'fingerprint_invalid' => 'Invalid key fingerprint!',
    'call_discarding' => 'Discarding call %s...',
    'call_set_rating' => 'Setting rating for call %s...',
    'call_debug_saving' => 'Saving debug data for call %s...',
    'TL_loading' => 'Loading TL schemes...',
    'file_parsing' => 'Parsing %s...',
    'crc32_mismatch' => 'CRC32 mismatch (%s, %s) for %s',
    'src_file_invalid' => 'Invalid source file was provided: ',
    'translating_obj' => 'Translating objects...',
    'translating_methods' => 'Translating methods...',
    'bool_error' => 'Could not extract boolean',
    'not_numeric' => 'Given value isn\'t numeric',
    'long_not_16' => 'Given value is not 16 bytes long',
    'long_not_32' => 'Given value is not 32 bytes long',
    'long_not_64' => 'Given value is not 64 bytes long',
    'array_invalid' => 'You didn\'t provide a valid array',
    'predicate_not_set' => 'Predicate (value under _) was not set!',
    'type_extract_error' => 'Could not extract type "%s", you should update MadelineProto!',
    'method_not_found' => 'Could not find method: ',
    'params_missing' => 'Missing required parameter',
    'sec_peer_not_in_db' => 'This secret peer is not present in the internal peer database',
    'stream_handle_invalid' => 'An invalid stream handle was provided.',
    'length_too_big' => 'Length is too big',
    'type_extract_error_id' => 'Could not extract type: %s with id %s, you should update MadelineProto!',
    'constructor_not_found' => 'Constructor not found for type: ',
    'rand_bytes_too_small' => 'Random_bytes is too small!',
    'botapi_conversion_error' => 'Can\'t convert %s to a bot API object',
    'non_text_conversion' => 'Can\'t convert non text messages yet!',
    'last_byte_invalid' => 'Invalid last byte',
    'file_type_invalid' => 'Invalid file type detected (%s)',
    'secret_chat_skipping' => 'I do not have the secret chat %s in the database, skipping message...',
    'fingerprint_mismatch' => 'Key fingerprint mismatch',
    'msg_data_length_too_big' => 'Message_data_length is too big',
    'length_not_divisible_16' => 'Length of decrypted data is not divisible by 16',
    ],
    ];

    // THIS WILL BE OVERWRITTEN BY $lang["en"]
    public static $current_lang = [
    'go' => 'Go',
    'apiChooseManualAuto' => 'Do you want to enter the API id and the API hash manually or automatically? (m/a)',
    'apiChooseManualAutoWeb' => 'Do you want to enter the API id and the API hash manually or automatically?',
    'apiChooseManualAutoTip' => 'Note that you can also provide them directly in the code using the settings: %s',
    'apiChooseManualAutoTipWeb' => 'Note that you can also provide them directly in the code using the <a href="%s">settings</a>.',
    'apiChoosePrompt' => 'Your choice (m/a): ',
    'apiChooseAutomaticallyWeb' => 'Automatically',
    'apiChooseManuallyWeb' => 'Manually',
    'apiManualInstructions0' => 'Login to https://my.telegram.org',
    'apiManualInstructions1' => 'Go to API development tools',
    'apiManualInstructions2' => 'Click on create application',
    'apiAppInstructionsManual0' => 'your app\'s name, can be anything',
    'apiAppInstructionsManual1' => 'your app\'s short name, alphanumeric, 5-32 characters',
    'apiAppInstructionsManual2' => 'your app/website\'s URL, or t.me/yourusername',
    'apiAppInstructionsManual3' => 'anything',
    'apiAppInstructionsManual4' => 'Describe your app here',
    'apiManualWeb' => 'Enter your API ID and API hash',
    'apiManualPrompt0' => 'Enter your API ID: ',
    'apiManualPrompt1' => 'Enter your API hash: ',
    'apiAutoWeb' => 'Enter a phone number that is <b>already registered</b> on telegram to get the API ID',
    'apiAutoPrompt0' => 'Enter a phone number that is already registered on Telegram: ',
    'apiAutoPrompt1' => 'Enter the verification code you received in Telegram: ',
    'apiAppWeb' => 'Enter API information',
    'apiAppInstructionsAuto0' => 'Enter the app\'s name, can be anything: ',
    'apiAppInstructionsAuto1' => 'Enter the app\'s short name, alphanumeric, 5-32 characters: ',
    'apiAppInstructionsAuto2' => 'Enter the app/website\'s URL, or t.me/yourusername: ',
    'apiAppInstructionsAuto3' => 'Enter the app platform: ',
    'apiAppInstructionsAuto4' => 'Describe your app: ',
    'apiAppInstructionsAutoTypeOther' => 'Other (specify in description)',
    'apiParamsError' => 'You didn\'t provide all of the required parameters!',
    'apiError' => 'ERROR: %s. Try again.',
    'loginChoosePrompt' => 'Do you want to login as user or bot (u/b)? ',
    'loginChoosePromptWeb' => 'Do you want to login as user or bot?',
    'loginOptionBot' => 'Bot',
    'loginOptionUser' => 'User',
    'loginBot' => 'Enter your bot token: ',
    'loginUser' => 'Enter your phone number: ',
    'loginUserCode' => 'Enter the code: ',
    'loginUserPass' => 'Enter your password (hint %s): ',
    'loginUserPassWeb' => 'Enter your password: ',
    'loginUserPassHint' => 'Hint: %s',
    'signupFirstName' => 'Enter your first name: ',
    'signupLastName' => 'Enter your last name (can be empty): ',
    'signupWeb' => 'Sign up please',
    'signupFirstNameWeb' => 'First name',
    'signupLastNameWeb' => 'Last name',
    'loginNoCode' => 'You didn\'t provide a phone code!',
    'loginNoPass' => 'You didn\'t provide the password!',
    'loginNoName' => 'You didn\'t provide the first name!',
    'loginBotTokenWeb' => 'Bot token',
    'loginUserPhoneWeb' => 'Phone number',
    'loginUserPhoneCodeWeb' => 'Code',
    'done' => 'Done!',
    'cdn_reupload' => 'File is not stored on CDN, requesting reupload!',
    'stored_on_cdn' => 'File is stored on CDN!',
    'phpseclib_fork' => 'Please install this fork of phpseclib: https://github.com/danog/phpseclib',
    'nearest_dc' => 'We\'re in %s, nearest DC is %d.',
    'serialization_ofd' => 'Serialization is out of date, reconstructing object!',
    'getupdates_deserialization' => 'Getting updates after deserialization...',
    'api_not_set' => 'You must provide an api key and an api id, get your own @ my.telegram.org',
    'session_corrupted' => 'The session is corrupted!',
    'gen_perm_auth_key' => 'Generating permanent authorization key for DC %s...',
    'gen_temp_auth_key' => 'Generating temporary authorization key for DC %s...',
    'write_client_info' => 'Writing client info (also executing %s)...',
    'config_updated' => 'Updated config!',
    'length_not_4' => 'The specified base256 32-bit integer must be exactly 4 bytes long.',
    'length_not_8' => 'The specified base256 64-bit integer must be exactly 8 bytes long.',
    'value_bigger_than_2147483647' => 'Provided value %s is bigger than 2147483647',
    'value_smaller_than_2147483648' => 'Provided value %s is smaller than -2147483648',
    'value_bigger_than_9223372036854775807' => 'Provided value %s is bigger than 9223372036854775807',
    'value_smaller_than_9223372036854775808' => 'Provided value %s is smaller than -9223372036854775808',
    'value_bigger_than_4294967296' => 'Provided value %s is bigger than 4294967296',
    'value_smaller_than_0' => 'Provided value %s is smaller than 0',
    'encode_double_error' => 'Could not properly encode double',
    'file_not_exist' => 'File does not exist',
    'deserialization_error' => 'An error occurred on deserialization',
    'rpc_tg_error' => 'Telegram returned an RPC error: %s (%s), caused by %s:%s%sTL trace:',
    'v_error' => '506c656173652075706461746520746f20746865206c61746573742076657273696f6e206f66204d6164656c696e6550726f746f2e',
    'v_tgerror' => '506c6561736520757064617465207068702d6c69627467766f6970',
    'protocol_invalid' => 'Connection: invalid protocol specified.',
    'script_not_exist' => 'Provided script does not exist',
    'madelineproto_ready' => 'MadelineProto is ready!',
    'logout_ok' => 'Logged out successfully!',
    'already_loggedIn' => 'This instance of MadelineProto is already logged in. Logging out first...',
    'login_ok' => 'Logged in successfully!',
    'login_user' => 'Logging in as a normal user...',
    'login_bot' => 'Logging in as a bot...',
    'login_code_sending' => 'Sending code...',
    'login_code_sent' => 'Code sent successfully! Once you receive the code you should use the completePhoneLogin function.',
    'login_code_uncalled' => 'I\'m not waiting for the code! Please call the phoneLogin method first',
    'login_2fa_enabled' => '2FA enabled, you will have to call the complete2falogin function...',
    'login_need_signup' => 'An account has not been created for this number, you will have to call the completeSignup function...',
    'login_auth_key' => 'Logging in using auth key...',
    'not_loggedIn' => 'I\'m not logged in!',
    'signup_uncalled' => 'I\'m not waiting to signup! Please call the phoneLogin and the completePhoneLogin methods first!',
    'signing_up' => 'Signing up as a normal user...',
    'signup_ok' => 'Signed up in successfully!',
    '2fa_uncalled' => 'I\'m not waiting for the password! Please call the phoneLogin and the completePhoneLogin methods first!',
    'libtgvoip_required' => 'The php-libtgvoip extension is required to accept and manage calls. See daniil.it/MadelineProto for more info.',
    'peer_not_in_db' => 'This peer is not present in the internal peer database',
    'generating_a' => 'Generating a...',
    'generating_g_a' => 'Generating g_a...',
    'call_error_1' => 'Could not find and accept call %s',
    'accepting_call' => 'Accepting call from %s...',
    'generating_b' => 'Generating b...',
    'call_already_accepted' => 'Call %s already accepted',
    'call_already_declined' => 'Call %s already declined',
    'call_error_2' => 'Could not find and confirm call %s',
    'call_confirming' => 'Confirming call from %s...',
    'call_error_3' => 'Could not find and complete call %s',
    'call_completing' => 'Completing call from %s...',
    'invalid_g_a' => 'Invalid g_a!',
    'fingerprint_invalid' => 'Invalid key fingerprint!',
    'call_discarding' => 'Discarding call %s...',
    'call_set_rating' => 'Setting rating for call %s...',
    'call_debug_saving' => 'Saving debug data for call %s...',
    'TL_loading' => 'Loading TL schemes...',
    'file_parsing' => 'Parsing %s...',
    'crc32_mismatch' => 'CRC32 mismatch (%s, %s) for %s',
    'src_file_invalid' => 'Invalid source file was provided: ',
    'translating_obj' => 'Translating objects...',
    'translating_methods' => 'Translating methods...',
    'bool_error' => 'Could not extract boolean',
    'not_numeric' => 'Given value isn\'t numeric',
    'long_not_16' => 'Given value is not 16 bytes long',
    'long_not_32' => 'Given value is not 32 bytes long',
    'long_not_64' => 'Given value is not 64 bytes long',
    'array_invalid' => 'You didn\'t provide a valid array',
    'predicate_not_set' => 'Predicate (value under _) was not set!',
    'type_extract_error' => 'Could not extract type "%s", you should update MadelineProto!',
    'method_not_found' => 'Could not find method: ',
    'params_missing' => 'Missing required parameter',
    'sec_peer_not_in_db' => 'This secret peer is not present in the internal peer database',
    'stream_handle_invalid' => 'An invalid stream handle was provided.',
    'length_too_big' => 'Length is too big',
    'type_extract_error_id' => 'Could not extract type: %s with id %s, you should update MadelineProto!',
    'constructor_not_found' => 'Constructor not found for type: ',
    'rand_bytes_too_small' => 'Random_bytes is too small!',
    'botapi_conversion_error' => 'Can\'t convert %s to a bot API object',
    'non_text_conversion' => 'Can\'t convert non text messages yet!',
    'last_byte_invalid' => 'Invalid last byte',
    'file_type_invalid' => 'Invalid file type detected (%s)',
    'secret_chat_skipping' => 'I do not have the secret chat %s in the database, skipping message...',
    'fingerprint_mismatch' => 'Key fingerprint mismatch',
    'msg_data_length_too_big' => 'Message_data_length is too big',
    'length_not_divisible_16' => 'Length of decrypted data is not divisible by 16',
    ];
}
