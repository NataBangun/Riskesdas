<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('NoStiker').focus();
	});
	
	function reload(value) {
		$.post('<?php echo $application_path;?>/formbm02/cek/'+value,
		function(data){
			
				if (data=='no'){
					alert("No Stiker Sudah Terdaftar.");
					$('#simpan').hide();
				} else {
					$('#simpan').show();
					jQuery.ajax({
						url:'<?php echo $application_path; ?>/formbm02/nostiker/'+value,
						complete: function(res, status) {
							var rows = eval(res.responseText);
							var vprov = document.bm2form.Prov;
							var vkota = document.bm2form.Kota;
							var vkec = document.bm2form.Kec;
							var vdesa = document.bm2form.Desa;
							var vdk = document.bm2form.DK;
							var vkodesampel = document.bm2form.KodeSampel;
							var vNoSensus = document.bm2form.NoSensus;
							var vnourut = document.bm2form.NoUrut;
							var vnamaart = document.bm2form.NamaART;
							var vnamalab = document.bm2form.NamaLab;
							var vnoart = document.bm2form.NoART;
//							var vjk = document.bm2form.JK;
							var valamat = document.bm2form.Alamat;
							
							
							vprov.value = rows[0].propinsi_id;
							vkota.value = rows[0].kabupaten_id;
							vkec.value = rows[0].kecamatan_id;
							vdesa.value = rows[0].kelurahan_id;
							vdk.value = rows[0].DK;
							vkodesampel.value = rows[0].kode_sampel;
							vNoSensus.value = rows[0].no_bangun_sensus;
							vnourut.value = rows[0].no_urut_sampel;
							vnamaart.value = rows[0].nama_ART;
							vnamalab.value = rows[0].nama_lab;
							vnoart.value = rows[0].no_urutART;
//							vjk.value = rows[0].JK;
							valamat.value = rows[0].alamatART;
						}
					});
				}
			});
	} 
	
	function nostiker(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload($ID('NoStiker').value);
		}
	}
	
	function addabm02_submit() {

		var vprov = document.bm2form.Prov;
		var vkota = document.bm2form.Kota;
		var vkec = document.bm2form.Kec;
		var vdesa = document.bm2form.Desa;
		var vdk = document.bm2form.DK;
		var vkodesampel = document.bm2form.KodeSampel;
		var vNoSensus = document.bm2form.NoSensus;
		var vnourut = document.bm2form.NoUrut;
		var valamat = document.bm2form.Alamat;
		var vnamaart = document.bm2form.NamaART;
		var vnoart = document.bm2form.NoART;
		var vnostiker = document.bm2form.NoStiker;
		var vriwayatsakit = document.bm2form.RiwayatSakit;
		var vtglambildarah = document.bm2form.TglAmbilDrh;
		var vnamalab = document.bm2form.NamaLab;
		var vpenetasanbuffer = document.bm2form.PenetasanBuffer;
		var vbacardt = document.bm2form.BacaRDT;
		var vrdt = document.bm2form.RDT;
		var vtanya1 = document.bm2form.Tanya1;
		var vtanya2 = document.bm2form.Tanya2;
		//var vtglenumerator = document.bm2form.TGLEnumerator;
		var vtglnakes = document.bm2form.TGLNakes;
		var vnamaenumerator = document.bm2form.NamaEnumelator;
		var vnamanakespendamping = document.bm2form.NamaNakesPendamping;
		// var v = document.bm2form.;
		// var v = document.bm2form.;
		
		
		if(vprov.value=='' || !(vprov.value.length==2) ){
			alert("Propinsi harus diisi (Harus 2 Chars).");
			vprov.focus();
			return false;
		}
		else if(vkota.value=='' || !(vkota.value.length==2) ){
			alert("Kota/Kabupaten harus diisi (Harus 2 Chars).");
			vkota.focus();
			return false;
		}
		else if(vkec.value=='' || !(vkec.value.length==3 )){
			alert("Kecamatan harus diisi (Harus 3 Chars).");
			vkec.focus();
			return false;
		}
		else if(vdesa.value=='' || !(vdesa.value.length==3 )){
			alert("Desa/Kelurahan harus diisi (Harus 3 Chars).");
			vdesa.focus();
			return false;
		}
		else if(vdk.value=='' || !(vdk.value=='1' || vdk.value=='2')){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vkodesampel.value=='' || !(vkodesampel.value.length==7 )){
			alert("Kode Sampel harus diisi (Harus 6 Chars).");
			vkodesampel.focus();
			return false;
		}
		else if(vNoSensus.value=='' || !(vNoSensus.value.length==3 )){
			alert("Kode sensus harus diisi (Harus 3 Chars).");
			vNoSensus.focus();
			return false;
		}
		else if(vnourut.value=='' || !(vnourut.value.length==2 )){
			alert("No Urut Sampel harus diisi (Harus 2 Chars).");
			vnourut.focus();
			return false;
		}
		else if(valamat.value==''){
			alert("Alamat harus diisi.");
			valamat.focus();
			return false;
		}
		else if(vnamaart.value==''){
			alert("Nama ART harus diisi.");
			vnamaart.focus();
			return false;
		}
	/* 	else if(vnoart.value=='' || !(vnoart.value.length==2) ){
			alert("No. urut ART harus diisi (Harus 2 Chars).");
			vnoart.focus();
			return false;
		} */
		else if(vnostiker.value=='' || !(vnostiker.value.length==6) ){
			alert("No. stiker harus diisi (Harus 6 Chars).");
			vnostiker.focus();
			return false;
		}
		else if(vriwayatsakit.selectedIndex==0){
			alert("Riwayat penyakit berat harus diisi.");
			vriwayatsakit.focus();
			return false;
		}
		else if(vtglambildarah.value==''){
			alert("Tanggal pengambilan darah harus diisi.");
			vtglambildarah.focus();
			return false;
		}
		else if(vnamalab.value==''){
			alert("Nama Lab. harus diisi.");
			vnamalab.focus();
			return false;
		}
		else if(vpenetasanbuffer.value==''){
			alert("Waktu penetasan buffer harus diisi.");
			vpenetasanbuffer.focus();
			return false;
		}
		else if(vbacardt.value==''){
			alert("Waktu pembacaan RDT harus diisi.");
			vbacardt.focus();
			return false;
		}
		else if(vrdt.selectedIndex==0){
			alert("Rapid Diagnostic Test / RDT harus diisi.");
			vrdt.focus();
			return false;
		}
		else if(vtanya1.selectedIndex==0){
			alert("Pertanyaan : Apakah ART mengalami riwayat demam dalam 2 hari terakhir? (harus diisi).");
			vtanya1.focus();
			return false;
		}
		else if(vtanya2.selectedIndex==0){
			alert("Pertanyaan : Apakah dibuat sediaan daarah apus tebal? (Harus diisi).");
			vtanya2.focus();
			return false;
		}
		//else if(vtglenumerator.value==''){
//			alert("Tanggal Enumerator harus diisi.");
//			vtglenumerator.focus();
//			return false;
//		}
		else if(vtglnakes.value==''){
			alert("Tanggal nakes pendamping harus diisi.");
			vtglnakes.focus();
			return false;
		}
		else if(vnamaenumerator.value==''){
			alert("Nama Enumerator harus diisi.");
			vnamaenumerator.focus();
			return false;
		}
		else if(vnamanakespendamping.value==''){
			alert("Nama nakes pendamping harus diisi.");
			vnamanakespendamping.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addbm02) && $status_addbm02 == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form BM 02</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form BM 02</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form BM.02</span>
				</div>
				<!--<div class="box-body box-body-nopadding">-->
				<div class="box-body">
					<form method="POST" id="frm1" name="bm2form" class='form-horizontal'>
						<input type="hidden" name="status_addbm02" value="0"/>
						<input type="hidden" name="user" value="<?php echo $welcome; ?>"/>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="width:3%;text-align:left;" for="Prov" class="help-block control-label">
									Prov
								</label>
								<label style="width:3%;margin-left:6%;text-align:left;" for="Kota" class="help-block control-label">
									Kota
								</label>
								<label style="width:4%;margin-left:5%;text-align:left;" for="Kec" class="help-block control-label">
									Kec
								</label>
								<label style="width:4%;margin-left:5%;text-align:left;" for="Desa" class="help-block control-label">
									Desa
								</label>
								<label style="width:3%;margin-left:5%;text-align:left;" for="DK" class="help-block control-label">
									D/K
								</label>
								<label style="width:15%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
									No. Kode Sampel
								</label>
								<label style="width:15%;margin-left:2%;text-align:left;" for="NoSensus" class="help-block control-label">
									No. Bangunan Sensus
								</label>
								<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									No. Urut
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input readonly="" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
								<input readonly="" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
								<input readonly="" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
								<input readonly="" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
								<input readonly="" type="text" name="DK" id="DK" maxlength="1" class="span1" />
								<input readonly="" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
								<input readonly="" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
								<input readonly="" style="margin-left:11%" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
							</div>
						</div>
						<div class="control-group">
							<label for="Alamat" class="control-label">Alamat Lengkap</label>
							<div class="controls controls-row">
								<input readonly="" type="text" name="Alamat" id="Alamat" class="span7" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="NamaART" class="control-label">Nama ART</label>
							<div class="controls controls-row">
								<input readonly="" type="text" name="NamaART" id="NamaART" class="span5"/>
						
							</div>
						</div>
						<div class="control-group">
								<label for="NoART" class="control-label">No. Urut ART</label>
							<div class="controls controls-row">
								<input readonly="" type="text" name="NoART" id="NoART" class="span1"/>
						
								<label for="NoStiker" class="control-label">No. Stiker</label>
								<input data-placement="right" rel="tooltip" title="Masukkan No Stiker, kemudian ENTER." style="margin-left: 2.5641%;" type="text" name="NoStiker" id="NoStiker" class="span2" onkeyup="nostiker(event)"/>
							</div>
						</div>
						<div class="control-group">
								<label for="RiwayatSakit" class="control-label">Riwayat sakit berat</label>
							<div class="controls controls-row">
								<select name="RiwayatSakit" id="RiwayatSakit" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
								
						
							</div>
						</div>
						<div class="control-group">
							<label for="TglAmbilDrh" class="control-label">TGL Pengambilan darah</label>
							<div class="controls controls-row">
								<input type="text" name="TglAmbilDrh" id="TglAmbilDrh" placeholder="dd/mm/yyyy" class="span2 datepick" />
								
								<label style="width:20%" for="NamaLab" class="control-label">Nama Lab. Lapangan</label>
								<input readonly="" style="margin-left: 2.5641%;" type="text" name="NamaLab" id="NamaLab" class="span6"/>
								
							</div>
						</div>
						<div class="control-group">
							<label for="PenetasanBuffer" class="control-label">Waktu Penetasan Buffer</label>
							<div class="controls controls-row">
								<div class="bootstrap-timepicker span1">
									<input style="width:70%" type="text" name="PenetasanBuffer" id="PenetasanBuffer" class="input-small mask_wkt" />
								</div>
								<label style="width:40%" for="BacaRDT" class="control-label">Waktu Pembacaan RDT</label>
								<div class="bootstrap-timepicker span1">
									<input style="width:70%" type="text" name="BacaRDT" id="BacaRDT" class="input-small mask_wkt" />
								</div>
							</div>
						</div>
						<div class="control-group">
								<label for="RDT" class="control-label">Rapid Diagnostic Tes<br/><b><small>(RDT)</small></b></label>
							<div class="controls controls-row">
								<select name="RDT" id="RDT" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">1. Negatif</option>
									<option value="2">2. P.falciparum (Pf)</option>
									<option value="3">3. P. vivax (Pv)</option>
									<option value="4">4. Pf dan Pv (mix)</option>
									<option value="5">5. Hasil tidak sahih</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
							<label style="width:50%" for="Tanya1" class="control-label"><b>Apakah ART mengalami riwayat demam/panas dalam 2hari terakhir?</b></label>
								<select style="margin-left: 2.5641%;" name="Tanya1" id="Tanya1" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
							<label style="width:50%" for="Tanya2" class="control-label"><b>Apakah dibuat sediaan darah apus tebal (duplo)?</b></label>
								<select style="margin-left: 2.5641%;" name="Tanya2" id="Tanya2" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
							</div>
						</div>
						<hr/>
						<div class="control-group">
							<div class="controls controls-row">
								<!--<label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
									TGL Enumerator
								</label>-->
								<label style="width:20%;margin-left:20%;text-align:left;" for="TGLNakes" class="help-block control-label">
									TGL Nakes
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<!--<input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" />-->
								<input style="margin-left:20%;" type="text" name="TGLNakes" id="TGLNakes" placeholder="dd/mm/yyyy" class="span2 datepick" />
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="width:20%;text-align:left;" for="NamaEnumelator" class="help-block control-label">
									Nama Enumelator
								</label>
								<label style="width:20%;margin-left:20%;text-align:left;" for="NamaNakesPendamping" class="help-block control-label">
									Nakes Pendamping
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
							
								<input type="text" name="NamaEnumelator" id="NamaEnumelator" class="span3"/>
								<input style="margin-left:17%;" type="text" name="NamaNakesPendamping" id="NamaNakesPendamping" class="span3"/>
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" id="simpan" onclick="addabm02_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>