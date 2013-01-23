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

	public function executeChangepassword(sfWebRequest $request)
	{
		$this->crouser = Doctrine::getTable('CroUsers')->find(array($this->getUser()->getAttribute('id')));
		$this->form = new CroUsersForm($this->crouser);
		$this->form->changepasswordConfigure();
		$this->processForm($request, $this->form, 'changepassword');
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

	    	if($postData['password']) {
	    		$postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);
	    	} else if($action == 'edit' || $action == 'changepassword') {
	    		$postData['password'] = $this->crouser->getPassword();
	    	}
	    	
	    	if($action == 'changepassword'){
	    		$postData['password2'] = md5(sfConfig::get('app_passwordsalt') . $postData['password2']);
	    	}

            $this->form->bind($postData);

            if ($this->form->isValid()) {
            	$this->form->save();
            	if($action == 'edit') {
	            	$user = Doctrine::getTable('CroUsers')->find(array($this->getUser()->getAttribute('id')));
	            	$this->getUser()->setAttribute('userfullname', ucfirst($user['fname']) . ' ' . ucfirst($user['lname']));
	            	$this->redirect('user/edit');
            	} else if ($action == 'changepassword'){
            		$this->sendMailForChangepassword($this->getUser()->getAttribute('email'));
            		$this->redirect('index/index');
            	} else {
            		$this->sendMailToUser($postData['email']);
            		$this->redirect('index/index');
            	}
            }
        }
	}

	protected function sendMailForChangepassword($email)
	{
		$html = $this->getPartial('user/password');

		$message = $this->getMailer()->compose();
		$message->setSubject('Password Change');
		$message->setFrom('fineschedule@gmail.com');
		$message->setTo($email);
		$message->setBody($html, 'text/html');

		$this->getMailer()->send($message);
	}

	protected function sendMailToUser($email)
	{
		$html = $this->getPartial('user/activate');

		$message = $this->getMailer()->compose();
		$message->setSubject('Account Activation');
		$message->setFrom('fineschedule@gmail.com');
		$message->setTo($email);
		$message->setBody($html, 'text/html');

		$this->getMailer()->send($message);
	}
}
