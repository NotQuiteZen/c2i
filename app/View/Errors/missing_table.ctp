<?php
/**
 * @var $this HintView
 *
 * @var $table
 * @var $class
 * @var $ds
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Database Table</h2>
                    <p><strong>Error:</strong> Table <em><?=h($table)?></em> for model <em><?=h($class)?></em> was not found in datasource <em><?=h($ds)?></em>.</p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
