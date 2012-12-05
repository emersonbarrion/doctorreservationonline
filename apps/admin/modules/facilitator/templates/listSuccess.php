<table>
  <?php foreach ($pager as $cro_adminuser): ?>
  <tr>
    <td align="center" valign="top"><a href='<?php echo url_for('facilitator/edit?id=' . $cro_adminuser->getId()) ?>'><?php echo $cro_adminuser->getId() ?></a></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getUsername() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getEmail() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getFname() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getLname() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getAddress() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getContact1() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getContact2() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getUserGroup() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getLastlogin() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getStatus() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getCreatedAt() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getUpdatedAt() ?></td>
  </tr>
  <?php endforeach; ?>
</table>