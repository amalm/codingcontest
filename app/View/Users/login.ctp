<html>
	<body>
		<?php
		echo $this->Form->create('User', array('action'=>'login','class'=>'form-signin', 'role' => 'form'));
		?>
            <h2 class="form-signin-heading"><center>Anmelden</center></h2>
	        <?php echo $this->Form->input('mail', array('id'=>'mail', 'type'=>'email', 'class'=>'form-control', 'placeholder'=>'Email', 'required', 'autofocus','label' => FALSE,));?>
	        <?php echo $this->Form->input('password', array('id'=>'password', 'type'=>'password', 'class'=>'form-control', 'placeholder'=>'Passwort', 'required','label' => FALSE,));?>
	        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Anmelden</button>
	      </form>
	
	    </div><!-- /.container -->
		<?php
		echo $this->Form->end();
		?>
  </body>
</html>
