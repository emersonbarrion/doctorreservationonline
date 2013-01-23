<?php

/**
 * CroReservations filter form.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroReservationsFormFilter extends BaseCroReservationsFormFilter
{
  public function configure()
  {
 		$this->widgetSchema['status']   	= new sfWidgetFormChoice(array('choices' => array('' => 'Any', 0 => 'Inactive',1 => 'Active')));
		$this->validatorSchema['status'] 	= new sfValidatorChoice(array('required'=>false, 'choices' => array('',0,1)));

		$this->widgetSchema['userid'] 		= new sfWidgetFormInputText();
		
  }
}