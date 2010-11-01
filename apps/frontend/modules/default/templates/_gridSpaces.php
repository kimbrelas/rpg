<?php foreach($player->getGridSpaces(5) as $grid_space): ?>
  <div class="grid_space <?php echo $grid_space->Terrain->class ?>">
    <?php foreach($player->Units as $unit): ?>
      <?php if($unit->grid_space_id == $grid_space->id): ?><img class="unit" src="/images/unit/<?php echo $unit->image ?>" /><?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endforeach ?>

<div>
  <?php foreach($player->Units as $unit): ?>
    <a class="select_unit<?php if($unit->id == $player->CurrentUnit->id): ?> disabled<?php endif; ?>" href="<?php echo url_for('select_unit', array('unit_id' => $unit->id)) ?>"><?php echo $unit->name ?></a>
  <?php endforeach; ?>
</div>

<div>
  <?php if($left = $player->getLeft()): ?>
    <a class="nav left<?php if(!$left->Terrain->traversable): ?> disabled<?php endif; ?>" href="<?php echo url_for('move', array('grid_space_id' => $left->id)) ?>">left</a>
  <?php endif ?>
  
  <?php if($left = $player->getRight()): ?>
    <a class="nav right<?php if(!$left->Terrain->traversable): ?> disabled<?php endif; ?>" href="<?php echo url_for('move', array('grid_space_id' => $left->id)) ?>">right</a>
  <?php endif ?>
  
  <?php if($left = $player->getUp()): ?>
    <a class="nav up<?php if(!$left->Terrain->traversable): ?> disabled<?php endif; ?>" href="<?php echo url_for('move', array('grid_space_id' => $left->id)) ?>">up</a>
  <?php endif ?>
  
  <?php if($left = $player->getDown()): ?>
    <a class="nav down<?php if(!$left->Terrain->traversable): ?> disabled<?php endif; ?>" href="<?php echo url_for('move', array('grid_space_id' => $left->id)) ?>">down</a>
  <?php endif ?>
</div>