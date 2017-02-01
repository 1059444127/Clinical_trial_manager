<?php

	//ADD NEW TRIAL  PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_trial'){
		extract($_POST);
		
		if( user_can('add_trial') ):
			$validation_args = array(
				'name' => $name,
				'hospital' => $hospital,
			);
			
			if(is_value_exists(TBL_TRIALS,$validation_args)){
				echo 2;
				exit();
			}
			$guid = get_guid(TBL_TRIALS);
			$result = $db->insert(TBL_TRIALS,
				array(
					'ID' => $guid,
					'hospital' => $hospital,
					'name' => $name,
					'description' => addslashes($description),
					'type' => $type,
					'participants' => $participants
				)
			);
		  $sql = "INSERT INTO tbl_done (TrialID, HospitalID) VALUES ($guid,$hospital)";
        $don = $db->query($sql);
        
			if($result):
				$notification_args = array(
					'title' => 'New Trial Created ',
					'notification' => 'You have successfully created a new trial ('.$name.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit();
	}

	//EDIT TRIAL PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_trial'){
		extract($_POST);
		
		if( user_can('edit_trial') && can_access('trial', $trial_id) ):
			$validation_args = array(
				'name' => $name,
				'hospital' => $hospital,
			);
			
			if(is_value_exists(TBL_TRIALS,$validation_args,$trial_id)){
				echo 2;
				exit();
			}
				
			$result = $db->update(TBL_TRIALS,
				array(
					'name' => $name,
					'hospital' => $hospital,
					'description' => addslashes($description),
					'type' => $type,
					'participants' => $participants
				),
				array(
					'ID' => $trial_id
				)
			);
		
			if($result):
				$notification_args = array(
					'title' => 'Trial Updated',
					'notification' => 'You have successfully updated trial ('.$name.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		
		exit();
	}
	
	//DELETE TRIAL PROCESS 
	if(isset($_POST['action']) && $_POST['action'] == 'delete_trial'){
		extract($_POST);
		
		if( user_can('delete_trial') && can_access('trial', $id) ):
			$data = get_tabledata(TBL_TRIALS,true,array('ID' => $id) ) ;
		
			if(is_admin()){
				$args  = array('ID' => $id);
				$result = $db->delete(TBL_TRIALS,$args);
			}
		
			if($result):
				$notification_args = array(
					'title' => 'Trial Deleted',
					'notification' => 'You have successfully deleted ('.$data->name.') trial details.',
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

	//ADD NEW TRIAL TYPE PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_trial_type'){
		extract($_POST);
		
		if( user_can('add_trial_type') ):
			$validation_args = array(
				'name' => $name
			);
			
			if(is_value_exists(TBL_TRIAL_TYPES,$validation_args)){
				echo 2;
				exit();
			}
			$guid = get_guid(TBL_TRIAL_TYPES);
			$result = $db->insert(TBL_TRIAL_TYPES,
				array(
					'ID' => $guid,
					'name' => $name,
					'description' => addslashes($description),
				)
			);
		
			if($result):
				$notification_args = array(
					'title' => 'New Trial Type Created ',
					'notification' => 'You have successfully created a new trial type ('.$name.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		
		exit();
	}

	//EDIT TRIAL TYPE PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_trial_type'){
		extract($_POST);
		
		if( user_can('edit_trial_type') && can_access('trial_type', $trial_type_id) ):
			$validation_args = array(
				'name' => $name,
			);
		
			if(is_value_exists(TBL_TRIAL_TYPES,$validation_args,$trial_type_id)){
				echo 2;
				exit();
			}
				
			$result = $db->update(TBL_TRIAL_TYPES,
				array(
					'name' => $name,
					'description' => addslashes($description),
				),
				array(
					'ID' => $trial_type_id
				)
			);
		
			if($result):
				$notification_args = array(
					'title' => 'Trial Type Updated',
					'notification' => 'You have successfully updated trial type ('.$name.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit();
	}
	
	//DELETE TRIAL TYPE PROCESS 
	if(isset($_POST['action']) && $_POST['action'] == 'delete_trial_type'){
		extract($_POST);
		
		if( user_can('delete_trial_type') && can_access('trial_type', $id) ):
			$data = get_tabledata(TBL_TRIAL_TYPES,true,array('ID' => $id) ) ;
			
			if(is_admin()){
				$args  = array('ID' => $id);
				$result = $db->delete(TBL_TRIAL_TYPES,$args);
			}
			
			if($result):
				$notification_args = array(
					'title' => 'Trial Type Deleted',
					'notification' => 'You have successfully deleted ('.$data->name.') trial type details.',
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

	//ADD NEW CLINIC  PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_clinic'){

        extract($_POST);
		
                        $query = "SELECT `RandomString` FROM tbl_randomised WHERE `HospitalID` = $hospital AND `trialID` = $trial";
        
        $result = $db->get_results($query);
        $string = current($result); 
                   $arr =  "\"".reset($string)."\"";
                  $last = substr($arr, -2);
                    $last = str_replace("\"", "",$last);
        
        
		if( user_can('add_clinic') ):
        
			$validation_args = array(
				'trial' => $trial,
				'hospital' => $hospital,
				'schedule' => date('Y-m-d',strtotime($schedule)),
				'room' => $room,
                'expected' => $expected
			);
			

			
			$guid = get_guid(TBL_CLINICS);
			
        
        
                           $date1 = date_create(date('Y-m-d',strtotime($schedule)));
                           $date2 = date_create(date('Y-m-d',strtotime($schedule2)));


                    $diff = date_diff($date1,$date2);

                    $dDiff= ($diff->d);
        if($dDiff>1){

        for($i = 0; $i<=$dDiff;$i++){
            
            

            
        $query = "SELECT `RandomString` FROM tbl_randomised WHERE `HospitalID` = $hospital AND `trialID` = $trial";

            
            
            $checker_fields = array(
				'trial' => $trial,
				'hospital' => $hospital,
				'schedule' => date('Y-m-d', strtotime(date('Y-m-d',strtotime($schedule)) .' +'.$i.' day')),
				'room' => $room,
			);
        if(is_value_exists(TBL_CLINICS,$checker_fields)){

			}else{
            
        $result = $db->get_results($query);
        $string = current($result); 
                   $arr =  "\"".reset($string)."\"";
                  $last = substr($arr, -2);
                    $last = str_replace("\"", "",$last);
            
            


                $result = $db->insert(TBL_CLINICS,
				array(
					'hospital' => $hospital,
					'trial' => $trial,
					'schedule' => date('Y-m-d', strtotime(date('Y-m-d',strtotime($schedule)) .' +'.$i.' day')),
					'room' => $room,
                                'expected' => $expected,
                                'treatment' => $last 
                
				)
			);

              $new22= substr_replace($arr, "", -2);
        $new2 = str_replace("\"", "",$new22);
           $sql = "UPDATE tbl_randomised SET RandomString=$new2 WHERE HospitalID = $hospital AND TrialID = $trial";
$result = $db->query($sql);
        }
        }
        }else{
            
            
                        $checker_fields2 = array(
				'trial' => $trial,
				'hospital' => $hospital,
				'schedule' => date('Y-m-d',strtotime($schedule)),
				'room' => $room,
			);
        if(is_value_exists(TBL_CLINICS,$checker_fields2)){
			echo 2;
				exit();
			}else{
            
            

              $query = "SELECT `RandomString` FROM tbl_randomised WHERE `HospitalID` = $hospital AND `trialID` = $trial";
        
        $result = $db->get_results($query);
        $string = current($result); 
                   $arr =  "\"".reset($string)."\"";
                  $last = substr($arr, -2);
                    $last = str_replace("\"", "",$last);
            
            
            
			$result = $db->insert(TBL_CLINICS,
				array(
					'hospital' => $hospital,
					'trial' => $trial,
					'schedule' => date('Y-m-d',strtotime($schedule)),
					'room' => $room,
                                'expected' => $expected,
                                'treatment' => $last 
                
				)
			);
            
        }
        }
        
			
//        $sql = "SELECT * FROM tbl_hospital WHERE ID = $hospital";
//        $res = $db->query($sql);
//        foreach($res as $dat):
//        
//        $okay = $dat->ClinicsNum - 1;
//        $sql1 = "UPDATE tbl_hospitals SET ClinicsNum $okay WHERE ID = $hospital";
//        $resu = $db->query($sql1);
//        
//        endforeach;
        
        
        
        $new22= substr_replace($arr, "", -2);
        $new2 = str_replace("\"", "",$new22);
           $sql = "UPDATE tbl_randomised SET RandomString=$new2 WHERE HospitalID = $hospital AND TrialID = $trial";
$result = $db->query($sql);
			if($result):
				$insert_id = $guid;
				$notification_args = array(
					'title' => 'New Clinic Created ',
					'notification' => 'You have successfully created a new clinic (#'.$insert_id.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit();
	}

	//EDIT CLINIC PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_clinic'){
		extract($_POST);
		
		if( user_can('edit_clinic') && can_access('clinic', $clinic_id) ):
			$validation_args = array(
				'trial' => $trial,
				'hospital' => $hospital,
				'schedule' => date('Y-m-d',strtotime($schedule)),
				'room' => $room,
                                'expected' => $expected
			);
			
			if(is_value_exists(TBL_CLINICS,$validation_args,$clinic_id)){
				echo 2;
				exit();
			}
					
			$result = $db->update(TBL_CLINICS,
				array(
					'trial' => $trial,
					'hospital' => $hospital,
					'schedule' => date('Y-m-d',strtotime($schedule)),
					'room' => $room,
                                'expected' => $expected
				),
				array(
					'ID' => $clinic_id
				)
			);
			
			if($result):
				$notification_args = array(
					'title' => 'Clinic Updated',
					'notification' => 'You have successfully updated clinic (#'.$clinic_id.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit();
	}
	
	//DELETE CLINIC PROCESS 
	if(isset($_POST['action']) && $_POST['action'] == 'delete_clinic'){
		extract($_POST);
		if( user_can('delete_clinic') && can_access('clinic', $id) ):
			$data = get_tabledata(TBL_CLINICS,true,array('ID' => $id) ) ;
			
			//if(is_admin()){
				$args  = array('ID' => $id);
				$result = $db->delete(TBL_CLINICS,$args);
			//}
			
			if($result):
				$notification_args = array(
					'title' => 'Clinic Deleted',
					'notification' => 'You have successfully deleted (#'.$data->ID.') clinic details.',
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
	
	//ADD NEW TREATMENT  PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_treatment'){
		extract($_POST);
		
		if( user_can('add_treatment') ):
			$validation_args = array(
				'name' => $name,
				'trial' => $trial,
			);
			
			if(is_value_exists(TBL_TREATMENTS,$validation_args)){
				echo 2;
				exit();
			}
			
			$guid = get_guid(TBL_TREATMENTS);
			
			$result = $db->insert(TBL_TREATMENTS,
				array(
					'ID' => $guid,
					'trial' => $trial,
					'name' => $name,
					'weight' => $weight,
                'colour' => $colour
				)
			);
			
			if($result):
				$notification_args = array(
					'title' => 'New Treatment Created ',
					'notification' => 'You have successfully created a new treatment ('.$name.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		
		exit();
	}

	//EDIT TREATMENT PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_treatment'){
		extract($_POST);
		
		if( user_can('edit_treatment') && can_access('treatment', $treatment_id) ):
			$validation_args = array(
				'name' => $name,
				'trial' => $trial,
			);
			
			if(is_value_exists(TBL_TREATMENTS,$validation_args,$treatment_id)){
				echo 2;
				exit();
			}
					
			$result = $db->update(TBL_TREATMENTS,
				array(
					'name' => $name,
					'trial' => $trial,
					'weight' => $weight,
                'colour' => $colour
				),
				array(
					'ID' => $treatment_id
				)
			);
			
			if($result):
				$notification_args = array(
					'title' => 'Treatment Updated',
					'notification' => 'You have successfully updated treatment ('.$name.').',
				);
				
				add_user_notification($notification_args);
				echo 1;
			else:
				echo 0;
			endif;
		else:
			echo 0;
		endif;
		exit();
	}
	
	//DELETE TREATMENT PROCESS 
	if(isset($_POST['action']) && $_POST['action'] == 'delete_treatment'){
		extract($_POST);
		
		if( user_can('delete_treatment') && can_access('treatment', $id) ):
			$data = get_tabledata(TBL_TREATMENTS,true,array('ID' => $id) ) ;
			
			if(is_admin()){
				$args  = array('ID' => $id);
				$result = $db->delete(TBL_TREATMENTS,$args);
			}
			
			if($result):
				$notification_args = array(
					'title' => 'Treatment Deleted',
					'notification' => 'You have successfully deleted ('.$data->name.') treatment details.',
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

?>
