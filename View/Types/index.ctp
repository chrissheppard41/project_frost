<div class="types index">
    <div class="row">
        <h2 class="span6"><?php echo __('Types');?></h2>
        <div class="span6 alignRight">
            <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success icon icon-add')); ?>
        </div>
    </div>
    <?php if(!empty($types)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'types', 'action' => 'save_order')); ?>">
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
			<?php foreach ($types as $type){ ?>
			<tr id="types-<?php echo $type['Type']['id']; ?>" data-id="<?php echo $type['Type']['id']; ?>">
								<td><?php echo h($type['Type']['id']); ?></td>
								<td><?php echo h($type['Type']['name']); ?></td>
								<td><?php echo h($type['Type']['created']); ?></td>
								<td><?php echo h($type['Type']['modified']); ?></td>
								<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $type['Type']['id']), array('class' => 'icon icon-eye')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $type['Type']['id']), array('class' => 'icon icon-edit')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $type['Type']['id']), array('class' => 'icon icon-delete'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p>No <?php echo __('Types');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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