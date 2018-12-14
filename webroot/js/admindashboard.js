var button = -1;
var number = {quoteN: 0, orderN: 0, readyN: 0, completedN: 0, invoiceN: 0, paidN: 0, todayN: 0, nextWeekN:0, pickupN:0, total: 0, tTotal: 0, cancelN:0};
var numberM = {total:0, completedN:0, incompletedN:0, paidN:0, income:0};

function parseDate(date){
    let dateArray = date.split(" ");
    let day = parseInt(dateArray[1]);
    let newDate = new Date(Date.parse(day + dateArray[2] + dateArray[3]));
    return newDate;
}

function statusCheck(data, status, today){
    let date = parseDate(data[3]);
    let todayDate = new Date();
    let jobStatus = data[2];
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
        ', you are filled with determination!', ', lets get this over with!', ', marquees! Marquees everywhere!', ', piece of cake!'];
    if(number.todayN === 0) {
        document.getElementById('workForToday').style.color = "green";
        randomN = 0;
    }
    document.getElementById('encouragement').innerHTML = encouragement[randomN];
}

function isToday(data, once){
    let date = parseDate(data[3]);
    let today = new Date();
    let status = data[2];

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
    let date = parseDate(data[3]);
    let today = new Date();

    if(date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && (date.getDate() - today.getDate()) < 7 && (date.getDate() - today.getDate()) > 1 )
        return true;
    return false;
}

function getCount(data){
    let status = data[2];
    let date = parseDate(data[3]);
    let today = new Date();
    //counting total jobs for both today summary and the green panel
    if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()) {
        number.tTotal++;
        if (status !== 'Completed')
            number.todayN++;
    }
    //counting jobs for next week and total amount of jobs
    else if(date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && (date.getDate() - today.getDate()) < 7 && (date.getDate() - today.getDate()) > 1 )
        number.nextWeekN++;
    number.total++;

    //counting quoted jobs
    if(status === 'Quote')
        number.quoteN++;
    //counting jobs for today summary
    if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()){

        switch (status) {
            case 'Order':
                number.orderN++;
                break;
            case 'Ready':
                number.readyN++;
                break;
            case 'Completed':
                number.completedN++;
                break;
            case 'Invoice':
                number.invoiceN++;
                break;
            case 'Paid':
                number.paidN++;
        }

    }
    //counting pickup jobs
    if(data[11] === "")
        number.pickupN++;
    //counting cancelled jobs
    if(status === 'Cancelled')
        number.cancelN++;

    //counting jobs for this month summary
    if(date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()){
        switch (status){
            case 'Completed':
                numberM.completedN++;
                break;
            case "Paid":
                numberM.paidN++;
                let price = Number (data[6].replace(/[^0-9.-]+/g,""));
                numberM.income += price;
                break;
            default:
                numberM.incompletedN++;
        }
        numberM.total++;
    }
}

function pickup(data){
    if(data[11] === "")
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
    //display panel number
    document.getElementById('todayN').innerHTML = number.todayN;
    document.getElementById('nextWeekN').innerHTML = number.nextWeekN;
    document.getElementById('quoteN').innerHTML = number.quoteN;
    document.getElementById('pickup').innerHTML = number.pickupN;
    document.getElementById('total').innerHTML = number.total;
    document.getElementById('cancelled').innerHTML = number.cancelN;

    //display number for encouragement
    document.getElementById('workForToday').innerHTML = number.todayN;

    //display today summary number
    document.getElementById('totalN').innerHTML = number.tTotal;
    document.getElementById('orderN').innerHTML = number.orderN;
    document.getElementById('readyN').innerHTML = number.readyN;
    document.getElementById('completedN').innerHTML = number.completedN;
    document.getElementById('invoicedN').innerHTML = number.invoiceN;
    document.getElementById('paidN').innerHTML = number.paidN;


    //display this month summary number
    document.getElementById('totalMN').innerHTML = numberM.total;
    document.getElementById('incompleteMN').innerHTML = numberM.incompletedN;
    document.getElementById('completedMN').innerHTML = numberM.completedN;
    document.getElementById('paidMN').innerHTML = numberM.paidN;
    document.getElementById('tIncomeMN').innerHTML = numberM.income;



});