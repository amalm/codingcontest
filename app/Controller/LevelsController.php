<?php
class LevelsController extends AppController {
	var $name = 'Levels';
	public function index(){
		$this->set('levels', $this->Level->find('all', array('contain' => array('Task'))));
	}
}