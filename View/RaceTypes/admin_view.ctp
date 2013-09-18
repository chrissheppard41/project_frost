<div class="page-header">
	<h1><?php echo $this->Html->link(__('Race Types'), array('action' => 'index')); ?> - <?php echo h($raceType['RaceType']['name']); ?></h1>
</div>

<div class="raceTypes view">
	<div class="panel panel-default">
	  	<div class="panel-heading">
	  		<?php echo __('Race type view'); ?>
	  		<span class="pull-right">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $raceType['RaceType']['id']), array('class' => 'btn-sm btn-warning')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $raceType['RaceType']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
	  		</span>

	  	</div>
	  	<div class="panel-body">
	  		<div class="row">
	  			<span class="col-md-3"><?php echo __('Id'); ?></span>
	  			<span class="col-md-9"><?php echo h($raceType['RaceType']['id']); ?></span>
	  		</div>
	  		<div class="row">
	  			<span class="col-md-3"><?php echo __('Race Type Name'); ?></span>
	  			<span class="col-md-9"><?php echo h($raceType['RaceType']['name']); ?></span>
	  		</div>
	  		<div class="row">
	  			<span class="col-md-3"><?php echo __('Modified'); ?></span>
	  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($raceType['RaceType']['modified'])); ?></span>
	  		</div>
	  		<div class="row">
	  			<span class="col-md-3"><?php echo __('Created'); ?></span>
	  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($raceType['RaceType']['created'])); ?></span>
	  		</div>
	  	</div>
	</div>

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
					<?php echo $this->Html->link(__('View'), array('controller' => 'races', 'action' => 'view', $race['Races']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'races', 'action' => 'edit', $race['Races']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $race['Races']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } ?>
</div>

