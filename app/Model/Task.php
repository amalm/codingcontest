<?php 
class Task extends AppModel {
	var $name = "Task";
	
	var $hasMany = array('Contest', 'Level');
	
	var $validate = array(
		'name' => array(
			'nameNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Levelname muss angegeben werden!'
			),
			'minimalLength' => array(
				'rule' => array('minLength', 3),
				'message' => 'Levelname muss minimal 3 Zeichen beinhalten!'
			)
		),
		'duration' => array(
			'durationDecimal' => array(
				'rule' => 'numeric',
				'message' => 'Darf nur Zahlen beinhalten!'
				),
			'durationNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Darf nicht leer sein'
				)
		),
		'description' => array(
			'nameNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Beschreibung muss angegeben werden!'
			),
			'minimalLength' => array(
				'rule' => array('minLength', 3),
				'message' => 'Beschreibung muss minimal 3 Zeichen beinhalten!'
			)
		)
	);
}