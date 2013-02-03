<?php use_helper('I18N', 'Date') ?>
<?php include_partial('reservations/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Reservations', array(), 'messages') ?></h1>

  <?php include_partial('reservations/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('reservations/form_header', array('cro_reservations' => $cro_reservations, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('reservations/form', array('cro_reservations' => $cro_reservations, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'selectedDate' => $selectedDate)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('reservations/form_footer', array('cro_reservations' => $cro_reservations, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
