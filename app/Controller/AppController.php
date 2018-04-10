<?php

App::uses('Controller', 'Controller');

/**
 * Class AppController
 */
class AppController extends Controller {

    public $useTable = false;

    public $components = [
        'Cookie',
        'Session',
        'DebugKit.Toolbar',
    ];

}
