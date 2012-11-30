<?php

/**
 * reservation actions.
 *
 * @package    courtreservationonline
 * @subpackage reservation
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservationActions extends sfActions
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
		$this->form = new CroReservationsForm();
		$this->processForm($request, $this->form);
	}

	public function executeList(sfWebRequest $request)
	{
	    $this->users = Doctrine::getTable('CroReservations')->createQuery('u');
	    
	    $this->pager = new sfDoctrinePager('CroReservations', sfConfig::get('app_number_users_display'));
	    $this->pager->setQuery($this->users);
	    $this->pager->setPage($request->getParameter('page',1));
	    $this->pager->init();
	}

	public function executeEdit(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
		$this->form = new CroReservationsForm($crouser);
		$this->processForm($request, $this->form);
	}

	public function executeRemove(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
		$crouser->delete();
		$this->redirect('reservation/list');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		if ($request->isMethod('post')) {
			$form->bind($request->getParameter($form->getName()));

			if ($form->isValid()){
				$form->save();
				$this->redirect('reservation/list');
			}
		}
	}
}
