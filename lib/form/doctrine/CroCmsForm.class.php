<?php

/**
 * CroCms form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroCmsForm extends BaseCroCmsForm
{
	public function configure()
	{
		unset( $this['created_at'], $this['updated_at'] );

        if($this->isNew()){
        	$this->widgetSchema['created_by'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('id')));
        } else {
        	$this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
        }

        $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('id')));
        $this->widgetSchema['page_url_id'] = new sfWidgetFormDoctrineChoice(array('model' => 'CroPages', 'method' => 'getPageUrl'));
		
	    $this->widgetSchema['content_image'] = new sfWidgetFormInputFileEditable(array(
	      'label'     => 'Image',
	      'file_src'  => '/uploads/'.$this->checkImage(),
	      'is_image'  => true,
	      'edit_mode' => !$this->isNew()
	    ));

      	$this->validatorSchema['content_image'] = new sfValidatorFile(array('mime_types' => 'web_images', 'required'=>false ), array('mime_types' => 'INVALID IMAGE FILE!'));

      	$this->validatorSchema['content_image_delete'] = new sfValidatorPass();


		$this->widgetSchema->setNameFormat('cms[%s]');
  	}


	public function save($con = null)
	{
	    $file = $this->getValue('content_image');
	    if($file){
	        $filename = 'logo'.$file->getExtension($file->getOriginalExtension());
	        $file->save(sfConfig::get('sf_upload_dir').'/'.$filename);
	        unset($this['content_image']);
	        $this->getObject()->setContentImage($filename);
	    }

	    return parent::save($con);
	}

	protected function checkImage()
	{
		if($this->getObject()->getContentImage()) return $this->getObject()->getContentImage();
		else return 'empty.png';
	}
}