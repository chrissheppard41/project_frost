<div class="page-header">
	<h1><?php echo $this->Html->link(__('Weapons'), array('action' => 'index')); ?> - <?php echo h($weapon['Weapon']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Weapon view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $weapon['Weapon']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $weapon['Weapon']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($weapon['Weapon']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($weapon['Weapon']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Race'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($weapon['Races']['name'], array('controller' => 'races', 'action' => 'view', $weapon['Races']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($weapon['Weapon']['created'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($weapon['Weapon']['modified'])); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Units');?></h3>
	<?php if (!empty($weapon['Unit'])){ ?>
	<table class="table table-striped table-bordered table-listings">
	<tr>
		<th><?php echo __('ID');?></th>
		<th><?php echo __('Name');?></th>
		<th><?php echo __('Sargeant');?></th>
		<th><?php echo __('WS');?></th>
		<th><?php echo __('BS');?></th>
		<th><?php echo __('S');?></th>
		<th><?php echo __('T');?></th>
		<th><?php echo __('I');?></th>
		<th><?php echo __('W');?></th>
		<th><?php echo __('A');?></th>
		<th><?php echo __('L');?></th>
		<th><?php echo __('AS');?></th>
		<th><?php echo __('IS');?></th>
		<th><?php echo __('pts');?></th>
		<th><?php echo __('Created');?></th>
		<th><?php echo __('Modified');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		foreach ($weapon['Unit'] as $unit){ ?>
		<tr>
			<td><?php echo h($unit['id']); ?></td>
			<td><?php echo h($unit['name']); ?></td>
			<td><span class="glyphicon glyphicon-<?php echo (($unit['sargeant'])?'ok':'remove'); ?>"></span></td>
			<td><?php echo h($unit['weapon_skill']); ?></td>
			<td><?php echo h($unit['ballistic_skill']); ?></td>
			<td><?php echo h($unit['strength']); ?></td>
			<td><?php echo h($unit['toughness']); ?></td>
			<td><?php echo h($unit['initiative']); ?></td>
			<td><?php echo h($unit['wounds']); ?></td>
			<td><?php echo h($unit['attacks']); ?></td>
			<td><?php echo h($unit['leadership']); ?></td>
			<td><?php echo h($unit['armour_save']); ?></td>
			<td><?php echo h($unit['invulnerable_save']); ?></td>
			<td><?php echo h($unit['pts']); ?></td>
			<td><?php echo h($this->Time->timeAgoInWords($unit['created'])); ?></td>
			<td><?php echo h($this->Time->timeAgoInWords($unit['modified'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'units', 'action' => 'view', $unit['id']), array('class' => 'btn-sm btn-primary')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'units', 'action' => 'edit', $unit['id']), array('class' => 'btn-sm btn-warning')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'units', 'action' => 'delete', $unit['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>

</div>
