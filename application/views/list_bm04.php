<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function edit_link_action(bm04_id) {  
		
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
	
	function delete_link(bm04_id) {
		if (confirm('Yakin? ')) {
			goto('list_bm04/del/' + bm04_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 990,
			height: 500,
			// buttons: [
				// {
					// text: "Update",
					// onclick: function(addabm04_submit) {
						// // (addabm04_submit);
						// alert('hi');
						// // $( this ).dialog( "close" );
					// }
				// },
				// {
					// text: "Batal",
					// click: function() {
						// $( this ).dialog( "close" );
					// }
				// }
			// ]
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( bm04_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(bm04_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(bm04_id);
		}
		//);
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
//		var vTelpEnumerator = document.bm4form.TelpEnumerator;
		var vNamaART = document.bm4form.NamaART;
		var vNoART = document.bm4form.NoART;
		var vUmur = document.bm4form.Umur;
		var vJK = document.bm4form.JK;
		var vTanya1 = document.bm4form.Tanya1;
		var vNoStiker = document.bm4form.NoStiker;
		var vAlamatART = document.bm4form.AlamatART;
//		var vAmbilDarah = document.bm4form.AmbilDarah;
		var vKadarHB_Nilai = document.bm4form.KadarHB_Nilai;
		var vKadarHB_Waktu = document.bm4form.KadarHB_Waktu;
		var vKadarHB_Tgl = document.bm4form.KadarHB_Tgl;
		var vRDiabet = document.bm4form.RDiabet;
		var vMinumInsulin = document.bm4form.MinumInsulin;
		var vPuasa = document.bm4form.Puasa;
		var vAkhirMakan = document.bm4form.AkhirMakan;
//		var vPembebananGlukosa = document.bm4form.PembebananGlukosa;
//		var vDuaJPembebananGlukosa = document.bm4form.DuaJPembebananGlukosa;
//		var vKGlukosa1_Nilai = document.bm4form.KGlukosa1_Nilai;
//		var vKGlukosa1_Waktu = document.bm4form.KGlukosa1_Waktu;
//		var vKGlukosa1_Tgl = document.bm4form.KGlukosa1_Tgl;
//		var vKGlukosa2_Nilai = document.bm4form.KGlukosa2_Nilai;
//		var vKGlukosa2_Waktu = document.bm4form.KGlukosa2_Waktu;
//		var vKGlukosa2_Tgl = document.bm4form.KGlukosa2_Tgl;
//		var vKGlukosa3_Nilai = document.bm4form.KGlukosa3_Nilai;
//		var vKGlukosa3_Waktu = document.bm4form.KGlukosa3_Waktu;
//		var vKGlukosa3_Tgl = document.bm4form.KGlukosa3_Tgl;
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
//		else if(vTelpEnumerator.value==''){
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
//		else if(vAmbilDarah.value==''){
//			alert("Pengambilan darah belum diisi.");
//			vAmbilDarah.focus();
//			return false;
//		}
		else if(vKadarHB_Nilai.value==''){
			alert("Nilai kadar glukosa harus diisi.");
			vKadarHB_Nilai.focus();
			return false;
		}
		else if(vKadarHB_Waktu.value==''){
			alert("Waktu pengambilan kadar glukosa harus diisi.");
			vKadarHB_Waktu.focus();
			return false;
		}
		else if(vKadarHB_Tgl.value==''){
			alert("Tanggal pengambilan kadar glukosa harus diisi.");
			vKadarHB_Tgl.focus();
			return false;
		}
		else if(vRDiabet.value=='' || vRDiabet.value=='0'){
			alert("Riwayat Diabetes belum diisi.");
			vRDiabet.focus();
			return false;
		}
		else if(vMinumInsulin.value=='' || vMinumInsulin.value=='0'){
			alert("Minum obat anti insulin.");
			vMinumInsulin.focus();
			return false;
		}
		else if(vPuasa.value=='' || vPuasa.value=='0'){
			alert("Puasa belum isi.");
			vPuasa.focus();
			return false;
		}
		else if(vAkhirMakan.value==''){
			alert("Pukul terakhir makan, belum diisi.");
			vAkhirMakan.focus();
			return false;
		}
//		else if(vPembebananGlukosa.value==''){
//			alert("Pukul pembebanan glukosa, belum diisi.");
//			vPembebananGlukosa.focus();
//			return false;
//		}
//		else if(vDuaJPembebananGlukosa.value==''){
//			alert("Pukul setelah pembebanan glukosa, belum diisi.");
//			vDuaJPembebananGlukosa.focus();
//			return false;
//		}
//		else if(vKGlukosa1_Nilai.value==''){
//			alert("Nilai Kadar Glukosa, belum diisi.");
//			vKGlukosa1_Nilai.focus();
//			return false;
//		}
//		else if(vKGlukosa1_Waktu.value==''){
//			alert("Waktu pengambilan Kadar glukosa, belum diisi.");
//			vKGlukosa1_Waktu.focus();
//			return false;
//		}
//		else if(vKGlukosa1_Tgl.value==''){
//			alert("Tanggal pengambilan glukosa, belum diisi.");
//			vKGlukosa1_Tgl.focus();
//			return false;
//		}
//		else if(vKGlukosa2_Nilai.value==''){
//			alert("Nilai Kadar Glukosa (sewaktu puasa), belum diisi.");
//			vKGlukosa2_Nilai.focus();
//			return false;
//		}
//		else if(vKGlukosa2_Waktu.value==''){
//			alert("Waktu pengambilan Kadar glukosa (sewaktu puasa), belum diisi.");
//			vKGlukosa2_Waktu.focus();
//			return false;
//		}
//		else if(vKGlukosa2_Tgl.value==''){
//			alert("Tanggal pengambilan glukosa (sewaktu puasa), belum diisi.");
//			vKGlukosa2_Tgl.focus();
//			return false;
//		}
//		else if(vKGlukosa3_Nilai.value==''){
//			alert("Nilai Kadar Glukosa (setelah pembebanan), belum diisi.");
//			vKGlukosa3_Nilai.focus();
//			return false;
//		}
//		else if(vKGlukosa3_Waktu.value==''){
//			alert("Waktu pengambilan Kadar glukosa (setelah pembebanan), belum diisi. ");
//			vKGlukosa3_Waktu.focus();
//			return false;
//		}
//		else if(vKGlukosa3_Tgl.value==''){
//			alert("Tanggal pengambilan glukosa (setelah pembebanan), belum diisi.");
//			vKGlukosa3_Tgl.focus();
//			return false;
//		}
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
		<h4><i class="icon-table"></i> List Data BM04</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="#">List</a><span class="divider">/</span></li>			
			<li class='active'>Form List Data BM.04</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Data BM.04</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<!--div class="btn-toolbar">
								<div class="btn-group"-->
				<!--form action="<!?php echo $application_path; ?>/search_bm02/index" method="POST" class='form-horizontal'-->
				<form method="POST" class='form-horizontal'>
									<!--<a href="#" class="button button-basic button-icon" rel="tooltip" title="Refresh results" onclick="reloadPage()"><i class="icon-refresh"></i></a>-->
									<label><span>Search:</span><input name="search" id="search" rel="tooltip" title="Search dengan Nomor Stiker." type="text" placeholder="Search here" /></label>
				</form>
								<!--/div>
							</div-->
						</div>
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong><?php echo $laman_row_awal."-".$laman_row_akhir ?></strong> of <strong><?php echo $laman_jumlah ?></strong></span>
								</div>
								<div class="btn-group">
									<a href="#" onclick="goto('list_bm04/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_bm04/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_bm04/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_bm04/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_bm04/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
								</div>
							</div>
						</div>
					</div>
					<!--<table class="table table-nomargin table-bordered dataTable table-striped table-hover">-->
					<table class="table table-nomargin table-bordered table-pagination">
						<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="10%">No Stiker</th>
								<th width="17%">Nama ART</th>
								<th width="35%">Alamat</th>
								<th width="18%" class='table-date'>Jam Pengambilan Darah</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_bm04)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form BM04 Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_bm04 as $value):
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
					<div class="bottom-table">
						<div class="pull-left">
							<div class="btn-toolbar">
								<div class="btn-group">
							<?php
							if (!( $this->data['level'] ==3 ))
							echo "
							<a href=\"#\" onclick=\"goto('formbm04/')\" class=\"button button-basic\">Tambah Data</a>
							";
							?>
								</div>
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong><?php echo $laman_row_awal."-".$laman_row_akhir ?></strong> of <strong><?php echo $laman_jumlah ?></strong></span>
								</div>
								<div class="btn-group">
									<a href="#" onclick="goto('list_bm04/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_bm04/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_bm04/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_bm04/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_bm04/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
								</div>
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