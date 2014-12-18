<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	
	function nostiker_1(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_1').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload1($ID('NoStiker_1').value);
		}
	}
	function reload1(value) {
//		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/list_bm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
                try{
				var vnamaart = document.S_bm1form1.Nama_1;
				var vumurart = document.S_bm1form1.Umr_1;
				var vjk = document.S_bm1form1.JK_1;
				}catch(e){
                
                var vnamaart = document.A_bm1form.Nama_1;
				var vumurart = document.A_bm1form.Umr_1;
				var vjk = document.A_bm1form.JK_1;
				}
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	
	function del_stiker(bm_01_id) {
		if (confirm('Apa anda yakin akan menghapus data stiker ini? ')) {
			goto('list_bm01/del_stiker/' + bm_01_id);
		}
	}
	
	function del_sampel(bm_01_id) {
		if (confirm('Apa anda yakin akan menghapus data sampel ini? ')) {
			goto('list_bm01/del_sampel/' + bm_01_id);
		}
	}
	
	function editstiker_link_action(data_bm01_id) {  
		
		var objTR = $('#bm01_'+data_bm01_id).get(0);
//		 alert(objTR);
		$('#dialog input[name="NoStiker_1"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="Nama_1"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="data_bm01_id"]').val( $('#bm01_'+data_bm01_id+ ' input[name="data_bm01_id"]').val() );	
		$('#dialog input[name="Umr_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Umr1"]').val() );	
		$('#dialog input[name="JK_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="JK1"]').val() );
		combobox_select($('#dialog select[name="Urin_1"]'), $('#bm01_'+data_bm01_id+ ' input[name="Urin1"]').val());
		$('#dialog input[name="Tgl1_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl11"]').val() );
		combobox_select($('#dialog select[name="Darah_1"]'), $('#bm01_'+data_bm01_id+ ' input[name="Darah1"]').val());
		$('#dialog input[name="Tgl2_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl21"]').val() );
	} 
    
	function edit_link_action(data_bm01_id) {  
		
		var objTR = $('#bm01_'+data_bm01_id).get(0);
//		 alert(objTR);
		$('#dialog2 input[name="SamGaram2"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog2 input[name="TglKumpul"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog2 input[name="bm_01_id"]').val( $('#bm01_'+data_bm01_id+ ' input[name="bm_01_id"]').val() );
		$('#dialog2 input[name="Prov"]').val( $('#bm01_'+data_bm01_id+ ' input[name="propinsi_id"]').val() );
		$('#dialog2 input[name="Kota"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialog2 input[name="Kec"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialog2 input[name="Desa"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialog2 input[name="DK"]').val( $('#bm01_'+data_bm01_id+ ' input[name="DK"]').val() );
		$('#dialog2 input[name="KodeSampel"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kode_sampel"]').val() );
		$('#dialog2 input[name="NoSensus"]').val( $('#bm01_'+data_bm01_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialog2 input[name="NoUrut"]').val( $('#bm01_'+data_bm01_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialog2 input[name="Alamat"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Alamat"]').val() );
		$('#dialog2 input[name="LabLap"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Lab_lap"]').val() );
		$('#dialog2 input[name="JamKumpul"]').val( $('#bm01_'+data_bm01_id+ ' input[name="JamKummpul"]').val() );
		
		$('#dialog2 input[name="SamAir"]').val( $('#bm01_'+data_bm01_id+ ' input[name="SamAir"]').val() );
		$('#dialog2 input[name="Umr_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Umr1"]').val() );		
		$('#dialog2 input[name="NoStiker_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="NoStiker1"]').val() );
		$('#dialog2 input[name="JK_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="JK1"]').val() );
		$('#dialog2 input[name="Urin_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Urin1"]').val() );
		$('#dialog2 input[name="Tgl1_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl11"]').val() );
		$('#dialog2 input[name="Darah_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Darah1"]').val() );		
		$('#dialog2 input[name="Tgl2_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl21"]').val() );
		
		$('#dialog2 input[name="SuhuDatang"]').val( $('#bm01_'+data_bm01_id+ ' input[name="SuDat"]').val() );
		$('#dialog2 input[name="TglNakes"]').val( $('#bm01_'+data_bm01_id+ ' input[name="tgl_nakes"]').val() );
		$('#dialog2 input[name="NmNakes"]').val( $('#bm01_'+data_bm01_id+ ' input[name="nama_nakes"]').val() );
		combobox_select($('#dialog2 select[name="HarKumpul"]'), $('#bm01_'+data_bm01_id+ ' input[name="HarKumpul"]').val());
	} 
	
	
	function add_link_action(data_bm01_id) {  
		
		var objTR = $('#bm01_'+data_bm01_id).get(0);
//		 alert(objTR);
		$('#dialog3 input[name="bm01_id"]').val( $('#bm01_'+data_bm01_id+ ' input[name="bm_01_id"]').val() );	
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 900,
			height: 240,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( data_bm01_id ) {			
			$( "#dialog" ).dialog( "open" );
			
//			 alert(data_bm01_id);
//			alert(obj.attr('data_bm01'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			editstiker_link_action(data_bm01_id);
		}
		//);
	});
	
	$(function() {
		$( "#dialog3" ).dialog({
			autoOpen: false,
			width: 900,
			height: 240,
		});

		//$( "#dialog-link" ).click(
		document.dialog3_click = function( data_bm01_id ) {			
			$( "#dialog3" ).dialog( "open" );
			
//			 alert(data_bm01_id);
//			alert(obj.attr('data_bm01'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			add_link_action(data_bm01_id);
		}
		//);
	});
	
	$(function() {
		
		$( "#dialog2" ).dialog({
			autoOpen: false,
			width: 900,
			height: 500,
		});

		//$( "#dialog-link" ).click(
		document.dialog2_click = function( data_bm01_id ) {			
			$( "#dialog2" ).dialog( "open" );
			
			// alert(data_bm01_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(data_bm01_id);
		}
	}
	)
	
	
	function A_addabm01_submit() {

		/*var vkota = document.S_bm1form1.Nama_1;
		var vkec = document.S_bm1form1.Umr_1;
		var vdesa = document.S_bm1form1.NoStiker_1;
		var vdk = document.S_bm1form1.JK_1;
		var vkodesampel = document.S_bm1form1.Urin_1;
		var vNoSensus = document.S_bm1form1.Tgl1_1;
		var vnourut = document.S_bm1form1.Darah_1;
		var vtglambildarah = document.S_bm1form1.Tgl2_1;
		
		if(vkota.value=='' ){
			alert("Kota/Kabupaten harus diisi (Harus 2 Chars).");
			vkota.focus();
			return false;
		}
		else if(vkec.value=='' ){
			alert("Kecamatan harus diisi (Harus 3 Chars).");
			vkec.focus();
			return false;
		}
		else if(vdesa.value=='' ){
			alert("Desa/Kelurahan harus diisi (Harus 3 Chars).");
			vdesa.focus();
			return false;
		}
		else if(vdk.value=='' ){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vkodesampel.value=='' ){
			alert("Kode Sampel harus diisi (Harus 6 Chars).");
			vkodesampel.focus();
			return false;
		}
		else if(vNoSensus.value=='' ){
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
			vNoSensus.focus();
			return false;
		}
		else if(vnourut.value=='' ){
			alert("No Urut Sampel harus diisi (Harus 2 Chars).");
			vnourut.focus();
			return false;
		}
		else {*/
		
		$ID('frm99').submit();
		// return true;
		/*}*/
	}
	
	function S_addabm01_submit() {

		var vkota = document.S_bm1form1.Nama_1;
		var vkec = document.S_bm1form1.Umr_1;
		var vdesa = document.S_bm1form1.NoStiker_1;
		var vdk = document.S_bm1form1.JK_1;
		var vkodesampel = document.S_bm1form1.Urin_1;
		var vNoSensus = document.S_bm1form1.Tgl1_1;
		var vnourut = document.S_bm1form1.Darah_1;
		var vtglambildarah = document.S_bm1form1.Tgl2_1;
		
		if(vkota.value=='' ){
			alert("Kota/Kabupaten harus diisi (Harus 2 Chars).");
			vkota.focus();
			return false;
		}
		else if(vkec.value=='' ){
			alert("Kecamatan harus diisi (Harus 3 Chars).");
			vkec.focus();
			return false;
		}
		else if(vdesa.value=='' ){
			alert("Desa/Kelurahan harus diisi (Harus 3 Chars).");
			vdesa.focus();
			return false;
		}
		else if(vdk.value=='' ){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vkodesampel.value=='' ){
			alert("Kode Sampel harus diisi (Harus 6 Chars).");
			vkodesampel.focus();
			return false;
		}
		else if(vNoSensus.value=='' ){
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
			vNoSensus.focus();
			return false;
		}
		else if(vnourut.value=='' ){
			alert("No Urut Sampel harus diisi (Harus 2 Chars).");
			vnourut.focus();
			return false;
		}
		else {
		
		$ID('frm1000').submit();
		// return true;
		}
	}
	
	function addabm01_submit2() {

		var vprov = document.E_bm1form.Prov;
		var vkota = document.E_bm1form.Kota;
		var vkec = document.E_bm1form.Kec;
		var vdesa = document.E_bm1form.Desa;
		var vdk = document.E_bm1form.DK;
		var vkodesampel = document.E_bm1form.KodeSampel;
		var vNoSensus = document.E_bm1form.NoSensus;
		var vnourut = document.E_bm1form.NoUrut;
		var vtglambildarah = document.E_bm1form.TglKumpul;
		var valamat = document.E_bm1form.Alamat;
		var vnamalab = document.E_bm1form.LabLap;
		var vtglnakes = document.E_bm1form.TglNakes;
		var vnamanakespendamping = document.E_bm1form.NmNakes;
		
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
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
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
		else if(vtglnakes.value==''){
			alert("Tanggal nakes pendamping harus diisi.");
			vtglnakes.focus();
			return false;
		}
		else if(vnamanakespendamping.value==''){
			alert("Nama nakes pendamping harus diisi.");
			vnamanakespendamping.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addbm02) && $status_addbm02 == 1) { ?>
	jQuery(document).ready(function(){
		alert('Update data berhasil');
	});
	<?php } ?>
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Laporan Hasil pengujian</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Laporan Hasil Pengujian</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Laporan Hasil Pengujian</span>
				</div>
				<form method="POST" id="frm1" name="bm1form" class='form-horizontal'>
						<input type="hidden" name="status_addbm01" value="0">
						<input type="hidden" id="JmlData" name="JmlData" value="0">
						<div class="control-group">
							<label for="Alamat" class="control-label">No. Sampel</label>
							<div class="controls controls-row">
								<input type="text" name="No" id="No" class="span1" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">No. Kode</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span1" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Tanggal Penerimaan</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Nama Pengirim</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Jenis Air</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Tempat Pengambilan Air</label>
							<div class="controls controls-row">
								<input type="text" name="Alamat" id="Alamat" class="span4" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Tanggal Pengambilan</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Kedalaman</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span2" />
							</div>
						</div>
						
						<div class="control-group">
							<label for="Alamat" class="control-label">Keterangan</label>
							<div class="controls controls-row">
								<input type="text" name="Alamat" id="Alamat" class="span7" />
							</div>
						</div>

					</form>
					
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
					</div>
					<!--<table class="table table-nomargin table-bordered dataTable table-striped table-hover">-->
					<table class="table table-nomargin table-bordered table-pagination">
						<thead>
							<tr>
								<th width="1%">No.</th>
								<th width="10%"><center>Parameter</center></th>
								<th width="10%"><center>Metode</center></th>
								<th width="7%"><center>Satuan</center></th>
								<th width="7%"><center>Hasil</center></th>
								<th width="14%"><center>Kadar Maksimum Yang Diperbolehkan</center></th>
							</tr>
							<tr>
							<td></b>A.<b></td>
							<td><b>FISIKA</b></td>
							</tr>
						</thead>
						<tbody>
									<td >1</td>
									<td class='table-icon'>Bau</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'><center>-</center></td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>Tidak Berbau</center></td>
								</tr>
							<tr>
						</thead>
						<tbody>
									<td >2</td>
									<td class='table-icon'>Jumlah zat padat terlarut</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>1000</center></td>
								</tr>
						</tbody>
						<tbody>
									<td >3</td>
									<td class='table-icon'>Kekeruhan</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>Skala FTU</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>5</center></td>
								</tr>
						</tbody>
						<tbody>
									<td >4</td>
									<td class='table-icon'>Rasa</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>-</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>Tidak Berasa</center></td>
								</tr>
						</tbody>
						<tbody>
									<td >5</td>
									<td class='table-icon'>Suhu</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>&deg;C</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>Sudah berasa + 3&deg; C</center></td>
								</tr>
						</tbody>
						<tbody>
									<td >6</td>
									<td class='table-icon'>Warna</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>Skala TCU</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>15</center></td>
								</tr>
							<tr>
							<td><b>B.</b></td>
							<td><b>KIMIA</b></td>
							</tr>
							<tr>
							<td><b>a.</b></td>
							<td><b>Kimia Anorganik</b></td>
							</tr>
						</thead>
						<tbody>
									<td >1</td>
									<td class='table-icon'>Arsen</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.01</center></td>
							<tr>
						</thead>
						<tbody>
									<td >2</td>
									<td class='table-icon'>Flourida</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>1.5</center></td>
						</tbody>
						<tbody>
									<td >3</td>
									<td class='table-icon'>Kromium (valensi 6)</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.05</center></td>
						</tbody>
						<tbody>
									<td >4</td>
									<td class='table-icon'>Kadmium</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.003</center></td>
						</tbody>
						<tbody>
									<td >5</td>
									<td class='table-icon'>Nitrit (LOD < 0.03)</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>3</center></td>
						</tbody>
						<tbody>
									<td >6</td>
									<td class='table-icon'>Nitrat</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>50</center></td>
						</tbody>
						<tbody>
									<td >7</td>
									<td class='table-icon'>Sianida</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.07</center></td>
						</tbody>
						<tbody>
									<td >8</td>
									<td class='table-icon'>Selenium</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.01</center></td>
						</tbody>
						<tbody>
									<td >9</td>
									<td class='table-icon'>Alumunium</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.2</center></td>
						</tbody>
						<tbody>
									<td >10</td>
									<td class='table-icon'>Besi (LOD < 0.02)</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.3</center></td>
						</tbody>
						<tbody>
									<td >11</td>
									<td class='table-icon'>Kesudahan</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>500</center></td>
						</tbody>
						<tbody>
									<td >12</td>
									<td class='table-icon'>Klorida</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>250</center></td>
						</tbody>
						<tbody>
									<td >13</td>
									<td class='table-icon'>Mangan (LOD < 0.20)</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>0.4</center></td>
						</tbody>
						<tbody>
									<td >14</td>
									<td class='table-icon'>PH</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>6.5-8.5</center></td>
						</tbody>
						<tbody>
									<td >15</td>
									<td class='table-icon'>Seng</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>3</center></td>
						</tbody>
						<tbody>
									<td >16</td>
									<td class='table-icon'>Sulfat (LOD < 5)</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>250</center></td>
						</tbody>
						<tbody>
									<td >17</td>
									<td class='table-icon'>Tembaga</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>2</center></td>
						</tbody>
						<tbody>
									<td >18</td>
									<td class='table-icon'>Sisa Klor</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>5</center></td>
						</tbody>
						<tbody>
									<td >19</td>
									<td class='table-icon'>Amonia</td>
									<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
									<td><center>1.5</center></td>
						</tbody>
								</tr>
							<tr>
							<td><b>b.</b></td>
							<td><b>Kimia Organik</b></td>
							</tr>
						</thead>
						<tbody>
							<td ></td>
							<td class='table-icon'>Zat Organic (KMn04)</td>
							<td>
									<center>
									<select style="width: 75%; margin-left: 0%" name="bulan" id="bulan" class="span2">
									<option><center>-</center></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
							</td>
							<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil" id="hasil" class="span12" /></td>
							<td><center>10</center></td>
						</tbody>
					</table>
					<div class="bottom-table">
						<div class="pull-right">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ui-dialog -->
