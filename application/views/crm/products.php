<?php $userdata= $this->session->userdata('user_data');
$id = $userdata['organization_id'];
?>
<!-- CUSTOMERS CRM added by palak on 3 juLY -->
<!-- Customers -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title"><i class="fa fa-plus"></i> Products</h1>
		<p class="description">Add Your Products</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="javascript:;"><i class="fa-home"></i>Home</a>
			</li>
			<li class="active">
				<strong>Add Products</strong>
			</li>
		</ol>
								
	</div>
</div>

<!-- body container  starts -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Add Products</h3>
					</div>
					<?php if(empty($product)){ ?>	
					<div class="panel-body">
						<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>crm/product/insert_product/<?=$id?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-2">
								
							<!-- image-preview-filename input [CUT FROM HERE]-->
									  <div class="fileupload fileupload-new" data-provides="fileupload">
									  <div class="fileupload-new">
										   <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle "   title="" />
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
										<div>
										   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
										   <span class="fileupload-exists ">Change</span>
										   <input type="file" class="default" name="product_img" /></span>
										   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
										</div>
									 </div><!-- /input-group image-preview [TO HERE]-->
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<label class="control-label" for="company">Description</label>
										<textarea class="form-control" name="product_desc" placeholder="Attribute Description"  /></textarea>
									</div>
									<div class="form-group">
										<label class="control-label" for="unit">Unit</label>
										<select class="selectboxit " id="" name="organization_name">
											<option></option>
											<optgroup label="Unit">
											<?php foreach($unit as $list){ ?>
												<option value="<?php echo $list->unit_code?>"><?php echo $list->unit_code; ?></option>
											<?php } ?>
											</optgroup>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="department">Rate</label>
										<input type="text" placeholder="Product rate" name="product_rate" id="product_rate" class="form-control" />
									</div>
									<div class="form-group" id="fields">
									     <label class="control-label " for="department">Attributes</label>
									      <div class="" id="profs"> 
									          <div id="attribute" ><input readonly autocomplete="off" class="input  form-control" id="field1" name="atttibute_name[]" type="text" placeholder="Type Attribute" data-items="8"/><button id="b1" class="btn add-attribute" type="button">+</button></div>
									          <br>
									          <small>Press + to add another Attribute :)</small>
									      </div>
									</div>
								</div>
							</div>
							<div class="row">		
								<div class="col-md-12">
									<div class="form-group" >
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
									</div>
								</div>	
							</div>
						</form>
					</div>
					<?php } else { ?>
					<div class="panel-body">
						<?php foreach($product as $list) { ?>
						<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>crm/product/insert_product" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-2">
								
							<!-- image-preview-filename input [CUT FROM HERE]-->
									  <div class="fileupload fileupload-new" data-provides="fileupload">
									  <div class="fileupload-new">
										   <img src="img/<?=$list->product_image?>" alt="" style="max-width: 120px; max-height: 120px; line-height: 20px;"  class="img-circle" title="" />
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 120px; line-height: 20px;"></div>
										<div>
										   <span class="btn btn-file"><span class="fileupload-new">Select image</span>
										   <span class="fileupload-exists ">Change</span>
										   <input type="file" class="default" name="product_img" /></span>
										   <a href="#" class="btn fileupload-exists btn-primary" data-dismiss="fileupload">Remove</a>
										</div>
									 </div><!-- /input-group image-preview [TO HERE]-->
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<label class="control-label" for="company">Description</label>
										<textarea class="form-control" name="product_desc"  placeholder="Attribute Description"  /><?=$list->product_desc;?></textarea>
									</div>
									<div class="form-group">
										<label class="control-label" for="unit">Unit</label>
										<select class="selectboxit " id="" name="organization_name">
											<option></option>
											<optgroup label="Unit">
											<?php foreach($unit as $list){ ?>
												<option value="<?php echo $list->unit_code?>"><?php echo $list->unit_code; ?></option>
											<?php } ?>
											</optgroup>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="department">Rate</label>
										<input type="text" placeholder="Product rate" name="product_rate" id="product_rate" class="form-control" />
									</div>
									<div class="form-group" id="fields">
									     <label class="control-label " for="department">Attributes</label>
									      <div class="" id="profs"> 
									          <div id="attribute" ><input readonly autocomplete="off" class="input  form-control" id="field1" name="atttibute_name[]" type="text" placeholder="Type Attribute" data-items="8"/><button id="b1" class="btn add-attribute" type="button">+</button></div>
									          <br>
									          <small>Press + to add another Department :)</small>
									      </div>
									</div>
								</div>
							</div>
							<div class="row">		
								<div class="col-md-12">
									<div class="form-group" >
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
									</div>
								</div>	
							</div>
						</form>
						<?php } ?>
					</div>
				    <?php } ?>
				</div>
			</div>
		</div>