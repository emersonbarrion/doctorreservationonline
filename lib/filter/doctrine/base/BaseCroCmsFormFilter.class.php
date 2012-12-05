<?php

/**
 * CroCms filter form base class.
 *
 * @package    courtreservationonline
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCroCmsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'page_url_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroPages'), 'add_empty' => true)),
      'content_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content_text'  => new sfWidgetFormFilterInput(),
      'content_image' => new sfWidgetFormFilterInput(),
      'created_by'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroAdminUsers'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'page_url_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CroPages'), 'column' => 'id')),
      'content_name'  => new sfValidatorPass(array('required' => false)),
      'content_text'  => new sfValidatorPass(array('required' => false)),
      'content_image' => new sfValidatorPass(array('required' => false)),
      'created_by'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CroAdminUsers'), 'column' => 'id')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cro_cms_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroCms';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'page_url_id'   => 'ForeignKey',
      'content_name'  => 'Text',
      'content_text'  => 'Text',
      'content_image' => 'Text',
      'created_by'    => 'Number',
      'updated_by'    => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
