<div class="raceTypes form">
    <h2><?php echo $this->Html->link('RaceType', array('action' => 'index')); ?> - Add</h2>
	<?php
	echo $this->Form->create('RaceType');
		echo $this->Form->input('name');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>