<!-- add organization page added by palak on 20 th june -->
<!-- add organization body starts -->
		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Add Organization</h1>
					<p class="description">Add Your Organizations</p>
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
						<div class="panel-heading">
							<h3 class="panel-title">Manage Organization</h3>
								
						</div>
						<?php if(empty($select_organization)){?>
						<div class="panel-body">
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>master/insert_organization">
									
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Organization Name</label>
										
										<div class="col-sm-10">
											<input type="text" class="form-control"  name="organization_name" id="field-1" placeholder="Organization Name"  >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Organization Description</label>
										
										<div class="col-sm-10">
											<textarea class="form-control" name="organization_desc" placeholder="Organization Description"  /></textarea>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
									</div>
								</form>
								
							</div>
						
						<?php } if(!empty($select_organization)){?>
							<div class="panel-body">
							
							<?php  foreach($select_organization as $list ){ ?>
								<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>master/update_organization/<?=$list->organization_id?>">
									
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Organization Name</label>
										
										<div class="col-sm-10">
											<input type="text" class="form-control" name="organization_name" id="field-1" placeholder="Organization Name" value="<?=(!empty($list->organization_name))?$list->organization_name:"";?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Organization Description</label>
										
										<div class="col-sm-10">
											<textarea class="form-control" name="organization_desc" /><?=(!empty($list->organization_desc))?$list->organization_desc:"";?></textarea>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
									</div>
								</form>
								<?php } ?>
							</div>
							<?php } ?>
					</div>
					
				</div>
			</div>
			<!-- body container ends starts -->
		</div><!-- main content div end -->
	</div><!-- page container div end -->