<div class="page-header">
  <h1><?php echo $this->Html->link(__('Squads'), array('action' => 'index')); ?> - <?php echo h($squad['Squad']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php echo __('Squad view'); ?>
  		<span class="pull-right">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $squad['Squad']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $squad['Squad']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Id'); ?></span>
  			<span class="col-md-9"><?php echo h($squad['Squad']['id']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Name'); ?></span>
  			<span class="col-md-9"><?php echo h($squad['Squad']['name']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Races'); ?></span>
  			<span class="col-md-9"><?php echo $this->Html->link($squad['Races']['name'], array('controller' => 'races', 'action' => 'view', $squad['Races']['id'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Types'); ?></span>
  			<span class="col-md-9"><?php echo $this->Html->link($squad['Types']['name'], array('controller' => 'types', 'action' => 'view', $squad['Types']['id'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Created'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($squad['Squad']['created'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Modified'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($squad['Squad']['modified'])); ?></span>
  		</div>
  	</div>
</div>
<div class="panel panel-primary">
  	<div class="panel-heading">
  		Squad Unit count
	</div>
	<?php if(!empty($squad['Unit'])) { ?>
		<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'units', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Min count');?></th>
				<th><?php echo __('Max count');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($squad['Unit'] as $unit){ ?>

			<tr id="units-<?php echo $unit['id']; ?>" data-id="<?php echo $unit['id']; ?>" <?php echo (!is_numeric($unit['SquadUnit']['max_count']))?"class='danger'":"";?>>
				<td><?php echo h($unit['name']); ?></td>
				<td><?php echo h($unit['SquadUnit']['min_count']); ?></td>
				<td><?php echo h($unit['SquadUnit']['max_count']); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'squad_units', 'action' => 'view', $unit['SquadUnit']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'squad_units', 'action' => 'edit', $unit['SquadUnit']['id'], $squad['Squad']['id']), array('class' => 'btn-sm btn-warning')); ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<?php } ?>
</div>

<div class="page-header">
  <h2><?php  echo __('Related Units');?></h2>
</div>
<?php if(!empty($squad['Unit'])) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'units', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Sargeant');?></th>
				<th><?php echo __('WS');?></th>
				<th><?php echo __('BS');?></th>
				<th><?php echo __('S');?></th>
				<th><?php echo __('T');?></th>
				<th><?php echo __('I');?></th>
				<th><?php echo __('W');?></th>
				<th><?php echo __('A');?></th>
				<th><?php echo __('LD');?></th>
				<th><?php echo __('AS');?></th>
				<th><?php echo __('IS');?></th>
				<th><?php echo __('Pts');?></th>
				<th><?php echo __('Created');?></th>
				<th><?php echo __('Modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($squad['Unit'] as $unit){ ?>
			<tr id="units-<?php echo $unit['id']; ?>" data-id="<?php echo $unit['id']; ?>">
				<td><?php echo h($unit['name']); ?></td>
				<td><span class="glyphicon glyphicon-<?php echo (($unit['sargeant'])?'ok':'remove'); ?>"></span></td>
				<td><?php echo h($unit['weapon_skill']); ?></td>
				<td><?php echo h($unit['ballistic_skill']); ?></td>
				<td><?php echo h($unit['strength']); ?></td>
				<td><?php echo h($unit['toughness']); ?></td>
				<td><?php echo h($unit['initiative']); ?></td>
				<td><?php echo h($unit['wounds']); ?></td>
				<td><?php echo h($unit['attacks']); ?></td>
				<td><?php echo h($unit['leadership']); ?></td>
				<td><?php echo h($unit['armour_save']); ?></td>
				<td><?php echo h($unit['invulnerable_save']); ?></td>
				<td><?php echo h($unit['pts']); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($unit['created'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($unit['modified'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'units', 'action' => 'view', $unit['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'units', 'action' => 'edit', $unit['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'units', 'action' => 'delete', $unit['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } ?>

<div class="page-header">
  <h2><?php  echo __('Related Special Rules');?></h2>
</div>
<?php if(!empty($squad['SpecialRule'])) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'units', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo __('Name');?></th>
				<th><?php echo __('Created');?></th>
				<th><?php echo __('Modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($squad['SpecialRule'] as $specialRule){ ?>
			<tr id="units-<?php echo $specialRule['id']; ?>" data-id="<?php echo $specialRule['id']; ?>">
				<td><?php echo h($specialRule['name']); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($specialRule['created'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($specialRule['modified'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'specialRules', 'action' => 'view', $specialRule['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'specialRules', 'action' => 'edit', $specialRule['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'specialRules', 'action' => 'delete', $specialRule['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } ?>
