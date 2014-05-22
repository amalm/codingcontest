<h2>Lebensläufe </h2>
<table class="table table-striped">
<thead>
	<tr>
	<th> Benutzername </th>
    <th> Aktion </th>
	</tr>
</thead>

<?php foreach($users as $user): ?>
    <tr>
		<td><?php echo $user['User']['first_name']." ".$user['User']['family_name'];?></td>
        <td><?php echo $this->HTML->link('<span class="glyphicon glyphicon-download-alt" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Lebenslauf herunterladen"></span>', array('controller'=>'users','action'=>'download', $user['User']['id']), array('escape'=>false)); ?></td>
        	<?php
        	endforeach
			?>
            
            </td>
   		 </tr>
	</table>
    