<?php
App::uses('AppController', 'Controller');
/**
 * OptionUpgrades Controller
 *
 * @property OptionUpgrade $OptionUpgrade
 */
class OptionUpgradesController extends AppController {
/**
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
                $data = Cache::read('opt_up_all', 'interface');
                if($data){
                    Cache::delete('opt_up_all', 'interface');
                }
                $this->flashMessage(__('The option upgrade has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option upgrade could not be saved. Please, try again.'), 'alert-error');
            }
        }
        $options = $this->OptionUpgrade->Options->find('list');
        $enhancements = $this->OptionUpgrade->Enhancements->find('list');
		$this->set(compact('options', 'enhancements'));
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
                $data = Cache::read('opt_up_all', 'interface');
                if($data){
                    Cache::delete('opt_up_all', 'interface');
                }
                $this->flashMessage(__('The option upgrade has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The option upgrade could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->OptionUpgrade->read(null, $id);
        }
		$options = $this->OptionUpgrade->Options->find('list');
        $enhancements = $this->OptionUpgrade->Enhancements->find('list');
        $this->set(compact('options', 'enhancements'));
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
            $data = Cache::read('opt_up_all', 'interface');
            if($data){
                Cache::delete('opt_up_all', 'interface');
            }
            $this->flashMessage(__('Option upgrade deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Option upgrade was not deleted'), 'alert-error', $this->referer());
    }
}
