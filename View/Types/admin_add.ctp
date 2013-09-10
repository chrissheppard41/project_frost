<div class="types form">
    <h2><?php echo $this->Html->link('Type', array('action' => 'index')); ?> - Admin Add</h2>
	<?php
	echo $this->Form->create('Type');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('count', array('label' => 'Count'));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>