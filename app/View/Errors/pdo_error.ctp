<?php
/**
 * @var $this  HintView
 *
 * @var $message
 * @var $error PDOException
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Database Error</h2>
                    <p><strong>Error:</strong> <?=$message?></p>
                    <?php

                    if ( ! empty($error->queryString)) {
                        ?><p><strong>SQL Query:</strong> <?=h($error->queryString)?></p><?php
                    }

                    if ( ! empty($error->params)) {
                        ?>
                        <p>
                            <strong>SQL Query Params:</strong>
                            <?php
                            Debugger::dump($error->params);
                            ?>
                        </p>
                        <?php
                    }

                    echo $this->element('exception_stack_trace');

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
