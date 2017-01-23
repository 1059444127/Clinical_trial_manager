<?php
session_start();
//Load all functions
require_once('load.php');

if(is_user_logged_in()):
	$uri = site_url();
	header("location:".$uri);
	die();
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login &mdash; <?php echo get_site_name();?></title>
	
	<?php echo get_wp_head();?>
</head>
<body class="home-page main">
	<section class="">
		<div class="canvas-block">
			<canvas id="myCanvas1"></canvas>
		</div>
	</section>
	<?php echo get_home_page_header();?>
	<section class="big-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php require_once( ABSPATH . CONTENT . '/includes/forms/login/login.php'); ?>
				</div>
			</div>
		</div>
	</section>
	<?php echo get_home_page_footer('fixed');?>
	<?php echo get_wp_scripts(); ?>
	<script>
		/*var canvas1;

		$(document).ready(function() {
			canvas1 = $("#myCanvas1").canvaDots({
				sizeDependConnections: !1,		
				speed: 1
			});
		});*/
	</script>
</body>
</html>