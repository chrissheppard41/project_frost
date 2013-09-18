<div class="page-header">
	<h1><?php echo __('Weapons');?></h1>
</div>
<div class="weapons index">
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success icon icon-add')); ?>
    </p>
    <?php if(!empty($weapons)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'weapons', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('name');?></th>
								<th><?php echo $this->Paginator->sort('race_type_id');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
								<th><?php echo $this->Paginator->sort('modified');?></th>
								<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($weapons as $weapon){ ?>
			<tr id="weapons-<?php echo $weapon['Weapon']['id']; ?>" data-id="<?php echo $weapon['Weapon']['id']; ?>">
								<td><?php echo h($weapon['Weapon']['id']); ?></td>
								<td><?php echo h($weapon['Weapon']['name']); ?></td>
								<td><?php echo $this->Html->link($weapon['RaceType']['id'], array('controller' => 'race_types', 'action' => 'view', $weapon['RaceType']['id'])); ?></td>
								<td><?php echo h($weapon['Weapon']['created']); ?></td>
								<td><?php echo h($weapon['Weapon']['modified']); ?></td>
								<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $weapon['Weapon']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $weapon['Weapon']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $weapon['Weapon']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p>No <?php echo __('Weapons');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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