<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
		<div class="page-title">
			<div class="title-env">
				<h1 class="title">Add Task</h1>
				<p class="description">Add Your Task</p>
			</div>
				<!-- breadcrumbs starts -->
			<div class="breadcrumb-env">
				<ol class="breadcrumb bc-1">
					<li>
						<a href="javascript:;"><i class="fa-home"></i>Home</a>
					</li>
					<li class="active">
						<strong>Manage Task</strong>
					</li>
					<li class="active">
						<strong>Add Task</strong>
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
							<h3 class="panel-title">Manage Task</h3>
						</div>
						<div class="panel-body">
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>pms/pms/SetTask">
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Employee Id</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="employeeId" id="field-1" placeholder="Employee Id" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->employee_id; }?>" >
									</div>
								</div> 
								<?php //if(isset($ApplicationProjectId)&&!empty($ApplicationProjectId)){ ?>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Project Id</label>
										<label class="col-sm-2 control-label" for="field-1"><?php //if(isset($ApplicationProjectId)&& !empty($ApplicationProjectId)) { echo $ApplicationProjectId[0]->project_description; }?></label>
									</div>-->
								<?php //} else { ?>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Project Id</label>
										<div class="col-sm-10">
										<select name="project_id" class="form-control selectboxit">
											<option></option>
											<optgroup label="Project List">
												<?php  foreach($ApplicationProjectList as $list){ ?>
												<option value="<?=$list->project_id?>" <?php if(isset($ApplicationTaskList)&&!empty($ApplicationTaskList)&&$list->project_id==$ApplicationTaskList[0]->project_id){ echo 'selected'; }  ?> ><?=$list->project_description; ?></option>
												<?php } ?>
											</optgroup>
										</select></div>
									</div>
								<?php // } ?>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Assign To</label>
									<div class="col-sm-10">
										<select name="employee_id" class="form-control selectboxit">
											<option></option>
											<optgroup label="Employee List">
												<?php  foreach($ApplicationEmployeeList as $list){ ?>
												<option value="<?=$list->employee_id?>" <?php if(isset($ApplicationTaskList)&&!empty($ApplicationTaskList)&&$list->employee_id==$ApplicationTaskList[0]->employee_id){ echo 'selected'; }  ?> ><?php echo $list->first_name; ?></option>
												<?php } ?>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Task Description</label>
									<div class="col-sm-10">
										<input type="text" class="form-control"  name="task_description" id="field-1" placeholder="Task Description" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->task_description; }?>" required >
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Organization Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="organization_desc" placeholder="Organization Description"  /></textarea>
									</div>
								</div>-->
								<input type="hidden" name="task_id" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->task_id; }?>">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Estimate Cost</label>
									<div class="col-sm-4">
										<div class="input-group input-group-lg spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="decrement">-</button>
											</span>
												<input type="text" name="estimate_cost" class="form-control text-center no-left-border" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->estimate_cost; }else{ echo '1'; }?>"  />
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="increment">+</button>
											</span>
										</div>
									</div>
									<label class="col-sm-2 control-label" for="field-1">Estimate Effort</label>
									<div class="col-sm-4">
										<div class="input-group input-group-lg spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="decrement">-</button>
											</span>
												<input type="text" name="estimate_effort" class="form-control text-center no-left-border" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->estimate_effort; }else{ echo '1'; }?>"  />
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="increment">+</button>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Actual Cost</label>
									<div class="col-sm-4">
										<div class="input-group input-group-lg spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="decrement">-</button>
											</span>
												<input type="text" name="actual_cost" class="form-control text-center no-left-border" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->actual_cost; }else{ echo '1'; }?>"  />
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="increment">+</button>
											</span>
										</div>
									</div>
									<label class="col-sm-2 control-label" for="field-1">Actual Effort</label>
									<div class="col-sm-4">
										<div class="input-group input-group-lg spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="decrement">-</button>
											</span>
												<input type="text" name="actual_effort" class="form-control text-center no-left-border" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->actual_effort; }else{ echo '1'; }?>"  />
											<span class="input-group-btn">
												<button class="btn btn-info btn-single" data-type="increment">+</button>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Estimate Start Date</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker"  name="estimate_start_date" id="field-1" placeholder="Estimate Start Date" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->estimate_start_date; }?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Actual Start Date</label>
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker"  name="actual_start_date" id="field-1" placeholder="Actual Start Date" value="<?php if(isset($ApplicationTaskList)&& !empty($ApplicationTaskList)) { echo $ApplicationTaskList[0]->actual_start_date; }?>" required >
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