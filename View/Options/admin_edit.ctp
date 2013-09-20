<div class="page-header">
    <h1><?php echo $this->Html->link(__('Options'), array('action' => 'index')); ?> - Admin Edit</h1>
</div>

<div class="options form">
	<?php
	echo $this->Form->create('Option');
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('pts');
		echo $this->Form->input('groups_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>