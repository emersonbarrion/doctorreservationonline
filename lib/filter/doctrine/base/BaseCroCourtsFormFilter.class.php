<?php

/**
 * CroCourts filter form base class.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCroCourtsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'room'                  => new sfWidgetFormFilterInput(),
      'name'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'location'              => new sfWidgetFormFilterInput(),
      'priorreservationhours' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maxreservationhours'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rate'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'start_time'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'end_time'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'remarks'               => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'room'                  => new sfValidatorPass(array('required' => false)),
      'name'                  => new sfValidatorPass(array('required' => false)),
      'location'              => new sfValidatorPass(array('required' => false)),
      'priorreservationhours' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'maxreservationhours'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rate'                  => new sfValidatorPass(array('required' => false)),
      'start_time'            => new sfValidatorPass(array('required' => false)),
      'end_time'              => new sfValidatorPass(array('required' => false)),
      'status'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'remarks'               => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cro_courts_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroCourts';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'room'                  => 'Text',
      'name'                  => 'Text',
      'location'              => 'Text',
      'priorreservationhours' => 'Number',
      'maxreservationhours'   => 'Number',
      'rate'                  => 'Text',
      'start_time'            => 'Text',
      'end_time'              => 'Text',
      'status'                => 'Boolean',
      'remarks'               => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
