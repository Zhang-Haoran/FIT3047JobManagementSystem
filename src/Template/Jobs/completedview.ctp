<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Completed') ?></h1>
    </div>
</div>
<style>
    #map {
        height: 500px;
        width: 80%;
        margin-top: 2%;
    }
</style>

<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAWDodbWDP0gwQTVe0_1R3WSAn8fsq7lQQ&callback=initMap', ['block' => 'scriptBottom']) ?>
<p></p>
<p></p>

<div class="form-group"></div>
<div class="col col-lg-6">
    <div class="panel panel-default">


        <h1 style="font-size: x-large"><?= h($job->name) ?></h1>
        <p></p>
        <span class="glyphicon glyphicon-user"
              style="font-size: large"> <?= $job->has('customer') ? h($job->customer->name) : '' ?></span>
        <p>
        </p>

        <p style="font-size: large">
            <?= $job->has('contact') ? h($job->contact->id) : '' ?></p>

        <span class="glyphicon glyphicon-home"
              style="font-size: large">  <?= $job->has('site') ? h($job->site->name) : '' ?></span>
        <p>
        </p>


        <span class="glyphicon glyphicon-map-marker" style="font-size: large" id="a"> <?= $site->address ?>
            , <?= $site->suburb ?> <?= $site->postcode ?></span>

        <p></p>
        <span class="glyphicon glyphicon-usd" style="font-size: large"> <?= $this->Number->format($job->price) ?></span>
        <p></p>
        <span class="glyphicon glyphicon-pencil  " style="font-size: large">
        <?= h($job->additional_note); ?>
    </span>


    </div>
    <div class="divright">

        <?= $this->Html->link(__('Back to home'), ['action' => 'index', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
        <p></p>
    </div>
    <div class="divleft">

        <?= $this->Html->link(__('Back to ready'), ['action' => 'readyview', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
        <p></p>
    </div>

</div>


<div class="row">
    <div class="col-lg-6" style="margin-top: 10%">
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
        var address = document.getElementById(\'a\').innerText;
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
