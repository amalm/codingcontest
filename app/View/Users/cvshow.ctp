<h2>Lebensläufe </h2>
<table class="table table-striped">
<thead>
	<tr>
	<th> Benutzername </th>
	<th> E-Mail </th>
        <th style="text-align: center"> Aktion </th>
	</tr>
</thead>

<?php foreach($users as $user): ?>
    <tr>
		<td><?php echo $user['User']['family_name']." ".$user['User']['first_name'];?></td>
		<td><?php echo $user['User']['mail'];?></td>
        <td style="text-align: center"><?php echo $this->HTML->link('<span class="glyphicon glyphicon-download-alt" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Lebenslauf herunterladen"></span>', array('controller'=>'users','action'=>'download', $user['User']['id']), array('escape'=>false)); ?></td>
        	<?php
        	endforeach
			?>
            
            </td>
   		 </tr>
	</table>
    