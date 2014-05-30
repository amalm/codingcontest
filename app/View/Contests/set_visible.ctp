<?php
	echo $this->Form->create('Contest', array('class'=>'form-horizontal', 'role' => 'form'));
	
	
	echo $this->Form->input('visible', array('id'=>'Active', 'type'=>'text','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	
	echo $this->Form->end();
?>