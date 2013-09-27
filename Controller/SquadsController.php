<?php
App::uses('AppController', 'Controller');
/**
 * Squads Controller
 *
 * @property Squad $Squad
 */
class SquadsController extends AppController {
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
                $data = Cache::read('squads_all', 'interface');
                if($data){
                    Cache::delete('squads_all', 'interface');
                }
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
                $data = Cache::read('squads_all', 'interface');
                if($data){
                    Cache::delete('squads_all', 'interface');
                }
                $data = Cache::read('squads_'.$id, 'interface');
                if($data){
                    Cache::delete('squads_'.$id, 'interface');
                }
                $data = Cache::read('squads_raceid_'.$this->request->data['Squad']['races_id'], 'interface');
                if($data){
                    Cache::delete('squads_raceid_'.$this->request->data['Squad']['races_id'], 'interface');
                }
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
            $data = Cache::read('squads_all', 'interface');
            if($data){
                Cache::delete('squads_all', 'interface');
            }
            $this->flashMessage(__('Squad deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Squad was not deleted'), 'alert-error', $this->referer());
    }


    /**
     * API endpoints
     */

     /**
     * API squads to return a list of squads related to race
     *
     * @return void
     */

    public function squads() {
        $this->request->onlyAllow('get');
        unset($this->request->query['url']);

        $requiredParams = array(
            'races_id'
        );

        // check that all required params have been supplied
        if (!$this->_hasRequiredParams($this->request->query, $requiredParams)) {
            throw new BadRequestException(__('Incorrect parameters supplied'));
        }

        $data = Cache::read('squads_raceid_'.$this->request->query['races_id'], 'interface');
        if(!$data) {
            $data = $this->Squad->find(
                'all',
                array(
                    'conditions' => array(
                        'Races.id' => $this->request->query['races_id']
                    )
                )
            );
            Cache::write('squads_raceid_'.$this->request->query['races_id'], $data, 'interface');
        }

        return $this->Rest->response(200, __('squads'), array('data' => $data));
    }
}
