<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>

<style>
    label[for="oDetails"] { display:none; }
</style>


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
        <h1 class="page-header"><?= __('Add Job') ?></h1>
    </div>
</div>

<?= $this->Form->create($job) ?>
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#job" data-toggle="tab">Job</a>
            </li>
            <li><a href="#customer" data-toggle="tab">Customer</a>
            </li>
            <li><a href="#contacts" data-toggle="tab">Contacts</a>
            </li>
            <li><a href="#priceInfo" data-toggle="tab">Billing Info</a>
            </li>
            <li><a href="#stock" data-toggle="tab">Stock & Order Detail</a>
            </li>
        </ul>
        <div class="panel-body">
            <div class="tab-pane fade in active" id="job">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group"><?= $this->Form->control('name', ['class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_status', array('class' => 'form-control', 'type' => 'select', 'options' => $statusOptions)) ?></div>
                            <div class="form-group"><?= $this->Form->control('job_date', array('class' => 'form-control','placeholder'=>'Please select job date','label' => "Event Date",'type' => 'text','empty'=>'true','id' => 'job_date'))?></div>
                            <div class="form-group"><?= $this->Form->hidden('is_pickup',['label' => 'is pickup?','class' => 'checkbox','type' => 'checkbox','value'=>1]); ?></div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="customer">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Select existing customer</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?php
                                $list_cust= array();
                                foreach ($customers as $customer)
                                    $list_cust[$customer->id] = "{$customer->name} ({$customer->cust_type->name})";

                                ?>
                                <div class="form-group"><?= $this->Form->control('customer_id', ['options' => $list_cust, 'class' => 'form-control','id'=> 'cust_html_id']) ?></div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-parent="#accordion" href="#collapseTwo" data-toggle="modal" data-target = "#CustAdd" >Create new customer</a>
                            </h4>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-parent="#accordion" href="#collapseTwo" data-toggle="modal" data-target = "#CustTypesAdd" >Create new customer Type</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="contacts">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Select existing contact</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group"><?= $this->Form->control('contact_id', ['options' => $contacts, 'class' => 'form-control','id'=> 'contact_html_id']) ?></div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-parent="#accordion" href="#collapseTwo" data-toggle="modal" data-target = "#contactsAdd" >Create new contact</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="priceInfo">
                <div class="form-group"><?= $this->Form->control('quote', ['label' => 'Quote number','class' => 'form-control','placeholder'=>'Quote#']) ?></div>
                <div class="form-group"><?= $this->Form->control('job_order', ['class' => 'form-control','placeholder'=>'Order#','label' => 'Order']) ?></div>
                <div class="form-group"><?= $this->Form->control('Invoice', ['class' => 'form-control','placeholder'=>'Invoice#']) ?></div>
                <div class="form-group"><?= $this->Form->control('price', ['class' => 'form-control', 'min'=>'0',  'value'=>'0', 'step'=>'1']) ?></div>
                <div class="form-group"><?= $this->Form->control('deposit', ['class' => 'form-control', 'min'=>'0', 'value'=>'0', 'step'=>'1']) ?></div>
            </div>


            <div class="tab-pane fade" id="stock">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Select existing Stock</a>
                                <button id="firstButton" type="button" class="btn btn-circle btn-success" style="margin-left: 10px" onclick="addStock()"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-info" onclick="addToOrder()" style="display: none;">TRY ME!!!</button>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" >
                            <div class="panel-body">
                                <div class="form-group" id="pasteHere">
                                    <div id="stocks">
                                        <div class="col-lg-9">
                                            <?= $this->Form->control('stock_id', ['options' => $stocks, 'class' => 'form-control', 'id' => 'stock_html_id']) ?></div>
                                        <div class="col-lg-2">
                                            <?= $this->Form->control('unit', ['id' => 'stockNum','label' => 'Quantity','type' => 'number','class' => 'form-control','min' => '1','value' => '1','placeholder' => 'quantity should be numeric and more than 0']) ?></div>
                                        <div class="col-lg-1"><button id="cancelButton" type="button" class="btn btn-circle btn-danger" style="margin-top: 25px; display: none" onclick="removeStock(0)"><i class="fa fa-times"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var count = 1;
                            function addStock(){
                                //FOR THE RECORD, THIS FEATURE IS A TOTAL PITFALL
                                //MIGHT HAVE A BETTER WAY TO IMPLEMENT IT THAN THIS FREAKING FUNCTION

                                //copy elements to be cloned
                                let stocks = document.getElementById("stocks");
                                let paste = document.getElementById("pasteHere");
                                let clones = stocks.cloneNode(true);
                                let stock = clones.childNodes[1].childNodes[1].childNodes[1];
                                let stockN = clones.childNodes[3].childNodes[1].childNodes[1];
                                let butt = clones.childNodes[5].childNodes[0];

                                //change attribute for stock div
                                let string = 'stocks_' + count;
                                clones.id = string;

                                //change attribute for stock
                                string = 'stock_html_id_' + count;
                                stock.id = string;
                                string = 'stock_id_' + count;
                                stock.name = string;

                                //change attribute for stock quantity
                                string = 'stockNum_' + count;
                                stockN.id = string;
                                string = 'unit_' + count;
                                stockN.name = string;

                                //change attribute for cancelButton
                                string = 'cancelButton_' + count;
                                butt.id = string;
                                string = "removeStock(" + count + ")";
                                butt.setAttribute("onClick", string);
                                butt.style.display = "block";

                                //paste the cloned elements
                                paste.appendChild(clones);
                                count++;
                            }

                            function removeStock(num){
                                let string = "stocks_" + num;
                                document.getElementById(string).remove();
                            }

                            function test(){
                                if(!null)
                                    console.log('it works!!!');
                            }

                            function addToOrder(){
                                let order = document.getElementById("oDetails");

                                let theStock = document.getElementById("stock_html_id");
                                let theNum = document.getElementById("stockNum");
                                let stockToAdd = theStock.options[theStock.selectedIndex].text;
                                if(order.value !== "" )
                                    order.value = "";
                                order.value += stockToAdd + "x" + theNum.value + "\n";

                                for(i = 1; i < count; i++){

                                    let string = "stock_html_id_" + i;
                                    let stock = document.getElementById(string);
                                    string = "stockNum_" + i;
                                    let stockN = document.getElementById(string);
                                    if(stock != null){
                                        console.log(stock);
                                        order.value += stock.options[stock.selectedIndex].text + "x" + stockN.value + "\n";
                                    }
                                }
                            }

                        </script>

                        <div class="panel-heading" style="display: none;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Select existing Accessory</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" style="display: none;">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-lg-10">
                                        <?= $this->Form->control('accessory_id', ['options' => $access, 'class' => 'form-control','id'=> 'accessory_html_id']) ?></div>
                                    <div class="col-lg-2">
                                        <?= $this->Form->control('accs_in', ['label' => 'Quantity','type' => 'number','class' => 'form-control','min' => '1','value' => '1','placeholder' => 'quantity should be numeric and more than 0']) ?></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="form-group"><?= $this->Form->control('order_detail', ['class' => 'form-control', 'id' => 'oDetails', 'style' => 'display: none;']) ?></div>
                <div class="form-group"><?= $this->Form->control('additional_note', ['class' => 'form-control']) ?></div>
            </div>
            <div class ="tab-content">
                <div class="Footer">
                    <div class="divleft">
                        <button id="btnPrev"  type="button" value="Previous Tab" text="Previous Tab" class="btn btn-success btn-lg">Previous
                        </button>
                    </div>
                    <div class="divright">
                        <button id="btnNext" type="button" value="Next Tab"  text="Next Tab" class="btn btn-success btn-lg">Next
                        </button>
                    </div>
                </div>
                <div class="divright">
                    <button id="Submit" type="submit" value="Submit" text="Submit" class="btn btn-success btn-lg">Submit</button>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>

