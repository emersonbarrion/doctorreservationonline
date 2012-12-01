<?php

/**
 * user actions.
 *
 * @package    courtreservationonline
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
	}

	public function executeRegister(sfWebRequest $request)
	{
		$this->form = new CroUsersForm();
		$this->processForm($request, $this->form);
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		if ($request->isMethod('post'))
        {
        	$postData = $request->getParameter('user');
        	$postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);
            $this->form->bind($postData);

            if ($this->form->isValid()) {
            	$this->form->save();
				$this->redirect('index/index');
            }
        }
	}
}
