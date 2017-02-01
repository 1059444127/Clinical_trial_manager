<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

if(!is_admin()):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
else:
?>
	<form class="add-new-user" method="post" autocomplete="off">
		<div class="row">
			<div class="form-group col-sm-6 col-xs-12">
				<label for="first_name">First Name <span class="required">*</span></label>
				<input type="text" name="first_name" class="form-control require"/>
			</div>
			<div class="form-group col-sm-6 col-xs-12">
				<label for="last_name">Last Name <span class="required">*</span></label>
				<input type="text" name="last_name" class="form-control require"/>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-6 col-xs-12">
				<label for="email">Email <span class="required">*</span></label>
				<input type="text" name="user_email" class="form-control require"/>
			</div>
			<div class="form-group col-sm-6 col-xs-12">
				<label for="dob">Date of birth</label>
				<input type="text" name="dob" class="form-control input-datepicker" readonly="readonly"/>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-6 col-xs-12">
				<label for="gender">Gender <span class="required">*</span></label>
				<select name="gender" class="form-control select_single require" tabindex="-1" data-placeholder="Choose a gender">
					<option value=""></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="form-group col-sm-6 col-xs-12">
				<label for="phone">Phone</label>
				<input type="text" name="user_phone" class="form-control"/>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-6 col-xs-12">
				<label for="company">Role <span class="required">*</span></label>
				<select name="user_role" class="form-control select_single require" tabindex="-1" data-placeholder="Choose role">
					<?php echo get_options_list(get_roles()); ?>
				</select>
			</div>
			<div class="form-group col-sm-6 col-xs-12">
				<label for="hostipals">Hospital <span class="required">*</span></label>
				<select name="hospital" class="form-control select_single require" tabindex="-1" data-placeholder="Choose hospital" >
					<?php
					$data = get_tabledata(TBL_HOSPITALS,false);
					$option_data = get_option_data($data,array('ID','name'));
					echo get_options_list($option_data);
					?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6 form-goup">
				<label>Upload Profile Image</label>
				<input  type="text" name="profile_img"  class="form-control" value="" placeholder="Uploaded image url" readonly="readonly"/>
				<br/>
				<a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#upload-image-modal"><i class="fa fa-camera"></i>&nbsp;Upload Image</a>
			</div>
			<div class="col-xs-12 col-sm-6 form-group">
				<div class="profile-image-preview-box">
					<img src="" class="img-responsive img-thumbnail" />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-sm-6 col-xs-12">
				<label for="">Disable Account</label>
				<br/>
				<div class="radio-inline">
					<label>
						<input type="radio" class="flat" name="user_status" value="0" > Yes
					</label>
				</div>
				<div class="radio-inline">
					<label>
						<input type="radio" class="flat" name="user_status" value="1" checked> No
					</label>
				</div>
			</div>
		</div>
		
		<div class="ln_solid"></div>

		<div class="form-group">
			<input type="hidden" name="action" value="add_new_user"/>
			<button class="btn btn-success btn-md" type="submit">Add New User</button>
		</div>
	</form>
	<?php require_once( ABSPATH . CONTENT . '/includes/forms/users/upload-image.php'); ?>
<?php endif; ?>