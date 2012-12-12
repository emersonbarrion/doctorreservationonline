<?php

require_once dirname(__FILE__).'/../lib/usersGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/usersGeneratorHelper.class.php';

/**
 * users actions.
 *
 * @package    courtreservationonline
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends autoUsersActions
{
	public function executeNew(sfWebRequest $request)
	{
		$this->form = new CroUsersForm();
		$this->processForm($request, $this->form);
	}

	protected function processForm(sfWebRequest $request, sfForm $form, $crouser = NULL)
	{
		if ($request->isMethod('post')) {
        	$postData = $request->getParameter('user');

        	if($postData['password']){
        		$postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);
        	} else {
        		$postData['password'] = $crouser->getPassword();
        	}

			$form->bind($postData);

			if ($form->isValid()){
				$form->save();
			}
		}
	}
}
