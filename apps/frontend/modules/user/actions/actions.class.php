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
		$this->sendMailToUser();
	}

	public function executeRegister(sfWebRequest $request)
	{
		$this->form = new CroUsersForm();
		$this->form->registerConfigure();
		$this->processForm($request, $this->form, 'register');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->crouser = Doctrine::getTable('CroUsers')->find(array($this->getUser()->getAttribute('id')));
		$this->form = new CroUsersForm($this->crouser);
		$this->processForm($request, $this->form, 'edit');
	}

	protected function processForm(sfWebRequest $request, sfForm $form, $action)
	{
		if ($request->isMethod('post'))
        {
        	$postData = $request->getParameter('user');
        	$postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);
            $this->form->bind($postData);

            if ($this->form->isValid()) {
            	$this->form->save();
            	if($action == 'edit') {
	            	$user = Doctrine::getTable('CroUsers')->find(array($this->getUser()->getAttribute('id')));
	            	$this->getUser()->setAttribute('userfullname', ucfirst($user['fname']) . ' ' . ucfirst($user['lname']));
	            	$this->redirect('user/edit');
            	} else {
            		$this->sendMailToUser();
            		$this->redirect('index/index');
            	}
            }
        }
	}

	protected function sendMailToUser()
	{
		$message = $this->getMailer()->compose(array('emersonbarrion@yahoo.com.ph' => 'Admin'),
											   $request->getParameter('email'),
											   'Welcome to Court Reservation Online',
											   'Your court reservation online account has been activated.');

		$this->getMailer()->send($message);
	}
}
