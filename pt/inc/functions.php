<?php
require_once( ABSPATH . INC . '/constant.php');
require_once( ABSPATH . INC . '/get-html-functions.php');
require_once( ABSPATH . INC . '/user-functions.php');


if ( !function_exists('require_db') ) :
	function require_db() {
		global $db;
		require_once( ABSPATH . INC . '/db.php' );
		if ( isset( $db ) )
			return;
		$db = new db( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	}
endif;

if ( !function_exists('site_url') ) :
	function site_url(){
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])):
			$url = 'https://';
		else:
			$url = 'http://';
		endif;
		$url .= $_SERVER['HTTP_HOST'];
		if ( defined('WEBPATH') )
			$url .= '/'.WEBPATH;
		return $url;	
	}
endif;

if( !function_exists('sanitize_user')) :
	function sanitize_user( $username, $strict = false ) {
		$raw_username = $username;
		$username = strip_all_tags( $username );
		// Kill octets
		$username = preg_replace( '|%([a-fA-F0-9][a-fA-F0-9])|', '', $username );
		$username = preg_replace( '/&.+?;/', '', $username ); // Kill entities
		// If strict, reduce to ASCII for max portability.
		if ( $strict )
			$username = preg_replace( '|[^a-z0-9 _.\-@]|i', '', $username );

		$username = trim( $username );
		// Consolidate contiguous whitespace
		$username = preg_replace( '|\s+|', ' ', $username );
		return $username;
	}
endif;

if( !function_exists('strip_all_tags')) :
	function strip_all_tags($string, $remove_breaks = false) {
		$string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
		$string = strip_tags($string);
		if ( $remove_breaks )
			$string = preg_replace('/[\r\n\t ]+/', ' ', $string);
		return trim( $string );
	}
endif;

if( !function_exists('absint')) :
	function absint( $maybeint ) {
		return abs( intval( $maybeint ) );
	}
endif;

if( !function_exists('get_option')) :
	function get_option($option){
		global $db;
		$value = '';
		$row = get_tabledata(TBL_OPTION, true, array('option_name' => $option));
		if ($row) {
			$value = maybe_unserialize($row->option_value);
		}
		return $value;
	}
endif;

if( !function_exists('add_option')) :
	function add_option( $option, $value = ''){
		global $db;
		$option = trim($option);
		if ( empty($option) )
			return false;
		$serialized_value = maybe_serialize( $value );
		$result = $db->query( sprintf("INSERT INTO ".TBL_OPTION." (`option_name`, `option_value`) VALUES (%s, %s) ON DUPLICATE KEY UPDATE `option_name` = VALUES(`option_name`), `option_value` = VALUES(`option_value`)", $option, $serialized_value ) );
		if ($result ){
			return true;
		}
		return false;
	}
endif;

if( !function_exists('update_option')) :
	function update_option( $option, $value = ''){
		global $db;
		$option = trim($option);
		if ( empty($option) )
			return false;
		$old_value = get_option( $option );
		if ( $value === $old_value )
			return false;
		$serialized_value = maybe_serialize( $value );
		$update_args = array(
			'option_value' => $serialized_value,
		);
		$check = get_tabledata(TBL_OPTION, false, array( 'option_name' => $option ));
		if($check):
			$result = $db->update( TBL_OPTION, $update_args, array( 'option_name' => $option ) );
		else:
			$result = $db->insert( TBL_OPTION, array( 'option_name' => $option , 'option_value' => $serialized_value) );
		endif; 
		
		if ($result ){
			return true;
		}
		return false;
	}
endif;

if( !function_exists('delete_option')) :
	function delete_option( $option ) {
		global $db;
		$option = trim( $option );
		if ( empty( $option ) )
			return false;
		$row = $db->get_row( sprintf("SELECT ID FROM ".TBL_OPTION." WHERE option_name = %s", $option ) );
		if ( is_null( $row ) )
			return false;

		$result = $wpdb->delete( TBL_OPTION, array( 'option_name' => $option ) );
		if ($result ){
			return true;
		}
		return false;
	}
endif;

if( !function_exists('maybe_serialize')) :
	function maybe_serialize( $data ) {
		if ( is_array( $data ) || is_object( $data ) )
			return serialize( $data );
		if ( is_serialized( $data, false ) )
			return serialize( $data );

		return $data;
	}
endif;

