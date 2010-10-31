<?php

class defaultActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->player = Doctrine_Core::getTable('rpgPlayer')->find(1);
  }
  
  public function executeMove(sfWebRequest $request)
  {
    $this->player = Doctrine_Core::getTable('rpgPlayer')->find(1);
    $this->player->GridSpace = Doctrine_Core::getTable('rpgGridSpace')->find($request->getParameter('grid_space_id'));
    $this->player->save();
    
    $this->renderPartial('gridSpaces');
      
    return sfView::NONE;
  }
}