<?php

/**
 * index actions.
 *
 * @package    courtreservationonline
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class indexActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$reservations = Doctrine_Core::getTable('CroReservations')->removeReservations();
	}

	public function executeLogin(sfWebRequest $request)
	{
		$this->form = new CroLoginForm();
		$this->processForm($request);
	}

	public function executeLogout(sfWebRequest $request)
	{
		$this->getUser()->clearUserAttributes();
		$this->redirect('index/login');
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
		$user = Doctrine_Core::getTable('CroAdminUsers')->getAdminUserByEmailAndPassword($postData['email'], $postData['password']);

        if($user) {
	    	$this->getUser()->setUserAttributes($user);
        	$this->redirect('index/index');
        }
	}

	public function executeDenied(sfWebRequest $request)
	{
	}
}
