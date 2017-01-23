<?php 
	
	//ADD FETCH BOOKING CLINICS PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'fetch_available_clinics'){
		extract($_POST);
		echo get_available_clinics($date);
		exit();
	}

	//ADD NEW BOOKING PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'add_new_booking'){
		extract($_POST);
		
		if( user_can('make_booking') && !is_admin() ):
			$current_user_id = get_current_user_id();
			
			$validation_args = array(
				'clinic' => $clinic,
				'user_id' => $current_user_id
			);
		
			if(is_value_exists(TBL_BOOKINGS,$validation_args)){
				echo 2;
				exit();
			}
		
			$guid = get_guid(TBL_BOOKINGS);
			$result = $db->insert(TBL_BOOKINGS,
				array(
					'ID' => $guid,
					'clinic' => $clinic,
					'user_id' => $current_user_id,
                    'status' => 2
				)
			);
		
			if($result):
				$notification_args = array(
					'title' => 'New Clinic Booking',
					'notification' => 'You have successfully booked a clinic (#'.$clinic.').',
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
	if(isset($_POST['action']) && $_POST['action'] == 'cancel_booking'){
		extract($_POST);
		
		if( user_can('cancel_booking') && !is_admin() ):
			$current_user_id = get_current_user_id();
			
			$data = get_tabledata(TBL_BOOKINGS,true,array('ID' => $id) ) ;
			
			if($current_user_id == $data->user_id){
				$args  = array('status' => 0);
				$result = $db->update(TBL_BOOKINGS,$args, array('ID' => $id));
			}
			
			if($result):
				$notification_args = array(
					'title' => 'Booking Cancelled',
					'notification' => 'You have successfully cancelled booking (#'.$data->ID.')',
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