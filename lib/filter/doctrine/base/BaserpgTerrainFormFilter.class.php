<?php

/**
 * rpgTerrain filter form base class.
 *
 * @package    rpg
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgTerrainFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'traversable' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'class'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'traversable' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'class'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpg_terrain_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgTerrain';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'traversable' => 'Boolean',
      'class'       => 'Text',
    );
  }
}
