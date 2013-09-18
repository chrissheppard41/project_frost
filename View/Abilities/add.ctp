<div class="page-header">
    <h1><?php echo $this->Html->link('Ability', array('action' => 'index')); ?> - Add</h1>
</div>

<div class="abilities form">
	<?php
	echo $this->Form->create('Ability');
		echo $this->Form->input('name');
		echo $this->Form->input('race_types_id');
		echo $this->Form->input('Unit');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>