<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$args = array('clinic' => $_REQUEST['id']);
$results = get_tabledata(TBL_BOOKINGS,false,$args);

if(!isset( $_REQUEST['id'] ) && $_REQUEST['id'] == '' ):
	echo page_not_found("Oops! There is no appointments record found",'  ',false);
elseif( !user_can('view_clinic') || !can_access('clinic',$_REQUEST['id']) ):
	echo page_not_found('You are not allowed to view this page.','Please contact an Admin if you require access !');
elseif(!$results):

	echo page_not_found("There are no appointments found",'  ',false);
else:
?>
	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Booking ID</th>
				<th>User Name</th>
				<th>User Email</th>
				<th>Status</th>
				<th>Booked On</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($results):
				foreach($results as $data):
				$user = get_userdata($data->user_id);
			?>
			<tr>
				<td>#<?php echo stripslashes($data->ID);?></td>
				<td><?php echo stripslashes($user->first_name .' '. $user->last_name);?></td>
				<td><?php echo stripslashes($user->user_email);?></td>
				<td><?php echo ($data->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Canceled</span>'; ?></td>
				<td><?php echo date('M d,Y',strtotime($data->created_on));?></td>
				<td class="text-center">
					<?php if($data->status == 1 && user_can('cancel_booking') ): ?>
					<a href="#" class="btn btn-dark btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="cancel_booking" data-hide="1" data-process="booking"><i class="fa fa-close"></i>&nbsp; Cancel</a>
					<?php endif; ?>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
<?php endif; ?>
