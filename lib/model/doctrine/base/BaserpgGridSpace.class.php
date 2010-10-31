<?php

/**
 * BaserpgGridSpace
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $grid_id
 * @property integer $terrain_id
 * @property integer $x
 * @property integer $y
 * @property rpgGrid $Grid
 * @property rpgTerrain $Terrain
 * @property Doctrine_Collection $Players
 * 
 * @method integer             getGridId()     Returns the current record's "grid_id" value
 * @method integer             getTerrainId()  Returns the current record's "terrain_id" value
 * @method integer             getX()          Returns the current record's "x" value
 * @method integer             getY()          Returns the current record's "y" value
 * @method rpgGrid             getGrid()       Returns the current record's "Grid" value
 * @method rpgTerrain          getTerrain()    Returns the current record's "Terrain" value
 * @method Doctrine_Collection getPlayers()    Returns the current record's "Players" collection
 * @method rpgGridSpace        setGridId()     Sets the current record's "grid_id" value
 * @method rpgGridSpace        setTerrainId()  Sets the current record's "terrain_id" value
 * @method rpgGridSpace        setX()          Sets the current record's "x" value
 * @method rpgGridSpace        setY()          Sets the current record's "y" value
 * @method rpgGridSpace        setGrid()       Sets the current record's "Grid" value
 * @method rpgGridSpace        setTerrain()    Sets the current record's "Terrain" value
 * @method rpgGridSpace        setPlayers()    Sets the current record's "Players" collection
 * 
 * @package    rpg
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgGridSpace extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rpg_grid_space');
        $this->hasColumn('grid_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('terrain_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('x', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('y', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('rpgGrid as Grid', array(
             'local' => 'grid_id',
             'foreign' => 'id'));

        $this->hasOne('rpgTerrain as Terrain', array(
             'local' => 'terrain_id',
             'foreign' => 'id'));

        $this->hasMany('rpgPlayer as Players', array(
             'local' => 'id',
             'foreign' => 'grid_space_id'));
    }
}