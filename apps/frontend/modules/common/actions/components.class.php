<?php

class commonComponents extends sfComponents 
{
    public function executeHeader(sfWebRequest $request)
    {
        $this->header = '';
    }

    public function executeFooter(sfWebRequest $request)
    {
        $this->footer = '';
    }
}