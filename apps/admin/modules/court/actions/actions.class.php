<?php

/**
 * court actions.
 *
 * @package    courtreservationonline
 * @subpackage court
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class courtActions extends sfActions
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
		$this->form = new CroCourtsForm();
		$this->processForm($request, $this->form);
	}

	public function executeList(sfWebRequest $request)
	{
	    $this->users = Doctrine::getTable('CroCourts')->createQuery('u');
	    
	    $this->pager = new sfDoctrinePager('CroCourts', sfConfig::get('app_number_users_display'));
	    $this->pager->setQuery($this->users);
	    $this->pager->setPage($request->getParameter('page',1));
	    $this->pager->init();
	}

	public function executeEdit(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroCourts')->find(array($request->getParameter('id')));
		$this->form = new CroCourtsForm($crouser);
		$this->processForm($request, $this->form);
	}

	public function executeRemove(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroCourts')->find(array($request->getParameter('id')));
		$crouser->delete();
		$this->redirect('court/list');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		if ($request->isMethod('post')) {
			$form->bind($request->getParameter($form->getName()));

			if ($form->isValid()){
				$form->save();
				$this->redirect('court/list');
			}
		}
	}
}
