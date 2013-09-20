<div class="page-header">
	<h1><?php echo $this->Html->link(__('Option Upgrade'), array('action' => 'index')); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Option Upgrade view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $optionUpgrade['OptionUpgrade']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $optionUpgrade['OptionUpgrade']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($optionUpgrade['OptionUpgrade']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Enhances'); ?></span>
			<span class='col-md-9'><?php echo h($optionUpgrade['OptionUpgrade']['enhances']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('By'); ?></span>
			<span class='col-md-9'><?php echo h($optionUpgrade['OptionUpgrade']['by']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Addition'); ?></span>
			<span class='col-md-9'><?php echo h($optionUpgrade['OptionUpgrade']['addition']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Options'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($optionUpgrade['Options']['name'], array('controller' => 'options', 'action' => 'view', $optionUpgrade['Options']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($optionUpgrade['OptionUpgrade']['created']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($optionUpgrade['OptionUpgrade']['modified']); ?></span>
		</div>

  	</div>
</div>

