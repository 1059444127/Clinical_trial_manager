<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$results = get_tabledata(TBL_USERS,false);

if(!is_admin()):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$results):
	echo page_not_found("Oops! There is no New Users in website",'  ',false);
else:
?>
	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Email</th>
                <th>Registed As</th>
                <th>Registered On</th>
				<th class="text-center">Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($results):
				foreach($results as $user):
				$admin_label = ($user->user_role == 'admin') ? '<label class="label label-success">admin</label>' : '';
			?>
			<tr>
				<td class="text-center"><img src="<?php echo get_user_profile_image($user->ID);?>" class="avatar center-block" alt="Avatar"></td>
				
                <td><?php echo stripslashes($user->first_name.' '.$user->last_name);?><?php echo ' '.$admin_label;?></td>
				
                <td><?php echo stripslashes($user->user_email);?></td>
				<td><?php 
                    $output = str_replace('_', ' ', stripslashes($user->user_role));
                    echo $output;?></td>
                <td><?php echo date('M d,Y',strtotime($user->registered_at));?></td>
				<td class="text-center">
					<label>
						<input type="checkbox" class="js-switch" <?php if($user->user_status == 1){ echo 'checked'; }?>  onClick="javascript:user_account_switch(this);" data-id="<?php echo $user->ID;?>"/>
					</label>
				</td>
				
                <td class="text-center">
					<a href="<?php echo site_url();?>/view-user/?user_id=<?php echo $user->ID;?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
					<a href="<?php echo site_url();?>/edit-user/?user_id=<?php echo $user->ID;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<a href="#" class="btn btn-danger btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $user->ID;?>" data-action="delete_user"><i class="fa fa-trash"></i> Delete</a>
				</td>
                
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
<?php endif; ?>