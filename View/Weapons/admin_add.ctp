<div class="page-header">
    <h1><?php echo $this->Html->link('Weapon', array('action' => 'index')); ?> - Admin Add</h1>
</div>

<div class="weapons form">
	<?php
	echo $this->Form->create('Weapon');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('races_id', array('label' => 'Race'));
		echo $this->Form->input('Unit');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>