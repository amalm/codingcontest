<?php

class InputsoutputsController extends AppController {
    var $name = 'Inputsoutputs';
    var $uses = array('Inputsoutput', 'Level');
    
    public function index($id = null) {
        if ($id == null) {
            $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        } else {
            $this->set('inputsoutputs', $this->Inputsoutput->find('all', array('conditions' => array('Inputsoutput.level_id' => $id))));
        }
    }
    
    public function add($id = null){
        $this->Level->id = $id;
        if(!$this->Level->exists()){
            throw new NotFoundException('Level wurde nicht gefunden');
        }
        $this->tmpLevel = $this->Level->find('all', array('conditions' => array('Level.id' => $id)));
        if ($this->request->is('post')){
            $this->request->data['Inputsoutput']['level_id'] = $id;
            if ($this->Inputsoutput->save($this->request->data)) {
                $this->Session->setFlash('<span class="glyphicon glyphicon-ok" style="font-size:20px;"></span>'.' Input und Output wurden erfolgreich angelegt', 'default', array('class'=>'alert alert-success'));
                $this->redirect(array('controller' => 'levels', 'action' => 'index', $this->tmpLevel[0]['Level']['task_id']));
            } else {
                $this->Session->setFlash('<span class="glyphicon glyphicon-remove" style="font-size:20px;"></span>'.' Input und Output konnten nicht gespeichert werden', 'default', array('class'=>'alert alert-danger'));
            }
        }
    }
    
    public function delete($id = null){
        $this->Inputsoutput->id = $id;
        if (!$this->Inputsoutput->exists()) {
            $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        } else {
            $tmpInputsoutput = $this->Inputsoutput->read();
            $tmpId = $tmpInputsoutput['Level']['id'];
            if($this->Inputsoutput->delete($id)){
                $this->Session->setFlash('<span class="glyphicon glyphicon-ok" style="font-size:20px;"></span>'.' Input und Output wurden erfolgreich gelöscht', 'default', array('class'=>'alert alert-success'));
                $this->redirect(array('controller' => 'inputsoutputs', 'action' => 'index', $tmpId));
            } else {
                $this->Session->setFlash('<span class="glyphicon glyphicon-remove" style="font-size:20px;"></span>'.' Input und Output konnten nicht gelöscht werden', 'default', array('class'=>'alert alert-danger'));
                $this->redirect(array('controller' => 'inputsoutputs', 'action' => 'index', $tmpId));
            }
        }
    }
}
