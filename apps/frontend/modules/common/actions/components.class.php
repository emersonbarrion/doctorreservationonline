<?php

class commonComponents extends sfComponents 
{
    protected $existError = "Invalid username or password!";

    public function executeHeader(sfWebRequest $request)
    {
        $this->header = '';
    }

    public function executeFooter(sfWebRequest $request)
    {
        $this->footer = '';
    }
}