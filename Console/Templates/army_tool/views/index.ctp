<div class="page-header">
	<h1><?php echo "<?php echo __('{$pluralHumanName}');?>";?></h1>
</div>
<div class="<?php echo $pluralVar;?> index">
	<p class="pull-right">
        <?php echo "<?php echo \$this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success icon icon-add')); ?>\n"; ?>
    </p>
    <?php echo "<?php if(!empty(\${$pluralVar})) { ?>"; ?>

	<table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo "<?php echo Router::url(array('controller' => '{$pluralVar}', 'action' => 'save_order')); ?>"; ?>">
		<thead>
			<tr>
				<?php
					foreach ($fields as $field) {
						if ($field !== 'order' && $field !== 'slug') {
				?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
				<?php
						}
					}
				?>
				<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
			</tr>
		</thead>
		<tbody>
			<?php echo "<?php foreach (\${$pluralVar} as \${$singularVar}){ ?>\n"; ?>
			<tr id="<?php echo $pluralVar; ?>-<?php echo "<?php echo \${$singularVar}['{$modelClass}']['id']; ?>";?>" data-id="<?php echo "<?php echo \${$singularVar}['{$modelClass}']['id']; ?>";?>">
				<?php
					foreach ($fields as $field) {
						if ($field !== 'order' && $field !== 'slug') {
							$isKey = false;
							if (!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									if ($field === $details['foreignKey']) {
										$isKey = true;
				?>
				<td><?php echo "<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>"; ?></td>
				<?php
										break;
									}
								}
							}
							if ($isKey !== true) {
				?>
				<td><?php echo "<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>";?></td>
				<?php
							}
						}
					}
				?>
				<td class="actions">
					<?php echo "<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn-sm btn-primary')); ?>\n"; ?>
					<?php echo "<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn-sm btn-warning')); ?>\n"; ?>
					<?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>\n"; ?>
				</td>
			</tr>
			<?php echo "<?php } ?>\n";?>
		</tbody>
	</table>
    <?php echo "<?php } else { ?>\n";?>
        <p class='clearfix'>No <?php echo "<?php echo __('{$pluralHumanName}');?>";?> available, why not <?php echo "<?php echo \$this->Html->link(__('create one'), array('action' => 'add')); ?>\n"; ?></p>
    <?php echo "<?php } ?>\n";?>
    <?php echo "<?php echo \$this->element('pagination'); ?>\n";?>
</div>

<?php
echo "<?php\n";
echo "\t/* Uncomment the following two lines to enable sortable behaviour on this table. */\n";
echo "\t//echo \$this->Html->script('libs/jquery-ui-1.8.22.sortable.min.js', array('inline' => false));\n";
echo "\t//echo \$this->Html->script('admin/sortable.js', array('inline' => false));\n\n";
echo "\techo \$this->Js->buffer(
		\"
			/* Adding directional arrow icons onto paginated columns. */
			$('.asc', '.table-listings').addClass('icon icon-arrow-up');
			$('.desc', '.table-listings').addClass('icon icon-arrow-down');
		\"
	);\n";
echo "?>";
?>