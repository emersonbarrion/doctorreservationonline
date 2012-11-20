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
      'name'                  => new sfWidgetFormInputText(),
      'status'                => new sfWidgetFormInputCheckbox(),
      'indoor'                => new sfWidgetFormInputCheckbox(),
      'lights'                => new sfWidgetFormInputCheckbox(),
      'priorreservationhours' => new sfWidgetFormInputText(),
      'maxreservationhours'   => new sfWidgetFormInputText(),
      'rate'                  => new sfWidgetFormInputText(),
      'start_time'            => new sfWidgetFormDateTime(),
      'end_time'              => new sfWidgetFormDateTime(),
      'created_by'            => new sfWidgetFormInputText(),
      'updated_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroAdminUsers'), 'add_empty' => false)),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255)),
      'status'                => new sfValidatorBoolean(array('required' => false)),
      'indoor'                => new sfValidatorBoolean(array('required' => false)),
      'lights'                => new sfValidatorBoolean(array('required' => false)),
      'priorreservationhours' => new sfValidatorInteger(),
      'maxreservationhours'   => new sfValidatorInteger(),
      'rate'                  => new sfValidatorPass(),
      'start_time'            => new sfValidatorDateTime(),
      'end_time'              => new sfValidatorDateTime(),
      'created_by'            => new sfValidatorInteger(),
      'updated_by'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroAdminUsers'))),
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
