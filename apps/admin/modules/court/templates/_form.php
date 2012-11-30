<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('court/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Name:</div> <?php echo $form['name'] ?></li>
              <li class="error">&nbsp; <?php echo $form['name']->getError() ?></li>
              <li><div class='form-label'>Indoor:</div> <?php echo $form['indoor'] ?></li>
              <li class="error">&nbsp; <?php echo $form['indoor']->getError() ?></li>
              <li><div class='form-label'>Lights:</div> <?php echo $form['lights'] ?></li>
              <li class="error">&nbsp; <?php echo $form['lights']->getError() ?></li>
              <li><div class='form-label'>Prior reservation hours:</div> <?php echo $form['priorreservationhours'] ?></li>
              <li class="error">&nbsp; <?php echo $form['priorreservationhours']->getError() ?></li>
              <li><div class='form-label'>Max reservation hours:</div> <?php echo $form['maxreservationhours'] ?></li>
              <li class="error">&nbsp; <?php echo $form['maxreservationhours']->getError() ?></li>
              <li><div class='form-label'>Rate:</div> <?php echo $form['rate'] ?></li>
              <li class="error">&nbsp; <?php echo $form['rate']->getError() ?></li>
              <li><div class='form-label'>Start time:</div> <?php echo $form['start_time'] ?></li>
              <li class="error">&nbsp; <?php echo $form['start_time']->getError() ?></li>
              <li><div class='form-label'>End time:</div> <?php echo $form['end_time'] ?></li>
              <li class="error">&nbsp; <?php echo $form['end_time']->getError() ?></li>
              <li><div class='form-label'>Status:</div> <?php echo $form['status'] ?></li>
              <li class="error">&nbsp; <?php echo $form['status']->getError() ?></li>
              <li><a href='<?php echo url_for('court/remove?id='.$form->getObject()->getId()) ?>'>Delete</a></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>