</div>




<div class="modal fade" id="CustAdd" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Customer</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null,['url' => ['controller' => 'Customers','action' => 'CustAdd'], 'id' =>'addNewCustomer']) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('name', ['label' => 'Name','class' => 'form-control','placeholder' => 'This field is required']);
                    echo $this->Form->control('phone', ['class' => 'form-control','label' => 'Phone','placeholder' => 'This field is required']);
                    echo $this->Form->control('email', ['class' => 'form-control','label' => 'Email','placeholder' => 'This field is required']);
                    echo $this->Form->control('address', ['class' => 'form-control','label' => 'Address','placeholder' => 'This field is required']);
                    echo $this->Form->control('suburb', ['class' => 'form-control','label' => 'Suburb','placeholder' => 'This field is required']);
                    echo $this->Form->control('city', ['class' => 'form-control','label' => 'City','placeholder' => 'This field is required']);
                    echo $this->Form->control('postcode', ['class' => 'form-control','label' => 'Postcode','placeholder' => 'This field is required']);
                    echo $this->Form->control('is_business',['label' => 'is business?','class' => 'checkbox','type' => 'checkbox']);
                    echo $this->Form->control('cust_type_id', ['options' => $CustTypes, 'label' => 'Type','class' => 'form-control']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="CustTypesAdd" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Customer Types</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null,['url' => ['controller' => 'CustTypes','action' => 'CustTypesAdd'], 'id' =>'addNewCustTypes']) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('name', ['label' => 'name','class' => 'form-control','placeholder' => 'This field is required']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="contactsAdd" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Contact</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create(null,['url' => ['controller' => 'Contacts','action' => 'jobAdd'], 'id' => 'addNewContact']) ?>
                <fieldset>
                    <div class="form-group"><?= $this->Form->control('fname',  ['label' => 'First Name','class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                    <div class="form-group"><?= $this->Form->control('lname',  ['label' => 'Last Name','class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                    <div class="form-group"><?= $this->Form->control('phone', ['class' => 'form-control','placeholder' => ' +61412 345 678 or 0412 345 678']) ?></div>
                    <div class="form-group"><?= $this->Form->control('email', ['class' => 'form-control','placeholder' => 'example@example.com']) ?></div>
                    <div class="form-group"><?= $this->Form->control('role',  ['class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                    <div class="form-group"><?= $this->Form->control('street',  ['label' => 'Address','class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                    <div class="form-group"><?= $this->Form->control('suburb',  ['class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                    <div class="form-group"><?= $this->Form->control('city',  ['class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                    <div class="form-group"><?= $this->Form->control('postcode',  ['class' => 'form-control','placeholder' => 'This field is required']) ?></div>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-lg']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


<?php $this->start('script'); ?>
<script>
    $('button#btnPrev').hide();
    $('button#Submit').hide();

    $(function () {
        $('#job_date').datetimepicker({
            locale: 'en-au',
            format: "L"
        });
    });

    $(document).ready(function () {
        $("#type_html_id").chosen();
        $("#cust_html_id").chosen();
        $("#site_html_id").chosen();
        $("#contact_html_id").chosen();
        $("#image_html_id").chosen();
    });

    $(function() {
        var $tabs = $('.col-lg-12 li');

        $('#btnPrev').on('click', function() {
            $tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
        });
        $('#btnNext').on('click', function() {
            $tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
        });

        $('a[href="#job"]').on('show.bs.tab', function () {
            $('button#btnPrev').hide();
        });
        $('a[href="#job"]').on('hide.bs.tab', function () {
            $('button#btnPrev').show();
        });
        $('a[href="#stock"]').on('show.bs.tab', function () {
            $('button#btnNext').hide();
            $('button#Submit').show();
        });
        $('a[href="#stock"]').on('hide.bs.tab', function () {
            $('button#btnNext').show();
            $('button#Submit').hide();
        });

    });





    //Ajax form submit for newCustomerType
    $("#addNewCustTypes").submit(function(e) {
        //Get necessary info from the form
        var form = $(this);
        var url = form.attr('action');
        //Send out the ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), //This is used to put the data from the form to format that server can recognise
            success: function(data) //This is the callback function that if server responses
            {
                //TODO: Close the modal to let user know event type is added


                $('#CustTypesAdd').modal('toggle');

                if (data.error === false) {
                    //if new event type is successfully added to database
                    $newCustTypeId = data.id;
                    $newCustTypeName = data.name;
                    // console.log($newEventId);
                    // console.log($newEventName);
                    //TODO: Add above received info to the <select> of event types, then reinitialise chosen for event type (since there is a new event to choose from)

                } else {
                    //If there's an error from the server
                    alert(data.error);
                }
            }
        });

        e.preventDefault(); //As the form don't actually submit and redirect to new page
    });



    //Ajax form submit for newCustomer
    $("#addNewCustomer").submit(function(e) {
        //Get necessary info from the form
        var form = $(this);
        var url = form.attr('action');
        //Send out the ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), //This is used to put the data from the form to format that server can recognise
            success: function(data) //This is the callback function that if server responses
            {
                //TODO: Close the modal to let user customer is added


                $('#CustAdd').modal('toggle');

                if (data.error === false) {
                    //if new event type is successfully added to database
                    $newCustomerId = data.id;
                    $newCustomerName = data.name;
                    $isbusiness=data.is_business;
                    // console.log($newCustomerId);
                    // console.log($newCustomerName);
                    //TODO: Add above received info to the <select> of customers, then reinitialise chosen for event type (since there is a new event to choose from)

                    $("#cust_html_id").append("<option value='" + $newCustomerId + "'>" + $newCustomerName + "</option>");

                    $("#cust_html_id").trigger("chosen:updated");
                } else {
                    //If there's an error from the server
                    alert(data.error);
                }
            }
        });

        e.preventDefault(); //As the form don't actually submit and redirect to new page
    });





    //Ajax form submit for newContacts
    $("#addNewContact").submit(function(e) {
        //Get necessary info from the form
        var form = $(this);
        var url = form.attr('action');
        //Send out the ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), //This is used to put the data from the form to format that server can recognise
            success: function(data) //This is the callback function that if server responses
            {
                //TODO: Close the modal to let user customer is added


                $('#contactsAdd').modal('toggle');

                if (data.error === false) {
                    //if a new contact is successfully added to database
                    $newContactId = data.id;
                    $newContactfName = data.firstname;
                    $newContactlName=data.lastname;
                    $newContactphone=data.phone;
                    $newContactemail=data.email;
                    $newContactrole=data.role;
                    $newContactstreet=data.street;
                    $newContactsurburb=data.suburb;
                    $newContactcity=data.city;
                    $newContactpostcode=data.postcode;


                    //TODO: Add above received info to the <select> of customers, then reinitialise chosen for event type (since there is a new event to choose from)

                    $("#contact_html_id").append("<option value='" + $newContactId + "'>" + $newContactfName +' '+ $newContactlName + ' '+ '(' + $newContactemail + ')' + "</option>");

                    $("#contact_html_id").trigger("chosen:updated");
                } else {
                    //If there's an error from the server
                    alert(data.error);
                }
            }
        });

        e.preventDefault(); //As the form don't actually submit and redirect to new page
    });





</script>
<?php $this->end(); ?>
