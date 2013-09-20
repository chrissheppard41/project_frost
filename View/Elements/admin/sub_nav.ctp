<ul class="nav nav-tabs">
	<li class="<?php echo $this->Html->highlight('/^\/admin\/ArmyLists/'); ?>">
		<?php echo $this->Html->link('Army Lists', array('plugin' => false, 'controller' => 'ArmyLists', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
	</li>
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			Static views <span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
			<li class="<?php echo $this->Html->highlight('/^\/admin\/types/'); ?>">
				<?php echo $this->Html->link('Types', array('plugin' => false, 'controller' => 'types', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/unitTypes/'); ?>">
				<?php echo $this->Html->link('Unit Types', array('plugin' => false, 'controller' => 'unitTypes', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/enhancements/'); ?>">
				<?php echo $this->Html->link('Enhancements', array('plugin' => false, 'controller' => 'enhancements', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
		</ul>
	</li>

	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			Race Control <span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
			<li class="<?php echo $this->Html->highlight('/^\/admin\/races/'); ?>">
				<?php echo $this->Html->link('Races', array('plugin' => false, 'controller' => 'races', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/RaceTypes/'); ?>">
				<?php echo $this->Html->link('Race Types', array('plugin' => false, 'controller' => 'RaceTypes', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
		</ul>
	</li>

	<li class="<?php echo $this->Html->highlight('/^\/admin\/specialRules/'); ?>">
		<?php echo $this->Html->link('Special Rules', array('plugin' => false, 'controller' => 'specialRules', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
	</li>

	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			Additions <span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
			<li class="<?php echo $this->Html->highlight('/^\/admin\/groups/'); ?>">
				<?php echo $this->Html->link('Groups', array('plugin' => false, 'controller' => 'groups', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/options/'); ?>">
				<?php echo $this->Html->link('Options', array('plugin' => false, 'controller' => 'options', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/optionUpgrades/'); ?>">
				<?php echo $this->Html->link('Option Upgrades', array('plugin' => false, 'controller' => 'optionUpgrades', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
		</ul>
	</li>

	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			Squad management <span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
			<li class="<?php echo $this->Html->highlight('/^\/admin\/squads/'); ?>">
				<?php echo $this->Html->link('Squads', array('plugin' => false, 'controller' => 'squads', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/units/'); ?>">
				<?php echo $this->Html->link('Units', array('plugin' => false, 'controller' => 'units', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
		</ul>
	</li>

</ul>