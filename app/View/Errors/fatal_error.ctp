<?php
/**
 * @var $this  HintView
 *
 * @var $error ErrorException
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Fatal Error</h2>
                    <p><strong>Error:</strong> <em><?=h($error->getMessage())?></em></p>
                    <p><strong>File:</strong> <em><?=h($error->getFile())?></em></p>
                    <p><strong>Line:</strong> <em><?=h($error->getLine())?></em></p>
                    <?php
                    if (extension_loaded('xdebug')) {
                        xdebug_print_function_stack();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

