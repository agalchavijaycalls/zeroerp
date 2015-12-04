<?php $userdata= $this->session->userdata('user_data');
$id = $userdata['organization_id'];
$su= $userdata['role_id'];
?>
<!-- add departments page added by palak on 21 st june -->
<!-- add departments body starts -->

		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Add Departments</h1>
					<p class="description">Add Your Departments</p>
				</div>
				<!-- breadcrumbs starts -->
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<strong>Manage Departments</strong>
								</li>
							<li class="active">
						
										<strong>Add Department</strong>
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
							<h3 class="panel-title"><?php if($su!=='superuser'){ echo $userdata['organization_name']; } else{}?></h3>
								
						</div>
							<?php if(empty($select_department)){ ?>
							<div class="panel-body">
								
								<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>master/insert_department/<?=$id?>">
									<?php if(!empty($su) && $su=='superuser'){ ?>
									<div class="form-group" id="fields">
									<label class="col-sm-2 control-label" for="email">Organizations</label>
									<div class="col-sm-8">
									<select class="selectboxit  " id="" name="organization_name">
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
									<div class="form-group" id="fields">
									          <label class="control-label col-sm-2" for="department">Department</label>
									            <div class="col-sm-8" id="profs"> 
									           <div id="department" ><input autocomplete="off" class="input  form-control" id="field1" name="department_name[]" type="text" placeholder="Type Department" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
									               
									            <br>
									            <small>Press + to add another Department :)</small>
									            </div>
									        
									</div>
									<div class="form-group" >
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
									</div>
								</form>
								
							</div>	<!--panel close -->	
							<?php } if(!empty($select_department)){ ?>
							<div class="panel-body">
							<?php foreach($select_department as $list){?>
								<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>master/update_department/<?=$list->department_id?>">
									<div class="form-group" id="fields">
									          <label class="control-label col-sm-2" for="department">Department</label>
									            <div class="col-sm-8" id="profs"> 
													<input type="text" class="input  form-control" id="field1" name="department_name" value="<?=(!empty($list->department_name))?$list->department_name:"";?>"  placeholder="Type Department" data-items="8"/>
									            </div>
									        
									</div>
									<div class="form-group" >
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
									</div>
								</form>
							<?php } ?>
							</div>	<!--panel close -->	
							<?php } ?>
						</div>
					</div>
					
				</div>
			
			<!-- body container ends starts -->
		</div><!-- main content div end -->
	</div><!-- page container div end -->