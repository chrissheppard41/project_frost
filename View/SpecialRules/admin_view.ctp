<div class="page-header">
	<h1><?php echo $this->Html->link(__('Special Rules'), array('action' => 'index')); ?> - <?php echo h($specialRule['SpecialRule']['name']); ?></h1>
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
			<span class='col-md-3'><?php echo __('Races'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($specialRule['Races']['name'], array('controller' => 'races', 'action' => 'view', $specialRule['Races']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($specialRule['SpecialRule']['created'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($specialRule['SpecialRule']['modified'])); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Squads');?></h3>
	<?php if (!empty($specialRule['Squad'])){ ?>
	<table class="table table-striped table-bordered table-listings">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		foreach ($specialRule['Squad'] as $squad){ ?>
		<tr>
			<td><?php echo $squad['id'];?></td>
			<td><?php echo $squad['name'];?></td>
			<td><?php echo $squad['created'];?></td>
			<td><?php echo $squad['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'squads', 'action' => 'view', $squad['id']), array('class' => 'btn-sm btn-primary')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'squads', 'action' => 'edit', $squad['id']), array('class' => 'btn-sm btn-warning')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $squad['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>

</div>
