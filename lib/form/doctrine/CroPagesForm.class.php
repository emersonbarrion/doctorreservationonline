<?php

/**
 * CroPages form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroPagesForm extends BaseCroPagesForm
{
	public function configure()
	{
		unset( $this['created_at'], $this['updated_at'] );

		$this->widgetSchema->setNameFormat('page[%s]');
  	}
}
