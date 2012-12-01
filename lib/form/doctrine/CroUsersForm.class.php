<?php

/**
 * CroUsers form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroUsersForm extends BaseCroUsersForm
{
	public function configure()
	{
		unset( $this['created_at'], $this['updated_at'] );

		$this->widgetSchema['password'] = new sfWidgetFormInputPassword();
		$this->widgetSchema['subscription']  = new sfWidgetFormChoice(array('choices' => array('monthly' => 'Monthly', 'yearly' => 'Yearly')));
		$this->validatorSchema['subscription'] 	= new sfValidatorChoice(array('choices' => array('monthly','yearly')));

		if($this->isNew()){
			$this->validatorSchema['username'] = new sfValidatorAnd(array(
				new sfValidatorDoctrineUnique(array('model' => 'CroUsers', 'column' => 'Username', 'throw_global_error' => true), array('invalid' => "Username is not available.")),
			));
			$this->validatorSchema['email'] = new sfValidatorAnd(array(
							new sfValidatorEmail(array(), array('required' => 'PLEASE ENTER EMAIL!', 'invalid' => 'Please enter Valid Email')),
							new sfValidatorDoctrineUnique(array('model' => 'CroUsers', 'column' => 'Email', 'throw_global_error' => true), array('invalid' => "Email is not available."))
							));
		} else {
			$this->widgetSchema['username'] = new sfWidgetFormInput(array(), array('readonly' => 'readonly'));
			$this->widgetSchema['email'] 	= new sfWidgetFormInput(array(), array('readonly' => 'readonly'));
		}

		$this->widgetSchema->setNameFormat('user[%s]');
  	}
}