<div class="units index">
    <div class="page-header">
		<h1><?php  echo __('Units');?></h1>
	</div>
	<p class="pull-right">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
    </p>
    <?php if(!empty($units)) { ?>
	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'units', 'action' => 'save_order')); ?>">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('sargeant');?></th>
				<th><?php echo $this->Paginator->sort('weapon_skill', 'WS');?></th>
				<th><?php echo $this->Paginator->sort('ballistic_skill', 'BS');?></th>
				<th><?php echo $this->Paginator->sort('strength', 'S');?></th>
				<th><?php echo $this->Paginator->sort('toughness', 'T');?></th>
				<th><?php echo $this->Paginator->sort('initiative', 'I');?></th>
				<th><?php echo $this->Paginator->sort('wounds', 'W');?></th>
				<th><?php echo $this->Paginator->sort('attacks', 'A');?></th>
				<th><?php echo $this->Paginator->sort('leadership', 'L');?></th>
				<th><?php echo $this->Paginator->sort('armour_save', 'AS');?></th>
				<th><?php echo $this->Paginator->sort('invulnerable_save', 'IS');?></th>
				<th><?php echo $this->Paginator->sort('pts');?></th>
				<th><?php echo $this->Paginator->sort('races_id');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($units as $unit){ ?>
			<tr id="units-<?php echo $unit['Unit']['id']; ?>" data-id="<?php echo $unit['Unit']['id']; ?>">
				<td><?php echo h($unit['Unit']['id']); ?></td>
				<td><?php echo h($unit['Unit']['name']); ?></td>
				<td><span class="glyphicon glyphicon-<?php echo (($unit['Unit']['sargeant'])?'ok':'remove'); ?>"></span></td>
				<td><?php echo h($unit['Unit']['weapon_skill']); ?></td>
				<td><?php echo h($unit['Unit']['ballistic_skill']); ?></td>
				<td><?php echo h($unit['Unit']['strength']); ?></td>
				<td><?php echo h($unit['Unit']['toughness']); ?></td>
				<td><?php echo h($unit['Unit']['initiative']); ?></td>
				<td><?php echo h($unit['Unit']['wounds']); ?></td>
				<td><?php echo h($unit['Unit']['attacks']); ?></td>
				<td><?php echo h($unit['Unit']['leadership']); ?></td>
				<td><?php echo h($unit['Unit']['armour_save']); ?></td>
				<td><?php echo h($unit['Unit']['invulnerable_save']); ?></td>
				<td><?php echo h($unit['Unit']['pts']); ?></td>
				<td><?php echo $this->Html->link($unit['Races']['name'], array('controller' => 'races', 'action' => 'view', $unit['Races']['id'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($unit['Unit']['created'])); ?></td>
				<td><?php echo h($this->Time->timeAgoInWords($unit['Unit']['modified'])); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $unit['Unit']['id']), array('class' => 'btn-sm btn-primary')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unit['Unit']['id']), array('class' => 'btn-sm btn-warning')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $unit['Unit']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <?php } else { ?>
        <p>No <?php echo __('Units');?> available, why not <?php echo $this->Html->link(__('create one'), array('action' => 'add')); ?>
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