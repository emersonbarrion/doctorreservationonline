<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_email">
  <?php if ('email' == $sort[0]): ?>
    <?php echo link_to(__('Email', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=email&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Email', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=email&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_fname">
  <?php if ('fname' == $sort[0]): ?>
    <?php echo link_to(__('Firstname', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=fname&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Firstname', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=fname&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_lname">
  <?php if ('lname' == $sort[0]): ?>
    <?php echo link_to(__('Lastname', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=lname&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Lastname', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=lname&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_address">
  <?php if ('address' == $sort[0]): ?>
    <?php echo link_to(__('Address', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=address&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Address', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=address&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>

<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_group">
  <?php if ('user_group' == $sort[0]): ?>
    <?php echo link_to(__('Group', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=user_group&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Group', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=user_group&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>

<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_lastlogin">
  <?php if ('lastlogin' == $sort[0]): ?>
    <?php echo link_to(__('Last Login', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=lastlogin&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Last Login', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=lastlogin&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_status">
  <?php if ('status' == $sort[0]): ?>
    <?php echo link_to(__('Status', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=status&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Status', array(), 'messages'), '@cro_admin_users', array('query_string' => 'sort=status&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>