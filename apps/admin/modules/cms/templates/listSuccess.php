<table>
  <?php foreach ($pager as $cro_adminuser): ?>
  <tr>
    <td align="center" valign="top"><a href='<?php echo url_for('cms/edit?id=' . $cro_adminuser->getId()) ?>'><?php echo $cro_adminuser->getId() ?></a></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getPageUrlId() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getContentName() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getContentText() ?></td>
    <td align="center" valign="top"><?php echo $cro_adminuser->getContentImage() ?></td>
  </tr>
  <?php endforeach; ?>
</table>