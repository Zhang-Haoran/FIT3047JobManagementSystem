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

<div class="row" style="margin: auto;width: 50%;">
    <div class="col-md-12" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Google Map
            </div>

            <div class="panel-body" style="padding: 0px;">
                <div id="map"></div>
            </div>
        </div>
    </div>
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
                    if($job->is_deleted == '1')
                    echo "<td class='bg-default' style='color: white;background-color: black;'>Cancelled</td>";
                    elseif( $job->job_status == 'Order')
                    echo "<td class='bg-danger text-white'>Order</td>";
                    elseif ($job->job_status == 'Ready')
                    echo "<td class='bg-info text-white'>Ready</td>";
                    elseif($job->job_status == 'Quote')
                    echo "<td class='bg-warning text-white'>Quote</td>";
                    elseif($job->job_status == 'Completed')
                    echo "<td class='bg-success text-white'>Completed</td>";
                    elseif($job->job_status == 'Invoice')
                    echo "<td class='bg-default text-white' style='background-color: #bbb4da;'>Invoice</td>";
                    elseif($job->job_status == 'Paid')
                    echo "<td class='bg-default text-white' style='background-color: #5bc0de85;'>Paid</td>";
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
                <?php else: echo "<div class='alert alert-info' style='text-align: center;margin-bottom: 0px'>No related Job</div>"; ?>
    <?php endif; ?>
            </tr>
        </table>
    </div>
</div>

<style>
    #map{
        margin-top: 0px;
    }
</style>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAWDodbWDP0gwQTVe0_1R3WSAn8fsq7lQQ&callback=initMap', ['block' => 'scriptBottom']) ?>

<script>
    var geocoder;
    var map;
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 15,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        codeAddress();
    }

    function codeAddress() {
        var address = document.getElementById('table').rows[3].cells[1].textContent;
        console.log(address);
        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
    } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
    }


    $(document).ready(function() {
        initialize();
    } );
</script>
