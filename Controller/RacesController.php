<?php
App::uses('AppController', 'Controller');
/**
 * Races Controller
 *
 * @property Race $Race
 */
class RacesController extends AppController {
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
        $this->Race->recursive = 0;
        $this->set('races', $this->paginate());
    }

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        $this->set('race', $this->Race->read(null, $id));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Race->create();
            if ($this->Race->save($this->request->data)) {
                $data = Cache::read('races_all', 'interface');
                if($data){
                    Cache::delete('races_all', 'interface');
                }

                $this->flashMessage(__('The race has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race could not be saved. Please, try again.'), 'alert-error');
            }
        }
		$raceTypes = $this->Race->RaceTypes->find('list');
		$this->set(compact('raceTypes'));
    }

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Race->save($this->request->data)) {
                $data = Cache::read('races_all', 'interface');
                if($data){
                    Cache::delete('races_all', 'interface');
                }

                $this->flashMessage(__('The race has been saved'), 'alert-success', array('action' => 'index'));
            } else {
                $this->flashMessage(__('The race could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->Race->read(null, $id);
        }
		$raceTypes = $this->Race->RaceTypes->find('list');
		$this->set(compact('raceTypes'));
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
        $this->Race->id = $id;
        if (!$this->Race->exists()) {
            throw new NotFoundException(__('Invalid race'));
        }
        if ($this->Race->delete()) {
            $data = Cache::read('races_all', 'interface');
            if($data){
                Cache::delete('races_all', 'interface');
            }
            $this->flashMessage(__('Race deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Race was not deleted'), 'alert-error', $this->referer());
    }



    /**
     * API endpoints
     */

     /**
     * API hotspotsXML to return a Zoomify-formatted XML file of can hotspots
     *
     * @return void
     */

    public function races() {
        $this->request->onlyAllow('get');

        $data = Cache::read('races_all', 'interface');
        if(!$data) {
            $data = $this->Race->find(
                'all'
            );
            Cache::write('races_all', $data, 'interface');
        }
        //$this->Race->pre($data);
        return $this->Rest->response(200, __('races'), array('data' => $data));
    }
}
