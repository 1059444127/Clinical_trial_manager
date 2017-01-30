$(document).ready(function() {
	
	var cnt = 10;
	
	TabbedNotification = function(options) {
		var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
		"</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

		if (!document.getElementById('custom_notifications')) {
			alert('doesnt exists');
		} else {
			$('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
			$('#custom_notifications #notif-group').append(message);
			cnt++;
			CustomTabs(options);
		}
	};

	CustomTabs = function(options) {
		$('.tabbed_notifications > div').hide();
		$('.tabbed_notifications > div:first-of-type').show();
		$('#custom_notifications').removeClass('dsp_none');
		$('.notifications a').click(function(e) {
			e.preventDefault();
			var $this = $(this),
			tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
			others = $this.closest('li').siblings().children('a'),
			target = $this.attr('href');
			others.removeClass('active');
			$this.addClass('active');
			$(tabbed_notifications).children('div').hide();
			$(target).show();
		});
	};

	CustomTabs();

	var tabid = idname = '';
	
	$(document).on('click', '.notification_close', function(e) {
		idname = $(this).parent().parent().attr("id");
		tabid = idname.substr(-2);
		$('#ntf' + tabid).remove();
		$('#ntlink' + tabid).parent().remove();
		$('.notifications a').first().addClass('active');
		$('#notif-group div').first().css('display', 'block');
	});

	$('[data-toggle="tooltip"]').tooltip(); 
	
	var handleDataTableButtons = function() {
		if ($(".datatable-buttons").length) {
			$(".datatable-buttons").DataTable({
				aaSorting : [],
				dom: "Bfrtip",
				buttons: [
					{extend: "copy",className: "btn-sm"},
					{extend: "csv",className: "btn-sm"},
					{extend: "excel",className: "btn-sm"},
					{extend: "pdfHtml5",className: "btn-sm"},
					{extend: "print",className: "btn-sm"},
					],
				responsive: true
			});
		}
	};

	TableManageButtons = function() {
		"use 	strict";
		return {
			init: function() {
				handleDataTableButtons();
			}
		};
	}();
			
	TableManageButtons.init();
	
	function initToolbarBootstrapBindings() {
		var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier','Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times','Times New Roman', 'Verdana'],
		fontTarget = $('[title=Font]').siblings('.dropdown-menu');
		$.each(fonts, function(idx, fontName) {
			fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
		});
		$('a[title]').tooltip({
			container: 'body'
		});
		$('.dropdown-menu input').click(function() {
			return false;
		})
		.change(function() {
			$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
		})
		.keydown('esc', function() {
			this.value = '';
			$(this).change();
		});

		$('[data-role=magic-overlay]').each(function() {
			var overlay = $(this),
			target = $(overlay.data('target'));
			overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
		});

		if ("onwebkitspeechchange" in document.createElement("input")) {
			var editorOffset = $('.editor-box').offset();

			$('.voiceBtn').css('position', 'absolute').offset({
				top: editorOffset.top,
				left: editorOffset.left + $('#editor').innerWidth() - 35
			});
		} else {
			$('.voiceBtn').hide();
		}
	}

        function showErrorAlert(reason, detail) {
		var msg = '';
		if (reason === 'unsupported-file-type') {
			msg = "Unsupported format " + detail;
		} else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+'<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
	}

	initToolbarBootstrapBindings();

	$('.editor-box').wysiwyg({
		fileUploadError: showErrorAlert
	});
	
	$('.editor-box').blur(function(){
		var data_id = $(this).data('id');
		var data_text = $(this).html();
		var parent_form = $(this).parents('form');
		parent_form.find('textarea#'+data_id).val(data_text);
	});

	window.prettyPrint;
	prettyPrint();
	
	$(".select_single").select2({
		allowClear: true
        });
	
	$(".select_multiple").select2({
		allowClear: true
        });
	
	$('.input-datepicker').daterangepicker({
		format: 'MMMM DD,YYYY',
		singleDatePicker: true,
		showDropdowns: true,
		calender_style: "picker_1"
	});
	  
	var url_filter = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;
	var email_filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var phone_filter = /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;
	var postcode_filter = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;
	var spinner = '&nbsp;<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>';
	
	$('.page-scroll').bind('click', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});
	
	$('form .form-control').focus(function(){
		var box = $(this).parents('.form-group');
	 	box.removeClass('has-error');
	 	return false;
	});
	
	$('form.login-form').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var formData = new FormData(this);
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 
		form.find('div.alert').slideUp();
		
		var user_name = form.find('input[name="user_name"]');
		var user_pass = form.find('input[name="user_pass"]');
		
		//  USER NAME VALIDATION
		if(user_name.val() == ''){
			user_name.parents('.form-group').addClass('has-error');
			form.find('div.alert-danger').html('<i class="fa fa-times-circle"></i>  &nbsp;<span>Please enter user name or email address</span>');
			form.find('div.alert-danger').slideDown();
			return false;
		}
		
		// USER PASSWORD VALIDATION 
		if(user_pass.val() == ''){
			user_pass.parents('.form-group').addClass('has-error');
			form.find('div.alert-danger').html('<i class="fa fa-times-circle"></i>  &nbsp;<span>Please enter your password</span>');
			form.find('div.alert-danger').slideDown();
			return false;
		}
		
		var btn = $(this).find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
				
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				console.log(res);
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				if(res == 0 ){ // if failed then go inside 
					user_pass.parents('.form-group').addClass('has-error');
					form.find('div.alert-danger').html('<i class="fa fa-times-circle"></i>  &nbsp;<span>Invalid Username or Password</span>');
					form.find('div.alert-danger').slideDown();
					return false;
				}else if(res == 2 ){
					form.find('div.alert-danger').html('<i class="fa fa-times-circle"></i>  &nbsp;<span>Your account has been disabled , please contact your company to get it re-enabled.</span>');
					form.find('div.alert-danger').slideDown();
					return false;
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					form.find('button[type="submit"]').hide();
					form.find('div.alert-success').slideDown();
					setTimeout(function(){ window.location.reload(); }, 500);
					return false;
				}else{
					
					form.find('div.alert-danger').html('<i class="fa fa-times-circle"></i>  &nbsp;<span>Could not login, please try again</span>');
					form.find('div.alert-danger').slideDown();
					return false;
				}
			}
		});
	});
	
	$('.link-logout').click(function(e){
	 	e.preventDefault();
	 	$.ajax({
	 		type : 'POST',
	 		url : ajax_url,
	 		data : { 'action' : 'logout_request' },
	 		success : function (res){
				window.location.reload();
			}
	 	});
	 });
	 
	$('form.change-password').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var current_pass = form.find('input[name="current_password"]');
		var new_pass = form.find('input[name="new_password"]');
		var repeat_pass = form.find('input[name="confirm_password"]');
		
		
		//  CURRENT PASSWORD VALIDATION
		if(current_pass.val() == ''){
			current_pass.parents('.form-group').addClass('has-error');
			alert_notification('Empty Password','Current password can\'t be empty, please enter current password !','error');
			return false;
		}
		
		//  REPEAT PASSWORD VALIDATION
		if(new_pass.val() == ''){
			new_pass.parents('.form-group').addClass('has-error');
			alert_notification('Empty Password','New password can\'t be empty, please enter new password !','error');
			return false;
		}
		
		
		//  REPEAT PASSWORD VALIDATION
		if(repeat_pass.val() == ''){
			repeat_pass.parents('.form-group').addClass('has-error');
			alert_notification('Empty Password','Repeat password can\'t be empty, please enter repeat password !','error');
			return false;
		}
		
		//  PASSWORD MATCH VALIDATION
		if(new_pass.val() != repeat_pass.val()){
			repeat_pass.parents('.form-group').addClass('has-error');
			alert_notification('Passwords don\'t match','Your password doesn\'t match with repeat password, please enter correct password !','error');
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside 
					current_pass.parents('.form-group').addClass('has-error');
					alert_notification('Invalid Password','Entered current password is invalid, please try again !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Your account password has been successfully updated.!','success');
					window.scrollTo(0,0);
					setTimeout(function(){window.location.reload();},1000);
				}else{
					alert_notification('Failed','Could not update password, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-profile').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var user_email = form.find('input[name="user_email"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});
		
		if(validation_check == 0){
				
			// USER EMAIL PATTERN VALIDATION 
			if(!email_filter.test(user_email.val()) && user_email.val() != '') {
				user_email.parents('.form-group').addClass('has-error');
				alert_notification('Invalid Email','Entered email is not valid, Please enter a valid email address !','error');
				return false;
			}
		}
		
		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update profile details, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					user_email.parents('.form-group').addClass('has-error');
					alert_notification('Email Already Exist','Email address you entered is already exists, please try another email address !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Profile details has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update profile details, Please try again !','info');	
				}
				return false;
			}
		});
	});
	
	$('form.add-new-user').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var user_email = form.find('input[name="user_email"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});
		
		if(validation_check == 0){
				
			// USER EMAIL PATTERN VALIDATION 
			if(!email_filter.test(user_email.val()) && user_email.val() != '') {
				user_email.parents('.form-group').addClass('has-error');
				alert_notification('Invalid Email','Entered email is not valid, Please enter a valid email address !','error');
				return false;
			}
		}
		
		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not create account, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					user_email.parents('.form-group').addClass('has-error');
					alert_notification('Email Already Exist','Email address you entered is already exists, please try another email address !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Account has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not create account, Please try again !','info');	
				}
				return false;
			}
		});
	});
	
	/** PHOTO UPLOAD VALIDATION **/ 
	$('form.upload-profile-image input[type="file"]').change(function(){
	 	if($(this).val() != ''){
			var file = $(this).val();
			var exten = file.split('.').pop();
			var file_match = ["JPG","jpg","jpeg","JPEG","PNG","png"];
			var form = $(this).parents('form');
			if($.inArray(exten, file_match ) == -1){
				 form.trigger('reset');
				 alert_notification('Invalid Image Format','Selected image format is not valid, please check again !','error');
				return false;
			}else{
				var filesize =$(this)[0].files[0].size;
				if(filesize > 1045505){
					form.trigger('reset');
					alert_notification('File Size Is Big','You can only upload max 1 MB image file !','error');
					return false;
				}
			}
			form.trigger('submit');
			return false;
		}
	 });
	
	/** SUBMIT PHOTO UPLOAD FORM **/  
	$('form.upload-profile-image').submit(function(e){
		e.preventDefault();
		var form = $(this);
		form.find('div.alert').fadeIn();
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				//window.location.reload();
				form.find('div.alert').fadeOut();
				if(res == 0){
					form.trigger('reset');
					alert_notification('Failed','There is some problem occured in uploading image, please try again !','error');
				}else{
					$('input[name="profile_img"]').val(res);
					$('div.profile-image-preview-box img').attr('src',site_url + res);
					form.find('button[type="button"]').trigger('click');
				}
				return false;
			}
		});
	});

	$('form.edit-user').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var user_email = form.find('input[name="user_email"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});
		
		if(validation_check == 0){
				
			// USER EMAIL PATTERN VALIDATION 
			if(!email_filter.test(user_email.val()) && user_email.val() != '') {
				user_email.parents('.form-group').addClass('has-error');
				alert_notification('Invalid Email','Entered email is not valid, Please enter a valid email address !','error');
				return false;
			}
		}
		
		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update account details, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					user_email.parents('.form-group').addClass('has-error');
					alert_notification('Email Already Exist','Email address you entered is already exists, please try another email address !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Account has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update account details, Please try again !','info');	
				}
				return false;
			}
		});
	});

	$('.generate-password').click(function(){
		var btn = $(this);
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: {
				'action' : 'generate_password',
			},
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				$('form.edit-user input[name="user_pass"]').val(res);
			}
		});
	});

	$('form.add-new-hospital').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not create new hospital, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Hospital Already Exist','Hospital name you entered is already exists, please try another hospital name !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Hospital has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not create new hospital, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-hospital').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 	
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update hospital, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Hospital Already Exist','Hospital name you entered is already exists, please try another hospital name !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Hospital has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update hospital, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.add-new-room').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not create new room, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Room Already Exist','Room name you entered is already exists, please try another room name !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Room has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not create new room, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-room').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 	
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update room, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Room Already Exist','Room name you entered is already exists, please try another room name !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Room has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update room, Please try again !','info');
				}
				return false;
			}
		});
	});
	
	$('form.add-new-trial').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not create new trial, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Trial Already Exist','Trial name you entered is already exists, please try another trial name !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Trial has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not create new trial, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-trial').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 	
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update trial, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Trial Already Exist','Trial name you entered is already exists, please try another trial name !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Trial has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update trial, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.add-new-clinic').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
                    form.trigger('reset');
					alert_notification('Success !','Clinic has been successfully created !','success');
					window.scrollTo(0,0);
