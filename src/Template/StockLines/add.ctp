<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockLine $stockLine
 */
?>
<!-- This page is for experimenting how to be merged into job page, in normal circumstances this page is inaccessible-->
<div class="stockLines form large-9 medium-8 columns content">
    <?= $this->Form->create($stockLine) ?>
    <fieldset id="aForm">
        <legend><?= __('Add Stock Line') ?></legend>
        <?php
            echo $this->Form->control('job_id', ['type' => 'select', 'options' => $jobs, 'class' => 'form-control']);
            echo $this->Form->control('stock_id', ['id' => 'select', 'type' => 'select', 'onchange' => 'duplicate()', 'options' => $stocks, 'class' => 'form-control']);
            echo $this->Form->control('stock_num');
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit', ['id' => 'btnSubmit'])) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    function duplicate(){
        var selectRef = document.getElementById("aForm");
        var dup = selectRef.cloneNode(true);
        document.getElementById("aForm").appendChild(dup);
    }
</script>
