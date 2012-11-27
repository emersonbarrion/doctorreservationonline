var hideElement = function(){
	$('#add-event').hide();
	$('#edit-event').hide();
};

var setDimBackground = function(){
	var totalHeight = $('body').height();
	$('.dim').css({'height' : totalHeight + 'px', 'display' : 'block'});
};

$(document).ready(function() {

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},

		events: "/reservation/events",
		
		loading: function(bool) {
			if (bool) {
				setDimBackground();
				$('.dim').show();
				$('#loading').show();
			}
			else {
				$('.dim').hide();
				$('#loading').hide();
			}
		},

	    dayClick: function(date, allDay, jsEvent, view) {
	        setDimBackground();
	        $('#add-event').show();
	        $('.fc-view div').css('z-index','8');
	    },
	    eventClick: function(calEvent, jsEvent, view) {
	        setDimBackground();
	        $('#edit-event').show();
	        $('.fc-view div').css('z-index','8');
	    },

	    eventRender: function(event, element) {         
	    	var startHours = event.start.getHours().pad(2);
	    	var startMinutes = event.start.getMinutes().pad(2);
	    	var endHours = event.end.getHours().pad(2);
	    	var endMinutes = event.end.getMinutes().pad(2);
	    	var reserveTime = startHours + ':' + startMinutes + ' - ' + endHours + ':' + endMinutes  + "<br/>";
	    	element.find('.fc-event-title').prepend(reserveTime);
		    //console.log(eventTime);
		}
		
	});

	Number.prototype.pad = function (len) {
	    return (new Array(len+1).join("0") + this).slice(-len);
	}

	$('.dim').live('click', function(){
		$(this).toggle();
		hideElement();
	});
});
