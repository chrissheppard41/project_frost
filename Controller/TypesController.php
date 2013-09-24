<?php
App::uses('AppController', 'Controller');
/**
 * Types Controller
 *
 * @property Type $Type
 */
class TypesController extends AppController {
/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Type->recursive = 0;
        $this->set('types', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__('Invalid type'));
        }
        $this->set('type', $this->Type->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Type->create();
            if ($this->Type->save($this->request->data)) {
                $data = Cache::read('types_all', 'interface');
                if($data){
                    Cache::delete('types_all', 'interface');
                }
                $this->flashMessage(__('The type has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The type could not be saved. Please, try again.'), 'alert-error');
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
        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__('Invalid type'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Type->save($this->request->data)) {
                $data = Cache::read('types_all', 'interface');
                if($data){
                    Cache::delete('types_all', 'interface');
                }
                $this->flashMessage(__('The type has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The type could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Type->read(null, $id);
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
        $this->Type->id = $id;
        if (!$this->Type->exists()) {
            throw new NotFoundException(__('Invalid type'));
        }
        if ($this->Type->delete()) {
            $data = Cache::read('types_all', 'interface');
            if($data){
                Cache::delete('types_all', 'interface');
            }
            $this->flashMessage(__('Type deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Type was not deleted'), 'alert-error', $this->referer());
    }
}
