<?php 
// if accessed directly than exit
if (!defined('ABSPATH')){
    exit;
}

?>
<form class="change-password" method="post" autocomplete="off">
	<div class="form-group">
		<label for="current_password">Current Password <span class="required">*</span></label>
		<input type="password" name="current_password" class="form-control required"/>
	</div>
	<div class="form-group">
		<label for="new_password">New Password <span class="required">*</span></label>
		<input type="password" name="new_password" class="form-control required"/>
	</div>
	<div class="form-group">
		<label for="confirm_password">Confirm Password <span class="required">*</span></label>
		<input type="password" name="confirm_password" class="form-control required"/>
	</div>
	<div class="ln_solid"></div>
	<div class="form-group">
		<input type="hidden" name="action" value="user_password_change"/>
		<button class="btn btn-success btn-md" type="submit">Change Password</button>
	</div>
</form>