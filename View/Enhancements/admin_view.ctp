<div class="page-header">
	<h1><?php echo $this->Html->link(__('Enhancement'), array('action' => 'index')); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Enhancement view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $enhancement['Enhancement']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $enhancement['Enhancement']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($enhancement['Enhancement']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($enhancement['Enhancement']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($enhancement['Enhancement']['created']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($enhancement['Enhancement']['modified']); ?></span>
		</div>

  	</div>
</div>
