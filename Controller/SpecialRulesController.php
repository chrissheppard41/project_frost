<?php
App::uses('AppController', 'Controller');
/**
 * SpecialRules Controller
 *
 * @property SpecialRule $SpecialRule
 */
class SpecialRulesController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->SpecialRule->recursive = 0;
        $this->set('specialRules', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->SpecialRule->id = $id;
        if (!$this->SpecialRule->exists()) {
            throw new NotFoundException(__('Invalid special rule'));
        }
        $this->set('specialRule', $this->SpecialRule->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->SpecialRule->create();
            if ($this->SpecialRule->save($this->request->data)) {
                $this->flashMessage(__('The special rule has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The special rule could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$raceTypes = $this->SpecialRule->RaceType->find('list');
		$squads = $this->SpecialRule->Squad->find('list');
		$this->set(compact('raceTypes', 'squads'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->SpecialRule->id = $id;
        if (!$this->SpecialRule->exists()) {
            throw new NotFoundException(__('Invalid special rule'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SpecialRule->save($this->request->data)) {
                $this->flashMessage(__('The special rule has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The special rule could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->SpecialRule->read(null, $id);
        }
		$raceTypes = $this->SpecialRule->Race->find('list');
		$squads = $this->SpecialRule->Squad->find('list');
		$this->set(compact('raceTypes', 'squads'));
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
        $this->SpecialRule->id = $id;
        if (!$this->SpecialRule->exists()) {
            throw new NotFoundException(__('Invalid special rule'));
        }
        if ($this->SpecialRule->delete()) {
            $this->flashMessage(__('Special rule deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Special rule was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->SpecialRule->recursive = 0;
        $this->set('specialRules', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->SpecialRule->id = $id;
        if (!$this->SpecialRule->exists()) {
            throw new NotFoundException(__('Invalid special rule'));
        }
        $this->set('specialRule', $this->SpecialRule->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->SpecialRule->create();
            if ($this->SpecialRule->save($this->request->data)) {
                $this->flashMessage(__('The special rule has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The special rule could not be saved. Please, try again.'), 'alert-error');
            }
        }
        $races = $this->SpecialRule->Races->find('list');
		//$squads = $this->SpecialRule->Squad->find('list');
		$this->set(compact('races', 'squads'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->SpecialRule->id = $id;
        if (!$this->SpecialRule->exists()) {
            throw new NotFoundException(__('Invalid special rule'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SpecialRule->save($this->request->data)) {
                $this->flashMessage(__('The special rule has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The special rule could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->SpecialRule->read(null, $id);
        }
		$races = $this->SpecialRule->Races->find('list');
		//$squads = $this->SpecialRule->Squad->find('list');
		$this->set(compact('races', 'squads'));
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
        $this->SpecialRule->id = $id;
        if (!$this->SpecialRule->exists()) {
            throw new NotFoundException(__('Invalid special rule'));
        }
        if ($this->SpecialRule->delete()) {
            $this->flashMessage(__('Special rule deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Special rule was not deleted'), 'alert-error', $this->referer());
    }
}
