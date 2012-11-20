<?php

/**
 * CroReservations form base class.
 *
 * @method CroReservations getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroReservationsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'userid'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroUsers'), 'add_empty' => false)),
      'courtid'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroCourts'), 'add_empty' => false)),
      'start_date'     => new sfWidgetFormDate(),
      'end_date'       => new sfWidgetFormDate(),
      'start_time'     => new sfWidgetFormDateTime(),
      'end_time'       => new sfWidgetFormDateTime(),
      'status'         => new sfWidgetFormInputCheckbox(),
      'payment_status' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'userid'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroUsers'))),
      'courtid'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroCourts'))),
      'start_date'     => new sfValidatorDate(),
      'end_date'       => new sfValidatorDate(),
      'start_time'     => new sfValidatorDateTime(),
      'end_time'       => new sfValidatorDateTime(),
      'status'         => new sfValidatorBoolean(array('required' => false)),
      'payment_status' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cro_reservations[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroReservations';
  }

}
