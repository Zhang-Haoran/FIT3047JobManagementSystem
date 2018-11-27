<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>

<div>
    <button onclick="goBack()" class="btn btn-success">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Site') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>



<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Site details</th>
        </div>

        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">

        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($site->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($site->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suburb') ?></th>
            <td><?= h($site->suburb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postcode') ?></th>
            <td><?= h($site->postcode) ?></td>
        </tr>
                </table>
            </tr>
        </table>
    </div>
</div>



<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Jobs on this site</th>
        </div>

        <table class="panel-body">
            <tr class="table-responsive">
                <?php if (!empty($site->jobs)): ?>
                <table id="table" class="table table-striped table-bordered table-hover">



            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <th scope="row"><?= __('Status') ?></th>
                <th scope="row"><?= __('Job Date') ?></th>
                <th scope="row"><?= __('Booked Date') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($site->jobs as $job): ?>
                <tr>
                    <td><?= h($job->name) ?></td>

                    <?php
                    if( $job->job_status == 'Started')
                        echo "<td class='bg-danger text-white'>Started</td>";
                    elseif ($job->job_status == 'Confirmed')
                        echo "<td class='bg-success text-white'>Confirmed</td>";
                    elseif($job->job_status == 'Quote')
                        echo "<td class='bg-warning text-white'>Quote</td>";
                    elseif($job->job_status == 'Completed')
                        echo "<td class='bg-info text-white'>Completed</td>";
                    ?>

                    <td><?= h($job->job_date) ?></td>
                    <td><?= h($job->booked_date) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $job->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $job->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
            </tr>
        </table>
    </div>
</div>
