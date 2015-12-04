<?php $userdata= $this->session->userdata('user_data');
$su= $userdata['role_id'];
?>
<!-- manage Employee page added by palak on 22nd june -->
<!-- manage Employee body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Manage Product</h1>
			<p class="description">Manage Your Product</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="javascript:;"><i class="fa-home"></i>Home</a>
			</li>
			<li class="active">
				<strong>Manage Product</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php $userdata = $this->session->userdata('user_data');
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
				<h3 class="panel-title">Manage Product</h3>
				<div class="panel-options">
					<a href="<?php echo base_url(); ?>crm/product/products"><button class="btn btn-theme btn-info btn-icon btn-sm">
					<i class="fa-plus"></i>
					<span>Add Product</span>
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
				<?php// if(!empty($su) && $su=='superuser'){ ?>
				<div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">	
					<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Product Description</th>
								<th>product Rate </th>
								<th>product Unit</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Product Description</th>
								<th>product Rate </th>
								<th>product Unit</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<?php foreach ($list_product as $list){ ?>
						<tbody>
							<tr>
								<td><?=$list->product_desc?></td>
								<td><?=$list->product_rate?></td>
								<td><?=$list->unit_code?></td>
								<td>
									<a href="<?php echo base_url(); ?>crm/product/products/<?=$list->product_id;?>" class="btn btn-secondary btn-sm btn-icon icon-left">
											Edit
									</a>
									<a href="<?php echo base_url(); ?>crm/product/delete_product/<?=$list->product_id;?>" onClick="return confirm('Are you sure to delete this Product ? This will delete all the related records on this Product as well.')" class="btn btn-danger btn-sm btn-icon icon-left">
											Delete
									</a>
								</td>
							</tr>
						</tbody>
						<?php } ?>	
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

	
