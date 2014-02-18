<?php
class ContestsController extends AppController {
	var $uses = array('Contest', 'Level', 'Task');
	
	public function index(){
		$this->set('contests', $this->Contest->find('all', array('conditions' => array('Contest.visible' => 1))));
	}
	
	public function add(){
		$this->set('tasks', $this->Task->find('list', array('fields' => array('Task.id', 'Task.name'))));
		if ($this->request->is('post')){
			if ($this->Contest->save($this->request->data)) {
				$this->Session->setFlash('Contest wurde erfolgreich angelegt', 'default', array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
			$this->Session->setFlash('Contest konnte nicht gespeichert werden', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}
}