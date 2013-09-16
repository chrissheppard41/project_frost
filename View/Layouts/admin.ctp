<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta(array('name' => 'robots', 'content' => 'noindex, nofollow'));

		/* Including CSS and favicon. Also outputting blocks of inline meta and CSS. */
		echo $this->Html->css(array('libs/bootstrap.min.css', 'libs/bootstrap.css', 'libs/bootstrap-responsive.min.css', 'libs/icons.css', 'admin/main.css'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->meta('icon');
	?>
</head>
<body>
	<!-- Opening topNavigation. -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<a class="navbar-brand" href="/"><?php echo Configure::read('Company.name');?></a>

		<div class="nav-collapse navbar-responsive-collapse">
			<?php if ($this->Session->check('Auth.User.id')) { ?>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-star"></span>
						Account <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link('Edit', array('plugin' => 'users', 'controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id')), array('class' => 'icon icon-edit')); ?></li>
						<li><?php echo $this->Html->link('Logout', array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'), array('class' => 'icon icon-logout')); ?></li>
					</ul>
				</li>
			</ul>
			<?php } ?>
		</div>
	</div>
</nav>
	<!-- Closing topNavigation. -->

	<!-- Opening mainContainer. -->
	<div id="mainContainer" class="container">
		<?php
			echo $this->Session->flash();
			echo $this->Session->flash('auth');
		?>
		<ul class="nav nav-tabs">
			<li class="<?php echo $this->Html->highlight('/^\/admin$/'); ?>">
				<?php echo $this->Html->link('Home', array('plugin' => 'users', 'controller' => 'users', 'action' => 'dashboard', 'admin' => true), array('class' => 'icon icon-home')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/users/'); ?>">
				<?php echo $this->Html->link('Users', array('plugin' => 'users', 'controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/ArmyLists/'); ?>">
				<?php echo $this->Html->link('Army Lists', array('plugin' => false, 'controller' => 'ArmyLists', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/types/'); ?>">
				<?php echo $this->Html->link('Types', array('plugin' => false, 'controller' => 'types', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/RaceTypes/'); ?>">
				<?php echo $this->Html->link('Race Types', array('plugin' => false, 'controller' => 'RaceTypes', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/races/'); ?>">
				<?php echo $this->Html->link('Races', array('plugin' => false, 'controller' => 'races', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/squads/'); ?>">
				<?php echo $this->Html->link('Squads', array('plugin' => false, 'controller' => 'squads', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
			<li class="<?php echo $this->Html->highlight('/^\/admin\/units/'); ?>">
				<?php echo $this->Html->link('Units', array('plugin' => false, 'controller' => 'units', 'action' => 'index', 'admin' => true), array('class' => 'icon icon-users-alt1')); ?>
			</li>
		</ul>
		<div id="main" role="main">
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
			<p class="pull-right">--- &copy; <?php echo date('Y'); ?></p>
			<p>Licensed for use by <?php echo Configure::read('Company.name'); ?>, developed by <strong>---</strong>.</p>
		</footer>
	</div>
	<!-- Closing mainContainer. -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	<?php
		/* Including scripts. Also outputting any inline script files and any inline buffered code. */
		echo $this->Html->script(array('libs/bootstrap.min.js'));
		echo $this->fetch('script');
		echo $this->Js->writeBuffer(array('onDomReady' => true));
	?>
	<!--[if lt IE 7 ]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})});</script>
	<![endif]-->
</body>
</html>