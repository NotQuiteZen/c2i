<?php
/**
 * @var $this HintView
 */
?><!DOCTYPE html>
<html>
<head>
    <?=$this->Html->charset()?>
    <title><?=(empty($pagetitle) ? '' : $pagetitle . ' | ') . 'App'?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?php

    # Meta
    echo $this->fetch('meta');

    # CSS Core
    echo $this->Html->css('/dist/commons');

    # CSS Fetch other styles
    echo $this->fetch('css');

    # JS Fetch other scripts
    echo $this->fetch('script');

    # Set some JsConfigs
    $this->JsConfig->set([
        'base' => $this->base,
        'here' => $this->here,
        'controller' => $this->params['controller'],
        'action' => $this->params['action'],
        'toasts' => $this->Toast->render(),
    ], 'App');

    # Get the JsConfig js object
    echo $this->JsConfig->getObject();
    ?>
</head>
<body>
<?php

# Content
echo $this->Html->tag(
    'div',
    ($this->fetch('content') ?: ''),
    ['id' => 'content-container']
);

# JS Fetch footer scripts
echo $this->fetch('script-footer');

# JS Core
echo $this->Html->script('/dist/commons');
echo $this->JsLoader->getViewScript();
?>
</body>
</html>
