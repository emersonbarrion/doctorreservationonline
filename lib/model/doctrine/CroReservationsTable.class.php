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

    public function getUserReservations($userid = NULL)
	{
        $reservation = Doctrine_Query::create()
                        ->select('u.*, p.fname')
                        ->from('CroReservations u')
                        ->leftJoin('u.CroUsers p');

        if($userid) $record = $reservation->where('u.userid = ?', $userid)->fetchArray();
        else $record = $reservation->fetchArray();
        
        return $record;
	}

    public function getUserReservationList($userid = NULL)
    {
        $reservation = Doctrine_Query::create()
                        ->select('u.*, p.fname, m.name')
                        ->from('CroReservations u')
                        ->leftJoin('u.CroUsers p')
                        ->leftJoin('u.CroCourts m');

        if($userid) $record = $reservation->where('u.userid = ?', $userid)->fetchArray();
        else $record = $reservation->fetchArray();
        
        return $record;
    }

    public function checkReservations($courtid, $date, $start, $end)
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

    public function checkEditReservations($courtid, $date, $start, $end, $resid)
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

    public function updatePaymentStatus($reservationid, $paymentstatus)
    {
        $q = Doctrine_Query::create()
                ->update('CroReservations q')
                ->set('q.paymentstatus','?', $paymentstatus)
                ->where('q.id = ?', $reservationid)
                ->execute();
    }

    public function removeReservations()
    {
        $graceDay = date('Y-m-d H:i:s', strtotime('1 day ago'));
        $q = Doctrine_Query::create()
                ->delete('CroReservations q')
                ->where('q.start < ? AND q.paymentstatus != ?', array($graceDay, 'Completed'))
                ->execute();
    }
}