<?php
class Relation extends AppModel {
	var $name = "Relation";
	var $belongsTo = array('Contest', 'User');
        var $hasMany = 'Solution';
}
