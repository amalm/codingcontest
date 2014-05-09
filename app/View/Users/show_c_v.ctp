<h2> CVs </h2>
<table class="table table-striped">
<thead>
	<tr>
	<th> Benutzername </th>
    <th> CV </th>
	</tr>
</thead>

<?php foreach($users as $user): ?>
    <tr>
		<td><?php echo $user['User']['first_name']." ".$user['User']['family_name'];?></td>
        <td><?php echo $user['User']['cvpath'];?></td>
        	<?php
        	endforeach
			?>
            
            </td>
   		 </tr>
	</table>
    