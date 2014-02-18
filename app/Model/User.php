<?php 
class User extends AppModel 
{
	public $name = 'User';
	public $displayField = 'name';
	
	/*Überprüfung der Eingabe
	Zuerst der Name des Feldes
	Dann die Regel und die dazugehörige Message
	 */
	public $validate = array(
		'First name'=>array(
			'Geben Sie Ihren Vornamen ein.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Geben Sie bitte einen Vornamen ein.'
			)
		),
		'Family name'=>array(
			'Geben Sie Ihren Nachnamen ein.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Geben Sie bitte einen Nachnamen ein.'
				)
			),
		'Mail'=>array(
			' Geben Sie eine Mail ein'=>array(
				'rule'=>array('email'),
				'message'=>'Geben Sie bitte eine Mail-Adresse ein'
			),
			'Geben Sie eine Mail ein'=>array(
				'rule'=> 'isUnique',
				'message'=>'Diese Mail-Adresse ist bereits vorhanden!'
				)
		),
		'Password'=>array(
			'Geben Sie ein Passwort ein.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Geben Sie ein Passwort ein.'
		),
			'Das Passwort muss zwischen 8 und 20 Zeichen haben.'=>array(
				'rule'=>array('between', 8, 20),
				'message'=>'Das Passwort muss zwischen 8 und 20 Zeichen haben.'
				)
			)
	);
	    	/*Für das Hashan des PW
			 schaut ob das Passwort überhaupt gesetzt wurde befor es das PW verschlüsselt
			 schreibt das gehascht PW in DB zurück || AuthComponent Password hascht den String der eingegeben wurde */
	public function beforeSave($options = array()) {
	    if (isset($this->data['User']['Password'])) {
	        $this->data['User']['Password'] = AuthComponent::password($this->data['User']['Password']);
	    }
	    return true;
	}
}
?>