<?php
	if (!($level == 3))
	echo"
<div id=\"dialog\" title=\"Form Edit BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm1000" name="S_bm1form1" class='form-horizontal'>
			<input type='hidden' name="data_bm01_id" />
			<!--<input type='hidden' name="data_bm_01_id" />-->
						<input type="hidden" name="status_addbm01" value="0">
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
								<label style="width:10%;margin-left:1.5%;text-align:left;" for="NoSensus" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Ambil Darah
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
						</div>
						
						<div class="control-group" >
							<input readonly="" style="width: 1.5%; text-align: left;" type="text" name="data_bm01_id" id="data_bm01_id" maxlength="2" class="span1" />
							<input readonly="" style="width: 15.5%; margin-left: 0.5%" type="text" name="Nama_1" id="Nama_1" maxlength="2" class="span1" />
							<input readonly="" style="width: 2.5%; margin-left: 2%" type="text" name="Umr_1" id="Umr_1" maxlength="3" class="span1" />
							<input style="width: 6%; margin-left: 2%" type="text" name="NoStiker_1" id="NoStiker_1" maxlength="6" class="span1" onkeyup="nostiker_1(event)" />
							<input readonly="" style="width: 3%; margin-left: 1%" type="text" name="JK_1" id="JK_1" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_1" id="Urin_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 9%; margin-left: 2%" type="text" name="Tgl1_1" id="Tgl1_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 0.5%" name="Darah_1" id="Darah_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 1.5%" type="text" name="Tgl2_1" id="Tgl2_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"S_addabm01_submit()\" class=\"button button-basic-blue\">Simpan</button>
					";
				?>
			</div>
		</form>
	</div>
