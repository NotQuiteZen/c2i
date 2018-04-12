<?php
/**
 * @var $this  HintView
 *
 * @var $error ErrorException
 */

App::uses('Debugger', 'Utility');

?>
<h3>Stack Trace</h3>
<ul class="cake-stack-trace">
    <?php
    foreach ($error->getTrace() as $i => $stack) {

        $excerpt = $arguments = '';
        $params = [];

        ?>
        <li>
            <?php

            if (isset($stack['file']) && isset($stack['line'])) {
                printf(
                    '<a href="#" onclick="traceToggle(event, \'file-excerpt-%s\')">%s line %s</a>',
                    $i,
                    Debugger::trimPath($stack['file']),
                    $stack['line']
                );
                $excerpt = sprintf('<div id="file-excerpt-%s" class="cake-code-dump" style="display:none;"><pre>', $i);
                $excerpt .= implode("\n", Debugger::excerpt($stack['file'], $stack['line'] - 1, 2));
                $excerpt .= '</pre></div> ';
            } else {
                echo '<a href="#">[internal function]</a>';
            }
            echo ' &rarr; ';
            if ($stack['function']) {
                $args = [];
                if ( ! empty($stack['args'])) {
                    foreach ((array) $stack['args'] as $arg) {
                        $args[] = Debugger::getType($arg);
                        $params[] = Debugger::exportVar($arg, 4);
                    }
                }

                $called = isset($stack['class']) ? $stack['class'] . $stack['type'] . $stack['function'] : $stack['function'];

                printf(
                    '<a href="#" onclick="traceToggle(event, \'trace-args-%s\')">%s(%s)</a> ',
                    $i,
                    $called,
                    h(implode(', ', $args))
                );
                $arguments = sprintf('<div id="trace-args-%s" class="cake-code-dump" style="display: none;"><pre>', $i);
                $arguments .= h(implode("\n", $params));
                $arguments .= '</pre></div>';
            }
            echo $excerpt;
            echo $arguments;
            ?>
        </li>
        <?php
    }
    ?>
</ul>
<script type="text/javascript">
    function traceToggle(event, id) {
        var el = document.getElementById(id);
        el.style.display = (el.style.display === 'block') ? 'none' : 'block';
        event.preventDefault();
        return false;
    }
</script>
