<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('user')): ?>
<form action="<?php echo url_for('reservation/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
    <?php echo $form->renderHiddenFields() ?>
    <table>
      <tr><td>Title:</td><td><?php echo $form['title'] ?></td></tr>
      <tr><td></td><td><?php echo $form['title']->getError() ?></td></tr>
      <tr><td>Courtname:</td><td><?php echo $form['courtid'] ?></td></tr>
      <tr><td></td><td><?php echo $form['courtid']->getError() ?></td></tr>
      <tr style='display: none'><td>Date:</td><td id='selectedDate'><?php echo $sf_params->get('selected_date') ?></td></tr>
      <tr><td>Start:</td><td><?php echo $form['start'] ?></td></tr>
      <tr><td></td><td><?php echo $form['start']->getError() ?></td></tr>
      <tr><td>End:</td><td><?php echo $form['end'] ?></td></tr>
      <tr><td></td><td><?php echo $form['end']->getError() ?></td></tr>
      <tr><td>Status:</td><td><?php echo $form['status'] ?></td></tr>
      <tr><td></td><td><?php echo $form['payment_status']->getError() ?></td></tr>
      <tr><td>Payment status:</td><td><?php echo $form['payment_status'] ?></td></tr>
      <tr><td></td><td><?php echo $form['status']->getError() ?></td></tr>
    </table>
    <a href='<?php echo url_for('reservation/remove?id='.$form->getObject()->getId()) ?>'>Delete</a>
    <input name="Submit" type="submit" value="Submit"/>
</form>

<script>
      var selectedDate = $('#selectedDate').text();
      $('#cro_reservations_start').timepicker({'timeFormat' : 'h:i A'});
      $('#cro_reservations_end').timepicker({'timeFormat' : 'h:i A'});
      $('#cro_reservations_selected_date').attr('value', selectedDate);
</script>
<?php else: ?>
Please sign in before editting a reservation <a href="<?php echo url_for('index/index') ?>">Sign in</a> / <a href="<?php echo url_for('user/register') ?>">Register</a>
<?php endif; ?>