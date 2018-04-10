<?php

# Debug
Configure::write('debug', 2);

# Locale
setLocale(LC_ALL, 'nld');
Configure::write('Config.language', 'nld');
date_default_timezone_set('Europe/Amsterdam');
Configure::write('Config.timezone', 'Europe/Amsterdam');

# Encoding
Configure::write('App.encoding', 'UTF-8');

# Error
Configure::write('Error', [
    'handler' => 'ErrorHandler::handleError',
    'level' => E_ALL&~E_DEPRECATED,
    'trace' => true,
]);

# Exception
Configure::write('Exception', [
    'handler' => 'ErrorHandler::handleException',
    'renderer' => 'ExceptionRenderer',
    'log' => true,
]);

# Session
Configure::write('Session', [
    'defaults' => 'php',
]);

# Security
Configure::write('Security.salt', '__SECURITY__SALT__');
Configure::write('Security.cipherSeed', '__SECURITY__CIPHERSEED__');
Configure::write('Security.useOpenSsl', true);

# Acl
Configure::write('Acl.classname', 'DbAcl');
Configure::write('Acl.database', 'default');

# Cache
$engine = 'File';
$duration = '+999 days';
if (Configure::read('debug') > 0) {
    # In development mode, caches should expire quickly.
    $duration = '+10 seconds';
}
$prefix = 'myapp_';
Cache::config('_cake_core_', [
    'engine' => $engine,
    'prefix' => $prefix . 'cake_core_',
    'path' => CACHE . 'persistent' . DS,
    'serialize' => ($engine === 'File'),
    'duration' => $duration,
]);
Cache::config('_cake_model_', [
    'engine' => $engine,
    'prefix' => $prefix . 'cake_model_',
    'path' => CACHE . 'models' . DS,
    'serialize' => ($engine === 'File'),
    'duration' => $duration,
]);

/**
 * See https://raw.githubusercontent.com/cakephp/cakephp/2.x/app/Config/core.php for more options and documentation
 */
