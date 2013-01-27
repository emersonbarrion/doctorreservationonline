<div id='loading' style='display:none'>Loading...</div>

<ul class='tabs'>
    <li><a href='#tab1'>Calendar View</a></li>
    <li><a href='#tab2'>List View</a></li>
</ul>


<div id='reservation-container'>
	<div id='tab1'>
	    <div id='calendar'></div>
		<br/>
		<br/>
		<?php include_partial('reservation/reservationnotification') ?>
	</div>
	<div id='tab2'>
	    <div id='my-reservation-list'>
			<?php include_partial('reservation/list', array('myreservationlist' => $myreservationlist)) ?>
		</div>
	</div>
</div>

<div id="add-event" class="center"></div>
<div id="edit-event" class="center"></div>