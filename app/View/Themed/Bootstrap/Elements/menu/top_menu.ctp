<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Coding Contest Platform</a>
        </div>
   
		<div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Startseite</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
		  
		               <div class="text-right">
			<?php if ($logged_in): ?>
		            Angemeldet: <?php echo $current_user['First name']; ?> <?php echo $current_user['Family name']?> <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
		        <?php else: ?>
		            <?php //echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?>
		        <?php endif; ?>
		</div>

        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->