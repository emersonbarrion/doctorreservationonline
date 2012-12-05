<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('admin', 'facilitator'))): ?>
	<div id="user">Sign in as <?php echo $sf_user->getAttribute('userfullname') ?></div>
<?php endif; ?>

<div style='float:left; width: 200px'>
ADMINISTRATION PAGE<br/><br/>
<?php if($sf_user->isAuthenticated() && $sf_user->hasCredential(array('admin', 'facilitator'))): ?>
	<a href="<?php echo url_for('index/logout') ?>">LOGOUT</a>
<?php endif; ?>

<br/><br/>
<a href='<?php echo url_for('user/new') ?>'>New User</a><br/>
<a href='<?php echo url_for('user/list') ?>'>User List</a><br/>

<br/><br/>

<a href='<?php echo url_for('facilitator/new') ?>'>New Facilitator</a><br/>
<a href='<?php echo url_for('facilitator/list') ?>'>Facilitator List</a><br/>

<br/><br/>

<a href='<?php echo url_for('court/new') ?>'>Create Court</a><br/>
<a href='<?php echo url_for('court/list') ?>'>Retrieve Court</a><br/>

<br/><br/>

<a href='<?php echo url_for('reservation/new') ?>'>Create Reservation</a><br/>
<a href='<?php echo url_for('reservation/list') ?>'>Reservation List</a><br/>

<br/><br/>

<a href='<?php echo url_for('page/new') ?>'>Create Page</a><br/>
<a href='<?php echo url_for('page/list') ?>'>Page List</a><br/>

<br/><br/>

<a href='<?php echo url_for('cms/new') ?>'>Create Cms</a><br/>
<a href='<?php echo url_for('cms/list') ?>'>Cms List</a><br/>
</div>