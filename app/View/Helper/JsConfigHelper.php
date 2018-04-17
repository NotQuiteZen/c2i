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
     * @param $path
     * @param $value
     */
    public function set($path, $value) {
        $this->config = Hash::insert($this->config, $path, $value);
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public function get($path) {
        return Hash::get($this->config, $path);
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
}
