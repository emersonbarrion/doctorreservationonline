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
            		$this->sendMailToUser($request);
            		$this->redirect('index/index');
            	}
            }
        }
	}

	public function executeActivate(sfWebRequest $request)
	{
		$this->crouser = Doctrine::getTable('CroUsers')->find(array($this->getUser()->getAttribute('id')));
		$this->form = new CroUsersForm($this->crouser);
		$this->processForm($request, $this->form, 'edit');
	}

	protected function sendMailToUser(sfWebRequest $request)
	{
		$html = $this->getPartial('user/activate');

		$message = $this->getMailer()->compose();
		$message->setSubject('Account Activation');
		$message->setTo($request->getParameter('email'));
		$message->setFrom('fineschedule@gmail.com');
		$message->setBody($html, 'text/html');    

		echo $this->getMailer()->send($message);
	}
}
