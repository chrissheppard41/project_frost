<div class="armyLists form">
    <h2><?php echo $this->Html->link('ArmyList', array('action' => 'index')); ?> - Admin Add</h2>
	<?php
	echo $this->Form->create('ArmyList');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('descr', array('label' => 'Description'));
		echo $this->Form->input('point_limit', array('label' => 'Point Limit'));
		echo $this->Form->input('hide', array('label' => 'Hide', 'type' => 'checkbox'));
		echo $this->Form->input('races_id', array('label' => 'Race'));
		echo $this->Form->input('users_id', array('label' => 'Username'));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>