<div class="page-header">
	<h1><?php echo $this->Html->link('Types', array('action' => 'index')); ?> - Admin Edit</h1>
</div>
<div class="types form">
	<?php
	echo $this->Form->create('Type');
		//echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('count', array('label' => 'Count'));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>