//					alert_notification('Failed','Could not create new clinic, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Clinic Already Exist','Clinic name you entered is already exists, please try another clinic name !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Clinic has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					form.trigger('reset');
					alert_notification('Success !','Clinic has been successfully created !','success');
					window.scrollTo(0,0);
                    //					alert_notification('Failed','Could not create new clinic, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-clinic').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 	
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update clinic, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Clinic Already Exist','Clinic name you entered is already exists, please try another clinic name !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Clinic has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update clinic, Please try again !','info');
				}
				return false;
			}
		});
	});
	
	$('form.add-new-treatment').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not create new treatment, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Treatment Already Exist','Treatment name you entered is already exists, please try another treatment name !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Treatment has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not create new treatment, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-treatment').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 	
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update treatment, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Treatment Already Exist','Treatment name you entered is already exists, please try another treatment name !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Treatment has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update treatment, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.add-new-trial-type').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 		
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not create new trial-type, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Trial Type Already Exist','Trial Type name you entered is already exists, please try another trial type name !','info');
				}else if (res == 1 ){ // if success then go inside
					form.trigger('reset');
					alert_notification('Success !','Trial Type has been successfully created !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not create new trial type, Please try again !','info');
				}
				return false;
			}
		});
	});

	$('form.edit-trial-type').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 	
		var class_name = form.find('input[name="name"]');
		
		form.find('.require').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not update trial type, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					class_name.parents('.form-group').addClass('has-error');
					alert_notification('Trial Type Already Exist','Trial Type name you entered is already exists, please try another trial type name !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Trial Type has been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not update trial type, Please try again !','info');
				}
				return false;
			}
		});
	});
	
	$('form.general-setting').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 
		form.find('.require').each(function(){
			if($(this).val() == ''){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not saved settings, Please try again !','info');
				}else if(res == 2 ){ // if failed then go inside
					alert_notification('Email Already Exist','Email addess you entered is already exists, please try another email address !','info');
				}else if (res == 1 ){ // if success then go inside
					//form.trigger('reset');
					alert_notification('Success !','Settings have been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not saved settings, Please try again !','info');
				}
				return false;
			}
		});
	});
	
	$('form.manage-roles').submit(function(e){
		e.preventDefault();
		
		var form = $(this);
		var validation_check = 0;
		$('.form-group').removeClass('has-error'); // remove class from form control which show error (red) color 
		form.find('.require').each(function(){
			if($(this).val() == ''){
				$(this).parents('.form-group').addClass('has-error');
				validation_check = 1;
			}
		});

		if(validation_check == 1){
			alert_notification('Form Validation Errors','Highlighted fields are required or have some validation errors. Please check and try again !','error');
			window.scrollTo(0,0);
			return false;
		}
		
		var btn = form.find('button[type="submit"]');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				
				if(res == 0 ){ // if failed then go inside
					alert_notification('Failed','Could not saved settings, Please try again !','info');
				}else if (res == 1 ){ // if success then go inside
					alert_notification('Success !','Settings have been successfully updated !','success');
					window.scrollTo(0,0);
				}else{
					alert_notification('Failed','Could not saved settings, Please try again !','info');
				}
				return false;
			}
		});
	});
	
	$('.read-notification').click(function(){
		var btn = $(this);
		var id = btn.data('id');
		var type = btn.data('type');
		var btn_text = btn.html();
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: {
				'action' : 'read_notification',
				'id' : id,
				'type' : type
			},
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				console.log(res);
				if (res == 1 ){ // if success then go inside
					if(type == 'all'){
						setTimeout(function(){ window.location.reload();},1000);
						return false;
					}
					btn.parents('li').removeClass('unread');
				}
			}
		});
	});

	$('.hide-notification').click(function(e){
		e.preventDefault();
		var btn = $(this);
		var id = btn.data('id');
		var btn_text = btn.html();
		var type = btn.data('type');
		btn.html(btn_text+spinner);
		btn.attr('disabled',true);
		
		// MAKE AJAX PROCESS 
		$.ajax({ 
			type : 'POST',
			data: {
				'action' : 'hide_notification',
				'id' : id,
				'type' : type
			},
			url  : ajax_url,
			success : function(res){
				btn.attr('disabled',false);
				btn.html(btn_text);
				if (res == 1 ){ // if success then go inside
					if(type == 'all'){
						setTimeout(function(){ window.location.reload();},1000);
						return false;
					}
					btn.parents('li').remove();
				}
			}
		});
	});
	
});


