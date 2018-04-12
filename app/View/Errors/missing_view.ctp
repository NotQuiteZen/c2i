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
                    <h2 class="red-text">Missing View</h2>
                    <p><strong>Error:</strong> The view for <em><?=h(Inflector::camelize($this->request->controller) . 'Controller::' . $this->request->action . '()')?></em> was not found.</p>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
