<?php

# Setup a 'default' cache configuration for use in the application.
Cache::config('default', [
    'engine' => 'File',
]);

# Configure Dispatch filters
Configure::write('Dispatcher.filters', [
    'AssetDispatcher', // filter will serve your asset files (css, images, js, etc) from your themes and plugins
    'CacheDispatcher', // filter will read the Cache, check configure variable and try to serve cached content generated from controllers
]);

# Load CakeLog
App::uses('CakeLog', 'Log');

# Configures default debug logging options
CakeLog::config('debug', [
    'engine' => 'File',
    'types' => ['notice', 'info', 'debug'],
    'file' => 'debug',
]);

# Configures default error logging options
CakeLog::config('error', [
    'engine' => 'File',
    'types' => ['warning', 'error', 'critical', 'alert', 'emergency'],
    'file' => 'error',
]);

# Load Composer autoload.
require ROOT . '/Vendor/autoload.php';

# Remove and re-prepend CakePHP's autoloader as Composer thinks it is the most important.
# See: http://goo.gl/kKVJO7
spl_autoload_unregister(['App', 'load']);
spl_autoload_register(['App', 'load'], true, true);

# Add Vendor Plugin path
App::build([
    'Plugin' => [
        ROOT . '/Vendor/cakephp-plugin/',
    ],
]);

# Load all plugins
CakePlugin::loadAll();
