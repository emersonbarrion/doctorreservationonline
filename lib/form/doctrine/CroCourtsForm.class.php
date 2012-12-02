<?php

/**
 * CroCourts form.
 *
 * @package    courtreservationonline
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CroCourtsForm extends BaseCroCourtsForm
{
	public function configure()
	{
		unset( $this['created_at'], $this['updated_at']);

		$this->widgetSchema->setNameFormat('court[%s]');
  	}
}
