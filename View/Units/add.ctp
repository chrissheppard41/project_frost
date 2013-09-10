<div class="units form">
    <h2><?php echo $this->Html->link('Unit', array('action' => 'index')); ?> - Add</h2>
	<?php
	echo $this->Form->create('Unit');
		echo $this->Form->input('name');
		echo $this->Form->input('weapon_skill');
		echo $this->Form->input('ballistic_skill');
		echo $this->Form->input('strength');
		echo $this->Form->input('toughness');
		echo $this->Form->input('initiative');
		echo $this->Form->input('wounds');
		echo $this->Form->input('leadership');
		echo $this->Form->input('armour_save');
		echo $this->Form->input('invulnerable_save');
		echo $this->Form->input('pts');
		echo $this->Form->input('race_types_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>