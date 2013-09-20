<div class="page-header">
    <h1><?php echo $this->Html->link(__('Groups'), array('action' => 'index')); ?> - Admin Edit</h1>
</div>

<div class="groups form">
	<?php
	echo $this->Form->create('Group');
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('races_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>