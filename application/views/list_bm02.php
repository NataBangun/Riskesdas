<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function delete_link(bm02_id) {
		if (confirm('Apa anda yakin akan menghapus data ini? ')) {
			goto('list_bm02/del/' + bm02_id);
		}
	}
    
	function edit_link_action(bm02_id) {  
		
		var objTR = $('#bm02_'+bm02_id).get(0);
		// alert(objTR);
		$('#dialog input[name="NoStiker"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="Alamat"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="TglAmbilDrh"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog input[name="bm02_id"]').val( $('#bm02_'+bm02_id+ ' input[name="bm02_id"]').val() );
		$('#dialog input[name="Prov"]').val( $('#bm02_'+bm02_id+ ' input[name="propinsi_id"]').val() );
		$('#dialog input[name="Kota"]').val( $('#bm02_'+bm02_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialog input[name="Kec"]').val( $('#bm02_'+bm02_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialog input[name="Desa"]').val( $('#bm02_'+bm02_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialog input[name="DK"]').val( $('#bm02_'+bm02_id+ ' input[name="DK"]').val() );
		$('#dialog input[name="KodeSampel"]').val( $('#bm02_'+bm02_id+ ' input[name="kode_sampel"]').val() );
		$('#dialog input[name="NoSensus"]').val( $('#bm02_'+bm02_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialog input[name="NoUrut"]').val( $('#bm02_'+bm02_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialog input[name="NoART"]').val( $('#bm02_'+bm02_id+ ' input[name="noART"]').val() );
		combobox_select($('#dialog select[name="RiwayatSakit"]'), $('#bm02_'+bm02_id+ ' input[name="riwayat_sakit_berat"]').val());
		// $('#dialog input[name="RiwayatSakit"]').val( $('#bm02_'+bm02_id+ ' input[name="riwayat_sakit_berat"]').val() );
		$('#dialog input[name="NamaLab"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_lab"]').val() );
		$('#dialog input[name="PenetasanBuffer"]').val( $('#bm02_'+bm02_id+ ' input[name="time_penetasan_buffer"]').val() );
		$('#dialog input[name="BacaRDT"]').val( $('#bm02_'+bm02_id+ ' input[name="time_pembacaan_rdt"]').val() );
		combobox_select($('#dialog select[name="RDT"]'), $('#bm02_'+bm02_id+ ' input[name="hasil_rdt"]').val());
		// $('#dialog input[name="RDT"]').val( $('#bm02_'+bm02_id+ ' input[name="hasil_rdt"]').val() );
		combobox_select($('#dialog select[name="Tanya1"]'), $('#bm02_'+bm02_id+ ' input[name="art_riwayat_panas"]').val());
		combobox_select($('#dialog select[name="Tanya2"]'), $('#bm02_'+bm02_id+ ' input[name="duplo"]').val());
		// $('#dialog input[name="Tanya1"]').val( $('#bm02_'+bm02_id+ ' input[name="art_riwayat_panas"]').val() );
		// $('#dialog input[name="Tanya2"]').val( $('#bm02_'+bm02_id+ ' input[name="duplo"]').val() );
		$('#dialog input[name="TGLEnumerator"]').val( $('#bm02_'+bm02_id+ ' input[name="tgl_enumerator"]').val() );
		$('#dialog input[name="TGLNakes"]').val( $('#bm02_'+bm02_id+ ' input[name="tgl_nakes"]').val() );
		$('#dialog input[name="NamaEnumelator"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_enumerator"]').val() );
		$('#dialog input[name="NamaNakesPendamping"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_nakes"]').val() );
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 900,
			height: 500,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( bm02_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(bm02_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(bm02_id);
		}
		//);
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
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> List Data BM02</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form List Data BM.02</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Data BM.02</span>
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
									<a href="#" onclick="goto('list_bm02/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_bm02/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_bm02/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_bm02/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_bm02/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
								<th width="18%" class='table-date'>Tgl Pengambilan Darah</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no = 1;
								foreach($arr_bm02 as $value):
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
											<a href=\"#\" onclick=\"document.dialog_click('{$value['bm02_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" bm02=\"{$value['bm02_id']}\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<?php
												if (!($level == 3))
												echo"
												<a href=\"#\" onclick=\"document.dialog_click('{$value['bm02_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm02=\"{$value['bm02_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
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
					<div class="bottom-table">
						<div class="pull-left">
							<div class="btn-toolbar">
								<div class="btn-group">
							<?php
							if (!( $this->data['level'] ==3 ))
							echo "
							<a href=\"#\" onclick=\"goto('formbm02/')\" class=\"button button-basic\">Tambah Data</a>
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
									<a href="#" onclick="goto('list_bm02/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_bm02/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_bm02/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_bm02/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_bm02/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
<div id=\"dialog\" title=\"Form Edit BM02\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View BM02\" style=\"z-index:99999;\">
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