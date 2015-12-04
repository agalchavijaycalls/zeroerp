<?php $userdata= $this->session->userdata('user_data');
$id = $userdata['organization_id'];
$su = $userdata['role_id'];
?>
<!-- Add emp  added by palak on 22ndjune -->
<!-- Add emp body starts -->

		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title"><?=(isset($select_emp))?"Edit":"Add"?> Employee</h1>
					<p class="description"><?=(isset($select_emp))?"Edit":"Add"?> Your Employee</p>
				</div>
				
					<div class="breadcrumb-env">
					
					<ol class="breadcrumb bc-1">
						<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
								<li>
							<a href="javascript:;"><i class="fa-home"></i>Manage Employee</a>
						</li>
							<li class="active">
						
										<strong>Add Employee</strong>
								</li>
							
								</ol>
								
				</div>
					
			</div>
			<h4><?php if($su!=='superuser'){ echo $userdata['organization_name']; } else{}?></h4>
			<!-- Form starts -->
			<script type="text/javascript">
				jQuery(document).ready(function($)
				{
				
					
					$(".selectboxit").selectBoxIt().on('open', function()
					{
						// Adding Custom Scrollbar
						$(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
					});
				});
			</script>
			<?php if(empty($select_emp)){?>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
					 	<div class="panel-heading">
						</div>
								<div class="panel-body">
								<form role="forl" id="rootwizard" class="form-wizard validate" method="POST" action="<?=base_url();?>employee/insert_employee/<?=$id?>" enctype="multipart/form-data" >
									
									<ul class="tabs">
										<li class="active">
											<a href="#fwv-1" data-toggle="tab">
												Personal Details
												<span>1</span>
											</a>
										</li>
										<li>
											<a href="#fwv-2" data-toggle="tab">
												Contact Details
												<span>2</span>
											</a>
										</li>
										<li>
											<a href="#fwv-3" data-toggle="tab">
												Employee Documents
												<span>3</span>
											</a>
										</li>
										<li>
											<a href="#fwv-4" data-toggle="tab">
												Bank Information
												<span>4</span>
											</a>
										</li>
										<li>
											<a href="#fwv-5" data-toggle="tab">
												Official Status
												<span>5</span>
											</a>
										</li>
									</ul>
									
									<div class="progress-indicator">
										<span></span>
									</div>
									
									<div class="tab-content no-margin">
										
										<!-- Tabs Content -->
										<div class="tab-pane with-bg active" id="fwv-1">
											
											<div class="row">
												
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="first_name">First Name *</label>
														<input class="form-control" name="first_name" id="first_name"  placeholder="Your first name" required/>
													</div>
												</div>
													<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="last_name">Last Name *</label>
														<input class="form-control" name="last_name" id="last_name"  placeholder="Your last name" />
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="birthdate">Date of Birth</label>
														<input class="form-control  datepicker" name="birthdate" id="birthdate"  placeholder="Pre-formatted birth date" />
													</div>
												</div>
												<div class="col-md-6">
												   <div class="form-group">
														<label class="control-label">Gender</label>
														<br>
															<label class="cbr-inline">
																	<input type="radio" name="gender" class="cbr" value="male" checked>
																	Male
																</label>
																<label class="cbr-inline">
																	<input type="radio" name="gender" class="cbr" value="female">
																	Female
																</label>
													</div>	
												</div>
											</div>
											<div class="row">
													<div class="col-md-12">
														
															 <!-- image-preview-filename input [CUT FROM HERE]-->
																	  <div class="fileupload fileupload-new" data-provides="fileupload">
																	  <div class="fileupload-new">
																		   <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This field holds the image used as avatar for this contact"/>
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
																		<div>
																		   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
																		   <span class="fileupload-exists ">Change</span>
																		   <input type="file" class="default" name="image" /></span>
																		   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
																		</div>
																	 </div><!-- /input-group image-preview [TO HERE]--> 
													
													</div>
											</div>
											<div class="row">
												<div class="col-md-6">
															<div class="form-group">
														<label class="control-label">Maratial Status</label>
														
														<script type="text/javascript">
															jQuery(document).ready(function($)
															{
																$("#s2example-1").select2({
																	placeholder: 'Maratial Status...',
																	allowClear: true
																}).on('select2-open', function()
																{
																	// Adding Custom Scrollbar
																	$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																});
																
															});
														</script>
														
														<select class="form-control" name="maratial_status" id="s2example-1">
															<option></option>
															<optgroup label="Maratial Status">
																<option value="married">Married</option>
																<option value="unmarried">Unmarried</option>
															</optgroup>
														</select>
														
													</div>
												</div>
													<div class="col-md-6">
															<div class="form-group">
														<label class="control-label">Nationality</label>
																			
														<select class="form-control " name="nationality" id="s2example-1">
															<option></option>
															<optgroup label="Nationality">
																<option value="indian">Indian</option>
																<option value="united_state">United States</option>
															</optgroup>
														</select>
														
													</div>
												</div>
											</div>
											
											<div class="row">
												
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="father_name">Father's Name </label>
														<input class="form-control" name="father_name" id="father_name"  placeholder="Your father's name" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="passport">Passport</label>
														<input class="form-control" name="passport" id="passport"  placeholder="Your Passport Number" />
													</div>
												</div>
											</div>
										</div><!-- tab1 closed -->
										<div class="tab-pane with-bg" id="fwv-2">
										
											<div class="row">
											<div class="col-md-12">
													<div class="form-group">
														<label class="control-label" for="address_line_2">Present Address</label>
														<input class="form-control" name="present_address"  id="address_line_2" placeholder="Enter Present Address" />
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-4">
												<div class="form-group">
														<label class="control-label">Mobile</label>
														
														<div class="input-group input-group-sm input-group-minimal">
															<span class="input-group-addon">
																<i class="linecons-mobile"></i>
															</span>
															<input type="text" name="mobile" class="form-control" data-mask="phone">
														</div>
													</div>
												</div>
												<div class="col-md-4">
												<div class="form-group">
														<label class="control-label">Email id</label>
														
														<div class="input-group input-group-sm input-group-minimal">
															<span class="input-group-addon">
																<i class="linecons-mail"></i>
															</span>
															<input type="text" name="email" class="form-control" data-mask="email">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Country</label>
														<select class="form-control selectboxit" name="country" id="s2example-1" onchange="count(this.value)" />
															<option></option>
															<optgroup label="Please Select Country">
															<?php foreach($list_country as $list) { ?>
															<option value="<?=$list->sortname?>" ><?php echo $list->name;?> </option>
															<?php } ?>
															</optgroup>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="state">State</label>
														
														<select name="state" class="selectboxit">
															<optgroup label="United States">
																<option value="Delhi">Delhi</option>
																<option value="mp">Madhya pradesh</option>
																<option value="odisa">odisa</option>
																<option value="jharkhand">jharkhand</option>
																<option value="goa">goa</option>
															</optgroup>
														</select>
													</div>
												</div>
													<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="city">City</label>
														<select name="city" class="selectboxit">
															<optgroup label="City">
																<option value="1">Bhopal</option>
																<option value="2">Indore</option>
															</optgroup>
														</select>
												</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="zip">Zip</label>
														<input type="text" class="form-control" name="zip" id="zip" data-mask="** ** **"  placeholder="Zip Code" />
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Add Employee</button>
											</div>
										</div>
										<!-- tab 2 closed -->
										<div class="tab-pane with-bg" id="fwv-3">
											<div class="row">
													<div class="col-md-6">
														<label class="control-label" for="resume">Resume</label>
														 <div class="fileupload fileupload-new" data-provides="fileupload">
																	  <div class="fileupload-new">
																		  <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle tooltip-primary" data-toggle="tooltip" data-placement="top" title="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
																		<div>
																		
																		   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
																		   <span class="fileupload-exists ">Change</span>
																			<input type="file" class="default" name="resume" /></span>
																		   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
																		</div>
																	 </div>
													</div>
													<div class="col-md-6">
													<label class="control-label" for="offerletter">Offer Letter</label>
														 <div class="fileupload fileupload-new" data-provides="fileupload">
																	  <div class="fileupload-new">
																		  <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle tooltip-primary" data-toggle="tooltip" data-placement="top" title="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
																		<div>
																		
																		   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
																		   <span class="fileupload-exists ">Change</span>
																			<input type="file" class="default" name="offerletter" /></span>
																		   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
																		</div>
																	 </div>
													</div>
											</div>
											
											<div class="row">
											<div class="col-md-6">
											<label class="control-label" for="joiningletter">Joining Letter</label>
														 <div class="fileupload fileupload-new" data-provides="fileupload">
																	  <div class="fileupload-new">
																		  <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle tooltip-primary" data-toggle="tooltip" data-placement="top" title="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
																		<div>
																		
																		   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
																		   <span class="fileupload-exists ">Change</span>
																			<input type="file" class="default" name="joiningletter" /></span>
																		   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
																		</div>
																	 </div>
													</div>
													<div class="col-md-6">
													<label class="control-label" for="idproof">identity proof</label>
													 <div class="fileupload fileupload-new" data-provides="fileupload">
																	  <div class="fileupload-new">
																		  <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle tooltip-primary" data-toggle="tooltip" data-placement="top" title="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
																		<div>
																		
																		   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
																		   <span class="fileupload-exists ">Change</span>
																			<input type="file" class="default" name="idproof" /></span>
																		   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
																		</div>
																	 </div>
													</div>
											</div>
										<div class="form-group">
												<button type="submit" class="btn btn-primary">Add Employee</button>
											</div>
										</div><!-- tab 3 closed -->
										
										<div class="tab-pane with-bg" id="fwv-4">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="bank_name">Bank Name </label>
														<input class="form-control" name="bank_name" id="bank_name"  placeholder="Bank Name" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="branch_name">Branch Name</label>
														<input class="form-control" name="branch_name" id="branch_name"  placeholder="Branch Name" />
													</div>
												</div>
											</div>	
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="acc_name">Account Name </label>
														<input class="form-control" name="acc_name" id="acc_name"  placeholder="Account Name" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label" for="acc_no">Account No.</label>
														<input class="form-control" name="acc_no" id="acc_no"  placeholder="Account No." />
													</div>
												</div>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Add Employee</button>
											</div>
									</div>
										
										<div class="tab-pane with-bg" id="fwv-5">
										<div class="row">
												<?php if(!empty($su) && $su=='superuser'){ ?>
														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label" for="organization" >Organization</label>
															<select class="selectboxit " id="" name="organization_name">
																<option></option>
																<optgroup label="Organizations">
																<?php foreach($list_organization as $list){?>
																	<option value="<?php echo $list->organization_id?>"><?php echo $list->organization_name; ?></option>
																<?php } ?>
																</optgroup>
															</select>
														</div> 
														</div>
											<?php } ?>
										</div>
										<div class="row">
											<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">User id</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-user"></i>
													</div>
													<input type="text" class="form-control" name="user_id" id="user_id"  data-validate="minlength[1]" data-message-minlength="" placeholder="" />
												</div>
											</div>
											</div>	
											<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">IMEI Number</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-mobile"></i>
													</div>
													<input type="text" class="form-control" name="imei" id="imei"  data-validate="" data-message-minlength="" placeholder="Please enter imei number" required />
												</div>
											</div>
											</div>
											</div>
										<div class="row">
												<!--<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">Employee ID</label>
												
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-user"></i>
													</div>
													
													<input type="text" class="form-control" name="employee_id" id="empid" data-validate="required,minlength[5]" data-message-minlength="Emp id must have minimum of 5 chars." placeholder="Enter Emp id" />
												</div>
											</div>
											</div>-->
											<div class="col-md-6">	
												<div class="form-group">
														<label class=" control-label">Joining Date</label>
														
														<div class="">
															<input type="text" name="joining_date" class="form-control datepicker" data-start-view="1" onchange="">
														</div>
													</div>
											</div>
												
											<div class="col-md-6">						
													<div class="form-group">
														<label class="control-label" for="city">Department</label>
														<select name="department_name" class="selectboxit">
														<optgroup label="Department">
															<option value="0"></option>
															<?php  foreach( $list_department as $list){ ?>
															<option value="<?php echo $list->department_id; ?>"><?php echo $list->department_name; ?></option>
															<?php } ?>
														</optgroup>
															
														</select>
														
												</div>
											</div>
											</div>
											<div class="row">
												<div class="col-md-6">						
													<div class="form-group">
														<label class="control-label" for="city">Designations</label>
													
														<select name="designation_name" class="selectboxit">
															<optgroup label="Designations">
															<option value="0"></option>
																<?php  foreach( $list_designation as $list){ ?>
															<option value="<?php echo $list->designation_id; ?>"><?php echo $list->designation_name; ?></option>	
																<?php } ?>
															</optgroup>
														</select>
													
												</div>
												</div>	
											
										
											<!--<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">Username</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-user"></i>
													</div>
													<input type="text" class="form-control" name="username" id="username" data-validate="required,minlength[5]" data-message-minlength="User Name must have minimum of 5 chars." placeholder="Could be email id" />
												</div>
											</div>
											</div>-->
											<!--<div class="col-md-6">						
												<div class="form-group">
														<label class="control-label">Choose Password</label>
														
														<div class="input-group">
															<div class="input-group-addon">
																<i class="linecons-lock"></i>
															</div>
															
															<input type="password" class="form-control" name="password" id="password"  placeholder="Enter strong password" />
														</div>
													</div>
											</div>-->
										
															
											<div class="col-md-6">
												   <div class="form-group">
														<label class="control-label">Frequency</label>
														<br>
															<label class="cbr-inline">
																	<input type="radio" name="salary_frquency" class="cbr" value="weekly" checked>
																	Weekly
																</label>
																<label class="cbr-inline">
																	<input type="radio" name="salary_frquency" value="monthly" class="cbr">
																	Monthly
																</label>
													</div>	
												</div>
												</div>
												<div class="form-group">
												<button type="submit" class="btn btn-primary">Add Employee</button>
											</div>
										
								</div>
										
										
										<!-- Tabs Pager -->
										
										<ul class="pager wizard">
											<li class="previous">
												<a href="#"><i class="entypo-left-open"></i> Previous</a>
											</li>
											
											<li class="next">
												<a href="#">Next <i class="entypo-right-open"></i></a>
											</li>
										</ul>
										
									</div>
									
								</form>
								</div>
								</div>
								</div>
								</div>
			<?php } if(!empty($select_emp)){?>
			<?php foreach($select_emp as $list){ ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
					 	<div class="panel-heading">
						</div>
								<div class="panel-body">
			<form role="forl" id="rootwizard" class="form-wizard validate" method="POST" action="<?=base_url();?>employee/update_employee/<?=$list->employee_id?>/<?=$id?>" enctype="multipart/form-data" >
				
				<ul class="tabs">
					<li class="active">
						<a href="#fwv-1" data-toggle="tab">
							Personal Details
							<span>1</span>
						</a>
					</li>
					<li>
						<a href="#fwv-2" data-toggle="tab">
							Contact Details
							<span>2</span>
						</a>
					</li>
					<li>
						<a href="#fwv-3" data-toggle="tab">
							Employee Documents
							<span>3</span>
						</a>
					</li>
					<li>
						<a href="#fwv-4" data-toggle="tab">
							Bank Information
							<span>4</span>
						</a>
					</li>
					<li>
						<a href="#fwv-5" data-toggle="tab">
							Official Status
							<span>5</span>
						</a>
					</li>
				</ul>
				
				<div class="progress-indicator">
					<span></span>
				</div>
				
				<div class="tab-content no-margin">
					
					<!-- Tabs Content -->
					<div class="tab-pane with-bg active" id="fwv-1">
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="first_name">First Name *</label>
									<input class="form-control" name="first_name" value="<?=$list->first_name; ?>" id="first_name" placeholder="Your first name" />
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="last_name">Last Name *</label>
									<input class="form-control" name="last_name" value="<?=$list->last_name; ?>" id="last_name"  placeholder="Your last name" />
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="birthdate">Date of Birth</label>
									<input class="form-control" name="birthdate" value="<?=$list->birthdate; ?>" id="birthdate"  data-mask="date" placeholder="Pre-formatted birth date" />
								</div>
							</div>
							<div class="col-md-6">
							   <div class="form-group">
									<label class="control-label">Gender</label>
									<br>
										<label class="cbr-inline">
												<input type="radio" name="gender" class="cbr" value="male" <?=(!empty($list->gender) && $list->gender=='male')?'checked':'' ?>  >
												Male
											</label>
											<label class="cbr-inline">
												<input type="radio" name="gender" class="cbr" value="female" <?=(!empty($list->gender) && $list->gender=='female')?'checked':'' ?>>
												Female
											</label>
								</div>	
							</div>
						</div>
						<div class="row">
								<div class="col-md-12">
									 <div class="fileupload fileupload-new" data-provides="fileupload">
		                                          <div class="fileupload-new">
		                                              <img src="img/<?=$list->image;?>"  style="max-width: 120px; max-height: 120px; line-height: 20px;" />
		                                            </div>
		                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
		                                            <div>
													   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
		                                               <span class="fileupload-exists ">Change</span>
													    <input type="file" class="default" name="image"/> </span>
		                                               <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
		                                            </div>
		                                         </div>
								</div>
						</div>
						<div class="row">
							<div class="col-md-6">
										<div class="form-group">
									<label class="control-label">Martial Status</label>
									
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-1").select2({
												placeholder: 'Maratial Status...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
									
									<select class="form-control" name="maratial_status" id="s2example-1">
										<option></option>
										<optgroup label="Maratial Status">
											<option value="married"<?=(!empty($list->maratial_status)&& $list->maratial_status=='married')?'selected':'' ?> >Married</option>
											<option value="unmarried"<?=(!empty($list->maratial_status)&& $list->maratial_status=='unmarried')?'selected':'' ?>>Unmarried</option>
										</optgroup>
									</select>
									
								</div>
							</div>
								<div class="col-md-6">
										<div class="form-group">
									<label class="control-label">Nationality</label>
														
									<select class="form-control " name="nationality" id="s2example-1">
										<option></option>
										<optgroup label="Nationality">
											<option value="indian" <?=($list->nationality=='indian')?'selected':''?> >Indian</option>
											<option value="united_state" <?=($list->nationality=='united_state')?'selected':''?> >United States</option>
										</optgroup>
									</select>
									
								</div>
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="father_name">Father's Name </label>
									<input class="form-control" name="father_name" value="<?=$list->father_name;?>" id="father_name"  placeholder="Your father's name" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="passport">Passport</label>
									<input class="form-control" name="passport" value="<?=$list->passport;?>" id="passport"  placeholder="Your Passport Number" />
								</div>
							</div>
						</div>
					</div>
					<!-- tab1 closed -->
					<div class="tab-pane with-bg" id="fwv-2">
					
						<div class="row">
						<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="address_line_2">Present Address</label>
									<input class="form-control" name="present_address" value="<?=$list->present_address;?>" id="address_line_2" placeholder="Enter Present Address" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
							<div class="form-group">
									<label class="control-label">Mobile</label>
									
									<div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="linecons-mobile"></i>
										</span>
										<input type="text" name="mobile" value="<?=$list->mobile;?>" class="form-control" data-mask="phone">
									</div>
								</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
									<label class="control-label">Email id</label>
									
									<div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="linecons-mail"></i>
										</span>
										<input type="text" name="email" value="<?=$list->email;?>" class="form-control" data-mask="email">
									</div>
								</div>
							</div>
									<div class="col-md-4">
							<div class="form-group">
									<label class="control-label">Country</label>
												
									<select class="form-control" name="country" id="s2example-1">
										<option></option>
																
										<optgroup label="Asia">
											<option>Afghanistan</option>
											<option>Bahrain</option>
											<option>Bangladesh</option>
											<option>Bhutan</option>
											<option>Brunei</option>
											<option>Cambodia</option>
											<option>China</option>
											<option>East Timor</option>
											<option value="india" <?=($list->country=='india')?'selected':''?>>India</option>
											<option>Indonesia</option>
											<option>Iran</option>
											<option>Iraq</option>
											<option>Israel</option>
											<option>Japan</option>
											<option>Jordan</option>
											<option>Kazakhstan</option>
											<option>Korea North</option>
											<option>Korea South</option>
											<option>Kuwait</option>
											<option>Kyrgyzstan</option>
											<option>Laos</option>
											<option>Lebanon</option>
											<option>Malaysia</option>
											<option>Maldives</option>
											<option>Mongolia</option>
											<option>Myanmar (Burma)</option>
											<option>Nepal</option>
											<option>Oman</option>
											<option>Pakistan</option>
											<option>The Philippines</option>
											<option>Qatar</option>
											<option>Russia</option>
											<option>Saudi Arabia</option>
											<option>Singapore</option>
											<option>Sri Lanka</option>
											<option>Syria</option>
											<option>Taiwan</option>
											<option>Tajikistan</option>
											<option>Thailand</option>
											<option>Turkey</option>
											<option>Turkmenistan</option>
											<option>United Arab Emirates</option>
											<option>Uzbekistan</option>
											<option>Vietnam</option>
											<option>Yemen</option>
										</optgroup>
									</select>
										
										
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="state">State</label>
									
									<select name="state" class="selectboxit">
										<optgroup label="States">
											<option value="Delhi" <?=($list->state=='Delhi')?'selected':''?>>Delhi</option>
											<option value="mp" <?=($list->state=='mp')?'selected':''?>>Madhya pradesh</option>
											<option value="odisa" <?=($list->state=='odisa')?'selected':''?>>odisa</option>
											<option value="jharkhand" <?=($list->state=='jharkhand')?'selected':''?>>jharkhand</option>
											<option value="goa" <?=($list->state=='goa')?'selected':''?>>goa</option>
										</optgroup>
									</select>
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="city">City</label>
									<select name="city" class="selectboxit">
										<optgroup label="City">
											<option value="1"<?=($list->city=='1')?'selected':''?>>Bhopal</option>
											<option value="2"<?=($list->city=='2')?'selected':''?>>Indore</option>
										</optgroup>
									</select>
							</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="zip">Zip</label>
									<input type="text" class="form-control" name="zip" value="<?=$list->zip;?>" id="zip" data-mask="** ** **"  placeholder="Zip Code" />
								</div>
							</div>
							
						</div>
						<div class="form-group">
												<button type="submit" class="btn btn-primary">Save Employee</button>
											</div>
					</div>
					<!-- tab 2 closed -->
					<div class="tab-pane with-bg" id="fwv-3">
						<div class="row">
								<div class="col-md-6">
									<label class="control-label" for="resume">Resume</label>
									 <div class="fileupload fileupload-new" data-provides="fileupload">
		                                          <div class="fileupload-new">
		                                              <img src="img/<?=$list->resume;?>" style="max-width: 120px; max-height: 120px; line-height: 20px;" />
		                                          </div>
		                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
		                                            <div>
													
		                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
		                                               <span class="fileupload-exists ">Change</span>
													    <input type="file" class="default" name="resume"  /></span>
		                                               <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
		                                            </div>
		                                        </div>
								</div>
								<div class="col-md-6">
								<label class="control-label" for="offerletter">Offer Letter</label>
									 <div class="fileupload fileupload-new" data-provides="fileupload">
		                                          <div class="fileupload-new">
		                                              <img src="img/<?=$list->offerletter;?>" style="max-width: 120px; max-height: 120px; line-height: 20px;" />
		                                            </div>
		                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
		                                            <div>
													
		                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
		                                               <span class="fileupload-exists ">Change</span>
													    <input type="file" class="default" name="offerletter"  /></span>
		                                               <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
		                                            </div>
		                                         </div>
								</div>
						</div>
						
						<div class="row">
						<div class="col-md-6">
						<label class="control-label" for="joiningletter">Joining Letter</label>
									 <div class="fileupload fileupload-new" data-provides="fileupload">
		                                          <div class="fileupload-new">
		                                              <img src="img/<?=$list->joiningletter;?>" style="max-width: 120px; max-height: 120px; line-height: 20px;" />
		                                            </div>
		                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
		                                            <div>
													
		                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
		                                               <span class="fileupload-exists ">Change</span>
													    <input type="file" class="default" name="joiningletter" /></span>
		                                               <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
		                                            </div>
		                                         </div>
								</div>
								<div class="col-md-6">
								<label class="control-label" for="idproof">identity proof</label>
								 <div class="fileupload fileupload-new" data-provides="fileupload">
		                                          <div class="fileupload-new">
		                                              <img src="img/<?=$list->idproof;?>" style="max-width: 120px; max-height: 120px; line-height: 20px;" />
		                                            </div>
		                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
		                                            <div>
													
		                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
		                                               <span class="fileupload-exists ">Change</span>
													    <input type="file" class="default" name="idproof" /></span>
		                                               <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
		                                            </div>
		                                         </div>
								</div>
						</div>
							<div class="form-group">
												<button type="submit" class="btn btn-primary">Save Employee</button>
											</div>
					
					</div><!-- tab 3 closed -->
					
					<div class="tab-pane with-bg" id="fwv-4">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="bank_name">Bank Name </label>
									<input class="form-control" name="bank_name" value="<?=$list->bank_name;?>" id="bank_name"  placeholder="Bank Name" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="branch_name">Branch Name</label>
									<input class="form-control" name="branch_name" value="<?=$list->branch_name;?>" id="branch_name"  placeholder="Branch Name" />
								</div>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="acc_name">Account Name </label>
									<input class="form-control" name="acc_name" value="<?=$list->acc_name;?>" id="acc_name"  placeholder="Account Name" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="acc_no">Account No.</label>
									<input class="form-control" name="acc_no" value="<?=$list->employee_id;?>" id="acc_no"  placeholder="Account No." />
								</div>
							</div>
						</div>
						<div class="form-group">
												<button type="submit" class="btn btn-primary">Save Employee</button>
											</div>
				</div>
					
						<div class="tab-pane with-bg" id="fwv-5">
										<div class="row">
												<?php if(!empty($su) && $su=='superuser'){ ?>
														<div class="col-md-12">
														<div class="form-group">
															<label class="control-label" for="organization" >Organization</label>
															<select class="selectboxit " id="" name="organization_name">
																<option></option>
																<optgroup label="Organizations">
																<?php foreach($list_organization as $lists){?>
																	<option value="<?=$lists->organization_id?>"<?=(!empty($list->organization_id) && $list->organization_id==$lists->organization_id)?'selected':'' ?> > <?php echo $lists->organization_name; ?> </option>
																<?php } ?>
																</optgroup>
															</select>
															
														</div> 
														</div>
											<?php } ?>
										</div>	
										<div class="row">
												<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">Employee ID</label>
												
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-user"></i>
													</div>
													
													<input type="text" class="form-control" value="<?php  echo $list->employee_id ?>" name="employee_id" id="empid" data-validate="" data-message-minlength="" placeholder="Enter Emp id" readonly />
												</div>
											</div>
											</div>
											<div class="col-md-6">	
												<div class="form-group">
														<label class=" control-label">Joining Date</label>
														
														<div class="">
															<input type="text" value="<?=$list->joining_date; ?>" name="joining_date" class="form-control datepicker" data-start-view="1">
														</div>
													</div>
													</div>
												</div>
											<div class="row">
											<div class="col-md-6">						
													<div class="form-group">
														<label class="control-label" for="city">Department</label>
														<select name="department_name" class="selectboxit">
														<optgroup label="Department">
															<option value="0"></option>
															<?php  foreach( $list_department as $lists){ ?>
															<option value="<?=$lists->department_id?>"<?=(!empty($list->department_id) && $list->department_id==$lists->department_id)?'selected':'' ?> > <?php echo $lists->department_name; ?></option>
															<?php } ?>
														</optgroup>
															
														</select>
														
												</div>
											</div>
												<div class="col-md-6">						
													<div class="form-group">
														<label class="control-label" for="city">Designations</label>
													
														<select name="designation_name" class="selectboxit">
															<optgroup label="Designations">
															<option value="0"></option>
																<?php  foreach( $list_designation as $lists){ ?>
															<option value="<?=$lists->designation_id?>"<?=(!empty($list->designation_id) && $list->designation_id==$lists->designation_id)?'selected':'' ?> > <?php echo $lists->designation_name; ?></option>
																<?php } ?>
															</optgroup>
														</select>
													
													</div>
												</div>	
											</div>
										<div class="row">
											<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">User id</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-user"></i>
													</div>
													<input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $list->user_id?>"  data-validate="minlength[1]" data-message-minlength="" placeholder="" />
												</div>
											</div>
											</div>	
											<div class="col-md-6">						
											<div class="form-group">
												<label class="control-label">IMEI Number</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="linecons-mobile"></i>
													</div>
													<input type="text" class="form-control" name="imei" id="imei" value="<?php echo $list->imei?>" data-validate="" data-message-minlength="" placeholder="Please enter imei number" />
												</div>
											</div>
											</div>
											</div>
											<div class="col-md-12">
												   <div class="form-group">
														<label class="control-label">Frequency</label>
														<br>
															<label class="cbr-inline">
																	<input type="radio" name="salary_frquency" class="cbr" value="weekly" <?=(!empty($list->salary_frquency) && $list->salary_frquency=='weekly')?'checked':''?> >
																	Weekly
																</label>
																<label class="cbr-inline">
																	<input type="radio" name="salary_frquency" value="monthly" <?=(!empty($list->salary_frquency) && $list->salary_frquency=='monthly')?'checked':''?> class="cbr"> <?=(!empty($list->gender) && $list->gender=='male')?'checked':'' ?>
																	Monthly
																</label>
													</div>	
												</div>
												
												<div class="form-group">
												<button type="submit" class="btn btn-primary">Save Employee</button>
											</div>
										
								</div>
					
					
					<!-- Tabs Pager -->
					
					<ul class="pager wizard">
						<li class="previous">
							<a href="#"><i class="entypo-left-open"></i> Previous</a>
						</li>
						
						<li class="next">
							<a href="#">Next <i class="entypo-right-open"></i></a>
						</li>
					</ul>
					
				</div>
				
			</form>
			</div>
								</div>
								</div>
								</div>
			<?php } } ?>
			<!-- Form Ends -->
			</div>
	</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/common_function.js"></script>