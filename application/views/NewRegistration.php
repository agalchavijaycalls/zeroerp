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
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>pms/pms/SetNewRegistration">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">IMEI</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="imei" id="field-1" placeholder="IMEI Number" value="<?php if(isset($ApplicationRegistrationList)&& !empty($ApplicationRegistrationList)) { echo $ApplicationRegistrationList[0]->imei; }?>" required >
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Organization Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="organization_desc" placeholder="Organization Description"  /></textarea>
									</div>
								</div>-->
								<input type="hidden" name="RegistrationId" value="<?php if(isset($ApplicationRegistrationList)&& !empty($ApplicationRegistrationList)) { echo $ApplicationRegistrationList[0]->registration_id; }?>">
								<input type="hidden" name="device" value="web">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Employee Id</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="employeeId" id="field-1" placeholder="Employee Id" value="<?php if(isset($ApplicationRegistrationList)&& !empty($ApplicationRegistrationList)) { echo $ApplicationRegistrationList[0]->employee_id; }?>" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="name" id="field-1" placeholder="Name" value="<?php if(isset($ApplicationRegistrationList)&& !empty($ApplicationRegistrationList)) { echo $ApplicationRegistrationList[0]->name; }?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Mobile Number</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="number" id="field-1" placeholder="Mobile Number" value="<?php if(isset($ApplicationRegistrationList)&& !empty($ApplicationRegistrationList)) { echo $ApplicationRegistrationList[0]->number; }?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control"  name="password" id="field-1" placeholder="Password" value="<?php if(isset($ApplicationRegistrationList)&& !empty($ApplicationRegistrationList)) { echo $ApplicationRegistrationList[0]->password; }?>" required >
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