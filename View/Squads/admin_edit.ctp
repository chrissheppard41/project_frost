<div class="squads form">
    <h2><?php echo $this->Html->link('Squad', array('action' => 'index')); ?> - Admin Edit</h2>
	<?php
	echo $this->Form->create('Squad');
		//echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('sarg_count', array('label' => 'Special count'));
		echo $this->Form->input('unit_count', array('label' => 'Unit count'));
		echo $this->Form->input('race_types_id', array('label' => 'Race'));
		echo $this->Form->input('types_id', array('label' => 'Type'));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>