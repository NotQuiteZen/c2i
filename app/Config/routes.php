<?php

# Route SetupsController
Router::connect('/', ['controller' => 'setups', 'action' => 'index']);

# Setup Plugin routes
CakePlugin::routes();


# Include Cake's default routes
require CAKE . 'Config' . DS . 'routes.php';
