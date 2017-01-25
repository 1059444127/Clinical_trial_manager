<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

if( !user_can('make_booking') || is_admin() ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
else:
?>
	<div id='calendar'></div>

	<!-- calendar modal -->
	<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h1 class="modal-title text-center text-uppercase" id="myModalLabel">Finalise Clinic</h1>
				</div>
				<div class="modal-body">
					<div id="booking_modal" style="padding: 5px 20px;">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark btn-block booking_close" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
	<!-- /calendar modal -->

	<!-- FullCalendar -->
	 <script>
		$(window).load(function() {
			var date = new Date(),
			d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear(),
			started,
			categoryClass;

			var calendar = $('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
				},
				selectable: true,
				selectHelper: true,
				select: false,
				eventClick: function(calEvent, jsEvent, view) {
					$('#fc_create').click();
					var date = new Date(calEvent._start._d);
					var schedule_date = date.toString('yyyy-MM-dd');
					get_available_clinics(schedule_date);
	  				calendar.fullCalendar('unselect');
				},
				editable: true,
				events: <?php echo get_calendar_data(); ?>
			});
		});
	</script>
	<!-- /FullCalendar -->
<?php endif; ?>