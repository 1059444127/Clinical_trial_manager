<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
if( isset($_REQUEST['trial_id']) && $_REQUEST['trial_id'] != '' )
	$args['trial'] = $_REQUEST['trial_id'];
	
$results = get_tabledata(TBL_TREATMENTS,false,$args);

if( !user_can('view_treatment') ):
	echo page_not_found('You are not allowed to view this page.','Please contact an Admin if you require access !');
elseif(!$results):
	echo page_not_found("There is no treatment record found",'  ',false);
else:
?>
	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Name</th>
				<th>Weight</th>
				<th>Trial</th>
				<th>Hospital</th>
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
			?>
			<tr>
				<td><?php echo stripslashes($data->name);?></td>
				<td><?php echo $data->weight;?></td>
				<td><?php echo stripslashes($trial->name);?></td>
				<td><?php echo stripslashes($hospital->name);?></td>
				<td><?php echo date('M d,Y',strtotime($data->created_on));?></td>
				<td class="text-center">
					<?php if( user_can('edit_treatment') ): ?>
					<a href="<?php echo site_url();?>/edit-treatment/?id=<?php echo $data->ID;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php endif; ?>
					
					<?php if( user_can('delete_treatment') ): ?>
					<a href="#" class="btn btn-danger btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="delete_treatment"><i class="fa fa-trash"></i> Delete</a>
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
