<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>


<html>
<body>

<button onclick="goBack()">Go Back</button>


<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Edit Site') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="sites form large-9 medium-8 columns content">
    <?= $this->Form->create($site) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic details
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->control('address', ['class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->control('suburb', ['class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->control('postcode', ['class' => 'form-control','placeholder' => 'This field is required']); ?></div>
                                <div class="form-group"><?= $this->Form->hidden('is_deleted', ['class' => 'form-control']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg', 'id' => 'btnSubmit']) ?>
    <?= $this->Form->end() ?>
</div>
