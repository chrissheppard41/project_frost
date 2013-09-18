<div class="page-header">
	<h1><?php echo $this->Html->link('Squads', array('action' => 'index')); ?> - Admin Add</h1>
</div>
<div class="squads form">
	<?php
	echo $this->Form->create('Squad');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('races_id', array('label' => 'Race'));
		echo $this->Form->input('types_id', array('label' => 'Type'));
		echo $this->Form->input('Unit');
		echo $this->Form->input('SpecialRule');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>