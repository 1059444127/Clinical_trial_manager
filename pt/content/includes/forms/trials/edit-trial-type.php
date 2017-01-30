<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

$id = $_GET['id'];
$result = get_tabledata(TBL_TRIAL_TYPES,true,array('ID'=>$id));

if( !user_can('edit_trial_type') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!can_access('trial_type', $id)):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$result):
	echo page_not_found('Oops ! Trial Type Details Not Found.','Please go back and check again !');
else:
?>
	<form class="edit-trial-type" method="post" autocomplete="off">
		<div class="form-group">
			<label for="name">Name <span class="required">*</span></label>
			<input type="text" name="name" class="form-control require" value="<?php echo stripslashes($result->name);?>"/>
		</div>
		<div class="form-group">
			<label for="company">Description</label>
			<textarea class="form-control" name="description" rows="5"><?php echo stripslashes($result->description);?></textarea>
		</div>
		<?php if(is_admin()): ?>
		<?php else: ?>
			<input type="hidden" name="hospital" value="<?php echo get_current_user_hospital();?>" class="require"/>
		<?php endif; ?>
		<div class="ln_solid"></div>
		<div class="form-group">
			<input type="hidden" name="action" value="edit_trial_type"/>
			<input type="hidden" name="trial_type_id" value="<?php echo $id;?>"/>
			<button class="btn btn-success btn-md" type="submit">Update Trial Type</button>
		</div>
	</form>
<?php endif; ?>