var hideElement = function(){
	$('#add-event').hide();
	$('#edit-event').hide();
};

var setDimBackground = function(){
	var totalHeight = $('body').height();
	$('.dim').css({'height' : totalHeight + 'px', 'display' : 'block'});
};

$(document).ready(function() {

	var pathArray = window.location.pathname.split( '/' );
	var userId = $('#userid').text();

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month, basicWeek'
		},

		events: "/reservation/events?reserve=" + pathArray[2],
		
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
					$('#edit-event').empty();
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
					data: { id: calEvent.id, selected_date: moment(calEvent.start).format('YYYY-MM-DD') },

					success:function(data){
						$('#add-event').empty();
						$('#edit-event').empty();
						$('#edit-event').show();
						$('#edit-event').append(data);
					}
				});

		        $('.fc-view div').css('z-index','8');
	    },

	    eventRender: function(event, element) {
	    	var timeRange = getReservationTimeRange(event.start, event.end);
	    	element.find('.fc-event-title').prepend(timeRange + "<br/>");
	    	element.find('.fc-event-title').append(' - ' + event.CroUsers.username);
	    	if(userId == event.userid){
	    		element.find('.fc-event-skin').css('background-color','green');
	    	}
		}

	});

	$('.dim').live('click', function(){
		$(this).toggle();
		hideElement();
	});
});