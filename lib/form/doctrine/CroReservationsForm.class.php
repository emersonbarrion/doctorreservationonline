<?php

/**
 * CroReservations form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroReservationsForm extends BaseCroReservationsForm
{
    public function configure()
    {
        unset( $this['created_at'], $this['updated_at'] );
        
        $this->widgetSchema['start'] = new sfWidgetFormInputText();
        $this->widgetSchema['end'] = new sfWidgetFormInputText();
        $this->widgetSchema['userid'] = new sfWidgetFormDoctrineChoice(array('model' => 'CroUsers', 'method' => 'getUsername'));
        $this->widgetSchema['courtid'] = new sfWidgetFormDoctrineChoice(array('model' => 'CroCourts', 'method' => 'getName'));
        $this->widgetSchema['selected_date'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['payment_status']  = new sfWidgetFormChoice(array('choices' => array('PAID' => 'Paid', 'ONHOLD' => 'On hold', 'CANCEL' => 'Cancel')));

        $this->validatorSchema['payment_status']  = new sfValidatorChoice(array('choices' => array('PAID', 'ONHOLD', 'CANCEL')));
        $this->validatorSchema['selected_date'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['start'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['end'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    }
}