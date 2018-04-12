<?php
/**
 * @var $this HintView
 *
 * @var $file
 */

$pluginDot = empty($plugin) ? null : $plugin . '.';
$paths = $this->_paths($this->plugin);

?>
<div class="red">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <h2 class="red-text">Missing Layout</h2>
                    <p><strong>Error:</strong> The layout file <em><?=h($file)?></em> can not be found or does not exist.</p>
                    <p>in one of the following paths:</p>
                    <ul>
                        <?php
                        foreach ($paths as $path) {
                            if (strpos($path, CORE_PATH) !== false) {
                                continue;
                            }
                            echo $this->Html->li(h($path . $file));
                        }
                        ?>
                    </ul>
                    <?php
                    echo $this->element('exception_stack_trace');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