if( !function_exists('maybe_unserialize')) :
	function maybe_unserialize( $original ) {
		if ( is_serialized( $original ) ) // don't attempt to unserialize data that wasn't serialized going in
			return @unserialize( $original );
		return $original;
	}
endif;

if( !function_exists('is_serialized')) :
	function is_serialized( $data, $strict = true ) {
		// if it isn't a string, it isn't serialized.
		if ( ! is_string( $data ) ) {
			return false;
		}
		$data = trim( $data );
	 	if ( 'N;' == $data ) {
			return true;
		}
		if ( strlen( $data ) < 4 ) {
			return false;
		}
		if ( ':' !== $data[1] ) {
			return false;
		}
		if ( $strict ) {
			$lastc = substr( $data, -1 );
			if ( ';' !== $lastc && '}' !== $lastc ) {
				return false;
			}
		} else {
			$semicolon = strpos( $data, ';' );
			$brace     = strpos( $data, '}' );
			// Either ; or } must exist.
			if ( false === $semicolon && false === $brace )
				return false;
			// But neither must be in the first X characters.
			if ( false !== $semicolon && $semicolon < 3 )
				return false;
			if ( false !== $brace && $brace < 4 )
				return false;
		}
		$token = $data[0];
		switch ( $token ) {
			case 's' :
				if ( $strict ) {
					if ( '"' !== substr( $data, -2, 1 ) ) {
						return false;
					}
				} elseif ( false === strpos( $data, '"' ) ) {
					return false;
				}
				// or else fall through
			case 'a' :
			case 'O' :
				return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
			case 'b' :
			case 'i' :
			case 'd' :
				$end = $strict ? '$' : '';
				return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
		}
		return false;
}
endif;

if( !function_exists('get_site_name')) :
	function get_site_name(){
		$value = get_option('site_name');
		$return = ($value != '') ? $value : BLOG_NAME;
		return $return;
	}
endif;

if( !function_exists('get_site_description')) :
	function get_site_description(){
		$value = get_option('site_description');
		$return = ($value != '') ? $value : '';
		return $return;
	}
endif;

if( !function_exists('password_generator')) :
	function password_generator(){
		if( function_exists('uniqid')) :
			return md5(uniqid(rand(),true));
		else:				
			$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWVXYZ01234567890!@#$%^&*~';
			$token = '';					
			for ($x = 0; $x < 8; $x++){						
				$token .= $chars[ rand(0, strlen($chars)-1) ];				
			}
			return $token;
		endif;		
	}
endif;

if( !function_exists('createThumb')) :
	//function for creating image thumbnail
	function createThumb($path1, $path2, $file_type, $new_w, $new_h, $squareSize = ''){
		/* read the source image */
		$source_image = FALSE;
		
		if (preg_match("/jpg|JPG|jpeg|JPEG/", $file_type)) {
			$source_image = imagecreatefromjpeg($path1);
		}
		elseif (preg_match("/png|PNG/", $file_type)) {
			
			if (!$source_image = @imagecreatefrompng($path1)) {
				$source_image = imagecreatefromjpeg($path1);
			}
		}
		elseif (preg_match("/gif|GIF/", $file_type)) {
			$source_image = imagecreatefromgif($path1);
		}		
		if ($source_image == FALSE) {
			$source_image = imagecreatefromjpeg($path1);
		}

		$orig_w = imageSX($source_image);
		$orig_h = imageSY($source_image);
		
		if ($orig_w < $new_w && $orig_h < $new_h) {
			$desired_width = $orig_w;
			$desired_height = $orig_h;
		} else {
			$scale = min($new_w / $orig_w, $new_h / $orig_h);
			$desired_width = ceil($scale * $orig_w);
			$desired_height = ceil($scale * $orig_h);
		}
				
		if ($squareSize != '') {
			$desired_width = $desired_height = $squareSize;
		}

		/* create a new, "virtual" image */
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
		// for PNG background white----------->
		$kek = imagecolorallocate($virtual_image, 255, 255, 255);
		imagefill($virtual_image, 0, 0, $kek);
		
		if ($squareSize == '') {
			/* copy source image at a resized size */
			imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
		} else {
			$wm = $orig_w / $squareSize;
			$hm = $orig_h / $squareSize;
			$h_height = $squareSize / 2;
			$w_height = $squareSize / 2;
			
			if ($orig_w > $orig_h) {
				$adjusted_width = $orig_w / $hm;
				$half_width = $adjusted_width / 2;
				$int_width = $half_width - $w_height;
				imagecopyresampled($virtual_image, $source_image, -$int_width, 0, 0, 0, $adjusted_width, $squareSize, $orig_w, $orig_h);
			}

			elseif (($orig_w <= $orig_h)) {
				$adjusted_height = $orig_h / $wm;
				$half_height = $adjusted_height / 2;
				imagecopyresampled($virtual_image, $source_image, 0,0, 0, 0, $squareSize, $adjusted_height, $orig_w, $orig_h);
			} else {
				imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $squareSize, $squareSize, $orig_w, $orig_h);
			}
		}
		
		if (@imagejpeg($virtual_image, $path2, 90)) {
			imagedestroy($virtual_image);
			imagedestroy($source_image);
			return TRUE;
		} else {
			return FALSE;
		}
	}
