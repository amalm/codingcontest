<h2> Benutzerverwaltung </h2>
<table class="table table-striped">
<thead>
	<tr>
	<th> Benutzername </th>
    <th> Mail </th>
    <th style="text-align: center;"> Registriert am </th>
    <th style="text-align: center;"> Bestätigt </th>
    <th style="text-align: center;"> Aktion </th>
	</tr>
</thead>
    
	<?php foreach($users as $user): ?>
    <tr>
		<td><?php echo $user['User']['first_name']." ".$user['User']['family_name'];?></td>
        <td><?php echo $user['User']['mail'];?></td>
        <td style="text-align: center;"><?php echo date('d-m-Y', strtotime($user['User']['registered']));?></td>
        <td style="text-align: center;"> <?php if($user['User']['confirm'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px; color:#00CD00;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px; color:#fe0802;"></span>';} ?></td>

		<td style="text-align: center;">
		<?php 
			echo $this->HTML->link('<span class=" glyphicon glyphicon-search" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Benutzer ansehen"></span>', array('action'=>'view', $user['User']['id']), array('escape'=>false)); ?>
		<?php 
			echo $this->HTML->link('<span class="glyphicon glyphicon-pencil" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Benutzer bearbeiten"></span>', array('action'=>'edit', $user['User']['id']), array('escape'=>false)); ?>
        
        	<?php 
			if($user['User']['active'] == 0){
				echo $this->Form->PostLink('<span class="glyphicon glyphicon-eye-open" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Benutzer aktivieren"></span>', array('action'=>'activate', $user['User']['id']), array('confirm'=>'Soll der Benutzer aktiviert werden?', "escape" => false)); 
				}
				
			else{
				echo $this->Form->PostLink('<span class="glyphicon glyphicon-eye-close" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Benutzer deaktivieren"></span>', array('action'=>'activate', $user['User']['id']), array('confirm'=>'Soll der Benutzer deaktiviert werden?', "escape" => false)); 
				}
				endforeach
			?>
            
            </td>
   		 </tr>
	</table>

<?php echo $this->Html->link('<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Benutzer hinzufügen </button>',  array('action'=>'add'), array("escape"=>false)); 
?>



