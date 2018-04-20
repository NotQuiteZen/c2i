<?php

App::uses('Controller', 'Controller');

/**
 * Class AppController
 *
 * @property ToastComponent   $Toast
 * @property CookieComponent  $Cookie
 * @property SessionComponent $Session
 */
class AppController extends Controller {

    public $useTable = false;

    public $components = [
        'Toast' => ['className' => 'Materialize.MaterializeToast'],
        'Cookie',
        'Session',
        'DebugKit.Toolbar',
        'Paginator' => ['className' => 'Materialize.MaterializePaginator'],
    ];

    public $helpers = [
        'JsLoader',
        'JsConfig',
        'Toast' => ['className' => 'Materialize.MaterializeToast'],
        'Html' => ['className' => 'Materialize.MaterializeHtml'],
        'Form' => ['className' => 'Materialize.MaterializeForm'],
        'Paginator' => ['className' => 'Materialize.MaterializePaginator'],
    ];

}
