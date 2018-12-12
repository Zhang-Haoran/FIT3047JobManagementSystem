var button = -1;
var number = {quoteN: 0, orderN: 0, readyN: 0, completedN: 0, invoiceN: 0, paidN: 0, todayN: 0, nextWeekN:0, pickupN:0, total: 0, tTotal: 0, cancelN:0};

function parseDate(date){
    let dateArray = date.split(" ");
    let day = parseInt(dateArray[1]);
    let newDate = new Date(Date.parse(day + dateArray[2] + dateArray[3]));
    return newDate;
}

function statusCheck(data, status, today){
    let date = parseDate(data[2]);
    let todayDate = new Date();
    let jobStatus = data[1];
    if(today)
        if (date.getDate() === todayDate.getDate() && date.getMonth() === todayDate.getMonth() && date.getFullYear() === todayDate.getFullYear() && jobStatus === status)
            return true;
        else return false;
    else if(jobStatus === status)
        return true;
    return false;
}

function encourage(){
    let randomN = Math.floor(Math.random()*10 + 1);
    let encouragement = [', have a nice day!', ', do your best!', ', you got this!', ', what a day!', ', lets do this!', ', just another day in the office!', ', good luck!',
        ', you are filled with determination!', ', lets get this over with', ', marquees! Marquees everywhere!', ', piece of cake!'];
    if(number.todayN === 0) {
        document.getElementById('workForToday').style.color = "green";
        randomN = 0;
    }
    document.getElementById('encouragement').innerHTML = encouragement[randomN];
}

function isToday(data, once){
    let date = parseDate(data[2]);
    let today = new Date();
    let status = data[1];

    if(once === 1) {
        if (date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && status !== 'Completed')
            return true;
    }
    else if(once === 0)
        if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
            return true;
    return false;
}

function nextWeek(data){
    let date = parseDate(data[2]);
    let today = new Date();

    if(date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && (date.getDate() - today.getDate()) < 7 && (date.getDate() - today.getDate()) > 1 )
        return true;
    return false;
}

function getCount(data){
    let status = data[1];
    let date = parseDate(data[2]);
    let today = new Date();

    if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()) {
        number.tTotal++;
        if (status !== 'Completed')
            number.todayN++;
    }

    else if(date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && (date.getDate() - today.getDate()) < 7 && (date.getDate() - today.getDate()) > 1 )
        number.nextWeekN++;
    number.total++;

    if(status === 'Quote')
        number.quoteN++;
    if(status === 'Order' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
        number.orderN++;
    if(status === 'Ready' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
        number.readyN++;
    if(status === 'Completed' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
        number.completedN++;
    if(status === 'Invoice' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
        number.invoiceN++;
    if(status === 'Paid' && date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear())
        number.paidN++;
    if(data[10] === "")
        number.pickupN++;
    if(status === 'Cancelled')
        number.cancelN++;

}

function pickup(data){
    if(data[10] === "")
        return true;
    return false;
}

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        switch (button){
            case -2:
                return isToday(data, 0);
            case -1:
                return getCount(data);
            case 0:
                return true;
            case 1:
                return isToday(data, 1);
            case 2:
                return nextWeek(data);
            case 3:
                return statusCheck(data, 'Quote', false);
            case 4:
                return statusCheck(data, 'Order', true);
            case 5:
                return statusCheck(data, 'Ready',true);
            case 6:
                return statusCheck(data, 'Completed', true);
            case 7:
                return statusCheck(data, 'Invoice', true);
            case 8:
                return statusCheck(data, 'Paid', true);
            case 9:
                return pickup(data);
            case 10:
                return statusCheck(data, 'Cancelled', false);
        }

    }
);


$(document).ready(function() {
    var table = $('#Jobs').DataTable( {
        dom: 'Bfrtip',
        responsive: true,
        buttons: [{
            extend: 'csv',
            attr: {
                id: 'dTCSVExportBtn'
            },
            exportOptions:{
                columns: ':not(.notexport)'
            }
        }],

    } );


    $('#dTCSVExportBtn').hide(); //Hide the original dT export CSV button
    //When our own CSV button clicked
    $('#dTDownloadCSVBtn').click(function(){
        //We trigger the hidden dT button to do the job!
        table.button('#dTCSVExportBtn').trigger();
    });

    $('#quote').on('click', function(){
        button = 3;

        table.draw();
    });


    $('#today').on('click', function(){
        button = 1;

        table.draw();
    });


    $('#nextWeek').on('click', function(){
        button = 2;
        table.draw();
    });


    $('#allJob').on('click', function(){
        button = 0;
        table.draw();

    });

    $('#totalC').on('click', function(){
        button = -2;
        table.draw();

    });

    $('#orderC').on('click', function(){
        button = 4;
        table.draw();

    });

    $('#readyC').on('click', function(){
        button = 5;
        table.draw();

    });

    $('#completedC').on('click', function(){
        button = 6;
        table.draw();

    });

    $('#invoicedC').on('click', function(){
        button = 7;
        table.draw();

    });

    $('#paidC').on('click', function(){
        button = 8;
        table.draw();

    });

    $('#pickupJob').on('click', function(){
        button = 9;
        table.draw();
    });

    $('#cancelledJob').on('click', function(){
        button = 10;
        table.draw();
    });

    button = 0;
    table.draw();
    encourage();
    document.getElementById('quoteN').innerHTML = number.quoteN;
    document.getElementById('orderN').innerHTML = number.orderN;
    document.getElementById('readyN').innerHTML = number.readyN;
    document.getElementById('completedN').innerHTML = number.completedN;
    document.getElementById('invoicedN').innerHTML = number.invoiceN;
    document.getElementById('paidN').innerHTML = number.paidN;
    document.getElementById('nextWeekN').innerHTML = number.nextWeekN;
    document.getElementById('todayN').innerHTML = number.todayN;
    document.getElementById('total').innerHTML = number.total;
    document.getElementById('totalN').innerHTML = number.tTotal;
    document.getElementById('workForToday').innerHTML = number.todayN;
    document.getElementById('pickup').innerHTML = number.pickupN;
    document.getElementById('cancelled').innerHTML = number.cancelN;



});