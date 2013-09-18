<?php
App::uses('AppController', 'Controller');
/**
 * Weapons Controller
 *
 * @property Weapon $Weapon
 */
class WeaponsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Weapon->recursive = 0;
        $this->set('weapons', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Weapon->id = $id;
        if (!$this->Weapon->exists()) {
            throw new NotFoundException(__('Invalid weapon'));
        }
        $this->set('weapon', $this->Weapon->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Weapon->create();
            if ($this->Weapon->save($this->request->data)) {
                $this->flashMessage(__('The weapon has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The weapon could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Weapon->Races->find('list');
        $units = $this->Weapon->Unit->find('list');
		$this->set(compact('races', 'units'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Weapon->id = $id;
        if (!$this->Weapon->exists()) {
            throw new NotFoundException(__('Invalid weapon'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Weapon->save($this->request->data)) {
                $this->flashMessage(__('The weapon has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The weapon could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Weapon->read(null, $id);
        }
		$races = $this->Weapon->Races->find('list');
        $units = $this->Weapon->Unit->find('list');
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
        $this->Weapon->id = $id;
        if (!$this->Weapon->exists()) {
            throw new NotFoundException(__('Invalid weapon'));
        }
        if ($this->Weapon->delete()) {
            $this->flashMessage(__('Weapon deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Weapon was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Weapon->recursive = 0;
        $this->set('weapons', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Weapon->id = $id;
        if (!$this->Weapon->exists()) {
            throw new NotFoundException(__('Invalid weapon'));
        }
        $this->set('weapon', $this->Weapon->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Weapon->create();
            if ($this->Weapon->save($this->request->data)) {
                $this->flashMessage(__('The weapon has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The weapon could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Weapon->Races->find('list');
        $units = $this->Weapon->Unit->find('list');
		$this->set(compact('races', 'units'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Weapon->id = $id;
        if (!$this->Weapon->exists()) {
            throw new NotFoundException(__('Invalid weapon'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Weapon->save($this->request->data)) {
                $this->flashMessage(__('The weapon has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The weapon could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Weapon->read(null, $id);
        }
		$races = $this->Weapon->Races->find('list');
        $units = $this->Weapon->Unit->find('list');
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
        $this->Weapon->id = $id;
        if (!$this->Weapon->exists()) {
            throw new NotFoundException(__('Invalid weapon'));
        }
        if ($this->Weapon->delete()) {
            $this->flashMessage(__('Weapon deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Weapon was not deleted'), 'alert-error', $this->referer());
    }
}