</div>





<!-- ui-dialog -->
<?php
	if (!($level == 3))
	echo"
<div id=\"dialog2\" title=\"Form Edit BM01 [Sampel Garam]\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog2\" title=\"Form View BM01 [Sampel Garam]\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm2" name="E_bm1form" class='form-horizontal'>
			<input type='hidden' name="bm_01_id" />
			<input type="hidden" name="status_addbm01" value="2">
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
						No. Sensus
					</label>
					<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width: 3%;" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
					<input style="width: 3%;" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
					<input style="width: 4%;margin-left: 3%" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
					<input style="width: 4%;margin-left: 3%" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
					<input style="width: 2%;margin-left: 3%" type="text" name="DK" id="DK" maxlength="1" class="span1" />
					<input style="width: 8%;" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
					<input style="width: 10%;margin-left: 7%" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
					<input style="width: 3%; margin-left:5%;" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
				</div>
			</div>
			<div class="control-group">
				<label for="Alamat" class="control-label">Alamat Lengkap</label>
				<div class="controls controls-row">
					<input type="text" name="Alamat" id="Alamat" class="span7" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="TglKumpul" class="control-label">Pengambilan Darah</label>
				<div class="controls controls-row">
					<input style="width: 15%;" type="text" name="TglKumpul" id="TglKumpul" class="span2 datepick"/>
					
					<select style="width: 25%;" name="HarKumpul" id="HarKumpul" class='span3'>
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
					<input style="margin-left: 2.5641%;" type="text" name="JamKumpul" id="JamKumpul" class="span1 mask_wkt"/>
				</div>
			</div>
			<div class="control-group">
					<label for="LabLap" class="control-label">Lab. Lapangan</label>
				<div class="controls controls-row">
					<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
					
			
				</div>
			</div>
	
			</div-->
			<div class="control-group">
				<label for="SamGaram2" class="control-label">Sampel Garam</label>
				<div class="controls controls-row">
					<input type="text" name="SamGaram2" id="SamGaram2" class="span2" />
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
					<label style="text-align:left;width: 25%" for="NmNakes" class="help-block control-label">
						Nama Enumelator
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
				
					<input type="text" name="NmNakes" id="NmNakes" class="span3"/>
				</div>
			</div>
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"addabm01_submit2()\" class=\"button button-basic-blue\">Simpan</button>
					";
				?>
			</div>
		</form>
	</div>
