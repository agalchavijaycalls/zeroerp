<?php $userdata= $this->session->userdata('user_data');
$id = $userdata['organization_id'];
$su= $userdata['role_id'];
?>
<!-- Add Customer added by palak on 2nd July-->
<!-- Add Customer  body starts -->

		<div class="page-title">
			<div class="title-env">
				<h1 class="title">Add Customer</h1>
				<p class="description">Add Your  Customer</p>
			</div>
			<div class="breadcrumb-env">
				<ol class="breadcrumb bc-1">
					<li>
						<a href="javascript:;"><i class="fa-home"></i>Home</a>
					</li>
					<li class="active">
						<strong>Add  Customer</strong>
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?php if($su!=='superuser'){ echo $userdata['organization_name']; } else{}?></h3>
					</div>
						<?php if(empty($select_customer)){?>
						<div class="panel-body">
							
						<form role="form" method="POST" class="validate"  action="<?=base_url();?>crm/crm/insert_customer/<?=$id?>"  >
					<!--<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="field-5">User Id</label>
								<input type="text" class="form-control" id="reference" data-validate="" data-message-required="Enter Reference" placeholder="please enter user id" name="user_id">
							</div>
						</div>
					</div>-->
				
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="company">Company</label>
									<input type="text" class="form-control" data-validate="required" data-message-required="Enter Company Name" name="company_name" id="company" placeholder="Company">
								</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="customer">Customer Name</label>
									<input type="text" class="form-control" name="name" id="customer" data-validate="required" data-message-required="Enter Customer Name"  placeholder="Customer">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
									<label class="control-label" for="email">Email</label>
									<input type="text" class="form-control"  name="email" data-validate="" data-message-required="Enter Email id"  id="email" placeholder="Email">
							</div>
							
						</div>
							<div class="col-md-6">
							
							<div class="form-group">
									<label class="control-label" for="phonenumber">Mobile Number</label>
									
										<input type="text" class="form-control" data-mask="phone" name="mobile" id="phonenumber" data-validate="required" data-message-required="Enter Phone Name"  placeholder="Phone Number"  data-mask="phone">
									
								</div>
						
						</div>
					</div>
				
					<!-- <div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
									<label class="control-label"> Date of Call</label>
									
									
										<div class="input-group">
											<input type="text" class="form-control datepicker" data-validate="required" data-message-required="Enter Date of call"  data-format="D, dd MM yyyy" name="doc">
											
											<div class="input-group-addon">
												<a href="javascript:;"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
							
						</div>
						
						<div class="col-md-6">
							
								<div class="form-group">
									<label class="control-label">Follow Up Date</label>
									
										<div class="input-group">
											<input type="text" class="form-control  datepicker" data-validate="required" data-message-required="Enter Follow Up Date"  data-format="D, dd MM yyyy" name="fod">
											
											<div class="input-group-addon">
												<a href="javascript:;"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
						
						</div>
				</div>
				<div class="row">
				<div class="col-md-12">
							
							<div class="form-group">
									<label class="control-label" for="field-5">Internal Notes</label>
									<textarea class="form-control autogrow" cols="5" id="field-5" data-validate="required" data-message-required="Enter Internal Notes" placeholder="Put an internal Note" name="internal_note"></textarea>
									
								</div>
						
						</div>
				</div> -->
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Customer type</label>
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									$("#s2example-1").select2({
										placeholder: 'Customer type...',
										allowClear: true
									}).on('select2-open', function()
									{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
									});
									
								});
							</script>
							<select class="form-control" name="customer_type" id="s2example-1">
								<option></option>
								<optgroup label="Customer type">
									<option value="wholesaler">Wholesaler</option>
									<option value="retailer">Retailer</option>
								</optgroup>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="product">Product</label>
							<input type="text" class="form-control"  name="product" data-validate="" data-message-required=""  id="" placeholder="Product">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Follow Up Date</label>
								<div class="input-group">
									<input type="text" class="form-control  datepicker" data-validate="" data-message-required="Enter Follow Up Date"  data-format="D, dd MM yyyy" name="follow_up_date">
									<div class="input-group-addon">
										<a href="javascript:;"><i class="linecons-calendar"></i></a>
									</div>
								</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<label class="control-label" for="field-5">Contact Time Follow Up</label>
							<div class="input-group">
								<input type="text" class="form-control timepicker" id="" data-validate=""  placeholder="" name="contact_t_follow_up">
								<div class="input-group-addon">
									<a href="javascript:;"><i class="linecons-clock"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				 <div class="col-md-6">
				   <div class="form-group">
					   <label class="control-label" for="field-5">Comments</label>
							<input type="text" class="form-control" id="" data-validate="" data-message-required=""  name="comments">
						</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
							<label class="control-label" for="field-5">Reference</label>
							<input type="text" class="form-control" id="reference" data-validate="" data-message-required="Enter Reference" placeholder="Reference" name="reference">
						</div>
					</div>
				</div>
					<div class="row">
				<div class="col-md-12">
							
							<div class="form-group">
									<label class="control-label" for="field-5">Address</label>
									<textarea class="form-control autogrow" cols="5" id="field-5" data-validate="" data-message-required="Enter Internal Notes" placeholder="Enter Customer Address" name="present_address"></textarea>
									
								</div>
						
						</div>
				</div>
					
					<div class="form-group">
								<button type="submit" class="btn btn-info">Save changes</button>
								 <button type="button" class="btn pull-right" onClick="window.history.back();">Cancel</button>
								</div>
					
						</div>
				<?php } if(!empty($select_customer)){?>
			<?php foreach($select_customer as $list){ ?>
			
				<div class="panel-body">
				<form role="form" method="POST"  action="<?=base_url ();?>crm/crm/update_customer/<?=$list->customer_id?>/<?=$id?>"/>
					<!--<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="field-5">User Id</label>
								<input type="text" class="form-control" id="reference" data-validate="required" data-message-required="Enter Reference" placeholder="please enter user id" value="<?=$list->user_id; ?>" name="user_id">
							</div>
						</div>
					</div>-->
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="company">Company</label>
									
										<input type="text" class="form-control" name="company_name" data-validate="required" value="<?=$list->company_name; ?>" id="company" placeholder="Company">
								
								</div>
						
						</div>
						<div class="col-md-6">
							
							
								<div class="form-group">
									<label class="control-label" for="customer">Customer Name</label>
									
									
										<input type="text" class="form-control" name="name" data-validate="required" value="<?=$list->name; ?>" id="customer" placeholder="Customer">
									
								</div>
						
						</div>
						
					
					</div>
				
					<div class="row">
						<div class="col-md-6">
							
								<div class="form-group">
									<label class="control-label" for="email">Email</label>
								
										<input type="text" class="form-control"  name="email" value="<?=$list->email; ?>" id="email" placeholder="Email">
									
								</div>
							
						</div>
							<div class="col-md-6">
							
							<div class="form-group">
									<label class="control-label" for="phonenumber">Mobile Number</label>
									
										<input type="text" class="form-control" data-mask="phone" data-validate="required" name="mobile" value="<?=$list->mobile; ?>" id="phonenumber" placeholder="Phone Number"  data-mask="phone">
									
								</div>
						
						</div>
					</div>
				
					<!--  <div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
									<label class="control-label"> Date of Call</label>
									
									
										<div class="input-group">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" value="<?=$list->date_of_call; ?>" name="doc">
											
											<div class="input-group-addon">
												<a href="javascript:;"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
							
						</div>
						
						<div class="col-md-6">
							
								<div class="form-group">
									<label class="control-label">Follow Up Date</label>
									
										<div class="input-group">
											<input type="text" class="form-control  datepicker" value="<?=$list->follow_up_date; ?>"  data-format="D, dd MM yyyy" name="fod">
											
											<div class="input-group-addon">
												<a href="javascript:;"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
						
						</div>
				</div>
				<div class="row">
				<div class="col-md-12">
							
							<div class="form-group">
									<label class="control-label" for="field-5">Internal Notes</label>
									<textarea class="form-control autogrow" cols="5" id="field-5" value="" placeholder="Put an internal Note" name="internal_note"><?=$list->internel_note; ?></textarea>
									
								</div>
						
						</div>
				</div>-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Customer type</label>
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									$("#s2example-1").select2({
										placeholder: 'Customer type...',
										allowClear: true
									}).on('select2-open', function()
									{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
									});
									
								});
							</script>
							<select class="form-control" name="customer_type" id="s2example-1">
								<option></option>
								<optgroup label="Customer type">
									<option value="wholesaler" <?=(!empty($list->customer_type)&& $list->customer_type=='wholesaler')?'selected':'' ?> >Wholesaler</option>
									<option value="retailer" <?=(!empty($list->customer_type)&& $list->customer_type=='retailer')?'selected':'' ?> >Retailer</option>
								</optgroup>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="product">Product</label>
							<input type="text" class="form-control" value="<?=$list->product;?>"  name="product" data-validate="" data-message-required=""  id="" placeholder="Product">
						</div>
					</div>
				</div>
				<div class="row">
				 <div class="col-md-6">
				   <div class="form-group">
					  		<label class="control-label" for="field-5">Contact Time Follow Up</label>
					  		<div class="input-group">
								<input type="text" class="form-control timepicker" id="" data-validate=""  placeholder="" name="contact_t_follow_up" value="<?=$list->contact_t_follow_up;?>" >
								<div class="input-group-addon">
									<a href="javascript:;"><i class="linecons-clock"></i></a>
								</div>
						</div>
					</div>
				</div>
					 <div class="col-md-6">
					<div class="form-group">
							<label class="control-label" for="field-5">Comments</label>
							<input type="text" class="form-control" id="" data-validate="" data-message-required=""  name="comments" value="<?=$list->comments;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<!--<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Follow Up Date</label>
								<div class="input-group">
									<input type="text" class="form-control  datepicker" data-validate="" data-message-required="Enter Follow Up Date"  data-format="D, dd MM yyyy" name="fod">
									<div class="input-group-addon">
										<a href="javascript:;"><i class="linecons-calendar"></i></a>
									</div>
								</div>
						</div>
					</div>-->
					
						<div class="col-md-12">
						<div class="form-group">
							<label class="control-label" for="field-5">Reference</label>
							<input type="text" class="form-control" id="reference" value="<?=$list->reference;?>" data-validate="" data-message-required="Enter Reference" placeholder="Reference" name="reference">
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12">
							
							<div class="form-group">
									<label class="control-label" for="field-5">Address</label>
									<textarea class="form-control autogrow" cols="5" id="field-5" data-validate="" data-message-required="Enter Internal Notes" placeholder="Plese enter your address" name="present_address"><?php echo $list->present_address?></textarea>
									
								</div>
						
						</div>
				</div>
					<div class="row">
						
								<div class="form-group">
								<button type="submit" class="btn btn-info">Save changes</button>
								 <button type="button" class="btn pull-right" onClick="window.history.back();">Cancel</button>
								</div>
					</div>
					
				</div>
				</div>	
			
			</form>
		</div>
	
		<?php } } ?>
	
									</div>
					
				</div>
			</div>
		</div>
	</div>