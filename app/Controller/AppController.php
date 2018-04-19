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
        'Toast',
        'Cookie',
        'Session',
        'DebugKit.Toolbar',
        'Paginator' => ['className' => 'Materialize.MaterializePaginator'],
    ];

    public $helpers = [
        'Toast',
        'JsLoader',
        'JsConfig',
        'Html' => ['className' => 'Materialize.MaterializeHtml'],
        'Form' => ['className' => 'Materialize.MaterializeForm'],
        'Paginator' => ['className' => 'Materialize.MaterializePaginator'],
    ];

}
