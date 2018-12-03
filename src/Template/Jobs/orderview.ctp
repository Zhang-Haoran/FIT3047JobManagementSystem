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

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAWDodbWDP0gwQTVe0_1R3WSAn8fsq7lQQ&callback=initMap', ['block' => 'scriptBottom']) ?>

<div class="form-group"></div>
<div class="col-lg-6">
    <div class="panel panel-default">

        <table id="table" class="table table-striped table-bordered table-hover">
            <tbody>

            <tr>
                <th scope="row"><?= __('Job Name') ?></th>
                <td><?= h($job->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Customer Name') ?></th>
                <td><?= $job->has('customer') ? $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Contact Name') ?></th>
                <td><?= $job->has('contact') ? $this->Html->link($job->contact->fname, ['controller' => 'Contacts', 'action' => 'view', $job->contact->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Site') ?></th>
                <td><?= $job->has('site') ? $this->Html->link($job->site->name, ['controller' => 'Sites', 'action' => 'view', $job->site->id]) : '' ?>
                    <button onclick="moveToImage(<?= h($job->id) ?>)" class="btn btn-success">Upload images</button>
                </td>

            </tr>
            <tr>
                <th scope="row"><?= __('Address') ?></th>
                <td class="address"><?= $site->address ?>, <?= $site->suburb ?> <?= $site->postcode ?></td>
            </tr>

            <tr>
                <th scope="row"><?= __('Expected Arrival Time') ?></th>
                <td><?= h($job->e_arrival_time) ?></td>
            </tr>

            <tr>
                <th scope="row"><?= __('Order Detail') ?></th>
                <td><?= $this->Text->autoParagraph(h($job->order_detail)); ?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row"><?= __('Images Information') ?></th>
                <td><?= $job->has('image') ? $this->Html->link($job->image->path, ['controller' => 'Images', 'action' => 'view', $job->image->id]) : '' ?></td>
            </tr>

            </tbody>
        </table>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div id="map"></div>
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

<script>
    function moveToImage(jobId) {
        window.location.replace("/images/add/" + jobId);
    }
</script>
