<script type="text/javascript">
	
	function addabm04_submit() {
		$ID('frm1').submit();
	}
	// $(document).ready(function() {
		// // var vNoStiker = $ID('NoStiker').value;

			// $ID('penelitian').focus();
	// });
	
	// function addapenelitian_submit() {

		// var vkodepenelitian = document.propform.kodepenelitian;
		// var vpenelitian = document.propform.penelitian;
		// // var v = document.propform.;
		// // var v = document.propform.;
		
		
		// if(vkodepenelitian.value=='' || !(vkodepenelitian.value.length==2) ){
			// alert("Kode penelitian harus diisi (Harus 2 Chars).");
			// vkodepenelitian.focus();
			// return false;
		// }
		// else if(vpenelitian.value=='' ){
			// alert("Nama penelitian harus diisi.");
			// vpenelitian.focus();
			// return false;
		// }
		// else {
		
		// $ID('frm1').submit();
		// // return true;
		// }
	// }
	
	<!--?php if (isset($status_addpenelitian) && $status_addpenelitian == 1) { ?>
	// jQuery(document).ready(function(){
		// alert('Penambahan data penelitian berhasil');
	// });
	<!--?php } ?-->	
	
	// function uppenelitian_submit() {

		// var vkodepenelitian = document.uppropform.upkodepenelitian;
		// var vpenelitian = document.uppropform.uppenelitian;
		// // var v = document.uppropform.;
		// // var v = document.uppropform.;
		
		
		// if(vkodepenelitian.value=='' || !(vkodepenelitian.value.length==2) ){
			// alert("Kode penelitian harus diisi (Harus 2 Chars).");
			// vkodepenelitian.focus();
			// return false;
		// }
		// else if(vpenelitian.value=='' ){
			// alert("Nama penelitian harus diisi.");
			// vpenelitian.focus();
			// return false;
		// }
		// else {
		
		// $ID('frm2').submit();
		// // return true;
		// }
	// }
	
	<!--?php if (isset($status_uppenelitian) && $status_uppenelitian == 1) { ?>
	// jQuery(document).ready(function(){
		// alert('Data penelitian berhasil di perbaharui.');
	// });
	<!--?php } ?-->	
	$(function(){
		$("#print_cetak").click(function(){
	    var lab = $("#lab").val();
	    var tgl1 = $("#tglawal").val();
	    var tgl2 = $("#tglakhir").val();
	    var x = window.open("<?php echo $application_path; ?>/view_exportlab/cetak/"+lab tglawal +'/'+tgl1 +'/'+tgl2, "Cetak Lab","toolbar=0,menubar=0,resizable=0");
	    });
	});

	 $(document).ready(function(){

		$("#cetak_submit").click(function(){

	    var lab = $("#lab").val();
	    var tgl1 = $("#tglawal").val();
	    var tgl2 = $("#tglakhir").val();
		window.open("<?php echo $application_path; ?>/view_exportlab/cetak/lab="+lab+"&tgl1="+tgl1+"&tgl2="+tgl2,"Cetak","status=1,toolbar=1")

			/*$.ajax({
				type: "POST",
				window.open("<?php echo $application_path; ?>/view_exportlab/cetak/lab="+lab+"&tgl1="+tgl1+"&tgl2="+tgl2,"Cetak","status=1,toolbar=1")
				url: "<?php echo $application_path; ?>/view_exportlab/cetak",
				dataType: "json",
				data: "lab="+lab+"&tgl1="+tgl1+"&tgl2="+tgl2,
				cache:false,
			});*/

		return false;

		});

	});
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Laporan Pemeriksaan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Laporan</a><span class="divider">/</span></li>			
			<li class='active'>Pemeriksaan</li>
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
								Lab
							</a>
						</li>
						<li>
							<a href="#prop" data-toggle="tab">
								Propinsi
							</a>
						</li>
						<li>
							<a href="#tgl" data-toggle="tab">
								Tanggal
							</a>
						</li>
						<li>
							<a href="#js" data-toggle="tab">
								Jenis Spesimen
							</a>
						</li>
						<li>
							<a href="#revco" data-toggle="tab">
								Jenis Pemeriksaan
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
								<!--form method="POST" action="<!?php echo $application_path; ?>/view_exportlab/index/" id="frm1" name="labform" class='form-horizontal'-->
								<form method="POST" id="frm1" name="labform" class='form-horizontal'>
									<div class="control-group">
										<label for="lab" class="control-label">Nama Lab</label>
										<div class="controls controls-row">
            								<select name="lab" id="lab" class="span4"  >
												<option value="0"> - Silakan Pilih Laboraturium - </option>
												<?php foreach($arr_lab as $value): ?>
												<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_NAME'] ?></option>
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
										<a class="button button-highlighted" id="print_cetak" href="javascript:void(0)">Print</a>
										<input class="button button-highlighted" name="cetak_submit" id="cetak_submit" type="submit" value="Print">
                                        <input class="button button-darkblue" name="submit" type="submit" value="Export"/>
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
								<form method="POST" action="<?php echo $application_path; ?>/view_exportprop/index/"  id="frm1" name="propform" class='form-horizontal'>
            						<div class="control-group">
            								<label for="Propinsi" class="control-label">Propinsi</label>
            							<div class="controls">
            								<select name="Propinsi" id="Propinsi" class="span5"  >
            									<option value="0"> - Pilih Propinsi - </option>
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
										<input class="button button-basic-darkblue" name="submit" type="submit" value="Export">
									</div>
								</form>
							</div>
						</div>
                        
						<div class="tab-pane" id="tgl">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" action="<?php echo $application_path; ?>/view_exporttgl/index/" id="frm1" name="tglform" class='form-horizontal'>
            						<div class="control-group">
            							<label for="tglawal" class="control-label">Taggal Awal</label>
            							<div class="controls controls-row">
            								<input type="text" name="tglawal" id="tglawal" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />
            								
            								<label for="tglakhir" class="control-label">Tanggal Akhir</label>
            								<input style="margin-left: 2.5641%;" type="text" name="tglakhir" id="tglakhir" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />
            						
            							</div>
            						</div>
									<div class="form-actions">
										<input class="button button-basic-darkblue" name="submit" type="submit" value="Export">
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane" id="js">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" action="<?php echo $application_path; ?>/view_exportspes/index/" id="frm1" name="jsform" class='form-horizontal'>
            						<div class="control-group">
            								<label for="JenisSpesimen" class="control-label">Jenis Spesimen</label>
            							<div class="controls">
											<select name="JenisSpesimen" id="JenisSpesimen" class='span4' >
												<option value=""> - Silakan Pilih Jenis Spesimen - </option>
												<?php foreach($arr_spesimen as $value): ?>
												<option value="<?php echo $value['spesimen_kode']; ?>"><?php echo $value['spesimen_kode']; ?> - <?php echo $value['spesimen_name']; ?></option>
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
										<input class="button button-basic-darkblue" name="submit" type="submit" value="Export">
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane" id="revco">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" action="<?php echo $application_path; ?>/view_exportjenpen/index/" id="frm1" name="jsform" class='form-horizontal'>
            						<div class="control-group">
            								<label for="JenisRevco" class="control-label">Jenis Pemeriksaan</label>
            							<div class="controls">
            								<select name="JenisRevco" id="JenisRevco" class="span5"  >
            									<option value="0"> - Pilih Jenis Revco - </option>
            									<?php foreach($arr_revcojenis as $value): ?>
            									<option value="<?php echo $value['no_revco_jenis']; ?>"><?php echo $value['no_revco_jenis']; ?> - <?php echo $value['nama_revco_jenis']; ?></option>
            									<?php endforeach; ?>
            								</select>
            						
            							</div>
            						</div>
									<div class="form-actions">
										<input class="button button-basic-darkblue" name="submit" type="submit" value="Export">
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