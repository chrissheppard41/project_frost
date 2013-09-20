<div class="page-header">
	<h1><?php echo $this->Html->link(__('Options'), array('action' => 'index')); ?> - <?php echo h($option['Option']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php  echo __('Option view');?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $option['Option']['id']), array('class' => 'btn-sm btn-warning')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Option']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">

		<div class='row'>
			<span class='col-md-3'><?php echo __('Id'); ?></span>
			<span class='col-md-9'><?php echo h($option['Option']['id']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Name'); ?></span>
			<span class='col-md-9'><?php echo h($option['Option']['name']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Pts'); ?></span>
			<span class='col-md-9'><?php echo h($option['Option']['pts']); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Groups'); ?></span>
			<span class='col-md-9'><?php echo $this->Html->link($option['Groups']['name'], array('controller' => 'groups', 'action' => 'view', $option['Groups']['id'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Created'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($option['Option']['created'])); ?></span>
		</div>
		<div class='row'>
			<span class='col-md-3'><?php echo __('Modified'); ?></span>
			<span class='col-md-9'><?php echo h($this->Time->timeAgoInWords($option['Option']['modified'])); ?></span>
		</div>

  	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Option Upgrades');?></h3>
	<?php if (!empty($option['OptionUpgrades'])){ ?>
	<table class="striped-table bordered-table">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Enhances'); ?></th>
		<th><?php echo __('By'); ?></th>
		<th><?php echo __('Addition'); ?></th>
		<th><?php echo __('Options Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		foreach ($option['OptionUpgrades'] as $optionUpgrades){ ?>
		<tr>
			<td><?php echo $optionUpgrades['id'];?></td>
			<td><?php echo $optionUpgrades['enhances'];?></td>
			<td><?php echo $optionUpgrades['by'];?></td>
			<td><?php echo $optionUpgrades['addition'];?></td>
			<td><?php echo $optionUpgrades['options_id'];?></td>
			<td><?php echo $optionUpgrades['created'];?></td>
			<td><?php echo $optionUpgrades['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'option_upgrades', 'action' => 'view', $optionUpgrades['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'option_upgrades', 'action' => 'edit', $optionUpgrades['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'option_upgrades', 'action' => 'delete', $optionUpgrades['id']), null, __('Are you sure you want to delete # %s?', $optionUpgrades['id'])); ?>
			</td>
		</tr>
	<?php } ?>
	</table>
<?php } ?>

</div>
