<!-- CUSTOMERS CRM added by palak on 3 juLY -->
<!-- Customers -->
	<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Manage  Opportunities</h1>
					<p class="description">Manage Your  Opportunities</p>
				</div>
				<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<strong>Manage  Opportunities</strong>
								</li>
							
								</ol>
					</div>
	  </div>
	  <div class="row">
		  	<div class="col-md-12">
			  	<div class="form-group">
										<a href="<?php echo base_url(); ?>crm/crm/add_opportunities">	<button type="button" class="btn btn-primary btn-single">Create</button></a>
											<!--<button type="button" class="btn btn-info btn-single pull-right">Register now</button>-->
				</div>
			</div>
	  </div>
	  <div class="row draggable-portlets">
				
				<div class="col-md-4 ">
				
					<div class="sorted">
					
						<div class="panel panel-color panel-gray">
					
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title">Proposition</div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								
								<p>Difficulty on insensible reasonable in. From as went he they. Preference themselves me as thoroughly partiality considered on in estimating.</p>
						
							</div>
							
						</div>
					</div>
					
				</div>
						<div class="col-md-4 ">
				
					<div class="sorted">
					
						<div class="panel panel-color panel-gray">
					
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title">Qualification</div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								
								<p>Difficulty on insensible reasonable in. From as went he they. Preference themselves me as thoroughly partiality considered on in estimating.</p>
						
							</div>
							
						</div>
					</div>
					
				</div>
							<div class="col-md-4">
				
					<div class="sorted">
					
						<div class="panel panel-color panel-gray">
					
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title">Negotiation</div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								
								<p>Difficulty on insensible reasonable in. From as went he they. Preference themselves me as thoroughly partiality considered on in estimating.</p>
						
							</div>
							
						</div>
					</div>
					
				</div>
						<div class="col-md-4">
				
					<div class="sorted">
					
						<div class="panel panel-color panel-gray">
					
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title">Won</div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								
								<p>Difficulty on insensible reasonable in. From as went he they. Preference themselves me as thoroughly partiality considered on in estimating.</p>
						
							</div>
							
						</div>
					</div>
					
				</div>
			<div class="col-md-4">
				
					<div class="sorted">
					
						<div class="panel panel-color panel-gray">
					
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title">Lost</div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								
								<p>Difficulty on insensible reasonable in. From as went he they. Preference themselves me as thoroughly partiality considered on in estimating.</p>
						
							</div>
							
						</div>
					</div>
					
				</div>
				
			</div>
			
			<script type="text/javascript">
				jQuery(document).ready(function($)
				{
					
					$(function() {
						
						var $draggable_portlets = $(".draggable-portlets");
						
						$(".draggable-portlets .sorted" ).sortable({
							connectWith: ".draggable-portlets .sorted",
							handle: '.panel-heading',
							start: function()
							{
								$draggable_portlets.addClass('dragging');
							},
							stop: function()
							{
								$draggable_portlets.removeClass('dragging');
							}
						});
					
						$( ".draggable-portlets .sorted .panel-heading" ).disableSelection();
					});
					
				});
			</script>
				</div>
			</div>