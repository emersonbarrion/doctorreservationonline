<?php

/**
 * index actions.
 *
 * @package    courtreservationonline
 * @subpackage index
 * @author     Author
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class indexActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->form = new CroLoginForm();
		$this->processForm($request);

		$content = Doctrine_Core::getTable('CroCms')->getContentByPageUrlAndContentName(1, 'info');
		$this->info = $content['content_text'];
	}

	public function executeLogout(sfWebRequest $request)
	{
		$this->getUser()->clearUserAttributes();
		$this->redirect('index/index');
	}

	protected function processForm(sfWebRequest $request)
	{
		if ($request->isMethod('post'))
        {
        	$postData = $request->getParameter('login');
            $this->form->bind($postData);

            if ($this->form->isValid()) $this->checkLogin($request, $postData);
        }
	}

	protected function checkLogin(sfWebRequest $request, $postData)
	{
		$name 	= sfConfig::get('app_remember_cookie_name');
		$expire = sfConfig::get('app_remember_cookie_expiration');

		$user = Doctrine_Core::getTable('CroUsers')->getUserByUsernameAndPassword($postData['username'], $postData['password']);

        if($user) {
	    	if(isset($postData['remember_me']) && $postData['remember_me'] == 'on') $this->getResponse()->setCookie('remember_me', 1, time()+$expire);
	    	
	    	$this->getUser()->setUserAttributes($user);
        	$this->redirect('reservation/index');
        }
	}

	public function executeDenied(sfWebRequest $request)
	{
	}
}