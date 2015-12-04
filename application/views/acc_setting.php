<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Change Password</h1>
		<p class="description">Change Password</p>
	</div>
		<!-- breadcrumbs starts -->
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="javascript:;"><i class="fa-home"></i>Home</a>
			</li>
			<li class="active">
				<strong>Manage Organization</strong>
			</li>
			<li class="active">
				<strong>Add Organization</strong>
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
		<?php if($this->session->flashdata('category_error')){ ?>
		<div class="from-group">
		<div class="alert alert-danger">
		<strong><?php echo $this->session->flashdata('message');?> </strong>
		</div>
		</div>
		<?php } ?>
			<div class="panel-heading">
				<h3 class="panel-title">Change password</h3>
			</div>
			<div class="panel-body">
				<form role="form" class="form-horizontal" method="post" action="<?php echo base_url();?>role/change_pass">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Old Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="old_password" id="field-1" placeholder="Enter Password"  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">New Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" id="field-1" placeholder="Enter Password"  >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="" id="field-1" placeholder="Enter Conform Password"  >
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