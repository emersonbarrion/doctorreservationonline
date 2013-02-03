<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@cro_reservations') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('reservations/form_fieldset', array('cro_reservations' => $cro_reservations, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset, 'selectedDate' => $selectedDate)) ?>
    <?php endforeach; ?>

    <?php include_partial('reservations/form_actions', array('cro_reservations' => $cro_reservations, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
