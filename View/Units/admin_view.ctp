<div class="page-header">
	<h1><?php echo $this->Html->link(__('Units'), array('action' => 'index')); ?> - <?php echo h($unit['Unit']['name']); ?></h1>
</div>

<div class="panel panel-default">
  	<div class="panel-heading">
  		<?php echo __('Unit view'); ?>
  		<span class="pull-right">
  			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unit['Unit']['id']), array('class' => 'btn-sm btn-warning')); ?>
  			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $unit['Unit']['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
  		</span>
  	</div>
  	<div class="panel-body">
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Id'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['id']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Name'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['name']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Sargeant'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['sargeant']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Ballistic skill'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['ballistic_skill']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Strength'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['strength']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Toughness'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['toughness']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Initiative'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['initiative']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Wounds'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['wounds']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Attacks'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['attacks']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Leadership'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['leadership']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Armour save'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['armour_save']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Invulnerable save'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['invulnerable_save']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Pts'); ?></span>
  			<span class="col-md-9"><?php echo h($unit['Unit']['pts']); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Races'); ?></span>
  			<span class="col-md-9"><?php echo $this->Html->link($unit['Races']['name'], array('controller' => 'races', 'action' => 'view', $unit['Races']['id'])); ?></span>
  		</div>
      <div class="row">
        <span class="col-md-3"><?php echo __('Unit Types'); ?></span>
        <span class="col-md-9"><?php echo $this->Html->link($unit['UnitTypes']['name'], array('controller' => 'unit_types', 'action' => 'view', $unit['UnitTypes']['id'])); ?></span>
      </div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Created'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($unit['Unit']['created'])); ?></span>
  		</div>
  		<div class="row">
  			<span class="col-md-3"><?php echo __('Modified'); ?></span>
  			<span class="col-md-9"><?php echo h($this->Time->timeAgoInWords($unit['Unit']['modified'])); ?></span>
  		</div>
  	</div>
</div>

<div class="page-header">
  <h2><?php  echo __('Related Squads');?></h2>
</div>
<?php if(!empty($unit['Squad'])) { ?>
  <table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'squads', 'action' => 'save_order')); ?>">
    <thead>
      <tr>
        <th><?php echo __('id');?></th>
        <th><?php echo __('name');?></th>
        <th><?php echo __('created');?></th>
        <th><?php echo __('modified');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($unit['Squad'] as $squad){ ?>
      <tr id="squads-<?php echo $squad['id']; ?>" data-id="<?php echo $squad['id']; ?>">
        <td><?php echo h($squad['id']); ?></td>
        <td><?php echo h($squad['name']); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($squad['created'])); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($squad['modified'])); ?></td>
        <td class="actions">
          <?php echo $this->Html->link(__('View'), array('controller' => 'squads', 'action' => 'view', $squad['id']), array('class' => 'btn-sm btn-primary')); ?>
          <?php echo $this->Html->link(__('Edit'), array('controller' => 'squads', 'action' => 'edit', $squad['id']), array('class' => 'btn-sm btn-warning')); ?>
          <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'squads', 'action' => 'delete', $squad['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
    <?php } ?>

<div class="page-header">
  <h2><?php  echo __('Related Weapons');?></h2>
</div>
<?php if(!empty($unit['Weapons'])) { ?>
  <table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'squads', 'action' => 'save_order')); ?>">
    <thead>
      <tr>
        <th><?php echo __('ID');?></th>
        <th><?php echo __('Name');?></th>
        <th><?php echo __('Created');?></th>
        <th><?php echo __('Modified');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($unit['Weapons'] as $weapon){ ?>
      <tr id="weapons-<?php echo $weapon['id']; ?>" data-id="<?php echo $weapon['id']; ?>">
        <td><?php echo h($weapon['id']); ?></td>
        <td><?php echo h($weapon['name']); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($weapon['created'])); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($weapon['modified'])); ?></td>
        <td class="actions">
          <?php echo $this->Html->link(__('View'), array('controller' => 'weapons', 'action' => 'view', $weapon['id']), array('class' => 'btn-sm btn-primary')); ?>
          <?php echo $this->Html->link(__('Edit'), array('controller' => 'weapons', 'action' => 'edit', $weapon['id']), array('class' => 'btn-sm btn-warning')); ?>
          <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'weapons', 'action' => 'delete', $weapon['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
    <?php } ?>

<div class="page-header">
  <h2><?php  echo __('Related Abilities');?></h2>
</div>
<?php if(!empty($unit['Abilities'])) { ?>
  <table class="table table-striped table-bordered table-listings" data-sort-url="<?php echo Router::url(array('controller' => 'squads', 'action' => 'save_order')); ?>">
    <thead>
      <tr>
        <th><?php echo __('ID');?></th>
        <th><?php echo __('Name');?></th>
        <th><?php echo __('Created');?></th>
        <th><?php echo __('Modified');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($unit['Abilities'] as $weapon){ ?>
      <tr id="weapons-<?php echo $weapon['id']; ?>" data-id="<?php echo $weapon['id']; ?>">
        <td><?php echo h($weapon['id']); ?></td>
        <td><?php echo h($weapon['name']); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($weapon['created'])); ?></td>
        <td><?php echo h($this->Time->timeAgoInWords($weapon['modified'])); ?></td>
        <td class="actions">
          <?php echo $this->Html->link(__('View'), array('controller' => 'weapons', 'action' => 'view', $weapon['id']), array('class' => 'btn-sm btn-primary')); ?>
          <?php echo $this->Html->link(__('Edit'), array('controller' => 'weapons', 'action' => 'edit', $weapon['id']), array('class' => 'btn-sm btn-warning')); ?>
          <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'weapons', 'action' => 'delete', $weapon['id']), array('class' => 'btn-sm btn-danger'), __('Are you sure you want to delete this record?')); ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
    <?php } ?>