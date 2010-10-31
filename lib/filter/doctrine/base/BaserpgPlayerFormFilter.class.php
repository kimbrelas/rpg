<?php

/**
 * rpgPlayer filter form base class.
 *
 * @package    rpg
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgPlayerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'grid_space_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GridSpace'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'grid_space_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GridSpace'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rpg_player_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgPlayer';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'grid_space_id' => 'ForeignKey',
    );
  }
}
