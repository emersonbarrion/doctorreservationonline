<?php if(!$sf_user->isAuthenticated()):?>
<div id="registerarea">

  <div id="loginbox">
        <form action="<?php echo url_for('user/register') ?>" method="post">
            <?php echo $form->renderHiddenFields(false) ?>
            <ul>
              <li><div class='form-label'>Email:</div> <?php echo $form['email'] ?></li>
              <li class="error">&nbsp; <?php echo $form['email']->getError() ?></li>
              <li><div class='form-label'>Password:</div> <?php echo $form['password'] ?></li>
              <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
              <li style="float:right;"><input name="Submit" type="submit" value="Submit" class="boxbutton"/></li>
            </ul> 
            <div class="clearfix"></div>
        </form>
  </div>

</div>
<?php endif; ?>