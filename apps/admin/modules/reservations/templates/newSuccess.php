<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('admin')): ?>
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
    </table>
    <input id="submit-new-reservation-without-pay" name="Submit" type="submit" value="Save with Paid"/>
</form>