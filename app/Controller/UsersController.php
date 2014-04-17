<?php

class UsersController extends AppController {

    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
    }

    public function isAuthorized($user) {
        if ($user['role'] == 'regular' && in_array($this->action, array('useredit', 'userview')) && $user['active'] == 1) {
            if ($user['id'] == $this->request->params['pass'][0]) {
                return true;
            } else {
                return false;
            }
        }
        return parent::isAuthorized($user);
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->Auth->user();
                $id = $user['id'];
                $redirect = "userview/" . $id;

                if ($user['role'] == 'regular' && $user['active'] == 1) {
                    $this->redirect($this->Auth->redirect($redirect));
                } else {
                    if (!$user['active'] == 1) {
                        $this->Session->setFlash('Ihr Account ist derzeit deaktiviert! <br>
                                        Kontaktieren Sie den Systemadministrator!');
                    } else {
                        $this->redirect($this->Auth->redirect());
                    }
                }
            } else {
                $this->Session->setFlash('Die eingegebenen Daten stimmen nicht überein!');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->set('users', $this->User->find('all'));  //Holt den Datensatz aus der Tabelle und setzt ihn für den view zur Verfügung
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Ungültiger User');
        }

        if (!$id) {
            $this->Session->setFlash('Ungültiger User');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read());
    }

    public function add() {
        if ($this->request->is('Post')) {
            if ($this->User->save($this->request->data) && $this->User->saveField('confirm_string', $stringToSend = $this->__randomString($length = 10))) {
                App::uses('CakeEmail', 'Network/Email');
                $address = $this->request->data('User')['mail'];   //Holl ich mir die gerade eingegebene Mail
                $email = new CakeEmail('gmail');
                $email->from('reuf.kozlica@gmail.com');
                $email->to($address);
                $email->subject('Anmeldung Coding Contest Platform');
                $email->send("Aktivieren Sie Ihren Account mit dem folgenden Link: http://localhost/project/users/confirm/" . $stringToSend .", Ihr vorläufiges Passwort ist: ".$this->request->data('User')['password']);
                $this->Session->setFlash('<span class="glyphicon glyphicon-ok" style="font-size:20px;"></span>'.' Benutzer wurde erfolgreich angelegt', 'default', array('class'=>'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('<span class="glyphicon glyphicon-remove" style="font-size:20px;"></span>'.' Benutzer konnte nicht angelegt werden', 'default', array('class'=>'alert alert-danger'));
            }
        }
    }

    public function edit($id = null) {
        
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException('Ungültiger User');
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->request->data('User')['password'] == "") {
                unset($this->User->validate['password']);
                unset($this->request->data('User')['password']);
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Der Benutzer wurde gespeichert!');
                //$this->Session->setFlash($message,'success',array('alert'=>'info'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Der Benutzer konnte nicht gespeichert werden. ');
            }
        } else {
            $userdata = $this->User->read();
            unset($userdata['User']['password']);

            $this->set('user', $userdata);
            $this->request->data = $userdata;
        }
    }

    public function confirm($id = null) {
        if ($id == null) {
            $this->redirect(array('action' => 'index'));
        }
        $conditions = array('confirm_string' => $id);
        if ($this->User->hasAny($conditions)) {
            $userdata = $this->User->find('all', array('conditions' => array('confirm_string' => $id)));
            $userid = $userdata[0]['User']['id'];
            if ($userdata[0]['User']['confirm'] != '1') {
                $this->User->id = $userid;
                $this->User->saveField('confirm', '1');
                $this->Session->setFlash('Sie haben Ihren Account erfolgreich bestätigt!');
            } else {
                $this->Session->setFlash('Sie haben Ihren Account bereits bestätigt!');
            }
        } else {
            $this->Session->setFlash('Sie haben Ihren Account nicht erfolgreich bestätigt!');
        }
        $this->redirect(array('action' => 'index'));
    }

    public function activate($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Ungültiger User');
        }
        $userdata = $this->User->read();

        if ($userdata['User']['active'] == 1) {
            $this->User->saveField('active', '0');      //saveField --> schreibt in DB
        } else {
            $this->User->saveField('active', '1');
        }
        $this->redirect(array('action' => 'index'));
    }

    public function __randomString($length = 10) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        srand((double) microtime() * 1000000);
        $i = 0;
        $pass = 0;
        while ($i < $length) {
            $num = rand() % strlen($chars);
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }

//////////////////////////////////////////////////////////////////Funktionen für den Benutzer/////////////////////////////////////////////////

    public function userview($id = null) {
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException('Ungültiger User');
        }
        if (!$id) {
            $this->Session->setFlash('Ungültiger User');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read());
    }

    public function useredit($id = null) {
        
		$this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException('Ungültiger User');
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->request->data('User')['password'] == "") {
                unset($this->User->validate['password']);
                unset($this->request->data('User')['password']);
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Der Benutzer wurde gespeichert!');
                //$this->Session->setFlash($message,'success',array('alert'=>'info'));
                $this->redirect(array('action' => 'userview'));
            } else {
                $this->Session->setFlash('Der Benutzer konnte nicht gespeichert werden. ');
            }
        } else {
            $userdata = $this->User->read();
            unset($userdata['User']['password']);

            $this->set('user', $userdata);
            $this->request->data = $userdata;
        }
    }

    public function cvupload() {
        $file = $this->data['User']['fileInput'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($file['tmp_name'], APP . 'CVs' . DS . $file['name'])) {
                $this->request->data['User']['cvpath'] = APP . 'CVs' . DS . $file['name'];
                return true;
            }
        }
        return false;
    }

}

?>