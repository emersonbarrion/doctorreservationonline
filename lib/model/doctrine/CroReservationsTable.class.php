<?php

/**
 * CroReservationsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CroReservationsTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CroReservations');
    }

    public function getUserReservations($userid)
	{
        $reservation = Doctrine_Query::create()->from('CroReservations u');

        if($userid) $record = $reservation->where('u.userid = ?', $userid)->fetchArray();
        else $record = $reservation->fetchArray();
        
        return $record;
	}

    public function checkReservations($courtid, $date, $start, $end, $userid)
    {
        $reservation = Doctrine_Query::create()
                        ->from('CroReservations u')
                        ->where('u.courtid = ? AND u.start LIKE ?', array($courtid, $date . '%'))
                        ->fetchArray();

        $isAvailable = true;
        foreach($reservation as $key => $val){
            if(($val['start'] < $end) && ($start < $val['end'])){
                $isAvailable = false;
            }
        }

        return $isAvailable;
    }

    public function checkEditReservations($courtid, $date, $start, $end, $userid, $resid)
    {
        $reservation = Doctrine_Query::create()
                        ->from('CroReservations u')
                        ->where('u.courtid = ? AND u.start LIKE ? AND u.id != ?', array($courtid, $date . '%', $resid))
                        ->fetchArray();

        $isAvailable = true;
        foreach($reservation as $key => $val){
            if(($val['start'] < $end) && ($start < $val['end'])){
                $isAvailable = false;
            }
        }

        return $isAvailable;
    }
}