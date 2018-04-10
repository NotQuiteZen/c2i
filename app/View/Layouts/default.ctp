<?php
/**
 * @var $this HintView
 *
 * TODO Fix this template
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

    # CSS
    //    echo $this->Html->css('app.min');

    # CSS Fetch other styles
    echo $this->fetch('css');

    # JS vendors
    //    echo $this->Html->script('vendors.min');

    # JS Fetch other scripts
    echo $this->fetch('script');

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

?>
</body>
</html>