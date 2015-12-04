<?php //print_r( $list_organization);?>
<!-- Signup page starts  -->
<!-- added by palak on 22ndjune -->
<body class="page-body login-page login-light">
<div class="login-container">
	<div class="row">
		<div class="col-sm-6">
			<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},
								
								passwd: {
									required: true
								}
							},
							
							messages: {
								username: {
									required: 'Please enter your username.'
								},
								
								passwd: {
									required: 'Please enter your password.'
								}
							},
							
							// Form Processing via AJAX
							submitHandler: function(form)
							{
								show_loading_bar(70); // Fill progress bar to 70% (just a given value)
								
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-full-width",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
									
								$.ajax({
									url: "data/login-check.php",
									method: 'POST',
									dataType: 'json',
									data: {
										do_login: true,
										username: $(form).find('#username').val(),
										passwd: $(form).find('#passwd').val(),
									},
									success: function(resp)
									{
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function(){
												
												// Redirect after successful login page (when progress bar reaches 100%)
												if(resp.accessGranted)
												{
													window.location.href = 'dashboard-1.html';
												}
																						}
										});
										
																			
										// Remove any alert
										$(".errors-container .alert").slideUp('fast');
										
										
										// Show errors
										if(resp.accessGranted == false)
										{
											$(".errors-container").html('<div class="alert alert-danger">\
												<button type="button" class="close" data-dismiss="alert">\
													<span aria-hidden="true">&times;</span>\
													<span class="sr-only">Close</span>\
												</button>\
												' + resp.errors + '\
											</div>');
											
											
											$(".errors-container .alert").hide().slideDown();
											$(form).find('#passwd').select();
										}
									}
								});
								
							}
						});
						
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				<!-- Errors container -->
		
				<div class="errors-container">
<?php if($this->session->flashdata('category_error')) { ?>
								<div class="row-fluid">
									<div class="alert alert-danger" >
										<strong><?=$this->session->flashdata('message')?></strong> 
									</div>
								</div>
<?php } ?>
				</div>
				
				<!-- Add class "fade-in-effect" for login form effect -->

				<form method="post" role="form" id="" class="login-form fade-in-effect" action="<?=base_url();?>login/sign_up">
					<div class="login-header">
						<img src="<?php echo base_url(); ?>assets/images/junctionerplogo.png" alt="" width="300" />
						<p>Dear user, Registerd your organization !</p>
					</div>
					<span id="chk_org"></span>
					<div class="form-group">
						<label class="control-label" for="password-2">Please Enter Organization Name</label>
						<input type="text" class="form-control" name="organization_name" id="password-2" autocomplete="off"  onchange="check_organization(this.value)" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="">mail id</label>
						<input type="text" class="form-control" name="usermailid" id="email" autocomplete="off" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" onchange="email_chek(this.value)" />
					</div>
					<div class="form-group">
						<label class="control-label" for="">User name</label>
						<input type="text" class="form-control" name="username" id="username" autocomplete="off" required onchange="userid(this.value)" />
					</div>
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="">Re Enter Password</label>
						<input type="password" class="form-control" name="password" id="re-passwd" autocomplete="off" required onchange="validation(this.value)" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary  btn-block text-left">
							<i class="fa-lock"></i>
							Sign up
						</button>
					</div>
					<div class="login-footer">
						<a href="login/forget_pwd">Forgot your password?</a>
						<br>Already User ? <a href="<?php //echo base_url(); ?>login/login_view"> Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- login container ends -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/common_function.js"></script>
