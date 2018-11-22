<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Images') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th scope="col"><?= __('Path') ?></th>
                        <th scope="col"><?= __('Name') ?></th>
                        <th scope="col"><?= __('Job name') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images as $image): ?>
                    <tr>
                        <td class="center"><?= h($image->path) ?></td>
                        <td class="center"><?= h($image->description) ?></td>
                        <td class="center"><?= $image->has('job') ? $this->Html->link($image->job->name, ['controller' => 'Jobs', 'action' => 'view', $image->job->id]) : '' ?></td>                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
