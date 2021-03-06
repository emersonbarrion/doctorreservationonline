<?php

/**
 * CroCmsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CroCmsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CroCmsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CroCms');
    }

   	public function getContentByPageUrlAndContentName($pageurl, $contentname)
	{
        $record = Doctrine_Query::create()
					->from('CroCms u')
        			->where('u.page_url_id = ?', $pageurl)
        			->andWhere('u.content_name = ?', $contentname)
        			->fetchArray();

        return empty($record) ? NULL : $record[0];
	}
}