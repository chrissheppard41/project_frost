<?php
App::uses('AppController', 'Controller');
/**
 * Options Controller
 *
 * @property Option $Option
 */
class OptionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Option->recursive = 0;
        $this->set('options', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid option'));
        }
        $this->set('option', $this->Option->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Option->create();
            if ($this->Option->save($this->request->data)) {
                $this->flashMessage(__('The option has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$groups = $this->Option->Group->find('list');
		$this->set(compact('groups'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid option'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Option->save($this->request->data)) {
                $this->flashMessage(__('The option has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Option->read(null, $id);
        }
		$groups = $this->Option->Groups->find('list');
		$this->set(compact('groups'));
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
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid option'));
        }
        if ($this->Option->delete()) {
            $this->flashMessage(__('Option deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Option was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Option->recursive = 0;
        $this->set('options', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid option'));
        }
        $this->set('option', $this->Option->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Option->create();
            if ($this->Option->save($this->request->data)) {
                $this->flashMessage(__('The option has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$groups = $this->Option->Groups->find('list');
		$this->set(compact('groups'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid option'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Option->save($this->request->data)) {
                $this->flashMessage(__('The option has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Option->read(null, $id);
        }
		$groups = $this->Option->Groups->find('list');
		$this->set(compact('groups'));
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
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid option'));
        }
        if ($this->Option->delete()) {
            $this->flashMessage(__('Option deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Option was not deleted'), 'alert-error', $this->referer());
    }
}
