<?php
App::uses('AppController', 'Controller');
/**
 * ArmyLists Controller
 *
 * @property ArmyList $ArmyList
 */
class ArmyListsController extends AppController {

/**
 * Components
 * @var array
 */
	public $components = array('Rest');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ArmyList->recursive = 0;
		$this->set('armyLists', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		$this->set('armyList', $this->ArmyList->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {

			$this->request->data['ArmyList']['code'] = $this->ArmyList->_generateCode($this->request->data['users_id']);

			$this->ArmyList->create();
			if ($this->ArmyList->save($this->request->data)) {

				//cache killer
				$this->_cacheController($this->request->data['ArmyList']);

				$this->flashMessage(__('The army list has been saved'), 'alert-success', array('action' => 'index'));
			} else {
				$this->flashMessage(__('The army list could not be saved. Please, try again.'), 'alert-error');
			}
		}
		$races = $this->ArmyList->Races->find('list');
		$users = $this->ArmyList->Users->find('list');
		$this->set(compact('races', 'users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArmyList->save($this->request->data)) {

				//cache killer
				$this->_cacheController($this->request->data['ArmyList']);

				$this->flashMessage(__('The army list has been saved'), 'alert-success', array('action' => 'index'));
			} else {
				$this->flashMessage(__('The army list could not be saved. Please, try again.'), 'alert-error');
			}
		} else {
			$this->request->data = $this->ArmyList->read(null, $id);
		}
		$races = $this->ArmyList->Races->find('list');
		$users = $this->ArmyList->Users->find('list');
		$this->set(compact('races', 'users'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		$data = $this->ArmyList->read(null, $id);
		if ($this->ArmyList->delete()) {
			//cache killer
			$this->_cacheController($data['ArmyList']);

			$this->flashMessage(__('Army list deleted'), 'alert-success', $this->referer());
		}
		$this->flashMessage(__('Army list was not deleted'), 'alert-error', $this->referer());
	}



	/**
	 * API endpoints
	 */

	 /**
	 * API my_armies to return a user based on a code and a user ID
	 *
	 * @return void
	 */

	public function my_armies() {
		$this->request->onlyAllow('get');

		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$data = Cache::read('_user_'.$this->Auth->user('id'), 'army_lists');
		if(!$data){
			$data = $this->ArmyList->find(
				'all',
				array(
					'conditions' => array(
						'users_id' => $this->Auth->user('id')
					)
				)
			);
			Cache::write('_user_'.$this->Auth->user('id'), $data, 'army_lists');
		}

		return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
	}

	 /**
	 * API all_armies to return all armies
	 *
	 * @return void
	 */
	public function all_armies($id = null) {
		$this->request->onlyAllow('get');

		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$data = null;

		if($id != "f105ba99dd7a53287d7fd30fd9ebc691765dbc39557bd9d22") {
			throw new ForbiddenException(__('Unauthorized access'));
		}

		$data = Cache::read('all', 'army_lists');
		if(!$data){
			$data = $this->ArmyList->find(
				'all'
			);
			Cache::write('all', $data, 'army_lists');
		}


		return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
	}

	 /**
	 * API public_armies to return a list of public army lists
	 *
	 * @return void
	 */
	public function public_armies() {
		$this->request->onlyAllow('get');

		$data = Cache::read('notHidden', 'army_lists');
		if(!$data){
			$data = $this->ArmyList->find(
				'all',
				array(
					'conditions' => array(
						'hide' => false
					)
				)
			);
			Cache::write('notHidden', $data, 'army_lists');
		}

		return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
	}

	/**
	 * API save_army to saves a submitted army
	 *
	 * @return void
	 */

	public function save_army() {
		$this->request->onlyAllow('post');

		$requiredParams = array(
			'races_id' => null,
			'name' => null,
			'descr' => null,
			'point_limit' => null
		);

		// check that all required params have been supplied
		if ($this->_hasRequiredParams($requiredParams, $this->request->data)) {
			throw new BadRequestException(__('Incorrect parameters supplied'));
		}
		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$this->request->data['code'] = $this->ArmyList->_generateCode($this->Auth->user('id'));
		$this->request->data['users_id'] = $this->Auth->user('id');

		$data = array('ArmyList' => $this->request->data);
		$this->ArmyList->create();
		if ($this->ArmyList->save($this->request->data)) {

			//cache killer
			$this->_cacheController($this->request->data);

			return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
		} else {
			return $this->Rest->response(400, __('Army Lists'), array('error' => $this->ArmyList->validationErrors));
		}
	}

	/**
	 * API edit_armies to return a army related to the input
	 * @param $id (int), $hash (int)
	 * @return void
	 */
	public function edit_armies($id = null) {
		$this->request->onlyAllow('get');

		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$data = Cache::read('_army_'.$id, 'army_lists');
		if(!$data){
			$data = $this->ArmyList->find(
				'first',
				array(
					'conditions' => array(
						'ArmyList.id' => $id,
						'ArmyList.users_id' => $this->Auth->user('id')
					)
				)
			);
			Cache::write('_army_'.$id, $data, 'army_lists');
		}

		return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
	}

	/**
	 * API save_army to saves a submitted army
	 *
	 * @return void
	 */

	public function edit_save_army($id = null) {
		$this->request->onlyAllow('post');

		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$requiredParams = array(
			'name' => null,
			'descr' => null,
			'point_limit' => null
		);

		// check that all required params have been supplied
		if ($this->_hasRequiredParams($requiredParams, $this->request->data)) {
			throw new BadRequestException(__('Incorrect parameters supplied'));
		}

		$query = $this->ArmyList->read(null, $id);

		if((int)$query['ArmyList']['users_id'] !== $this->Auth->user('id')) {
			throw new ForbiddenException(__('Forbidden: Army does not belong to you'));
		}

		$this->request->data['users_id'] = $this->Auth->user('id');
		$data = array('ArmyList' => $this->request->data);
		if ($this->ArmyList->save($data)) {
			$this->request->data['id'] = $id;
			//cache killer
			$this->_cacheController($this->request->data);

			return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
		} else {
			return $this->Rest->response(400, __('Army Lists'), array('errors' => $this->ArmyList->validationErrors));
		}
	}
	/**
	 * API delete_army to delete an existing army
	 *
	 * @return void
	 */

	public function delete_army($id = null) {
		$this->request->onlyAllow('delete');

		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$query = $this->ArmyList->read(null, $id);

		if((int)$query['ArmyList']['users_id'] !== (int)$this->Auth->user('id')) {
			throw new ForbiddenException(__('Forbidden: Army does not belong to you'));
		}

		if ($this->ArmyList->delete()) {
			//cache killer
			$this->_cacheController($query['ArmyList']);

			return $this->Rest->response(200, __('Army Lists'), array('data' => null));
		}

		return $this->Rest->response(400, __('Army Lists'), array('errors' => array('Unable to delete army '.$id)));
	}

	/**
	 * API view_army to view an existing army
	 *
	 * @return void
	 */

	public function view_army($id = null) {
		$this->request->onlyAllow('get');

		$this->ArmyList->id = $id;
		if (!$this->ArmyList->exists()) {
			throw new NotFoundException(__('Invalid army list'));
		}
		if(!$this->Auth->loggedIn()) {
			throw new ForbiddenException(__('Forbidden: Not logged in'));
		}

		$data = Cache::read('_army_'.$id, 'army_lists');
		if(!$data){
			$data = $this->ArmyList->find(
				'first',
				array(
					'conditions' => array(
						'ArmyList.id' => $id,
						'users_id' => $this->Auth->user('id')
					)
				)
			);
			Cache::write('_army_'.$id, $data, 'army_lists');
		}


		return $this->Rest->response(200, __('Army Lists'), array('data' => $data));

	}
}
