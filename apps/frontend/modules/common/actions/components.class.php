<?php

class commonComponents extends sfComponents 
{
    public function executeHeader(sfWebRequest $request)
    {
    	$content = Doctrine_Core::getTable('CroCms')->getContentByPageUrlAndContentName(1, 'logo');
        $this->logo = $content['content_image'];
        $content = Doctrine_Core::getTable('CroCms')->getContentByPageUrlAndContentName(1, 'slogan');
        $this->slogan = $content['content_text'];
    }

    public function executeFooter(sfWebRequest $request)
    {
        $this->footer = '';
    }
}