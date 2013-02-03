<?php

/**
 * pages actions.
 *
 * @package    courtreservationonline
 * @subpackage pages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
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
		$this->form = new CroPagesForm();
		$this->processForm($request, $this->form);
	}

	public function executeList(sfWebRequest $request)
	{
	    $this->pages = Doctrine::getTable('CroPages')->createQuery('u');
	    
	    $this->pager = new sfDoctrinePager('CroPages', sfConfig::get('app_number_users_display'));
	    $this->pager->setQuery($this->pages);
	    $this->pager->setPage($request->getParameter('page',1));
	    $this->pager->init();
	}

	public function executeEdit(sfWebRequest $request)
	{
		$cropage = Doctrine::getTable('CroPages')->find(array($request->getParameter('id')));
		$this->form = new CroPagesForm($cropage);
		$this->processForm($request, $this->form);
	}

	public function executeRemove(sfWebRequest $request)
	{
		$cropage = Doctrine::getTable('CroPages')->find(array($request->getParameter('id')));
		$cropage->delete();
		$this->redirect('page/list');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		if ($request->isMethod('post')) {
        	$postData = $request->getParameter('page');

			$form->bind($postData);

			if ($form->isValid()){				
				$form->save();
				$this->redirect('page/list');				
			}
		}
	}
}
