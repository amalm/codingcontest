<?php

class TasksController extends AppController {

    public function index() {
        $this->set('tasks', $this->Task->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash('<span class="glyphicon glyphicon-ok" style="font-size:20px;"></span>'.' Aufgabe wurde erfolgreich angelegt', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'edit', $this->Task->getLastInsertId()));
            } else {
                $this->Session->setFlash('<span class="glyphicon glyphicon-remove" style="font-size:20px;"></span>'.' Aufgabe konnte nicht gespeichert werden', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function edit($id = null) {
        $this->Task->id = $id;

        if (!$this->Task->exists()) {
            throw new NotFoundException('Ungültige Aufgabe');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash('<span class="glyphicon glyphicon-ok" style="font-size:20px;"></span>'.' Die Aufgabe wurde erfolgreich gespeichert!', 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('<span class="glyphicon glyphicon-remove" style="font-size:20px;"></span>'.' Die Aufgabe konnte nicht gespeichert werden', 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $this->set('task', $this->Task->read());
            $this->request->data = $this->Task->read();
        }
    }

}
