<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

		//$ID('NoStiker').focus();
		
		var count = 0;

		$("#add_btn").click(function(){
			count += 1;
			if (count == 7) {
				$('#add_btn').hide();
			}
			$('#container').append(
			
				'<div class="control-group records" >'
				+'<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_' + count + '" id="No_' + count + '" value="' + count + '" maxlength="2" class="span1" />'
				+'<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_' + count + '" id="Nama_' + count + '" maxlength="2" class="span1" />'
				+'<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_' + count + '" id="Umr_' + count + '" maxlength="3" class="span1" />'
				+'<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_' + count + '" id="NoStiker_' + count + '" maxlength="6" class="span1" onkeyup="nostiker_' + count + '(event)" />'
				+'<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_' + count + '" id="JK_' + count + '" maxlength="1" class="span1" />'
				+'<select style="width: 10%; margin-left: 2%" name="Urin_' + count + '" id="Urin_' + count + '" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>'
				+'<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_' + count + '" id="Tgl1_' + count + '" placeholder="dd/mm/yyyy" class="span1 datepick" />'
				+'<select style="width: 10%; margin-left: 2%" name="Darah_' + count + '" id="Darah_' + count + '" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>'
				+'<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_' + count + '" id="Tgl2_' + count + '" placeholder="dd/mm/yyyy" class="span1 datepick" />'
				+'<a class="remove_item" href="#" >Delete</a>'
				+'<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden">'
				+'</div>'
			);
            $ID('JmlData').value = count;
			
		});

		$(".remove_item").live('click', function (ev) {
			if (ev.type == 'click') {
				$(this).parents(".records").fadeOut();
				$(this).parents(".records").remove();
                count -=1;
                $ID('JmlData').value = count;
			}
		});
        
        
	});
	
	function reload(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vprov = document.bm1form.Prov;
				var vkota = document.bm1form.Kota;
				var vkec = document.bm1form.Kec;
				var vdesa = document.bm1form.Desa;
				var vdk = document.bm1form.DK;
				var vkodesampel = document.bm1form.KodeSampel;
				var vNoSensus = document.bm1form.NoSensus;
				var vnourut = document.bm1form.NoUrut;
				var vnamaart = document.bm1form.Nama_1;
				var vumurart = document.bm1form.Umr_1;
				var vnamalab = document.bm1form.LabLap;
				var vjk = document.bm1form.JK_1;
				var valamat = document.bm1form.Alamat;
				
				
				vprov.value = rows[0].propinsi_id;
				vkota.value = rows[0].kabupaten_id;
				vkec.value = rows[0].kecamatan_id;
				vdesa.value = rows[0].kelurahan_id;
				vdk.value = rows[0].DK;
				vkodesampel.value = rows[0].kode_sampel;
				vNoSensus.value = rows[0].no_bangun_sensus;
				vnourut.value = rows[0].no_urut_sampel;
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vnamalab.value = rows[0].nama_lab;
				vjk.value = rows[0].JK;
				valamat.value = rows[0].alamatART;
			}
		});
	} 
	
	function reload1(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_2;
				var vumurart = document.bm1form.Umr_2;
				var vjk = document.bm1form.JK_2;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	function reload2(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_3;
				var vumurart = document.bm1form.Umr_3;
				var vjk = document.bm1form.JK_3;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	function reload3(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_4;
				var vumurart = document.bm1form.Umr_4;
				var vjk = document.bm1form.JK_4;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	function reload4(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_5;
				var vumurart = document.bm1form.Umr_5;
				var vjk = document.bm1form.JK_5;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	function reload5(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_6;
				var vumurart = document.bm1form.Umr_6;
				var vjk = document.bm1form.JK_6;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	function reload6(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_7;
				var vumurart = document.bm1form.Umr_7;
				var vjk = document.bm1form.JK_7;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	function reload7(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_8;
				var vumurart = document.bm1form.Umr_8;
				var vjk = document.bm1form.JK_8;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	}
	
	function reload8(value) {
		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/formbm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vnamaart = document.bm1form.Nama_9;
				var vumurart = document.bm1form.Umr_9;
				var vjk = document.bm1form.JK_9;
				
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	
	function nostiker_1(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_1').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload($ID('NoStiker_1').value);
		}
	}
	function nostiker_2(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_2').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload1($ID('NoStiker_2').value);
		}
	}
	function nostiker_3(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_3').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload2($ID('NoStiker_3').value);
		}
	}
	function nostiker_4(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_4').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload3($ID('NoStiker_4').value);
		}
	}
	function nostiker_5(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_5').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload4($ID('NoStiker_5').value);
		}
	}
	function nostiker_6(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_6').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload5($ID('NoStiker_6').value);
		}
	}
	function nostiker_7(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_7').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload6($ID('NoStiker_7').value);
		}
	}
	function nostiker_8(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_8').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload7($ID('NoStiker_8').value);
		}
	}
	function nostiker_9(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_9').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload8($ID('NoStiker_9').value);
		}
	}
	
	function addabm01_submit() {

		/*var vprov = document.bm1form.Prov;
		var vkota = document.bm1form.Kota;
		var vkec = document.bm1form.Kec;
		var vdesa = document.bm1form.Desa;
		var vdk = document.bm1form.DK;
		var vkodesampel = document.bm1form.KodeSampel;
		var vNoSensus = document.bm1form.NoSensus;
		var vnourut = document.bm1form.NoUrut;
		var valamat = document.bm1form.Alamat;
		var vnamaart = document.bm1form.NamaART;
		var vnoart = document.bm1form.NoART;
		var vnostiker = document.bm1form.NoStiker;
		var vriwayatsakit = document.bm1form.RiwayatSakit;
		var vtglambildarah = document.bm1form.TglAmbilDrh;
		var vnamalab = document.bm1form.NamaLab;
		var vpenetasanbuffer = document.bm1form.PenetasanBuffer;
		var vbacardt = document.bm1form.BacaRDT;
		var vrdt = document.bm1form.RDT;
		var vtanya1 = document.bm1form.Tanya1;
		var vtanya2 = document.bm1form.Tanya2;*/
		//var vtglenumerator = document.bm1form.TGLEnumerator;
		/*var vtglnakes = document.bm1form.TGLNakes;
		var vnamaenumerator = document.bm1form.NamaEnumelator;*/	
		var vnamanakespendamping = document.bm1form.NmNakes;
		// var v = document.bm1form.;
		// var v = document.bm1form.;
		
		
		/*if(vprov.value=='' || !(vprov.value.length==2) ){
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
		else if(vnoart.value=='' || !(vnoart.value.length==2) ){
			alert("No. urut ART harus diisi (Harus 2 Chars).");
			vnoart.focus();
			return false;
		}
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
		}*/
		//else if(vtglenumerator.value==''){
//			alert("Tanggal Enumerator harus diisi.");
//			vtglenumerator.focus();
//			return false;
//		}
		/*else if(vtglnakes.value==''){
			alert("Tanggal nakes pendamping harus diisi.");
			vtglnakes.focus();
			return false;
		}
		else if(vnamaenumerator.value==''){
			alert("Nama Enumerator harus diisi.");
			vnamaenumerator.focus();
			return false;
		}
		else*/ if(vnamanakespendamping.value==''){
			alert("Nama nakes pendamping harus diisi.");
			vnamanakespendamping.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addbm01) && $status_addbm01 == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form BM 01</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form BM 01</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form BM.01</span>
				</div>
				<!--<div class="box-body box-body-nopadding">-->
				<div class="box-body">
					<form method="POST" id="frm1" name="bm1form" class='form-horizontal'>
						<input type="hidden" name="status_addbm01" value="0">
						<input type="hidden" id="JmlData" name="JmlData" value="0">
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
						<!--<div class="control-group">
								<label for="NamaART" class="control-label">Nama ART</label>
							<div class="controls controls-row">
								<input readonly="" type="text" name="NamaART" id="NamaART" class="span5"/>
						
							</div>
						</div>-->
						<div class="control-group">
								<label for="TglKumpul" class="control-label">Waktu Pengambilan Darah</label>
							<div class="controls controls-row">
								<input type="text" name="TglKumpul" id="TglKumpul" class="span2 datepick"/>
								
								<select name="HarKumpul" id="HarKumpul" class='span3'>
									<option> - Silakan Pilih Hari - </option>
									<option value="1">Senin</option>
									<option value="2">Selasa</option>
									<option value="3">Rabu</option>
									<option value="4">Kamis</option>
									<option value="5">Jumat</option>
									<option value="6">Sabtu</option>
									<option value="7">Minggu</option>
								</select>
								
								<label for="JamKumpul" class="control-label">Jam</label>
								<input style="margin-left: 2.5641%;" type="text" name="JamKumpul" id="JamKumpul" class="span1 mask_wkt" />
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Lab. Lapangan</label>
							<div class="controls controls-row">
								<input readonly="" style="" type="text" name="LabLap" id="LabLap" class="span5" />
								
						
							</div>
						</div>
						<hr/>
						<div class="control-group">
								<label style="width:2%;text-align:left;" for="Prov" class="help-block control-label">
									No.
								</label>
								<label style="width:18%;margin-left:2%;text-align:left;" for="Kota" class="help-block control-label">
									Nama ART
								</label>
								<label style="width:4%;margin-left:2%;text-align:left;" for="Kec" class="help-block control-label">
									Umur
								</label>
								<label style="width:8%;margin-left:2.5%;text-align:left;" for="Desa" class="help-block control-label">
									No Stiker
								</label>
								<label style="width:5%;margin-left:2%;text-align:left;" for="DK" class="help-block control-label">
									JK
								</label>
								<label style="width:10%;margin-left:2.5%;text-align:left;" for="KodeSampel" class="help-block control-label">
									Ambil Urin
								</label>
								<label style="width:10%;margin-left:2.5%;text-align:left;" for="NoSensus" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Ambil Darah
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
						</div>
						
						<!--div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_1" id="No_1" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_1" id="Nama_1" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_1" id="Umr_1" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_1" id="NoStiker_1" maxlength="6" class="span1" onkeyup="nostiker_1(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_1" id="JK_1" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_1" id="Urin_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_1" id="Tgl1_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_1" id="Darah_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_1" id="Tgl2_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_2" id="No_2" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_2" id="Nama_2" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_2" id="Umr_2" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_2" id="NoStiker_2" maxlength="6" class="span1" onkeyup="nostiker_2(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_2" id="JK_2" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_2" id="Urin_2" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_2" id="Tgl1_2" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_2" id="Darah_2" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_2" id="Tgl2_2" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_3" id="No_3" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_3" id="Nama_3" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_3" id="Umr_3" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_3" id="NoStiker_3" maxlength="6" class="span1" onkeyup="nostiker_3(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_3" id="JK_3" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_3" id="Urin_3" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_3" id="Tgl1_3" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_3" id="Darah_3" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_3" id="Tgl2_3" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_4" id="No_4" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_4" id="Nama_4" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_4" id="Umr_4" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_4" id="NoStiker_4" maxlength="6" class="span1" onkeyup="nostiker_4(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_4" id="JK_4" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_4" id="Urin_4" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_4" id="Tgl1_4" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_4" id="Darah_4" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_4" id="Tgl2_4" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_5" id="No_5" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_5" id="Nama_5" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_5" id="Umr_5" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_5" id="NoStiker_5" maxlength="6" class="span1" onkeyup="nostiker_5(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_5" id="JK_5" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_5" id="Urin_5" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_5" id="Tgl1_5" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_5" id="Darah_5" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_5" id="Tgl2_5" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_6" id="No_6" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_6" id="Nama_6" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_6" id="Umr_6" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_6" id="NoStiker_6" maxlength="6" class="span1" onkeyup="nostiker_6(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_6" id="JK_6" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_6" id="Urin_6" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_6" id="Tgl1_6" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_6" id="Darah_6" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_6" id="Tgl2_6" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_7" id="No_7" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_7" id="Nama_7" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_7" id="Umr_7" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_7" id="NoStiker_7" maxlength="6" class="span1" onkeyup="nostiker_7(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_7" id="JK_7" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_7" id="Urin_7" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_7" id="Tgl1_7" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_7" id="Darah_7" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_7" id="Tgl2_7" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_8" id="No_8" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_8" id="Nama_8" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_8" id="Umr_8" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_8" id="NoStiker_8" maxlength="6" class="span1" onkeyup="nostiker_8(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_8" id="JK_8" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_8" id="Urin_8" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_8" id="Tgl1_8" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_8" id="Darah_8" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_8" id="Tgl2_8" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
				
						
						
						<div class="control-group" >
							<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_9" id="No_9" maxlength="2" class="span1" />
							<input readonly="" style="width: 18%; margin-left: 1%" type="text" name="Nama_9" id="Nama_9" maxlength="2" class="span1" />
							<input readonly="" style="width: 4%; margin-left: 2%" type="text" name="Umr_9" id="Umr_9" maxlength="3" class="span1" />
							<input style="width: 8%; margin-left: 2%" type="text" name="NoStiker_9" id="NoStiker_9" maxlength="6" class="span1" onkeyup="nostiker_9(event)" />
							<input readonly="" style="width: 5%; margin-left: 2%" type="text" name="JK_9" id="JK_9" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_9" id="Urin_9" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl1_9" id="Tgl1_9" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 2%" name="Darah_9" id="Darah_9" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 2%" type="text" name="Tgl2_9" id="Tgl2_9" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div-->
				
						<div id="container" >
						</div>
						<div class="control-group">
                            <input type="button" name="add_btn" value="Add" id="add_btn">
						</div>
						<div class="control-group">
							<label for="SamGaram" class="control-label">Sampel Garam</label>
							<div class="controls controls-row">
								<input type="text" name="SamGaram" id="SamGaram" class="span2" data-placement="right" rel="tooltip" title="Masukkan No NKS, kemudian ENTER." />
						
							</div>
						</div>
						<div class="control-group">
							<label for="SamAir" class="control-label">Sampel Air</label>
							<div class="controls controls-row">
								<input type="text" name="SamAir" id="SamAir" class="span2" />
						
							</div>
						</div>
						<div class="control-group">
							<label for="SuhuDatang" class="control-label">Suhu Datang</label>
							<div class="controls controls-row">
								<input type="text" name="SuhuDatang" id="SuhuDatang" class="span2" />
						
							</div>
						</div>
						<hr/>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="TglNakes" class="help-block control-label">
									TGL Nakes
								</label>
								<!--<label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
									TGL Enumerator
								</label>-->
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<!--<input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" />-->
								<input style="" type="text" name="TglNakes" id="TglNakes" placeholder="dd/mm/yyyy" class="span2 datepick" />
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="NmNakes" class="help-block control-label">
									Nama Enumelator
								</label>
								<!--label style="width:20%;margin-left:20%;text-align:left;" for="NmNakes" class="help-block control-label">
									Nakes Pendamping
								</label-->
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
							
								<input type="text" name="NmNakes" id="NmNakes" class="span3"/>
								<!--input style="margin-left:17%;" type="text" name="NamaNakesPendamping" id="NamaNakesPendamping" class="span3"/-->
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" id="simpan" onclick="addabm01_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>