<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Class JsHelper
 *
 * @property HtmlHelper Html
 */
class JsConfigHelper extends AppHelper {

    public $helpers = [
        'Html',
    ];

    private $config = [];

    /**
     * @param $value
     * @param $path
     */
    public function set($value, $path = false) {
        $this->config = Hash::insert($this->config, $this->_getPath($path), $value);
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public function get($path = false) {
        return Hash::get($this->config, $this->_getPath($path));
    }

    /**
     * @param string $obj_name Will be accessible through window.$obj_name
     *
     * @return string
     */
    public function getObject($obj_name = 'JsConfig') {

        $bitmask = JSON_NUMERIC_CHECK|JSON_UNESCAPED_SLASHES;
        if (Configure::read('debug') > 0) {
            $bitmask = $bitmask|JSON_PRETTY_PRINT;
        }

        $config = json_encode($this->config, $bitmask);

        return $this->Html->tag('script', "\nwindow." . $obj_name . " = " . $config . ";\n");
    }


    /**
     * Normalizes the path to controller.action if its false
     *
     * @param $path
     *
     * @return string
     */
    private function _getPath($path) {
        if ( ! $path) {
            return $this->params['controller'] . '.' . $this->params['action'];
        }

        return $path;
    }
}
