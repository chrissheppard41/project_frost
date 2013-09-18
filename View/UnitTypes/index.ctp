<div class="page-header">
	<h1><?php echo __('Unit Types');?></h1>
</div>
<div class="unitTypes index">
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success icon icon-add')); ?>
    </p>
    <?php if(!empty($unitTypes)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'unitTypes', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('name');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
								<th><?php echo $this->Paginator->sort('modified');?></th>
								<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($unitTypes as $unitType){ ?>
			<tr id="unitTypes-<?php echo $unitType['UnitType']['id']; ?>" data-id="<?php echo $unitType['UnitType']['id']; ?>">
								<td><?php echo h($unitType['UnitType']['id']); ?></td>
								<td><?php echo h($unitType['UnitType']['name']); ?></td>
								<td><?php echo h($unitType['UnitType']['created']); ?></td>
								<td><?php echo h($unitType['UnitType']['modified']); ?></td>
								<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $unitType['UnitType']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unitType['UnitType']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $unitType['UnitType']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p class='clearfix'>No <?php echo __('Unit Types');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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