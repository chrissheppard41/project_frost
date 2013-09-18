<div class="page-header">
  <h1><?php echo $this->Html->link(__('Races'), array('action' => 'index')); ?> - <?php echo h($race['Race']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		Race view
  		<span class="pull-right">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $race['Race']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $race['Race']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Id'); ?></span>
  			<span class="col-md-9"><?php echo h($race['Race']['id']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Race Types'); ?></span>
  			<span class="col-md-9"><?php echo $this->Html->link($race['RaceTypes']['name'], array('controller' => 'race_types', 'action' => 'view', $race['RaceTypes']['id'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Race Name'); ?></span>
  			<span class="col-md-9"><?php echo h($race['Race']['name']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Created'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($race['Race']['created'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Modified'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($race['Race']['modified'])); ?></span>
  		</div>
  	</div>
</div>