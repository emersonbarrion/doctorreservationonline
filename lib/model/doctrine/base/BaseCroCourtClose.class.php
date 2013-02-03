<?php

/**
 * BaseCroCourtClose
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $reservationid
 * @property string $closedate
 * @property CroReservations $CroReservations
 * 
 * @method integer         getReservationid()   Returns the current record's "reservationid" value
 * @method string          getClosedate()       Returns the current record's "closedate" value
 * @method CroReservations getCroReservations() Returns the current record's "CroReservations" value
 * @method CroCourtClose   setReservationid()   Sets the current record's "reservationid" value
 * @method CroCourtClose   setClosedate()       Sets the current record's "closedate" value
 * @method CroCourtClose   setCroReservations() Sets the current record's "CroReservations" value
 * 
 * @package    courtreservationonline
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCroCourtClose extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cro_court_close');
        $this->hasColumn('reservationid', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('closedate', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CroReservations', array(
             'local' => 'reservationid',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}