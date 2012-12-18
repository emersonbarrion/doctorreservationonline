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
        
        if($this->isNew()){
            $this->widgetSchema['start'] = new sfWidgetFormInputText();
            $this->widgetSchema['end'] = new sfWidgetFormInputText();
        } else {
            $this->widgetSchema['start'] = new sfWidgetFormInputText(array(), array('value' => date('h:i A', strtotime($this->getObject()->getStart()))));
            $this->widgetSchema['end'] = new sfWidgetFormInputText(array(), array('value' => date('h:i A', strtotime($this->getObject()->getEnd()))));
        }

        $this->widgetSchema['userid'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('id')));
        $this->widgetSchema['courtid'] = new sfWidgetFormDoctrineChoice(array('model' => 'CroCourts', 'method' => 'getName', 'add_empty' => true));
        $this->widgetSchema['selected_date'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['payment_status']  = new sfWidgetFormChoice(array('choices' => array('PAID' => 'Paid', 'ONHOLD' => 'On hold', 'CANCEL' => 'Cancel')));

        $this->widgetSchema['status']  = new sfWidgetFormChoice(array('choices' => array(0 => 'Inactive',1 => 'Active')));
        $this->validatorSchema['status']  = new sfValidatorChoice(array('choices' => array(0,1)));
        $this->validatorSchema['payment_status']  = new sfValidatorChoice(array('choices' => array('PAID', 'ONHOLD', 'CANCEL')));
        $this->validatorSchema['selected_date'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['start'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['end'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    }

    public function adminConfigure()
    {
        if($this->isNew()){
            $this->widgetSchema['start'] = new sfWidgetFormInputText();
            $this->widgetSchema['end'] = new sfWidgetFormInputText();
        } else {
            $this->widgetSchema['start'] = new sfWidgetFormInputText(array(), array('value' => date('Y-m-d h:i a', strtotime($this->getObject()->getStart()))));
            $this->widgetSchema['end'] = new sfWidgetFormInputText(array(), array('value' => date('Y-m-d h:i a', strtotime($this->getObject()->getEnd()))));
        }
        $this->widgetSchema['userid'] = new sfWidgetFormDoctrineChoice(array('model' => 'CroUsers', 'method' => 'getUsername'));
    }
}