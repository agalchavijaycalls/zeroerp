<?php
$userdata = $this->session->userdata('user_data');
 if($this->session->flashdata('category_error_block')) { ?>
								<div class="row-fluid">
									<div class="alert alert-danger">
										<strong class="capitalize"><?=$this->session->flashdata('message')?></strong> 
									</div>
								</div>
<?php }
 if($this->session->flashdata('category_success')) { ?>
								<div class="row-fluid">
									<div class="alert alert-success">
										<strong><?=$this->session->flashdata('message')?></strong> 
									</div>
								</div>
<?php } 
?>

			
			<div class="row">
			
				<div class="col-md-12">
					<h2 class="capitalize  text-theme">
						<?php 
						echo  "<i class='fa fa-user'></i> Welcome   " .$userdata['role_id'] ;
						?>
						</h2>
						<br />
					<ul class="nav nav-tabs nav-tabs-justified">
						<li class="active">
							<a href="#home-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-home"></i></span>
								<span class="hidden-xs">Favourite</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Reporting</span>
							</a>
						</li>
					</ul>
					
					<div class="tab-content">
						<div class="tab-pane active" id="home-3">
							
							<div class="row">
								
						
									<div class="col-sm-3">
				
										<div class="xe-widget xe-counter-block xe-counter-block-primary">
											<div class="xe-upper">
												
												<div class="xe-icon">
													<i class="fa-star"></i>
												</div>
												<div class="xe-label">
													<h4><strong >Reporting</strong></h4>
													
												</div>
												
											</div>
											<div class="xe-lower">
												<div class="border"></div>
												
												
											</div>
										</div>
										
									</div>
									
									<div class="col-sm-3">
										
											<div class="xe-widget xe-counter-block xe-counter-block-primary">
											<div class="xe-upper">
												
												<div class="xe-icon">
													<i class="fa-star"></i>
												</div>
												<div class="xe-label">
													<h4><strong >Employee</strong></h4>
													
												</div>
												
											</div>
											<div class="xe-lower">
												<div class="border"></div>
												
												
											</div>
										</div>
										
									</div>
										<div class="col-sm-3">
										
											<div class="xe-widget xe-counter-block xe-counter-block-primary">
											<div class="xe-upper">
												
												<div class="xe-icon">
													<i class="fa-star"></i>
												</div>
												<div class="xe-label">
													<h4><strong >Stock</strong></h4>
													
												</div>
												
											</div>
											<div class="xe-lower">
												<div class="border"></div>
												
												
											</div>
										</div>
										
									</div>
										<div class="col-sm-3">
										
												<div class="xe-widget xe-counter-block xe-counter-block-primary">
											<div class="xe-upper">
												
												<div class="xe-icon">
													<i class="fa-star"></i>
												</div>
												<div class="xe-label">
													<h4><strong >Inventory</strong></h4>
													
												</div>
												
											</div>
											<div class="xe-lower">
												<div class="border"></div>
												
												
											</div>
										</div>
										
									</div>
									
							</div>
							
						</div>
						<div class="tab-pane" id="profile-3">
							
							<div class="row">
								<!--<div class="col-md-12">
									 <form role="form" class="form-horizontal">
											<div class="col-md-8">
												<div class="form-group">
													<div class="input-group">
														<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<button class="btn btn-primary btn-icon btn-icon-standalone">
													<i class="fa-search"></i>
													<span>Search</span>
												</button>
											</div>
									</form>
								</div>-->
							<div class="col-sm-3">
					
								<div class="xe-widget xe-progress-counter xe-progress-counter-primary" data-count=".num" data-from="46" data-to="27" data-duration="3">
									
									
									<div class="xe-upper">
										<div class="xe-icon">
											<i class="linecons-calendar"></i>
										</div>
										<div class="xe-label">
											<h4><strong>Reporting</strong></h4>
										</div>
									</div>
									<div class="xe-lower">
												<div class="border"></div>
														<h4><i class="fa fa-file-pdf-o"></i> <i class="fa-file-word-o"></i>
											</div>
									
								</div>
								
							</div>
							</div>
						</div>
					
					</div>
					
					
				</div>
			</div>
