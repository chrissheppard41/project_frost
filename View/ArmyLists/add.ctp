<div class="armyLists form">
    <h2><?php echo $this->Html->link('ArmyList', array('action' => 'index')); ?> - Add</h2>
	<?php
	echo $this->Form->create('ArmyList');
		echo $this->Form->input('name');
		echo $this->Form->input('races_id');
		echo $this->Form->input('users_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>