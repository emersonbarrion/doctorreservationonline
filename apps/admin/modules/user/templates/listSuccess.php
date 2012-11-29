<table>
  <?php foreach ($pager as $cro_user): ?>
  <tr>
    <td align="center" valign="top"><a href='<?php echo url_for('user/edit?id=' . $cro_user->getId()) ?>'><?php echo $cro_user->getId() ?></a></td>
    <td align="center" valign="top"><?php echo $cro_user->getUsername() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getFname() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getLname() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getMinitial() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getEmail() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getPhone() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getSubscription() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getStatus() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getCreatedAt() ?></td>
    <td align="center" valign="top"><?php echo $cro_user->getUpdatedAt() ?></td>
  </tr>
  <?php endforeach; ?>
</table>