<?php

/**
 * BaseCroCourts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property boolean $status
 * @property boolean $indoor
 * @property boolean $lights
 * @property integer $priorreservationhours
 * @property integer $maxreservationhours
 * @property double $rate
 * @property timestamp $start_time
 * @property timestamp $end_time
 * @property integer $created_by
 * @property integer $updated_by
 * @property CroAdminUsers $CroAdminUsers
 * @property Doctrine_Collection $CroReservations
 * 
 * @method string              getName()                  Returns the current record's "name" value
 * @method boolean             getStatus()                Returns the current record's "status" value
 * @method boolean             getIndoor()                Returns the current record's "indoor" value
 * @method boolean             getLights()                Returns the current record's "lights" value
 * @method integer             getPriorreservationhours() Returns the current record's "priorreservationhours" value
 * @method integer             getMaxreservationhours()   Returns the current record's "maxreservationhours" value
 * @method double              getRate()                  Returns the current record's "rate" value
 * @method timestamp           getStartTime()             Returns the current record's "start_time" value
 * @method timestamp           getEndTime()               Returns the current record's "end_time" value
 * @method integer             getCreatedBy()             Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()             Returns the current record's "updated_by" value
 * @method CroAdminUsers       getCroAdminUsers()         Returns the current record's "CroAdminUsers" value
 * @method Doctrine_Collection getCroReservations()       Returns the current record's "CroReservations" collection
 * @method CroCourts           setName()                  Sets the current record's "name" value
 * @method CroCourts           setStatus()                Sets the current record's "status" value
 * @method CroCourts           setIndoor()                Sets the current record's "indoor" value
 * @method CroCourts           setLights()                Sets the current record's "lights" value
 * @method CroCourts           setPriorreservationhours() Sets the current record's "priorreservationhours" value
 * @method CroCourts           setMaxreservationhours()   Sets the current record's "maxreservationhours" value
 * @method CroCourts           setRate()                  Sets the current record's "rate" value
 * @method CroCourts           setStartTime()             Sets the current record's "start_time" value
 * @method CroCourts           setEndTime()               Sets the current record's "end_time" value
 * @method CroCourts           setCreatedBy()             Sets the current record's "created_by" value
 * @method CroCourts           setUpdatedBy()             Sets the current record's "updated_by" value
 * @method CroCourts           setCroAdminUsers()         Sets the current record's "CroAdminUsers" value
 * @method CroCourts           setCroReservations()       Sets the current record's "CroReservations" collection
 * 
 * @package    courtreservationonline
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCroCourts extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cro_courts');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('status', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('indoor', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('lights', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('priorreservationhours', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('maxreservationhours', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('rate', 'double', null, array(
             'type' => 'double',
             'notnull' => true,
             ));
        $this->hasColumn('start_time', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('end_time', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('created_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('updated_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CroAdminUsers', array(
             'local' => 'updated_by',
             'foreign' => 'id'));

        $this->hasMany('CroReservations', array(
             'local' => 'id',
             'foreign' => 'courtid'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}