</div>




<!-- ui-dialog -->
<?php
	if (!($level == 3))
	echo"
<div id=\"dialog3\" title=\"Form Tambah No Stiker BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog3\" title=\"Form View BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm99" name="A_bm1form" class='form-horizontal'>
			<input type='hidden' name="bm01_id" />
						<input type="hidden" name="status_addbm01" value="3">
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
								<label style="width:10%;margin-left:1.5%;text-align:left;" for="NoSensus" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Ambil Darah
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
						</div>
						
						<div class="control-group" >
							<input readonly="" style="width: 1.5%; text-align: left;" type="text" name="data_bm01_id" id="data_bm01_id" maxlength="2" class="span1" />
							<input readonly="" style="width: 15.5%; margin-left: 0.5%" type="text" name="Nama_1" id="Nama_1" maxlength="2" class="span1" />
							<input readonly="" style="width: 2.5%; margin-left: 2%" type="text" name="Umr_1" id="Umr_1" maxlength="3" class="span1" />
							<input style="width: 6%; margin-left: 2%" type="text" name="NoStiker_1" id="NoStiker_1" maxlength="6" class="span1" onkeyup="nostiker_1(event)" />
							<input readonly="" style="width: 3%; margin-left: 1%" type="text" name="JK_1" id="JK_1" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_1" id="Urin_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 9%; margin-left: 2%" type="text" name="Tgl1_1" id="Tgl1_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 0.5%" name="Darah_1" id="Darah_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 1.5%" type="text" name="Tgl2_1" id="Tgl2_1" placeholder="dd/mm/yyyy" class="span1 datepick" />							
						</div>
												
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"A_addabm01_submit()\" class=\"button button-basic-blue\">Simpan</button>
					";
				?>
			</div>
		</form>
	</div>
</div>

<form method="POST" id="frm1" name="bm1form" class='form-horizontal'>
<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">

						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="NmNakes" class="span2 ">
								Pemohon
								</label>
								<label style="margin-left:26%;text-align:left;" for="Kota" class="span2">
								Tempat
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text" name="pemohon" id="pemohon" class="span3"/>
								<input type="text" style="margin-left:17%;" name="tempat" id="tempat" class="span3"/>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="NmNakes" class="span2 ">
									Penerima
								</label>
								<label style="text-align:left;margin-left:26%;" for="NmNakes" class="span2 ">
									Tanggal
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text"  name="penerima" id="penerima" class="span3"/>
								
								<input type="text" style="margin-left:17%;" name="tgl" id="tgl" placeholder="dd/mm/yyyy" class="span2 datepick " />							
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%;margin-left:-4.5%;" type="button" id="simpan" onclick="addabm01_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>

			</div>
		</div>
	</div>
</div>
</form>