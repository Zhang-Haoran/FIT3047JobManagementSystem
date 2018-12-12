<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= h($job->name) ?></h1>

    </div>
</div>
<style>
    #map {
        height: 500px;
        width: 100%;
        margin-top: 2%;
    }

</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?= $this->Html->script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAWDodbWDP0gwQTVe0_1R3WSAn8fsq7lQQ&callback=initMap', ['block' => 'scriptBottom']) ?>
<p></p>
<p></p>
<div class="form-group"></div>
<div class="row">
<div class="col col-lg-6">
    <div class="panel panel-red">
        <div class="panel-heading" style="text-align: center;font-size: large">Order</div>


        <table id="table1" class="table table-striped table-bordered table-hover">
            <tbody>
            <div style="text-align: center;font-size: x-large">
                    <span class="fa fa-building"
                          style="font-size: large;text-align: center"> </span><b> <?= $job->has('customer') ? h($job->customer->name) : '' ?></b>
            </div>
                <?php foreach ($job->contacts as $contact): ?>
                <tr>
            <th>
                <?="Contact ";?>
            </th>
            <td>
                <?=h($contact->fname);?>
                <?=h($contact->lname);?>
            </td>
                </tr>
                <tr>
                <th>
            <?="Phone ";?>
                </th>
                <td>
            <?=h($contact->phone);?>
                </td>
                </tr>
                    <tr>
                    <th>
            <?="Email ";?>
                    </th>
                    <td>
            <?=h($contact->email);?>
                    </td>
                    </tr>
                <tr>
                    <th>
            <?="Role ";?>
                    </th>
                    <td>
            <?=h($contact->role);?>
                    </td>
                </tr>

                <tr>
                    <th>
            <?="Street ";?>
                    </th>
                    <td>
            <?=h($contact->street);?>
                    </td>
                </tr>

                <tr>
                    <th>
            <?="Suburb ";?>
                    </th>
                    <td>
            <?=h($contact->suburb);?>
                    </td>
                </tr>

                <tr>
                    <th>
            <?="City ";?>
                    </th>
                    <td>
            <?=h($contact->city);?>
                    </td>
                </tr>

                <tr>
                    <th>
            <?="Postcode ";?>
                    </th>
                    <td>
            <?=h($contact->postcode);?>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
        <table id="table" class="table table-striped table-bordered table-hover">
                <tbody>
                <div style="text-align: center;font-size: x-large">
    <span class="glyphicon glyphicon-home"
          style="font-size: large"> </span> <b> <?= $job->has('site') ? h($job->site->name) : '' ?></b>
                    <div id="map"></div>

                </div>


            <tr>
                <th scope="row"><?= __('Address') ?></th>
                <td class="address"><?= $site->address ?>, <?= $site->suburb ?> <?= $site->postcode ?>

                </td>

            </tr>




                <tr>
                <th scope="row"><?= __('Event Type') ?></th>
                <td><?= $job->has('event_type') ? h($job->event_type->name) : '' ?></td>
            </tr>


            <tr>
                <th scope="row"><?= __('Job Date') ?></th>
                <td><?= h($job->job_date) ?></td>
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
                <th scope="row"><?= __('Order Detail') ?></th>
                <td><?= $this->Text->autoParagraph(h($job->order_detail)); ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Additional Note') ?></th>
                <td><?= $this->Text->autoParagraph(h($job->additional_note)); ?></td>
            </tr>
                <tr>
                    <th scope="row"><?= __('Image') ?></th>
                    <td>    <?= $this->Html->link("Upload Image",['controller' => 'Images', 'action' => 'add', $job->id],['class' => 'btn btn-info align-right'])?>
                        <p></p>
                        <div class="w3-content w3-display-container">
                            <?php foreach ($job->images as $image): ?>


                                <div class="mySlides">
                                    <?=$this->Html->image($image->path,['class'=>'img img-responsive', 'alt' => $image->description]);?>
                                    <div class="caption">
                                        <p class="text-center text-capitalize text-muted"><?= $image->description ?></p>

                                    </div>

                                </div>
                            <?php endforeach; ?>

                            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                        </div>

                    </td>
                </tr>
                <tr>
                    <th>
                        <div class="divleft">

                            <?= $this->Html->link(__('Back to home'), ['action' => 'index', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>
                        </div>
                    </th>
                    <td>
                        <div class="divright">
                            <?= $this->Html->link(__('Job is ready'), ['action' => 'readyview', $job->id], ['class' => 'btn btn-primary', 'style' => 'width:100%']) ?>

                        </div>
                    </td>
                </tr>

                </tbody>
        </table>




    </div>

</div>
</div>


<div class="row">
    <div class="col-lg-6">

    </div>
</div>






            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    if (n > x.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = x.length}
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    x[slideIndex-1].style.display = "block";
                }
            </script>


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
        var address = document.getElementById(\'table\').rows[0].cells[1].textContent;
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

