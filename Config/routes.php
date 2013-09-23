<?php
	/* General route / extension setup. */
	Router::parseExtensions('json');
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/admin', array('plugin' => 'users', 'controller' => 'users', 'action' => 'dashboard', 'admin' => true));
	Router::connect('/admin/clear_cache', array('controller' => 'pages', 'action' => 'clear_cache', 'admin' => true));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect('/login/:id', array('controller' => 'social', 'action' => 'login'), array('pass' => array('id')));
	Router::connect('/social/connect_login_cb/:id', array('controller' => 'social', 'action' => 'login_cb'), array('pass' => array('id')));
	Router::connect('/logout', array('controller' => 'social', 'action' => 'logout'), array('pass' => array('id')));

	/* Loads CakePHP plugin routes. */
	CakePlugin::routes();

	/* Loads CakePHP core routes. */
	require CAKE . 'Config' . DS . 'routes.php';