<?php 
class Inputsoutput extends AppModel {
	var $name = "Inputsoutput";
	var $belongsTo = 'Level';
	
	var $validate = array(
		'input' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Input muss angegeben werden'
			)
		),
		'output' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Input muss angegeben werden'
			)
		)
	);
	
}
