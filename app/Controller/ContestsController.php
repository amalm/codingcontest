<?php

class ContestsController extends AppController {

    var $uses = array('Contest', 'Level', 'Task', 'User', 'Relation');

    public function index() {
        if ($this->Session->read('Auth.User')) {
            if ($this->Session->read('Auth.User.role') == 'admin') {
                $this->set('contests', $this->Contest->find('all', array('conditions' => array('Contest.visible' => 1))));
            } else {
                $this->set('contests', $this->Contest->find('all', array('conditions' => array('Contest.visible' => 1, 'Contest.start <=' => date('Y-m-d H:i:s', strtotime("now")), 'Contest.end >=' => date('Y-m-d H:i:s', strtotime("now"))))));
            }
        }
    }

    public function add() {
        $this->set('tasks', $this->Task->find('list', array('fields' => array('Task.id', 'Task.name'))));
        if ($this->request->is('post')) {
            if ($this->Contest->save($this->request->data)) {
                $this->Session->setFlash('<span class="glyphicon glyphicon-ok" style="font-size:20px;"></span>' . ' Contest wurde erfolgreich angelegt', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('<span class="glyphicon glyphicon-remove" style="font-size:20px;"></span>' . ' Contest konnte nicht gespeichert werden', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function isAuthorized($user) {
        if ($user['role'] == 'regular' && in_array($this->action, array('index', 'participate', 'confirm', 'show', 'attend')) && $user['active'] == 1) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function participate($id = null) {
        if (parent::__isAttending()) {
            $this->Session->setFlash('Sie dürfen nur an einem Contest gleichzeitig teilnehmen', 'default', array('class' => 'alert alert-danger'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Contest->id = $id;
        if (!$this->Contest->exists()) {
            throw new NotFoundException('Contest wurde nicht gefunden');
        }
        $this->set('contest', $this->Contest->read());
        $this->set('level', $this->Level->find('all', array('conditions' => array('Level.task_id' => $this->Contest->data['Task']['id']))));
    }

    public function confirm($id = null) {
        $this->Contest->id = $id;
        if (!$this->Contest->exists()) {
            throw new NotFoundException('Contest wurde nicht gefunden');
        }
        $this->Relation->save(array('user_id' => $this->Session->read('Auth.User.id'), 'contest_id' => $this->Contest->id));
        $this->Session->setFlash('Sie nehmen an diesem Contest teil', 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('action' => 'index'));
    }

    public function show($id = null) {
        $this->Contest->id = $id;
        if (!$this->Contest->exists()) {
            throw new NotFoundException('Contest wurde nicht gefunden');
        }
        $this->tmpContest = $this->Contest->find('all', array('conditions' => array('Contest.id' => $id)));
        if (!$this->Relation->find('all', array('conditions' => array('Relation.user_id' => $this->Session->read('Auth.User.id'), 'Relation.started >=' => date("Y-m-d H:i:s", strtotime("now - 2 hours")))))) {
            $this->Session->setFlash('Sie nehmen an diesem Contest nicht teil!', 'default', array('class' => 'alert alert-danger'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->set('levels', $this->Level->find('all', array('conditions' => array('Level.task_id' => $this->tmpContest[0]['Task']['id']))));
            $this->set('contest', $this->Contest->id);
        }
    }       
}
