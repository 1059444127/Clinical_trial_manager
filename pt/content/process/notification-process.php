<?php
	//READ NOTIFICATION PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'read_notification'){
		extract($_POST);	
		$current_user_id = get_current_user_id();
		$args1 = array('read' => 1);
		$args  = ($type == 'all') ? array('user_id' => $current_user_id) : array('ID' => $id,'user_id' => $current_user_id);
		$result = $db->update(TBL_NOTIFICATIONS,$args1,$args);
		echo ($result) ? 1 : 0 ;
		exit();
	}
	
	//HIDE NOTIFICATION PROCESS
	if(isset($_POST['action']) && $_POST['action'] == 'hide_notification'){
		extract($_POST);	
		$current_user_id = get_current_user_id();
		$args1 = array('read' => 1,'hide' => 1);
		$args  = ($type == 'all') ? array('user_id' => $current_user_id) : array('ID' => $id,'user_id' => $current_user_id);
		$result = $db->update(TBL_NOTIFICATIONS,$args1,$args);
		echo ($result) ? 1 : 0 ;
		exit();
	}
?>
