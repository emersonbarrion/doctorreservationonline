<?php

/**
 * CroAdminUsers form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroAdminUsersForm extends BaseCroAdminUsersForm
{
	public function configure()
	{
		unset( $this['created_at'], $this['updated_at'], $this['lastlogin'] );

		$this->widgetSchema['password'] = new sfWidgetFormInputPassword();

		if($this->isNew()){
			$this->validatorSchema['email'] = new sfValidatorAnd(array(
							new sfValidatorEmail(array(), array('required' => 'PLEASE ENTER EMAIL!', 'invalid' => 'Please enter Valid Email')),
							new sfValidatorDoctrineUnique(array('model' => 'CroUsers', 'column' => 'Email', 'throw_global_error' => true), array('invalid' => "Email is not available."))
							));
		} else {
			$this->widgetSchema['email'] 	= new sfWidgetFormInput(array(), array('readonly' => 'readonly'));
		}
		
        $this->widgetSchema['status']  = new sfWidgetFormChoice(array('choices' => array(0 => 'Inactive',1 => 'Active')));
        $this->validatorSchema['status']  = new sfValidatorChoice(array('choices' => array(0,1)));

		$this->widgetSchema->setNameFormat('admin[%s]');
  	}
}