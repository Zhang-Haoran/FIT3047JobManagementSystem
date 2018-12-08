<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
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
        <h1 class="page-header"><?= __('View Contacts') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>



<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Contact Details</th>
        </div>

        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">

        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($contact->fname) ?></td>
        </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($contact->lname) ?></td>
                    </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($contact->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contact->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($contact->role) ?></td>
        </tr>
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($contact->street) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Suburb') ?></th>
                        <td><?= h($contact->suburb) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('City') ?></th>
                        <td><?= h($contact->city) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Postcode') ?></th>
                        <td><?= h($contact->postcode) ?></td>
                    </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $contact->has('job') ? $this->Html->link($contact->job->name, ['controller' => 'Jobs', 'action' => 'view', $contact->job->id]) : '' ?></td>
        </tr>
    </table>
            </tr>
        </table>
    </div>
</div>
