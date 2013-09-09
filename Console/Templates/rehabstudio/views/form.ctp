<div class="<?php echo $pluralVar;?> form">
    <h2><?php echo "<?php echo \$this->Html->link('{$modelClass}', array('action' => 'index')); ?>";?> - <?php echo Inflector::humanize($action); ?></h2>
<?php
        echo "\t<?php\n";
        echo "\techo \$this->Form->create('{$modelClass}');\n";
        foreach ($fields as $field) {
            if (strpos($action, 'add') !== false && $field == $primaryKey) {
                continue;
            } elseif (!in_array($field, array('created', 'modified', 'updated', 'order'))) {
                echo "\t\techo \$this->Form->input('{$field}');\n";
            }
        }
        if (!empty($associations['hasAndBelongsToMany'])) {
            foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                echo "\t\techo \$this->Form->input('{$assocName}');\n";
            }
        }
        echo "\t\techo \$this->Form->submit(__('Save'));\n";
        echo "\t\techo \$this->Form->end();\n";
        echo "\t?>\n";
?>
</div>