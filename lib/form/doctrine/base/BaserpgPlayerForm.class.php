<?php

/**
 * rpgPlayer form base class.
 *
 * @method rpgPlayer getObject() Returns the current form's model object
 *
 * @package    rpg
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaserpgPlayerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'current_unit_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CurrentUnit'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'current_unit_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CurrentUnit'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rpg_player[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'rpgPlayer';
  }

}
