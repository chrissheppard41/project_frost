<div class="page-header">
	<h1><?php echo __('Option Upgrades');?></h1>
</div>
<div class="optionUpgrades index">
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success icon icon-add')); ?>
    </p>
    <?php if(!empty($optionUpgrades)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'optionUpgrades', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('enhances');?></th>
								<th><?php echo $this->Paginator->sort('by');?></th>
								<th><?php echo $this->Paginator->sort('addition');?></th>
								<th><?php echo $this->Paginator->sort('options_id');?></th>
								<th><?php echo $this->Paginator->sort('created');?></th>
								<th><?php echo $this->Paginator->sort('modified');?></th>
								<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($optionUpgrades as $optionUpgrade){ ?>
			<tr id="optionUpgrades-<?php echo $optionUpgrade['OptionUpgrade']['id']; ?>" data-id="<?php echo $optionUpgrade['OptionUpgrade']['id']; ?>">
								<td><?php echo h($optionUpgrade['OptionUpgrade']['id']); ?></td>
								<td><?php echo $this->Html->link($optionUpgrade['Enhancements']['name'], array('controller' => 'enhancements', 'action' => 'view', $optionUpgrade['Enhancements']['id'])); ?></td>
								<td><?php echo h($optionUpgrade['OptionUpgrade']['by']); ?></td>
								<td><?php echo h($optionUpgrade['OptionUpgrade']['addition']); ?></td>
								<td><?php echo $this->Html->link($optionUpgrade['Options']['name'], array('controller' => 'options', 'action' => 'view', $optionUpgrade['Options']['id'])); ?></td>
								<td><?php echo h($this->Time->timeAgoInWords($optionUpgrade['OptionUpgrade']['created'])); ?></td>
								<td><?php echo h($this->Time->timeAgoInWords($optionUpgrade['OptionUpgrade']['modified'])); ?></td>
								<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $optionUpgrade['OptionUpgrade']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $optionUpgrade['OptionUpgrade']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $optionUpgrade['OptionUpgrade']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p class='clearfix'>No <?php echo __('Option Upgrades');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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