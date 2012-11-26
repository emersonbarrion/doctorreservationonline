<p><a href="#"><strong>Mycourt.com</strong></a> is your online tennis reservation system. No more worrying with lost sign-up sheets, no more conflicts, and no more hoping there is an open court when you arrive. Participating facilities will instantly offer their tennis players access to online and telephone reservations and that is just the beginning. Reserve MyCourt is ABSOLUTELY FREE to both players and facilities and is supported by advertising. So <a href="#">Click Here</a> to see our current membership, and then join us!</p>

<div class="clearfix"></div>

<!-- ADDRESS BOX -->
<div id="addressbox"><p><strong>1111 South Figueroa Street  Los Angeles, CA 90015, United States<br />
(213) 742-7326</strong></p>
<iframe width="310" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?hl=en&amp;q=staples+center&amp;ie=UTF8&amp;hq=staples+center&amp;t=m&amp;ll=34.043136,-118.267025&amp;spn=0.018491,0.032015&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.ph/maps?hl=en&amp;q=staples+center&amp;ie=UTF8&amp;hq=staples+center&amp;t=m&amp;ll=34.043136,-118.267025&amp;spn=0.018491,0.032015&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>  </div>    
<!-- ADDRESS BOX --> 

<?php if(!$sf_user->isAuthenticated()):?>
<div id="loginarea">
  <div id="loginbox">
      <form action="<?php echo url_for('index/index') ?>" method="post">
		  <?php echo $form['_csrf_token'] ?>
    	<?php echo $form->renderHiddenFields(false) ?>
        <ul>  
          <li>Email Address (username)</li>
          <li><?php echo $form['username'] ?></li>
          <li class="error">&nbsp; <?php echo $form['username']->getError() ?></li>
          <li>Password:</li>
          <li><?php echo $form['password'] ?></li>
          <li class="error">&nbsp; <?php echo $form['password']->getError() ?></li>
          <li style="float:left;" class="mainsm"><?php echo $form['remember_me'] ?> Remember Me <?php echo $form['remember_me']->getError() ?></li>
          <li style="float:right;"><input name="Submit" type="submit" value="Log In" class="boxbutton"/></li>
        </ul> 
        <div class="clearfix"></div> 
    </form>
  </div>

  <p align="center"><a href="#">View Schedule</a> | <a href="#">Forgot my password</a></p>
</div>
<?php endif; ?>

<div class="clearfix"></div>
