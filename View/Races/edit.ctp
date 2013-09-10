<div class="races form">
    <h2><?php echo $this->Html->link('Race', array('action' => 'index')); ?> - Edit</h2>
	<?php
	echo $this->Form->create('Race');
		echo $this->Form->input('id');
		echo $this->Form->input('race_types_id');
		echo $this->Form->input('name');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>