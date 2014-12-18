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
		<h4>Form Export Kimia Klinis</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li><a href="#">Export</a><span class="divider">/</span></li>
			<li class='active'>Form Export Kimia Klinis</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Export</span>
				</div>
				<div class="box-body">
					<form method="POST" id="frm1" name="export" action="<?php echo $application_path; ?>/view_exportkimiaklinis/index/" class='form-horizontal'>
					<!--form method="POST" id="frm1" name="export" class='form-horizontal'-->
						<input type="hidden" name="status_export" value="0"/>
						<input type="hidden" name="lab" value="<?php echo $this->data['lab']; ?>"/>
						<input type="hidden" name="penelitian" value="<?php echo $this->data['penelitian']; ?>"/>
						<div class="control-group">
								<label for="Propinsi" class="control-label">Propinsi</label>
							<div class="controls">
								<select style="margin-left: 2.5641%;" name="Propinsi" id="Propinsi" class='span3 chosen-select'  >
									<option value=""> - Pilih Propinsi yang akan di Export - </option>
									<?php foreach($arr_prov as $value): ?>
									<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
									<?php endforeach; ?>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="tglawal" class="control-label">Taggal Awal</label>
							<div class="controls controls-row">
								<input type="text" name="tglawal" id="tglawal" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />
								
								<label for="tglakhir" class="control-label">Tanggal Akhir</label>
								<input style="margin-left: 2.5641%;" type="text" name="tglakhir" id="tglakhir" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />
						
							</div>
						</div>
						<div class="form-actions">
							<!--button style="padding-left:1%" type="button" onclick="export_submit('<!?php echo $value['ID_PROP']; ?>')" class="button button-basic-blue">Export</button-->
							<input class="button button-basic-darkblue" name="submit" type="submit" value="Export">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>