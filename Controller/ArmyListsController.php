<?php
App::uses('AppController', 'Controller');
/**
 * ArmyLists Controller
 *
 * @property ArmyList $ArmyList
 */
class ArmyListsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->ArmyList->recursive = 0;
        $this->set('armyLists', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->ArmyList->id = $id;
        if (!$this->ArmyList->exists()) {
            throw new NotFoundException(__('Invalid army list'));
        }
        $this->set('armyList', $this->ArmyList->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->ArmyList->create();
            if ($this->ArmyList->save($this->request->data)) {
                $this->flashMessage(__('The army list has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The army list could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->ArmyList->Race->find('list');
		$users = $this->ArmyList->User->find('list');
		$this->set(compact('races', 'users'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->ArmyList->id = $id;
        if (!$this->ArmyList->exists()) {
            throw new NotFoundException(__('Invalid army list'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ArmyList->save($this->request->data)) {
                $this->flashMessage(__('The army list has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The army list could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->ArmyList->read(null, $id);
        }
		$races = $this->ArmyList->Race->find('list');
		$users = $this->ArmyList->User->find('list');
		$this->set(compact('races', 'users'));
    }

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->ArmyList->id = $id;
        if (!$this->ArmyList->exists()) {
            throw new NotFoundException(__('Invalid army list'));
        }
        if ($this->ArmyList->delete()) {
            $this->flashMessage(__('Army list deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Army list was not deleted'), 'alert-error', $this->referer());
    }/**
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
            $this->ArmyList->create();
            if ($this->ArmyList->save($this->request->data)) {
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
        if ($this->ArmyList->delete()) {
            $this->flashMessage(__('Army list deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Army list was not deleted'), 'alert-error', $this->referer());
    }
}
