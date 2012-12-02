<?php

/**
 * facilitator actions.
 *
 * @package    courtreservationonline
 * @subpackage facilitator
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class facilitatorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new CroAdminUsersForm();
		$this->processForm($request, $this->form);
	}

	public function executeList(sfWebRequest $request)
	{
	    $this->users = Doctrine::getTable('CroAdminUsers')->createQuery('u');
	    
	    $this->pager = new sfDoctrinePager('CroAdminUsers', sfConfig::get('app_number_users_display'));
	    $this->pager->setQuery($this->users);
	    $this->pager->setPage($request->getParameter('page',1));
	    $this->pager->init();
	}

	public function executeEdit(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroAdminUsers')->find(array($request->getParameter('id')));
		$this->form = new CroAdminUsersForm($crouser);
		$this->processForm($request, $this->form);
	}

	public function executeRemove(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroAdminUsers')->find(array($request->getParameter('id')));
		$crouser->delete();
		$this->redirect('facilitator/list');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		if ($request->isMethod('post')) {
        	$postData = $request->getParameter('admin');
        	$postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);

			$form->bind($postData);

			if ($form->isValid()){
				$form->save();
				$this->redirect('facilitator/list');
			}
		}
	}
}
