<?php 
// if accessed directly than exit
if (!defined('ABSPATH')){
    exit;
}

//function for getting the head files
function get_wp_head(){
	ob_start();
	require_once(ABSPATH . CONTENT . '/header/head.php');
	$content = ob_get_clean();
	return $content;
}

//function for getting the header
function get_wp_header(){
	ob_start();
	require_once(ABSPATH . CONTENT . '/header/header.php');
	$content = ob_get_clean();
	return $content;
}

//function fot getting header for home page
function get_home_page_header(){
	ob_start();
	?>
	<nav>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo get_site_name();?></h1>
					<p><?php echo get_site_description();?></p>	
				</div>
			</div>
		</div>
	</nav>
	<?php
	$content = ob_get_clean();
	return $content;
}

//function for getting footer for home page
function get_home_page_footer($fixed = ''){
	ob_start();
	?>
	<div class="home-footer <?php echo $fixed; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="pull-left"><small>Copyright &copy; 2016 <?php echo get_site_name();?> &ndash; All copyrights reserved</small></div>
					<div class="pull-right"><small> Website Developed by <strong>Royal Surrey County Hospital | </strong>Scientific Computing</a></small></div><div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	$content = ob_get_clean();
	return $content;
}

//function for getting the sidebar menu
function get_sidebar_menu(){
	ob_start();
	require_once(ABSPATH . CONTENT . '/header/sidebar.php');
	$content = ob_get_clean();
	return $content;
}

//function for getting the sidebar menu
function get_top_nav(){
	ob_start();
	require_once(ABSPATH . CONTENT . '/header/topbar.php');
	$content = ob_get_clean();
	return $content;
}

//function for getting the footer
function get_wp_footer(){
	ob_start();
	require_once(ABSPATH . CONTENT . '/footer/footer.php');
	$content = ob_get_clean();
	return $content;
}

//function for getting the scripts
function get_wp_scripts(){
	ob_start();
	require_once(ABSPATH . CONTENT . '/footer/scripts.php');
	$content = ob_get_clean();
	return $content;
}

//function for getting page header
function get_page_header($title,$status = true){
	ob_start();
	?>
	<div class="page-title">
		<div class="title_left">
			<h3><?php echo stripslashes($title);?></h3>
		</div>
		
		<?php if($status === true): ?>
		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>
	<?php 
	$content = ob_get_clean();
	return $content;
}

//function for getting text editor
function wp_editor($id,$value=''){
	ob_start();
	?>
	<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#<?php echo$id;?>-box">
		<div class="btn-group">
			<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font">
				<i class="fa fa-font"></i><b class="caret"></b>
			</a>
			<ul class="dropdown-menu"></ul>
		</div>

		<div class="btn-group">
			<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height">
				</i>&nbsp;<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a data-edit="fontSize 5">
						<p style="font-size:17px">Huge</p>
					</a>
				</li>
				<li>
					<a data-edit="fontSize 3">
						<p style="font-size:14px">Normal</p>
					</a>
				</li>
				<li>
					<a data-edit="fontSize 1">
						<p style="font-size:11px">Small</p>
					</a>
				</li>
			</ul>
		</div>

		<div class="btn-group">
			<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
			<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
			<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
			<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
		</div>

		<div class="btn-group">
			<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
			<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
			<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
			<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
		</div>

		<div class="btn-group">
			<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
			<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
			<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
			<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
		</div>

		<div class="btn-group">
			<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
			<div class="dropdown-menu input-append">
				<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
				<button class="btn" type="button">Add</button>
			</div>
			<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
		</div>

		<div class="btn-group">
			<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
			<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
		</div>

		<div class="btn-group">
			<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
			<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
		</div>
	</div>

	<div id="<?php echo $id;?>-box" class="editor-box editor-wrapper" data-id="<?php echo $id;?>"><?php echo $value;?></div>

	<textarea name="<?php echo $id;?>" id="<?php echo $id;?>" style="display:none;"><?php echo $value;?></textarea>

	<br />

	<div class="ln_solid"></div>
	<?php
	$content = ob_get_clean();
	return $content;
}

function get_options_list($data, $value = array()){
	$selected = '';
	$return = '<option value=""></option>';
	
	if($data == null || $data == '' || !is_array($data) || empty($data))
		return $data;
	
	if(!is_array($value)){
		if($value == '' || $value == null){
			$value = array();
		}else{
			$value = (array)$value;	
		}
	}
	foreach($data as $key => $val):
		$selected = (!empty($value) && in_array($key,$value) ) ? 'selected' : '';
			$return .= '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
	endforeach;
	
	return $return;
}
?>
