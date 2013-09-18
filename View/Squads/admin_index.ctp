<div class="squads index">

	<div class="page-header">
	  	<h1><?php  echo __('Squads');?></h1>
	</div>
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
    </p>
    <?php if(!empty($squads)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'squads', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('races_id');?></th>
				<th><?php echo $this->Paginator->sort('types_id');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($squads as $squad){ ?>
			<tr id="squads-<?php echo $squad['Squad']['id']; ?>" data-id="<?php echo $squad['Squad']['id']; ?>">
				<td><?php echo h($squad['Squad']['id']); ?></td>
				<td><?php echo h($squad['Squad']['name']); ?></td>
				<td><?php echo $this->Html->link($squad['Races']['name'], array('controller' => 'races', 'action' => 'view', $squad['Races']['id'])); ?></td>
				<td><?php echo $this->Html->link($squad['Types']['name'], array('controller' => 'types', 'action' => 'view', $squad['Types']['id'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($squad['Squad']['created'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($squad['Squad']['modified'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $squad['Squad']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $squad['Squad']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $squad['Squad']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p>No <?php echo __('Squads');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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