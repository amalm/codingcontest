<script>
		$(document)
			.on('change', '.btn-file :file', function() {
				var input = $(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [numFiles, label]);
		});
		
		$(document).ready( function() {
			$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
				
				var input = $(this).parents('.input-group').find(':text'),
					log = numFiles > 1 ? numFiles + ' files selected' : label;
				
				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}
				
			});
		});		
	</script>
<h2>Lebenslauf hochladen</h2>
<?php 
	echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form', 'type' => 'file'));
?>

<div class="row" style="margin-left:10px; ">  
    <div class="form-group col-sm-5">
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file" style="position: relative; overflow: hidden;">
                    Durchsuchen
                    <input type="file" name="data[User][fileInput]" style="position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 999px; text-align: right; filter: alpha(opacity=0); opacity: 0; outline: none; background: white; cursor: inherit; display: block;" required="true"/>
                       
                </span>
            </span>
            <input class="form-control" style="width: 300px; background-color: white; border-bottom-left-radius: 0; border-top-left-radius: 0;">
        </div>
    </div>
</div>
<div class="row" style="margin-left:25px; ">
<div class="form-group">
    <button type="submit" class="btn btn-primary">Hochladen</button>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary">Zurück</button>', array('action'=>'userview', $user['User']['id']), array('escape'=>false)); ?>
</div>
</div>
<?php
	echo $this->Form->end();
?>