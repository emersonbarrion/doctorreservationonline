<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $cro_reservations->getTitle() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_userid">
  <?php echo $cro_reservations->getUser() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_courtid">
  <?php echo $cro_reservations->getUnit() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_start">
  <?php echo false !== strtotime($cro_reservations->getStart()) ? format_date($cro_reservations->getStart(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_end">
  <?php echo false !== strtotime($cro_reservations->getEnd()) ? format_date($cro_reservations->getEnd(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_hours">
  <?php echo $cro_reservations->getHours() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_amount">
  <?php echo $cro_reservations->getAmount() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_status">
  <?php echo get_partial('reservations/list_field_boolean', array('value' => $cro_reservations->getStatus())) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($cro_reservations->getCreatedAt()) ? format_date($cro_reservations->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($cro_reservations->getUpdatedAt()) ? format_date($cro_reservations->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
