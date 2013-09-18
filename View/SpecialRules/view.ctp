<div class="page-header">
	<h1><?php echo $this->Html->link(__('Special Rule'), array('action' => 'index')); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Special Rule view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $specialRule['SpecialRule']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $specialRule['SpecialRule']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($specialRule['SpecialRule']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($specialRule['SpecialRule']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Race Types'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($specialRule['RaceTypes']['name'], array('controller' => 'race_types', 'action' => 'view', $specialRule['RaceTypes']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($specialRule['SpecialRule']['created']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($specialRule['SpecialRule']['modified']); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Squads');?></h3>
	<?php if (!empty($specialRule['Squad'])){ ?>
	<table class="striped-table bordered-table">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Race Types Id'); ?></th>
		<th><?php echo __('Types Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		foreach ($specialRule['Squad'] as $squad){ ?>
		<tr>
			<td><?php echo $squad['id'];?></td>
			<td><?php echo $squad['name'];?></td>
			<td><?php echo $squad['race_types_id'];?></td>
			<td><?php echo $squad['types_id'];?></td>
			<td><?php echo $squad['created'];?></td>
			<td><?php echo $squad['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'squads', 'action' => 'view', $squad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'squads', 'action' => 'edit', $squad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $squad['id']), null, __('Are you sure you want to delete # %s?', $squad['id'])); ?>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>

</div>
