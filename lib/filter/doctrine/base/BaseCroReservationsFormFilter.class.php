<?php

/**
 * CroReservations filter form base class.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCroReservationsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userid'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroUsers'), 'add_empty' => true)),
      'courtid'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroCourts'), 'add_empty' => true)),
      'start'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'end'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'payment_status' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'title'          => new sfValidatorPass(array('required' => false)),
      'userid'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CroUsers'), 'column' => 'id')),
      'courtid'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CroCourts'), 'column' => 'id')),
      'start'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'payment_status' => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cro_reservations_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroReservations';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'title'          => 'Text',
      'userid'         => 'ForeignKey',
      'courtid'        => 'ForeignKey',
      'start'          => 'Date',
      'end'            => 'Date',
      'payment_status' => 'Text',
      'status'         => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
