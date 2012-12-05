<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('facilitator/'.($form->getObject()->isNew() ? 'new' : 'edit').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Username:</div> <?php echo $form['username'] ?></li>
              <li class="error">&nbsp; <?php echo $form['username']->getError() ?></li>
              <li><div class='form-label'>Password:</div> <?php echo $form['password'] ?></li>
              <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
              <li><div class='form-label'>Email:</div> <?php echo $form['email'] ?></li>
              <li class="error">&nbsp; <?php echo $form['email']->getError() ?></li>
              <li><div class='form-label'>Firstname:</div> <?php echo $form['fname'] ?></li>
              <li class="error">&nbsp; <?php echo $form['fname']->getError() ?></li>
              <li><div class='form-label'>Lastname:</div> <?php echo $form['lname'] ?></li>
              <li class="error">&nbsp; <?php echo $form['lname']->getError() ?></li>
              <li><div class='form-label'>Address:</div> <?php echo $form['address'] ?></li>
              <li class="error">&nbsp; <?php echo $form['address']->getError() ?></li>
              <li><div class='form-label'>Contact Home:</div> <?php echo $form['contact1'] ?></li>
              <li class="error">&nbsp; <?php echo $form['contact1']->getError() ?></li>
              <li><div class='form-label'>Contact Office:</div> <?php echo $form['contact2'] ?></li>
              <li class="error">&nbsp; <?php echo $form['contact2']->getError() ?></li>
              <li><div class='form-label'>User Group:</div> <?php echo $form['user_group'] ?></li>
              <li class="error">&nbsp; <?php echo $form['user_group']->getError() ?></li>
              <li><div class='form-label'>Status:</div> <?php echo $form['status'] ?></li>
              <li class="error">&nbsp; <?php echo $form['status']->getError() ?></li>
              <li><a href='<?php echo url_for('facilitator/remove?id='.$form->getObject()->getId()) ?>'>Delete</a></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>