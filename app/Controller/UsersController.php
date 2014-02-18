<?php
	class UsersController extends AppController
	{
		public $name = 'Users';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('logout');
	}
	
	public function isAuthorized($user) {
	    if ($user['role'] == 'admin') {
	        return true;
	    }
	    if (in_array($this->action, array('index', 'view', 'add', 'edit', 'delete'))) {
	        if ($user['id'] != $this->request->params['pass'][0]) {
	            return false;
	        }
	    }
	    return true;
	}
	
	public function login() {
	    if ($this->request->is('post')) {
	         if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());  
	        } else {
	            $this->Session->setFlash('Your username/password combination was incorrect');
	        }
	           
	    }
	}
	
	public function logout() {
	    $this->redirect($this->Auth->logout());
	}
			
		public function index() 
		{
			$this->set('users',$this->User->find('all'));		//Hollt den Datensatz aus der Tabelle und setzt ihn für den view zur Verfügung
		}
		
		public function view($id = null) 
		{
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
	
		public function add()
		{
			if($this->request->is('Post'))
			{
				
				if($this->User->save($this->request->data))
				{
					App::uses('CakeEmail', 'Network/Email');
					$address = $this->request->data('User')['Mail'];			//Holl ich mir die gerade eingegebene Mail
					$email = new CakeEmail('gmail');
					$email->from('reuf.kozlica@gmail.com');
					$email->to($address);
					$email->subject('Anmeldung Coding Contest');
					$email->send("Eine Nachricht zum Testen");
					$this->Session->setFlash('Der Benutzer wurde erfolgreich gespeichert!');
					$this->redirect(array('action'=>'index'));
				}
				else
				{
					$this->Session->setFlash('Der Benutzer wurde nicht erfolgreich gespeichert!');
				}
			}
		}
	
		public function edit($id = null) 
		{
			$this->User->id = $id;
			
			if (!$this->User->exists()) 
			{
				throw new NotFoundException('Invalid user');
			}
		
			if ($this->request->is('post') || $this->request->is('put')) 
			{
				if ($this->User->save($this->request->data)) 
				{
					//$this->Session->setFlash('Der Benutzer wurde gespeichert!');
					$this->Session->setFlash($message,'success',array('alert'=>'info'));
					$this->redirect(array('action' => 'index'));
				}
				 else 
				 {
					$this->Session->setFlash('Der Benutzer konnte nicht gespeichert werden. ');
				  }
			} 
			else 
			{
				$this->request->data = $this->User->read();
			}
		}
	
		public function delete($id = null) 
		{
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			if (!$id) {
				$this->Session->setFlash('Ungültige ID für den user');
				$this->redirect(array('action'=>'index'));
			}
			if ($this->User->delete($id)) {
				$this->Session->setFlash('Benutzer wurde gelöscht!');
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('Benutzer konnte nicht gelöscht werden!');
			$this->redirect(array('action' => 'index'));
		}
	}
?>