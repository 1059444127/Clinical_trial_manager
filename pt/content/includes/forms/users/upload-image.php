<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

?>
<div class="modal fade" id="upload-image-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title green" id="myModalLabel">Upload Profile Image</h4>
			</div>
			<form class="upload-profile-image" method="post" autocomplete="off">
				<div class="modal-body">
					<div class="form-group">
						<label for="question">Choose an image for upload<span class="required">*</span></label>
						<input type="file" name="photo" accept="image/*"/>
						<span class="help-block green">Supported image formats: jpeg, png, jpg</span>
						<span class="help-block green">Recommended profile image size: 300 x 300 pixels</span>
					</div>
					<div class="form-group">
						<div class="alert alert-success">
							<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> Image is being upload, please do not close upload box ..
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="action" value="upload_profile_image"/>	
					<!--<button class="btn btn-success" type="submit">Submit</button>-->
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>