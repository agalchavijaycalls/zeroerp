<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Add Registration</h1>
					<p class="description">Add Your Registration</p>
				</div>
				<!-- breadcrumbs starts -->
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<strong>Manage Registration</strong>
								</li>
							<li class="active">
											
										<strong>Add Registration</strong>
								</li>
								</ol>
								
				</div>
				<!-- breadcrumbs ends -->	
			</div>
			<!-- page title closed -->
			<!-- body container  starts -->
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Manage Registration</h3>
						</div>
						<div class="panel-body">
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>employee/SetNewRegistration">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">IMEI</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="imei" id="field-1" placeholder="IMEI Number" required >
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Organization Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="organization_desc" placeholder="Organization Description"  /></textarea>
									</div>
								</div>-->
								<input type="hidden" name="device" value="web">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="name" id="field-1" placeholder="Name" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Mobile Number</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="number" id="field-1" placeholder="Mobile Number" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Password</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="password" id="field-1" placeholder="Password" required >
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">Submit</button>
									<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- body container ends starts -->
		</div><!-- main content div end -->
	</div><!-- page container div end -->