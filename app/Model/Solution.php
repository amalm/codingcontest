<?php
class Solution extends AppModel {
	var $name = "Solution";
	var $belongsTo = array('Relation', 'Level');

        var $validate = array(
		'file' => array(
			'fileChecking' => array(
		        'rule'    => array('extension', array('zip')),
                        'message' => 'Es wird nur ZIP Format unterstützt'
		    )
		)
	);
}

