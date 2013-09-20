<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        $this->set('group', $this->Group->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->flashMessage(__('The group has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The group could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Group->Race->find('list');
		$this->set(compact('races'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Group->save($this->request->data)) {
                $this->flashMessage(__('The group has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The group could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Group->read(null, $id);
        }
		$races = $this->Group->Race->find('list');
		$this->set(compact('races'));
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
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->Group->delete()) {
            $this->flashMessage(__('Group deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Group was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        $this->set('group', $this->Group->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->flashMessage(__('The group has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The group could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Group->Races->find('list');
		$this->set(compact('races'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Group->save($this->request->data)) {
                $this->flashMessage(__('The group has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The group could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Group->read(null, $id);
        }
		$races = $this->Group->Races->find('list');
		$this->set(compact('races'));
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
        $this->Group->id = $id;
        if (!$this->Group->exists()) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->Group->delete()) {
            $this->flashMessage(__('Group deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Group was not deleted'), 'alert-error', $this->referer());
    }
}