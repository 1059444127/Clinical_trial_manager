<?php

	//ADD NEW HOSPITAL PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_hospital'){
		extract($_POST);
		
		if( is_admin() ):
			$validation_args = array(
				'name' => $name,
			);
		
			if(is_value_exists(TBL_HOSPITALS,$validation_args)){
				echo 2;
				exit();
			}
		
			if(!isset($rooms))
				$rooms = '';
			
			if(!isset($trials))
				$trials = '';
			
			$guid = get_guid(TBL_HOSPITALS);
			$result = $db->insert(TBL_HOSPITALS,
				array(
					'ID' => $guid,
					'name' => $name,
					'description' => addslashes($description),
					'rooms' => $rooms,
					'trials' => $trials,
                    'ClinicsNum'=> $size,
				)
			);
        

                            $id = $guid;
                        

                        $sql = "SELECT * FROM tbl_hospitals WHERE ID = $id";
                        $result1 = $db->get_results($sql);
    
                        foreach($result1 as $res):
                        $string = $res->trials;
                        endforeach;
                        
                        preg_match_all('/".*?"/', $string, $matches);
                        $matches = str_replace('"', "", $matches);

                        foreach(range(0, $matches) as $i) 
                        {
                            $o = $matches[0][$i];

                            $sql = "SELECT * FROM tbl_done WHERE TrialID = $o AND HospitalID = $id";
                            $req = $db->query($sql);

                            if (req<1){
                                $sql = "INSERT INTO tbl_done (TrialID, HospitalID) VALUES ($o,$id)";
                                $don = $db->query($sql);
                        }
                        }
                 
        
        
			if($result):
				$notification_args = array(
					'title' => 'New Hospital Created ',
					'notification' => 'You have successfully created a new hospital ('.$name.').',
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

	//EDIT HOSPITAL PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_hospital'){
		extract($_POST);
		
		if( user_can('edit_hospital') && can_access('hospital', $hospital_id) ):
			$validation_args = array(
				'name' => $name,
			);
			
			if(is_value_exists(TBL_HOSPITALS,$validation_args,$hospital_id)){
				echo 2;
				exit();
			}
			
			if(!isset($rooms))
				$rooms = '';
			
			$result = $db->update(TBL_HOSPITALS,
				array(
					'name' => $name,
					'description' => addslashes($description),
					'rooms' => $rooms,
					'trials' => $trials,
                    'ClinicsNum'=>$size,
				),
				array(
					'ID' => $hospital_id
				)
			);
			
			if($result):
				$notification_args = array(
					'title' => 'Hospital Updated',
					'notification' => 'You have successfully updated hospital ('.$name.').',
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
	
	//DELETE HOSPITAL PROCESS 
	if(isset($_POST['action']) && $_POST['action'] == 'delete_hospital'){
		extract($_POST);
		if( is_admin() ):
			$data = get_tabledata(TBL_HOSPITALS,true,array('ID' => $id) ) ;
			$args  = array('ID' => $id);
			$result = $db->delete(TBL_HOSPITALS,$args);
        $sql = "DELETE FROM tbl_done WHERE HospitalID = $id";
        $res = $db->query($sql);
        
			if($result):
				$notification_args = array(
					'title' => 'Hospital Deleted',
					'notification' => 'You have successfully deleted ('.$data->name.') class details.',
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

	//ADD NEW ROOM PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_room'){
		extract($_POST);
		
		if( user_can('add_room') ):
			$validation_args = array(
				'name' => $name,
				'hospital' => $hospital
			);
			
			if(is_value_exists(TBL_ROOMS,$validation_args)){
				echo 2;
				exit();
			}
		
			$guid = get_guid(TBL_ROOMS);
			$result = $db->insert(TBL_ROOMS,
				array(
					'ID' => $guid,
					'hospital' => $hospital,
					'name' => $name
				)
			);
		
			if($result):
				$notification_args = array(
					'title' => 'New Room Created ',
					'notification' => 'You have successfully created a new room ('.$name.').',
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

	//EDIT ROOM PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'edit_room'){
		extract($_POST);
		
		if( user_can('edit_room') && can_access('room', $room_id) ):
			$validation_args = array(
				'name' => $name,
				'hospital' => $hospital
			);
			
			if(is_value_exists(TBL_ROOMS,$validation_args,$room_id)){
				echo 2;
				exit();
			}
			
			$result = $db->update(TBL_ROOMS,
				array(
					'name' => $name,
					'hospital' => $hospital
				),
				array(
					'ID' => $room_id
				)
			);
			
			if($result):
				$notification_args = array(
					'title' => 'Room Updated',
					'notification' => 'You have successfully updated room ('.$name.').',
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

	//DELETE ROOM PROCESS 
	if(isset($_POST['action']) && $_POST['action'] == 'delete_room'){
		extract($_POST);
		
		if( user_can('delete_room') && can_access('room', $id) ):
			$data = get_tabledata(TBL_ROOMS,true,array('ID' => $id) ) ;
			$args  = array('ID' => $id);
			$result = $db->delete(TBL_ROOMS,$args);	
			if($result):
				$notification_args = array(
					'title' => 'Room Deleted',
					'notification' => 'You have successfully deleted ('.$data->name.') class details.',
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
