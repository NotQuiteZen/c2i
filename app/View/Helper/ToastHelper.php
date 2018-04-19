<?php
App::uses('AppHelper', 'View/Helper');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Class ToastHelper
 *
 * @property HtmlHelper Html
 */
class ToastHelper extends AppHelper {

    public $helpers = [
        'Html',
    ];

    public $settings = [
        'session_key' => 'Toast',
    ];

    public function render($window_variable = false) {
        $toasts = CakeSession::read($this->settings['session_key']);

        # Do we want to render as a script tag? Make the
        if ($window_variable === true) {
            $window_variable = 'toast_messages';
        }

        # Delete the toasts
        CakeSession::delete($this->settings['session_key']);

        # If we want it as a window variable in a script tag
        if ($window_variable) {

            # Setup the json bitmask
            $bitmask = JSON_NUMERIC_CHECK|JSON_UNESCAPED_SLASHES;
            if (Configure::read('debug') > 0) {
                $bitmask = $bitmask|JSON_PRETTY_PRINT;
            }

            # Build the json object
            $toasts_object = json_encode($toasts, $bitmask);

            return $this->Html->tag('script', "\nwindow." . $window_variable . " = " . $toasts_object . ";\n");
        }

        # Return the array
        return $toasts;
    }

}
