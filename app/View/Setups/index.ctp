<?php
/**
 * @var $this HintView
 */
?>
<div class="blue">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">

                    <?php

                    # Welcome
                    echo $this->Html->h2('Welcome to c2i', ['class' => 'header light blue-text']);

                    # Version & changelog
                    echo $this->Html->h4('Release Notes for CakePHP ' . Configure::version(), ['class' => 'header light']);
                    echo $this->Html->link('Read the changelog', 'https://cakephp.org/changelogs/' . Configure::version());

                    echo $this->Html->h4('Configuration', ['class' => 'header light']);

                    # Security
                    foreach (['salt', 'cipherSeed', 'key'] as $key) {
                        $value = Configure::read('Security.' . $key);
                        if (empty($value) || strpos($value, '__') === 0) {
                            echo $this->Html->tag('div', 'Please change the value of <em>Security.' . $key . '</em> in <em>Config/core.php</em> to a value specific to your application.<br>', ['class' => 'red-text']);
                        } else {
                            echo $this->Html->tag('div', 'The value of <em>Security.' . $key . '</em> is set.<br>', ['class' => 'green-text']);
                        }
                    }

                    # PHP version
                    if (version_compare(PHP_VERSION, '5.6', '>=')) {
                        echo $this->Html->tag('div', 'Your version of PHP is 5.6 or higher.<br>', ['class' => 'green-text']);
                    } else {
                        echo $this->Html->tag('div', 'Your version of PHP too low. You need PHP 5.6 or higher.<br>', ['class' => 'red-text']);
                    }

                    # Writable app/tmp
                    if (is_writable(TMP)) {
                        echo $this->Html->tag('div', 'Your tmp directory is writable.<br>', ['class' => 'green-text']);
                    } else {
                        echo $this->Html->tag('div', 'Your tmp directory NOT is writable.<br>', ['class' => 'red-text']);
                    }

                    # Cache settings
                    $settings = Cache::settings();
                    if ( ! empty($settings)) {
                        echo $this->Html->tag('div', 'The <em>' . $settings['engine'] . 'Engine</em> is being used for core caching.<br>', ['class' => 'green-text']);
                    } else {
                        echo $this->Html->tag('div', 'Your cache is NOT working. Please check the settings in core.php<br>', ['class' => 'red-text']);
                    }

                    # TODO: Add database check, since we have a dummy datasource this won't work now

                    # Unicode support
                    App::uses('Validation', 'Utility');
                    if ( ! Validation::alphaNumeric('cakephp')) {
                        echo $this->Html->tag('div', 'PCRE has not been compiled with Unicode support. Recompile PCRE with Unicode support by adding <code>--enable-unicode-properties</code> when configuring.<br>', ['class' => 'red-text']);
                    }

                    # DebugKit
                    if (CakePlugin::loaded('DebugKit')) {
                        echo $this->Html->tag('div', 'DebugKit plugin is present<br>', ['class' => 'green-text']);
                    } else {
                        echo $this->Html->tag('div', 'DebugKit is not installed. You can install it from ' . $this->Html->link('Github', 'https://github.com/cakephp/debug_kit/tree/2.2', ['target' => '_blank']) . '<br>', ['class' => 'red-text']);
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
