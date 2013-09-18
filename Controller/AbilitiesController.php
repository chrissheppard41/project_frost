<?php
App::uses('AppController', 'Controller');
/**
 * Abilities Controller
 *
 * @property Ability $Ability
 */
class AbilitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Ability->recursive = 0;
        $this->set('abilities', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Ability->id = $id;
        if (!$this->Ability->exists()) {
            throw new NotFoundException(__('Invalid ability'));
        }
        $this->set('ability', $this->Ability->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Ability->create();
            if ($this->Ability->save($this->request->data)) {
                $this->flashMessage(__('The ability has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The ability could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Ability->Races->find('list');
		$units = $this->Ability->Unit->find('list');
		$this->set(compact('races', 'units'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Ability->id = $id;
        if (!$this->Ability->exists()) {
            throw new NotFoundException(__('Invalid ability'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Ability->save($this->request->data)) {
                $this->flashMessage(__('The ability has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The ability could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Ability->read(null, $id);
        }
		$races = $this->Ability->Races->find('list');
		$units = $this->Ability->Unit->find('list');
		$this->set(compact('races', 'units'));
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
        $this->Ability->id = $id;
        if (!$this->Ability->exists()) {
            throw new NotFoundException(__('Invalid ability'));
        }
        if ($this->Ability->delete()) {
            $this->flashMessage(__('Ability deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Ability was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Ability->recursive = 0;
        $this->set('abilities', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Ability->id = $id;
        if (!$this->Ability->exists()) {
            throw new NotFoundException(__('Invalid ability'));
        }
        $this->set('ability', $this->Ability->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Ability->create();
            if ($this->Ability->save($this->request->data)) {
                $this->flashMessage(__('The ability has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The ability could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Ability->Races->find('list');
		$units = $this->Ability->Unit->find('list');
		$this->set(compact('races', 'units'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Ability->id = $id;
        if (!$this->Ability->exists()) {
            throw new NotFoundException(__('Invalid ability'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Ability->save($this->request->data)) {
                $this->flashMessage(__('The ability has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The ability could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Ability->read(null, $id);
        }
		$races = $this->Ability->Races->find('list');
		$units = $this->Ability->Unit->find('list');
		$this->set(compact('races', 'units'));
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
        $this->Ability->id = $id;
        if (!$this->Ability->exists()) {
            throw new NotFoundException(__('Invalid ability'));
        }
        if ($this->Ability->delete()) {
            $this->flashMessage(__('Ability deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Ability was not deleted'), 'alert-error', $this->referer());
    }
}
