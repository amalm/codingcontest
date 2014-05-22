<?php

class ContestsController extends AppController {

    var $uses = array('Contest', 'Level', 'Task', 'User', 'Relation', 'Inputsoutput', 'Solution');

public function index() {
    if ($this->Session->read('Auth.User')) {
        if ($this->Session->read('Auth.User.role') == 'admin') {
                $this->set('contests', $this->Contest->find('all'));
        } else {
            $this->set('contests', $this->Contest->find('all', 
                    array('conditions' => array('Contest.visible' => 1, 
                        'Contest.start <=' => date('Y-m-d H:i:s', strtotime("now")), 
                            'Contest.end >=' => date('Y-m-d H:i:s', strtotime("now"))))));
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
        if ($user['role'] == 'regular' && in_array($this->action, array('index', 'participate', 'confirm', 'show', 'attend', 'submit')) && $user['active'] == 1) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function participate($id = null) {
        $this->Contest->id = $id;
        if (!$this->Contest->exists()) {
            throw new NotFoundException('Contest wurde nicht gefunden');
        }
        if (parent::__isAttending()) {
            $this->Session->setFlash('Sie dürfen nur an einem Contest gleichzeitig teilnehmen', 'default', array('class' => 'alert alert-danger'));
            $this->redirect(array('action' => 'index'));
        } else if (parent::__alreadyAttended($id)){
            $this->Session->setFlash('Sie haben an diesem Contest bereits teilgenommen', 'default', array('class' => 'alert alert-danger'));
            $this->redirect(array('action' => 'index'));
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
        }
    }

    public function submit($id = null) {
        $flag = true;
        $tmpFalse = 0;
        $tmpFalseStrings = "";
        $this->Level->id = $id;
        if (!$this->Level->exists()) {
            throw new NotFoundException('Level wurde nicht gefunden');
        }
        $this->Level->read();
        $this->User->id = $this->Session->read('Auth.User.id');
        $tmpRelation = $this->Relation->find('first', array('conditions' => array('Relation.user_id' => $this->User->id), 'order' => array('Relation.id' => 'DESC')));

        if(!parent::__isAttending()){
            $this->Session->setFlash('Sie dürfen keine Dateien abgeben, da Sie an diesem Contest nicht aktuell teilnehmen', 'default', array('class' => 'alert alert-danger'));
            $this->redirect(array('controller' => 'contests', 'action' => 'index'));
        }

        if($this->__canSubmit($id)){
            $this->set('inputsoutputs', $tmpInputsoutputs = $this->Inputsoutput->find('all', array('conditions' => array('Inputsoutput.level_id' => $this->Level->id))));

            if($this->request->is('post')){
                foreach ($tmpInputsoutputs as $inputsoutput){
                    if($inputsoutput['Inputsoutput']['output'] != $this->request->data['Solution']['output'.$inputsoutput['Inputsoutput']['id']]){
                        $tmpFalse++;
                        $tmpFalseStrings .= "Input: ".$inputsoutput['Inputsoutput']['input'].", Benutzeroutput: ".$this->request->data['Solution']['output'.$inputsoutput['Inputsoutput']['id']]."<br>";
                    }
                }
                if($tmpFalse>0){
                    $tmpFalseStrings = "Insgesamt falsch ".$tmpFalse." von ".count($tmpInputsoutputs)."<br>Fehlerhaft:<br>".$tmpFalseStrings;
                } else {
                    $tmpFalseStrings = "Alle Eingaben richtig";
                }
                $this->request->data['Solution']['correct'] = $tmpFalseStrings;
                $this->request->data['Solution']['level_id'] = $this->Level->id;
                $this->request->data['Solution']['relation_id'] = $tmpRelation['Relation']['id'];

                if ($this->__uploadFile() && $this->Solution->save($this->request->data)) {
                    $this->Session->setFlash('Ihre Daten wurden erfolgreich angelegt. <br>', 'default', array('class' => 'alert alert-success'));
                    if($tmpFalse == 0){
                        $this->Session->setFlash('Auswertung: <br> '.$tmpFalseStrings, 'default', array('class' => 'alert alert-success'));
                    } else {
                        $this->Session->setFlash('Auswertung: <br> '.$tmpFalseStrings, 'default', array('class' => 'alert alert-warning'));
                    }
                    $this->redirect(array('controller' => 'contests','action' => 'show', $tmpRelation['Relation']['contest_id']));
                } else {
                    $this->Session->setFlash('Level konnte nicht gespeichert werden', 'default', array('class' => 'alert alert-danger'));
                    unlink($this->request->data['Solution']['path']);
                }
            }
        }
    }

    public function __uploadFile() {
        $file = $this->request->data['Solution']['file'];
        $date = new DateTime();
        $random = $date->format('Y-m-d-H-i-s');
        if ($file['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($file['tmp_name'], APP . 'uploads'.DS.'Usercontestfiles' . DS . $random .$file['name'])) {
                $this->request->data['Solution']['path'] = APP . 'uploads'.DS.'Usercontestfiles' . DS . $random. $file['name'];
                $this->request->data['Solution']['file_name'] = $file['name'];
                return true;
            }
        }
        return false;
    }

    public function __canSubmit($id){
        $tmpRelation = $this->Relation->find('first', array('conditions' => array('Relation.user_id' => $this->Session->read('Auth.User.id')), 'order' => array('Relation.id' => 'DESC')));
        $this->Level->id = $id;
        if(!$this->Solution->find('all', array('conditions' => array('Solution.relation_id' => $tmpRelation['Relation']['id'])))){
            if($this->Level->data['Level']['level'] != '1'){
                $this->Session->setFlash('Dieser Level ist für Sie nicht freigeschalten, die Levels müssen nach der Reihe abgearbeitet werden. <br>Bitte Level 1 abgeben', 'default', array('class' => 'alert alert-danger'));
                $this->redirect(array('controller' => 'contests', 'action' => 'show', $tmpRelation['Relation']['contest_id']));
            }
        } else {
            $tmp = $this->Solution->find('first', array('conditions' => array('Solution.relation_id' => $tmpRelation['Relation']['id']), 'order' => array('Solution.id' => 'DESC')));
            $tmpLevel = $this->Level->find('all', array('conditions' => array('Level.id' => $tmp['Solution']['level_id'])));
            if($this->Level->data['Level']['level']-1 != $tmpLevel['0']['Level']['level']){
                $this->Session->setFlash('Dieser Level ist für Sie nicht freigeschalten, die Levels müssen nach der Reihe abgearbeitet werden.<br>Bitte Level '.($tmpLevel['0']['Level']['level']+1).' abgeben', 'default', array('class' => 'alert alert-danger'));
                $this->redirect(array('controller' => 'contests', 'action' => 'show', $tmpRelation['Relation']['contest_id']));
            }
        }
        return true;
    }
}
