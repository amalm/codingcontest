<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
	public $theme = "Bootstrap";
	
    public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'Users', 'action'=>'index'),
            'logoutRedirect'=>array('controller'=>'Users', 'action'=>'login'),
            'authError'=>'Sie haben keine Rechte für diese Seite',
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'Mail', 'password' => 'Password')
				)
			)
        )
    );
    
    public function isAuthorized($user) {					//Hier prüfe ich ob der User autorisiert ist die Seite zu sehen und
        return true;										//welchen Inhalt ein angemeldeter user sehen darf
    }
    
    public function beforeFilter() {						//Hier sage ich welche Funktionen die UNAGEMELDETEN User sehen dürfen
        $this->Auth->allow('');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());	
    }
}
