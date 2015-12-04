<?php $userdata= $this->session->userdata('user_data');
$su= $userdata['role_id'];
?>
<!-- User role added by palak on 27th june -->
<!-- manage User role body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Manage User Role</h1>
		<p class="description">Manage Your User Role</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="javascript:;"><i class="fa-home"></i>Home</a>
			</li>
			<li class="active">
				<strong>Manage User Role</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?=$userdata['organization_name']?></h3>
				<div class="panel-options">
					<a href="<?php echo base_url(); ?>role/manage_users">
					<button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Add Users</span></button>
					</a>
				</div>	
			</div>
			<div class="panel-body">
				<?php  if($this->session->flashdata('message')) { ?>
				<div class="row-fluid">
					<div class="alert alert-success">
						<strong><?=$this->session->flashdata('message')?></strong> 
					</div>
				</div>
				<?php } ?>
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
				<div class="" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">					
					<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>S.no</th>
								<th>User Name</th>
								<th>Role</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S.no</th>
								<th>User Id</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<?php if($su=='superuser') { $i=0; foreach ($su_verify_list as $list){ $i++ ?>
						<tbody>
							<tr>
								<form method="POST" action="<?=base_url();?>role/role_assign/<?=$list->user_id?>" >
									<td><?php echo $i; ?></td>
									<td><?=$list->user_id;?></td>
									<td>
										<select name="role" class="form-control selectboxit">
											<option></option>
											<optgroup label="Role">
												<?php  foreach($role_list as $lists){ ?>
											<option value="<?=$lists->role_id?>"<?=(!empty($list->role_id) && $list->role_id==$lists->role_id)?'selected':'' ?> ><?=$lists->role_id; ?></option>
												<?php } ?>
											</optgroup>
										</select>
									</td>
									<td>
										<button class="btn btn-small show-tooltip" type="submit"  title="edit" ><i class="fa fa-check"></i>   Assign</button>
										<a class="btn btn-small btn-danger show-tooltip" title="Delete" onClick="return confirm('Are you sure to delete this user? This will delete all the related records on this user as well.')" href="<?=base_url()?>role/delete_user/<?=$list->user_id?>"><i class="fa fa-times"></i> Delete</a>
										<a class="btn btn-small btn-primary show-tooltip"  title="Block/Unblock" href="<?=base_url()?>role/blocked_user/<?=$list->user_id?>"><i class="fa fa-ban"></i> Block</a>
									</td>
								</form>
							</tr>
						</tbody>
						<?php  }  } else { $y=0; foreach($verify_list as $list){ $y++ ?>
						<tbody>
							<tr>
								<form method="POST" action="<?=base_url();?>role/role_assign/<?=$list->user_id?>" >
									<td><?php echo $y; ?></td>
									<td><?=$list->user_id;?></td>
									<td>
										<select name="role" class="form-control selectboxit">
											<option></option>
											<optgroup label="Role">
												<?php  foreach($role_list as $lists){ ?>
											<option value="<?=$lists->role_id?>"<?=(!empty($list->role_id) && $list->role_id==$lists->role_id)?'selected':'' ?> ><?=$lists->role_id; ?></option>
												<?php } ?>
											</optgroup>
										</select>
									</td>
									<td>
										<button class="btn btn-small show-tooltip" type="submit"  title="edit" ><i class="fa fa-check"></i>   Assign</button>
										<a class="btn btn-small btn-danger show-tooltip" title="Delete" onClick="return confirm('Are you sure to delete this user? This will delete all the related records on this user as well.')" href="<?=base_url()?>role/delete_user/<?=$list->user_id?>"><i class="fa fa-times"></i> Delete</a>
										<a class="btn btn-small btn-primary show-tooltip"  title="Block/Unblock" href="<?=base_url()?>role/blocked_user/<?=$list->user_id?>"><i class="fa fa-ban"></i> Block</a>
									</td>
								</form>
							</tr>
						</tbody>
						<?php } } ?>
					</table>
				</div>			
			</div>
		</div>
	</div>
</div>
</div>
</div>

