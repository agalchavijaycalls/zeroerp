<?php $userdata= $this->session->userdata('user_data');
$su= $userdata['role_id'];
?>
<!-- manage Employee page added by palak on 22nd june -->
<!-- manage Employee body starts -->

		<div class="page-title">
			<div class="title-env">
				<h1 class="title">Manage Employees</h1>
				<p class="description">Manage Your Employees</p>
			</div>
			<div class="breadcrumb-env">
				<ol class="breadcrumb bc-1">
					<li>
						<a href="javascript:;"><i class="fa-home"></i>Home</a>
					</li>
					<li class="active">
						<strong>Manage Employee</strong>
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php
					$userdata = $this->session->userdata('user_data');
					if($this->session->flashdata('category_error')) { ?>
					<div class="row-fluid">
						<div class="alert alert-danger">
							<strong><?=$this->session->flashdata('message')?></strong> 
						</div>
					</div>
				<?php } ?>
				<?php  if($this->session->flashdata('category_success')) { ?>
					<div class="row-fluid">
						<div class="alert alert-success">
							<strong><?=$this->session->flashdata('message')?></strong> 
						</div>
					</div>
				<?php } ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Manage Employees</h3>
						<div class="panel-options">
							<a href="<?php echo base_url(); ?>employee/add_emp"><button class="btn btn-theme btn-info btn-icon btn-sm">
							<i class="fa-plus"></i>
							<span>Add Employees</span>
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
					<?php if(!empty($su) && $su=='superuser'){ ?>
					<div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	
						<table id="example-1" class="table table-striped table-hover fill-head " cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Organization</th>
									<th>Emp id </th>
									<th>Employee</th>
									<th>Dept > Designation</th>
									<th>Mobile</th>
									<th>View</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Organization</th>
									<th>Emp id </th>
									<th>Employee</th>
									<th>Dept > Designation</th>
									<th>Mobile</th>
									<th>View</th>
									<th>Action</th>
								</tr>
							</tfoot>
						<?php foreach ($su_list_employee as $list){ ?>
							<tbody>
								<tr>
									<td><?=$list->organization_name;?></td>
									<td><?=$list->employee_id;?></td>
									<td><?=$list->first_name;?></td>
									<td><?php if($list->department_id!==''){ echo $list->department_id; } ?> > <?php if($list->designation_id!==''){ echo $list->designation_id; } ?></td>
									<td><?=$list->mobile;?></td>
									<td><a href="<?php echo base_url(); ?>employee/view_emp" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><span class="fa fa-list-alt"></span></a></td>
									<td>
										<a href="<?php echo base_url(); ?>employee/add_emp/<?=$list->employee_id;?>" class="btn btn-secondary btn-sm btn-icon icon-left">	Edit </a>
										<a href="<?php echo base_url(); ?>employee/excell_location/<?=$list->imei;?>/<?=$list->first_name;?>" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#modal-8">	Locations </a>
										<a href="<?php echo base_url(); ?>employee/delete_emp/<?=$list->employee_id;?>" onClick="return confirm('Are you sure to delete this Employee ? This will delete all the related records on this Employee as well.')" class="btn btn-danger btn-sm btn-icon icon-left">	Delete </a>
									</td>
								</tr>
							</tbody>
						<?php } ?>	
						</table>
					</div>
					<?php } if(!empty($su) && $su!=='superuser'){ ?>
					<div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	
						<table id="example-1" class="table table-striped table-hover fill-head table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Emp id </th>
									<th>Employee</th>
									<th>Dept > Designation</th>
									<th>Mobile</th>
									<th>View</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Emp id </th>
									<th>Employee</th>
									<th>Dept > Designation</th>
									<th>Mobile</th>
									<th>View</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<?php foreach ($list_employee as $key=>$list){ ?>
							<tbody>
								<tr>
									<td><?=$list->employee_id;?></td>
									<td><?=$list->first_name;?></td>
									<td><?=$list->department_id?> > <?=$list->designation_id;?></td>
									<td><?=$list->mobile;?></td>
									<td><a href="<?php echo base_url(); ?>employee/view_emp" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><span class="fa fa-list-alt"></span></a></td>
									<td>
										<a href="<?php echo base_url(); ?>employee/add_emp/<?=$list->employee_id;?>" class="btn btn-theme btn-sm btn-icon icon-left"><i class="fa fa-pencil"></i>	Edit</a>
										<?php $name= $list->first_name; $emp_name=str_replace(' ','_',$name); ?> 
										<a href="<?php echo base_url(); ?>employee/excell_location/<?=$list->imei;?>/<?=$emp_name ?>" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#modal-8"> Locations</a>
										<!-- <button class="btn btn-blue btn-sm btn-icon icon-left" id="button" onclick="showhide()"><i class="fa fa-download"></i> Download</button>
										  <a href="<?php echo base_url(); ?>employee/updateaddress/<?=$list->imei;?>" class="btn btn-blue btn-sm btn-icon icon-left">
										<i class="fa fa-download"></i>		Excel Download
										</a>-->
										<a href="<?php echo base_url(); ?>employee/location_map/<?=$list->imei;?>"  class="btn btn-theme btn-sm btn-icon icon-left"><i class="fa fa-pencil"></i> Last Location</a>
										<a href="<?php echo base_url();?>employee/delete_emp/<?php echo $list->employee_id;?>" onClick="return confirm('Are you sure to delete this Employee ? This will delete all the related records on this Employee as well.')" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete</a>
								   </td>
								</tr>
							</tbody>
							<?php } ?>	
						</table>
					</div>
					<?php } ?>	
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>