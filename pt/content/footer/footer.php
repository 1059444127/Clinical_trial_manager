<?php 
// if accessed directly than exit
if (!defined('ABSPATH')){
    exit;
}
?>
 <footer>
	<div class="pull-right">
		Copyright &copy; <?php echo date('Y');?> <?php echo get_site_name();?> &ndash; Developed by <strong>Royal Surrey County Hospital | </strong>Scientific Computing</a>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- Custom Theme Scripts -->
<?php echo get_wp_scripts(); ?>
