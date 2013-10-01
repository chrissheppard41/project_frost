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


	//API endpoints
	Router::connect('/races', array('controller' => 'races', 'action' => 'races'));
	Router::connect('/armytypes', array('controller' => 'raceTypes', 'action' => 'racetypes'));
	Router::connect('/armies', array('controller' => 'armyLists', 'action' => 'my_armies'));
	Router::connect('/allarmies', array('controller' => 'armyLists', 'action' => 'all_armies'));
	Router::connect('/squads', array('controller' => 'squads', 'action' => 'squads'));
	Router::connect('/save', array('controller' => 'armyLists', 'action' => 'save_army'));


	//Partials views routing
	Router::connect('/add', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/partials/:element', array('controller' => 'pages', 'action' => 'partials'), array('pass' => array('element')));

	/* Loads CakePHP plugin routes. */
	CakePlugin::routes();

	/* Loads CakePHP core routes. */
	require CAKE . 'Config' . DS . 'routes.php';