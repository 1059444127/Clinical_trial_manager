<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
$results = get_tabledata(TBL_CLINICS,false,$args);

if( !user_can('view_clinic') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$results):
	echo page_not_found("Oops! There is no New clinics record found",'  ',false);
else:
?>
	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Clinic ID</th>
				<th>Trial</th>
                <th>Treatment</th>
				<th>Schedule Date</th>
				<th>Hospital</th>
				<th>Room</th>
				<th>Created On</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($results):
				foreach($results as $data):
				$trial = get_tabledata(TBL_TRIALS,true, array('ID' => $data->trial));
				$hospital = get_tabledata(TBL_HOSPITALS,true, array('ID' => $data->hospital));
				$room = get_tabledata(TBL_ROOMS,true, array('ID' => $data->room));
			?>
			<tr>
				<td>#<?php echo stripslashes($data->ID);?></td>
				<td><?php echo stripslashes($trial->name);?></td>
                <td>
                    <?php
                    
                    $query1234 = "SELECT * FROM tbl_key WHERE TrialID = $data->trial AND KeyVal = $data->treatment";
                    $result5 = $db->get_results($query1234);
                    $vato = $result5[0];
                                  $bbo2 = ($vato->TreatmentID);

                    
                      $query12345 = "SELECT * FROM tbl_treatments WHERE ID = $bbo2";
                    $result6 = $db->get_results($query12345);
                    $vato2 = $result6[0];
                                  $bbo3 = ($vato2->name);
                    echo $bbo3;
                    
                    
                    
                    ?>
                </td>
				<td><?php echo date('M d,Y',strtotime($data->schedule));?></td>
				<td><?php echo stripslashes($hospital->name);?></td>
				<td><?php echo stripslashes($room->name);?></td>
				<td><?php echo date('M d,Y',strtotime($data->created_on));?></td>
				<td class="text-center">
                    
                    <?php if( user_can('view_clinic') ): ?>
					<a href="<?php echo site_url();?>/appointments/?id=<?php echo $data->ID;?>" class="btn btn-primary btn-xs"><i class="fa fa-users"></i> Randomise Clinic</a>
					<?php endif; ?>
                    <?php

                        $cj = "SELECT status FROM tbl_bookings WHERE clinic = $data->ID";
                    $cjr = $db->query($cj);
                    if($cjr = 0){
					 if( user_can('view_clinic') ): ?>
					<a href="<?php echo site_url();?>/appointments/?id=<?php echo $data->ID;?>" class="btn btn-success btn-xs"><i class="fa fa-users"></i><?php  echo "View completion info";?></a>
					<?php endif; 
                    }
                    ?>
					
					<?php if( user_can('edit_clinic') ): ?>
					<a href="<?php echo site_url();?>/edit-clinic/?id=<?php echo $data->ID;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php endif; ?>
					
					<?php if( user_can('delete_clinic') ): ?>
					<a href="#" class="btn btn-danger btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="delete_clinic"><i class="fa fa-trash"></i> Delete</a>
					<?php endif; ?>
				</td>
			</tr>
			<?php
				endforeach;
			endif;
			?>
		</tbody>
	</table>
<?php endif; ?>
