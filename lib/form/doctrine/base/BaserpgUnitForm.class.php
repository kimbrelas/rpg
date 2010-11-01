<?php

/**
 * rpgUnit form base class.
 *
 * @method rpgUnit getObject() Returns the current form's model object
 *
 * @package    rpg
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgUnitForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'player_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Player'), 'add_empty' => true)),
      'grid_space_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GridSpace'), 'add_empty' => true)),
      'image'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'player_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Player'), 'required' => false)),
      'grid_space_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GridSpace'), 'required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpg_unit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgUnit';
  }

}
