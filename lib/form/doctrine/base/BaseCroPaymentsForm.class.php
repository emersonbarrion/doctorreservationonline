<?php

/**
 * CroPayments form base class.
 *
 * @method CroPayments getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroPaymentsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'reservationid'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroReservations'), 'add_empty' => false)),
      'token'           => new sfWidgetFormInputText(),
      'amount'          => new sfWidgetFormInputText(),
      'transactionid'   => new sfWidgetFormInputText(),
      'transactiontype' => new sfWidgetFormInputText(),
      'firstname'       => new sfWidgetFormInputText(),
      'lastname'        => new sfWidgetFormInputText(),
      'countrycode'     => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'payerid'         => new sfWidgetFormInputText(),
      'rate'            => new sfWidgetFormInputText(),
      'ordertime'       => new sfWidgetFormInputText(),
      'feeamount'       => new sfWidgetFormInputText(),
      'taxamount'       => new sfWidgetFormInputText(),
      'paymenttype'     => new sfWidgetFormInputText(),
      'paymentstatus'   => new sfWidgetFormInputText(),
      'currencycode'    => new sfWidgetFormInputText(),
      'ack'             => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'reservationid'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroReservations'))),
      'token'           => new sfValidatorString(array('max_length' => 255)),
      'amount'          => new sfValidatorPass(),
      'transactionid'   => new sfValidatorString(array('max_length' => 255)),
      'transactiontype' => new sfValidatorString(array('max_length' => 255)),
      'firstname'       => new sfValidatorString(array('max_length' => 255)),
      'lastname'        => new sfValidatorString(array('max_length' => 255)),
      'countrycode'     => new sfValidatorString(array('max_length' => 255)),
      'email'           => new sfValidatorString(array('max_length' => 255)),
      'payerid'         => new sfValidatorString(array('max_length' => 255)),
      'rate'            => new sfValidatorInteger(),
      'ordertime'       => new sfValidatorString(array('max_length' => 255)),
      'feeamount'       => new sfValidatorPass(),
      'taxamount'       => new sfValidatorPass(),
      'paymenttype'     => new sfValidatorString(array('max_length' => 255)),
      'paymentstatus'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'currencycode'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ack'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cro_payments[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroPayments';
  }

}
