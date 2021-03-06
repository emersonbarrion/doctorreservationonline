<?php

/**
 * CroLogin form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroLoginForm extends BaseCroUsersForm
{
	public function configure()
	{
		$this->setWidgets(array(
		    'email'  	=> new sfWidgetFormInput(array(), array('class' => 'boxtext')),
		    'password'		=> new sfWidgetFormInputPassword(array(), array('class' => 'boxtext')),
		    'remember_me' 	=> new sfWidgetFormInputCheckbox(array(), array('align' => 'absmiddle')),
		));

		$this->setValidators(array(
			'email' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Email')),
			'password' 		=> new sfValidatorString(array('max_length' => 255), array('required' => 'Please Enter Password')),
			'remember_me'	=> new sfValidatorBoolean()
		));

		$this->widgetSchema->setNameFormat('login[%s]');
  	}
}