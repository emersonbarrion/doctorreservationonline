<td class="sf_admin_text sf_admin_list_td_activationkey">
    <?php echo $cro_users->getActivationkey() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $cro_users->getEmail() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_fname">
  <?php echo $cro_users->getFname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_lname">
  <?php echo $cro_users->getLname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_phone">
  <?php echo $cro_users->getPhone() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subscription">
  <?php echo $cro_users->getSubscription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_status">
  <?php echo get_partial('users/list_field_boolean', array('value' => $cro_users->getStatus())) ?>
</td>