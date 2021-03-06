<?php

/**
 * CroCourtsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CroCourtsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CroCourtsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CroCourts');
    }

    public function getTimeAvailable($courtid, $date = NULL)
	{
        $timeAvailable = Doctrine_Query::create()->from('CroCourts u');

        if($courtid) $record = $timeAvailable->where('u.id = ?', $courtid)->fetchArray();
        else $record = $timeAvailable->fetchArray();
        
        return $record;
	}
}