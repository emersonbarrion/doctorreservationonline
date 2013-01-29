$(document).ready(function(){

	$('ul.tabs').each(function(){
	    var $active, $content, $links = $(this).find('a');
	    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
	    $active.addClass('active');
	    $content = $($active.attr('href'));

	    $links.not($active).each(function () {
	        $($(this).attr('href')).hide();
	    });

	    $(this).on('click', 'a', function(e){
	        $active.removeClass('active');
	        $content.hide();
	        $active = $(this);
	        $content = $($(this).attr('href'));
	        $active.addClass('active');
	        $content.show();
	        e.preventDefault();
	    });
	});
	
	$("div#calendar").bind({
	mousemove : changeTooltipPosition,
	mouseenter : showTooltip,
	mouseleave: hideTooltip
	});

});

/* Get the reservation time range */
var startTime;
var endTime;
var getReservationTimeRange;

getReservationTimeRange = function(startTime, endTime){
    return moment(startTime).format("hh:mm a") + ' - ' + moment(endTime).format("hh:mm a");
};

var showTooltip = function(event) {
   $('div.tooltip').remove();
   $('<div class="tooltip">Please click on any date <br/> to create a new reservation.</div>')
     .appendTo('body');
   changeTooltipPosition(event);
};

var changeTooltipPosition = function(event) {
	var tooltipX = event.pageX - 8;
	var tooltipY = event.pageY + 8;
	$('div.tooltip').css({top: tooltipY, left: tooltipX});
};

var hideTooltip = function() {
	$('div.tooltip').remove();
};