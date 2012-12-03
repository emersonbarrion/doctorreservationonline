<div id="headerdiv">
	<div id="head1"><img src="/images/logo.png" width="230" height="62" /></div>
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
			<li class="menubaritem first"><a href="<?php echo url_for('account/index') ?>">ACCOUNT</a>
				<ul>
					<li class="menuitem"><a href="<?php echo url_for('user/edit') ?>">Profile</a></li>
					<li class="menuitem"><a href="#">Change Password</a></li>
				</ul>
			</li>
			<?php endif; ?>
			<li class="menubaritem"><a href="<?php echo url_for('reservation/index') ?>">RESERVATION</a></li>
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
	<?php endif; ?>
</div>

<?php if(!$sf_user->isAuthenticated() || !$sf_user->hasCredential(array('user'))): ?>
	<div id="spiel2">TEXT HERE ( MAYBE COMPANY SLOGAN OR QUOTE )</div>
<?php endif; ?>