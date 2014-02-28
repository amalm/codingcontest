<?php
class LevelsController extends AppController {
	var $name = 'Levels';
	
	public function index($id = null){
		if($id == null){
			$this->redirect(array('controller'=> 'tasks', 'action' => 'index'));
		} else {
			$this->set('levels', $this->Level->find('all', array('conditions' => array('Level.task_id' => $id))));
		}
	}
	
	public function add($id = null){
		if($id == null){
			$this->redirect(array('controller'=> 'tasks', 'action' => 'index'));
		} else {
			if ($this->request->is('post')){
				$this->request->data['Level']['task_id'] = $id;
				$this->request->data['Level']['level'] = 6;
				if ($this->__uploadFile() && $this->Level->save($this->request->data)) {
					$this->Session->setFlash('Level wurde erfolgreich angelegt', 'default', array('class'=>'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
				$this->Session->setFlash('Level konnte nicht gespeichert werden', 'default', array('class'=>'alert alert-danger'));
				}
			}
		}
	}
	
	public function download($id = null){
		if($id == null){
			$this->redirect(array('controller'=> 'levels', 'action' => 'index'));
		} else {
			$this->response->file(APP.'uploads'.DS."4_mysql_rechte.pdf",array('download'=> true, 'name'=>'Blub'));
  			return $this->response; 
		}
	}
	
	public function __uploadFile(){
		$file = $this->data['Level']['file'];
	  	if ($file['error'] === UPLOAD_ERR_OK) {
	  		die(APP);
	    	if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$file['name'])) {
	      		$this->request->data['Level']['path'] = APP.'uploads'.DS.$file['name'];
	      		return true;
	    	}
	  	}
	  return false;
	}
}