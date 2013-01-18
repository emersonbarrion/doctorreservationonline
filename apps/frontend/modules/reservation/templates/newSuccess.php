<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('user')): ?>
<div id="is-available" style ="background-color:red"></div>
<form action="<?php echo url_for('reservation/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
    <?php echo $form->renderHiddenFields() ?>
    <table>
      <tr><td>Courtname:</td><td><?php echo $form['courtid'] ?></td></tr>
      <tr><td></td><td><?php echo $form['courtid']->getError() ?></td></tr>
      <tr><td>Title:</td><td><?php echo $form['title'] ?></td></tr>
      <tr><td></td><td><?php echo $form['title']->getError() ?></td></tr>
      <tr style='display: none'><td>Date:</td><td id='selectedDate'><?php echo $sf_params->get('selected_date') ?></td></tr>
      <tr><td>Start:</td><td><?php echo $form['start'] ?></td></tr>
      <tr><td></td><td><?php echo $form['start']->getError() ?></td></tr>
      <tr><td>End:</td><td><?php echo $form['end'] ?></td></tr>
      <tr><td></td><td><?php echo $form['end']->getError() ?></td></tr>
      <tr><td>Status:</td><td><?php echo $form['status'] ?></td></tr>
      <tr><td></td><td><?php echo $form['status']->getError() ?></td></tr>
    </table>
    <input id="submit-new-reservation-without-pay" name="Submit" type="submit" value="Save"/>
    <input id="submit-new-reservation-with-pay" name="Submit" type="image"  src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif" value="Checkout">
</form>

<script>
  $(document).ready(function(){

      var selectedDate = $('#selectedDate').text();
      $('#cro_reservations_selected_date').attr('value', selectedDate);

        var courtid = $("#cro_reservations_courtid").val();
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

        $("#submit-new-reservation-without-pay, #submit-new-reservation-with-pay").live('click', function() {

                var startTime = $('#cro_reservations_start').val();
                var endTime = $('#cro_reservations_end').val();

                $('#cro_reservations_process').attr('value','save');

                if($(this).attr('id') == 'submit-new-reservation-with-pay'){
                    $('#cro_reservations_process').attr('value','pay');
                }


                if(!$('#cro_reservations_title').val() || !$('#cro_reservations_start').val() || 
                   !$('#cro_reservations_end').val() || !$('#cro_reservations_courtid').val()){
                  $('#is-available').empty();
                  $('#is-available').text('Fill the required fields');
                } else {
                  $.ajax({
                      type: 'GET',
                      timeout: 5000,
                      url: '/reservation/reservationavailable',
                      data: { courtid: courtid, date: selectedDate, start: startTime, end: endTime },

                      success:function(returnedData){
                          $('#is-available').empty();
                          if(!returnedData){
                              $('#is-available').text('Not available');
                          } else if(returnedData == 'error'){
                              $('#is-available').text('Please correct the time selected');
                          }else {
                              $('#is-available').text('Submitting...');

                              $('form').submit();
                          }
                      }
                  });
                }

                return false;

        });

        $('#cro_reservations_start, #cro_reservations_end, #cro_reservations_title, #cro_reservations_court').focus(function(){
            $('#is-available').empty();
        });

  });

</script>
<?php else: ?>
Please sign in before add new reservation <a href="<?php echo url_for('index/index') ?>">Sign in</a> / <a href="<?php echo url_for('user/register') ?>">Register</a>
<?php endif; ?>