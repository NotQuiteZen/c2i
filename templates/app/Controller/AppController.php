<?php

App::uses('Controller', 'Controller');

/**
 * Class AppController
 */
class AppController extends Controller {

    public $components = [
        'Cookie',
        'Session',
        'DebugKit.Toolbar',
    ];

}
