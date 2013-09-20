<div class="page-header">
    <h1>
    	<?php echo $this->Html->link(__('Squads'), array('controller' => 'squads', 'action' => 'index')); ?> -
    	<?php echo $this->Html->link($this->request->data['Groups']['name'], array('controller' => 'squad_units', 'action' => 'view', $this->request->data['Groups']['id'])); ?> - Related squad options</h1>
</div>
<div class="squadOptions form">
	<?php
	echo $this->Form->create('SquadOption');
		echo $this->Form->input('id');
		echo $this->Form->input('min_count');
		echo $this->Form->input('max_count');
		echo $this->Form->input('return_id', array('type' => 'hidden', 'value' => $parent_id));
		//echo $this->Form->input('groups_id');
		//echo $this->Form->input('squad_units_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>