<?php

/**
 * Class ToastComponent
 *
 * @property object           $params
 * @property Controller       $Controller
 * @property SessionComponent $Session
 */
class ToastComponent extends Component {

    public $components = [
        'Session',
    ];

    public $settings = [
        'session_key' => 'Toast',
        'types' => [
            'error' => [
                'message' => 'De gegevens konden niet worden opgeslagen',
                'color' => 'red',
            ],
            'success' => [
                'message' => 'De gegevens zijn opgeslagen',
                'color' => 'green',
            ],
        ],
    ];

    public function __construct(ComponentCollection $collection, array $settings) {
        $this->Controller = $collection->getController();
        $settings = array_merge($this->settings, (array) $settings);
        parent::__construct($collection, $settings);
    }


    /**
     * Set a toast message and redirect
     *
     * @param string $type_or_message
     * @param array  $url
     *
     * @return CakeResponse|null
     */
    public function redirectAndSet($type_or_message = 'success', $url = []) {
        $this->_setMessage($type_or_message);
        return $this->Controller->redirect($url);
    }


    /**
     * Set a toast message
     *
     * @param string $type_or_message
     *
     * @return bool
     */
    public function set($type_or_message = 'success') {
        return $this->_setMessage($type_or_message);
    }


    /**
     * @param $type_or_message
     *
     * @return bool
     */
    private function _setMessage($type_or_message) {
        $message = array_key_exists($type_or_message, $this->settings['types']) ? $this->settings['types'][$type_or_message] : $type_or_message;

        # Fetch previously set toasts
        $toasts = $this->Session->read($this->settings['session_key']);

        # If we don't have any, make the toasts an empty array
        if ( ! $toasts) {
            $toasts = [];
        }

        # Append the new message
        $toasts[] = $message;


        # Write back to the session
        return $this->Session->write($this->settings['session_key'], $toasts);
    }
}
