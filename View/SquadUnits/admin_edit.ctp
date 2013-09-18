<div class="page-header">
    <h1><?php echo $this->Html->link(__('SquadUnit'), array('action' => 'index')); ?> - Admin Edit</h1>
</div>

<div class="squadUnits form">
	<?php
	echo $this->Form->create('SquadUnit');
		echo $this->Form->input('id');
		echo $this->Form->input('min_count');
		echo $this->Form->input('max_count');
		echo $this->Form->input('return_id', array('type' => 'hidden', 'value' => $parent_id));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>