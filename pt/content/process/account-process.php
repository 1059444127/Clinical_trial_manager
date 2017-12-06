<?php
	
	$website_link_shortcode = '<a href="'.site_url().'" target="_blank" style="color:#26B99A;text-decoration:none;">'.get_site_name().'</a>';
	$login_url_shortcode = '<a href="'.site_url().'/login/" target="_blank" style="color:#26B99A;text-decoration:none;">Click here for login url</a>';
	$contact_url_shortcode = '<a href="'.site_url().'/contact/" target="_blank" style="color:#26B99A;text-decoration:none;">click here</a>';
	$current_time_shortcode = date('M d, Y h:i A');
	$admin_email_shortcode = get_option('admin_email');
	$no_reply_email_shortcode = 'no-reply@example.com';

	$upload_str = '/uploads/profile_images/'.date('Y').'/'.date('m').'/';
	$upload_img = ABSPATH . CONTENT . $upload_str;
	$upload_url = '/content/'.$upload_str;
	if (!file_exists($upload_img))

		
	//CHANGE PASSWORD PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'user_password_change'){
		extract($_POST);
		$current_user_id = get_current_user_id();
		$password = set_password($current_password);	
		$args = array('ID' => $current_user_id, 'user_pass' => $password);
		$check = get_tabledata(TBL_USERS,true,$args);
		if($check):
			$user = get_userdata($current_user_id);
			$new_password = set_password($new_password);		
			$db->update(TBL_USERS,array('user_pass' => $new_password),array('ID' => $current_user_id));
			update_user_meta($current_user_id,'reset_password',0);
			
			$notification_args = array(
				'title' => 'Password Changed',
				'notification' => 'You have successfully changed your account password.',
			);
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;		
		endif;
		
		exit;		
	}
	
	//UPDATE PROFILE  PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_user_profile'){
		extract($_POST);
		
		$uid = get_current_user_id();
		$user = get_userdata($uid);
		$check = false;
		
		if(is_value_exists(TBL_USERS,array('user_email' => $user_email),$uid)){
			echo 2;
			exit();
		}
		
		if($user->first_name == $first_name && $user->last_name == $last_name){
			$check = true;
		}else{
			$result = $db->update(TBL_USERS,
				array(
					'first_name' => $first_name,
					'last_name' => $last_name,
				),
				array('ID' => $uid)
			);
			
			$check = ($result) ? true : false;
		}
			
		if($check):
			update_user_meta($uid,'gender',$gender);
			update_user_meta($uid,'dob',date('Y-m-d h:i:s',strtotime($dob) ) );
			update_user_meta($uid,'user_phone',$user_phone);
			update_user_meta($uid,'profile_img',$profile_img);
			$notification_args = array(
				'title' => 'Account Details Updated',
				'notification' => 'You have successfully update your account details.',
			);
			add_user_notification($notification_args);
			
			/*$email_template_data = get_email_template_data('edit-profile-email');
			
			$email_subject = $email_template_data->subject;
			$email_body = $email_template_data->message;
			
			$email_body = get_replaced_string('{{user_name}}',ucfirst($first_name).' '.ucfirst($last_name),$email_body);
			$email_body = get_replaced_string('{{current_time}}',$current_time_shortcode,$email_body);
			$email_body = get_replaced_string('{{contact_link}}',$contact_url_shortcode,$email_body);
			
			$content = get_simple_email_content($email_body);
			$body = get_email_body($content);
			
			//send email
			send_email($admin_email_shortcode,get_site_name(),$no_reply_email_shortcode,$user_email,$email_subject,$body);*/
			
			echo 1;
		else:
			echo 0;
		endif;
		exit;		
	}

	//ADD NEW ADMIN PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_user'){
		extract($_POST);		
		if(is_admin()):
			if(email_exists($user_email)){
				echo 2;
				exit();
			}
			
			$user_pass = "password";
			$guid = get_guid(TBL_USERS);
			$result = $db->insert(TBL_USERS,
				array(
					'ID' => $guid,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'user_email' => $user_email,
					'user_role' => $user_role,
					'user_status' => 1,
					'user_pass' => set_password($user_pass),
					'hospital' => $hospital,
				)
			);
			if($result):
				$uid = $guid;
				update_user_meta($uid,'gender',$gender);
				update_user_meta($uid,'dob',date('Y-m-d h:i:s',strtotime($dob) ) );
				update_user_meta($uid,'user_phone',$user_phone);
				update_user_meta($uid,'profile_img',$profile_img);
				$notification_args = array(
					'title' => 'New Admin Account Created',
					'notification' => 'You have successfully created a new admin account ('.ucfirst($first_name).' '.ucfirst($last_name).').',
				);
				add_user_notification($notification_args);
				
				/*$email_template_data = get_email_template_data('new-user-email');
				
				$email_subject = $email_template_data->subject;
				$email_body = $email_template_data->message;
				
				$email_body = get_replaced_string('{{user_name}}',ucfirst($first_name).' '.ucfirst($last_name),$email_body);
				$email_body = get_replaced_string('{{created_by}}',get_created_by(),$email_body);
				$email_body = get_replaced_string('{{user_role}}','Admin',$email_body);
				$email_body = get_replaced_string('{{website_link}}',$website_link_shortcode,$email_body);
				$email_body = get_replaced_string('{{user_email}}',$user_email,$email_body);
				$email_body = get_replaced_string('{{user_password}}',$user_pass,$email_body);
				$email_body = get_replaced_string('{{login_url}}',$login_url_shortcode,$email_body);
				
				$content = get_simple_email_content($email_body);
				$body = get_email_body($content);
				
				//send email
				send_email($admin_email_shortcode,get_site_name(),$no_reply_email_shortcode,$user_email,$email_subject,$body);
				*/
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit;		
	}

	//UPDATE ADMIN ACCOUNT PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_user'){
		extract($_POST);
		if(is_admin()):
			$user = get_userdata($user_id);
			if(is_value_exists(TBL_USERS,array('user_email' => $user_email),$user_id)){
				echo 2;
				exit();
			}
		
			$check = false;
			if($user->first_name == $first_name && $user->last_name == $last_name && $user->user_email == $user_email && $user->user_status == $user_status && $user->user_role == $user_role && $user->hospital == $hospital){
				$check = true;
			}else{
				$result = $db->update(TBL_USERS,
					array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'user_email' => $user_email,
						'user_status' => $user_status,
						'user_role' => $user_role,
						'hospital' => $hospital,
					),
					array('ID' => $user_id)
				);
				$check = ($result) ? true : false;
			}
			
			$result1 = false;
			if($user_pass != ''){
				$result1 = $db->update(TBL_USERS,array('user_pass' => set_password($user_pass)),array('ID' => $user_id));
			}
			$check = ($result1) ? true : $check;
			if($result1){
				//update_user_meta($user_id,'reset_password',1);
				$notification_args = array(
					'title' => 'Admin Account Password Reset',
					'notification' => 'You have successfully changed ('.ucfirst($first_name).' '.ucfirst($last_name).') account password.',
				);
				add_user_notification($notification_args);
			}
		
			if($check):
				update_user_meta($user_id,'gender',$gender);
				update_user_meta($user_id,'dob',date('Y-m-d h:i:s',strtotime($dob) ) );
				update_user_meta($user_id,'user_phone',$user_phone);
				update_user_meta($user_id,'profile_img',$profile_img);
				$notification_args = array(
					'title' => 'Admin Account Details Updated',
					'notification' => 'You have successfully updated ('.ucfirst($first_name).' '.ucfirst($last_name).') account details.',
				);
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit;		
	}
	
	//GENERATE PASSWORD PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'generate_password'){
		echo password_generator();
		exit();
	}	
	
	//DELETE SECURITY QUESTION
	if(isset($_POST['action']) && $_POST['action'] == 'delete_user'){
		extract($_POST);
		if(is_admin()):
			$uid = get_current_user_id();
			if($uid == $id){
				echo 0;
				exit;	
			}
			$user = get_userdata($id);	
			$args  = array('ID' => $id);
			$result = $db->delete(TBL_USERS,$args);
		
			if($result):
				$db->delete(TBL_USERMETA,array('user_id' => $id));
				$notification_args = array(
					'title' => 'Account Deleted',
					'notification' => 'You have successfully deleted ('.ucfirst($user->first_name).' '.ucfirst($user->last_name).') account.',
				);
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit;	
	}

	//UPLOAD IMAGE PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'upload_profile_image'){
		if(isset($_FILES["photo"]) && $_FILES["photo"]["size"] > 0){
			$sourcePath = $_FILES["photo"]["tmp_name"];
			$file = pathinfo($_FILES['photo']['name']);
			$fileType = $file["extension"];
			$full_img = 'profile-img-'.time().'.'.$fileType;
			createThumb($sourcePath, $upload_img.$full_img,$fileType,300,300,300);
			echo $upload_url.$full_img;
		}else{
			echo 0;
		}
		exit();
	}

	//USER ACCOUNT STATUS CHANGE PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'user_account_status_change'){
		extract($_POST);
		if(is_admin()):
			$uid = get_current_user_id();
			if($uid == $id){
				echo 0;
				exit;	
			}
			$user = get_userdata($id);	
			$args = array('ID' => $id);
			$result = $db->update(TBL_USERS,array('user_status' => $status),$args);
		
			if($result):
				if($status == 0){
					$notification_args = array(
						'title' => ucfirst($user->user_role).' Account Disabled',
						'notification' => 'You have successfully disbled ('.ucfirst($user->first_name).' '.ucfirst($user->last_name).') account.',
					);
				}else{
					$notification_args = array(
						'title' => ucfirst($user->user_role).' Account Enabled',
						'notification' => 'You have successfully enabled ('.ucfirst($user->first_name).' '.ucfirst($user->last_name).') account.',
					);				
				}
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit;	
	}

?>