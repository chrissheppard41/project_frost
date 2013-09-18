<div class="page-header">
	<h1><?php  echo __('Weapon');?></h1>
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
			<span class='col-md-9'>
				<?php echo h($weapon['Weapon']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'>
				<?php echo h($weapon['Weapon']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Race Type'); ?></span>
			<span class='col-md-9'>
				<?php echo $this->Html->link($weapon['RaceType']['id'], array('controller' => 'race_types', 'action' => 'view', $weapon['RaceType']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'>
				<?php echo h($weapon['Weapon']['created']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'>
				<?php echo h($weapon['Weapon']['modified']); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Unit Weapons');?></h3>
	<?php if (!empty($weapon['UnitWeapons'])){ ?>
	<table class="striped-table bordered-table">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Units Id'); ?></th>
		<th><?php echo __('Weapons Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		foreach ($weapon['UnitWeapons'] as $unitWeapons){ ?>
		<tr>
			<td><?php echo $unitWeapons['id'];?></td>
			<td><?php echo $unitWeapons['units_id'];?></td>
			<td><?php echo $unitWeapons['weapons_id'];?></td>
			<td><?php echo $unitWeapons['created'];?></td>
			<td><?php echo $unitWeapons['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'unit_weapons', 'action' => 'view', $unitWeapons['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'unit_weapons', 'action' => 'edit', $unitWeapons['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'unit_weapons', 'action' => 'delete', $unitWeapons['id']), null, __('Are you sure you want to delete # %s?', $unitWeapons['id'])); ?>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>

</div>
