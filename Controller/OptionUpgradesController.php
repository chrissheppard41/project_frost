<?php
App::uses('AppController', 'Controller');
/**
 * OptionUpgrades Controller
 *
 * @property OptionUpgrade $OptionUpgrade
 */
class OptionUpgradesController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->OptionUpgrade->recursive = 0;
        $this->set('optionUpgrades', $this->paginate());
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->OptionUpgrade->id = $id;
        if (!$this->OptionUpgrade->exists()) {
            throw new NotFoundException(__('Invalid option upgrade'));
        }
        $this->set('optionUpgrade', $this->OptionUpgrade->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->OptionUpgrade->create();
            if ($this->OptionUpgrade->save($this->request->data)) {
                $this->flashMessage(__('The option upgrade has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option upgrade could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$options = $this->OptionUpgrade->Option->find('list');
		$this->set(compact('options'));
    }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->OptionUpgrade->id = $id;
        if (!$this->OptionUpgrade->exists()) {
            throw new NotFoundException(__('Invalid option upgrade'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->OptionUpgrade->save($this->request->data)) {
                $this->flashMessage(__('The option upgrade has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option upgrade could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->OptionUpgrade->read(null, $id);
        }
		$options = $this->OptionUpgrade->Option->find('list');
		$this->set(compact('options'));
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
        $this->OptionUpgrade->id = $id;
        if (!$this->OptionUpgrade->exists()) {
            throw new NotFoundException(__('Invalid option upgrade'));
        }
        if ($this->OptionUpgrade->delete()) {
            $this->flashMessage(__('Option upgrade deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Option upgrade was not deleted'), 'alert-error', $this->referer());
    }/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->OptionUpgrade->recursive = 0;
        $this->set('optionUpgrades', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->OptionUpgrade->id = $id;
        if (!$this->OptionUpgrade->exists()) {
            throw new NotFoundException(__('Invalid option upgrade'));
        }
        $this->set('optionUpgrade', $this->OptionUpgrade->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->OptionUpgrade->create();
            if ($this->OptionUpgrade->save($this->request->data)) {
                $this->flashMessage(__('The option upgrade has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option upgrade could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$options = $this->OptionUpgrade->Option->find('list');
		$this->set(compact('options'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->OptionUpgrade->id = $id;
        if (!$this->OptionUpgrade->exists()) {
            throw new NotFoundException(__('Invalid option upgrade'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->OptionUpgrade->save($this->request->data)) {
                $this->flashMessage(__('The option upgrade has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option upgrade could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->OptionUpgrade->read(null, $id);
        }
		$options = $this->OptionUpgrade->Option->find('list');
		$this->set(compact('options'));
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
        $this->OptionUpgrade->id = $id;
        if (!$this->OptionUpgrade->exists()) {
            throw new NotFoundException(__('Invalid option upgrade'));
        }
        if ($this->OptionUpgrade->delete()) {
            $this->flashMessage(__('Option upgrade deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Option upgrade was not deleted'), 'alert-error', $this->referer());
    }
}
