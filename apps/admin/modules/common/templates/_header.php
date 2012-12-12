<div id="logo"><img src="/uploads/<?php echo 'logo.png' ?>" width="180" height="130" /></div>

<div id="menu">
	<ul id="nav" class="menubar">
		<li class="menubaritem first"><a href="<?php echo url_for('index/index') ?>">Dashboard</a></li>
		<li class="menubaritem first"><a href="<?php echo url_for('users/index') ?>">Users</a></li>
		<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('admin', 'facilitator'), false)): ?>
		<li class="menubaritem"><a href="<?php echo url_for('index/logout') ?>">Logout</a></li>
		<?php endif; ?>
	</ul>

	<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('admin', 'facilitator'), false)): ?>
		<div id="user">Sign in as <?php echo $sf_user->getAttribute('userfullname') ?></div>
	<?php endif; ?>
</div>