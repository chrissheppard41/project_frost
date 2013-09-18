<div class="page-header">
	<h1><?php echo "<?php echo \$this->Html->link(__('{$singularHumanName}'), array('action' => 'index')); ?>"; ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php echo "<?php  echo __('{$singularHumanName} view');?>\n";?>
  		<span class="pull-right">
  			<?php echo "<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn-sm btn-warning')); ?>\n"; ?>
			<?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>\n"; ?>
  		</span>
  	</div>
  	<div class="panel-body">

<?php
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t<div class='row'>\n";
				echo "\t\t\t<span class='col-md-3'><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></span>\n";
				echo "\t\t\t<span class='col-md-9'><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></span>\n";
				echo "\t\t</div>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t<div class='row'>\n";
		echo "\t\t\t<span class='col-md-3'><?php echo __('" . Inflector::humanize($field) . "'); ?></span>\n";
		echo "\t\t\t<span class='col-md-9'><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></span>\n";
		echo "\t\t</div>\n";
	}
}
?>

  	</div>
</div>

<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "');?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])){ ?>\n";?>
		<dl>
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}'];?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?php echo "<?php } ?>\n";?>
	</div>
	<?php
	endforeach;
endif;
if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$i = 0;
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
<div class="related">
	<h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "');?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])){ ?>\n";?>
	<table class="striped-table bordered-table">
	<tr>
<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
			}
?>
		<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
	</tr>
<?php
echo "\t<?php
		foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}){ ?>\n";
		echo "\t\t<tr>\n";
			foreach ($details['fields'] as $field) {
				echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}'];?></td>\n";
			}

			echo "\t\t\t<td class=\"actions\">\n";
			echo "\t\t\t\t<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
			echo "\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
			echo "\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), null, __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
			echo "\t\t\t</td>\n";
		echo "\t\t</tr>\n";

echo "\t<?php } ?>\n";
?>
	</table>
<?php echo "<?php } ?>\n\n";?>
</div>
<?php endforeach;?>
