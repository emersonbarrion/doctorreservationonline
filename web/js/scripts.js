$(document).ready(function(){

});

/* Get the reservation time range */
var startTime;
var endTime;
var getReservationTimeRange;

getReservationTimeRange = function(startTime, endTime){
    return moment(startTime).format("hh:mm a") + ' - ' + moment(endTime).format("hh:mm a");
};