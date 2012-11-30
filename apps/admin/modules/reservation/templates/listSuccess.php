<table>
  <?php foreach ($pager as $cro_reservation): ?>
  <tr>
    <td align="center" valign="top"><a href='<?php echo url_for('reservation/edit?id=' . $cro_reservation->getId()) ?>'><?php echo $cro_reservation->getId() ?></a></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getTitle() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getUserid() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getCourtid() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getStart() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getEnd() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getStatus() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getPaymentStatus() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getCreatedAt() ?></td>
    <td align="center" valign="top"><?php echo $cro_reservation->getUpdatedAt() ?></td>
  </tr>
  <?php endforeach; ?>
</table>