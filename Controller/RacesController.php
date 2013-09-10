<?php
App::uses('AppController', 'Controller');
/**
 * Races Controller
 *
 * @property Race $Race
 */
class RacesController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Race->recursive = 0;
        $this->set('races', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        $this->set('race', $this->Race->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Race->create();
            if ($this->Race->save($this->request->data)) {
                $this->flashMessage(__('The race has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$raceTypes = $this->Race->RaceType->find('list');
		$this->set(compact('raceTypes'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Race->save($this->request->data)) {
                $this->flashMessage(__('The race has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Race->read(null, $id);
        }
		$raceTypes = $this->Race->RaceType->find('list');
		$this->set(compact('raceTypes'));
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
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        if ($this->Race->delete()) {
            $this->flashMessage(__('Race deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Race was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Race->recursive = 0;
        $this->set('races', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        $this->set('race', $this->Race->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Race->create();
            if ($this->Race->save($this->request->data)) {
                $this->flashMessage(__('The race has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$raceTypes = $this->Race->RaceTypes->find('list');
		$this->set(compact('raceTypes'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Race->save($this->request->data)) {
                $this->flashMessage(__('The race has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Race->read(null, $id);
        }
		$raceTypes = $this->Race->RaceTypes->find('list');
		$this->set(compact('raceTypes'));
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
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        if ($this->Race->delete()) {
            $this->flashMessage(__('Race deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Race was not deleted'), 'alert-error', $this->referer());
    }
}
