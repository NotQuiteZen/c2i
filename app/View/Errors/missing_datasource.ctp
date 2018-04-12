<?php
/**
 * @var $this HintView
 *
 * @var $plugin
 * @var $class
 * @var $message
 */

$pluginDot = empty($plugin) ? null : $plugin . '.';

?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Datasource</h2>
                    <p><strong>Error:</strong> Datasource class <em><?=h($pluginDot . $class)?></em> could not be found.</p>
                    <?php

                    if (isset($message)) {
                        echo $this->Html->p($message);
                    }

                    echo $this->element('exception_stack_trace');

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
