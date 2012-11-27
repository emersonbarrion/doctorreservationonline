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
		$this->setWidgets(array(
		    'username'  	=> new sfWidgetFormInput(),
		    'password'		=> new sfWidgetFormInputPassword(),
		    'fname'  		=> new sfWidgetFormInput(),
		    'lname'  		=> new sfWidgetFormInput(),
		    'minitial'  	=> new sfWidgetFormInput(),
		    'email'  		=> new sfWidgetFormInput(),
		    'phone'  		=> new sfWidgetFormInput(),
		    'subscription'  => new sfWidgetFormChoice(array('choices' => array('monthly' => 'Monthly', 'yearly' => 'Yearly'))),
		    'status'  		=> new sfWidgetFormInputCheckbox()
		));

		$this->setValidators(array(
			'username' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Username')),
			'password' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Password')),
			'fname' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Firstname')),
			'lname' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Lastname')),
			'minitial' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Initial')),
			'email' 		=> new sfValidatorAnd(array(new sfValidatorEmail(array(), 
				  															 array('required' => 'PLEASE ENTER EMAIL!', 'invalid' => 'Please enter Valid Email')),
														new sfValidatorDoctrineUnique(array( 'model' => 'CroUsers', 'column' => 'Email', 'throw_global_error' => true),
																					  array('invalid' => "Email is not available.")))),
			'phone' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Phone number')),
			'subscription' 	=> new sfValidatorChoice(array('choices' => array('monthly','yearly'))),
			'status'		=> new sfValidatorBoolean()
		));

		$this->widgetSchema->setNameFormat('register[%s]');
  	}
}