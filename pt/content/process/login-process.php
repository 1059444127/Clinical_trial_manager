<?php

if(isset($_POST['action'])):
	// USER LOGIN PROCESSS
	if($_POST['action'] == 'user_login'){
		extract($_POST); // Extract the post data
		
		if(email_exists($user_name)){	
			$user = get_user_by('email',$user_name);
			
			if(check_password($user_pass,$user->ID)){
				if(!is_user_active($user->ID)){
					echo 2;
					exit();
				}
				set_current_user($user->ID);
				$db->insert(TBL_ACCESS_LOG,
					array(
						'user_id' => $user->ID,
						'ip_address' => $_SERVER['REMOTE_ADDR'],
						'device' => $device,
						'user_agent' => $_SERVER ['HTTP_USER_AGENT']
					)
				);
				echo 1;
				exit();
			}else{
				echo 0;
				exit();
			}
		}else{
			echo "Hellow";
			echo 0;
			exit();
		}	
	}

	//USER LOGOUT PROCESS
	if($_POST['action'] == 'logout_request'){ 			
		remove_current_user();
		exit();
	}
	
endif;
?>
