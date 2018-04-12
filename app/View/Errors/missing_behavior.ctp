<?php
/**
 * @var $this HintView
 *
 * @var $class
 */

$pluginDot = empty($plugin) ? null : $plugin . '.';

?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Behavior</h2>
                    <p><strong>Error:</strong> <em><?=h($pluginDot . $class)?></em> could not be found.</p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

