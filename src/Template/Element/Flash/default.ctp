<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
        $.notify({
// options
            message: '<?= $message ?>'
        }, {
// settings
            type: 'info'
        });
</script>