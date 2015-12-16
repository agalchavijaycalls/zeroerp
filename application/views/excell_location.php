<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</br>
		<h4 class="modal-title">Location Report</h4>
	</div>
	<div class="modal-body">
		<form role="form" method="POST"  id="ajaxcontent" class="" action="<?=base_url();?>employee/track_address" style="border:#d1d1d1 1px solid;  padding: 25px;">
			<input type="hidden" name="imei" value="<?=$imei?>" >
			<input type="hidden" name="name" value="<?=$name?>" >
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Format</label>
						<br>
						<label class="cbr-inline">
							<input type="radio" name="sheat" class="cbr" value="excel" checked>Excel
						</label>
						<label class="cbr-inline">
							<input type="radio" name="sheat" class="cbr" value="pdf">PDF
						</label>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">	
					<div class="form-group">
						<label class=" control-label">From</label>
						<input type="text" name="from" id="txtCheckIn" placeholder="" readonly>
						<label class=" control-label">To</label>
						<input type="text" name="to" id="txtCheckOut" placeholder="" readonly>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary"  onclick="callAjax();">Genrate</button>
				<button type="button" onclick="window.location.href='<?=base_url();?>pms/pms/application_reg?menu=pms'" class="btn btn-white" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/xenon-custom.js"></script>