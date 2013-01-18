<?php

/**
 * CroPayments filter form base class.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCroPaymentsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'reservationid'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroReservations'), 'add_empty' => true)),
      'token'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transactionid'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transactiontype' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'countrycode'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payerid'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rate'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ordertime'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'feeamount'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'taxamount'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paymenttype'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paymentstatus'   => new sfWidgetFormFilterInput(),
      'currencycode'    => new sfWidgetFormFilterInput(),
      'ack'             => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'reservationid'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CroReservations'), 'column' => 'id')),
      'token'           => new sfValidatorPass(array('required' => false)),
      'amount'          => new sfValidatorPass(array('required' => false)),
      'transactionid'   => new sfValidatorPass(array('required' => false)),
      'transactiontype' => new sfValidatorPass(array('required' => false)),
      'firstname'       => new sfValidatorPass(array('required' => false)),
      'lastname'        => new sfValidatorPass(array('required' => false)),
      'countrycode'     => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'payerid'         => new sfValidatorPass(array('required' => false)),
      'rate'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ordertime'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'feeamount'       => new sfValidatorPass(array('required' => false)),
      'taxamount'       => new sfValidatorPass(array('required' => false)),
      'paymenttype'     => new sfValidatorPass(array('required' => false)),
      'paymentstatus'   => new sfValidatorPass(array('required' => false)),
      'currencycode'    => new sfValidatorPass(array('required' => false)),
      'ack'             => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cro_payments_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroPayments';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'reservationid'   => 'ForeignKey',
      'token'           => 'Text',
      'amount'          => 'Text',
      'transactionid'   => 'Text',
      'transactiontype' => 'Text',
      'firstname'       => 'Text',
      'lastname'        => 'Text',
      'countrycode'     => 'Text',
      'email'           => 'Text',
      'payerid'         => 'Text',
      'rate'            => 'Number',
      'ordertime'       => 'Date',
      'feeamount'       => 'Text',
      'taxamount'       => 'Text',
      'paymenttype'     => 'Text',
      'paymentstatus'   => 'Text',
      'currencycode'    => 'Text',
      'ack'             => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
