<?php

class AppController extends Controller {

    public $theme = "Bootstrap";
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
            'authError' => 'Sie haben keine Rechte für diese Seite',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'mail', 'password' => 'password')
                )
            ),
            'authorize' => array('Controller')
        )
    );

    public function isAuthorized($user) {
        if ($user['role'] == 'admin') {
            return true;
        }
        return false;
    }

    public function beforeFilter() {
        $this->set('attending', false);
        $this->Auth->deny();
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->loadModel('Relation');
        $this->loadModel('Task');
        if($this->Session->read('Auth.User')) { 
            if($attending = $this->Relation->find('all', array('conditions' => array('Relation.user_id' => $this->Session->read('Auth.User.id'))))){
                $task = $this->Task->find('all', array('conditions' => array('Task.id' => $attending['0']['Contest']['task_id'])));
                $this->set('attending', $attending);
                $this->set('task', $task);
            }
        }
    }
    
    public function __isAttending(){
        if($this->Session->read('Auth.User')) { 
            if($this->Relation->find('all', array('conditions' => array('Relation.user_id' => $this->Session->read('Auth.User.id'))))){
                return true;
            }
        }
        return false;
    }
}
