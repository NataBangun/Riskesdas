<script type="text/javascript">
	
	// function export_submit(ID_PROP) {
	function export_submit() {

		var vprov = document.export.Propinsi;
		
		if(vprov.value=='' ){
			alert("Anda belum memilih propinsi.");
			vprov.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// goto('export/export_to_csv/' + ID_PROP);
		// goto('view_export/index/' + ID_PROP);
		// return true;
		}
	}
	
	<?php if (isset($status_export) && $status_export == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form Import</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Import</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Import</span>
				</div>
				<div class="box-body">
					<form method="POST" id="frm1" name="export" enctype="multipart/form-data" action="<?php echo $application_path; ?>/import/index/" class='form-horizontal'>
						<input type="hidden" name="status_export" value="0">
						<div class="control-group">
								<label for="pilihfile" class="control-label">Silakan Pilih File</label>
							<div class="controls">
											<input type="file" name="pilihfile" id="pilihfile" class='uniform-me'>
						
							</div>
						</div>
						<div class="form-actions">
							<input class="button button-basic-darkblue" name="submit" type="submit" value="Import">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>