<div class="raceTypes view">
<h2><?php  echo __('Race Type');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($raceType['RaceType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race Type Name'); ?></dt>
		<dd>
			<?php echo h($raceType['RaceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($raceType['RaceType']['modified'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($this->Time->timeAgoInWords($raceType['RaceType']['created'])); ?>
			&nbsp;
		</dd>
	</dl>

	<?php if(!empty($races)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'races', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
								<th><?php echo __('Id'); ?></th>
								<th><?php echo __('Race Name'); ?></th>
								<th><?php echo __('Modified'); ?></th>
								<th><?php echo __('Created'); ?></th>
								<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($races as $race) { ?>
			<tr id="races-<?php echo $race['Races']['id']; ?>" data-id="<?php echo $race['Races']['id']; ?>">
								<td><?php echo h($race['Races']['id']); ?></td>
								<td><?php echo h($race['Races']['name']); ?></td>
								<td><?php echo h($this->Time->timeAgoInWords($race['Races']['modified'])); ?></td>
								<td><?php echo h($this->Time->timeAgoInWords($race['Races']['created'])); ?></td>
								<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'races', 'action' => 'view', $race['Races']['id']), array('class' => 'icon icon-eye')); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'races', 'action' => 'edit', $race['Races']['id']), array('class' => 'icon icon-edit')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $race['Races']['id']), array('class' => 'icon icon-delete'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } ?>
</div>

