<?php

/**
 * CroAdminUsers filter form base class.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCroAdminUsersFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'        => new sfWidgetFormFilterInput(),
      'contact1'       => new sfWidgetFormFilterInput(),
      'contact2'       => new sfWidgetFormFilterInput(),
      'website'        => new sfWidgetFormFilterInput(),
      'company_slogan' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_logo'   => new sfWidgetFormFilterInput(),
      'lastlogin'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'status'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'       => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'password'       => new sfValidatorPass(array('required' => false)),
      'fname'          => new sfValidatorPass(array('required' => false)),
      'lname'          => new sfValidatorPass(array('required' => false)),
      'address'        => new sfValidatorPass(array('required' => false)),
      'contact1'       => new sfValidatorPass(array('required' => false)),
      'contact2'       => new sfValidatorPass(array('required' => false)),
      'website'        => new sfValidatorPass(array('required' => false)),
      'company_slogan' => new sfValidatorPass(array('required' => false)),
      'company_logo'   => new sfValidatorPass(array('required' => false)),
      'lastlogin'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'status'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cro_admin_users_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroAdminUsers';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'username'       => 'Text',
      'email'          => 'Text',
      'password'       => 'Text',
      'fname'          => 'Text',
      'lname'          => 'Text',
      'address'        => 'Text',
      'contact1'       => 'Text',
      'contact2'       => 'Text',
      'website'        => 'Text',
      'company_slogan' => 'Text',
      'company_logo'   => 'Text',
      'lastlogin'      => 'Date',
      'status'         => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
