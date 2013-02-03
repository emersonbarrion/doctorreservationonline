<?php echo $sf_data->getRaw('info') ?>

<div class="clearfix"></div>

<!-- ADDRESS BOX -->
<div id="addressbox"><p><strong>1111 South Figueroa Street  Los Angeles, CA 90015, United States<br />
(213) 742-7326</strong></p>
<iframe width="310" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?hl=en&amp;q=staples+center&amp;ie=UTF8&amp;hq=staples+center&amp;t=m&amp;ll=34.043136,-118.267025&amp;spn=0.018491,0.032015&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.ph/maps?hl=en&amp;q=staples+center&amp;ie=UTF8&amp;hq=staples+center&amp;t=m&amp;ll=34.043136,-118.267025&amp;spn=0.018491,0.032015&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>  </div>    
<!-- ADDRESS BOX --> 

<?php if(!$sf_user->isAuthenticated() || !$sf_user->hasCredential(array('user'))):?>
<div id="loginarea">
  <div id="loginbox">
      <form action="<?php echo url_for('index/index') ?>" method="post">
    	<?php echo $form->renderHiddenFields(false) ?>
        <ul>  
          <li>Email Address</li>
          <li><?php echo $form['email'] ?></li>
          <li class="error">&nbsp; <?php echo $form['email']->getError() ?></li>
          <li>Password:</li>
          <li><?php echo $form['password'] ?></li>
          <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
          <li style="float:left;" class="mainsm"><?php echo $form['remember_me'] ?> Remember Me <?php echo $form['remember_me']->getError() ?></li>
          <li style="float:right;"><input name="Submit" type="submit" value="Log In" class="boxbutton"/></li>
        </ul> 
        <div class="clearfix"></div> 
    </form>
  </div>

  <p align="center"><a href="#">View Schedule</a> | <a id='forgot-password' href="#">Forgot my password</a></p>
</div>
<?php endif; ?>

<div id='forgot-password-container' class='center'>
    <?php include_partial('user/forgotpassword') ?>
</div>

<div class="clearfix"></div>
