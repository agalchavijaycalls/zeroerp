<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Add Project</h1>
			<p class="description">Add Your Project</p>
		</div>
		<!-- breadcrumbs starts -->
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1">
				<li>
					<a href="javascript:;"><i class="fa-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Manage Project</strong>
				</li>
				<li class="active">
					<strong>Add Project</strong>
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
							<h3 class="panel-title">Manage Project</h3>
						</div>
						<div class="panel-body">
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>pms/pms/SetProject">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Project Description</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="project_description" id="field-1" placeholder="Project Description" value="<?php if(isset($ApplicationProjectList)&& !empty($ApplicationProjectList)) { echo $ApplicationProjectList[0]->project_description; }?>" required >
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Organization Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="organization_desc" placeholder="Organization Description"  /></textarea>
									</div>
								</div>-->
								<input type="hidden" name="project_id" value="<?php if(isset($ApplicationProjectList)&& !empty($ApplicationProjectList)) { echo $ApplicationProjectList[0]->project_id; }?>">
								<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Assign To</label>
										<div class="col-sm-10">
										<select name="employee_id" class="form-control selectboxit">
											<option></option>
											<optgroup label="Employee List">
												<?php  foreach($ApplicationEmployeeList as $list){ ?>
												<option value="<?=$list->employee_id?>" <?php if(isset($ApplicationProjectList)&&!empty($ApplicationProjectList)&&$list->employee_id==$ApplicationProjectList[0]->project_id){ echo 'selected'; }  ?> ><?php echo $list->first_name; ?></option>
												<?php } ?>
											</optgroup>
										</select></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Estimate Cost</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="estimate_cost" id="field-1" placeholder="Estimate Cost" value="<?php if(isset($ApplicationProjectList)&& !empty($ApplicationProjectList)) { echo $ApplicationProjectList[0]->estimate_cost; }?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Estimate Effort</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="estimate_effort" id="field-1" placeholder="Estimate Effort" value="<?php if(isset($ApplicationProjectList)&& !empty($ApplicationProjectList)) { echo $ApplicationProjectList[0]->estimate_effort; }?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Start Date</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker"  name="start_date" id="field-1" placeholder="Start Date" value="<?php if(isset($ApplicationProjectList)&& !empty($ApplicationProjectList)) { echo $ApplicationProjectList[0]->start_date; }?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Completion Date</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker"  name="completion_date" id="field-1" placeholder="Completion Date" value="<?php if(isset($ApplicationProjectList)&& !empty($ApplicationProjectList)) { echo $ApplicationProjectList[0]->completion_date; }?>" required >
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