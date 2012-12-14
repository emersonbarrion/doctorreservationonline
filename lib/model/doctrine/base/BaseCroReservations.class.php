<?php

/**
 * BaseCroReservations
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property integer $userid
 * @property integer $courtid
 * @property timestamp $start
 * @property timestamp $end
 * @property string $payment_status
 * @property integer $status
 * @property CroUsers $CroUsers
 * @property CroCourts $CroCourts
 * @property Doctrine_Collection $CroCourtClose
 * @property Doctrine_Collection $CroPayments
 * 
 * @method string              getTitle()          Returns the current record's "title" value
 * @method integer             getUserid()         Returns the current record's "userid" value
 * @method integer             getCourtid()        Returns the current record's "courtid" value
 * @method timestamp           getStart()          Returns the current record's "start" value
 * @method timestamp           getEnd()            Returns the current record's "end" value
 * @method string              getPaymentStatus()  Returns the current record's "payment_status" value
 * @method integer             getStatus()         Returns the current record's "status" value
 * @method CroUsers            getCroUsers()       Returns the current record's "CroUsers" value
 * @method CroCourts           getCroCourts()      Returns the current record's "CroCourts" value
 * @method Doctrine_Collection getCroCourtClose()  Returns the current record's "CroCourtClose" collection
 * @method Doctrine_Collection getCroPayments()    Returns the current record's "CroPayments" collection
 * @method CroReservations     setTitle()          Sets the current record's "title" value
 * @method CroReservations     setUserid()         Sets the current record's "userid" value
 * @method CroReservations     setCourtid()        Sets the current record's "courtid" value
 * @method CroReservations     setStart()          Sets the current record's "start" value
 * @method CroReservations     setEnd()            Sets the current record's "end" value
 * @method CroReservations     setPaymentStatus()  Sets the current record's "payment_status" value
 * @method CroReservations     setStatus()         Sets the current record's "status" value
 * @method CroReservations     setCroUsers()       Sets the current record's "CroUsers" value
 * @method CroReservations     setCroCourts()      Sets the current record's "CroCourts" value
 * @method CroReservations     setCroCourtClose()  Sets the current record's "CroCourtClose" collection
 * @method CroReservations     setCroPayments()    Sets the current record's "CroPayments" collection
 * 
 * @package    courtreservationonline
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCroReservations extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cro_reservations');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('userid', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('courtid', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('start', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('end', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('payment_status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 0,
             'length' => 255,
             ));
        $this->hasColumn('status', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CroUsers', array(
             'local' => 'userid',
             'foreign' => 'id'));

        $this->hasOne('CroCourts', array(
             'local' => 'courtid',
             'foreign' => 'id'));

        $this->hasMany('CroCourtClose', array(
             'local' => 'id',
             'foreign' => 'reservationid'));

        $this->hasMany('CroPayments', array(
             'local' => 'id',
             'foreign' => 'reservationid'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}