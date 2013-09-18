<div class="page-header">
    <h1><?php echo $this->Html->link(__('UnitType'), array('action' => 'index')); ?> - Add</h1>
</div>

<div class="unitTypes form">
	<?php
	echo $this->Form->create('UnitType');
		echo $this->Form->input('name');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>