<div class="types form">
    <h2><?php echo $this->Html->link('Type', array('action' => 'index')); ?> - Add</h2>
	<?php
	echo $this->Form->create('Type');
		echo $this->Form->input('name');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>