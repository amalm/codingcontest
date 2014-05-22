<?php
class Level extends AppModel {
	var $name = "Level";
	var $belongsTo = 'Task';
        var $hasMany = array('Inputsoutput', 'Solution');

	var $validate = array(
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Levelbeschreibung muss angegeben werden.'
			),
			'minimalLength' => array(
				'rule' => array('minLength', 5),
				'message' => 'Levelbeschreibung muss mindestens 5 Zeichen beinhalten.'
			)
		),
		'fileInput' => array(
			'fileChecking' => array(
		        'rule'    => array('extension', array('pdf')),
			    'message' => 'Es wird nur PDF Format unterstützt.'
		    )
		)
	);

}
