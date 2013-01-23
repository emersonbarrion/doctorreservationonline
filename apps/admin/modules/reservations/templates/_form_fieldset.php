<div id="is-available" style ="background-color:red"></div>

<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>

  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php include_partial('reservations/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>
  <?php endforeach; ?>
</fieldset>

<div id='selectedDate'><?php echo $selectedDate ?></div>

<script>
    $(document).ready(function(){

        var selectedDate = $('#selectedDate').text();
        var courtid = $("#cro_reservations_courtid").val();
        var startTime = $('#cro_reservations_start').val();
        var endTime = $('#cro_reservations_end').val();

        $.ajax({
            type: 'GET',
            timeout: 5000,
            url: '/admin.php/reservations/courtavailable',
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
                url: '/admin.php/reservations/courtavailable',
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

        $('#cro_reservations_start, #cro_reservations_end, #cro_reservations_title, #cro_reservations_courtid').focus(function(){
            $('#is-available').empty();
        });

        $("input[type='submit']").live('click', function() {
            var startTime = $('#cro_reservations_start').val();
            var endTime = $('#cro_reservations_end').val();
            var resid = $('#cro_reservations_id').val();

            if(!$('#cro_reservations_title').val() || !$('#cro_reservations_start').val() || 
               !$('#cro_reservations_end').val() || !$('#cro_reservations_courtid').val()) {
              $('#is-available').empty();
              $('#is-available').text('Fill the required fields');
            } else {
              $.ajax({
                type: 'GET',
                timeout: 5000,
                url: '/admin.php/reservations/editreservationavailable',
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

    });
</script>
