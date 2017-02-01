<?php
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ( file_exists( ABSPATH . 'config.php') )
	require_once( ABSPATH . 'config.php' );

if ( file_exists( ABSPATH . INC .  '/functions.php') )
	require_once( ABSPATH . INC . '/functions.php' );

require_db();

define('INC_URL', site_url() . '/' . INC);
define('CONTENT_URL', site_url() . '/' . CONTENT);
define('CSS_URL', site_url() . '/' . CONTENT .'/assets/css/');
define('JS_URL', site_url() . '/' . CONTENT .'/assets/js/');
define('IMAGE_URL', site_url() . '/' . CONTENT .'/assets/img/');
define('PROCESS_URL', site_url() . '/' . INC .'/process.php');
?>