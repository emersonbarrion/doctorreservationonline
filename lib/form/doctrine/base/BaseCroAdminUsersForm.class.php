<?php

/**
 * CroAdminUsers form base class.
 *
 * @method CroAdminUsers getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroAdminUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'activationkey' => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'password'      => new sfWidgetFormInputText(),
      'fname'         => new sfWidgetFormInputText(),
      'lname'         => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormTextarea(),
      'contact1'      => new sfWidgetFormInputText(),
      'contact2'      => new sfWidgetFormInputText(),
      'user_group'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroGroups'), 'add_empty' => false)),
      'lastlogin'     => new sfWidgetFormDateTime(),
      'status'        => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'activationkey' => new sfValidatorString(array('max_length' => 32)),
      'email'         => new sfValidatorString(array('max_length' => 255)),
      'password'      => new sfValidatorString(array('max_length' => 32)),
      'fname'         => new sfValidatorString(array('max_length' => 255)),
      'lname'         => new sfValidatorString(array('max_length' => 255)),
      'address'       => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'contact1'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact2'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_group'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroGroups'))),
      'lastlogin'     => new sfValidatorDateTime(array('required' => false)),
      'status'        => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CroAdminUsers', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('cro_admin_users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroAdminUsers';
  }

}
