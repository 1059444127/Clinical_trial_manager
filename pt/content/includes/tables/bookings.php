
<?php 

// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$current_user_id = get_current_user_id();
$args = array('user_id' => $current_user_id);

$results = get_tabledata(TBL_BOOKINGS,false,$args);


if( !user_can('view_booking') || is_admin() ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$results):
	echo page_not_found("Oops! No Completed clinics have been found",'  ',false);
else:
		


?>



	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
            <?php

           
            ?>
			<tr>
				<th class="text-center">Completion ID</th>
				<th class="text-center">Clinic ID</th>
                <th class="text-center">Hospital ID</th>
                <th class="text-center">Treatment given</th>
                <th class="text-center">Expected Attendance</th>
                <th class="text-center">Actual Attendance</th>
				<th class="text-center">Clinic Date</th>
				<th class="text-center">Completion Date</th>
				<th class="text-center">Completion Status</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($results):
				foreach($results as $data):
			?>
			<tr class="text-center">
				<td>#<?php echo stripslashes($data->ID);?></td>
				<td>#<?php echo stripslashes($data->clinic);?></td>
                <td>#<?php 
                    
                    $wt1 = "SELECT hospital FROM tbl_clinics WHERE ID = $data->clinic";
                    $wt2 = $db->get_results($wt1);
                    echo $wt2{0}->hospital;
                    $valr= $wt2{0}->hospital;
                    ?></td>
                
                <?php
                 
                    $query = "SELECT * FROM ".TBL_CLINICS." WHERE `ID` = '$data->clinic' AND hospital = $valr";
										$result = $db->get_results($query);

                    
                    				foreach($result as $data2):
                    $query2 = "SELECT TreatmentID FROM tbl_key WHERE KeyVal = $data2->treatment AND TrialID = $data2->trial AND HospitalID = $valr";
										$result2 = $db->get_results($query2);
               
                    
                    				foreach($result2 as $data3):
                    $query3 = "SELECT * FROM tbl_treatments WHERE ID = $data3->TreatmentID";
                    $result3 =$db->get_results($query3);
                    foreach($result3 as $data3):
                    echo $data3->name;
                    $dat1 = $data3->colour;
                $string = '"'.trim($dat1,'"').'"';
                echo "<td bgcolor = ".$string.">".$data3->name."</td>";
                                    endforeach;
                    				endforeach;                    
                    				endforeach;
                    ?>

                <td><?php
                    $query = "SELECT `expected` FROM ".TBL_CLINICS." WHERE `ID` = '$data->clinic'";
										$result = $db->get_results($query);

                    
                    				foreach($result as $data2):
                    echo stripslashes($data2->expected);
                    				endforeach;
                    ?></td>
                <td><?php if(($data->actual)<1||$data->actual==null){echo "N/A";}else{
                    echo stripslashes($data->actual);}?></td>
                <td>
                    <?php 
                    $qw = "SELECT * FROM tbl_clinics WHERE ID = $data->clinic";
                    $qq12 = $db->get_results($qw);
                    

                    echo date('M d,Y',strtotime($qq12[0]->schedule));
                    
                    ?>
                </td>
				<td><?php echo date('M d,Y',strtotime($data->created_on));?></td>
				
                <td>
                    <?php 
                   if($data->status == 1){ echo '<span class="label label-success">Completed</span>'; }elseif($data->status == 0){
                    echo '<span class="label label-danger">Canceled</span>';}elseif($data->status==2){
                       echo '<span class="label label-warning">In progress</span>'
                        ;} 
                    ?>
                </td>
				<td class="text-center">	
					<?php if($data->status == 1 && user_can('cancel_booking') ): ?>
					<a href="#" class="btn btn-dark btn-xs" onclick="delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="cancel_booking" data-hide="1" data-process="booking"><i class="fa fa-close"></i>&nbsp; Cancel</a>
					<?php endif; ?>
    
                    
                    
                    
                    <?php if($data->status == 2){
    ?>

                    


   
    
    
<p id="demo"></p>
                    
                    				<a href="#" class="btn btn-dark btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="cancel_booking" data-hide="1" data-process="booking"><i class="fa fa-close"></i>&nbsp; Cancel</a>
                    
                    <?php
		
} ?>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
<?php endif; ?>
