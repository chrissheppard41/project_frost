<div class="page-header">
	<h1><?php echo $this->Html->link(__('Unit Type'), array('action' => 'index')); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Unit Type view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unitType['UnitType']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $unitType['UnitType']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($unitType['UnitType']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($unitType['UnitType']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($unitType['UnitType']['created']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($unitType['UnitType']['modified']); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Units');?></h3>
	<?php if (!empty($unitType['Unit'])){ ?>
	<table class="striped-table bordered-table">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sargeant'); ?></th>
		<th><?php echo __('Weapon Skill'); ?></th>
		<th><?php echo __('Ballistic Skill'); ?></th>
		<th><?php echo __('Strength'); ?></th>
		<th><?php echo __('Toughness'); ?></th>
		<th><?php echo __('Initiative'); ?></th>
		<th><?php echo __('Wounds'); ?></th>
		<th><?php echo __('Attacks'); ?></th>
		<th><?php echo __('Leadership'); ?></th>
		<th><?php echo __('Armour Save'); ?></th>
		<th><?php echo __('Invulnerable Save'); ?></th>
		<th><?php echo __('Pts'); ?></th>
		<th><?php echo __('Race Types Id'); ?></th>
		<th><?php echo __('Unit Type Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		foreach ($unitType['Unit'] as $unit){ ?>
		<tr>
			<td><?php echo $unit['id'];?></td>
			<td><?php echo $unit['name'];?></td>
			<td><?php echo $unit['sargeant'];?></td>
			<td><?php echo $unit['weapon_skill'];?></td>
			<td><?php echo $unit['ballistic_skill'];?></td>
			<td><?php echo $unit['strength'];?></td>
			<td><?php echo $unit['toughness'];?></td>
			<td><?php echo $unit['initiative'];?></td>
			<td><?php echo $unit['wounds'];?></td>
			<td><?php echo $unit['attacks'];?></td>
			<td><?php echo $unit['leadership'];?></td>
			<td><?php echo $unit['armour_save'];?></td>
			<td><?php echo $unit['invulnerable_save'];?></td>
			<td><?php echo $unit['pts'];?></td>
			<td><?php echo $unit['race_types_id'];?></td>
			<td><?php echo $unit['unit_type_id'];?></td>
			<td><?php echo $unit['created'];?></td>
			<td><?php echo $unit['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'units', 'action' => 'view', $unit['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'units', 'action' => 'edit', $unit['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'units', 'action' => 'delete', $unit['id']), null, __('Are you sure you want to delete # %s?', $unit['id'])); ?>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>

</div>
