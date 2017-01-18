<?php
/**
*Topbar with page name for all pages
*/
if ( !defined('ABSPATH') ) exit();

global $db;
$current_user_id = get_current_user_id();
$args = array('user_id' => $current_user_id,'hide' => 0 , 'read' => 0);
$query = " ORDER BY `ID` DESC LIMIT 0, 5";
$result = get_tabledata(TBL_NOTIFICATIONS,false,$args,$query);
?>

<div class="top_nav">
	<div class="nav_menu">
		<nav class="" role="navigation">
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
				 	<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo get_current_user_profile_image();?>" alt=""><?php echo get_current_user_name();?>
						<span class=" fa fa-angle-down"></span>
					</a>
					 <ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="<?php echo site_url();?>/profile/">  Profile</a></li>
						<li><a href="<?php echo site_url();?>/change-password/">  Change Password</a></li>
						<li><a href="javascript:;">Help</a></li>
						<li><a href="<?php echo site_url();?>/logout/" class="link-logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					</ul>
				</li>

				<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<?php 
						$notifications_count = get_unread_notification_count();
						if($notifications_count != ''):
						?>
							<span class="badge bg-green"><?php echo $notifications_count;?></span>
						<?php endif; ?>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
					<?php
						if($result): 
						foreach($result as $notifications):
					?>
						<li>
							 <a>
								<span class="image">
									<img src="<?php echo get_user_profile_image($notifications->user_id);?>" alt="Profile Image" />
									</span>
								<span>
									<span>You</span>
									<span class="time"><small><?php echo date('M d, Y h:i a',strtotime($notifications->date));?></small></span>
								</span>
								<span class="message"><?php echo strip_tags(stripslashes(htmlspecialchars_decode($notifications->notification)));?></span>
							</a>
						</li>
					<?php endforeach; ?>
					<li>
						<div class="text-center">
							<a href="<?php echo site_url();?>/notifications/">
								<strong>See All Notifications</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</li>
					<?php else: ?>
						<li><h5 class="text-uppercase">There is no new notifications</h5></li>
					<?php endif; ?>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
  </div>