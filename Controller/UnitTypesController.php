<?php
App::uses('AppController', 'Controller');
/**
 * UnitTypes Controller
 *
 * @property UnitType $UnitType
 */
class UnitTypesController extends AppController {
/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->UnitType->recursive = 0;
        $this->set('unitTypes', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->UnitType->id = $id;
        if (!$this->UnitType->exists()) {
            throw new NotFoundException(__('Invalid unit type'));
        }
        $this->set('unitType', $this->UnitType->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->UnitType->create();
            if ($this->UnitType->save($this->request->data)) {
                $data = Cache::read('unittypes_all', 'interface');
                if($data){
                    Cache::delete('unittypes_all', 'interface');
                }
                $this->flashMessage(__('The unit type has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit type could not be saved. Please, try again.'), 'alert-error');
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
        $this->UnitType->id = $id;
        if (!$this->UnitType->exists()) {
            throw new NotFoundException(__('Invalid unit type'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UnitType->save($this->request->data)) {
                $data = Cache::read('unittypes_all', 'interface');
                if($data){
                    Cache::delete('unittypes_all', 'interface');
                }
                $this->flashMessage(__('The unit type has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit type could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->UnitType->read(null, $id);
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
        $this->UnitType->id = $id;
        if (!$this->UnitType->exists()) {
            throw new NotFoundException(__('Invalid unit type'));
        }
        if ($this->UnitType->delete()) {
            $data = Cache::read('unittypes_all', 'interface');
            if($data){
                Cache::delete('unittypes_all', 'interface');
            }
            $this->flashMessage(__('Unit type deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Unit type was not deleted'), 'alert-error', $this->referer());
    }
}
