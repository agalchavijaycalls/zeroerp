<?php $userdata = $this->session->userdata('user_data');
?>
<!-- manage organization page added by palak on 20 th june -->
<!-- manage organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Manage Project Task</h1>
			<p class="description">Manage Your Project Task</p>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1">
				<li>
					<a href="javascript:;"><i class="fa-home"></i>Home</a>
				</li>
				<li class="active">
					<strong>Manage Project Task</strong>
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php  if($this->session->flashdata('success')) { ?>
				<div class="row-fluid">
					<div class="alert alert-success">
						<strong><?=$this->session->flashdata('success')?></strong> 
					</div>
				</div>
  			<?php } ?>
  			<?php  if($this->session->flashdata('error')) { ?>
				<div class="row-fluid">
					<div class="alert alert-danger">
						<strong><?=$this->session->flashdata('error')?></strong> 
					</div>
				</div>
  			<?php } ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div align="center"><h3 class=""><?php if(isset($this->data['ProjectName'])&&!empty($this->data['ProjectName'])){ echo 'Project Name:-  ';  echo ucfirst(str_replace('_', ' ', $this->data['ProjectName'])); } ?></h3></div>
					<div class="panel-options">
						 <a href="<?php echo base_url(); ?>pms/pms/AddTask?menu=pms"><button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Add</span></button></a>
						<!--<a href="<?php echo base_url(); ?>pms/pms/NewRegistration?menu=pms/track"><button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Show Notification</span></button></a> -->
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
					  <div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	
						<table id="example-1"  cellspacing="0" class="table table-small-font table-bordered table-striped">
							<thead>
								<tr>
									<th>Sr.</th>
									<th>Task Description</th>
									<th>Assigne To</th>
									<th>Estimate Cost</th>
									<th>Start Date</th>
									<th>Completion Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Sr.</th>
									<th>Task Description</th>
									<th>Assigne To</th>
									<th>Estimate Cost</th>
									<th>Start Date</th>
									<th>Completion Date</th>
									<th>Status</th>
									<th>Action</th>
									
								</tr>
							</tfoot>
							<tbody>
							<?php $i=1; foreach($ApplicationProjectDependTaskList as $list){ ?>
								<tr>
									<td><?=$i;?></td>
									<th><?php echo $list->task_description;?></th>
									<td><?php foreach ($ApplicationTaskEmployeeList as $EmployeeList){ if(isset($EmployeeList->employee_id)&& $list->employee_id==$EmployeeList->employee_id) { echo $EmployeeList->first_name; break; } else { echo '';} }?></td>
									<td><?php echo $list->estimate_cost;?></td>
									<td><?php echo $list->estimate_start_date;?></td>
									<td><?php echo $list->actual_start_date;?></td>
									<td><?php echo $list->status;?></td>
									<td>
									<!-- <a href="<?php echo base_url(); ?>pms/pms/AddTask/<?=$list->task_id ?>"  data-toggle="tooltip" title="Create Employee" class="btn btn-secondary btn-sm btn-icon icon-left" ><i class="fa-plus"></i></a>-->
										<a href="<?php echo base_url(); ?>pms/pms/AddTask/<?=$list->task_id ?><?php if(isset($this->data['ProjectId'])&&!empty($this->data['ProjectId'])){ echo '/'.$this->data['ProjectId']; }?>?menu=pms" data-toggle="tooltip" title="Edit Employee" class="btn btn-danger btn-sm btn-icon icon-left" ><i class="fa-pencil" ></i> </a>
										<a href="javascript:;<?php// echo base_url(); ?>pms/pms/DeleteSingleDatatask/<? //=$list->task_id ?>" data-toggle="tooltip" title="Delete Employee" onClick="return confirm('Are you sure to delete this Employee Data ? This will delete all the related records on this organization as well.')" title="<?=$list->status;?>" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-trash"></i></a>
										
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
		