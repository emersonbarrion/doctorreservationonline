<table>
  <?php foreach ($pager as $cro_adminuser): ?>
  <tr>
    <td align="center" valign="top"><a href='<?php echo url_for('page/edit?id=' . $cro_adminuser->getId()) ?>'><?php echo $cro_adminuser->getId() ?></a></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getPageUrl() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getDescription() ?></td>
  </tr>
  <?php endforeach; ?>
</table>