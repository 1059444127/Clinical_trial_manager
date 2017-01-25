<?php
/**
*Left sidebar menus for all pages
*/
if ( !defined('ABSPATH') )
	exit();
?>
<!--Sidebar start-->
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo site_url().'/dashboard/';?>" class="site_title">
				<i class="fa fa-heartbeat"></i> <span><?php echo get_site_name();?></span>
			</a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="<?php echo get_current_user_profile_image();?>" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?php echo get_current_user_name();?></h2>
			</div>
		</div>
		<!-- /menu profile quick info -->
		
		<div class="clearfix"></div>
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<!--<h3>General</h3>-->
				<ul class="nav side-menu">
					<li>
						<a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo site_url().'/dashboard/';?>">Dashboard</a></li>
							<li><a href="<?php echo site_url();?>/notifications/">Notification 
							<?php 
							$notifications_count = get_unread_notification_count();
							if($notifications_count > 0):
							?>
							<span class="label label-success">New</span>
							<?php endif; ?>
							</a></li>
						</ul>
					</li>
					
					<li>
						<a><i class="fa fa-trello"></i> My Profile <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo site_url();?>/edit-profile/">Edit Profile</a></li>
							<li><a href="<?php echo site_url();?>/change-password/">Change Password</a></li>
							<li><a href="<?php echo site_url().'/access-log/';?>">Access Log</a></li>
						</ul>
					</li>
					
					<?php if(is_admin()): ?>
					<li>
						<a><i class="fa fa-user"></i>Users <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo site_url().'/users/';?>">All Users</a></li>
							<li><a href="<?php echo site_url();?>/add-new-user/">Add New User</a></li>
							<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-user/"></a></li>
							<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/view-user/"></a></li>
						</ul>
					</li>
					<?php endif; ?>
					
					<?php if(user_can('view_hospital') || user_can('view_room')): ?>
					<li>
						<a><i class="fa fa-h-square"></i> Manage Hospitals<span class="fa fa-chevron-down"></span>	</a>
						<ul class="nav child_menu">
							<?php if(user_can('view_hospital')): ?>
							<li>
								<a>Hospitals <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<?php if(user_can('view_hospital')): ?>
									<li><a href="<?php echo site_url();?>/hospitals/">All Hospitals</a></li>
									<?php endif;?>
									
									<?php if(is_admin()): ?>
									<li><a href="<?php echo site_url();?>/add-new-hospital/">Add New Hospital</a></li>
									<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-hospital/"></a></li>
									<?php endif;?>
								</ul>
							</li>
							<?php endif;?>
							
							<?php if(user_can('view_room')): ?>
							<li>
								<a>Rooms <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<?php if(user_can('view_room')): ?>
									<li><a href="<?php echo site_url();?>/rooms/">All Rooms</a></li>
									<?php endif;?>
									
									<?php if(user_can('add_room')): ?>
									<li><a href="<?php echo site_url();?>/add-new-room/">Add New Room</a></li>
									<?php endif;?>
									
									<?php if(user_can('edit_room')): ?>
									<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-room/"></a></li>
									<?php endif;?>
									
								</ul>
							</li>
							<?php endif;?>
						</ul>	
					</li>
					<?php endif;?>
					
					<?php if( user_can('view_trial') || user_can('view_trial_type') || user_can('view_treatment') || user_can('view_clinic') ): ?>
					<li>
						<a><i class="fa fa-stethoscope"></i> Manage Trials <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<?php if( user_can('view_trial') ): ?>
							<li>
								<a>Trials <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<?php if( user_can('view_trial') ): ?>
									<li><a href="<?php echo site_url();?>/trials/">All Trials</a></li>
									<?php endif;?>
									
									<?php if( user_can('add_trial') ): ?>
									<li><a href="<?php echo site_url();?>/add-new-trial/">Add New Trial</a></li>
									<?php endif;?>
									
									<?php if( user_can('edit_trial') ): ?>
									<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-trial/"></a></li>
									<?php endif;?>
								</ul>
							</li>
							<?php endif;?>
							
							<?php if( user_can('view_trial_type') ): ?>
							<li>
								<a>Trial Types <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<?php if( user_can('view_trial_type') ): ?>
									<li><a href="<?php echo site_url();?>/trial-types/">All Trial Types</a></li>
									<?php endif;?>
									
									<?php if( user_can('add_trial_type') ): ?>
									<li><a href="<?php echo site_url();?>/add-new-trial-type/">Add New Trial Type</a></li>
									<?php endif;?>
									
									<?php if( user_can('edit_trial_type') ): ?>
									<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-trial-type/"></a></li>
									<?php endif;?>
								</ul>
							</li>
							<?php endif;?>
							
							<?php if( user_can('view_treatment') ): ?>
							<li>
								<a>Treatments <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<?php if( user_can('view_treatment') ): ?>
									<li><a href="<?php echo site_url();?>/treatments/"> All Treatments</a></li>
									<?php endif;?>
									
									<?php if( user_can('add_treatment') ): ?>
									<li><a href="<?php echo site_url();?>/add-new-treatment/">Add New Treatment</a></li>
									<?php endif;?>
									
									<?php if( user_can('edit_treatment') ): ?>
									<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-treatment/"></a></li>
									<?php endif;?>
								</ul>
							</li>
							<?php endif;?>
							
							<?php if( user_can('view_clinic') ): ?>
							<li>
								<a>Clinics <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<?php if( user_can('view_clinic') ): ?>
									<li><a href="<?php echo site_url();?>/clinics/">All Clinics</a></li>
									<?php endif;?>
									
									<?php if( user_can('add_clinic') ): ?>
									<li><a href="<?php echo site_url();?>/add-new-clinic/">Add New Clinic</a></li>
									<?php endif;?>
									
									<?php if( user_can('edit_clinic') ): ?>
									<li class="hidden-xs hidden-lg"><a href="<?php echo site_url();?>/edit-clinic/"></a></li>
									<?php endif;?>
									
									<?php if( user_can('view_clinic') ): ?>
									<li><a href="<?php echo site_url();?>/appointments/"></a></li>
									<?php endif;?>
								</ul>
							</li>
							<?php endif;?>
						</ul>	
					</li>
					<?php endif;?>
					
					<?php if( user_can('view_booking') && !is_admin() ): ?>
					<li>
						<a><i class="fa fa-bookmark-o"></i> Completed Clinics<span class="fa fa-chevron-down"></span>	</a>
						<ul class="nav child_menu">
							<?php if( user_can('view_booking') && !is_admin() ): ?>
							<li><a href="<?php echo site_url();?>/bookings/">List Completed clinics</a></li>
							<?php endif;?>
							
							<?php if( user_can('make_booking') && !is_admin() ): ?>
							<li><a href="<?php echo site_url();?>/add-new-booking/">Finalise Clincs</a></li>
							<?php endif;?>
						</ul>	
					</li>
					<?php endif;?>
					
					<?php if(is_admin()): ?>
					<li>
						<a><i class="fa fa-cog"></i> Setting <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo site_url();?>/general-setting/">General</a></li>
							<li><a href="<?php echo site_url();?>/manage-roles/">Manage Roles</a></li>
						</ul>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<!--<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo site_url();?>/logout/" class="link-logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>-->
		<!-- /menu footer buttons -->
	</div>
</div><!--Sidebar end-->