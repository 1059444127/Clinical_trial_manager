<?php
$db_name = 'randomise';
$db_user = 'root';
$db_password = '';
$db_host = 'localhost';
$webpath = 'WebProjects/randomisation/pt';
if($_SERVER['SERVER_ADDR'] == '10.161.146.74' || $_SERVER['SERVER_ADDR'] == '10.161.128.46') {
	$db_user = 'markyhb';
	$db_password = 'ore28gon';
	$db_host = '10.161.128.194';
	$webpath = 'WebProjects/randomisation/randomisation_website/pt';
	if($_SERVER['SERVER_ADDR'] == '10.161.146.74') {
		$webpath = 'trialRandomisation';
	}
}
define('DB_NAME', $db_name);
define('DB_USER', $db_user);
define('DB_PASSWORD', $db_password);
define('DB_HOST', $db_host);
define( 'INC', 'inc' );
define( 'CONTENT', 'content' );
define('WEBPATH', $webpath);

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
?>


