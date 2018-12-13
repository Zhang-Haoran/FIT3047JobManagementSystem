
var button = -1;
var number = {todayN: 0, nextWeekN:0, total: 0};

function parseDate(date){
    let dateArray = date.split(" ");
    let day = parseInt(dateArray[1]);
    let newDate = new Date(Date.parse(day + dateArray[2] + dateArray[3]));
    return newDate;
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

function today(data){
    let date = parseDate(data[2]);
    let today = new Date();
    let status = data[1];

    if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && status !== 'Completed')
        return true;
    return false;
}

function nextWeek(data){
    let date = parseDate(data[2]);
    let today = new Date();
    let datetime = (date.getTime() - today.getTime()) / (1000*3600*24);

    if(datetime <= 7 && datetime > 1)
        return true;
    return false;
}

function getCount(data){
    let status = data[1];
    let date = parseDate(data[2]);
    let today = new Date();
    let datetime = (date.getTime() - today.getTime()) / (1000*3600*24);

    if(date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear() && status !== 'Complete')
        number.todayN++;
    else if(datetime <= 7 && datetime > 0)
        number.nextWeekN++;
    number.total++;
}

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        if(button == 2)
            return nextWeek(data);
        else if(button == 1)
            return today(data);
        else if(button == -1)
            return getCount(data);
        else return true;

    }
);



$(document).ready(function() {
    var table = $('#Jobs').DataTable({
        responsive: true,
        colReorder: false
    });

    $('#today-panel').on('click', function(){
        button = 1;

        table.draw();
    });


    $('#nextWeek-panel').on('click', function(){
        button = 2;
        table.draw();
    });


    $('#allJob-panel').on('click', function(){
        button = 0;
        table.draw();

    });

    button = 0;
    table.draw();
    encourage();
    document.getElementById('nextWeekN').innerHTML = number.nextWeekN;
    document.getElementById('todayN').innerHTML = number.todayN;
    document.getElementById('total').innerHTML = number.total;
    document.getElementById('workForToday').innerHTML = number.todayN;



});
