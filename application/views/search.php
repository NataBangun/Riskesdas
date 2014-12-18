<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
    
	function edit_link_actionbm02(bm02_id) {  
		
		var objTR = $('#bm02_'+bm02_id).get(0);
		// alert(objTR);
		$('#dialogbm02 input[name="NoStiker"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialogbm02 input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialogbm02 input[name="Alamat"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialogbm02 input[name="TglAmbilDrh"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialogbm02 input[name="bm02_id"]').val( $('#bm02_'+bm02_id+ ' input[name="bm02_id"]').val() );
		$('#dialogbm02 input[name="Prov"]').val( $('#bm02_'+bm02_id+ ' input[name="propinsi_id"]').val() );
		$('#dialogbm02 input[name="Kota"]').val( $('#bm02_'+bm02_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialogbm02 input[name="Kec"]').val( $('#bm02_'+bm02_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialogbm02 input[name="Desa"]').val( $('#bm02_'+bm02_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialogbm02 input[name="DK"]').val( $('#bm02_'+bm02_id+ ' input[name="DK"]').val() );
		$('#dialogbm02 input[name="KodeSampel"]').val( $('#bm02_'+bm02_id+ ' input[name="kode_sampel"]').val() );
		$('#dialogbm02 input[name="NoSensus"]').val( $('#bm02_'+bm02_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialogbm02 input[name="NoUrut"]').val( $('#bm02_'+bm02_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialogbm02 input[name="NoART"]').val( $('#bm02_'+bm02_id+ ' input[name="noART"]').val() );
		combobox_select($('#dialogbm02 select[name="RiwayatSakit"]'), $('#bm02_'+bm02_id+ ' input[name="riwayat_sakit_berat"]').val());
		$('#dialogbm02 input[name="NamaLab"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_lab"]').val() );
		$('#dialogbm02 input[name="PenetasanBuffer"]').val( $('#bm02_'+bm02_id+ ' input[name="time_penetasan_buffer"]').val() );
		$('#dialogbm02 input[name="BacaRDT"]').val( $('#bm02_'+bm02_id+ ' input[name="time_pembacaan_rdt"]').val() );
		combobox_select($('#dialogbm02 select[name="RDT"]'), $('#bm02_'+bm02_id+ ' input[name="hasil_rdt"]').val());
		combobox_select($('#dialogbm02 select[name="Tanya1"]'), $('#bm02_'+bm02_id+ ' input[name="art_riwayat_panas"]').val());
		combobox_select($('#dialogbm02 select[name="Tanya2"]'), $('#bm02_'+bm02_id+ ' input[name="duplo"]').val());
		$('#dialogbm02 input[name="TGLEnumerator"]').val( $('#bm02_'+bm02_id+ ' input[name="tgl_enumerator"]').val() );
		$('#dialogbm02 input[name="TGLNakes"]').val( $('#bm02_'+bm02_id+ ' input[name="tgl_nakes"]').val() );
		$('#dialogbm02 input[name="NamaEnumelator"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_enumerator"]').val() );
		$('#dialogbm02 input[name="NamaNakesPendamping"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_nakes"]').val() );
		
	} 
	
	$(function() {
		$( "#dialogbm02" ).dialog({
			autoOpen: false,
			width: 900,
			height: 500,
		});

		document.dialog_clickbm02 = function( bm02_id ) {			
			$( "#dialogbm02" ).dialog( "open" );
			edit_link_actionbm02(bm02_id);
		}
	});
	
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
		var vtglenumerator = document.bm2form.TGLEnumerator;
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
		else if(vriwayatsakit.value=='' || vriwayatsakit.value=='0'){
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
		else if(vrdt.value=='' || vrdt.value=='0'){
			alert("Rapid Diagnostic Test / RDT harus diisi.");
			vrdt.focus();
			return false;
		}
		else if(vtanya1.value=='' || vtanya1.value=='0'){
			alert("Pertanyaan : Apakah ART mengalami riwayat demam dalam 2 hari terakhir? (harus diisi).");
			vtanya1.focus();
			return false;
		}
		else if(vtanya2.value=='' || vtanya2.value=='0'){
			alert("Pertanyaan : Apakah dibuat sediaan daarah apus tebal? (Harus diisi).");
			vtanya2.focus();
			return false;
		}
		else if(vtglenumerator.value==''){
			alert("Tanggal Enumerator harus diisi.");
			vtglenumerator.focus();
			return false;
		}
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
		alert('Update data berhasil');
	});
	<?php } ?>
	
	
	// Batesan BM02
	
	function edit_link_actionbm04(bm04_id) {  
		
		var objTR = $('#bm04_'+bm04_id).get(0);
		// alert(objTR);
		$('#dialog input[name="NoStiker"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="AlamatART"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog input[name="bm04_id"]').val( $('#bm04_'+bm04_id+ ' input[name="bm04_id"]').val() );
		$('#dialog input[name="Prov"]').val( $('#bm04_'+bm04_id+ ' input[name="propinsi_id"]').val() );
		$('#dialog input[name="Kota"]').val( $('#bm04_'+bm04_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialog input[name="Kec"]').val( $('#bm04_'+bm04_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialog input[name="Desa"]').val( $('#bm04_'+bm04_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialog input[name="DK"]').val( $('#bm04_'+bm04_id+ ' input[name="DK"]').val() );
		$('#dialog input[name="KodeSampel"]').val( $('#bm04_'+bm04_id+ ' input[name="kode_sampel"]').val() );
		$('#dialog input[name="NoSensus"]').val( $('#bm04_'+bm04_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialog input[name="NoUrut"]').val( $('#bm04_'+bm04_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialog input[name="NamaLab"]').val( $('#bm04_'+bm04_id+ ' input[name="nama_lab"]').val() );
		$('#dialog input[name="AlamatLab"]').val( $('#bm04_'+bm04_id+ ' input[name="alamat_lab"]').val() );
		$('#dialog input[name="NamaEnumerator"]').val( $('#bm04_'+bm04_id+ ' input[name="nama_enumerator"]').val() );
		$('#dialog input[name="TelpEnumerator"]').val( $('#bm04_'+bm04_id+ ' input[name="no_telp"]').val() );
		$('#dialog input[name="NoART"]').val( $('#bm04_'+bm04_id+ ' input[name="no_urutART"]').val() );
		$('#dialog input[name="Umur"]').val( $('#bm04_'+bm04_id+ ' input[name="umurART"]').val() );
		combobox_select( $('#dialog select[name="JK"]'), $('#bm04_'+bm04_id+ ' input[name="JK"]').val());
		//$('#dialog input[name="JK"]').val( $('#bm04_'+bm04_id+ ' input[name="JK"]').val() );
		combobox_select($('#dialog select[name="Tanya1"]'), $('#bm04_'+bm04_id+ ' input[name="tanya1"]').val());
		// $('#dialog input[name="Tanya1"]').val( $('#bm04_'+bm04_id+ ' input[name="tanya1"]').val() );
		$('#dialog input[name="KadarHB_Nilai"]').val( $('#bm04_'+bm04_id+ ' input[name="kadarHB_nilai"]').val() );
		$('#dialog input[name="KadarHB_Waktu"]').val( $('#bm04_'+bm04_id+ ' input[name="kadarHB_waktu"]').val() );
		$('#dialog input[name="KadarHB_Tgl"]').val( $('#bm04_'+bm04_id+ ' input[name="kadarHB_tgl"]').val() );
		combobox_select($('#dialog select[name="RDiabet"]'), $('#bm04_'+bm04_id+ ' input[name="riwayat_diabet"]').val());
		// $('#dialog input[name="RDiabet"]').val( $('#bm04_'+bm04_id+ ' input[name="riwayat_diabet"]').val() );
		combobox_select($('#dialog select[name="MinumInsulin"]'), $('#bm04_'+bm04_id+ ' input[name="minum_insulin"]').val());
		// $('#dialog input[name="MinumInsulin"]').val( $('#bm04_'+bm04_id+ ' input[name="minum_insulin"]').val() );
		combobox_select($('#dialog select[name="Puasa"]'), $('#bm04_'+bm04_id+ ' input[name="puasa"]').val());
		// $('#dialog input[name="Puasa"]').val( $('#bm04_'+bm04_id+ ' input[name="puasa"]').val() );
		$('#dialog input[name="AkhirMakan"]').val( $('#bm04_'+bm04_id+ ' input[name="time_akhir_makan"]').val() );
		$('#dialog input[name="PembebananGlukosa"]').val( $('#bm04_'+bm04_id+ ' input[name="time_pembebanan_glukosa"]').val() );
		$('#dialog input[name="DuaJPembebananGlukosa"]').val( $('#bm04_'+bm04_id+ ' input[name="time_2jam_glukosa"]').val() );
		$('#dialog input[name="KGlukosa1_Nilai"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa1_nilai"]').val() );
		$('#dialog input[name="KGlukosa1_Waktu"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa1_waktu"]').val() );
		$('#dialog input[name="KGlukosa1_Tgl"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa1_tgl"]').val() );
		$('#dialog input[name="KGlukosa2_Nilai"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa2_nilai"]').val() );
		$('#dialog input[name="KGlukosa2_Waktu"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa2_waktu"]').val() );
		$('#dialog input[name="KGlukosa2_Tgl"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa2_tgl"]').val() );
		$('#dialog input[name="KGlukosa3_Nilai"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa3_nilai"]').val() );
		$('#dialog input[name="KGlukosa3_Waktu"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa3_waktu"]').val() );
		$('#dialog input[name="KGlukosa3_Tgl"]').val( $('#bm04_'+bm04_id+ ' input[name="kadar_glukosa3_tgl"]').val() );
		$('#dialog input[name="TGLEnumerator"]').val( $('#bm04_'+bm04_id+ ' input[name="tgl_enumerator"]').val() );
		$('#dialog input[name="TGLDokterPendamping"]').val( $('#bm04_'+bm04_id+ ' input[name="tgl_pendamping"]').val() );
		$('#dialog input[name="NamaEnumelator"]').val( $('#bm04_'+bm04_id+ ' input[name="nama_ketua_enumerator"]').val() );
		$('#dialog input[name="NamaDokterPendamping"]').val( $('#bm04_'+bm04_id+ ' input[name="nama_pendamping"]').val() );
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 990,
			height: 500,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( bm04_id ) {			
			$( "#dialog" ).dialog( "open" );
			edit_link_actionbm04(bm04_id);
		}
	});
	
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
		var vNamaART = document.bm4form.NamaART;
		var vNoART = document.bm4form.NoART;
		var vUmur = document.bm4form.Umur;
		var vJK = document.bm4form.JK;
		var vTanya1 = document.bm4form.Tanya1;
		var vNoStiker = document.bm4form.NoStiker;
		var vAlamatART = document.bm4form.AlamatART;
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
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
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
		else if(vJK.value=='' || vJK.value=='0'){
			alert("Jenis kelamin harus diisi.");
			vJK.focus();
			return false;
		}
		else if(vTanya1.value=='' || vTanya1.value=='0'){
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
		else if(vTGLEnumerator.value==''){
			alert("Tanggal Ketua Tim Enumerator, belum diisi.");
			vTGLEnumerator.focus();
			return false;
		}
		else if(vTGLDokterPendamping.value==''){
			alert("Tanggal Dokter Pendamping, belum diisi.");
			vTGLDokterPendamping.focus();
			return false;
		}
		else if(vNamaEnumelator.value==''){
			alert("Nama Ketua Tim Enumerator, belum diisi.");
			vNamaEnumelator.focus();
			return false;
		}
		else if(vNamaDokterPendamping.value==''){
			alert("Nama Dokter Pendamping, belum diisi.");
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
		alert('Edit data berhasil');
		// location.reload(true);
	});
	<?php } ?>	
	
	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-reorder"></i> Search page</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="invoice.html">More pages<span class="divider">/</span></a></li>
			<li class='active'>Search page</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-search"></i>
					<span>Search BM02</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="search-results">
					
					<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
					<!--<table class="table table-nomargin table-bordered table-pagination">-->
						<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="10%">No Stiker</th>
								<th width="17%">Nama ART</th>
								<th width="35%">Alamat</th>
								<th width="18%" class='table-date'>Tgl Pengambilan Darah</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
						<!--?php
							if (empty($search2)) {
								echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form BM04 Masih Kosong. </b><center></td></tr>';
							}
						?-->
							<?php 
								$no = 1;
								foreach($search2 as $value):
							?>
								<tr id='bm02_<?php echo $value['bm02_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="bm02_id" value="<?php echo $value['bm02_id']; ?>" />
										<input type="hidden" name="propinsi_id" value="<?php echo $value['propinsi_id']; ?>" />
										<input type="hidden" name="kabupaten_id" value="<?php echo $value['kabupaten_id']; ?>" />
										<input type="hidden" name="kecamatan_id" value="<?php echo $value['kecamatan_id']; ?>" />
										<input type="hidden" name="kelurahan_id" value="<?php echo $value['kelurahan_id']; ?>" />
										<input type="hidden" name="DK" value="<?php echo $value['DK']; ?>" />
										<input type="hidden" name="kode_sampel" value="<?php echo $value['kode_sampel']; ?>" />
										<input type="hidden" name="no_bangun_sensus" value="<?php echo $value['no_bangun_sensus']; ?>" />
										<input type="hidden" name="no_urut_sampel" value="<?php echo $value['no_urut_sampel']; ?>" />
										<input type="hidden" name="noART" value="<?php echo $value['noART']; ?>" />
										<input type="hidden" name="riwayat_sakit_berat" value="<?php echo $value['riwayat_sakit_berat']; ?>" />
										<input type="hidden" name="tgl_ambildarah" value="<?php echo $value['tgl_ambildarah']; ?>" />
										<input type="hidden" name="nama_lab" value="<?php echo $value['nama_lab']; ?>" />
										<input type="hidden" name="time_penetasan_buffer" value="<?php echo $value['time_penetasan_buffer']; ?>" />
										<input type="hidden" name="time_pembacaan_rdt" value="<?php echo $value['time_pembacaan_rdt']; ?>" />
										<input type="hidden" name="hasil_rdt" value="<?php echo $value['hasil_rdt']; ?>" />
										<input type="hidden" name="art_riwayat_panas" value="<?php echo $value['art_riwayat_panas']; ?>" />
										<input type="hidden" name="duplo" value="<?php echo $value['duplo']; ?>" />
										<input type="hidden" name="tgl_enumerator" value="<?php echo $value['tgl_enumerator']; ?>" />
										<input type="hidden" name="tgl_nakes" value="<?php echo $value['tgl_nakes']; ?>" />
										<input type="hidden" name="nama_enumerator" value="<?php echo $value['nama_enumerator']; ?>" />
										<input type="hidden" name="nama_nakes" value="<?php echo $value['nama_nakes']; ?>" />
									</td>
									<td class='table-icon'>
										<?php echo $value['noStiker']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['namaART']; ?>
									</td>
									<td>
										<?php echo $value['alamat']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['tgl_ambildarah']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 ))
												echo "
											<a href=\"#\" onclick=\"document.dialog_clickbm02('{$value['bm02_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" bm02=\"{$value['bm02_id']}\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<?php
												if (!($level == 3))
												echo"
												<a href=\"#\" onclick=\"document.dialog_clickbm02('{$value['bm02_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm02=\"{$value['bm02_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
												<a href=\"#\" onclick=\"delete_link('{$value['bm02_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
											";
											?>
										</div>
									</center>
									</td>
								</tr>
							<?php
								$no++;
								endforeach;
							?>
						</tbody>
					</table>
					
					
					</div>
					<div class="highlight-toolbar bottom">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-search"></i>
					<span>Search BM04</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="search-results">
					
						<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
						<!--<table class="table table-nomargin table-bordered table-pagination">-->
							<thead>
								<tr>
									<th width="1.5%">No.</th>
									<th width="10%">No Stiker</th>
									<th width="17%">Nama ART</th>
									<th width="35%">Alamat</th>
									<th width="18%" class='table-date'>Tgl Pengambilan Darah</th>
									<th width="11%"><center>Action</center></th>
								</tr>
							</thead>
							<tbody>
							<!--?php
								if (empty($search4)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form BM04 Masih Kosong. </b><center></td></tr>';
								}
							?-->
							<?php
								$no = 1;
								foreach($search4 as $value):
							?>
									<tr id='bm04_<?php echo $value['bm04_id']; ?>'>
										<td>
											<?php echo $no ?>
											<input type="hidden" name="bm04_id" value="<?php echo $value['bm04_id']; ?>" />
											<input type="hidden" name="propinsi_id" value="<?php echo $value['propinsi_id']; ?>" />
											<input type="hidden" name="kabupaten_id" value="<?php echo $value['kabupaten_id']; ?>" />
											<input type="hidden" name="kecamatan_id" value="<?php echo $value['kecamatan_id']; ?>" />
											<input type="hidden" name="kelurahan_id" value="<?php echo $value['kelurahan_id']; ?>" />
											<input type="hidden" name="DK" value="<?php echo $value['DK']; ?>" />
											<input type="hidden" name="kode_sampel" value="<?php echo $value['kode_sampel']; ?>" />
											<input type="hidden" name="no_bangun_sensus" value="<?php echo $value['no_bangun_sensus']; ?>" />
											<input type="hidden" name="no_urut_sampel" value="<?php echo $value['no_urut_sampel']; ?>" />
											<input type="hidden" name="nama_lab" value="<?php echo $value['nama_lab']; ?>" />
											<input type="hidden" name="alamat_lab" value="<?php echo $value['alamat_lab']; ?>" />
											<input type="hidden" name="nama_enumerator" value="<?php echo $value['nama_enumerator']; ?>" />
											<input type="hidden" name="no_telp" value="<?php echo $value['no_telp']; ?>" />
											<input type="hidden" name="no_urutART" value="<?php echo $value['no_urutART']; ?>" />
											<input type="hidden" name="umurART" value="<?php echo $value['umurART']; ?>" />
											<input type="hidden" name="JK" value="<?php echo $value['JK']; ?>" />
											<input type="hidden" name="tanya1" value="<?php echo $value['tanya1']; ?>" />
											<input type="hidden" name="kadarHB_nilai" value="<?php echo $value['kadarHB_nilai']; ?>" />
											<input type="hidden" name="kadarHB_waktu" value="<?php echo $value['kadarHB_waktu']; ?>" />
											<input type="hidden" name="kadarHB_tgl" value="<?php echo $value['kadarHB_tgl']; ?>" />
											<input type="hidden" name="riwayat_diabet" value="<?php echo $value['riwayat_diabet']; ?>" />
											<input type="hidden" name="minum_insulin" value="<?php echo $value['minum_insulin']; ?>" />
											<input type="hidden" name="puasa" value="<?php echo $value['puasa']; ?>" />
											<input type="hidden" name="time_akhir_makan" value="<?php echo $value['time_akhir_makan']; ?>" />
											<input type="hidden" name="time_pembebanan_glukosa" value="<?php echo $value['time_pembebanan_glukosa']; ?>" />
											<input type="hidden" name="time_2jam_glukosa" value="<?php echo $value['time_2jam_glukosa']; ?>" />
											<input type="hidden" name="kadar_glukosa1_nilai" value="<?php echo $value['kadar_glukosa1_nilai']; ?>" />
											<input type="hidden" name="kadar_glukosa1_waktu" value="<?php echo $value['kadar_glukosa1_waktu']; ?>" />
											<input type="hidden" name="kadar_glukosa1_tgl" value="<?php echo $value['kadar_glukosa1_tgl']; ?>" />
											<input type="hidden" name="kadar_glukosa2_nilai" value="<?php echo $value['kadar_glukosa2_nilai']; ?>" />
											<input type="hidden" name="kadar_glukosa2_waktu" value="<?php echo $value['kadar_glukosa2_waktu']; ?>" />
											<input type="hidden" name="kadar_glukosa2_tgl" value="<?php echo $value['kadar_glukosa2_tgl']; ?>" />
											<input type="hidden" name="kadar_glukosa3_nilai" value="<?php echo $value['kadar_glukosa3_nilai']; ?>" />
											<input type="hidden" name="kadar_glukosa3_waktu" value="<?php echo $value['kadar_glukosa3_waktu']; ?>" />
											<input type="hidden" name="kadar_glukosa3_tgl" value="<?php echo $value['kadar_glukosa3_tgl']; ?>" />
											<input type="hidden" name="tgl_enumerator" value="<?php echo $value['tgl_enumerator']; ?>" />
											<input type="hidden" name="tgl_pendamping" value="<?php echo $value['tgl_pendamping']; ?>" />
											<input type="hidden" name="nama_ketua_enumerator" value="<?php echo $value['nama_ketua_enumerator']; ?>" />
											<input type="hidden" name="nama_pendamping" value="<?php echo $value['nama_pendamping']; ?>" />
										
										</td>
										<td class='table-icon' >
											<?php echo $value['no_stiker']; ?>
										</td>
										<td class='table-fixed-medium'>
											<?php echo $value['nama_ART']; ?>
										</td>
										<td>
											<?php echo $value['alamatART']; ?>
										</td>
										<td class='table-date'>
											<?php echo $value['time_ambil_darah']; ?>
										</td>
										<td>
										<center>
											<div class="btn-group">
												<?php
													if (!($level == 1 || $level == 2 || $level == 9 ))
													echo "
												<a href=\"#\" onclick=\"document.dialog_click('{$value['bm04_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\"><i class=\"icon-eye-open\"></i></a>
													";
												?>
												<?php
													if (!($level == 3))
													echo"
														<a href=\"#\" onclick=\"document.dialog_click('{$value['bm04_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm04=\"{$value['bm04_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
														<a href=\"#\" onclick=\"delete_link('{$value['bm04_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
													";
												?>
											</div>
										</center>
										</td>
									</tr>
								<?php
									$no++;
									endforeach;
								?>
							</tbody>
						</table>
					
					</div>
					<div class="highlight-toolbar bottom">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
					
