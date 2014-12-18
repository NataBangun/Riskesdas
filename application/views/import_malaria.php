<script type="text/javascript">
	
	// function export_submit(ID_PROP) {
	function export_submit() {

		/*var vprov = document.export.Propinsi;
		
		if(vprov.value=='' ){
			alert("Anda belum memilih propinsi.");
			vprov.focus();
			return false;
		}
		else {*/
		
		$ID('frm1').submit();
		// goto('export/export_to_csv/' + ID_PROP);
		// goto('view_export/index/' + ID_PROP);
		// return true;
//		}
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
			<li><a href="http://localhost/import/">Home</a><span class="divider">/</span></li>
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
						<!--div class="control-group">
								<label for="Propinsi" class="control-label">Propinsi</label>
							<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="input-append">
													<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="button button-basic btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" /></span><a href="#" class="button button-basic fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
						
							</div>
						</div-->
						<div class="control-group">
								<label for="pilihfile" class="control-label">Silakan Pilih File</label>
							<div class="controls">
											<input type="file" name="pilihfile" id="pilihfile" class='uniform-me'>
						
							</div>
						</div>
						<!--div class="control-group">
							<label for="textfield" class="control-label"></label>
							<div class="controls">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo $application_path; ?>/img/no+image.gif" /></div>
									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
									<div>
										<span class="button button-basic btn-file"><span class="fileupload-new">Select image</span>
										<span class="fileupload-exists">Change</span><input type="file" /></span>
										<a href="#" class="button button-basic fileupload-exists" data-dismiss="fileupload">Remove</a>
									</div>
								</div>
							</div>
						</div-->
						<div class="form-actions">
							<input class="button button-basic-darkblue" name="submit" type="submit" value="Import">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>