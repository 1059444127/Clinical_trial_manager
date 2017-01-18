<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
$results = get_tabledata(TBL_ROOMS,false,$args );

if( !user_can('view_room') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$results):
	echo page_not_found("Oops! There is no New rooms record found",'  ',false);
else:
?>
	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Name</th>
                <th>Hospital</th>
				<th>Created On</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($results):
				foreach($results as $data):
			?>
			<tr>
				<td><?php echo stripslashes($data->name);?></td>
				<td><?php
                    $sql ="SELECT * FROM tbl_hospitals WHERE ID = $data->hospital";
                    $res = $db->get_results($sql);
                    foreach($res as $answer):
                    
                    echo $answer->name;
                    endforeach;
                    
                    ?></td>
                
				<td><?php echo date('M d,Y',strtotime($data->created_on));?></td>
				<td class="text-center">
					<?php if( user_can('edit_room') ): ?>
					<a href="<?php echo site_url();?>/edit-room/?id=<?php echo $data->ID;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php endif; ?>
					
					<?php if( user_can('delete_room') ): ?>
					<a href="#" class="btn btn-danger btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="delete_room"><i class="fa fa-trash"></i> Delete</a>
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
