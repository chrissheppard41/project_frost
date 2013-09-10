<div class="armyLists view">
<h2><?php  echo __('Army List');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['name']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point Limit'); ?></dt>
		<dd>
			<?php echo h($armyList['ArmyList']['point_limit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hidden'); ?></dt>
		<dd>
			<?php echo h(($armyList['ArmyList']['hide'])?"Private":"Public"); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($armyList['Races']['name'], array('controller' => 'races', 'action' => 'view', $armyList['Races']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($armyList['Users']['username'], array('controller' => 'users', 'action' => 'view', $armyList['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($armyList['ArmyList']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($armyList['ArmyList']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

