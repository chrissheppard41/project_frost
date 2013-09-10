<div class="squads form">
    <h2><?php echo $this->Html->link('Squad', array('action' => 'index')); ?> - Add</h2>
	<?php
	echo $this->Form->create('Squad');
		echo $this->Form->input('sarg_count');
		echo $this->Form->input('unit_count');
		echo $this->Form->input('race_types_id');
		echo $this->Form->input('types_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>