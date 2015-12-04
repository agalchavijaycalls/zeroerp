<?php $userdata = $this->session->userdata('user_data');
?>
<!-- manage organization page added by palak on 20 th june -->
<!-- manage organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Manage Registration</h1>
			<p class="description">Manage Your Registration</p>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1">
				<li>
					<a href="javascript:;"><i class="fa-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Manage Registration</strong>
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php  if($this->session->flashdata('category_success')) { ?>
				<div class="row-fluid">
					<div class="alert alert-success">
						<strong><?=$this->session->flashdata('message')?></strong> 
					</div>
				</div>
  			<?php } ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Manage Registration</h3>
					<!--  <div class="panel-options">
							<a href="<?php echo base_url(); ?>master/add_organization"><button class="btn btn-theme btn-info btn-icon btn-sm">
							<i class="fa-plus"></i>
							<span>Add Organization</span>
						</button></a>
					</div>	-->
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
					<div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	
						<table id="example-1"  cellspacing="0" class="table table-small-font table-bordered table-striped">
							<thead>
								<tr>
									<th>S. no</th>
									<th>Name</th>
									<th>Number</th>
									<th>Mobile IMEI</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S. no.</th>
									<th>Name</th>
									<th>Number</th>
									<th>Mobile IMEI</th>
									<th>Status</th>
									<th>Action</th>
									
								</tr>
							</tfoot>
							<?php $i=1; foreach($application_registration_list as $list){ ?>
							<tbody>
								<tr>
									<td><?=$i;?></td>
									<td><?php echo $list->name;?></td>
									<td><?php echo $list->number;?></td>
									<td><?php echo $list->imei;?></td>
									<td><?php echo $list->status;?></td>
									<td>
										<a href="<?php echo base_url(); ?>employee/manage_emp/<?=$list->registration_id ?>" class="btn btn-secondary btn-sm btn-icon icon-left">
												Edit
										</a>
										<a href="<?php echo base_url(); ?>employeecvxc/delete_organization/<?=$list->registration_id; ?>" onClick="return confirm('Are you sure to delete this organization ? This will delete all the related records on this organization as well.')" class="btn btn-danger btn-sm btn-icon icon-left">
												Delete
										</a>
										<a href="<?php echo base_url(); ?>employee/manage_emp/<?=$list->registration_id ?>" class="btn btn-secondary btn-sm btn-icon icon-left">
												Create Employee
										</a>
										<a href="<?php echo base_url(); ?>employeecvxc/delete_organization/<?=$list->registration_id; ?>" onClick="return confirm('Are you sure to delete this organization ? This will delete all the related records on this organization as well.')" class="btn btn-danger btn-sm btn-icon icon-left">
												Send Notification
										</a>
									</td>
								</tr>
							<?php $i++; } ?>
							</tbody>
						</table>
					</div>		
				</div>
			</div>
		</div>
	</div>
		