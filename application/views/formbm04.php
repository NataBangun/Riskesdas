<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;
		$ID('NoStiker').focus();
	});
	
	function nostiker(event) {
		if (event.keyCode == 13 ) {
			var vNoStiker = $ID('NoStiker').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload($ID('NoStiker').value);
		}
	}
	
	function reload(value) {
		$.post('<?php echo $application_path;?>/formbm04/cek/'+value,
		function(data){
			
				if (data=='no'){
					alert("No Stiker Sudah Terdaftar.");
				} else {
				
					jQuery.ajax({
						url:'<?php echo $application_path; ?>/formbm04/nostiker/'+value,
						complete: function(res, status) {
							var rows = eval(res.responseText);
							var vprov = document.bm4form.Prov;
							var vkota = document.bm4form.Kota;
							var vkec = document.bm4form.Kec;
							var vdesa = document.bm4form.Desa;
							var vdk = document.bm4form.DK;
							var vkodesampel = document.bm4form.KodeSampel;
							var vNoSensus = document.bm4form.NoSensus;
							var vnourut = document.bm4form.NoUrut;
							var vnamaart = document.bm4form.NamaART;
							
							var vjk = document.bm4form.JK;
							var valamat = document.bm4form.AlamatART;
							var vnamaenum = document.bm4form.NamaEnumerator;
							var vnourutart = document.bm4form.NoART;
							
							vprov.value = rows[0].propinsi_id;
							vkota.value = rows[0].kabupaten_id;
							vkec.value = rows[0].kecamatan_id;
							vdesa.value = rows[0].kelurahan_id;
							vdk.value = rows[0].DK;
							vkodesampel.value = rows[0].kode_sampel;
							vNoSensus.value = rows[0].no_bangun_sensus;
							vnourut.value = rows[0].no_urut_sampel;
							vnamaart.value = rows[0].namaART;
							
							vjk.value = rows[0].JK;
							valamat.value = rows[0].alamat;
							vnamaenum.value = rows[0].nama_enumerator;
							vnourutart.value = rows[0].noART;
						}
					});
				}
			});
	} 
	
	function addabm04_submit() {

		var vprov = document.bm4form.Prov;
		var vkota = document.bm4form.Kota;
		var vkec = document.bm4form.Kec;
		var vdesa = document.bm4form.Desa;
		var vdk = document.bm4form.DK;
		var vkodesampel = document.bm4form.KodeSampel;
		var vNoSensus = document.bm4form.NoSensus;
		var vnourut = document.bm4form.NoUrut;
		var vNamaLab = document.bm4form.NamaLab;
		var vAlamatLab = document.bm4form.AlamatLab;
		var vNamaEnumerator = document.bm4form.NamaEnumerator;
		//var vTelpEnumerator = document.bm4form.TelpEnumerator;
		var vNamaART = document.bm4form.NamaART;
		var vNoART = document.bm4form.NoART;
		var vUmur = document.bm4form.Umur;
		var vJK = document.bm4form.JK;
		var vTanya1 = document.bm4form.Tanya1;
		var vNoStiker = document.bm4form.NoStiker;
		var vAlamatART = document.bm4form.AlamatART;
		//var vAmbilDarah = document.bm4form.AmbilDarah;
		//var vKadarHB_Nilai = document.bm4form.KadarHB_Nilai;
		//var vKadarHB_Waktu = document.bm4form.KadarHB_Waktu;
		//var vKadarHB_Tgl = document.bm4form.KadarHB_Tgl;
		//var vRDiabet = document.bm4form.RDiabet;
		//var vMinumInsulin = document.bm4form.MinumInsulin;
		//var vPuasa = document.bm4form.Puasa;
		//var vAkhirMakan = document.bm4form.AkhirMakan;
		//var vPembebananGlukosa = document.bm4form.PembebananGlukosa;
		//var vDuaJPembebananGlukosa = document.bm4form.DuaJPembebananGlukosa;
		// var vKGlukosa1_Nilai = document.bm4form.KGlukosa1_Nilai;
		// var vKGlukosa1_Waktu = document.bm4form.KGlukosa1_Waktu;
		// var vKGlukosa1_Tgl = document.bm4form.KGlukosa1_Tgl;
		// var vKGlukosa2_Nilai = document.bm4form.KGlukosa2_Nilai;
		// var vKGlukosa2_Waktu = document.bm4form.KGlukosa2_Waktu;
		// var vKGlukosa2_Tgl = document.bm4form.KGlukosa2_Tgl;
		// var vKGlukosa3_Nilai = document.bm4form.KGlukosa3_Nilai;
		// var vKGlukosa3_Waktu = document.bm4form.KGlukosa3_Waktu;
		// var vKGlukosa3_Tgl = document.bm4form.KGlukosa3_Tgl;
		var vTGLEnumerator = document.bm4form.TGLEnumerator;
		var vTGLDokterPendamping = document.bm4form.TGLDokterPendamping;
		var vNamaEnumelator = document.bm4form.NamaEnumelator;
		var vNamaDokterPendamping = document.bm4form.NamaDokterPendamping;

		
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
		else if(vNamaLab.value==''){
			alert("Nama Lab harus diisi.");
			vNamaLab.focus();
			return false;
		}
		else if(vAlamatLab.value==''){
			alert("Alamat lab harus diisi.");
			vAlamatLab.focus();
			return false;
		}
		else if(vNamaEnumerator.value==''){
			alert("Nama enumerator harus diisi.");
			vNamaEnumerator.focus();
			return false;
		}
		//else if(vTelpEnumerator.value==''){
//			alert("No telp harus diisi.");
//			vTelpEnumerator.focus();
//			return false;
//		}
		else if(vNamaART.value==''){
			alert("Nama ART harus diisi.");
			vNamaART.focus();
			return false;
		}
		else if(vNoART.value==''){
			alert("No ART Harus diisi.");
			vNoART.focus();
			return false;
		}
		else if(vUmur.value==''){
			alert("Umur harus diisi.");
			vUmur.focus();
			return false;
		}
		else if(vJK.value==''){
			alert("Jenis kelamin harus diisi.");
			vJK.focus();
			return false;
		}
		else if(vTanya1.value==''){
			alert("Pertanyaan : Apakah sedang hamil (harus dipilih).");
			vTanya1.focus();
			return false;
		}
		else if(vNoStiker.value==''){
			alert("No stiker harus diisi.");
			vNoStiker.focus();
			return false;
		}
		else if(vAlamatART.value==''){
			alert("Alamat ART harus diisi.");
			vAlamatART.focus();
			return false;
		}
		//else if(vAmbilDarah.value==''){
//			alert("Pengambilan darah belum diisi.");
//			vAmbilDarah.focus();
//			return false;
//		}
//		else if(vKadarHB_Nilai.value==''){
//			alert("Nilai kadar glukosa harus diisi.");
//			vKadarHB_Nilai.focus();
//			return false;
//		}
//		else if(vKadarHB_Waktu.value==''){
//			alert("Waktu pengambilan kadar glukosa harus diisi.");
//			vKadarHB_Waktu.focus();
//			return false;
//		}
//		else if(vKadarHB_Tgl.value==''){
//			alert("Tanggal pengambilan kadar glukosa harus diisi.");
//			vKadarHB_Tgl.focus();
//			return false;
//		}
		//else if(vRDiabet.value==''){
//			alert(".");
//			vRDiabet.focus();
//			return false;
//		}
//		else if(vMinumInsulin.value==''){
//			alert("Apakah anda sedang mengkonsumsi obat insulin?.");
//			vMinumInsulin.focus();
//			return false;
//		}
//		else if(vPuasa.value==''){
//			alert("Apa anda sedang puasa ?");
//			vPuasa.focus();
//			return false;
//		}
//		else if(vAkhirMakan.value==''){
//			alert("Terakhir makan pukul?");
//			vAkhirMakan.focus();
//			return false;
//		}
		//else if(vPembebananGlukosa.value==''){
//			alert("Pukul pembebanan glukosa, masih kosong.");
//			vPembebananGlukosa.focus();
//			return false;
//		}
		//else if(vDuaJPembebananGlukosa.value==''){
//			alert("Dua jam setelah pembebanan glukosa, masih kosong.");
//			vDuaJPembebananGlukosa.focus();
//			return false;
//		}
		//else if(vTGLEnumerator.value==''){
//			alert("Tanggal enumerator masih kosong.");
//			vTGLEnumerator.focus();
//			return false;
//		}
		else if(vTGLDokterPendamping.value==''){
			alert("Tanggal dokter pendamping masih kosong.");
			vTGLDokterPendamping.focus();
			return false;
		}
		else if(vNamaEnumelator.value==''){
			alert("Nama enumerator masih kosong.");
			vNamaEnumelator.focus();
			return false;
		}
		else if(vNamaDokterPendamping.value==''){
			alert("Nama dokter pendamping masih kosong.");
			vNamaDokterPendamping.focus();
			return false;
		}
		else {
		$ID('frm1').submit();
		// return true;
		}
		
	}
	
	<?php if (isset($status_addbm04) && $status_addbm04 == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form BM 04</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form BM 04</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form BM.04</span>
				</div>
				<div class="box-body">
					<form method="POST" id="frm1" name="bm4form" class='form-horizontal'>
						<input type="hidden" name="status_addbm04" value="0">
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
								<input type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
								<input type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
								<input type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
								<input type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
								<input type="text" name="DK" id="DK" maxlength="1" class="span1" />
								<input type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
								<input type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
								<input style="margin-left:11%" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
							</div>
						</div>
						<div class="control-group">
								<label for="NamaLab" class="control-label">Nama Lab</label>
							<div class="controls controls-row">
								
								<input type="text" name="NamaLab" id="NamaLab" class="span6"/>
						
							</div>
						</div>
						<div class="control-group">
								<label for="AlamatLab" class="control-label">Alamat Lab</label>
							<div class="controls controls-row">
								
								<input type="text" name="AlamatLab" id="AlamatLab" class="span8"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="NamaEnumerator" class="control-label">Nama Enumerator</label>
							<div class="controls controls-row">
								<input type="text" name="NamaEnumerator" id="NamaEnumerator" class="span5" />
								
								<label for="TelpEnumerator" class="control-label">No. Telp Enumerator</label>
								<!--<input style="margin-left: 2.5641%;" type="text" name="NamaKepLab" id="NamaKepLab" placeholder="DR JAMAL A NASER" class="span3"/>-->
								<input style="margin-left: 2.5641%;" type="text" name="TelpEnumerator" id="TelpEnumerator" maxlength="15" class="span3"/>
			
							</div>
						</div>
						<div class="control-group">
							<label for="NamaART" class="control-label">Nama ART</label>
							<div class="controls controls-row">
								<input type="text" name="NamaART" id="NamaART" class="span5" />
								
								<label for="NoART" class="control-label">No. Urut ART</label>
								<input style="margin-left: 2.5641%;" type="text" name="NoART" id="NoART" class="span3"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="Umur" class="control-label">Umur</label>
							<div class="controls controls-row">
								<input type="text" name="Umur" id="Umur" class="span1" />
								<label style="width:5%" class="control-label">Tahun</label>
								<!--<input style="margin-left: 1%;" type="text" name="bulan" id="bulan" placeholder="0" class="span1"/>
								<label style="width:5%" class="control-label">Bulan</label>-->
								
							</div>
						</div>
						<div class="control-group">
							<label for="JK" class="control-label">Jenis Kelamin</label>
							<div class="controls controls-row">
								<select name="JK" id="JK" class='input-large'>
									<option> - Jenis Kelamin - </option>
									<option value="1">Pria</option>
									<option value="2">Wanita</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="Tanya1" class="control-label">Untuk Wanita<br/><small>Apakah sedang hamil</small></label>
							<div class="controls controls-row">
								<select name="Tanya1" id="Tanya1" class='input-large'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="NoStiker" class="control-label">No. Stiker</label>
							<div class="controls controls-row">
								<input type="text" name="NoStiker" id="NoStiker" maxlength="13" class="span2" onkeyup='nostiker(event)'/>
								
							</div>
						</div>
						<div class="control-group">
							<label for="AlamatART" class="control-label">Alamat ART</label>
							<div class="controls controls-row">
								<input type="text" name="AlamatART" id="AlamatART" class="span7" />
								
							</div>
						</div>
						<hr/>
						
						<div class="control-group">
							<label for="AmbilDarah" class="control-label">Pengambilan darah pukul</label>
							<div class="controls controls-row">
									<input type="text" name="AmbilDarah" id="AmbilDarah" class="span1 mask_wkt" />
								<!--<div class="bootstrap-timepicker span1">
									<input style="width:70%" type="text" name="AmbilDarah" id="AmbilDarah" class="input-small timepick" />
									<span class="help-block">As dropdown</span>
								</div>-->
								
							</div>
						</div>
						<div class="control-group">
							<label for="KadarHB" class="control-label"><b>Kadar Haemoglobin / HB</b></label>
							<div class="controls controls-row">
							<label style="margin-left:1%; width:5%" for="KadarHB_Nilai" class="control-label">Nilai</label>
							<input style="margin-left: 2.5641%;" type="text" name="KadarHB_Nilai" id="KadarHB_Nilai" class="span1 mask_nilaihb" />
							<label style="margin-left:1%; width:5%" for="KadarHB_Waktu" class="control-label">Waktu</label>
							<input style="margin-left: 2.5641%;" type="text" name="KadarHB_Waktu" id="KadarHB_Waktu" class="span1 mask_wkt" />
							<!--<div class="bootstrap-timepicker span1">
								<input style="width:70%" type="text" name="KadarHB_Waktu" id="KadarHB_Waktu" class="input-small timepick" />
							</div>-->
							<label style="margin-left:1%; width:5%" for="KadarHB_Tgl" class="control-label">Tanggal</label>
							<input style="margin-left: 2.5641%;" type="text" name="KadarHB_Tgl" id="KadarHB_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
								
							</div>
						</div>
						<div class="control-group">
							<label for="RDiabet" class="control-label">Riwayat diabetes</label>
							<div class="controls controls-row">
								<select name="RDiabet" id="RDiabet" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
										
								<label style="margin-left: 8.5%;width:15%;" for="MinumInsulin" class="control-label">Minum obat anti insulin</label>
								<select style="margin-left: 2.5641%;" name="MinumInsulin" id="MinumInsulin" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
																
							</div>
						</div>
						<div class="control-group">
							<label for="Puasa" class="control-label">Puasa</label>
							<div class="controls controls-row">
								<select name="Puasa" id="Puasa" class='span3'>
									<option> - Silakan Pilih - </option>
									<option value="1">Ya</option>
									<option value="2">Tidak</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
								
								<label style="margin-left: 8.5%;width:15%;" class="control-label" for="AkhirMakan">Terakhir makan pukul</label>
									<input style="margin-left:2.5%" type="text" name="AkhirMakan" id="AkhirMakan" class="span1 mask_wkt" />
										<!--<div class="bootstrap-timepicker span1">
											<input style="width:70%" type="text" name="AkhirMakan" id="AkhirMakan" class="input-small timepick" />
										</div>-->
							</div>
						</div>
						<div class="control-group">
							<label for="PembebananGlukosa" class="control-label">Pembebanan Glukosa</label>
							<div class="controls controls-row">
								<input type="text" name="PembebananGlukosa" id="PembebananGlukosa" class="span1 mask_wkt" />
								<!--<div class="bootstrap-timepicker span1">
									<input style="width:70%" type="text" name="PembebananGlukosa" id="PembebananGlukosa" class="input-small timepick" />
								</div>-->
								<label style="margin-left: 15.5%;width:25%;" class="control-label" for="DuaJPembebananGlukosa" >2 Jam setelah pembebanan glukosa</label>
									<input style="margin-left:2.5%" type="text" name="DuaJPembebananGlukosa" id="DuaJPembebananGlukosa" class="span1 mask_wkt" />
									<!--<div class="bootstrap-timepicker span1">
										<input style="width:70%" type="text" name="DuaJPembebananGlukosa" id="DuaJPembebananGlukosa" class="input-small timepick" />
									</div>-->
						
							</div>
						</div>
						<hr/>
						<div class="control-group">
							<label for="KGlukosa1" class="control-label"><b>Kadar glukosa darah sewaktu</b><!--br/><small>Sebelum puasa</small--></label>
							<div class="controls controls-row">
							<label style="margin-left:1%; width:5%" for="KGlukosa1_Nilai" class="control-label">Nilai</label>
							<input style="margin-left: 2.5641%;" type="text" name="KGlukosa1_Nilai" id="KGlukosa1_Nilai" class="span1" />
							<label style="margin-left:1%; width:5%" for="KGlukosa1_Waktu" class="control-label">Waktu</label>
							<input style="margin-left:2.5%" type="text" name="KGlukosa1_Waktu" id="KGlukosa1_Waktu" class="span1 mask_wkt" />
							<!--<div class="bootstrap-timepicker span1">
								<input style="width:70%" type="text" name="KGlukosa1_Waktu" id="KGlukosa1_Waktu" class="input-small timepick" />
							</div>-->
							<label style="margin-left:1%; width:5%" for="KGlukosa1_Tgl" class="control-label">Tanggal</label>
							<input style="margin-left: 2.5641%;" type="text" name="KGlukosa1_Tgl" id="KGlukosa1_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
								
							</div>
						</div>
						<div class="control-group">
							<label for="KGlukosa2" class="control-label"><b>Kadar glukosa darah puasa</b><!--br/><small>Sewaktu puasa</small--></label>
							<div class="controls controls-row">
							<label style="margin-left:1%; width:5%" for="KGlukosa2_Nilai" class="control-label">Nilai</label>
							<input style="margin-left: 2.5641%;" type="text" name="KGlukosa2_Nilai" id="KGlukosa2_Nilai" class="span1" />
							<label style="margin-left:1%; width:5%" for="KGlukosa2_Waktu" class="control-label">Waktu</label>
							<input style="margin-left:2.5%" type="text" name="KGlukosa2_Waktu" id="KGlukosa2_Waktu" class="span1 mask_wkt" />
							<!--<div class="bootstrap-timepicker span1">
								<input style="width:70%" type="text" name="KGlukosa2_Waktu" id="KGlukosa2_Waktu" class="input-small timepick" />
							</div>-->
							<label style="margin-left:1%; width:5%" for="KGlukosa2_Tgl" class="control-label">Tanggal</label>
							<input style="margin-left: 2.5641%;" type="text" name="KGlukosa2_Tgl" id="KGlukosa2_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
								
							</div>
						</div>
						<div class="control-group">
							<label for="KGlukosa3" class="control-label"><b>Kadar glukosa darah 2 jam setelah pembebanan</b><!--br/><small>2 jam setelah pembebanan</small--></label>
							<div class="controls controls-row">
							<label style="margin-left:1%; width:5%" for="KGlukosa3_Nilai" class="control-label">Nilai</label>
							<input style="margin-left: 2.5641%;" type="text" name="KGlukosa3_Nilai" id="KGlukosa3_Nilai" class="span1" />
							<label style="margin-left:1%; width:5%" for="KGlukosa3_Waktu" class="control-label">Waktu</label>
							<input style="margin-left:2.5%" type="text" name="KGlukosa3_Waktu" id="KGlukosa3_Waktu" class="span1 mask_wkt" />
							<!--<div class="bootstrap-timepicker span1">
								<input style="width:70%" type="text" name="KGlukosa3_Waktu" id="KGlukosa3_Waktu" class="input-small timepick" />
							</div>-->
							<label style="margin-left:1%; width:5%" for="KGlukosa3_Tgl" class="control-label">Tanggal</label>
							<input style="margin-left: 2.5641%;" type="text" name="KGlukosa3_Tgl" id="KGlukosa3_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
								
							</div>
						</div>
						<hr/>
						<div class="control-group">
							<div class="controls controls-row">
								<!--label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
									TGL Ketua Tim Enumerator
								</label-->
								<label style="width:20%;margin-left:20%;text-align:left;" for="TGLDokterPendamping" class="help-block control-label">
									TGL Dokter Pendamping
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<!--input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" /-->
								<input style="margin-left:20%;" type="text" name="TGLDokterPendamping" id="TGLDokterPendamping" placeholder="dd/mm/yyyy" class="span2 datepick" />
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="width:20%;text-align:left;" for="NamaEnumelator" class="help-block control-label">
									Nama Ketua Tim Enumelator
								</label>
								<label style="width:20%;margin-left:20%;text-align:left;" for="NamaDokterPendamping" class="help-block control-label">
									Nama Dokter Pendamping
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
							
								<input type="text" name="NamaEnumelator" id="NamaEnumelator" class="span3">
								<input style="margin-left:17%;" type="text" name="NamaDokterPendamping" id="NamaDokterPendamping" class="span3">
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" class="button button-basic-blue" onclick="addabm04_submit()" >Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>