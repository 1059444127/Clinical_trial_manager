<?php
	global $db;
	$device = get_device_name();
	require_once( ABSPATH . CONTENT . '/process/login-process.php');
	require_once( ABSPATH . CONTENT . '/process/account-process.php');
	require_once( ABSPATH . CONTENT . '/process/setting-process.php');
	require_once( ABSPATH . CONTENT . '/process/notification-process.php');
	require_once( ABSPATH . CONTENT . '/process/hospital-process.php');
	require_once( ABSPATH . CONTENT . '/process/trial-process.php');
	require_once( ABSPATH . CONTENT . '/process/booking-process.php');
?>