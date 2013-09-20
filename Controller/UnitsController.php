<?php
App::uses('AppController', 'Controller');
/**
 * Units Controller
 *
 * @property Unit $Unit
 */
class UnitsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Unit->recursive = 0;
        $this->set('units', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->set('unit', $this->Unit->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $this->flashMessage(__('The unit has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Unit->Race->find('list');
		$this->set(compact('races'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Unit->save($this->request->data)) {
                $this->flashMessage(__('The unit has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Unit->read(null, $id);
        }
		$races = $this->Unit->Race->find('list');
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->Unit->delete()) {
            $this->flashMessage(__('Unit deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Unit was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Unit->recursive = 0;
        $this->set('units', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->set('unit', $this->Unit->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $this->flashMessage(__('The unit has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit could not be saved. Please, try again.'), 'alert-error');
            }
        }
        $races = $this->Unit->Races->find('list');
        $unitTypes = $this->Unit->UnitTypes->find('list');
        $options = $this->Unit->Option->find('list');
		$this->set(compact('races', 'unitTypes', 'options'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Unit->save($this->request->data)) {
                $this->flashMessage(__('The unit has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Unit->read(null, $id);
        }
		$races = $this->Unit->Races->find('list');
        $unitTypes = $this->Unit->UnitTypes->find('list');
        $options = $this->Unit->Option->find('list');
        $this->set(compact('races', 'unitTypes', 'options'));
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->Unit->delete()) {
            $this->flashMessage(__('Unit deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Unit was not deleted'), 'alert-error', $this->referer());
    }
}
