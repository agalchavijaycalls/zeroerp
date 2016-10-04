<!-- login page starts  -->
<!-- added by palak on 20thjune -->
<body class="page-body  login-page login-light">
<div class="login-container">
	<div class="row">
		<div class="col-sm-6">
			<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
							// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
			</script>
				
				<!-- Errors container -->
				<div class="errors-container">
				<?php  if($this->session->flashdata('category_error')) { ?>
								<div class="row-fluid">
									<div class="alert alert-danger">
										<strong><?=$this->session->flashdata('message')?></strong> 
									</div>
								</div>
<?php } ?>
				<?php  if($this->session->flashdata('category_success')) { ?>
								<div class="row-fluid">
									<div class="alert alert-success">
										<strong><?=$this->session->flashdata('message')?></strong> 
									</div>
								</div>
<?php } ?>
									
				</div>
				
				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form"  class="login-form fade-in-effect" action="<?=base_url();?>login/login_user">
					
					<div class="login-header">
					
							<img src="<?php echo base_url(); ?>assets/images/junctionerplogo.png" alt="" width="300" />
				
						
						<p>Dear user, log in to access the admin area!</p>
					</div>
					<div class="form-group">
									<select class="form-control selectboxit" id="" name="organization_name">
										<option></option>
										<optgroup label="Organizations">
										<?php foreach($list_organization as $list){?>
											<option value="<?php echo $list->organization_id?>"><?php echo $list->organization_name; ?></option>
										<?php } ?>
										</optgroup>
									</select>
					</div> 
					
					<div class="form-group">
						<label class="control-label" for="username">User id</label>
						<input type="text" class="form-control" name="user_id" id="username" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-theme btn-block text-left">
							<i class="fa-lock"></i>
							Log In
						</button>
					</div>
					
					<div class="login-footer">
						<a href="login/forget_pwd">Forgot your password?</a>
						<br>New User ? <a href="<?php echo base_url(); ?>login"> Sign Up</a>
					
						
					</div>
					
				</form>
				
				
				
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<footer class="main-footer sticky footer-type-1" style="margin-right: 0px;">
					<div class="footer-inner">
						<!-- Add your copyright text here -->
						<div class="footer-text text-black" >
								&copy; <?php echo date("Y"); ?> 
								<strong >Junction ERP.Copyright<a href="http://junctiontech.in/" target="_blank"> Junction Software Pvt.Ltd	</a></strong> 
								Mobile Number- 8109069226 				
						</div>
							<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
							<div class="go-up">
								<a href="javascript:;" rel="go-top">
									<i class="fa-angle-up"></i>
								</a>
						  </div>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/resizeable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/joinable.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-api.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/xenon-toggles.js"></script>
	<!-- select 2 Scripts -->
	<script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<!-- select 2 Scripts -->
<!-- login container ends -->