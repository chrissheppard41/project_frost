<div class="races view">
<h2><?php  echo __('Race');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($race['Race']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race Types'); ?></dt>
		<dd>
			<?php echo $this->Html->link($race['RaceTypes']['name'], array('controller' => 'race_types', 'action' => 'view', $race['RaceTypes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race Name'); ?></dt>
		<dd>
			<?php echo h($race['Race']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($race['Race']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($race['Race']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

