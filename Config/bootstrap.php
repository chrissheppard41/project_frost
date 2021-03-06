<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
// Composer autoloader
App::import('Vendor', array('file' => 'autoload'));

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

// set up cache stores
Cache::config(
	'army_lists', array(
	    'engine' => 'File',
	    'duration' => '+1 week',
	    'path' => CACHE . 'army_lists' . DS,
	    'prefix' => '_'
	)
);
Cache::config(
	'races', array(
	    'engine' => 'File',
	    'duration' => '+1 week',
	    'path' => CACHE . 'races' . DS,
	    'prefix' => '_'
	)
);
Cache::config(
	'squads', array(
	    'engine' => 'File',
	    'duration' => '+1 week',
	    'path' => CACHE . 'squads' . DS,
	    'prefix' => '_'
	)
);
Cache::config(
	'units', array(
	    'engine' => 'File',
	    'duration' => '+1 week',
	    'path' => CACHE . 'units' . DS,
	    'prefix' => '_'
	)
);
Cache::config(
	'options', array(
	    'engine' => 'File',
	    'duration' => '+1 week',
	    'path' => CACHE . 'options' . DS,
	    'prefix' => '_'
	)
);

/**
 * You can attach event listeners to the request lifecyle as Dispatcher Filter . By Default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

require __DIR__ . '/SocialMedia.php';
/**
 * Configures default file logging options.
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug'
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error'
));

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

CakePlugin::load('Users', array('routes' => true));
CakePlugin::load('DebugKit');

/**
 *	Setting enviroment specific settings such as DebugKit and email configurations.
 *	REMOTE_ADDR clause checks both IPv4 and IPv6 local values.
 */
if (in_array(env('REMOTE_ADDR'), array('127.0.0.1', '::1')) || strripos(env('HTTP_HOST'), '.dev.rehabstudio.com')) {
	Configure::write('debug', 2);
	Configure::write('emailConfig', 'rehabDev');
} else {
	Configure::write('emailConfig', 'default');
}

Configure::write('Company.name', 'Army tool');
Configure::write('App.defaultEmail', 'example@example.com');