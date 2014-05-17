<?php

class LevelsController extends AppController {

    var $name = 'Levels';
    var $uses = 'Level';

    public function index($id = null) {
        if ($id == null) {
            $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        } else {
            $this->set('levelid', $id);
            $this->set('levels', $this->Level->find('all', array('conditions' => array('Level.task_id' => $id))));
        }
    }

    public function isAuthorized($user) {
        if ($user['role'] == 'regular' && in_array($this->action, array('index', 'download')) && $user['active'] == 1) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function add($id = null) {
        if ($id == null) {
            $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        } else {
            $this->set('levelid', $id);
            if ($this->request->is('post')) {
                $this->request->data['Level']['task_id'] = $id;
                $this->request->data['Level']['level'] = $this->Level->find('count', array('conditions' => array('Level.task_id' => $id)))+1;
                if ($this->__uploadFile() && $this->Level->save($this->request->data)) {
                    $this->Session->setFlash('Level wurde erfolgreich angelegt', 'default', array('class' => 'alert alert-success'));
                    $this->redirect(array('action' => 'index', $id));
                } else {
                    $this->Session->setFlash('Level konnte nicht gespeichert werden', 'default', array('class' => 'alert alert-danger'));
                }
            }
        }
    }

    public function download($id = null) {
        $this->Level->id = $id;
        if (!$this->Level->exists()) {
            throw new NotFoundException('Level wurde nicht gefunden');
        }
        $this->Level->read();
        $this->User->id = $this->Session->read('Auth.User.id');
        $this->response->file($this->Level->data['Level']['path'], array('download' => true, 'name' => $this->Level->data['Level']['description'] . '.pdf'));
        return $this->response;
    }

    public function __uploadFile() {
        $file = $this->data['Level']['fileInput'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($file['tmp_name'], APP . 'uploads' . DS . $file['name'])) {
                $this->request->data['Level']['path'] = APP . 'uploads' . DS . $file['name'];
                return true;
            }
        }
        return false;
    }

    public function submit($id = null) {
        $this->Level->id = $id;
        if (!$this->Level->exists()) {
            throw new NotFoundException('Level wurde nicht gefunden');
        }

    }
}
