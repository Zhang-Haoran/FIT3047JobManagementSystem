<?php
/**
 * @var \App\View\AppView $this
 */
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
            type: 'success'
        });
</script>