endif;

if( !function_exists('paginate')) :
	//function for getting paginate list
	function paginate($url, $page, $tpages) {
		$adjacents = 2;
		$prevlabel = "&laquo;";
		$nextlabel = "&raquo;";
		$first = "&larr;";
		$last = "&rarr;";
		$out = "";
		// previous
		if ($page == 1) {
			$out.= "<li class=\"disabled\"  aria-label=\"Previous\"><a href='javascript:void(0);'><span aria-hidden=\"true\">". $first. "</span></a></li>\n";
			$out.= "<li class=\"disabled\"  aria-label=\"Previous\"><a href='javascript:void(0);'><span aria-hidden=\"true\">" . $prevlabel . "</span></a></li>\n";
		} elseif ($page == 2) {
			$out.= "<li><a  href=\"" . $url . "/?page=1" . "\">". $first. "</a></li>";
			$out.= "<li><a  href=\"" . $url . "/?page=" . ($page - 1) .  "\">" . $prevlabel . "</a></li>";
		} else {
			$out.= "<li><a  href=\"" . $url . "/?page=1" . "\">". $first. "</a></li>";
			$out.= "<li><a  href=\"" . $url . "/?page=" . ($page - 1) .  "\">" . $prevlabel . "</a></li>";
		}
	  
		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out.= "<li  class=\"active\"><a href='javascript:void(0);'>" . $i . "</a></li>";
			} elseif ($i == 1) {
				$out.= "<li><a  href=\"" . $url . "/?page=" . $i . "\">" . $i . "</a></li>";
			} else {
				$out.= "<li><a  href=\"" . $url . "/?page=" . $i .  "\">" . $i . "</a></li>";
			}
		}
	    
		if ($page < ($tpages - $adjacents)) {
			$out.= "<li><a href=\"" . $url . "/?page=" . $tpages .  "\">" . $tpages . "</a></li>";
		}
		// next
		if ($page < $tpages) {
			$out.= "<li><a  href=\"" . $url . "/?page=" . ($page + 1) .  "\">" . $nextlabel . "</a></li>";
			$out.= "<li><a  href=\"" . $url . "/?page=" .$tpages. "\">". $last. "</a></li>";
		} else {
			$out.= "<li class=\"disabled\" aria-label=\"Next\"><a href='javascript:void(0);' ><span aria-hidden=\"true\">" . $nextlabel . "</span></a></li>";
			$out.= "<li class=\"disabled\" aria-label=\"Next\"><a href='javascript:void(0);' ><span aria-hidden=\"true\">". $last. "</span></a></li>";
		}
		$out.= "";
		return $out;
	}
endif;


if ( !function_exists('login_check') ) :
	function login_check(){
		if(!is_user_logged_in()):
			$uri = site_url();
			header("location:".$uri);
			die();
		endif;
	}
endif;

if ( !function_exists('page_not_found') ) :
	function page_not_found($msg1='', $msg2= '',$btn_status = true){
		
		if($msg1 == ''){
			$msg1 = 'Oops ! Something Went Wrong.';
		}
		if($msg2 == ''){
			$msg2 = 'Please try again !!';
		}
		ob_start();
		?>
		<div class="row">
			<div class="col-xs-12">
				<div class="not-found-page text-center">
					<h1 class="green"><i class="fa fa-frown-o fa-5x"></i></h1>
					<h1><?php echo stripslashes($msg1);?></h1>
					<h4><?php echo stripslashes($msg2);?></h4>
					<p>&nbsp;</p>
					<?php if( $btn_status === true): ?>
					<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-sm btn-dark"><i class="fa fa-long-arrow-left"></i> &nbsp;Go Back </a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
		$content = ob_get_clean();
		return $content;
	}
