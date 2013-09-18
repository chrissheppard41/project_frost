<div class="page-header">
    <h1><?php echo $this->Html->link('Weapon', array('action' => 'index')); ?> - Add</h1>
</div>

<div class="weapons form">
	<?php
	echo $this->Form->create('Weapon');
		echo $this->Form->input('name');
		echo $this->Form->input('race_type_id');
		echo $this->Form->input('UnitWeapons');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>