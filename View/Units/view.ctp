<div class="units view">
<h2><?php  echo __('Unit');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weapon Skill'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['weapon_skill']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ballistic Skill'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['ballistic_skill']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Strength'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['strength']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Toughness'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['toughness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Initiative'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['initiative']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wounds'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['wounds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leadership'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['leadership']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Armour Save'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['armour_save']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Invulnerable Save'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['invulnerable_save']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pts'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['pts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($unit['RaceTypes']['name'], array('controller' => 'race_types', 'action' => 'view', $unit['RaceTypes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($unit['Unit']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

