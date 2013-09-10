<div class="squads view">
<h2><?php  echo __('Squad');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($squad['Squad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($squad['Squad']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sarg Count'); ?></dt>
		<dd>
			<?php echo h($squad['Squad']['sarg_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit Count'); ?></dt>
		<dd>
			<?php echo h($squad['Squad']['unit_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($squad['RaceTypes']['name'], array('controller' => 'race_types', 'action' => 'view', $squad['RaceTypes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($squad['Types']['name'], array('controller' => 'types', 'action' => 'view', $squad['Types']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($squad['Squad']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($squad['Squad']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

