<div id="loginarea" style='float:left'>
  <div id="loginbox">
      <form action="<?php echo url_for('index/login') ?>" method="post">
		  <?php echo $form['_csrf_token'] ?>
    	<?php echo $form->renderHiddenFields(false) ?>
        <ul>
          <li>Email Address</li>
          <li><?php echo $form['email'] ?></li>
          <li class="error">&nbsp; <?php echo $form['email']->getError() ?></li>
          <li>Password:</li>
          <li><?php echo $form['password'] ?></li>
          <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
          <li style="float:right;"><input name="Submit" type="submit" value="Log In" class="boxbutton"/></li>
        </ul> 
        <div class="clearfix"></div>
    </form>
  </div>
</div>