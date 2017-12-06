<?php 
// if accessed directly than exit
if (!defined('ABSPATH')){
    exit;
}

if(!is_admin()):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
else:
	$users_capabilities = unserialize(get_option('users_capabilities'));
	$all_capabilities = all_users_capabilities();
?>

<form class="manage-roles" method="post" autocomplete="off">
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th rowspan="2" class="text-center">Capabilities</th>
					<th class="text-center" colspan="3">Roles</th>
				</tr>
				<tr>
					<th class="text-center">Site Manager</th>
					<th class="text-center">Trial Manager</th>
					<th class="text-center">Data Manager</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($all_capabilities as $key => $data): ?>
				<tr class="text-center">
					<td class="text-left"><?php echo stripslashes($data);?></td>
					<td><input type="checkbox" class="flat" value="1" name="site_manager_<?php echo $key;?>" <?php echo ($users_capabilities['site_manager'][$key] == 1) ? 'checked' : ''; ?>></td>
					<td><input type="checkbox" class="flat" value="1" name="trial_manager_<?php echo $key;?>" <?php echo ($users_capabilities['trial_manager'][$key] == 1) ? 'checked' : ''; ?>></td>
					<td><input type="checkbox" class="flat" value="1" name="staff_<?php echo $key;?>" <?php echo ($users_capabilities['staff'][$key] == 1) ? 'checked' : ''; ?>></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<div class="ln_solid"></div>
	<div class="form-group">
		<input type="hidden" name="action" value="manage_roles"/>
		<button class="btn btn-success btn-md" type="submit">Update Capabilities</button>
	</div>
</form>

<?php endif; ?>