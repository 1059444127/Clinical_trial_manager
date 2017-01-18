<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

$uid = get_current_user_id();
$user =  get_userdata($uid);
?>
<form class="edit-profile" method="post" autocomplete="off">
	<div class="row">
		<div class="form-group col-sm-6 col-xs-12">
			<label for="first_name">First Name <span class="required">*</span></label>
			<input type="text" name="first_name" class="form-control require" value="<?php echo stripslashes($user->first_name);?>"/>
		</div>
		<div class="form-group col-sm-6 col-xs-12">
			<label for="last_name">Last Name <span class="required">*</span></label>
			<input type="text" name="last_name" class="form-control require" value="<?php echo stripslashes($user->last_name);?>"/>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-6 col-xs-12">
			<label for="email">Email <span class="required">*</span></label>
			<input type="text" name="user_email" class="form-control require" value="<?php echo stripslashes($user->user_email);?>" />
		</div>
		<div class="form-group col-sm-6 col-xs-12">
			<label for="dob">Date of birth</label>
			<?php 
			$dob = trim(get_user_meta($user->ID,'dob'));
			if($dob != ''){
				$dob = date('M d, Y', strtotime($dob));
			}
			?>
			<input type="text" name="dob" class="form-control input-datepicker" readonly="readonly" value="<?php echo $dob;?>"/>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-6 col-xs-12">
			<label for="gender">Gender <span class="required">*</span></label>
			<select name="gender" class="form-control select_single require" tabindex="-1" data-placeholder="Choose a gender">
				<option value=""></option>
				<option value="Male" <?php if(trim(get_user_meta($user->ID,'gender')) == 'Male'){ echo 'selected'; } ?>>Male</option>
				<option value="Female" <?php if(trim(get_user_meta($user->ID,'gender')) == 'Female'){ echo 'selected'; } ?>>Female</option>
			</select>
		</div>
		<div class="form-group col-sm-6 col-xs-12">
			<label for="user_phone">Phone</label>
			<input type="text" name="user_phone" class="form-control" value="<?php echo get_user_meta($uid,'user_phone');?>"/>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12 col-sm-6 form-goup">
			<label>Upload Profile Image</label>
			<input  type="text" name="profile_img"  class="form-control" value="<?php echo get_user_profile_image($user->ID,false);?>" placeholder="Uploaded image url" readonly="readonly"/>
			<br/>
			<a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#upload-image-modal"><i class="fa fa-camera"></i>&nbsp;Upload Image</a>
		</div>
		<div class="col-xs-12 col-sm-6 form-group">
			<div class="profile-image-preview-box">
				<img src="<?php echo get_user_profile_image($user->ID);?>" class="img-responsive img-thumbnail" />
			</div>
		</div>
	</div>
	
	<div class="ln_solid"></div>

	<div class="form-group">
		<div>&nbsp;</div>
		<input type="hidden" name="action" value="edit_user_profile"/>
		<button class="btn btn-success btn-md" type="submit">Update Profile</button>
	</div>
</form>
<?php require_once( ABSPATH . CONTENT . '/includes/forms/users/upload-image.php'); ?>