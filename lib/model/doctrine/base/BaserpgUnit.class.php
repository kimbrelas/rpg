<?php

/**
 * BaserpgUnit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $player_id
 * @property integer $grid_space_id
 * @property string $image
 * @property rpgGridSpace $GridSpace
 * @property rpgPlayer $Player
 * @property Doctrine_Collection $CurrentPlayer
 * 
 * @method string              getName()          Returns the current record's "name" value
 * @method integer             getPlayerId()      Returns the current record's "player_id" value
 * @method integer             getGridSpaceId()   Returns the current record's "grid_space_id" value
 * @method string              getImage()         Returns the current record's "image" value
 * @method rpgGridSpace        getGridSpace()     Returns the current record's "GridSpace" value
 * @method rpgPlayer           getPlayer()        Returns the current record's "Player" value
 * @method Doctrine_Collection getCurrentPlayer() Returns the current record's "CurrentPlayer" collection
 * @method rpgUnit             setName()          Sets the current record's "name" value
 * @method rpgUnit             setPlayerId()      Sets the current record's "player_id" value
 * @method rpgUnit             setGridSpaceId()   Sets the current record's "grid_space_id" value
 * @method rpgUnit             setImage()         Sets the current record's "image" value
 * @method rpgUnit             setGridSpace()     Sets the current record's "GridSpace" value
 * @method rpgUnit             setPlayer()        Sets the current record's "Player" value
 * @method rpgUnit             setCurrentPlayer() Sets the current record's "CurrentPlayer" collection
 * 
 * @package    rpg
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgUnit extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rpg_unit');
        $this->hasColumn('name', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('player_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('grid_space_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('rpgGridSpace as GridSpace', array(
             'local' => 'grid_space_id',
             'foreign' => 'id'));

        $this->hasOne('rpgPlayer as Player', array(
             'local' => 'player_id',
             'foreign' => 'id'));

        $this->hasMany('rpgPlayer as CurrentPlayer', array(
             'local' => 'id',
             'foreign' => 'current_unit_id'));
    }
}