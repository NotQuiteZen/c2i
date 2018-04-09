<?php

class DATABASE_CONFIG {

    public $default = [
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => '__DB__',
        'password' => '__PW__',
        'database' => '__DB__',
        'encoding' => 'utf8',
    ];

    public $test = [
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'user',
        'password' => 'password',
        'database' => 'test_database_name',
        'prefix' => '',
        'encoding' => 'utf8',
    ];

}
