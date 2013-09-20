<?php
reset($squads);
?>

<div class="page-header">
    <h1><?php echo $this->Html->link(__('Squads'), array('controller' => 'squads', 'action' => 'index')); ?> - <?php echo $this->Html->link($squads[key($squads)], array('controller' => 'squads', 'action' => 'view', key($squads))); ?> - Admin Unit Edit</h1>
</div>

<div class="squadUnits form">
	<?php
	echo $this->Form->create('SquadUnit');
		echo $this->Form->input('id');
		echo $this->Form->input('min_count');
		echo $this->Form->input('max_count');
		echo $this->Form->input('return_id', array('type' => 'hidden', 'value' => $parent_id));
		echo $this->Form->input('Group');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>