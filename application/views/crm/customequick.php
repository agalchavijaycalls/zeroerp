<?php 
$userdata= $this->session->userdata('user_data');
$su = $userdata['role_id'];
?>
<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Customers</h1>
					<p class="description">Manage Your Customers</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
								
							<li class="active">
						
										<strong>Customers</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
				<!-- table starts-->
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
					<h3 class="panel-title"><?php if($su!=='superuser'){ echo $userdata['organization_name']; } else{}?></h3>
				
				</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-md-12 ">
					<div class="pull-right">
				<a href="<?=base_url();?>crm/crm/add_customer"  class="btn btn-primary btn-icon">
									<i class="fa-plus"></i>
									<span>Create New Customers</span>
								</button></a>
					<button class="btn btn-primary btn-icon">
									<i class="fa-link"></i>
									<span>Import Customers</span>
								</button>			
					</div>
					</div>
					</div>
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
					<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Company</th>
								<th>Customer Name</th>
								<th>Phone Number</th>
								<th>Email Address</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Company</th>
								<th>Customer Name</th>
								<th>Phone Number</th>
								<th>Email Address</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($su_list_customer as $customer){ ?>
							<tr>
								<td><?=$customer->company_name?></td>
								<td><?=$customer->name?></td>
								<td><?=$customer->mobile?></td>
								<td><?=$customer->email?></td>
								<td>
								<a href="<?=base_url();?>crm/crm/add_customer/<?=$customer->customer_id?>" class="btn btn-secondary btn-sm" >
Edit
</a>
								<a href="<?=base_url();?>crm/crm/modal/<?=$customer->customer_id?>" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#modal-7">
Follow Up
</a>
								</td>
								
							</tr>
							
							<?php } ?>
						
						</tbody>
					</table>
					<?php } if(!empty($su) && $su!=='superuser'){ ?>
					<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Company</th>
								<th>Customer Name</th>
								<th>Phone Number</th>
								<th>Email Address</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Company</th>
								<th>Customer Name</th>
								<th>Phone Number</th>
								<th>Email Address</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($customer_info as $customer){ ?>
							<tr>
								<td><?=$customer->company_name?></td>
								<td><?=$customer->name?></td>
								<td><?=$customer->mobile?></td>
								<td><?=$customer->email?></td>
								<td>
								<a href="<?=base_url();?>crm/crm/add_customer/<?=$customer->customer_id?>" class="btn btn-secondary btn-sm" >
Edit
</a>
								<a href="<?=base_url();?>crm/crm/modal/<?=$customer->customer_id?>" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#modal-7">
Follow Up
</a>
								</td>
								
							</tr>
							
							<?php } ?>
						
						</tbody>
					</table>
					<?php } ?>
				</div>
			</div>
