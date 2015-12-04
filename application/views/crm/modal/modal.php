<?php $a= $userid;
$userdata= $this->session->userdata('user_data');
$id = $userdata['organization_id'];
$su= $userdata['role_id']; ?>
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3><?php if($su!=='superuser'){ echo $userdata['organization_name']; } else{}?></h3></br>
		<h4 class="modal-title">Follow Up</h4>
	</div>
	<?php
	$userdata = $this->session->userdata('user_data');
	 if($this->session->flashdata('category_error')) { ?>
	<div class="row-fluid">
		<div class="alert alert-danger">
			<strong><?=$this->session->flashdata('message')?></strong> 
		</div>
	</div>
	<?php } ?>
	<div class="modal-body">
		<form role="form" method="POST" action="<?=base_url();?>crm/crm/insert_followup/<?=$a?>/<?=$id?>"  >
			<style>
				.datepicker{z-index:1151 !important;}
			</style>
				<div class="row">
					<div class="col-md-6">
						<input type=hidden name="customer_id" value="<?=$this->data['userid']?>">
							<div class="form-group">
							<label class="control-label">Follow Up Date</label>
							<div class="input-group">
								<input type="text" class="form-control datepicker input-sm" name="follow_up_date" data-format="D, dd MM yyyy">
								<div class="input-group-addon">
									<a href="javascript:;"><i class="linecons-calendar"></i></a>
								</div>
							</div>
						</div>
					</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Next Follow Up</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker input-sm " name="next_follow_up" data-format="D, dd MM yyyy">
							<div class="input-group-addon">
								<a href="javascript:;"><i class="linecons-calendar"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Follow Up Time</label>
						<div class="input-group">
							<input type="text" class="form-control timepicker input-sm" name="follow_up_time" >
							<div class="input-group-addon">
									<a href="javascript:;"><i class="linecons-clock"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<label class="control-label">Follow Up By</label>
						<div class="input-group">
							<input type="text" class="form-control input-sm" name="follow_up_by" >
						</div>
					</div>
				 </div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label" for="field-5">Notes</label>
						<textarea class="form-control autogrow" cols="5" id="field-5" name="note" placeholder="Put an internal Note"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label" for="field-5">Follow Up Type</label>
						<textarea class="form-control autogrow" cols="5" id="field-5" name="follow_up_type" placeholder="Put an internal Note"></textarea>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-info pull-right">Save changes</button>
			<h4 class="modal-title">Follow Up List of User</h4>
			<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Note</th>
						<th>follow up date</th>
						<th>Next follow up</th>
						<th>Follow up time</th>
						<th>Follow up type</th>
						<th>Follow up by</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Note</th>
						<th>follow up date</th>
						<th>Next follow up</th>
						<th>Follow up time</th>
						<th>Follow up type</th>
						<th>Follow up by</th>
					</tr>
				</tfoot>
				<tbody>
				<?php foreach($get_followup_list as $follow_up){ ?>
					<tr>
						<td><?=$follow_up->note	?></td>
						<td><?=$follow_up->follow_up_date	?></td>
						<td><?=$follow_up->next_follow_up	?></td>
						<td><?=$follow_up->follow_up_time	?></td>
						<td><?=$follow_up->follow_up_type?></td>
						<td><?=$follow_up->follow_up_by?>
						</td>
					</tr>
				<?php  } ?>
				</tbody>
			</table>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" onclick="window.location.href='<?php echo base_url();?>crm/crm/customequick'" class="btn btn-white" data-dismiss="modal">Close</button>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>
<script src="<?=base_url();?>assets/js/timepicker/bootstrap-timepicker.min.js"></script>