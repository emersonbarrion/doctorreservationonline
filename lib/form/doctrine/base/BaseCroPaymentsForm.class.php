<?php

/**
 * CroPayments form base class.
 *
 * @method CroPayments getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroPaymentsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'reservationid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroReservations'), 'add_empty' => false)),
      'rate'          => new sfWidgetFormInputText(),
      'payment_date'  => new sfWidgetFormDate(),
      'payment_type'  => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'reservationid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroReservations'))),
      'rate'          => new sfValidatorPass(),
      'payment_date'  => new sfValidatorDate(),
      'payment_type'  => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cro_payments[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroPayments';
  }

}
