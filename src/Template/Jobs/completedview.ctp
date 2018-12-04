<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Completed') ?></h1>
    </div>
</div>


<div class="form-group"></div>
<div class="col col-lg-6">
    <div class="panel panel-default">


        <h1 style="font-size: x-large"><?= h($job->name) ?></h1>
        <p></p>
        <span class="glyphicon glyphicon-user"
              style="font-size: large"> <?= $job->has('customer') ? h($job->customer->name) : '' ?></span>
        <p>
        </p>

        <p style="font-size: large">
            <?= $job->has('contact') ? h($job->contact->id) : '' ?></p>

        <span class="glyphicon glyphicon-home"
              style="font-size: large">  <?= $job->has('site') ? h($job->site->name) : '' ?></span>
        <p>
        </p>


        <span class="glyphicon glyphicon-map-marker" style="font-size: large"> <?= $site->address ?>
            , <?= $site->suburb ?> <?= $site->postcode ?></span>

        <p></p>
        <span class="glyphicon glyphicon-usd" style="font-size: large"> <?= $this->Number->format($job->price) ?></span>
        <p></p>
        <span class="glyphicon glyphicon-pencil  " style="font-size: large">
        <?= h($job->additional_note); ?>
    </span>


    </div>
    <div class="divright">

        <?= $this->Html->link(__('Back to home'), ['action' => 'index', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
        <p></p>
    </div>
    <div class="divleft">

        <?= $this->Html->link(__('Back to ready'), ['action' => 'readyview', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
        <p></p>
    </div>

</div>


