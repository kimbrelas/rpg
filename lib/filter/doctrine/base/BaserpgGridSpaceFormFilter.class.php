<?php

/**
 * rpgGridSpace filter form base class.
 *
 * @package    rpg
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgGridSpaceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'grid_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grid'), 'add_empty' => true)),
      'terrain_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Terrain'), 'add_empty' => true)),
      'x'          => new sfWidgetFormFilterInput(),
      'y'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'grid_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Grid'), 'column' => 'id')),
      'terrain_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Terrain'), 'column' => 'id')),
      'x'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rpg_grid_space_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgGridSpace';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'grid_id'    => 'ForeignKey',
      'terrain_id' => 'ForeignKey',
      'x'          => 'Number',
      'y'          => 'Number',
    );
  }
}
