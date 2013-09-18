<div class="page-header">
	<h1><?php echo $this->Html->link(__('Types'), array('action' => 'index')); ?> - <?php echo h($type['Type']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php echo __('Type view'); ?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $type['Type']['id']), array('class' => 'btn-sm btn-warning')); ?>
  			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $type['Type']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Id'); ?></span>
  			<span class="col-md-9"><?php echo h($type['Type']['id']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Name'); ?></span>
  			<span class="col-md-9"><?php echo h($type['Type']['name']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Count'); ?></span>
  			<span class="col-md-9"><?php echo h($type['Type']['count']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Created'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($type['Type']['created'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Modified'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($type['Type']['modified'])); ?></span>
  		</div>
  	</div>
</div>