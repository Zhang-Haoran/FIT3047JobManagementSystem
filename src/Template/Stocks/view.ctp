<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
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
        <h1 class="page-header"><?= __('View Stock') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <th>Stock details</th>
        </div>



        <table class="panel-body">
            <tr class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover">

        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($stock->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accessory') ?></th>
            <td><?= $stock->has('accessory') ? $this->Html->link($stock->accessory->name, ['controller' => 'Accessories', 'action' => 'view', $stock->accessory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent Value') ?></th>
            <td><?= $this->Number->format($stock->rent_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min Accs') ?></th>
            <td><?= $this->Number->format($stock->min_accs) ?></td>
        </tr>
                    //nfkjg

                    <tr>
                        <th scope="row"><?= __('Unit') ?></th>
                        <td><?= $this->Number->format($stock->unit) ?></td>
                    </tr>

                </table>
            </tr>
        </table>
    </div>

</div>

