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
		<h4>Kwitansi</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Kwitansi</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Kwitansi</span>
				</div>
				<!--<div class="box-body box-body-nopadding">-->
				<div class="box-body">
					<form method="POST" id="frm1" name="bm1form" class='form-horizontal'>
						<input type="hidden" name="status_addbm01" value="0">
						<input type="hidden" id="JmlData" name="JmlData" value="0">
										
						<!--<div class="control-group">
								<label for="NamaART" class="control-label">Nama ART</label>
							<div class="controls controls-row">
								<input readonly="" type="text" name="NamaART" id="NamaART" class="span5"/>
						
							</div>
						</div>-->
						<div class="control-group">
								<label for="TglKumpul" class="control-label">No.</label>
							<div class="controls controls-row">
								<select name="HarKumpul" id="HarKumpul" class='span3'>
									<option> Pilih No </option>
									<option value="1">Senin</option>
									<option value="2">Selasa</option>
									<option value="3">Rabu</option>
									<option value="4">Kamis</option>
									<option value="5">Jumat</option>
									<option value="6">Sabtu</option>
									<option value="7">Minggu</option>
								</select>
								
								
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Sudah diterima dari</label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Banyaknya uang</label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
								<input readonly style="" type="text" name="LabLap" id="LabLap" class="span5" value="terbilang"/>
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Untuk pembayaran</label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
							</div>
						</div>
						<br />
						<div class="control-group">
								<label for="LabLap" class="control-label"></label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" value="Dibuat oleh"/>
								<input style="" type="text" name="LabLap" id="LabLap" value="Tempat"/>
								,
								<input style="" type="text" name="LabLap" id="LabLap" value="Tanggal Bulan Tahun" />

							</div>
						</div>
						<hr/>
						<div class="control-group">
								<label for="TglKumpul" class="control-label">No.</label>
							<div class="controls controls-row">
								<select name="HarKumpul" id="HarKumpul" class='span3'>
									<option> Pilih No </option>
									<option value="1">Senin</option>
									<option value="2">Selasa</option>
									<option value="3">Rabu</option>
									<option value="4">Kamis</option>
									<option value="5">Jumat</option>
									<option value="6">Sabtu</option>
									<option value="7">Minggu</option>
								</select>
								
								
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Sudah diterima dari</label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Banyaknya uang</label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
								<input readonly style="" type="text" name="LabLap" id="LabLap" class="span5" value="terbilang"/>
							</div>
						</div>
						<div class="control-group">
								<label for="LabLap" class="control-label">Untuk pembayaran</label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
							</div>
						</div>
						<br />
						<div class="control-group">
								<label for="LabLap" class="control-label"></label>
							<div class="controls controls-row">
								<input style="" type="text" name="LabLap" id="LabLap" value="Dibuat oleh"/>
								<input style="" type="text" name="LabLap" id="LabLap" value="Tempat"/>
								,
								<input style="" type="text" name="LabLap" id="LabLap" value="Tanggal Bulan Tahun" />

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