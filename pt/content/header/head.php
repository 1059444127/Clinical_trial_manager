<?php
/**
* Header file for all pages
*/
if( !defined('ABSPATH') )
exit();
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- Bootstrap -->
<link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'/>
<link href="<?php echo CSS_URL;?>bootstrap.min.css" rel="stylesheet"/>
<!-- jQuery ui-->
<link href="<?php echo CSS_URL;?>jquery-ui.css" rel="stylesheet"/>
<!-- Font Awesome -->
<link href="<?php echo CSS_URL;?>font-awesome.min.css" rel="stylesheet"/>
<!-- iCheck -->
<link href="<?php echo CSS_URL;?>green.css" rel="stylesheet"/>
<!-- bootstrap-progressbar -->
<link href="<?php echo CSS_URL;?>bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"/>
<!-- jVectorMap -->
<link href="<?php echo CSS_URL;?>jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>buttons.bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>fixedHeader.bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>responsive.bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>scroller.bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>prettify.min.css" rel="stylesheet"/>
<!-- Select2 -->
<link href="<?php echo CSS_URL;?>select2.min.css" rel="stylesheet"/>
<!-- Switchery -->
<link href="<?php echo CSS_URL;?>switchery.min.css" rel="stylesheet"/>
<!-- starrr -->
<link href="<?php echo CSS_URL;?>starrr.css" rel="stylesheet"/>
<!-- P Notify -->
<link href="<?php echo CSS_URL;?>pnotify.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>pnotify.buttons.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>pnotify.nonblock.css" rel="stylesheet"/>
<!--Full Calendar-->
<link href="<?php echo CSS_URL;?>fullcalendar.min.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>fullcalendar.print.css" rel="stylesheet" media="print"/>
<!-- Custom Theme Style -->
<link href="<?php echo CSS_URL;?>custom.css" rel="stylesheet"/>
<link href="<?php echo CSS_URL;?>styles.css" rel="stylesheet"/>

<script>
	var site_url = '<?php echo site_url();?>';
	var ajax_url = '<?php echo PROCESS_URL;?>';
</script>
<?php
	require_once( ABSPATH . CONTENT . '/header/scripts.php');
?>
