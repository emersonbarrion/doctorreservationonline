<div id="registerarea">

    <div id="loginbox">
        <form action="<?php echo url_for('user/changepassword').'?activationkey='.$activationkey ?>" method="post">
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Email:</div> <?php echo $useremail ?></li>
              <li><div class='form-label'>New Password:</div> <?php echo $form['password'] ?></li>
              <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
              <li><div class='form-label'>Retype Password:</div> <?php echo $form['password2'] ?></li>
              <li class="error">&nbsp; <?php echo $form['password2']->getError() ?></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
    </div>

</div>