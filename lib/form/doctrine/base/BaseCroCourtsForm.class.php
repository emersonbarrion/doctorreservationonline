<?php

/**
 * CroCourts form base class.
 *
 * @method CroCourts getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroCourtsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'room'                  => new sfWidgetFormInputText(),
      'name'                  => new sfWidgetFormInputText(),
      'location'              => new sfWidgetFormInputText(),
      'priorreservationhours' => new sfWidgetFormInputText(),
      'maxreservationhours'   => new sfWidgetFormInputText(),
      'rate'                  => new sfWidgetFormInputText(),
      'start_time'            => new sfWidgetFormInputText(),
      'end_time'              => new sfWidgetFormInputText(),
      'status'                => new sfWidgetFormInputCheckbox(),
      'remarks'               => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'room'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255)),
      'location'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'priorreservationhours' => new sfValidatorInteger(),
      'maxreservationhours'   => new sfValidatorInteger(),
      'rate'                  => new sfValidatorPass(),
      'start_time'            => new sfValidatorString(array('max_length' => 255)),
      'end_time'              => new sfValidatorString(array('max_length' => 255)),
      'status'                => new sfValidatorBoolean(array('required' => false)),
      'remarks'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cro_courts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroCourts';
  }

}
