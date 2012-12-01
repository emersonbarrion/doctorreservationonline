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
			right: 'month'
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
			$.ajax({
				type: 'GET',
				timeout: 5000,
				url: '/reservation/new',
				data: { selected_date: moment(date).format('YYYY-MM-DD') },

				success:function(data){
					$('#add-event').empty();
					$('#add-event').show();
					$('#add-event').append(data);
				}
			});

	        $('.fc-view div').css('z-index','8');
	    },
	    eventClick: function(calEvent, jsEvent, view) {
	        setDimBackground();
			$.ajax({
				type: 'GET',
				timeout: 5000,
				url: '/reservation/edit',
				data: { id: calEvent.id },

				success:function(data){
					$('#edit-event').empty();
					$('#edit-event').show();
					$('#edit-event').append(data);
				}
			});

			console.log(calEvent);
	        $('.fc-view div').css('z-index','8');
	    },

	    eventRender: function(event, element) {         
	    	var timeRange = getReservationTimeRange(event.start, event.end);
	    	element.find('.fc-event-title').prepend(timeRange + "<br/>");
		}
		
	});

	$('.dim').live('click', function(){
		$(this).toggle();
		hideElement();
	});
});