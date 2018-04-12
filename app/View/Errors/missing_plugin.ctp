<?php
/**
 * @var $this HintView
 *
 * @var $plugin
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Plugin</h2>
                    <p><strong>Error:</strong> The application is trying to load a file from the <em><?=h($plugin)?></em> plugin</p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
