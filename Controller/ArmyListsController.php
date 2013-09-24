<?php
App::uses('AppController', 'Controller');
/**
 * ArmyLists Controller
 *
 * @property ArmyList $ArmyList
 */
class ArmyListsController extends AppController {
/**
 * Components
 * @var array
 */
    public $components = array('Rest');

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->ArmyList->recursive = 0;
        $this->set('armyLists', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->ArmyList->id = $id;
        if (!$this->ArmyList->exists()) {
            throw new NotFoundException(__('Invalid army list'));
        }
        $this->set('armyList', $this->ArmyList->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->ArmyList->create();
            if ($this->ArmyList->save($this->request->data)) {
                $data = Cache::read('army_lists_all', 'interface');
                if($data){
                    Cache::delete('army_lists_all', 'interface');
                }
                $this->flashMessage(__('The army list has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The army list could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$races = $this->ArmyList->Races->find('list');
		$users = $this->ArmyList->Users->find('list');
		$this->set(compact('races', 'users'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->ArmyList->id = $id;
        if (!$this->ArmyList->exists()) {
            throw new NotFoundException(__('Invalid army list'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ArmyList->save($this->request->data)) {
                $data = Cache::read('army_lists_'.$this->ArmyList->id, 'interface');
                if($data){
                    Cache::delete('army_lists_'.$this->ArmyList->id, 'interface');
                }
                $data = Cache::read('army_lists_all', 'interface');
                if($data){
                    Cache::delete('army_lists_all', 'interface');
                }
                $this->flashMessage(__('The army list has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The army list could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->ArmyList->read(null, $id);
        }
		$races = $this->ArmyList->Races->find('list');
		$users = $this->ArmyList->Users->find('list');
		$this->set(compact('races', 'users'));
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
        $this->ArmyList->id = $id;
        if (!$this->ArmyList->exists()) {
            throw new NotFoundException(__('Invalid army list'));
        }
        if ($this->ArmyList->delete()) {
            $data = Cache::read('army_lists_'.$this->ArmyList->id, 'interface');
            if($data){
                Cache::delete('army_lists_'.$this->ArmyList->id, 'interface');
            }
            $data = Cache::read('army_lists_all', 'interface');
            if($data){
                Cache::delete('army_lists_all', 'interface');
            }
            $this->flashMessage(__('Army list deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Army list was not deleted'), 'alert-error', $this->referer());
    }



    /**
     * API endpoints
     */

     /**
     * API my_armies to return a user based on a code and a user ID
     *
     * @return void
     */

    public function my_armies() {
        $this->request->onlyAllow('get');

        $data = Cache::read('army_lists_'.$this->request->query['u_id'], 'interface');
        if(!$data){
            $data = $this->ArmyList->find(
                'all',
                array(
                    'conditions' => array(
                        'users_id' => $this->request->query['u_id']
                    )
                )
            );
            Cache::write('army_lists_'.$this->request->query['u_id'], $data, 'interface');
        }

        return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
    }
     /**
     * API all_armies to return a list of public army lists
     *
     * @return void
     */

    public function all_armies() {
        $this->request->onlyAllow('get');

        $data = Cache::read('army_lists_all', 'interface');
        if(!$data){
            $data = $this->ArmyList->find(
                'all',
                array(
                    'conditions' => array(
                        'hide' => false
                    )
                )
            );
            Cache::write('army_lists_all', $data, 'interface');
        }

        return $this->Rest->response(200, __('Army Lists'), array('data' => $data));
    }
}
