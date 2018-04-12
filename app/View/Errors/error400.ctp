<?php
/**
 * @var $this  HintView
 *
 * @var $message
 * @var $url
 */
?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text"><?=$message?></h2>
                    <p>
                        <strong>Error:</strong> The requested address <strong><?=$url?></strong> was not found on this server.
                        <?php
                        if (Configure::read('debug') > 0) {
                            echo $this->element('exception_stack_trace');
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
