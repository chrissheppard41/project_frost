<div class="armyLists view">
<h2><?php  echo __('Army List');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Army Name'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Races'); ?></dt>
		<dd>
			<?php echo $this->Html->link($armyList['Races']['id'], array('controller' => 'races', 'action' => 'view', $armyList['Races']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($armyList['Users']['id'], array('controller' => 'users', 'action' => 'view', $armyList['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

