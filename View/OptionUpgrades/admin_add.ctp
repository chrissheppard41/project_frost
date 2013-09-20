<div class="page-header">
    <h1><?php echo $this->Html->link(__('Option Upgrades'), array('action' => 'index')); ?> - Admin Add</h1>
</div>

<div class="optionUpgrades form">
	<?php
	echo $this->Form->create('OptionUpgrade');
		echo $this->Form->input('enhancements_id');
		echo $this->Form->input('by');
		echo $this->Form->input('addition');
		echo $this->Form->input('options_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>