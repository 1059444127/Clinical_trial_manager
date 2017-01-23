<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$current_user_id = get_current_user_id();
$args = array('user_id' => $current_user_id , 'hide' => 0);
$result1 = get_tabledata(TBL_NOTIFICATIONS,false,$args);

$per_page = 10;         // NUMBER OF RESULT SHOW PER PAGE
$total_results = count($result1); 	// GET TOTAL RECORDS
$total_pages = ceil($total_results / $per_page); 	// TOTAL PAGES 

//-------------if page is setcheck------------------//
if (isset($_GET['page'])):
	$show_page = $_GET['page'];  
	$show_page = ($show_page <= 0) ? 1 : $show_page;
	$show_page = ($show_page > $total_pages) ? $total_pages : $show_page;
	//it will telles the current page
	if ($show_page > 0 && $show_page <= $total_pages):
		$start = ($show_page - 1) * $per_page;
		$end = $per_page;
	else:
	// error - show first set of results
		$start = 0;              
		$end = $per_page;
	endif;
else:
	// if page isn't set, show first set of results
	$start = 0;
	$end = $per_page;
	$show_page = 1;
	
endif;

//PAGINATIONH QUERY 
$pagination_query = " ORDER BY `ID` DESC LIMIT $start, $end ";
$result = get_tabledata(TBL_NOTIFICATIONS,false,$args,$pagination_query );
$paginate_url = site_url().'/notifications';
if($result):
?>
	<div>
		<button class="btn btn-dark btn-sm read-notification" data-id="0" data-type="all">Mark all read</button>
		<button class="btn btn-dark btn-sm hide-notification" data-id="0" data-type="all">Hide all notifications</button>
		<div class="ln_solid"></div>
		<h2>Showing <?php echo $start + 1;?> - <?php echo $start + $end;?> notifications from <?php echo $total_results;?></h2>
		<div class="ln_solid"></div>
	</div>
	
	<ul class="messages">
		<?php
		foreach($result as $notifications):
			echo ($notifications->read == 0) ? '<li class="unread">' : '<li class="read">';
		?>
			<img src="<?php echo get_user_profile_image($notifications->user_id);?>" class="avatar" alt="Avatar">
			<div class="message_date">
				<h3 class="date text-info"><?php echo date('d',strtotime($notifications->date));?></h3>
				<p class="month"><?php echo date('M',strtotime($notifications->date));?></p>
			</div>
			<div class="message_wrapper">
				<h4 class="heading"><?php echo stripslashes($notifications->title);?> <small><?php echo date('M d, Y h:i a',strtotime($notifications->date));?></small></h4>
				<blockquote class="message"><?php echo stripslashes(htmlspecialchars_decode($notifications->notification));?></blockquote>
				<br/>
				<?php if($notifications->read == 0): ?>
				<button class="btn btn-xs btn-dark read-notification" data-id="<?php echo $notifications->ID;?>" data-type="single"><i class="fa fa-check"></i>&nbsp;Mark as read</button>
				<?php endif; ?>
				<button class="btn btn-xs btn-dark hide-notification" data-id="<?php echo $notifications->ID;?>"><i class="fa fa-dot-circle-o" data-type="single"></i>&nbsp;Hide Notification</button>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php if($total_results > $per_page): ?>
	<ul class="pagination pagination-split">
		<?php echo paginate($paginate_url,$show_page, $total_pages); ?>
	</ul>
	<?php endif;
else:
	echo page_not_found("Oops! There is no New Notifications",'  ',false);
endif;
?>