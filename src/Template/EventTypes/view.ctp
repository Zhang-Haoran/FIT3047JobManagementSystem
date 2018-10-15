<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventType $eventType
 */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Event Type') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>




<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th><?= h($eventType->name) ?></th>
        </div>

        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">



        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($eventType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $eventType->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
            </tr>
        </table>
    </div>

</div>






<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Event Type: <?=h($eventType->name) ?> Related to jobs</th>
        </div>




        <table class="panel-body">
            <tr class="table-responsive">
                <?php if (!empty($eventType->jobs)): ?>
                    <table id="table" class="table table-striped table-bordered table-hover">


                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <th scope="row"><?= __('Name') ?></th>
                            <th scope="row"><?= __('Status') ?></th>
                            <th scope="row"><?= __('Job Date') ?></th>
                            <th scope="row"><?= __('Booked Date') ?></th>

                            <th scope="row" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($eventType->jobs as $jobs): ?>
                            <tr>
                                <td><?= h($jobs->id) ?></td>
                                <td><?= h($jobs->name) ?></td>
                                <td><?= h($jobs->status) ?></td>
                                <td><?= h($jobs->job_date) ?></td>
                                <td><?= h($jobs->booked_date) ?></td>

                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </tr>
        </table>
    </div>
</div>
