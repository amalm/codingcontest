<?php
class TasksController extends AppController {
	
	public function index(){
		$this->set('tasks', $this->Task->find('all'));
	}
	
	public function add(){
		if ($this->request->is('post')){
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash('Aufgabe wurde erfolgreich angelegt', 'default', array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
			$this->Session->setFlash('Aufgabe konnte nicht gespeichert werden', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}
}