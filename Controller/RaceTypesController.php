<?php
App::uses('AppController', 'Controller');
/**
 * RaceTypes Controller
 *
 * @property RaceType $RaceType
 */
class RaceTypesController extends AppController {
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
        $this->RaceType->recursive = 0;
        $this->set('raceTypes', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->RaceType->id = $id;
        if (!$this->RaceType->exists()) {
            throw new NotFoundException(__('Invalid race type'));
        }
        $this->set('raceType', $this->RaceType->read(null, $id));
        $this->set('races', $this->RaceType->Races->find('all', array('conditions'=>array('race_types_id' => $id))));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->RaceType->create();
            if ($this->RaceType->save($this->request->data)) {
                $data = Cache::read('types_all', 'races');
                if($data){
                    Cache::delete('types_all', 'races');
                }
                $this->flashMessage(__('The race type has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race type could not be saved. Please, try again.'), 'alert-error');
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
        $this->RaceType->id = $id;
        if (!$this->RaceType->exists()) {
            throw new NotFoundException(__('Invalid race type'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->RaceType->save($this->request->data)) {
                $data = Cache::read('types_all', 'races');
                if($data){
                    Cache::delete('types_all', 'races');
                }
                $this->flashMessage(__('The race type has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race type could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->RaceType->read(null, $id);
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
        $this->RaceType->id = $id;
        if (!$this->RaceType->exists()) {
            throw new NotFoundException(__('Invalid race type'));
        }
        if ($this->RaceType->delete()) {
            $data = Cache::read('types_all', 'races');
            if($data){
                Cache::delete('types_all', 'races');
            }
            $this->flashMessage(__('Race type deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Race type was not deleted'), 'alert-error', $this->referer());
    }


    /**
     * API endpoints
     */

     /**
     * API racetypes to return a list of army types to choose from
     *
     * @return void
     */

    public function racetypes() {
        $this->request->onlyAllow('get');

        $data = Cache::read('types_all', 'races');
        if(!$data) {
            $data = $this->RaceType->find(
                'all'
            );
            Cache::write('types_all', $data, 'races');
        }

        return $this->Rest->response(200, __('raceTypes'), array('data' => $data));
    }
}
