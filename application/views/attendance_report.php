<!-- attendance report added by palak on 29th june -->
<!-- attendance report body starts -->

		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Attendance Report</h1>
					<p class="description">Get Attendance Report</p>
				</div>
				<!-- breadcrumbs starts -->
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
						
							<li class="active">
						
										<strong>Attendance Report</strong>
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
							<h3 class="panel-title">Attendance Report</h3>
								
						</div>
							<div class="panel-body">
								
								<form role="form" class="form-horizontal" method="post" action="javascript:;">
								<div class="form-group">
									<label class="col-sm-3 control-label">Month & Year</label>
									
									<div class="col-sm-9">
										<input type="text" class="form-control datepicker" data-start-view="2">
									</div>
								</div>
										<div class="form-group">
									<label class="col-sm-3 control-label" for="department">Department</label>
									<div class="col-sm-9">
									<select name="test" class="selectboxit form-control">
										<optgroup label="Department">
											<option value="1">Sales</option>
											<option value="2">Marketing</option>
										</optgroup>
									</select>
								</div>
								</div>
									<div class="form-group text-right" >
										<button type="submit" class="btn btn-success">Search</button>
									</div>
									
								</form>
											
							<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-3").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
				<div class="table-responsive"  data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">					
					<table id="example-3" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Designation</th>
								<th>Attendance</th>
								<th>Leave Category</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Employee Name</th>
								<th>Designation</th>
								<th>Attendance</th>
								<th>Leave Category</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
							<tr>
								<td>1</td>
								<td>Junction WEB</td>
								<td>WEB</td>
								<td>HR</td>
								<td>
								<a href="<?php echo base_url(); ?>home/add_departments" class="btn btn-secondary btn-sm btn-icon icon-left">
											Edit
									</a>
									<a href="javascript:;" class="btn btn-danger btn-sm btn-icon icon-left">
											Delete
									</a>
								
								</td>
								
							</tr>
							
						
					
						</tbody>
					</table>
					</div>
							</div>	<!--panel close -->	
						</div>
					</div>
					
				</div>
			
			<!-- body container ends starts -->
		