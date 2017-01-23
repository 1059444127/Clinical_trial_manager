<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

if(!is_admin()):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
else:
?>
	<form class="add-new-hospital" method="post" autocomplete="off">
		<div class="form-group">
			<label for="name">Hospital Name <span class="required">*</span></label>
			<input type="text" name="name" class="form-control require"/>
		</div>
		<div class="form-group">
			<label for="company">Description</label>
			<textarea class="form-control" name="description" rows="5"></textarea>
		</div>
		<div class="form-group">
			<label for="company">Rooms</label>
			<select name="rooms[]" class="form-control select_multiple" data-placeholder="Choose Rooms" tabindex="-1" multiple="multiple">
				<?php
					$data = get_tabledata(TBL_ROOMS,false);
					$option_data = get_option_data($data,array('ID','name'));
					echo get_options_list($option_data);
					?>
			</select>
		</div>
        
        
        
		<div class="form-group">
			<label for="trials">Trials</label>
			<select name="trials[]" class="form-control select_multiple" data-placeholder="Choose Trials" tabindex="-1" multiple="multiple">
				<?php
					$data = get_tabledata(TBL_TRIALS,false);
					$option_data = get_option_data($data,array('ID','name'));
					echo get_options_list($option_data);
					?>
			</select>
		</div>
        
  
        
        		<div class="form-group">
			<label for="size">Number of Clinics Available <span class="required">*</span></label>
			<input type="text" name="size" class="form-control require"/>
		</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<input type="hidden" name="action" value="add_new_hospital"/>
			<button class="btn btn-success btn-md" type="submit">Create New Hospital</button>
		</div>
	</form>
<?php endif; ?>