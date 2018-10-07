<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventType[]|\Cake\Collection\CollectionInterface $eventTypes
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Event Types') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>

                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eventTypes as $eventType): ?>
                    <tr>
                        <td class="center"><?= $this->Number->format($eventType->id) ?></td>
                        <td class="center"><?= h($eventType->name) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $eventType->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventType->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventType->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
