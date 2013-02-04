<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('user')): ?>
<div id="is-available" style ="background-color:red"></div>
<form action="<?php echo url_for('reservation/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
    <?php echo $form->renderHiddenFields() ?>
    <table>
      <tr><td>Payment Status:</td><td><?php echo $payment_status ?></td></tr>
      <tr><td>Unit Name:</td><td><?php echo $form['courtid'] ?></td></tr>
      <tr><td></td><td><?php echo $form['courtid']->getError() ?></td></tr>
      <tr><td>Name:</td><td><?php echo $sf_user->getAttribute('userfullname') ?></td></tr>
      <tr><td>Phone:</td><td><?php echo $sf_user->getAttribute('phone') ?></td></tr>
      <tr><td>Email:</td><td><?php echo $sf_user->getAttribute('email') ?></td></tr>
      <tr style='display: none'><td>Date:</td><td id='selectedDate'><?php echo $sf_params->get('selected_date') ?></td></tr>
      <tr><td>Start Time:</td><td><?php echo $form['start'] ?></td></tr>
      <tr><td></td><td><?php echo $form['start']->getError() ?></td></tr>
      <tr><td>End Time:</td><td><?php echo $form['end'] ?></td></tr>
      <tr><td></td><td><?php echo $form['end']->getError() ?></td></tr>
      <tr><td>Appointment Status:</td><td><?php echo $status ?></td></tr>
      <tr><td>Notes:</td><td><?php echo $form['notes'] ?></td></tr>
      <tr><td></td><td><?php echo $form['notes']->getError() ?></td></tr>
    </table>

    <?php if($payment_status != "Paid"): ?>
	<a href='<?php echo url_for('reservation/delete?id='.$form->getObject()->getId()) ?>'>Delete</a>
    <input id="submit-edit-reservation-without-pay" name="Submit" type="submit" value="Pay later"/>	
	<input id="submit-edit-reservation-with-pay" name="Submit" type="image"  src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif" value="Checkout">
	<?php else: ?>
	<a href='<?php echo url_for('reservation/cancel?id='.$form->getObject()->getId()) ?>'>Cancel this Reservation</a>
    <?php endif; ?>

</form>
<br/>
<br/>

<script>
      var selectedDate = $('#selectedDate').text();
      $('#cro_reservations_selected_date').attr('value', selectedDate);

      var courtid = $("#cro_reservations_courtid").val();
        $.ajax({
            type: 'GET',
            timeout: 5000,
            url: '/reservation/courtavailable',
            data: { courtid: courtid, date: selectedDate },

            success:function(data){
                var availableTime = eval(data);
                $('#cro_reservations_start').timepicker('remove');
                $('#cro_reservations_end').timepicker('remove');
                $('#cro_reservations_start').delay(1000).timepicker({'timeFormat' : 'h:i A', 'minTime' : availableTime[0].start_time, 'maxTime' : availableTime[0].end_time});
                $('#cro_reservations_end').delay(1000).timepicker({'timeFormat' : 'h:i A', 'minTime' : availableTime[0].start_time, 'maxTime' : availableTime[0].end_time});
            }
        });

        $("#cro_reservations_courtid").live('change', function() {
            courtid = $(this).val();
            $.ajax({
                type: 'GET',
                timeout: 5000,
                url: '/reservation/courtavailable',
                data: { courtid: courtid, date: selectedDate },

                success:function(data){
                    var availableTime = eval(data);
                    $('#cro_reservations_start').timepicker('remove');
                    $('#cro_reservations_end').timepicker('remove');
                    $('#cro_reservations_start').delay(1000).timepicker({'timeFormat' : 'h:i A', 'minTime' : availableTime[0].start_time, 'maxTime' : availableTime[0].end_time});
                    $('#cro_reservations_end').delay(1000).timepicker({'timeFormat' : 'h:i A', 'minTime' : availableTime[0].start_time, 'maxTime' : availableTime[0].end_time});
                }
            });
        });

        $("#submit-edit-reservation-without-pay, #submit-edit-reservation-with-pay").live('click', function() {
            var startTime = $('#cro_reservations_start').val();
            var endTime = $('#cro_reservations_end').val();
            var resid = $('#cro_reservations_id').val();

            $('#cro_reservations_process').attr('value','save');

            if($(this).attr('id') == 'submit-edit-reservation-with-pay'){
                $('#cro_reservations_process').attr('value','pay');
            }

            if(!$('#cro_reservations_start').val() || !$('#cro_reservations_end').val() || !$('#cro_reservations_courtid').val()) {
              $('#is-available').empty();
              $('#is-available').text('Fill the required fields');
            } else {
              $.ajax({
                type: 'GET',
                timeout: 5000,
                url: '/reservation/editreservationavailable',
                data: { courtid: courtid, date: selectedDate, start: startTime, end: endTime , reservationid: resid },

                success:function(data){
                    $('#is-available').empty();
                    if(!data){
                        $('#is-available').text('Not available');
                    } else if(data == 'error') {
                        $('#is-available').text('Please correct the time selected');
                    } else {
                        $('#is-available').text('Submitting...');
                        $('form').submit();
                    }
                }
              });
            }

            return false;
        });

        $('#cro_reservations_start, #cro_reservations_end').focus(function(){
            $('#is-available').empty();
        });
</script>
<?php else: ?>
Please sign in before editting a reservation <a href="<?php echo url_for('index/index') ?>">Sign in</a> / <a href="<?php echo url_for('user/register') ?>">Register</a>
<?php endif; ?>