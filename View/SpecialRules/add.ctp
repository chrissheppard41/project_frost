<div class="page-header">
    <h1><?php echo $this->Html->link(__('SpecialRule'), array('action' => 'index')); ?> - Add</h1>
</div>

<div class="specialRules form">
	<?php
	echo $this->Form->create('SpecialRule');
		echo $this->Form->input('name');
		echo $this->Form->input('race_types_id');
		echo $this->Form->input('Squad');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>