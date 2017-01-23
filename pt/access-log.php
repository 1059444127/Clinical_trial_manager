<?php
session_start();
//Load all functions
require_once('load.php');

login_check();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Access Log &mdash; <?php echo get_site_name();?></title>
	
	<?php echo get_wp_head();?>
</head>
 <body class="nav-md">
	<div class="container body">
		<div class="main_container">
		
		<?php echo get_wp_header();?>
		
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<?php echo get_page_header('Access Log'); ?>
				
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_content">
								<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Last Login</th>
											<th>Location</th>
											<th>Device</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										global $con;
										$current_user_id = get_current_user_id();
										$query = "SELECT * FROM ".TBL_ACCESS_LOG." WHERE `user_id` = '$current_user_id' ORDER BY `ID` DESC";
										$result = $db->get_results($query);
										if($result):
											foreach($result as $row):
										?>
										<tr>
											<td><?php echo date('M d, Y h:i A',strtotime($row->date));?></td>
											<td><?php echo $row->ip_address;?></td>
											<td><a href="#" data-toggle="tooltip" title="<?php echo $row->user_agent;?>"><?php echo $row->device;?></a></td>
										</tr>
										<?php
											endforeach;
										endif;
										?>
									</tbody>
								</table>
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