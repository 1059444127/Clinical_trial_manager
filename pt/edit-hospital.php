<?php
session_start();
//Load all functions
require_once('load.php');

login_check();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Hospital &mdash; <?php echo get_site_name();?></title>
	
	<?php echo get_wp_head();?>
</head>
 <body class="nav-md">
	<div class="container body">
		<div class="main_container">
		
		<?php echo get_wp_header();?>
		
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<?php echo get_page_header('Edit Hospital'); ?>
				
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_content">
								<?php require_once( ABSPATH . CONTENT . '/includes/forms/hospitals/edit-hospital.php'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /page content -->

	        <!-- footer content -->
		<?php echo get_wp_footer();?>
	        <!-- /footer content -->
		</div>
	</div>
	
</body>
</html>