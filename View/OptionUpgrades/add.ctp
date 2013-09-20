<div class="page-header">
    <h1><?php echo $this->Html->link(__('OptionUpgrade'), array('action' => 'index')); ?> - Add</h1>
</div>

<div class="optionUpgrades form">
	<?php
	echo $this->Form->create('OptionUpgrade');
		echo $this->Form->input('enhances');
		echo $this->Form->input('by');
		echo $this->Form->input('addition');
		echo $this->Form->input('options_id');
		echo $this->Form->submit(__('Save'));
		echo $this->Form->end();
	?>
</div>