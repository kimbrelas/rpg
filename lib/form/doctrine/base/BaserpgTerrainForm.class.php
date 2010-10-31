<?php

/**
 * rpgTerrain form base class.
 *
 * @method rpgTerrain getObject() Returns the current form's model object
 *
 * @package    rpg
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgTerrainForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'traversable' => new sfWidgetFormInputCheckbox(),
      'class'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'traversable' => new sfValidatorBoolean(array('required' => false)),
      'class'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpg_terrain[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgTerrain';
  }

}
