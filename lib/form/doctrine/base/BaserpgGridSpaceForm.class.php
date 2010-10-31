<?php

/**
 * rpgGridSpace form base class.
 *
 * @method rpgGridSpace getObject() Returns the current form's model object
 *
 * @package    rpg
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgGridSpaceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'grid_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grid'), 'add_empty' => true)),
      'terrain_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Terrain'), 'add_empty' => true)),
      'x'          => new sfWidgetFormInputText(),
      'y'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'grid_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Grid'), 'required' => false)),
      'terrain_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Terrain'), 'required' => false)),
      'x'          => new sfValidatorInteger(array('required' => false)),
      'y'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpg_grid_space[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgGridSpace';
  }

}
