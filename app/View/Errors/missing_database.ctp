<?php
/**
 * @var $this HintView
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Database Connection</h2>
                    <p><strong>Error:</strong> Scaffold requires a database connection</p>
                    <p><strong>Error:</strong> Confirm you have created the file: <?=(APP_DIR . DS . 'Config' . DS . 'database.php')?></p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
