<?php
App::uses('AppController', 'Controller');
/**
 * SquadUnits Controller
 *
 * @property SquadUnit $SquadUnit
 */
class SquadUnitsController extends AppController {

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null, $parent_id = null) {
        $this->SquadUnit->id = $id;
        if (!$this->SquadUnit->exists()) {
            throw new NotFoundException(__('Invalid squad unit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->SquadUnit->save($this->request->data)) {
                $this->flashMessage(__('The squad unit has been saved'), 'alert-success', array('controller' => 'squads', 'action' => 'view', $this->request->data['SquadUnit']['return_id']));
            } else {
                $this->flashMessage(__('The squad unit could not be saved. Please, try again.'), 'alert-error');
            }
        } else {
            $this->request->data = $this->SquadUnit->read(null, $id);
        }
		$squads = $this->SquadUnit->Squads->find('list');
		$units = $this->SquadUnit->Units->find('list');
		$this->set(compact('squads', 'units', 'parent_id'));
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
        $this->SquadUnit->id = $id;
        if (!$this->SquadUnit->exists()) {
            throw new NotFoundException(__('Invalid squad unit'));
        }
        if ($this->SquadUnit->delete()) {
            $this->flashMessage(__('Squad unit deleted'), 'alert-success', $this->referer());
        }
        $this->flashMessage(__('Squad unit was not deleted'), 'alert-error', $this->referer());
    }
}
