<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('penelitian').focus();
	});
	
	function addapenelitian_submit() {

		var vkodepenelitian = document.propform.kodepenelitian;
		var vpenelitian = document.propform.penelitian;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodepenelitian.value=='' || !(vkodepenelitian.value.length==2) ){
			alert("Kode penelitian harus diisi (Harus 2 Chars).");
			vkodepenelitian.focus();
			return false;
		}
		else if(vpenelitian.value=='' ){
			alert("Nama penelitian harus diisi.");
			vpenelitian.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addpenelitian) && $status_addpenelitian == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data penelitian berhasil');
	});
	<?php } ?>	
	
	function uppenelitian_submit() {

		var vkodepenelitian = document.uppropform.upkodepenelitian;
		var vpenelitian = document.uppropform.uppenelitian;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vkodepenelitian.value=='' || !(vkodepenelitian.value.length==2) ){
			alert("Kode penelitian harus diisi (Harus 2 Chars).");
			vkodepenelitian.focus();
			return false;
		}
		else if(vpenelitian.value=='' ){
			alert("Nama penelitian harus diisi.");
			vpenelitian.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_uppenelitian) && $status_uppenelitian == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data penelitian berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Laporan Hasil Penelitian</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Laporan</a><span class="divider">/</span></li>			
			<li class='active'>Hasil Penelitian</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head box-tabs">
					<ul class="tabs">
						<li class="active">
							<a href="#lab" data-toggle="tab">
								<i class="icon-flag"></i>
								Menurut Lab
							</a>
						</li>
						<li>
							<a href="#nama" data-toggle="tab">
								Menurut Nama Spesimen
							</a>
						</li>
						<li>
							<a href="#prop" data-toggle="tab">
								Menurut Propinsi
							</a>
						</li>
					</ul>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="tab-content">
						<div class="tab-pane active" id="lab">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" id="frm1" name="propform" class='form-horizontal'>
									<input type="hidden" name="status_addpenelitian" value="0">
									<div class="control-group">
										<label for="penelitian" class="control-label">Nama penelitian</label>
										<div class="controls controls-row">
											<input type="text" name="penelitian" id="penelitian" class="span7" />
									
										</div>
									</div>
									<div class="control-group">
										<label for="kodepenelitian" class="control-label">Kode penelitian</label>
										<div class="controls controls-row">
											<input type="text" name="kodepenelitian" id="kodepenelitian" maxlength="2" class="span1"/>
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addapenelitian_submit()" class="button button-basic-blue">Simpan</button>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane" id="nama">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" id="frm1" name="namaform" class='form-horizontal'>
									<div class="control-group">
										<label for="Spesimen" class="control-label">Nama Spesimen</label>
										<div class="controls controls-row">
											<input type="text" name="Spesimen" id="Spesimen" class="span7" />
									
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="nama_submit()" class="button button-basic-blue">Simpan</button>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane" id="prop">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" id="frm1" name="propform" class='form-horizontal'>
									<div class="control-group">
										<label for="Propinsi" class="control-label">Propinsi</label>
										<div class="controls controls-row">
            								<select name="Propinsi" id="Propinsi" class="span5"  >
            									<option value="0"> - Pilih Propinsi yang akan di Export - </option>
            									<?php foreach($arr_prov as $value): ?>
            									<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
            									<?php endforeach; ?>
            								</select>
									
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="prop_submit()" class="button button-basic-blue">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>