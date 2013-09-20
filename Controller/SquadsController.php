<?php
App::uses('AppController', 'Controller');
/**
 * Squads Controller
 *
 * @property Squad $Squad
 */
class SquadsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Squad->recursive = 0;
        $this->set('squads', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Squad->id = $id;
        if (!$this->Squad->exists()) {
            throw new NotFoundException(__('Invalid squad'));
        }
        $this->set('squad', $this->Squad->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Squad->create();
            if ($this->Squad->save($this->request->data)) {
                $this->flashMessage(__('The squad has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The squad could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Squad->Races->find('list');
		$types = $this->Squad->Type->find('list');
		$this->set(compact('races', 'types'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Squad->id = $id;
        if (!$this->Squad->exists()) {
            throw new NotFoundException(__('Invalid squad'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Squad->save($this->request->data)) {
                $this->flashMessage(__('The squad has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The squad could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Squad->read(null, $id);
        }
		$races = $this->Squad->Races->find('list');
		$types = $this->Squad->Type->find('list');
		$this->set(compact('races', 'types'));
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
        $this->Squad->id = $id;
        if (!$this->Squad->exists()) {
            throw new NotFoundException(__('Invalid squad'));
        }
        if ($this->Squad->delete()) {
            $this->flashMessage(__('Squad deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Squad was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Squad->recursive = 0;
        $this->set('squads', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Squad->recursive = 1;
        $this->Squad->id = $id;
        if (!$this->Squad->exists()) {
            throw new NotFoundException(__('Invalid squad'));
        }
        $this->set('squad', $this->Squad->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Squad->create();
            if ($this->Squad->save($this->request->data)) {
                $this->flashMessage(__('The squad has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The squad could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->Squad->Races->find('list');
        $types = $this->Squad->Types->find('list');
        $units = $this->Squad->Unit->find('list');
        $specialRules = $this->Squad->SpecialRule->find('list');
        $this->set(compact('races', 'types', 'units', 'groups', 'specialRules'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Squad->id = $id;
        if (!$this->Squad->exists()) {
            throw new NotFoundException(__('Invalid squad'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Squad->save($this->request->data)) {
                $this->flashMessage(__('The squad has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The squad could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Squad->read(null, $id);
        }
		$races = $this->Squad->Races->find('list');
		$types = $this->Squad->Types->find('list');
        $units = $this->Squad->Unit->find('list');
        $specialRules = $this->Squad->SpecialRule->find('list');
		$this->set(compact('races', 'types', 'units', 'groups', 'specialRules'));
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
        $this->Squad->id = $id;
        if (!$this->Squad->exists()) {
            throw new NotFoundException(__('Invalid squad'));
        }
        if ($this->Squad->delete()) {
            $this->flashMessage(__('Squad deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Squad was not deleted'), 'alert-error', $this->referer());
    }
}