function delete_function(btn){
	var isDelete = confirm('Are you sure you want to delete this record?');
	if(isDelete == false){
		return false;
	}
	var spinner = '&nbsp;<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>';
	var btn = $(btn);
	var id = btn.data('id');
	var action = btn.data('action');
	var hide = btn.data('hide');
	var  process= btn.data('process');
	
	btn_text = btn.html();
	btn.html(btn_text+spinner);
	btn.attr('disabled',true);
	
	$.ajax({ 
		type : 'POST',
		data: {
			'action' : action,
			'id' : id
		},
		url  : ajax_url,
		success : function(res){
			console.log(res);
			if(res == 1){
				if(hide == '1'){
					if(process == 'booking'){
						alert_notification('Success !','Clinic confirmation has been successfully cancelled !','success');
						setTimeout(function(){ window.location.reload();},1000);
					}
				}else{
					alert_notification('Success !','Record has been deleted successfully !','success');
					btn.parents('tr').remove();
				}
					
			}else{
				btn.attr('disabled',false);
				btn.html(btn_text);
			}
		}
	});
	
}






function filter_user_name(value){
	var check = 0;
	var username_filter = [","," ","/","@","#","$","%","^","&","*","(",")","+","=","\\","|","{","}","[","]",";",":"];
	for(var i = 0; i< username_filter.length; i++){
		if(value.indexOf(username_filter[i]) >= 0){
			check = 1;
		}
	}	
	return check;
}

