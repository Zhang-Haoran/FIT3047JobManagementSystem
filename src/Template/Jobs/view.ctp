<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<style>
    #map{
        height: 500px;
        width: 80%;
        margin-top: 2%;
    }
</style>

<div id="map"></div>

<div class="jobs view columns content">
    <h3><?= h($job->name) ?></h3>
    <table class="vertical-table" id="table">
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
            <td><?= $job->has('site') ? $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]) : '' ?></td>
            <td><b>Address: </b></td>
            <td class="address"><?= $site->address ?>, <?= $site->suburb ?> <?= $site->postcode ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Type') ?></th>
            <td><?= $job->has('event_type') ? $this->Html->link($job->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $job->event_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $job->has('customer') ? $this->Html->link($job->customer->full_name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
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
            <th scope="row"><?= __('E Arrival Time') ?></th>
            <td><?= h($job->e_arrival_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Setup Time') ?></th>
            <td><?= h($job->e_setup_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Pickup Time') ?></th>
            <td><?= h($job->e_pickup_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Changed') ?></th>
            <td><?= h($job->last_changed) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Order Detail') ?></h4>
        <?= $this->Text->autoParagraph(h($job->order_detail)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional Note') ?></h4>
        <?= $this->Text->autoParagraph(h($job->additional_note)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Accessorie Lines') ?></h4>
        <?php if (!empty($job->accessorie_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Accessorie Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Accs In') ?></th>
                <th scope="col"><?= __('Accs Out') ?></th>
            </tr>
            <?php foreach ($job->accessorie_lines as $accessorieLines): ?>
            <tr>
                <td><?= h($accessorieLines->accessorie_id) ?></td>
                <td><?= h($accessorieLines->job_id) ?></td>
                <td><?= h($accessorieLines->accs_in) ?></td>
                <td><?= h($accessorieLines->accs_out) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($job->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
            </tr>
            <?php foreach ($job->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->path) ?></td>
                <td><?= h($images->description) ?></td>
                <td><?= h($images->job_id) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stock Lines') ?></h4>
        <?php if (!empty($job->stock_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Stock Id') ?></th>
                <th scope="col"><?= __('Job Id') ?></th>
                <th scope="col"><?= __('Stock Num') ?></th>
            </tr>
            <?php foreach ($job->stock_lines as $stockLines): ?>
            <tr>
                <td><?= h($stockLines->stock_id) ?></td>
                <td><?= h($stockLines->job_id) ?></td>
                <td><?= h($stockLines->stock_num) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">

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
        var address = document.getElementById('table').rows[2].cells[3].textContent;
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

</script>