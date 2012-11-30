<table>
  <?php foreach ($pager as $cro_court): ?>
  <tr>
    <td align="center" valign="top"><a href='<?php echo url_for('court/edit?id=' . $cro_court->getId()) ?>'><?php echo $cro_court->getId() ?></a></td>
    <td align="center" valign="top"><?php echo $cro_court->getName() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getStatus() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getIndoor() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getLights() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getPriorreservationhours() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getMaxreservationhours() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getRate() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getStartTime() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getEndTime() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getCreatedAt() ?></td>
    <td align="center" valign="top"><?php echo $cro_court->getUpdatedAt() ?></td>
  </tr>
  <?php endforeach; ?>
</table>