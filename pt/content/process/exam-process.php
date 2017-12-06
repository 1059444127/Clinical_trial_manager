<?php

	//ADD SUBJECT PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'add_new_subject'){
		extract($_POST);
		
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_SUBJECT,$validation_args)){
			echo 2;
			exit();
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = insert_record(WP_SUBJECT,
				array(
					'user_id' => $current_user_id,
					'name' => $name,
					'company' => $company,
				)
			);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'New Subject Created',
				'notification' => 'You have been successfully created a new subject ('.$name.').',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//UPDATE SUBJECT PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_subject'){
		extract($_POST);
		
		$validation_args = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_SUBJECT,$validation_args,$subject_id)){
			echo 2;
			exit();
		}
		
		if(is_admin()){
			$args  = array('ID' => $subject_id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $subject_id,'company' => $current_user_company);
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = update_record(WP_SUBJECT,array('name' => $name),$args);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'Subject Details Updated',
				'notification' => 'You have been successfully updated ('.$name.') subject details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//DELETE SUBJECT PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'delete_subject'){
		extract($_POST);
		
		$subject = get_subject_data($id);
		
		if(is_admin()){
			$args  = array('ID' => $id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $id,'company' => $current_user_company);
		}
		if(is_admin() || is_teacher_is_admin()){
			$result = delete_record(WP_SUBJECT,$args);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'Subject Deleted',
				'notification' => 'You have been successfully deleted ('.$subject->name.') subject details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//ADD CLASS PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'add_new_class'){
		extract($_POST);
		
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_CLASS,$validation_args)){
			echo 2;
			exit();
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = insert_record(WP_CLASS,
				array(
					'user_id' => $current_user_id,
					'name' => $name,
					'company' => $company,
				)
			);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'New Class Created',
				'notification' => 'You have been successfully created a new class ('.$name.').',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//UPDATE CLASS PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_class'){
		extract($_POST);
		
		$validation_args = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_CLASS,$validation_args,$class_id)){
			echo 2;
			exit();
		}
		
		if(is_admin()){
			$args  = array('ID' => $class_id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $class_id,'company' => $current_user_company);
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = update_record(WP_CLASS,array('name' => $name,	),$args);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'Class Details Updated',
				'notification' => 'You have been successfully updated ('.$name.') class details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//DELETE CLASS PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'delete_class'){
		extract($_POST);
		
		$class = get_class_data($id);
		
		if(is_admin()){
			$args  = array('ID' => $id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $id,'company' => $current_user_company);
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = delete_record(WP_CLASS,$args);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'Class Deleted',
				'notification' => 'You have been successfully deleted ('.$class->name.') class details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}
	
	//ADD BATCH PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'add_new_batch'){
		extract($_POST);
		
		$validation_args = array(
			'class_id' => mysqli_entities_fix_string($class),
			'year' => mysqli_entities_fix_string($year),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_BATCH,$validation_args)){
			echo 2;
			exit();
		}
		
		if(!isset($students)){
			$students = array();
		}
		
		$current_user_id = get_current_user_id();
		
		if(is_admin() || is_teacher_is_admin()){
			$result = insert_record(WP_BATCH,
				array(
					'user_id' => $current_user_id,
					'class_id' => $class,
					'company' => $company,
					'year' => $year,
					'students' => $students,
				)
			);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'New Batch Created',
				'notification' => 'You have been successfully created a new batch.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//UPDATE BATCH PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_batch'){
		extract($_POST);
		
		$validation_args = array(
			'class_id' => mysqli_entities_fix_string($class),
			'year' => mysqli_entities_fix_string($year),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_BATCH,$validation_args,$batch_id)){
			echo 2;
			exit();
		}
		
		if(!isset($students)){
			$students = array();
		}
		
		if(is_admin()){
			$args  = array('ID' => $batch_id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $batch_id,'company' => $current_user_company);
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = update_record(WP_BATCH,
				array(
					'class_id' => $class,
					'year' => $year,
					'students' => $students,
				),
				$args
			);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'Batch Details Updated',
				'notification' => 'You have been successfully updated a batch details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//DELETE CLASS PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'delete_batch'){
		extract($_POST);
		
		if(is_admin()){
			$args  = array('ID' => $id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $id,'company' => $current_user_company);
		}
		
		if(is_admin() || is_teacher_is_admin()){
			$result = delete_record(WP_BATCH,$args);
		}
		
		if($result):
			$notification_args = array(
				'title' => 'Batch Deleted',
				'notification' => 'You have been successfully deleted a batch details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}
	
	//ADD TOPIC PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'add_new_topic'){
		extract($_POST);
		
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'name' => mysqli_entities_fix_string($name),
			'subject' => mysqli_entities_fix_string($subject),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_TOPIC,$validation_args)){
			echo 2;
			exit();
		}
		
		$result = insert_record(WP_TOPIC,
			array(
				'user_id' => $current_user_id,
				'name' => $name,
				'subject' => $subject,
				'company' => $company,
			)
		);
		
		if($result):
			$notification_args = array(
				'title' => 'New Topic Created',
				'notification' => 'You have been successfully created a new topic ('.$name.').',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//ADD TOPIC PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_topic'){
		extract($_POST);
		
		$validation_args = array(
			'name' => mysqli_entities_fix_string($name),
			'subject' => mysqli_entities_fix_string($subject),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_TOPIC,$validation_args,$topic_id)){
			echo 2;
			exit();
		}
		
		if(is_admin()){
			$args  = array('ID' => $topic_id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $topic_id,'company' => $current_user_company);
		}
		
		$result = update_record(WP_TOPIC,
			array(
				'name' => $name,
				'subject' => $subject,
			),
			$args
		);
		
		if($result):
			$notification_args = array(
				'title' => 'Topic Details Updated',
				'notification' => 'You have been successfully updated ('.$name.') topic details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//DELETE TOPIC PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'delete_topic'){
		extract($_POST);
		
		$topic = get_topic_data($id);
		
		if(is_admin()){
			$args  = array('ID' => $id);
		}else{
			$current_user_company = get_current_user_company();
			$args  = array('ID' => $topic_id,'company' => $current_user_company);
		}
		
		$result = delete_record(WP_TOPIC,$args);
		
		if($result):
			$notification_args = array(
				'title' => 'Topic Deleted',
				'notification' => 'You have been successfully deleted ('.$topic->name.') class details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}
	
	//ADD EXAM PROCESS 
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'add_new_exam'){
		extract($_POST);
		$current_user_id = get_current_user_id();
		
		$res = array('status' => '','url' => '');
		
		$validation_args1 = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_EXAMS,$validation_args1)){
			$res['status'] = 2;
			echo json_encode($res);
			exit();
		}
		
		$validation_args2 = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company),
			'subject' => mysqli_entities_fix_string($subject),
			'class_id' => mysqli_entities_fix_string($class),
			'batch' => mysqli_entities_fix_string($batch),
			'grade' => mysqli_entities_fix_string($grade),
		);
		
		if(is_value_exists(WP_EXAMS,$validation_args2)){
			$res['status'] = 3;
			echo json_encode($res);
			exit();
		}
		
		$result = insert_record(WP_EXAMS,
			array(
				'name' => $name,
				'user_id' => $current_user_id,
				'company' => $company,
				'subject' => $subject,
				'class_id' => $class,
				'batch' => $batch,
				'paper' => $paper,
				'grade' => $grade,
			)
		);
		
		if($result):
			$notification_args = array(
				'title' => 'New Exam Created',
				'notification' => 'You have been successfully created a new exam ('.$name.').',
			);
			
			add_user_notification($notification_args);
			
			$res['status'] = 1;
			$res['url'] = get_site_url().'/edit-exam/?exam_id='.$result;
			echo json_encode($res);
		else:
			$res['status'] = 0;
			echo json_encode($res);
		endif;
		exit;	
	}

	//EDIT EXAM GENERAL TAB PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_exam_general_tab'){
		extract($_POST);
		
		$validation_args1 = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company)
		);
		
		if(is_value_exists(WP_EXAMS,$validation_args1,$exam_id)){
			echo 2;
			exit();
		}
		
		$validation_args2 = array(
			'name' => mysqli_entities_fix_string($name),
			'company' => mysqli_entities_fix_string($company),
			'subject' => mysqli_entities_fix_string($subject),
			'class_id' => mysqli_entities_fix_string($class),
			'batch' => mysqli_entities_fix_string($batch),
			'grade' => mysqli_entities_fix_string($grade),
		);
		
		if(is_value_exists(WP_EXAMS,$validation_args1,$exam_id)){
			echo 2;
			exit();
		}
		
		if(is_admin()){
			$args  = array('ID' => $exam_id);
		}else{
			$current_user_company = get_current_user_company();
			$current_user_id = get_current_user_id();
			$args  = array('ID' => $exam_id,'company' => $current_user_company);
			if(!is_teacher_is_admin()){
				$args['user_id'] = $current_user_id;
			}
		}
		
		$result = update_record(WP_EXAMS,
			array(
				'name' => $name,
				'company' => $company,
				'subject' => $subject,
				'class_id' => $class,
				'batch' => $batch,
				'paper' => $paper,
				'grade' => $grade,
			),
			$args
		);
		
		if($result):
			$notification_args = array(
				'title' => 'Exam General Details Updated',
				'notification' => 'You have been successfully updated ('.$name.') exam general details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}

	//EDIT EXAM MANAGE GRADES TAB PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_exam_manage_grades_tab'){
		extract($_POST);
		$exam = get_exam_data($exam_id);
		
		$current_user_company = get_current_user_company();
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'ID' => mysqli_entities_fix_string($exam_id),
			'company' => mysqli_entities_fix_string($current_user_company)
		);
		
		if(!is_teacher_is_admin()){
			$validation_args['user_id'] = $current_user_id;
		}
		
		$ignore_list = array('form_action','exam_id');
		$data = array();
		foreach($_POST as $key => $value){
			if(!in_array($key,$ignore_list)){
				$arr = explode('_',$key);
				$data[$arr[0]][$arr[1]] = $value;
			}
		}
		
		if(is_admin()){
			update_exam_meta($exam_id,'exam_grades',$data);
			$notification_args = array(
				'title' => 'Exam Grades Details Updated',
				'notification' => 'You have been successfully updated ('.$exam->name.') exam grades details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		}elseif(is_value_exists(WP_EXAMS,$validation_args)){
			update_exam_meta($exam_id,'exam_grades',$data);
			$notification_args = array(
				'title' => 'Exam Grades Details Updated',
				'notification' => 'You have been successfully updated ('.$exam->name.') exam grades details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		}else{
			echo 0;
		}
		exit();
	}

	//EDIT EXAM QUESTIONS PROCESS 
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_exam_questions_tab'){
		extract($_POST);
		
		$exam = get_exam_data($exam_id);
		
		$current_user_company = get_current_user_company();
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'ID' => mysqli_entities_fix_string($exam_id),
			'company' => mysqli_entities_fix_string($current_user_company)
		);
		
		if(!is_teacher_is_admin()){
			$validation_args['user_id'] = $current_user_id;
		}
		
		$data = unserialize(get_exam_meta($exam_id,'exam_questions'));
		$data[$paper] = array();
		foreach($question_id as $key => $val){
			$data[$paper][$val] = array(
				'id' => $val,
				'question' => $question[$key],
				'topic' => $topic[$key],
				'mark' => $mark[$key],
				'max' => $max_question_num
			);
		}
		
		if(is_admin()){
			update_exam_meta($exam_id,'exam_questions',$data);
			$notification_args = array(
				'title' => 'Exam Questions Updated',
				'notification' => 'You have been successfully updated ('.$exam->name.') exam questions.',
			);
			add_user_notification($notification_args);
			echo 1;
		}elseif(is_value_exists(WP_EXAMS,$validation_args)){
			update_exam_meta($exam_id,'exam_questions',$data);
			$notification_args = array(
				'title' => 'Exam Questions Updated',
				'notification' => 'You have been successfully updated ('.$exam->name.') exam questions.',
			);
			add_user_notification($notification_args);
			echo 1;
		}else{
			echo 0;
		}
		exit();
	}
	
	//EDIT EXAM STUDENT MARKS PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'edit_exam_student_marks_tab'){
		extract($_POST);
		
		$exam = get_exam_data($exam_id);
		
		$current_user_company = get_current_user_company();
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'ID' => mysqli_entities_fix_string($exam_id),
			'company' => mysqli_entities_fix_string($current_user_company)
		);
		
		if(!is_teacher_is_admin()){
			$validation_args['user_id'] = $current_user_id;
		}
		
		$data = unserialize(get_exam_meta($exam_id,'exam_student_marks'));
		$data[$paper] = array();
		foreach($student_id as $key => $val){
			foreach($question_id as $q){
				$mark_field = 'mark_'.$q;
				$m = $$mark_field;
				$data[$paper][$val][$q] = $m[$key];
			}
		}
		if(is_admin()){
			update_exam_meta($exam_id,'exam_student_marks',$data);
			$notification_args = array(
				'title' => 'Exam Student Marks Updated',
				'notification' => 'You have been successfully updated ('.$exam->name.') exam student marks.',
			);
			add_user_notification($notification_args);
			echo 1;
		}elseif(is_value_exists(WP_EXAMS,$validation_args)){
			update_exam_meta($exam_id,'exam_student_marks',$data);
			$notification_args = array(
				'title' => 'Exam Student Marks Updated',
				'notification' => 'You have been successfully updated ('.$exam->name.') exam student marks.',
			);
			add_user_notification($notification_args);
			echo 1;
		}else{
			echo 0;
		}
		exit();
	}
	
	//DELETE SUBJECT PROCESS
	if(isset($_POST['form_action']) && $_POST['form_action'] == 'delete_exam'){
		extract($_POST);
		
		$exam = get_exam_data($id);
		
		if(is_admin()){
			$args  = array('ID' => $id);
		}else{
			$current_user_company = get_current_user_company();
			$current_user_id = get_current_user_id();
			$args  = array('ID' => $id,'company' => $current_user_company);
			if(!is_teacher_is_admin()){
				$args['user_id'] = $current_user_id;
			}
		}
		
		$result = delete_record(WP_EXAMS,$args);
		
		if($result):
			$notification_args = array(
				'title' => 'Exam Deleted',
				'notification' => 'You have been successfully deleted ('.$exam->name.') exam details.',
			);
			
			add_user_notification($notification_args);
			echo 1;
		else:
			echo 0;
		endif;
		exit;	
	}
?>
