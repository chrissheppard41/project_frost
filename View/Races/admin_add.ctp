<div class="page-header">
	<h1><?php echo $this->Html->link('Races', array('action' => 'index')); ?> - Admin Add</h1>
</div>
<div class="races form">
	<?php
	echo $this->Form->create('Race');
		echo $this->Form->input('race_types_id', array('label' => 'Race type'));
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>