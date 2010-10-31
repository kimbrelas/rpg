<?php foreach($player->getGridSpaces(5) as $grid_space): ?>
  <div url="<?php echo url_for('move', array('grid_space_id' => $grid_space->id)) ?>" class="grid_space <?php echo $grid_space->Terrain->class ?><?php if($grid_space->Terrain->traversable): ?> nav<?php endif ?>">
    <?php if($player->grid_space_id == $grid_space->id): ?><img style="width:50px;margin-top:15px;" src="/images/link.gif" /><?php endif; ?>
  </div>
<?php endforeach ?>