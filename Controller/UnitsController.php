<?php
App::uses('AppController', 'Controller');
/**
 * Units Controller
 *
 * @property Unit $Unit
 */
class UnitsController extends AppController {
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
        $this->Unit->recursive = 0;
        $this->set('units', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->set('unit', $this->Unit->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Unit->create();
            if ($this->Unit->save($this->request->data)) {
                $data = Cache::read('units_all', 'interface');
                if($data){
                    Cache::delete('units_all', 'interface');
                }
                $this->flashMessage(__('The unit has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit could not be saved. Please, try again.'), 'alert-error');
            }
        }
        $races = $this->Unit->Races->find('list');
        $unitTypes = $this->Unit->UnitTypes->find('list');
        $options = $this->Unit->Option->find('list');
		$this->set(compact('races', 'unitTypes', 'options'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Unit->save($this->request->data)) {
                $data = Cache::read('units_all', 'interface');
                if($data){
                    Cache::delete('units_all', 'interface');
                }
                $this->flashMessage(__('The unit has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The unit could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Unit->read(null, $id);
        }
		$races = $this->Unit->Races->find('list');
        $unitTypes = $this->Unit->UnitTypes->find('list');
        $options = $this->Unit->Option->find('list');
        $this->set(compact('races', 'unitTypes', 'options'));
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->Unit->delete()) {
            $data = Cache::read('units_all', 'interface');
            if($data){
                Cache::delete('units_all', 'interface');
            }
            $this->flashMessage(__('Unit deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Unit was not deleted'), 'alert-error', $this->referer());
    }


    /**
     * API endpoints
     */

     /**
     * API unit_types to return all unit types
     *
     * @return void
     */
    public function unit($id = null) {
        $this->request->onlyAllow('get');

        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }

        $requiredParams = array(
            'access' => null
        );

        // check that all required params have been supplied
        if ($this->_hasRequiredParams($requiredParams, $this->request->query)) {
            throw new BadRequestException(__('Incorrect parameters supplied'));
        }

        if(!$this->Unit->auth_check($this->request->query['access'], $this->Session->read('Token'))) {
            throw new BadRequestException(__('Forbidden: Bad request'));
        }

        if(!$this->Auth->loggedIn()) {
            throw new ForbiddenException(__('Forbidden: Not logged in'));
        }

        $data = Cache::read('_unit_'.$this->Unit->id, 'units');
        if(!$data){
            $data = $this->Unit->find(
                'first',
                array(
                    'conditions' => array(
                        'Unit.id' => $this->Unit->id
                    )
                )
            );
            Cache::write('_unit_'.$this->Unit->id, $data, 'units');
        }

        return $this->Rest->response(200, __('Unit'), array('data' => $data));
    }
}
