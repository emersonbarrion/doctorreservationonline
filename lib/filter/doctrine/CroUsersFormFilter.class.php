<?php

/**
 * CroUsers filter form.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroUsersFormFilter extends BaseCroUsersFormFilter
{
  public function configure()
  {
 		$this->widgetSchema['status']   	= new sfWidgetFormChoice(array('choices' => array('' => 'Any group', '1' => 'Active', '0' => 'Inactive')));
		$this->validatorSchema['status'] 	= new sfValidatorChoice(array('required'=>false, 'choices' => array('','1','0')));
  }
}