endif;

if ( !function_exists('send_email') ) :
	function send_email($from,$name,$reply_email,$to,$subject,$body,$attachment_files = ''){	
		require_once( ABSPATH . INC. '/phpmailer/PHPMailerAutoload.php');	
		$mail = new PHPMailer();
		if(SMTP_STATUS == '1'):
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = SMTP_SECURE;
			$mail->Host = SMTP_HOST;
			$mail->Port = SMTP_PORT;
			$mail->Username = SMTP_USER;
			$mail->Password = SMTP_PASS;
		endif;
		$mail->CharSet = 'UTF-8';
		$mail->SetFrom($from,$name,0);
		$mail->AddReplyTo($reply_email);
		$mail->AddAddress($to);
		
		if($attachment_files != '' || !empty($attachment_files)){
			foreach($attachment_files as $name=>$file){
				$file_to_attach = $attachment_files['tmp_name'][$name];
				$mail->AddAttachment($file_to_attach);
			}
		}
		$mail->Subject = $subject;
		$mail->Body =$body;
		$mail->isHtml(true);
		if($mail->send()){
			return true;
		}else{
			return false;
		}
	} 
endif;

if ( !function_exists('get_unread_notification_count') ) :
	function get_unread_notification_count(){
		global $db;
		$current_user_id = get_current_user_id();
		$result = get_tabledata(TBL_NOTIFICATIONS,false,array(
			'user_id' => $current_user_id,
			'hide' => 0,
			'read' => 0
		));
		return count($result);
	}
endif;

if ( !function_exists('get_device_name') ) :
	function get_device_name(){
		require_once( ABSPATH . INC. '/Mobile_Detect.php');
		$detect = new Mobile_Detect;
		if($detect->isTablet() ){
			$device = 'Tablet';
		}else	if( $detect->isMobile() && !$detect->isTablet() ){
			$device = 'Mobile';
		}else{
			$device = 'Desktop/Laptop';
		}
		return $device;
	}
endif;

if ( !function_exists('add_user_notification') ) :
	function add_user_notification($args){
		global $db;
		if(!empty($args)){
			$current_user_id = get_current_user_id();
			$args['user_id'] = $current_user_id;
			$db->insert(TBL_NOTIFICATIONS,$args);
		}
	}
endif;

if ( !function_exists('get_replaced_string') ) :
	function get_replaced_string($short_code,$hash,$text){
		return str_replace($short_code,$hash,$text);
	}
endif;

if ( !function_exists('get_tabledata') ) :
	function get_tabledata($table,$single = true, $where = array() , $extra = '', $select = '*'){
		global $db;
		if($table == null || $table == null)
			return false;
		
		if(is_array($select)){
			$select = implode(',',$select);
		}
		
		$query = "SELECT ".$select." FROM $table ";
		
		if(!empty($where) ){
			foreach ( $where as $field => $value ) {
				if ( is_null( $value ) ) {
					$conditions[] = "`$field` IS NULL";
					continue;
				}
				$conditions[] = "`$field` = '". $value ."' ";
			}
			$conditions = implode( ' AND ', $conditions );
			$query .= " WHERE ".$conditions ." " ;
		}
		
		if($extra != '')
			$query .= $extra;
			
		if($single)
			return $db->get_row($query);
		else
			return $db->get_results($query);
	}
endif;

if ( !function_exists('get_option_data') ) :
	function get_option_data($data, $args , $hospital_name = false){
		if($data == null || empty($data))
			return false;
		if($args == null || empty($args))
			return false;
		
		$return = array();
		
		foreach($data as $val){
			$extra = '';
			if(is_admin() && $hospital_name):
				$hospital = get_tabledata(TBL_HOSPITALS,true,array('ID' => $val->hospital));
				$extra = ' ( '.stripslashes($hospital->name).' )';
			endif;		
			$return[$val->$args[0]] = $val->$args[1].$extra;
		}
		
		return $return;
	}	
endif;

