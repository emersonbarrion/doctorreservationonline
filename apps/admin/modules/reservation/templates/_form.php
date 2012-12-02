<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('reservation/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Title:</div> <?php echo $form['title'] ?></li>
              <li class="error">&nbsp; <?php echo $form['title']->getError() ?></li>
              <li><div class='form-label'>Username:</div> <?php echo $form['userid'] ?></li>
              <li class="error">&nbsp; <?php echo $form['userid']->getError() ?></li>
              <li><div class='form-label'>Courtname:</div> <?php echo $form['courtid'] ?></li>
              <li class="error">&nbsp; <?php echo $form['courtid']->getError() ?></li>
              <li><div class='form-label'>Start:</div> <?php echo $form['start'] ?></li>
              <li class="error">&nbsp; <?php echo $form['start']->getError() ?></li>
              <li><div class='form-label'>End:</div> <?php echo $form['end'] ?></li>
              <li class="error">&nbsp; <?php echo $form['end']->getError() ?></li>
              <li><div class='form-label'>Status:</div> <?php echo $form['status'] ?></li>
              <li class="error">&nbsp; <?php echo $form['payment_status']->getError() ?></li>
              <li><div class='form-label'>Payment status:</div> <?php echo $form['payment_status'] ?></li>
              <li class="error">&nbsp; <?php echo $form['status']->getError() ?></li>
              <li><a href='<?php echo url_for('reservation/remove?id='.$form->getObject()->getId()) ?>'>Delete</a></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>