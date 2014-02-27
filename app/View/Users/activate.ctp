<?php
	echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form'));
	
	
	echo $this->Form->input('Active', array('id'=>'Active', 'type'=>'hidden','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	
	echo $this->Form->end();
?>
