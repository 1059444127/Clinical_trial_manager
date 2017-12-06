<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

$id = $_GET['id'];
$result = get_tabledata(TBL_HOSPITALS,true,array('ID'=>$id));
if( !user_can('edit_hospital') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!can_access('hospital', $id)):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$result):
	echo page_not_found('Oops ! Hospital Details Not Found.','Please go back and check again !');
else:
?>
	<form class="edit-hospital" method="post" autocomplete="off">
		<div class="form-group">
			<label for="name">Hospital Name <span class="required">*</span></label>
			<input type="text" name="name" class="form-control require" value="<?php echo stripslashes($result->name);?>"/>
		</div>
		<div class="form-group">
			<label for="company">Description</label>
			<textarea class="form-control" name="description" rows="5"><?php echo stripslashes($result->description);?></textarea>
		</div>
		<div class="form-group">
			<label for="rooms">Rooms</label>
			<select name="rooms[]" class="form-control select_multiple" data-placeholder="Choose Rooms" tabindex="-1" multiple="multiple">
				<?php
					$data = get_tabledata(TBL_ROOMS,false);
					$option_data = get_option_data($data,array('ID','name'));
					echo get_options_list($option_data,maybe_unserialize($result->rooms));
					?>
			</select>
		</div>
		<div class="form-group">
			<label for="trials">Trials</label>
			<select name="trials[]" class="form-control select_multiple" data-placeholder="Choose Trials" tabindex="-1" multiple="multiple">
				<?php
					$data = get_tabledata(TBL_TRIALS,false);
					$option_data = get_option_data($data,array('ID','name'));
					echo get_options_list($option_data,maybe_unserialize($result->trials));
					?>
			</select>
		</div>
        
        	<div class="form-group">
			<label for="size">Number of Clinics Available <span class="required">*</span></label>
			<input type="text" name="size" class="form-control require" value="<?php echo stripslashes($result->ClinicsNum);?>"/>
		</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<input type="hidden" name="action" value="edit_hospital"/>
			<input type="hidden" name="hospital_id" value="<?php echo $id;?>"/>
			<button class="btn btn-success btn-md" type="submit">Update Hospital</button>
		</div>
	</form>
<?php endif; ?>