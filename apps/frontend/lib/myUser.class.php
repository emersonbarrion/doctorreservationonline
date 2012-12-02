<?php

class myUser extends sfBasicSecurityUser
{
	public function setUserAttributes($user)
	{
		$this->setAttribute('userfullname', ucfirst($user['fname']) . ' ' . ucfirst($user['lname']));
		$this->setAuthenticated(TRUE);
		$this->clearCredentials();
		$this->addCredentials('user');
	    $this->setAttribute('id', $user['id']);
	}

	public function clearUserAttributes()
	{
		$this->setAuthenticated(FALSE);
		$this->getAttributeHolder()->clear();
		$this->clearCredentials();
	}
}