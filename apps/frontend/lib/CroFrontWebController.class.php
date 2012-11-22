<?php

class CroFrontWebController extends sfFrontWebController
{   
    public function dispatch()
    {
		if($this->context->getRequest()->getCookie('remember_me')) {
			$this->context->getUser()->setAuthenticated(TRUE);
		}

        parent::dispatch();
    }
}