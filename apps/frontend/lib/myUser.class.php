<?php

class myUser extends sfBasicSecurityUser
{
	public function setUserAttributes($user)
	{
		$this->setAttribute('userfullname', ucfirst($user['fname']) . ' ' . ucfirst($user['lname']));
	    $this->setAttribute('id', $user['id']);
	}
}