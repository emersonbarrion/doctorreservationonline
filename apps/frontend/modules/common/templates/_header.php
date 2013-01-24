<div id="headerdiv">
	<div id="head1"><img src="/uploads/<?php echo $logo ?>" width="180" height="130" /></div>
    <div id="head2"><img src="/images/logo2.png" width="389" height="65" /></div>
</div>

<div class="clearfix"></div>

<div id="header2div">
	<div id="mainmenu">
		<ul id="nav" class="menubar">
			<?php if(!$sf_user->isAuthenticated() || !$sf_user->hasCredential(array('user'))): ?>
			<li class="menubaritem first"><a href="<?php echo url_for('index/index') ?>">HOME</a></li>
			<?php endif; ?>
			<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('user'))): ?>
			<li class="menubaritem first"><a href="<?php echo url_for('dashboard/index') ?>">DASHBOARD</a></li>
			<li class="menubaritem first"><a href="#">ACCOUNT</a>
				<ul>
					<li class="menuitem"><a href="<?php echo url_for('user/edit') ?>">Profile</a></li>
					<li class="menuitem"><a href="#">Change Password</a></li>
				</ul>
			</li>
			<?php endif; ?>
			<li class="menubaritem"><a href="<?php echo url_for('reservation/index') ?>">MY RESERVATIONS</a></li>
			<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('user'))): ?>
			<li class="menubaritem"><a href="<?php echo url_for('reservation/all') ?>">ALL RESERVATIONS</a></li>
			<?php endif; ?>
			<?php if(!$sf_user->isAuthenticated() || !$sf_user->hasCredential(array('user'))): ?>
			<li class="menubaritem"><a href="<?php echo url_for('user/register') ?>">REGISTER</a></li>
			<?php endif; ?>
			<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('user'))): ?>
			<li class="menubaritem"><a href="<?php echo url_for('index/logout') ?>">LOGOUT</a></li>
			<?php endif; ?>
		</ul>
	</div>

	<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('user'))): ?>
		<div id="user">Sign in as <?php echo $sf_user->getAttribute('userfullname') ?></div>
		<div id="userid"><?php echo $sf_user->getAttribute('id') ?></div>
	<?php endif; ?>
</div>

<?php if(!$sf_user->isAuthenticated() || !$sf_user->hasCredential(array('user'))): ?>
	<div id="spiel2"><?php echo $slogan ?></div>
<?php endif; ?>