<?php
/**
 * @var $this HintView
 *
 * @var $controller
 * @var $action
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Scaffold Error</h2>
                    <p><strong>Error:</strong> Method _scaffoldError in was not found in the controller</p>
                    <?php
                    if (isset($error) && $error instanceof Exception) {
                        echo $this->element('exception_stack_trace');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
