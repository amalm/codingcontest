<h2> Anstehende Contests </h2>
<?php if($this->Session->read('Auth.User')) { 
        if($this->Session->read('Auth.User.role')=='admin'){ 
            $userRole = "admin";
        } else {
            $userRole = "regular";
        }
}
?>

<table class="table table-striped">
    <thead>
	<th>Contestname</th>
	<th>Start</th>
	<th>Offen bis</th>
	<th style="text-align: center;">Durchf&uuml;hrungszeit</th>
	<th>Aktion</th>
    </thead>
	<?php foreach ($contests as $contest){ ?>
	<tr>
                <td><?php if($userRole && $userRole=="regular"){ ?><?php echo $this->Html->link($contest['Contest']['name'], array('controller'=>'contests', 'action'=>'participate', $contest['Contest']['id'])) ?><?php } else { echo $contest['Contest']['name']; }?></td>
		<td><?php echo $contest['Contest']['start'] ?></td>
		<td><?php echo $contest['Contest']['end'] ?></td>
		<td style="text-align: center;"><?php echo $contest['Task']['duration']."h" ?></td>
		<td>
			<?php 
				if($contest['Contest']['visible'] == 0){
					echo $this->Form->PostLink('<span class="glyphicon glyphicon-eye-open" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Contest sichtbar setzen"></span>', array('action'=>'setVisible', $contest['Contest']['id']), array('confirm'=>'Soll der Contest sichtbar gesetzt werden?', "escape" => false)); 
				} else {
					echo $this->Form->PostLink('<span class="glyphicon glyphicon-eye-close" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Contest unsichtbar setzen"></span>', array('action'=>'setVisible', $contest['Contest']['id']), array('confirm'=>'Soll der Contest unsichtbar gesetzt werden?', "escape" => false)); 
				}
			?>
		</td>
	</tr>
	<?php } ?>
</table>
<?php if($userRole && $userRole=="admin"){ ?>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Contest hinzufügen </button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>
<?php } ?>
