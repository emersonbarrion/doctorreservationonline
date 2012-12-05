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
		$this->form = new CroUsersForm();
		$this->processForm($request, $this->form);
	}

	public function executeList(sfWebRequest $request)
	{
	    $this->users = Doctrine::getTable('CroUsers')->createQuery('u');
	    
	    $this->pager = new sfDoctrinePager('CroUsers', sfConfig::get('app_number_users_display'));
	    $this->pager->setQuery($this->users);
	    $this->pager->setPage($request->getParameter('page',1));
	    $this->pager->init();
	}

	public function executeEdit(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroUsers')->find(array($request->getParameter('id')));
		$this->form = new CroUsersForm($crouser);
		$this->processForm($request, $this->form, $crouser);
	}

	public function executeRemove(sfWebRequest $request)
	{
		$crouser = Doctrine::getTable('CroUsers')->find(array($request->getParameter('id')));
		$crouser->delete();
		$this->redirect('user/list');
	}

	protected function processForm(sfWebRequest $request, sfForm $form, $crouser = NULL)
	{
		if ($request->isMethod('post')) {
        	$postData = $request->getParameter('user');

        	if($postData['password']){
        		$postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);
        	} else {
        		$postData['password'] = $crouser->getPassword();
        	}

			$form->bind($postData);

			if ($form->isValid()){
				$form->save();
				$this->redirect('user/list');
			}
		}
	}

}