<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-search"></i>
					<span>Search Kimia Klinis</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="search-results">
					<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
					<!--<table class="table table-nomargin table-bordered table-pagination">-->
						<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="10%">No Stiker</th>
								<th width="17%">Nama ART</th>
								<th width="35%">Alamat</th>
								<th width="18%" class='table-date'>Tgl Pemeriksaan</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<!--?php
								if (empty($searchkimia)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form KIMIA KLINIS Masih Kosong. </b><center></td></tr>';
								}
							?-->
							<?php 
								$no = 1;
								foreach($searchkimia as $value):
							?>
								<tr id='formhasil_<?php echo $value['formhasil_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="formhasil_id" value="<?php echo $value['formhasil_id']; ?>" />
										<input type="hidden" name="propinsi_id" value="<?php echo $value['propinsi_id']; ?>" />
										<input type="hidden" name="kabupaten_id" value="<?php echo $value['kabupaten_id']; ?>" />
										<input type="hidden" name="kecamatan_id" value="<?php echo $value['kecamatan_id']; ?>" />
										<input type="hidden" name="kelurahan_id" value="<?php echo $value['kelurahan_id']; ?>" />
										<input type="hidden" name="DK" value="<?php echo $value['DK']; ?>" />
										<input type="hidden" name="kode_sampel" value="<?php echo $value['kode_sampel']; ?>" />
										<input type="hidden" name="no_bangun_sensus" value="<?php echo $value['no_bangun_sensus']; ?>" />
										<input type="hidden" name="no_urut_sampel" value="<?php echo $value['no_urut_sampel']; ?>" />
										<input type="hidden" name="Umur" value="<?php echo $value['Umur']; ?>" />
										<input type="hidden" name="JK" value="<?php echo $value['JK']; ?>" />
										<input type="hidden" name="TtlKolestrol" value="<?php echo $value['TtlKolestrol']; ?>" />
										<input type="hidden" name="HDLKolestrol" value="<?php echo $value['HDLKolestrol']; ?>" />
										<input type="hidden" name="LDLKolestrol" value="<?php echo $value['LDLKolestrol']; ?>" />
										<input type="hidden" name="Trigliserida" value="<?php echo $value['Trigliserida']; ?>" />
										<input type="hidden" name="Kreatinin" value="<?php echo $value['Kreatinin']; ?>" />
										<input type="hidden" name="pemeriksa" value="<?php echo $value['pemeriksa']; ?>" />
									
									</td>
									<td class='table-icon' >
										<?php echo $value['no_stiker']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['NamaART']; ?>
									</td>
									<td>
										<?php echo $value['alamat']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['TGL_periksa']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 ))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['formhasil_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" ><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<a href="#" onclick="goto('preview/index/<?php echo $value['formhasil_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a>
											<?php
												if (!($level == 3))
												echo"
												<a href=\"#\" onclick=\"document.dialog_click('{$value['formhasil_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" formhasil=\"{$value['formhasil_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
												<a href=\"#\" onclick=\"delete_link('{$value['formhasil_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
											";
											?>
										</div>
									</center>
									</td>
								</tr>
							<?php
								$no++;
								endforeach;
							?>
						</tbody>
					</table>
					
					</div>
					<div class="highlight-toolbar bottom">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-search"></i>
					<span>Search Malaria</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					<div class="search-results">
					<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
					<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="10%">No Stiker</th>
								<th width="17%">Nama ART</th>
								<th width="35%">Alamat</th>
								<th width="18%" class='table-date'>Tgl Periksa</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<!--?php
								if (empty($searchmalaria)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form MALARIA Masih Kosong. </b><center></td></tr>';
								}
							?-->
							<?php 
								$no = 1;
								foreach($searchmalaria as $value):
							?>
								<tr id='formmalaria_<?php echo $value['formmalaria_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="formmalaria_id" value="<?php echo $value['formmalaria_id']; ?>" />
										<input type="hidden" name="propinsi_id" value="<?php echo $value['propinsi_id']; ?>" />
										<input type="hidden" name="kabupaten_id" value="<?php echo $value['kabupaten_id']; ?>" />
										<input type="hidden" name="kecamatan_id" value="<?php echo $value['kecamatan_id']; ?>" />
										<input type="hidden" name="kelurahan_id" value="<?php echo $value['kelurahan_id']; ?>" />
										<input type="hidden" name="DK" value="<?php echo $value['DK']; ?>" />
										<input type="hidden" name="kode_sampel" value="<?php echo $value['kode_sampel']; ?>" />
										<input type="hidden" name="no_bangun_sensus" value="<?php echo $value['no_bangun_sensus']; ?>" />
										<input type="hidden" name="no_urut_sampel" value="<?php echo $value['no_urut_sampel']; ?>" />
										<input type="hidden" name="Umur" value="<?php echo $value['Umur']; ?>" />
										<input type="hidden" name="JK" value="<?php echo $value['JK']; ?>" />
										<input type="hidden" name="pn_loka" value="<?php echo $value['pn_loka']; ?>" />
										<input type="hidden" name="spesies_loka" value="<?php echo $value['spesies_loka']; ?>" />
										<input type="hidden" name="pn_pbtdk" value="<?php echo $value['pn_pbtdk']; ?>" />
										<input type="hidden" name="pf" value="<?php echo $value['PF']; ?>" />
										<input type="hidden" name="pv" value="<?php echo $value['PV']; ?>" />
										<input type="hidden" name="po" value="<?php echo $value['PO']; ?>" />
										<input type="hidden" name="pm" value="<?php echo $value['PM']; ?>" />
										<input type="hidden" name="par_pf" value="<?php echo $value['par_PF']; ?>" />
										<input type="hidden" name="par_pv" value="<?php echo $value['par_PV']; ?>" />
										<input type="hidden" name="par_po" value="<?php echo $value['par_PO']; ?>" />
										<input type="hidden" name="par_pm" value="<?php echo $value['par_PM']; ?>" />
										<input type="hidden" name="lemkos_pf" value="<?php echo $value['lemkos_PF']; ?>" />
										<input type="hidden" name="lemkos_pv" value="<?php echo $value['lemkos_PV']; ?>" />
										<input type="hidden" name="lemkos_po" value="<?php echo $value['lemkos_PO']; ?>" />
										<input type="hidden" name="lemkos_pm" value="<?php echo $value['lemkos_PM']; ?>" />
										<input type="hidden" name="densitas_pf" value="<?php echo $value['densitas_PF']; ?>" />
										<input type="hidden" name="densitas_pv" value="<?php echo $value['densitas_PV']; ?>" />
										<input type="hidden" name="densitas_po" value="<?php echo $value['densitas_PO']; ?>" />
										<input type="hidden" name="densitas_pm" value="<?php echo $value['densitas_PM']; ?>" />
										<input type="hidden" name="pemeriksa" value="<?php echo $value['pemeriksa']; ?>" />
									</td>
									<td class='table-icon' >
										<?php echo $value['no_stiker']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['NamaART']; ?>
									</td>
									<td>
										<?php echo $value['alamat']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['TGL_periksa']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 ))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['formmalaria_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<?php
												if (!($level == 3))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['formmalaria_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm04=\"{$value['formmalaria_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
											<a href=\"#\" onclick=\"delete_link('{$value['formmalaria_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
											";
											?>
										</div>
									</center>
									</td>
								</tr>
							<?php
								$no++;
								endforeach;
							?>
						</tbody>
					</table>
					
					</div>
					<div class="highlight-toolbar bottom">
						<div class="pull-left">
							<div class="btn-toolbar">
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							</div>
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
<div id=\"dialogbm02\" title=\"Form Edit BM02\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialogbm02\" title=\"Form View BM02\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm1" name="bm2form" class='form-horizontal'>
			<input type='hidden' name="bm02_id" />
			<input type="hidden" name="status_addbm02" value="0">
			<div class="control-group">
				<div class="controls controls-row">
					<label style="width:3%;text-align:left;" for="Prov" class="help-block control-label">
						Prov
					</label>
					<label style="width:3%;margin-left:5%;text-align:left;" for="Kota" class="help-block control-label">
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
					<label style="width:16%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
						No. Kode Sampel
					</label>
					<label style="width:22%;margin-left:2%;text-align:left;" for="NoSensus" class="help-block control-label">
						No. Bangunan Sensus
					</label>
					<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width:3%;" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
					<input style="width:3%;margin-left:3%" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
					<input style="width:2%;margin-left:3%" type="text" name="DK" id="DK" maxlength="1" class="span1" />
					<input style="width:8%;margin-left:4%" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
					<input style="width:4%;margin-left:8%" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
					<input style="width:3%;margin-left:18%" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
				</div>
			</div>
			<div class="control-group">
				<label for="Alamat" class="control-label">Alamat Lengkap</label>
				<div class="controls controls-row">
					<input type="text" name="Alamat" id="Alamat" class="span7" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="NamaART" class="control-label">Nama ART</label>
				<div class="controls controls-row">
					<input type="text" name="NamaART" id="NamaART" class="span5"/>
			
				</div>
			</div>
			<div class="control-group">
					<label for="NoART" class="control-label">No. Urut ART</label>
				<div class="controls controls-row">
					<input type="text" name="NoART" id="NoART" class="span1"/>
			
					<label for="NoStiker" class="control-label">No. Stiker</label>
					<input style="margin-left: 2.5641%;" type="text" name="NoStiker" id="NoStiker" class="span2"/>
				</div>
			</div>
			<div class="control-group">
					<label for="RiwayatSakit" class="control-label">Riwayat sakit berat</label>
				<div class="controls controls-row">
					<select name="RiwayatSakit" id="RiwayatSakit" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
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
				</div>
			</div>
			<div class="control-group">
					<label for="NamaLab" class="control-label">Nama Lab. Lapangan</label>
				<div class="controls controls-row">
					<input type="text" name="NamaLab" id="NamaLab" class="span6"/>
					
				</div>
			</div>
			<div class="control-group">
				<label for="PenetasanBuffer" class="control-label">Waktu Penetasan Buffer</label>
				<div class="controls controls-row">
						<input type="text" name="PenetasanBuffer" id="PenetasanBuffer" class="span1 mask_wkt" />
					<label style="width:40%" for="BacaRDT" class="control-label">Waktu Pembacaan RDT</label>
						<input style="margin-left: 2.5641%;" type="text" name="BacaRDT" id="BacaRDT" class="span1 mask_wkt" />
				</div>
			</div>
			<div class="control-group">
					<label for="RDT" class="control-label">Rapid Diagnostic Tes<br/><b><small>(RDT)</small></b></label>
				<div class="controls controls-row">
					<select name="RDT" id="RDT" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<option value="1">1. Negatif</option>
						<option value="2">2. P.falciparum (Pf)</option>
						<option value="3">3. P. vivax (Pv)</option>
						<option value="4">4. Pf dan Pv (mix)</option>
						<option value="5">5. Hasil tidak sahih</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
				<label style="width:50%" for="Tanya1" class="control-label"><b>Apakah ART mengalami riwayat demam/panas dalam 2hari terakhir?</b></label>
					<select style="margin-left: 2.5641%;" name="Tanya1" id="Tanya1" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
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
						<option value="0"> - Silakan Pilih - </option>
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
					<label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
						TGL Enumerator
					</label>
					<label style="width:20%;margin-left:20%;text-align:left;" for="TGLNakes" class="help-block control-label">
						TGL Nakes
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" />
					<input style="margin-left:15.5%;" type="text" name="TGLNakes" id="TGLNakes" placeholder="dd/mm/yyyy" class="span2 datepick" />
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
					<input style="margin-left:1%;" type="text" name="NamaNakesPendamping" id="NamaNakesPendamping" class="span3"/>
				</div>
			</div>
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"addabm02_submit()\" class=\"button button-basic-blue\">Simpan</button>
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
<div id=\"dialog\" title=\"Form Edit BM04\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View BM04\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm1" name="bm4form" class='form-horizontal'>
			<input type='hidden' name="bm04_id" />
			<input type="hidden" name="status_addbm04" value="0">
			<div class="control-group">
				<div class="controls controls-row">
					<label style="width:3%;text-align:left;" for="Prov" class="help-block control-label">
						Prov
					</label>
					<label style="width:3%;margin-left:5%;text-align:left;" for="Kota" class="help-block control-label">
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
					<label style="width:16%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
						No. Kode Sampel
					</label>
					<label style="width:22%;margin-left:2%;text-align:left;" for="NoSensus" class="help-block control-label">
						No. Bangunan Sensus
					</label>
					<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width:3%;" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
					<input style="width:3%;margin-left:3%" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
					<input style="width:2%;margin-left:3%" type="text" name="DK" id="DK" maxlength="1" class="span1" />
					<input style="width:8%;margin-left:4%" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
					<input style="width:4%;margin-left:8%" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
					<input style="width:3%;margin-left:18%" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
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
					<input type="text" name="AlamatLab" id="AlamatLab" class="span5"/>
				</div>
			</div>
			<div class="control-group">
				<label for="NamaEnumerator" class="control-label">Nama Enumerator</label>
				<div class="controls controls-row">
					<input type="text" name="NamaEnumerator" id="NamaEnumerator" class="span5" />
				</div>
			</div>
			<div class="control-group">
				<label for="TelpEnumerator" class="control-label">No. Telp Enumerator</label>
				<div class="controls controls-row">
					<input type="text" name="TelpEnumerator" id="TelpEnumerator" class="span3 mask_phone">
				</div>
			</div>
			<div class="control-group">
					<label for="NoART" class="control-label">No. Urut ART</label>
				<div class="controls controls-row">
					<input type="text" name="NoART" id="NoART" class="span3"/>
				</div>
			</div>
			<div class="control-group">
				<label for="NamaART" class="control-label">Nama ART</label>
				<div class="controls controls-row">
					<input type="text" name="NamaART" id="NamaART" class="span5" />
				</div>
			</div>
			<div class="control-group">
				<label for="Umur" class="control-label">Umur</label>
				<div class="controls controls-row">
					<input type="text" name="Umur" id="Umur" class="span1" />
					<label style="width:5%" class="control-label">Tahun</label>
				</div>
			</div>
			<div class="control-group">
				<label for="JK" class="control-label">Jenis Kelamin</label>
				<div class="controls controls-row">
					<select name="JK" id="JK" class='input-large'>
						<option value="0"> - Jenis Kalamin - </option>
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
						<option value="0"> - Silakan Pilih - </option>
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
					<input type="text" name="NoStiker" id="NoStiker" maxlength="6" class="span2" />
					
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
				</div>
			</div>
			<div class="control-group">
				<label for="KadarHB" class="control-label"><b>Kadar Haemoglobin / HB</b></label>
				<div class="controls controls-row">
				<label style="margin-left:1%; width:5%" for="KadarHB_Nilai" class="control-label">Nilai</label>
					<input style="margin-left: 2.5641%;" type="text" name="KadarHB_Nilai" id="KadarHB_Nilai" class="span1" />
				<label style="margin-left:1%; width:5%" for="KadarHB_Waktu" class="control-label">Waktu</label>
							<input style="margin-left: 2.5641%;" type="text" name="KadarHB_Waktu" id="KadarHB_Waktu" class="span1 mask_wkt" />
				<label style="margin-left:1%; width:5%" for="KadarHB_Tgl" class="control-label">Tanggal</label>
					<input style="margin-left: 2.5641%;" type="text" name="KadarHB_Tgl" id="KadarHB_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
					
				</div>
			</div>
			<div class="control-group">
				<label for="RDiabet" class="control-label">Riwayat diabetes</label>
				<div class="controls controls-row">
					<select name="RDiabet" id="RDiabet" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<option value="1">Ya</option>
						<option value="2">Tidak</option>
						<option value="8">Tidak Mengisi</option>
						<option value="9">Tidak Tahu</option>
					</select>
				
				</div>
			</div>
			<div class="control-group">
					<label for="MinumInsulin" class="control-label">Minum obat anti insulin</label>
				<div class="controls controls-row">
					<select name="MinumInsulin" id="MinumInsulin" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
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
						<option value="0"> - Silakan Pilih - </option>
						<option value="1">Ya</option>
						<option value="2">Tidak</option>
						<option value="8">Tidak Mengisi</option>
						<option value="9">Tidak Tahu</option>
					</select>
					
					<label style="margin-left: 8.5%;width:15%;" class="control-label" for="AkhirMakan">Terakhir makan pukul</label>
						<input style="margin-left:2.5%" type="text" name="AkhirMakan" id="AkhirMakan" class="span1 mask_wkt" />
				</div>
			</div>
			<div class="control-group">
				<label for="PembebananGlukosa" class="control-label">Pembebanan Glukosa</label>
				<div class="controls controls-row">
						<input type="text" name="PembebananGlukosa" id="PembebananGlukosa" class="span1 mask_wkt" />
					<label style="margin-left: 15.5%;width:25%;" class="control-label" for="DuaJPembebananGlukosa" >2 Jam setelah pembebanan glukosa</label>
						<input style="margin-left:2.5%" type="text" name="DuaJPembebananGlukosa" id="DuaJPembebananGlukosa" class="span1 mask_wkt" />
				</div>
			</div>
			<hr/>
			<div class="control-group">
				<label for="KGlukosa1" class="control-label"><b>Kadar glukosa darah</b><br/><small>Sebelum puasa</small></label>
				<div class="controls controls-row">
				<label style="margin-left:1%; width:5%" for="KGlukosa1_Nilai" class="control-label">Nilai</label>
					<input style="margin-left: 2.5641%;" type="text" name="KGlukosa1_Nilai" id="KGlukosa1_Nilai" class="span1" />
				<label style="margin-left:1%; width:5%" for="KGlukosa1_Waktu" class="control-label">Waktu</label>
						<input style="margin-left:2.5%" type="text" name="KGlukosa1_Waktu" id="KGlukosa1_Waktu" class="span1 mask_wkt" />
				<label style="margin-left:1%; width:5%" for="KGlukosa1_Tgl" class="control-label">Tanggal</label>
					<input style="margin-left: 2.5641%;" type="text" name="KGlukosa1_Tgl" id="KGlukosa1_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
					
				</div>
			</div>
			<div class="control-group">
				<label for="KGlukosa2" class="control-label"><b>Kadar glukosa darah</b><br/><small>Sewaktu puasa</small></label>
				<div class="controls controls-row">
				<label style="margin-left:1%; width:5%" for="KGlukosa2_Nilai" class="control-label">Nilai</label>
					<input style="margin-left: 2.5641%;" type="text" name="KGlukosa2_Nilai" id="KGlukosa2_Nilai" class="span1" />
				<label style="margin-left:1%; width:5%" for="KGlukosa2_Waktu" class="control-label">Waktu</label>
						<input style="margin-left:2.5%" type="text" name="KGlukosa2_Waktu" id="KGlukosa2_Waktu" class="span1 mask_wkt" />
				<label style="margin-left:1%; width:5%" for="KGlukosa2_Tgl" class="control-label">Tanggal</label>
					<input style="margin-left: 2.5641%;" type="text" name="KGlukosa2_Tgl" id="KGlukosa2_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
					
				</div>
			</div>
			<div class="control-group">
				<label for="KGlukosa3" class="control-label"><b>Kadar Haemoglobin / HB</b><br/><small>2 jam setelah pembebanan</small></label>
				<div class="controls controls-row">
				<label style="margin-left:1%; width:5%" for="KGlukosa3_Nilai" class="control-label">Nilai</label>
					<input style="margin-left: 2.5641%;" type="text" name="KGlukosa3_Nilai" id="KGlukosa3_Nilai" class="span1" />
				<label style="margin-left:1%; width:5%" for="KGlukosa3_Waktu" class="control-label">Waktu</label>
						<input style="margin-left:2.5%" type="text" name="KGlukosa3_Waktu" id="KGlukosa3_Waktu" class="span1 mask_wkt" />
				<label style="margin-left:1%; width:5%" for="KGlukosa3_Tgl" class="control-label">Tanggal</label>
					<input style="margin-left: 2.5641%;" type="text" name="KGlukosa3_Tgl" id="KGlukosa3_Tgl" placeholder="dd/mm/yyyy" class="span2 datepick" />
					
				</div>
			</div>
			<hr/>
			<div class="control-group">
				<div class="controls controls-row">
					<label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
						TGL Ketua Tim Enumerator
					</label>
					<label style="width:20%;margin-left:20%;text-align:left;" for="TGLDokterPendamping" class="help-block control-label">
						TGL Dokter Pendamping
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" />
					<input style="margin-left:15.5%;" type="text" name="TGLDokterPendamping" id="TGLDokterPendamping" placeholder="dd/mm/yyyy" class="span2 datepick" />
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
					<input style="margin-left:1%;" type="text" name="NamaDokterPendamping" id="NamaDokterPendamping" class="span3">
				</div>
			</div>
			<?php
				if (!($level == 3))
				echo"
				<div class=\"form-actions\">
						<button style=\"padding-left:1%\" type=\"button\" class=\"button button-basic-blue\" onclick=\"addabm04_submit()\" >Simpan</button>
				</div>
				";
			?>
		</form>
	</div>
</div>