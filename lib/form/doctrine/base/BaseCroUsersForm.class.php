<?php

/**
 * CroUsers form base class.
 *
 * @method CroUsers getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'username'     => new sfWidgetFormInputText(),
      'password'     => new sfWidgetFormInputText(),
      'fname'        => new sfWidgetFormInputText(),
      'lname'        => new sfWidgetFormInputText(),
      'minitial'     => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'phone'        => new sfWidgetFormInputText(),
      'subscription' => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'     => new sfValidatorString(array('max_length' => 255)),
      'password'     => new sfValidatorString(array('max_length' => 32)),
      'fname'        => new sfValidatorString(array('max_length' => 255)),
      'lname'        => new sfValidatorString(array('max_length' => 255)),
      'minitial'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'        => new sfValidatorString(array('max_length' => 255)),
      'phone'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'subscription' => new sfValidatorString(array('max_length' => 255)),
      'status'       => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'CroUsers', 'column' => array('username'))),
        new sfValidatorDoctrineUnique(array('model' => 'CroUsers', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('cro_users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroUsers';
  }

}
