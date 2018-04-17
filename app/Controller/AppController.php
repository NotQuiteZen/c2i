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
        'Paginator' => ['className' => 'Materialize.MaterializePaginator'],
    ];

    public $helpers = [
        'JsConfig',
        'Html' => ['className' => 'Materialize.MaterializeHtml'],
        'Form' => ['className' => 'Materialize.MaterializeForm'],
        'Paginator' => ['className' => 'Materialize.MaterializePaginator'],
    ];

}
