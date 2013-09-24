<?php
App::uses('AppController', 'Controller');
/**
 * Enhancements Controller
 *
 * @property Enhancement $Enhancement
 */
class EnhancementsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Enhancement->recursive = 0;
        $this->set('enhancements', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Enhancement->id = $id;
        if (!$this->Enhancement->exists()) {
            throw new NotFoundException(__('Invalid enhancement'));
        }
        $this->set('enhancement', $this->Enhancement->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Enhancement->create();
            if ($this->Enhancement->save($this->request->data)) {
                $data = Cache::read('enhancements_all', 'interface');
                if($data){
                    Cache::delete('enhancements_all', 'interface');
                }
                $this->flashMessage(__('The enhancement has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The enhancement could not be saved. Please, try again.'), 'alert-error');
            }
        }
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Enhancement->id = $id;
        if (!$this->Enhancement->exists()) {
            throw new NotFoundException(__('Invalid enhancement'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Enhancement->save($this->request->data)) {
                $data = Cache::read('enhancements_all', 'interface');
                if($data){
                    Cache::delete('enhancements_all', 'interface');
                }
                $this->flashMessage(__('The enhancement has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The enhancement could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Enhancement->read(null, $id);
        }
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
        $this->Enhancement->id = $id;
        if (!$this->Enhancement->exists()) {
            throw new NotFoundException(__('Invalid enhancement'));
        }
        if ($this->Enhancement->delete()) {
            $data = Cache::read('enhancements_all', 'interface');
            if($data){
                Cache::delete('enhancements_all', 'interface');
            }
            $this->flashMessage(__('Enhancement deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Enhancement was not deleted'), 'alert-error', $this->referer());
    }
}
