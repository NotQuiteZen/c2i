<?php
/**
 * @var $this HintView
 *
 * @var $class
 * @var $message
 * @var $enabled
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Database Connection</h2>
                    <p><strong>Error:</strong> A Database connection using <em>"<?=h($class)?>"</em> was missing or unable to connect.</p>
                    <?php

                    if (isset($message)) {
                        ?><p>The database server returned this error: <em><?=h($message)?></em></p><?php
                    }

                    if ( ! $enabled) {
                        ?><p><strong>Error:</strong> <em><?=h($class)?></em> driver is NOT enabled</p><?php
                    }

                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



