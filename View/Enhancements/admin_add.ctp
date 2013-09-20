<div class="page-header">
    <h1><?php echo $this->Html->link(__('Enhancement'), array('action' => 'index')); ?> - Admin Add</h1>
</div>

<div class="enhancements form">
	<?php
	echo $this->Form->create('Enhancement');
		echo $this->Form->input('name');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>