if ( !function_exists('short_text') ) :
	function short_text($value = '', $len = 100){
		if($value == '' || $value == null)
			return false;
		
		$len = $len;
		
		if($len == 0)
			$len = 100;
			
		if(strlen($value) > $len){
			$value = substr($value,0,70) . '...';
		}
		
		return $value;
	}
endif;

if ( !function_exists('get_calendar_data') ) :
	function get_calendar_data(){
		global $db;
        
		$results = get_tabledata(TBL_CLINICS,false,array(),'GROUP BY `schedule`',array('COUNT(ID) as count' , 'schedule'));

        //should only show current hospitals clinics
		if($results):
			$return = array();
			foreach($results as $data):
        
				array_push($return, array('title' => 'Available Clinics ('.$data->count.')' , 'start' => date('Y-m-d',strtotime($data->schedule ) ) ) );
        
			endforeach;
			return json_encode($return);
		else:
			return false;
		endif;
	}
endif;





if ( !function_exists('get_available_clinics') ) :
	function get_available_clinics($date){
		global $db;
		$results = get_tabledata(TBL_CLINICS,false,array('schedule' => $date));
		if($results):
			ob_start();
			?>
			<ul class="list-unstyled booking_clinics top_profiles scroll-view">
			<?php 
			foreach($results as $data):
        if($data->booked == 0){
				$trial = get_tabledata(TBL_TRIALS,true, array('ID' => $data->trial));
				$hospital = get_tabledata(TBL_HOSPITALS,true, array('ID' => $data->hospital));
				$room = get_tabledata(TBL_ROOMS,true, array('ID' => $data->room));
				?>
				  <li class="media event">
					<a class="pull-left border-aero profile_thumb"><i class="fa fa-h-square aero"></i></a>
					<div class="media-body">
						<div class="col-xs-12 col-sm-8">
							<a class="title" href="#" onclick="javascript:void(0);">
								<strong>Hospital : </strong><?php echo stripslashes($hospital->name);?> (<?php echo stripslashes($room->name);?>)
							</a>
							<p><strong> Trial : </strong> <?php echo stripslashes($trial->name);?></p>
                            <p><strong> Expected Participants: </strong> <?php echo stripslashes($data->expected);?></p>
							<p><small><?php echo date('M d, Y', strtotime($data->schedule));?></small></p>
                            
                            
						</div>
						<div class="col-xs-12 col-sm-4">
							<?php if(is_clinic_booked($data->ID)): ?>
								<button class="btn btn-dark btn-md booking-btn" onclick="javascript:void(0);"><i class="fa fa-check-square"></i>&nbsp; COMPLETED</button>
							<?php else: ?>
    
                            
    <form  method="post">
        <p>Number consented: </p>
    <input type="text" name="num" value = "0" >
								<button class="btn btn-success btn-md booking-btn" data-id="<?php echo $data->ID;?>" onclick="javascript:book_clinic(this);"><i class="fa fa-plus-square"></i>&nbsp; COMPLETE</button>
        
    </form>

							<?php endif;?>
						</div>
					</div>
				</li>
				<?php
        }
			endforeach;
			?>
			</ul>
			<?php 
			$return = ob_get_clean();
			return $return;
		else:
			return false;
		endif;
	}
endif;

if ( !function_exists('is_clinic_booked') ) :

	function is_clinic_booked($clinic){
		$current_user_id = get_current_user_id();
		
		$validation_args = array(
			'clinic' => $clinic,
			'user_id' => $current_user_id
		);
		
		if(is_value_exists(TBL_BOOKINGS,$validation_args)){
			return true;
		}
		
		return false;
	}
endif;

if ( !function_exists('get_guid') ) :
	function get_guid($table_name, $length = 6){
		if($length < 2)		
			$length = 6;
					
		do{
			$pass = '';			
			$allowed_characters = array(1,2,3,4,5,6,7,8,9,0);
			for($i = 1;$i <= $length; $i++){
				$pass .= $allowed_characters[rand(0, count($allowed_characters) - 1)];
			}
			$pass = '10000' . $pass;
			if(!is_in_table($table_name,$pass))
				break;				
		}while (true);				
		return $pass;    		
	}
endif;

if ( !function_exists('is_in_table') ) :
	function is_in_table($table_name,$id){
		$data = get_tabledata($table_name, false, array('ID' => $id));
		if($data)
			return true;
			
		return false;
	}	
endif;
?>