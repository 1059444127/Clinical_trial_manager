<?php

	// GENERAL SETTING PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'update_general_setting'){
		extract($_POST);
		
		if(is_admin()){
			update_option('site_name',$site_name);
			update_option('site_description',$site_description);
			update_option('admin_email',$admin_email);
			
			update_option('site_contact_email',$site_contact_email);
			update_option('site_contact_phone',$site_contact_phone);
			update_option('site_domain',$site_domain);
			
			$notification_args = array(
				'title' => 'General Setting Updated',
				'notification' => 'You have successfully updated website general settings.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		}else{
			echo 0;
		}
		exit();
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'manage_roles'){
		extract($_POST);
		
		if(is_admin()){	
			$users_capabilities = array();
			$capabilities = all_users_capabilities();
			$roles = array('site_manager','trial_manager','staff');
			foreach($roles as $role):
				$args = array();
				foreach($capabilities as $key => $capability):
					$value = ''.$role.'_'.$key;
					$args[$key] = (isset($$value)) ? 1 : 0;
				endforeach;
				$users_capabilities[$role] = $args;
			endforeach;
			
			update_option('users_capabilities',$users_capabilities);
			
			$notification_args = array(
				'title' => 'Users Capabilities Updated',
				'notification' => 'You have successfully updated users capabilities.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		}else{
			echo 0;
		}
		exit();
	}
?>
