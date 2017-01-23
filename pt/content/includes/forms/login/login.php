<?php 
// if accessed directly than exit
if (!defined('ABSPATH')){
    exit;
}
?>

<div class="row">
	<div class=" main-box">
		<div class="col-md-4 col-xs-12 pull-right">
			<form class="login-form" method="get" autocomplete="off">
				<h3 class="form-title">Sign In <i class="fa fa-lock"></i></h3>
				
				<div class="form-group">
					<label for="user_name">User name <span class="required">*</span></label>
					<input type="text" name="user_name" class="form-control input-sm" placeholder=""/>
				</div>
				<div class="form-group">
					<label for="user_pass">Password <span class="required">*</span></label>
					<input type="password" name="user_pass" class="form-control input-sm" placeholder=""/>
				</div>
				<span style="height:5px;display: block;">&nbsp;</span>
				<div class="form-group">
					<input type="hidden" name="action" value="user_login"/>
					<button class="btn btn-block btn-success btn-sm" type="submit"><i class="fa fa-lock"></i> Login</button>
				</div>
				<div class="form-group">
					<div class="alert alert-success">Signed in successfully...</div>
					<div class="alert alert-danger"></div>
				</div>
				<div class="form-group">
					<div class="text-center"><strong>OR</strong></div>
					<span style="height:5px;display: block;">&nbsp;</span>
					<button class="btn btn-block btn-warning btn-sm" type="button">Having problem in login ?</button>
				</div>
			</form>
		</div>
		<div class="col-md-7 col-xs-12 text-center hidden-xs ">
			<h1 class=" big-title">Randomised Clinical Trials manager</h1>
			<div class="ln_solid"></div>
			<ul class="list-inline features ">
				<li><a href="#" ><i class="fa fa-male"></i><i class="fa fa-female"></i> Medical Research and Development</a></li>
				<li><a href="#" ><i class="fa fa-group"></i> Staff management</a></li>
				<li><a href="#" ><i class="fa fa-graduation-cap"></i> Clinical Randomised Trials</a></li>
				<li><a href="#" ><i class=" fa fa-book"></i> Detailed Analytics and stuff</a></li>
			</ul>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>