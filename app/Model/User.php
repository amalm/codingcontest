<?php 
class User extends AppModel 
{
	public $name = 'User';
        public $hasMany = 'Relation';
	public $displayField = 'name';
	
	/*Überprüfung der Eingabe
	Zuerst der Name des Feldes
	Dann die Regel und die dazugehörige Message
	 */
	public $validate = array(
		'First name'=>array(
			'firstNameNotEmpty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Geben Sie bitte einen Vornamen ein.'
			)
		),
		'Family name'=>array(
			'familyNameNotEmpty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Geben Sie bitte einen Nachnamen ein.'
				)
			),
		'Mail'=>array(
			'mailNotEmpty'=>array(
				'rule'=>array('email'),
				'message'=>'Geben Sie bitte eine Mail-Adresse ein'
			),
			'mailUnique'=>array(
				'rule'=> 'isUnique',
				'message'=>'Diese Mail-Adresse ist bereits vorhanden!'
				)
		),
		'password'=>array(
			'passNotEmpty'=>array(
				'rule'=>'notEmpty',
				'message'=>'Geben Sie ein Passwort ein.'
		),
			'passLength'=>array(
				'rule'=>array('between', 8, 20),
				'message'=>'Das Passwort muss zwischen 8 und 20 Zeichen haben.'
				)
			)
	);
	    	/*Für das Hashen des PW
			 schaut ob das Passwort überhaupt gesetzt wurde bevor es das PW verschlüsselt
			 schreibt das gehashte PW in DB zurück || AuthComponent Password hasht den String der eingegeben wurde */
	public function beforeSave($options = array()) {
	    if (isset($this->data['User']['password'])) {
	        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	    }
	    return true;
	}
	
	/*public function isOwnedBy($user) {
    return $this->field('id', array('user_id' => $user)) === $user;
	}*/
}
?>