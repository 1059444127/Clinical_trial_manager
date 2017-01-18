<?php 
// if accessed directly than exit
if (!defined('ABSPATH')){
    exit;
}

if(!is_admin()):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
else:
?>

<form class="general-setting" method="post" autocomplete="off">

	<div class="form-group">
		<label for="site_name">Website Name <span class="required">*</span></label>
		<input type="text" name="site_name" class="form-control require" value="<?php echo get_site_name();?>" placeholder="E.g. : Website Name"/>
	</div>
	<div class="form-group">
		<label for="site_name">WebsiteDescription <span class="required">*</span></label>
		<input type="text" name="site_description" class="form-control require" value="<?php echo get_site_description();?>" placeholder="E.g. : The earth is spinning"/>
	</div>
	<div class="form-group">
		<label for="admin_email">Admin Email <span class="required">*</span></label>
		<input type="text" name="admin_email" class="form-control require" value="<?php echo get_option('admin_email');?>" placeholder="E.g. : johndoe@example.com"/>
	</div>
	<div class="form-group">
		<label for="admin_email">Website Contact Email <span class="required">*</span></label>
		<input type="text" name="site_contact_email" class="form-control require" value="<?php echo get_option('site_contact_email');?>" placeholder="E.g. : johndoe@example.com"/>
		<span class="help-block">This email will be used in email templete in footer information.</span>
	</div>
	<div class="form-group">
		<label for="admin_email">Website Contact Phone<span class="required">*</span></label>
		<input type="text" name="site_contact_phone" class="form-control require" value="<?php echo get_option('site_contact_phone');?>" placeholder="E.g. : 0123456789"/>
		<span class="help-block">This phone number will be used in email templete in footer information.</span>
	</div>
	<div class="form-group">
		<label for="admin_email">Website Domain Url<span class="required">*</span></label>
		<input type="text" name="site_domain" class="form-control require" value="<?php echo get_option('site_domain');?>" placeholder="E.g. : www.example.com"/>
		<span class="help-block">This url will be used in email templete in footer information.</span>
	</div>
	<div class="ln_solid"></div>
	<div class="form-group">
		<input type="hidden" name="action" value="update_general_setting"/>
		<button class="btn btn-success btn-md" type="submit">Save Setting</button>
	</div>
</form>

<?php endif; ?>