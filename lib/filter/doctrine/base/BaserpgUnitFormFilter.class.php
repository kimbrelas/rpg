<?php

/**
 * rpgUnit filter form base class.
 *
 * @package    rpg
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgUnitFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'player_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Player'), 'add_empty' => true)),
      'grid_space_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GridSpace'), 'add_empty' => true)),
      'image'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'player_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Player'), 'column' => 'id')),
      'grid_space_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GridSpace'), 'column' => 'id')),
      'image'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpg_unit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgUnit';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'player_id'     => 'ForeignKey',
      'grid_space_id' => 'ForeignKey',
      'image'         => 'Text',
    );
  }
}
