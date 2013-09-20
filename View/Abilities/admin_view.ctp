<div class="page-header">
	<h1><?php echo $this->Html->link(__('Abilities'), array('action' => 'index')); ?> - <?php echo $ability['Ability']['name']; ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Ability view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ability['Ability']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ability['Ability']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($ability['Ability']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($ability['Ability']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Race Types'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($ability['RaceTypes']['name'], array('controller' => 'race_types', 'action' => 'view', $ability['RaceTypes']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($ability['Ability']['created'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($ability['Ability']['modified'])); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Units');?></h3>
	<?php if (!empty($ability['Unit'])){ ?>
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
		foreach ($ability['Unit'] as $unit){ ?>
		<tr>
			<td><?php echo $unit['id'];?></td>
			<td><?php echo $unit['name'];?></td>
			<td><span class="glyphicon glyphicon-<?php echo (($unit['sargeant'])?'ok':'remove'); ?>"></span></td>
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
			<td><?php echo $this->Time->timeAgoInWords($unit['created']);?></td>
			<td><?php echo $this->Time->timeAgoInWords($unit['modified']);?></td>
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
