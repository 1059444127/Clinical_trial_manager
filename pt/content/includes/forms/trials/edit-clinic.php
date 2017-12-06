<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

$id = $_GET['id'];
$result = get_tabledata(TBL_CLINICS,true,array('ID'=>$id));

if( !user_can('edit_clinic') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!can_access('clinic', $id)):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$result):
	echo page_not_found('Oops ! Clinic Details Not Found.','Please go back and check again !');
else:
?>
	<form class="edit-clinic" method="post" autocomplete="off">
		<div class="form-group">
			<label for="hospital">Hospital <span class="required">*</span></label>
			<select name="hospital" class="form-control select_single require" data-placeholder="Choose Hospital" tabindex="-1">
				<?php
					$args = (!is_admin()) ? array('ID' => get_current_user_hospital()) : array();
					$data = get_tabledata(TBL_HOSPITALS,false,$args);
					$option_data = get_option_data($data,array('ID','name'));
					echo get_options_list($option_data,maybe_unserialize($result->hospital));
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="trial">Trial <span class="required">*</span></label>
			<select name="trial" class="form-control select_single require" data-placeholder="Choose Trial" tabindex="-1">
				<?php
					$args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
					$data = get_tabledata(TBL_TRIALS,false,$args);
					$option_data = get_option_data($data,array('ID','name'),true);
					echo get_options_list($option_data,maybe_unserialize($result->trial));
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="room">Room <span class="required">*</span></label>
			<select name="room" class="form-control select_single require" data-placeholder="Choose Room" tabindex="-1">
				<?php
					$args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
					$data = get_tabledata(TBL_ROOMS,false,$args);
					$option_data = get_option_data($data,array('ID','name'),true);
					echo get_options_list($option_data,maybe_unserialize($result->room));
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="schedule">Schedule Date <span class="required">*</span></label>
			<input type="text" name="schedule" class="form-control input-datepicker require" readonly="readonly" value="<?php echo date('M d, Y', strtotime($result->schedule));?>"/>
		</div>
        
        	<div class="form-group">
				<label for="first_name">Expected No. of Participants <span class="required">*</span></label>
				<input type="text" name="expected" class="form-control require" value="<?php echo ($result->expected);?>"/>
			</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<input type="hidden" name="action" value="edit_clinic"/>
			<input type="hidden" name="clinic_id" value="<?php echo $id;?>"/>
			<button class="btn btn-success btn-md" type="submit">Update Clinic</button>
		</div>
	</form>
<?php endif; ?>