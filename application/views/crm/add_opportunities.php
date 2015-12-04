<!-- Add Opportunities added by palak on 7th July-->
<!-- Add Opportunities  body starts -->

		<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Add Opportunities</h1>
					<p class="description">Add Your  Opportunities</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<strong>Add  Opportunities</strong>
								</li>
							
								</ol>
								
				</div>
					
			</div>
			<div class="row">
				<div class="col-md-12">
				<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Opportunities</h3>
						
						</div>
						<div class="panel-body">
					<form role="forl" id="rootwizard" class="form-wizard validate ">
						
						<ul class="tabs">
							<li class="active">
								<a href="#fwv-1" data-toggle="tab">
								New
									<span>1</span>
								</a>
							</li>
							<li>
								<a href="#fwv-1" data-toggle="tab">
									Proposition
									<span>2</span>
								</a>
							</li>
							<li>
								<a href="#fwv-1" data-toggle="tab">
									Qualification
									<span>3</span>
								</a>
							</li>
							<li>
								<a href="#fwv-1" data-toggle="tab">
									Negotiation
									<span>4</span>
								</a>
							</li>
							<li>
								<a href="#fwv-1" data-toggle="tab">
									Won
									<span>5</span>
								</a>
							</li>
								<li>
								<a href="#fwv-1" data-toggle="tab">
									Lost
									<span>5</span>
								</a>
							</li>
						</ul>
						
						<div class="progress-indicator">
							<span></span>
						</div>
						
						<div class="tab-content no-margin">
							
							<!-- Tabs Content -->
							<div class="tab-pane with-bg active" id="fwv-1">
								<div class="row">
									<div class="col-md-5">
											<div class="form-group">
												<label class="control-label" for="opportunity">Opportunity</label>
												<input class="form-control" name="opportunity" data-validate="required"  id="opportunity" placeholder="e.g. Product Pricing">
											</div>
											<div class="row">
									
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label" for="exp_revenue">Expected Revenue</label>
													<input class="form-control" name="exp_revenue" id="exp_revenue"  placeholder="Expected Revenue">
												</div>
											</div>
											<div class="col-md-2">
											<p class="at">at</p>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label" for="propability">Probability</label>
													<div class="input-group">
															<input type="text" class="form-control">
															<span class="input-group-addon">%</span>
														</div>
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="col-md-4 col-md-offset-3">
											<div class="col-sm-6">
																<button class="btn btn-white    btn-icon btn-icon-standalone">
																<i class="fa-phone"></i>
																	<span>0  Calls</span>
																	
																</button>
															</div>
												
															<div class="col-sm-6">
															<button class="btn btn-white   btn-icon btn-icon-standalone">
																<i class="fa-calendar"></i>
																	 <span>0 Meetings</span>
																	
																</button>
															</div>
											</div>
									</div>
									<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label tooltip-primary" for="customer"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Linked partner (optional). Usually created when converting the lead.">Customer</label>
											<input class="form-control" name="customer" id="customer"  placeholder="Customer">
										</div>
										<div class="form-group">
											<label class="control-label tooltip-primary" for="email"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Email address of the contact">Email</label>
											<input class="form-control" name="email" id="email"  placeholder="Email">
										</div>
										<div class="form-group">
											<label class="control-label" for="phone">Phone</label>
											<input type="text" class="form-control" data-mask="phone">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label" for="nextaction">Next Action</label>
												<div class="input-group">
													<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
													
													<div class="input-group-addon">
														<a href="#"><i class="linecons-calendar"></i></a>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label class="control-label" for="customer">Call for Purpose</label>
											<input class="form-control" name="customer" id="customer"  placeholder="Call for Purpose">
										</div>
										<div class="form-group">
											<label class="control-label tooltip-primary" for="expectedclosing"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Estimate of the date on which the opportunity will be won.">Expected Closing</label>
												<div class="input-group">
													<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
													
													<div class="input-group-addon">
														<a href="#"><i class="linecons-calendar"></i></a>
													</div>
												</div>
										</div>
									</div>
									
								</div>
											<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label" for="salesperson">Salesperson</label>
											<input class="form-control" name="salesperson" id="salesperson"  placeholder="Salesperson">
										</div>
										<div class="form-group">
											<label class="control-label" for="priorties">Priorties</label>
											<input class="form-control" name="priorties" id="priorties" placeholder="Priorties">
										</div>
										
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label tooltip-primary" for="nextaction"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Classify and analyze your lead/opportunity categories like: Training, Service">Tags</label>
												<script type="text/javascript">
												jQuery(document).ready(function($)
												{
													$("#s2example-1").select2({
														placeholder: 'Select your country...',
														allowClear: true
													}).on('select2-open', function()
													{
														// Adding Custom Scrollbar
														$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
													});
													
												});
											</script>
											
											<select class="form-control" id="s2example-1">
												<option></option>
												<optgroup label="North America">
													<option>Alabama</option>
													<option>Alaska</option>
													<option>Arizona</option>
												</optgroup>
									</select>
										</div>
										<div class="form-group">
											<label class="control-label" for="customer">Lost Reason</label>
											<input class="form-control" name="customer" id="lostreason"  placeholder="Lost Reason">
										</div>
									
									</div>
									
								</div>
							</div>
						
						</div>
								<div class="row form-horizontal">
			
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
														<span class="hidden-xs">Lead</span>
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
																<label class="control-label col-sm-4 tooltip-primary"  data-toggle="tooltip" data-placement="top" title="" data-original-title="The name of the future partner company that will be created while converting the lead into opportunity">Customer Name</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="customername" placeholder="Customer Name">
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-sm-4">Address</label>
																		<div class="col-sm-8">	<input type="text" class="form-control" id="address" placeholder="Street address">
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
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-sm-4">Contact Name</label>
																		<div class="col-sm-8">	<input type="text" class="form-control" id="contactname" placeholder="Contact Name">
																		</div>
																	
															</div>
															<div class="form-group">
																<label class="control-label col-sm-4">Function Name</label>
																		<div class="col-sm-8">	<input type="text" class="form-control" id="functionname" placeholder="Function Name">
																		</div>
																	
															</div>
															<div class="form-group">
																	<label class="control-label col-sm-4">Mobile</label>
																	<div class="col-sm-8">
																		<input type="text" class="form-control" id="mobile" placeholder="mobile" data-mask="phone">
																	</div>
																</div>	
														</div>
													</div>
													
													<div class="row">
														<div class="col-md-6">
														<h3 class="text-purple">Marketing</h3>
															<div class="form-group">
																<label class="control-label col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is a name that helps you keep track of your different campaign efforts Ex: Fall_Drive, Christmas_Special">Campaign</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="Campaign" placeholder="Campaign">
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is the method of delivery. Ex: Postcard, Email, or Banner Ad">Medium</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="Medium" placeholder="Medium">
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-4 tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is the source of the link Ex: Search Engine, another domain, or name of email list">Source</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="source" placeholder="Source">
																</div>
															</div>
														</div>
													
														<div class="col-md-6">
															<h3 class="text-purple">Mailing</h3>
															<div class="form-group">
																	<label class="control-label col-sm-4 tooltip-primary"  data-toggle="tooltip" data-placement="top" title="" data-original-title="If opt-out is checked, this contact has refused to receive emails for mass mailing and marketing campaign. Filter 'Available for Mass Mailing' allows users to filter the partners when performing mass mailing.">Opt-Out</label>
																	<div class="col-sm-8">
																	<input type="checkbox" class="cbr">
																	</div>
																</div>
															
														</div>
													</div>
														
												<div class="row">
														<div class="col-md-6">
														<h3 class="text-purple">Misc</h3>
															<div class="form-group">
																	<label class="control-label col-sm-4">Active</label>
																	<div class="col-sm-8">
																	<input type="checkbox" class="cbr">
																	</div>
																</div>
															<div class="form-group">
																<label class="control-label col-sm-4 ">Referred By</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="referredby" placeholder="Referred By">
																</div>
															</div>
														
														</div>
													
														<div class="col-md-6">
															<h3 class="text-purple">References</h3>
															<div class="form-group">
																<label class="control-label col-sm-4 ">Reference</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="Reference" placeholder="Reference">
																</div>
															</div>
																<div class="form-group">
																<label class="control-label col-sm-4 ">Reference 2</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="Reference" placeholder="Reference 2">
																</div>
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
					</form>
				</div>
			</div>
				
				</div>
			</div>