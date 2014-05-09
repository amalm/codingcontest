<?php /**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php echo $this -> Html -> docType('html5'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<?php echo $this -> Html -> charset(); ?>
		<title><?php echo $title_for_layout; ?></title>
		<?php echo $this -> Html -> meta('icon');

		echo $this -> fetch('meta');

		echo $this -> Html -> css('bootstrap.min');
		echo $this -> Html -> css('signin');

		echo $this -> fetch('css');

		echo $this -> Html -> script('https://code.jquery.com/jquery-1.10.2.min.js');
		echo $this -> Html -> script('bootstrap.min');
		echo $this -> Html -> script('offcanvas');
		echo $this -> Html -> script('bootstrap-datetimepicker.min');
		echo $this -> Html -> script('bootstrap-datetimepicker.de');
		echo $this -> fetch('script');
		?>
	</head>

	<body>			
		<div class="container">
                    <center><img src="../img/logo-login.png" alt="Coding Contest"></center>
                    <?php echo $this -> Session -> flash(); ?>
                    <?php echo $this -> fetch('content'); ?>
		</div><!--/.container-->
	</body>
</html>
