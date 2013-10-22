<div class="page-header">
	<h1><?php echo __('Army Lists'); ?></h1>
</div>
<div class="armyLists index">
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
    </p>
    <?php if(!empty($armyLists)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'armyLists', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('point_limit');?></th>
				<th><?php echo $this->Paginator->sort('hide');?></th>
				<th><?php echo $this->Paginator->sort('races_id');?></th>
				<th><?php echo $this->Paginator->sort('users_id');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($armyLists as $armyList){ ?>
			<tr id="armyLists-<?php echo $armyList['ArmyList']['id']; ?>" data-id="<?php echo $armyList['ArmyList']['id']; ?>">
				<td><?php echo h($armyList['ArmyList']['id']); ?></td>
				<td><?php echo h($armyList['ArmyList']['name']); ?></td>
				<td><?php echo h($armyList['ArmyList']['point_limit']); ?></td>
				<td><?php echo h(($armyList['ArmyList']['hide'])?"Private":"Public"); ?></td>
				<td><?php echo $this->Html->link($armyList['Races']['name'], array('controller' => 'races', 'action' => 'view', $armyList['Races']['id'])); ?></td>
				<td><?php echo $this->Html->link((($armyList['Users']['username'])?$armyList['Users']['username']:$armyList['Users']['email']), array('controller' => 'users', 'action' => 'view', $armyList['Users']['id'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($armyList['ArmyList']['created'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($armyList['ArmyList']['modified'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $armyList['ArmyList']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $armyList['ArmyList']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $armyList['ArmyList']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p>No <?php echo __('Army Lists');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
</p>
    <?php } ?>
    <?php echo $this->element('pagination'); ?>
</div>

<?php
	/* Uncomment the following two lines to enable sortable behaviour on this table. */
	//echo $this->Html->script('libs/jquery-ui-1.8.22.sortable.min.js', array('inline' => false));
	//echo $this->Html->script('admin/sortable.js', array('inline' => false));

	echo $this->Js->buffer(
		"
			/* Adding directional arrow icons onto paginated columns. */
			$('.asc', '.table-listings').addClass('icon icon-arrow-up');
			$('.desc', '.table-listings').addClass('icon icon-arrow-down');
		"
	);
?>