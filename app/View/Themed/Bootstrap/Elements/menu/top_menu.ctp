    <?php
    $vorname = AuthComponent::user('first_name');
    $nachname = AuthComponent::user('family_name');
    if ($logged_in){
        ?>
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
		                <li class="active"><?php echo $this->Html->link("Contests", array('controller'=>'contests', 'action'=>'index')); ?></li>
		            </ul>

            <div class="text-right">
                    Angemeldet: <?php echo ($vorname); ?> <?php echo ($nachname); ?> <?php echo $this->Html->link('Abmelden', array('controller'=>'users', 'action'=>'logout')); ?>
            </div>
        <?php } else { ?>
        <?php } ?>

        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div><!-- /.navbar -->