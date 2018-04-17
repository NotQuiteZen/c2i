<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Class JsLoaderHelper
 *
 * @property HtmlHelper Html
 */
class JsLoaderHelper extends AppHelper {

    public $helpers = [
        'Html',
    ];


    /**
     */
    public function getViewScript() {
        $controller = Inflector::pluralize(Inflector::camelize($this->params['controller']));

        $script_file = DS . 'dist' . DS . $controller . DS . $this->params['action'] . '.js';
        $abs_script_file = WWW_ROOT . $script_file;

        if (file_exists($abs_script_file)) {
            return $this->Html->script($script_file);
        }

        $default_script_file = DS . 'dist' . DS . 'default.js';

        return $this->Html->script($default_script_file);
    }


}