function alert_notification(Title,Text, Type, Class){
	$('.ui-pnotify-closer').trigger('click');
	new PNotify({
		title: Title,
		text: Text,
		type: Type,
		styling: 'bootstrap3',
		addclass : Class
	});
}

function user_account_switch(btn){
	var id = $(btn).data('id');
	if($(btn).is(':checked')){
		var status = 1;
	}else{
		var status = 0;
	}
	$.ajax({ 
		type : 'POST',
		data: {
			'action' : 'user_account_status_change',
			'id' : id,
			'status' : status,
		},
		url  : ajax_url,
		success : function(res){	
			if(res == 0 ){ // if failed then go inside
				alert_notification('Failed','Could not update user account status, Please try again !','info');
				setTimeout(function(){ window.location.reload();},1000);
			}else if (res == 1 ){ // if success then go inside
				alert_notification('Success !','User account status successfully udpated !','success');	
			}else{
				alert_notification('Failed','Could not update user account status, Please try again !','info');
				setTimeout(function(){ window.location.reload();},1000);
			}
			return false;
		}
	});
}

function get_available_clinics(_date){
	var spinner = '<i class="fa fa-circle-o-notch fa-spin fa-5x" aria-hidden="true"></i>';
	$('#booking_modal').html('<h1 class="text-center green">'+spinner+'</h1>');
	$.ajax({ 
		type : 'POST',
		data: {
			'action' : 'fetch_available_clinics',
			'date' : _date
		},
		url  : ajax_url,
		success : function(res){
			$('#booking_modal').html(res);
			return false;
		}
	});
}

function book_clinic(btn){
    var lala = $('form').serialize();
    var new12 = lala.replace(/[^0-9]/g, '');
console.log("NUM: = " + new12);
    
    
    var _this = $(btn);
	var spinner = '<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> Processing';
	var clinic_id = _this.data('id');
	var btn_text = _this.html();
	_this.html(spinner);
	$('.booking-btn').attr('disabled',true);
	$.ajax({ 
		type : 'POST',
		data: {
			'action' : 'add_new_booking',
			'clinic' : clinic_id,
            'number' : new12
            
		},
		url  : ajax_url,
		success : function(res){
			
			_this.html(btn_text);
			$('.booking-btn').attr('disabled',false);
			if(res == 0 ){ // if failed then go inside
				alert_notification('Failed','Could not Close clinic, please try again','info');
			}else if(res == 2 ){ // if failed then go inside
				alert_notification('Failed','You have already closed this Clinic','info');
			}else if (res == 1 ){ // if success then go inside
				alert_notification('Success !','Clinic has been closed!','success');
				$('.booking_close').click();
			}else{
				alert_notification('Failed','Could not Close clinic, Please try again !','info');
				console.log(res);
			}
			return false;
		}
	});
}

