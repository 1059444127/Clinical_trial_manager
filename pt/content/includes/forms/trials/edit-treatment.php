<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

$id = $_GET['id'];
$result = get_tabledata(TBL_TREATMENTS,true,array('ID'=>$id));

if( !user_can('edit_treatment') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!can_access('treatment', $id)):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$result):
	echo page_not_found('Oops ! Treatment Details Not Found.','Please go back and check again !');
else:
?>
	<form class="edit-treatment" method="post" autocomplete="off">
		<div class="form-group">
			<label for="name">Name <span class="required">*</span></label>
			<input type="text" name="name" class="form-control require" value="<?php echo stripslashes($result->name);?>"/>
		</div>
		<?php if(is_admin()): ?>
		<div class="form-group">
			<label for="hostipals">Hospital <span class="required">*</span></label>
			<select name="hospital" class="form-control select_single require" tabindex="-1" data-placeholder="Choose hospital" >
				<?php
				$args = (!is_admin()) ? array('ID' => get_current_user_hospital()) : array();
				$data = get_tabledata(TBL_HOSPITALS,false,$args);
				$option_data = get_option_data($data,array('ID','name'));
				echo get_options_list($option_data,array($result->hospital));
				?>
			</select>
		</div>
		<?php else: ?>
			<input type="hidden" name="hospital" value="<?php echo get_current_user_hospital();?>" class="require"/>
		<?php endif; ?>
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
			<label for="weight">Weight <span class="required">*</span></label>
			<input  type="number" name="weight" class="form-control require" value="<?php echo $result->weight;?>" min="0" max="100"/>
		</div>
        
        
        
        
        
        
        
                                        <div class = "form-group">
<label for ="color">Identification Color for Treatment <span class="required">*</span></label>
                    <select name = "colour" class="form-control dropdown-toggle">
    <option value="#FF0000" style="background: #FF0000">&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;             </option>
    <option value="#FF8000" style="background: #FF8000">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;             </option>
    <option value="#FFFF00" style="background: #FFFF00">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;             </option>
    <option value="#80FF00" style="background: #80FF00">&nbsp;&nbsp;   &nbsp;&nbsp;   &nbsp;&nbsp;             </option>
    <option value="#00FFFF" style="background: #00FFFF">&nbsp;&nbsp;   &nbsp;&nbsp;   &nbsp;&nbsp;             </option>
    <option value="#0000FF" style="background: #0000FF">&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;             </option>
    <option value="#7F00FF" style="background: #7F00FF">&nbsp;&nbsp;   &nbsp;&nbsp;   &nbsp;&nbsp;             </option>
</select>
        </div>
        
        
        
		<div class="ln_solid"></div>
		<div class="form-group">
			<input type="hidden" name="action" value="edit_treatment"/>
			<input  type="hidden" name="treatment_id" value="<?php echo $result->ID;?>"/>
			<button class="btn btn-success btn-md" type="submit">Update Treatment</button>
		</div>
	</form>
<?php endif; ?>