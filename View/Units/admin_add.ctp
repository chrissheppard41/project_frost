<div class="page-header">
	<h1><?php echo $this->Html->link(__('Units'), array('action' => 'index')); ?> - Admin Add</h1>
</div>

<div class="units form">
	<?php
	echo $this->Form->create('Unit');
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('sargeant', array('label' => 'Sargeant', array('type' => 'checkbox')));
		echo $this->Form->input('weapon_skill', array('label' => 'Weapon skill'));
		echo $this->Form->input('ballistic_skill', array('label' => 'Ballistic skill'));
		echo $this->Form->input('strength', array('label' => 'Strength'));
		echo $this->Form->input('toughness', array('label' => 'Toughness'));
		echo $this->Form->input('initiative', array('label' => 'Initiative'));
		echo $this->Form->input('wounds', array('label' => 'Wounds'));
		echo $this->Form->input('attacks', array('label' => 'Attacks'));
		echo $this->Form->input('leadership', array('label' => 'Leadership'));
		echo $this->Form->input('armour_save', array('label' => 'Armour save'));
		echo $this->Form->input('invulnerable_save', array('label' => 'Invulnerable save'));
		echo $this->Form->input('pts', array('label' => 'Points'));
		echo $this->Form->input('races_id', array('label' => 'Race'));
		echo $this->Form->input('unit_types_id', array('label' => 'Type'));
		echo $this->Form->input('Option');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>