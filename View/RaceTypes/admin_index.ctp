<div class="page-header">
	<h1><?php echo __('Race Types'); ?></h1>
</div>
<div class="raceTypes index">
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
    </p>
    <?php if(!empty($raceTypes)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'raceTypes', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($raceTypes as $raceType){ ?>
			<tr id="raceTypes-<?php echo $raceType['RaceType']['id']; ?>" data-id="<?php echo $raceType['RaceType']['id']; ?>">
				<td><?php echo h($raceType['RaceType']['id']); ?></td>
				<td><?php echo h($raceType['RaceType']['name']); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($raceType['RaceType']['modified'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($raceType['RaceType']['created'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $raceType['RaceType']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $raceType['RaceType']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $raceType['RaceType']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p>No <?php echo __('Race Types');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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