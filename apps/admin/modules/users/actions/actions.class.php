<?php

require_once dirname(__FILE__).'/../lib/usersGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/usersGeneratorHelper.class.php';

/**
 * users actions.
 *
 * @package    courtreservationonline
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends autoUsersActions
{
	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$postData = $request->getParameter($form->getName());

    	if($postData['password']) $postData['password'] = md5(sfConfig::get('app_passwordsalt') . $postData['password']);
    	else $postData['password'] = $this->cro_users->getPassword();

	    $form->bind($postData, $request->getFiles($form->getName()));
	    if ($form->isValid())
	    {
	      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

	      try {
	        $cro_users = $form->save();
	      } catch (Doctrine_Validator_Exception $e) {

	        $errorStack = $form->getObject()->getErrorStack();

	        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
	        foreach ($errorStack as $field => $errors) {
	            $message .= "$field (" . implode(", ", $errors) . "), ";
	        }
	        $message = trim($message, ', ');

	        $this->getUser()->setFlash('error', $message);
	        return sfView::SUCCESS;
	      }

	      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $cro_users)));

	      if ($request->hasParameter('_save_and_add'))
	      {
	        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

	        $this->redirect('@cro_users_new');
	      }
	      else
	      {
	        $this->getUser()->setFlash('notice', $notice);

	        $this->redirect(array('sf_route' => 'cro_users_edit', 'sf_subject' => $cro_users));
	      }
	    }
	    else
	    {
	      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
	    }
	}
}
