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
							<h3 class="panel-title">Customers</h3>
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal">
								<div class="row">
								<!-- image upload   -->
										<div class="col-md-2">
		
										  <div class="fileupload fileupload-new" data-provides="fileupload">
		                                          <div class="fileupload-new">
		                                               <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=no+image" alt=""  class="img-circle tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This field holds the image used as avatar for this contact"/>
		                                            </div>
		                                            <div class="fileupload-preview fileupload-exists thumbnail" style="border-radius:50%; max-width: 120px; max-height: 120px; line-height: 20px;"></div>
		                                            <div>
		                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
		                                               <span class="fileupload-exists"><i class="fa fa-pencil"></i></span>
		                                               <input type="file" class="default" /></span>
		                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><i class="fa fa-close"></i></a>
		                                            </div>
		                                         </div>
										</div>
								<!-- image upload -->
											<div class="col-md-4">
												<div class="form-block">
													<label for="chkBox">
														Name ( <input type="checkbox" class="cbr" name="chkBox" id="chkBox" onclick="showHide();">
														<span class="tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Check if the contact is a company, otherwise it is a person"> Is a Company?</span> )
													</label>
												</div>
												<div class="form-group">
														<input type="text" class="form-control" id="name" placeholder="Name">
												</div>
												<div class="form-group">
														<input type="text" class="form-control"  placeholder="Company" name="txtBox" id="txtBox"  >
												</div>
												<div class="form-group">
													<input type="text" class="form-control" id="tagsinput-1" data-role="tagsinput" value="Business, Erp, Crm" />	
												</div>
											</div>
											<div class="col-md-6">
													<div class="col-sm-6">
														<div class="xe-widget xe-counter">
															<div class="xe-icon">
																<i class="linecons-cloud"></i>
															</div>
															<div class="xe-label">
																<strong class="num">0</strong>
															<span>Meetings</span>
															</div>
														</div>
														      
													</div>
													<div class="col-sm-6">
														<div class="xe-widget xe-counter">
															<div class="xe-icon">
																<i class="linecons-cloud"></i>
															</div>
															<div class="xe-label">
																<strong class="num">0</strong>
																<span>Calls</span>
															</div>
														</div>
														      
													</div>
											</div>
										</div>
										<div class="row">
										
											<div class="col-md-6">
												<label class="control-label">Address</label>
									
												<div class="form-group">
													<div class="col-sm-12">
														<input type="text" class="form-control" id="address" placeholder="Street address">
													</div>
												</div>
													<div class="form-group">
														<div class="col-sm-4">													      
														<script type="text/javascript">
															jQuery(document).ready(function($)
															{
																$("#sboxit-1").selectBoxIt().on('open', function()
																{
																	// Adding Custom Scrollbar
																	$(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
																});
															});
														</script>
														      
														<select class="form-control" id="sboxit-1">
															<option value="al">City</option>
														      
														</select>
														</div>	
															<div class="col-sm-4">													      
														<script type="text/javascript">
															jQuery(document).ready(function($)
															{
																$("#sboxit-8").selectBoxIt().on('open', function()
																{
																	// Adding Custom Scrollbar
																	$(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
																});
															});
														</script>
														      
														<select class="form-control" id="sboxit-8">
															<option value="al">State</option>
														      
														</select>
														</div>	
														<div class="col-sm-4">
																<input class="form-control" name="zip" id="zip" data-mask="** ** **" data-validate="required" placeholder="Zip Code" />
															</div>
													</div>
													<div class="form-group">
														<div class="col-sm-12">
															<label class="control-label">Website</label>
															<input type="text" class="form-control" id="website" placeholder="Website">
														</div>
												   </div>
											</div>
											<div class="col-md-6">
											</br>
												<div class="form-group">
													<label class="control-label col-sm-4">Job Position</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" id="job position" placeholder="job position">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-4">Mobile</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" id="mobile" placeholder="mobile">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-4">Email</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" id="job position" placeholder="email">
													</div>
												</div>
											</div>
										</div>
											<div class="row">
			
										<div class="col-md-12">
											      
											<ul class="nav nav-tabs nav-tabs-justified">
												<li class="active">
													<a href="#internal-notes" data-toggle="tab">
														<span class="visible-xs"><i class="fa-home"></i></span>
														<span class="hidden-xs">Internal Notes</span>
													</a>
												</li>
												<li>
													<a href="#sales-purchase" data-toggle="tab">
														<span class="visible-xs"><i class="fa-user"></i></span>
														<span class="hidden-xs">Sales & Purchase</span>
													</a>
												</li>
									
											</ul>
											      
											<div class="tab-content">
												<div class="tab-pane active" id="internal-notes">
													      
													<div>
														      
														<textarea class="form-control autogrow" cols="5" id="field-5" placeholder="Put an Internal Note..." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
													</div>
													      
												</div>
										<div class="tab-pane" id="sales-purchase">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-sm-4">Internal Reference</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="internal reference" placeholder="internal reference">
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="If the selected language is loaded in the system, all documents related to this contact will be printed in this language. If not, it will be English.">Language</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="language" placeholder="Language">
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																	<label class="control-label col-sm-4">Active</label>
																	<div class="col-sm-8">
																	<input type="checkbox" class="cbr">
																	</div>
																</div>
																<div class="form-group">
																	<label class="control-label col-sm-4 tooltip-primary"  data-toggle="tooltip" data-placement="top" title="" data-original-title="If opt-out is checked, this contact has refused to receive emails for mass mailing and marketing campaign. Filter 'Available for Mass Mailing' allows users to filter the partners when performing mass mailing.">Opt-Out</label>
																	<div class="col-sm-8">
																	<input type="checkbox" class="cbr">
																	</div>
																</div>
														</div>
													</div>
													<h3 class="text-purple">Sales</h3>
													<div class="row">
														<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label  col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="If the selected language is loaded in the system, all documents related to this contact will be printed in this language. If not, it will be English.">Is a Customer ?</label>
																	<div class="col-sm-8">
																	<input type="checkbox" class="cbr">
																	</div>
																</div>
															<div class="form-group">
																<label class="control-label col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="The internal user that is in charge of communicating with this contact if any.">Salesperson</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="salesperson" placeholder="Salesperson">
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																	<label class="control-label col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Check this box if this contact is a supplier. If it's not checked, purchase people will not see it when encoding a purchase order.">Is Supplier</label>
																	<div class="col-sm-8">
																	<input type="checkbox" class="cbr">
																	</div>
																</div>
															      
														</div>
													</div>
														<h3 class="text-purple">Mailing</h3>
													<div class="row">
														<div class="col-md-12">
																<div class="form-group">
																	<label class="control-label  col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Policy to receive emails for new messages pushed to your personal Inbox:
																			- Never: no emails are sent
																							- All Messages: for every notification you receive in your Inbox">Receive Inbox Notifications by Email</label>
															      
																	<label>
																		<input type="radio" name="radio-1" class="cbr" checked>
																			Never
																	</label>
																		<br />
																	<label>
																			<input type="radio" name="radio-1" class="cbr" checked>
																			All Messages
																		</label>
																	      
																</div>
															      
														</div>
														      
												</div>
												      
												</div>
											</div>
												<div class="form-group">
															<button type="button" class="btn btn-gray btn-single">Discard</button>
															<button type="button" class="btn btn-info btn-single pull-right">Save</button>
														</div>
										</div>
									</div>
							</div>
								
				
						</form>
							
						</div>
					</div>
					
				</div>
			</div>
	</div>
	</div> 
