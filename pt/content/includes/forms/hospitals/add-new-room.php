<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

if( !user_can('add_room') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
else:
?>
	<form class="add-new-room" method="post" autocomplete="off">
		<div class="form-group">
			<label for="name">Room Name <span class="required">*</span></label>
			<input type="text" name="name" class="form-control require"/>
		</div>
		
        
		<?php if(is_admin()): ?>
		<div class="form-group">
			<label for="hostipals">Hospital <span class="required">*</span></label>
			<select name="hospital" class="form-control select_single require" tabindex="-1" data-placeholder="Choose hospital" >
				<?php
				$args = (!is_admin()) ? array('ID' => get_current_user_hospital()) : array();
				$data = get_tabledata(TBL_HOSPITALS,false,$args);
				$option_data = get_option_data($data,array('ID','name'));
				echo get_options_list($option_data);
				?>
			</select>
		</div>
		<?php else: ?>
			<input type="hidden" name="hospital" value="<?php echo get_current_user_hospital();?>" class="require"/>
		<?php endif; ?>
		<div class="ln_solid"></div>
		<div class="form-group">
			<input type="hidden" name="action" value="add_new_room"/>
			<button class="btn btn-success btn-md" type="submit">Create New Room</button>
		</div>
	</form>
<?php endif; ?>