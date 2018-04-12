<?php
/**
 * @var $this HintView
 *
 * @var $config
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Datasource Configuration</h2>
                    <p><strong>Error:</strong> The datasource configuration <em><?=h($config)?></em> was not found in database.php</p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
