<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$args = (!is_admin()) ? array('ID' => get_current_user_hospital()) : array();
$results = get_tabledata(TBL_HOSPITALS,false,$args);

if( !user_can('view_hospital') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$results):
	echo page_not_found("Oops! There is no New hospitals record found",'  ',false);
else:
?>
	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Rooms</th>
				<th>Created On</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($results):
				foreach($results as $data):
				$rooms = maybe_unserialize($data->rooms);
				if(is_array($rooms) && !empty($rooms))
					$rooms = implode(',',$rooms);
				
				$rooms_name = '-';
				if($rooms != ''){
					$query = " WHERE `ID` IN ($rooms) ";
					$rooms_data = get_tabledata(TBL_ROOMS, false, array(), $query);
					$rooms_name = array();
					if(!empty($rooms_data)):
						foreach($rooms_data as $r):
							$rooms_name[] = $r->name;
						endforeach;
					endif;
					$rooms_name = (!empty($rooms_name)) ? implode( ', ', $rooms_name) : '-';
				}
				
			?>
			<tr>
				<td><?php echo stripslashes($data->name);?></td>
				<td><?php echo short_text(stripslashes($data->description));?></td>
				<td><?php echo $rooms_name;?></td>
				<td><?php echo date('M d,Y',strtotime($data->created_on));?></td>
				<td class="text-center">
					<?php if( user_can('edit_hospital') ): ?>
					<a href="<?php echo site_url();?>/edit-hospital/?id=<?php echo $data->ID;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php endif; ?>
					
					<?php if(is_admin()): ?>
					<a href="#" class="btn btn-danger btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="delete_hospital"><i class="fa fa-trash"></i> Delete</a>
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
