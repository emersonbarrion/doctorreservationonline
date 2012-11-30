<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('user/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Username:</div> <?php echo $form['username'] ?></li>
              <li class="error">&nbsp; <?php echo $form['username']->getError() ?></li>
              <li><div class='form-label'>Password:</div> <?php echo $form['password'] ?></li>
              <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
              <li><div class='form-label'>Firstname:</div> <?php echo $form['fname'] ?></li>
              <li class="error">&nbsp; <?php echo $form['fname']->getError() ?></li>
              <li><div class='form-label'>Lastname:</div> <?php echo $form['lname'] ?></li>
              <li class="error">&nbsp; <?php echo $form['lname']->getError() ?></li>
              <li><div class='form-label'>Initial:</div> <?php echo $form['minitial'] ?></li>
              <li class="error">&nbsp; <?php echo $form['minitial']->getError() ?></li>
              <li><div class='form-label'>Email:</div> <?php echo $form['email'] ?></li>
              <li class="error">&nbsp; <?php echo $form['email']->getError() ?></li>
              <li><div class='form-label'>Phone:</div> <?php echo $form['phone'] ?></li>
              <li class="error">&nbsp; <?php echo $form['phone']->getError() ?></li>
              <li><div class='form-label'>Subscription:</div> <?php echo $form['subscription'] ?></li>
              <li class="error">&nbsp; <?php echo $form['subscription']->getError() ?></li>
              <li><div class='form-label'>Status:</div> <?php echo $form['status'] ?></li>
              <li class="error">&nbsp; <?php echo $form['status']->getError() ?></li>
              <li><a href='<?php echo url_for('user/remove?id='.$form->getObject()->getId()) ?>'>Delete</a></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>