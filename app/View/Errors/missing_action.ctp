<?php
/**
 * @var $this HintView
 *
 * @var $controller
 * @var $action
 */

$pluginDot = empty($plugin) ? null : $plugin . '.';

?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Method in <?=h($controller)?></h2>
                    <p><strong>Error:</strong> The action <em><?=h($action)?></em> is not defined in controller <em><?=h($controller)?></em></p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

