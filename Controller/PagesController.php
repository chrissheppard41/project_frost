<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array();

	/**
	 *	Displays a view
	 *
	 *	@param mixed What page to display
	 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

	/**
	 * Default home landing page.
	 *
	 * @return void
	 */
	public function home() {
		// Execute the data aggregator.
		$data = array();

		// Meta data for the homepage.
		$metaData = array(
			"title" => "",
			"metaTags" => array(
				"description" => "",
				"keywords" => "",
				"og:url" => "",//Configure::read('siteRoot') . Configure::read('appDirectory') . $this->params->here,
				"og:title" => "",
				"og:type" => "",
				"og:description" => "",
				"og:image" => ""//$socialImagePath
			)
		);

		$title_for_layout = $metaData['title'];
		$this->set(compact('title_for_layout', 'data', 'metaData'));
	}

	/**
	 * Default partials retrival method.
	 *
	 * @return void
	 */
	public function partials($element = null) {
		$this->layout = 'ajax';
		if(!$element) {
			throw new NotFoundException(__('Invalid element'));
		}

		$this->set(compact('element'));
	}

	/**
	 *	Clears each of the specified folders found inside tmp/cache.
	 *	Will redirect the user to the dashboard with appropriate method.
	 *
	 *	Note: Use caution when running this method on shared servers and
	 *	using the Memcached of APC methods. Cache::clear() will examine all
	 *	variables stored using these engines, compare the Cache::config('default')
	 *	prefix and delete any variables it finds that have this prefix, so be sure
	 *	that all of your Cache::configs are prefixed properly.
	 */
	public function admin_clear_cache() {
		$this->autoRender = false;
		$cachePaths = array('models', 'persistent', 'views');
		$redirectUrl = array('plugin' => 'users', 'controller' => 'users', 'action' => 'dashboard', 'admin' => true);
		$success = true;

		foreach($cachePaths as $config) {
			clearCache(null, $config);
		}

		Cache::clear();

		$this->flashMessage(__('Cache cleared successfully.', true), 'alert-success', $redirectUrl);
	}

}