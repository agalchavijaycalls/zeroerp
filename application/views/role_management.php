<!-- User role added by palak on 27th june -->
<!-- manage User role body starts -->

		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Manage  Role</h1>
					<p class="description">Manage Your  Role</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<strong>Manage  Role</strong>
								</li>
							
								</ol>
								
				</div>
					
			</div>
<?php  if($this->session->flashdata('message')) { ?>
								<div class="row-fluid">
									<div class="alert alert-success">
										<strong><?=$this->session->flashdata('message')?></strong> 
									</div>
								</div>
	<?php } ?>
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Manage  Role</h3>
							<div class="panel-options">
									<a href="<?php echo base_url(); ?>role/add_role"><button class="btn btn-theme btn-info btn-icon btn-sm">
									<i class="fa-plus"></i>
									<span>Add Role</span>
								</button></a>
								
								</div>	
						</div>
							<div class="panel-body">
								
							<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-1").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
					<div class="table-responsive" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	 <br>
								 	 <br>
                                <table  id="example-1"  class="table table-striped table-hover fill-head">
                                    <thead>
                                        <tr>
                                            <th>Users</th>
										    <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($list_permsn as $role){ ?>
                                        <tr>
                                            
                                            <td><?=$role->role_id;?></td>
											<td>
                                               <div class="btn-group">
														<a class="btn btn-small btn-primary show-tooltip" title="Permissions" href="<?php echo base_url(); ?>role/role_permission/<?=$role->role_id;?>"><i class="fa fa-foursquare"></i> Permissions</a>
												</div>
												 <div class="btn-group">
														<a class="btn btn-small btn-danger show-tooltip" title="Delete" href="<?php echo base_url(); ?>role/delete_role/<?=$role->role_id;?>"><i class="fa fa-foursquare"></i> Delete</a>
												</div>
                                               
                                            </td>
                                        </tr>
									<?php } ?>
                                        
                                    </tbody>
                                </table>
					</div>			
							</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>