<div class="page-header">
	<h1><?php echo $this->Html->link(__('Race Types'), array('action' => 'index')); ?> - Admin Add</h1>
</div>

<div class="raceTypes form">
	<?php
	echo $this->Form->create('RaceType');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>