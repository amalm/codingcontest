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
        $this->Auth->deny();
        $this->set('logged_in', $this->Auth->loggedIn());
    }
}
