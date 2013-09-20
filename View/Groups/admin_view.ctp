<div class="page-header">
	<h1><?php echo $this->Html->link(__('Groups'), array('action' => 'index')); ?> - <?php echo h($group['Group']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Group view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($group['Group']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($group['Group']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Races'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($group['Races']['name'], array('controller' => 'races', 'action' => 'view', $group['Races']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($group['Group']['created'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($group['Group']['modified'])); ?></span>
		</div>

  	</div>
</div>

<div class="page-header">
	<h2><?php echo __('Related Options'); ?></h2>
</div>
<?php if(!empty($group['Options'])) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'options', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Pts');?></th>
				<th><?php echo __('Created');?></th>
				<th><?php echo __('Modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($group['Options'] as $option){ ?>
			<tr id="options-<?php echo $option['id']; ?>" data-id="<?php echo $option['id']; ?>">
				<td><?php echo h($option['name']); ?></td>
				<td><?php echo h($option['pts']); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($option['created'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($option['modified'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'options', 'action' => 'view', $option['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'options', 'action' => 'edit', $option['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'options', 'action' => 'delete', $option['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } ?>