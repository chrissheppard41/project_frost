<?php
App::uses('AppController', 'Controller');
/**
 * SquadOptions Controller
 *
 * @property SquadOption $SquadOption
 */
class SquadOptionsController extends AppController {

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 *///options//squads//SquadUnit
    public function admin_edit($id = null, $parent_id = null) {
        $this->SquadOption->id = $id;
        if (!$this->SquadOption->exists()) {
            throw new NotFoundException(__('Invalid squad option'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SquadOption->save($this->request->data)) {
                $this->flashMessage(__('The squad option has been saved'), 'alert-success', array('controller' => 'squad_units', 'action' => 'view', $this->request->data['SquadOption']['return_id']));
            } else {
                $this->flashMessage(__('The squad option could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->SquadOption->read(null, $id);
        }
        $groups = $this->SquadOption->Groups->find('list');
		$squadUnits = $this->SquadOption->SquadUnits->find('list');
		$this->set(compact('groups', 'squadUnits', 'parent_id'));
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
        $this->SquadOption->id = $id;
        if (!$this->SquadOption->exists()) {
            throw new NotFoundException(__('Invalid squad option'));
        }
        if ($this->SquadOption->delete()) {
            $this->flashMessage(__('Squad option deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Squad option was not deleted'), 'alert-error', $this->referer());
    }
}
