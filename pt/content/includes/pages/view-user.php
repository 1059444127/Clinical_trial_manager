<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$uid = $_GET['user_id'];
$user =  get_userdata($uid);
if(!is_admin()):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$user):
	echo page_not_found('Oops ! User Details Not Found.','Please go back and check again !');
else:
?>
	<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
		<div class="profile_img">
			<div id="crop-avatar">
				<!-- Current avatar -->
				<img class="img-responsive avatar-view" src="<?php echo get_user_profile_image($uid);?>" alt="Avatar">
			</div>
		</div>
		
		<h3><?php echo $user->first_name.' '.$user->last_name;?></h3>

		<ul class="list-unstyled user_data">
			<li><i class="fa fa-envelope-o"></i> <?php echo stripslashes($user->user_email);?></li>
			<?php if(get_user_meta($user->ID,'gender') == 'Male'): ?>
				<li><i class="fa fa-male"></i> Male</li>
			<?php elseif(get_user_meta($user->ID,'gender') == 'Female'): ?>
				<li><i class="fa fa-female"></i> Female</li>
			<?php endif; ?>
			<?php if(get_user_meta($uid,'user_phone') != ''): ?>
				<li><i class="fa fa-phone"></i> <?php echo get_user_meta($uid,'user_phone');?></li>
			<?php endif; ?>
			<li class="m-top-xs">
				<i class="fa fa-child"></i>
				<?php echo date('M d,Y',strtotime(get_user_meta($user->ID,'dob')));?>
			</li>
		</ul>

		<br />
		<a class="btn btn-success btn-sm" href="<?php echo site_url();?>/edit-user/?user_id=<?php echo $uid;?>">
			<i class="fa fa-edit m-right-xs"></i>&nbsp;Edit User
		</a>
	</div>

	<div class="col-md-9 col-sm-9 col-xs-12">
		<div class="profile_title">
			<div class="col-md-6">
				<h2>User Activity Report</h2>
			</div>
			
		</div>
		
		<div class="" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab_content1" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
				</li>
				<li role="presentation" class=""><a href="#tab_content2" role="tab" data-toggle="tab" aria-expanded="false">Recent Access Log</a>
				</li>
			</ul>
		
			<?php
			$args = array('user_id' => $uid,'hide' => 0 , 'read' => 0);
			$query = " ORDER BY `ID` DESC LIMIT 0, 5";
			$result = get_tabledata(TBL_NOTIFICATIONS,false,$args,$query);
			?>
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
					<!-- start recent activity -->
					<ul class="messages list-unstyled">
						<?php 
						if($result): 
							foreach($result as $notifications):
								$user = get_user_by('id',$notifications->user_id);
						?>
						<li>
							<img src="<?php echo get_user_profile_image($notifications->user_id);?>" class="avatar" alt="Avatar">
							<div class="message_date">
								<h3 class="date text-info"><?php echo date('d',strtotime($notifications->date));?></h3>
								<p class="month"><?php echo date('M',strtotime($notifications->date));?></p>
							</div>
							<div class="message_wrapper">
								<h4 class="heading"><?php echo $notifications->title;?> <small><?php echo date('M d, Y h:i a',strtotime($notifications->date));?></small></h4>
								<blockquote class="message"><?php echo stripslashes(htmlspecialchars_decode($notifications->notification));?></blockquote>
								<br />
							</div>
						</li>
							<?php endforeach; ?>
						<?php else: ?>
							<li><h5>There is no recent activity details</h5></li>
						<?php endif; ?>
					</ul>
					<!-- end recent activity -->
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
					<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Last Login</th>
								<th>Location</th>
								<th>Device</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$args = array('user_id' => $uid);
							$query = " ORDER BY `ID` DESC LIMIT 0, 10";
							$result = get_tabledata(TBL_ACCESS_LOG,false,$args,$query);
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

<?php endif; ?>