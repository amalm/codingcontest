<?php
App::uses('CakeTime', 'Utility');
class Contest extends AppModel {
	
	var $name = 'Contest';
	
	var $belongsTo = 'Task';
        var $hasMany = 'Relation';
	
	var $validate = array(
		'name' => array(
			'nameNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Contestname muss angegeben werden!'
			),
			'minimalLength' => array(
				'rule' => array('minLength', 3),
				'message' => 'Contestname muss minimal 3 Zeichen beinhalten!'
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
		'start' => array(
			'startIsDatum' => array(
				'rule' => array('datetime'),
				'message' => 'Muss ein Datum sein!'
				),
			'startNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Darf nicht leer sein'
				),
			'futureStart' => array(
	            'rule' => array('checkFutureDate'),
	            'message' => 'Das Datum darf nicht in der Vergangenheit sein'
	        )
		),
		'end' => array(
			'endIsDatum' => array(
				'rule' => array('datetime'),
				'message' => 'Muss ein Datum sein!'
				),
			'endNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Darf nicht leer sein'
				),
			'endAfterStart' => array(
				'rule' => array('endDateAfterStartDate'),
				'message' => 'Ende-Datum muss nach dem Start-Datum sein!'
			)
		)
	);
	
	public function endDateAfterStartDate($check){
		$value = array_values($check);
		$date = $value[0];
		if ($date > $this->data[$this->name]['start']){
			return true;
		}
		return false;
	}
	
	public function checkFutureDate($check) {
	    $value = array_values($check);
	    return CakeTime::fromString($value['0']) >= CakeTime::fromString(date('Y-m-d'));
	}
}
