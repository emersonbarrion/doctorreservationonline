<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $cro_admin_users->getEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_fname">
  <?php echo $cro_admin_users->getFname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_lname">
  <?php echo $cro_admin_users->getLname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_address">
  <?php echo $cro_admin_users->getAddress() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_group">
  <?php echo $cro_admin_users->getGroup() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_lastlogin">
  <?php echo false !== strtotime($cro_admin_users->getLastlogin()) ? format_date($cro_admin_users->getLastlogin(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_status">
  <?php echo get_partial('facilitators/list_field_boolean', array('value' => $cro_admin_users->getStatus())) ?>
</td>