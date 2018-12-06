<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>



<div class="row">


    <div class="col-lg-12">
        <h1 class="page-header"><?= __('View Job') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<style>
    #map{
        height: 500px;
        width: 80%;
        margin-top: 2%;
    }
</style>
image
<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAWDodbWDP0gwQTVe0_1R3WSAn8fsq7lQQ&callback=initMap', ['block' => 'scriptBottom']) ?>

<div class="row">
    <div class="col-lg-12">
        <div id="map"></div>
    </div>
</div>
<div class="row">
<div class="col-lg-6">
    <div class="form-group"></div>
    <div class="panel panel-default">
                <table id="table" class="table table-striped table-bordered table-hover">
                <tbody>

        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($job->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($job->job_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site') ?></th>
            <td><?= $job->has('site') ? $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]) : '' ?>
                <button class="btn btn-success"><?= $this->Html->link("Upload Image",['controller' => 'Images', 'action' => 'add', $job->id])?></button>
            </td>

        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td class="address"><?= $site->address ?>, <?= $site->suburb ?> <?= $site->postcode ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Type') ?></th>
            <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $job->has('customer') ? $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created by') ?></th>
            <td><?= $job->has('employee') ? $this->Html->link($job->employee->full_name, ['controller' => 'Employees', 'action' => 'view', $job->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last edited By') ?></th>
            <td><?= h($job->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice') ?></th>
            <td><?= h($job->Invoice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= h($job->job_order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quote') ?></th>
            <td><?= h($job->quote) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($job->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposit') ?></th>
            <td><?= $this->Number->format($job->deposit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Date') ?></th>
            <td><?= h($job->job_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booked Date') ?></th>
            <td><?= h($job->booked_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Arrival Time') ?></th>
            <td><?= h($job->e_arrival_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Setup Time') ?></th>
            <td><?= h($job->e_setup_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Pickup Time') ?></th>
            <td><?= h($job->e_pickup_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Changed') ?></th>
            <td><?= h($job->last_changed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Detail') ?></th>
            <td><?= $this->Text->autoParagraph(h($job->order_detail)); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Additional Note') ?></th>
            <td><?= $this->Text->autoParagraph(h($job->additional_note)); ?></td>
        </tr>



</tbody>
    </table>

</div>
</div>
    <div class="col-lg-6">


        <?php foreach ($job->images as $image): ?>

            <?=$this->Html->image($image->path,['class'=>'img']);?>

        <?php endforeach; ?>
    </div>
</div>





<?php
$this->Html->scriptBlock('
    var geocoder;
    var map;
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 15,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById(\'map\'), mapOptions);

        codeAddress();
    }

    function codeAddress() {
        var address = document.getElementById(\'table\').rows[3].cells[1].textContent;
        console.log(address);
        geocoder.geocode( { \'address\': address}, function(results, status) {
            if (status == \'OK\') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert(\'Geocode was not successful for the following reason: \' + status);
            }
        });
    }


        $(document).ready(function() {
        initialize();
        } );
    ', ['block' => true]);
    ?>

