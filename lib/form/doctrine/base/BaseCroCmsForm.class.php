<?php

/**
 * CroCms form base class.
 *
 * @method CroCms getObject() Returns the current form's model object
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCroCmsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'page_url_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroPages'), 'add_empty' => false)),
      'content_name'  => new sfWidgetFormInputText(),
      'content_text'  => new sfWidgetFormTextarea(),
      'content_image' => new sfWidgetFormTextarea(),
      'created_by'    => new sfWidgetFormInputText(),
      'updated_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CroAdminUsers'), 'add_empty' => false)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'page_url_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroPages'))),
      'content_name'  => new sfValidatorString(array('max_length' => 255)),
      'content_text'  => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'content_image' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'created_by'    => new sfValidatorInteger(),
      'updated_by'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CroAdminUsers'))),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cro_cms[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CroCms';
  }

}
