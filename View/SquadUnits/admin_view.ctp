<div class="page-header">
    <h1><?php echo $this->Html->link(__('Squads'), array('controller' => 'squads', 'action' => 'index')); ?> - <?php echo $this->Html->link($squadUnit['Squads']['name'], array('controller' => 'squads', 'action' => 'view', $squadUnit['Squads']['id'])); ?> - Admin Unit view</h1>
</div>
<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Squad Unit view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $squadUnit['SquadUnit']['id']), array('class' => 'btn-sm btn-warning')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($squadUnit['SquadUnit']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Max unit count'); ?></span>
			<span class='col-md-9'><?php echo h($squadUnit['SquadUnit']['min_count']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Min unit count'); ?></span>
			<span class='col-md-9'><?php echo h($squadUnit['SquadUnit']['max_count']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Unit'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($squadUnit['Units']['name'], array('controller' => 'units', 'action' => 'view', $squadUnit['Units']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Squad'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($squadUnit['Squads']['name'], array('controller' => 'units', 'action' => 'view', $squadUnit['Squads']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($squadUnit['SquadUnit']['modified'])); ?></span>
		</div>

  	</div>
</div>

<div class="panel panel-primary">
  	<div class="panel-heading">
  		Squad Unit options
	</div>
	<?php if(!empty($squadUnit['Group'])) { ?>
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
		<?php foreach ($squadUnit['Group'] as $group){ ?>

			<tr id="units-<?php echo $group['id']; ?>" data-id="<?php echo $group['id']; ?>" <?php echo (!is_numeric($group['SquadOption']['max_count']))?"class='danger'":"";?>>
				<td><?php echo h($group['name']); ?></td>
				<td><?php echo h($group['SquadOption']['min_count']); ?></td>
				<td><?php echo h($group['SquadOption']['max_count']); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'squad_options', 'action' => 'edit', $group['SquadOption']['id'], $squadUnit['SquadUnit']['id']), array('class' => 'btn-sm btn-warning')); ?>
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
<div class="related">
	<?php if (!empty($squadUnit['Units'])){ ?>
	<table class="table table-striped table-bordered table-listings">
	<tr>
		<th><?php echo __('ID');?></th>
		<th><?php echo __('Name');?></th>
		<th><?php echo __('Sargeant');?></th>
		<th><?php echo __('WS');?></th>
		<th><?php echo __('BS');?></th>
		<th><?php echo __('S');?></th>
		<th><?php echo __('T');?></th>
		<th><?php echo __('I');?></th>
		<th><?php echo __('W');?></th>
		<th><?php echo __('A');?></th>
		<th><?php echo __('L');?></th>
		<th><?php echo __('AS');?></th>
		<th><?php echo __('IS');?></th>
		<th><?php echo __('pts');?></th>
		<th><?php echo __('Created');?></th>
		<th><?php echo __('Modified');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<tr>
		<td><?php echo $squadUnit['Units']['id'];?></td>
		<td><?php echo $squadUnit['Units']['name'];?></td>
		<td><span class="glyphicon glyphicon-<?php echo (($squadUnit['Units']['sargeant'])?'ok':'remove'); ?>"></span></td>
		<td><?php echo $squadUnit['Units']['weapon_skill'];?></td>
		<td><?php echo $squadUnit['Units']['ballistic_skill'];?></td>
		<td><?php echo $squadUnit['Units']['strength'];?></td>
		<td><?php echo $squadUnit['Units']['toughness'];?></td>
		<td><?php echo $squadUnit['Units']['initiative'];?></td>
		<td><?php echo $squadUnit['Units']['wounds'];?></td>
		<td><?php echo $squadUnit['Units']['attacks'];?></td>
		<td><?php echo $squadUnit['Units']['leadership'];?></td>
		<td><?php echo $squadUnit['Units']['armour_save'];?></td>
		<td><?php echo $squadUnit['Units']['invulnerable_save'];?></td>
		<td><?php echo $squadUnit['Units']['pts'];?></td>
		<td><?php echo $this->Time->timeAgoInWords($squadUnit['Units']['created']);?></td>
		<td><?php echo $this->Time->timeAgoInWords($squadUnit['Units']['modified']);?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'units', 'action' => 'view', $squadUnit['Units']['id']), array('class' => 'btn-sm btn-primary')); ?>
			<?php echo $this->Html->link(__('Edit'), array('controller' => 'units', 'action' => 'edit', $squadUnit['Units']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'units', 'action' => 'delete', $squadUnit['Units']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
		</td>
	</tr>
	</table>
<?php } ?>

</div>


<div class="page-header">
  <h2><?php  echo __('Related Squads');?></h2>
</div>
<?php if(!empty($squadUnit['Squads'])) { ?>
  <table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'squads', 'action' => 'save_order')); ?>">
    <thead>
      <tr>
        <th><?php echo __('id');?></th>
        <th><?php echo __('name');?></th>
        <th><?php echo __('created');?></th>
        <th><?php echo __('modified');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
      </tr>
    </thead>
    <tbody>
      <tr id="squads-<?php echo $squadUnit['Squads']['id']; ?>" data-id="<?php echo $squadUnit['Squads']['id']; ?>">
        <td><?php echo h($squadUnit['Squads']['id']); ?></td>
        <td><?php echo h($squadUnit['Squads']['name']); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($squadUnit['Squads']['created'])); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($squadUnit['Squads']['modified'])); ?></td>
        <td class="actions">
          <?php echo $this->Html->link(__('View'), array('controller' => 'squads', 'action' => 'view', $squadUnit['Squads']['id']), array('class' => 'btn-sm btn-primary')); ?>
          <?php echo $this->Html->link(__('Edit'), array('controller' => 'squads', 'action' => 'edit', $squadUnit['Squads']['id']), array('class' => 'btn-sm btn-warning')); ?>
          <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $squadUnit['Squads']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
        </td>
      </tr>
    </tbody>
  </table>
<?php } ?>



<div class="page-header">
  <h2><?php  echo __('Related groups');?></h2>
</div>
<?php if(!empty($squadUnit['Group'])) { ?>
  <table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'squads', 'action' => 'save_order')); ?>">
    <thead>
      <tr>
        <th><?php echo __('id');?></th>
        <th><?php echo __('name');?></th>
        <th><?php echo __('created');?></th>
        <th><?php echo __('modified');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
      </tr>
    </thead>
    <tbody>
		<?php foreach ($squadUnit['Group'] as $group){ ?>
	      <tr id="squads-<?php echo $group['id']; ?>" data-id="<?php echo $group['id']; ?>">
	        <td><?php echo h($group['id']); ?></td>
	        <td><?php echo h($group['name']); ?></td>
	        <td><?php echo h($this->Time->timeAgoInWords($group['created'])); ?></td>
	        <td><?php echo h($this->Time->timeAgoInWords($group['modified'])); ?></td>
	        <td class="actions">
	          <?php echo $this->Html->link(__('View'), array('controller' => 'groups', 'action' => 'view', $group['id']), array('class' => 'btn-sm btn-primary')); ?>
	          <?php echo $this->Html->link(__('Edit'), array('controller' => 'groups', 'action' => 'edit', $group['id']), array('class' => 'btn-sm btn-warning')); ?>
	          <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groups', 'action' => 'delete', $group['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
	        </td>
	      </tr>
      	<?php } ?>
    </tbody>
  </table>
<?php } ?>
