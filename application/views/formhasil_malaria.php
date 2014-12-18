<script type="text/javascript">

	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('NoStiker').focus();
	});
	
	function reload(value) {
		$.post('<?php echo $application_path;?>/formhasil_malaria/cek/'+value,
		function(data){
			
				if (data=='no'){
					alert("No Stiker Sudah Terdaftar.");
				} else {
				
					jQuery.ajax({
						url:'<?php echo $application_path; ?>/formhasil_malaria/nostiker/'+value,
						complete: function(res, status) {
							var rows = eval(res.responseText);
							var vprov = document.formhasil.Prov;
							var vkota = document.formhasil.Kota;
							var vkec = document.formhasil.Kec;
							var vdesa = document.formhasil.Desa;
							var vdk = document.formhasil.DK;
							var vkodesampel = document.formhasil.KodeSampel;
							var vNoSensus = document.formhasil.NoSensus;
							var vnourut = document.formhasil.NoUrut;
							var vnamaart = document.formhasil.NamaART;
							//var vumur = document.formhasil.Umur;
							//var vjk = document.formhasil.JK;
							var valamat = document.formhasil.Alamat;
							
							
							vprov.value = rows[0].propinsi_id;
							vkota.value = rows[0].kabupaten_id;
							vkec.value = rows[0].kecamatan_id;
							vdesa.value = rows[0].kelurahan_id;
							vdk.value = rows[0].DK;
							vkodesampel.value = rows[0].kode_sampel;
							vNoSensus.value = rows[0].no_bangun_sensus;
							vnourut.value = rows[0].no_urut_sampel;
							vnamaart.value = rows[0].namaART;
							//vumur.value = rows[0].umurART;
							//vjk.value = rows[0].JK;
							valamat.value = rows[0].alamat;
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

		var vprov = document.formhasil.Prov;
		var vkota = document.formhasil.Kota;
		var vkec = document.formhasil.Kec;
		var vdesa = document.formhasil.Desa;
		var vdk = document.formhasil.DK;
		var vkodesampel = document.formhasil.KodeSampel;
		var vNoSensus = document.formhasil.NoSensus;
		var vnourut = document.formhasil.NoUrut;		
		var vnamaart = document.formhasil.NamaART;
		var vumur = document.formhasil.umur;
		var vjk = document.formhasil.JK;
		
		var vnostiker = document.formhasil.NoStiker;
		var vTGLPemeriksa = document.formhasil.TGLPemeriksa;
		var vPN1 = document.formhasil.PN1;
		var vPN2 = document.formhasil.PN2;
		var vSpesiesPBTDK = document.formhasil.SpesiesPBTDK;
		var vSpesiesLoka = document.formhasil.SpesiesLoka;
		// var vPar = document.formhasil.Par;
		// var vLemkos = document.formhasil.Lemkos;
		// var vDensitas = document.formhasil.Densitas;
		var vPemeriksa = document.formhasil.Pemeriksa;
		
		
		if(vnostiker.value=='' || !(vnostiker.value.length==6) ){
			alert("No. stiker harus diisi (Harus 7 Chars).");
			vnostiker.focus();
			return false;
		}
		else if(vTGLPemeriksa.value==''){
			alert("Tanggal Pemeriksaan harus diisi.");
			vTGLPemeriksa.focus();
			return false;
		}
		else if(vPN1.value=='' || vPN1.value=='0'){
			alert("Positif Negatif (PBTDK), harus diisi.");
			vPN1.focus();
			return false;
		}
		else if(vPN2.value=='' || vPN2.value=='0'){
			alert("Positif Negatif (Loka), harus diisi.");
			vPN2.focus();
			return false;
		}
		else if(vSpesiesPBTDK.value==''){
			alert("Spesies Huruf (PBTDK), harus diisi 1 Chars.");
			vSpesiesPBTDK.focus();
			return false;
		}
		else if(vSpesiesLoka.value==''){
			alert("Spesies Huruf (Loka), harus diisi 1 Chars.");
			vSpesiesLoka.focus();
			return false;
		}
		// else if(vPar.value==''|| !(vPar.value.length==5 )){
			// alert("Par (harus diisi 5 Chars).");
			// vPar.focus();
			// return false;
		// }
		// else if(vLemkos.value==''|| !(vLemkos.value.length==5 )){
			// alert("Lemkos (harus diisi 5 Chars).");
			// vLemkos.focus();
			// return false;
		// }
		// else if(vDensitas.value==''|| !(vDensitas.value.length==10 )){
			// alert("Densitas (harus diisi 10 Chars).");
			// vDensitas.focus();
			// return false;
		// }
		else if(vPemeriksa.value==''){
			alert("Pemeriksa (harus diisi).");
			vPemeriksa.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addmalaria) && $status_addmalaria == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form Hasil Pemeriksaan Malaria</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Hasil Pemeriksaan Malaria</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Hasil</span>
					<!--<div class="actions">
						<a href="javascript:print()" rel='tooltip' title="Print statistics"><i class="icon-print"></i> Print</a>
					</div>-->
				</div>
				<div class="box-body">
					<form method="POST" id="frm1" name="formhasil" class='form-horizontal'>
						<input type="hidden" name="status_addmalaria" value="0">
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
								<label style="width:3%;margin-left:4%;text-align:left;" for="DK" class="help-block control-label">
									D/K
								</label>
								<label style="width:15%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
									No. Kode Sampel
								</label>
								<label style="width:15%;margin-left:3%;text-align:left;" for="NoSensus" class="help-block control-label">
									No. Bangunan Sensus
								</label>
								<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									No. Urut
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text" name="Prov" id="Prov" class="span1" />
								<input type="text" name="Kota" id="Kota" class="span1" />
								<input type="text" name="Kec" id="Kec" class="span1" />
								<input type="text" name="Desa" id="Desa" class="span1" />
								<input style="width:3%;" type="text" name="DK" id="DK" class="span1" />
								<input style="margin-left:4.5%;" type="text" name="KodeSampel" id="KodeSampel" class="span2" />
								<input style="margin-left:4%;" type="text" name="NoSensus" id="NoSensus" class="span1" />
								<input style="margin-left:11%" type="text" name="NoUrut" id="NoUrut" class="span1" />
								<!--input style="margin-left:11%" type="text" name="NoUrut" id="NoUrut" class="span1" disabled /-->
							</div>
						</div>
						<div class="control-group">
								<label for="NamaART" class="control-label">Nama</label>
							<div class="controls controls-row">
								<input type="text" name="NamaART" id="NamaART" class="span5" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="Umur" class="control-label">Umur</label>
							<div class="controls controls-row">
								<input type="text" name="Umur" id="Umur" class="span1" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="JK" class="control-label">Jenis Kelamin</label>
							<div class="controls controls-row">
								<input type="text" name="JK" id="JK" class="span2" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="NoStiker" class="control-label">Nomer Stiker</label>
							<div class="controls controls-row">
								<input type="text" name="NoStiker" id="NoStiker" class="span2" onkeyup="nostiker(event)"/>
						
							</div>
						</div>
						<div class="control-group">
								<label for="TGLPemeriksa" class="control-label">Tanggal Pemeriksaan</label>
							<div class="controls controls-row">
								<input type="text" name="TGLPemeriksa" id="TGLPemeriksa" placeholder="dd/mm/yyyy" class="span2 datepick"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="Alamat" class="control-label">Alamat Lengkap</label>
							<div class="controls controls-row">
								<input type="text" name="Alamat" id="Alamat" class="span7" />
						
							</div>
						</div>
						<hr/>
						
						<div class="control-group">
							<label for="Alamat" class="control-label"><b><u>Parameter di PBTDK</u></b></label>
							<div class="controls controls-row">
							<label for="Alamat" class="control-label"><b><u>Hasil Pemeriksaan</u></b></label>
							<label style="margin-left:14%;" for="Alamat" class="control-label"><b><u>Parameter di Loka</u></b></label>
							<label style="margin-left:2.5%;" for="Alamat" class="control-label"><b><u>Hasil Pemeriksaan</u></b></label>
						
							</div>
						</div>
						
						<div class="control-group">
							<label for="PN1" class="control-label">Positif/Negatif</label>
							<div class="controls controls-row">
								<select name="PN1" id="PN1" class='span3'>
									<option value="0"> - Silakan Pilih - </option>
									<option value="1">Positif</option>
									<option value="2">Negatif</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
							<label style="margin-left:4%;" for="PN2" class="control-label">Positif/Negatif</label>
								<select style="margin-left:2.5%;" name="PN2" id="PN2" class='span3'>
									<option value="0"> - Silakan Pilih - </option>
									<option value="1">Positif</option>
									<option value="2">Negatif</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="SpesiesPBTDK" class="control-label">Spesies</label>
							<div class="controls controls-row">
								<input type="text" name="SpesiesPBTDK" id="SpesiesPBTDK" class="span1" maxlength="1" />
							<label style="margin-left:21%;" for="SpesiesLoka" class="control-label">Spesies</label>
								<input style="margin-left:2.5%;" type="text" name="SpesiesLoka" id="SpesiesLoka" class="span1" maxlength="1" />
						
							</div>
						</div>
						<div class="control-group">
							<label for="Par" class="control-label">Parasit</label>
							<div class="controls controls-row">
								<input type="text" name="Par" id="Par" class="span1" maxlength="5" />
							</div>
						</div>
						<div class="control-group">
							<label for="Lemkos" class="control-label">Leukosit</label>
							<div class="controls controls-row">
								<input type="text" name="Lemkos" id="Lemkos" class="span1" maxlength="5" />
							</div>
						</div>
						<div class="control-group">
							<label for="Densitas" class="control-label">Densitas</label>
							<div class="controls controls-row">
								<input type="text" name="Densitas" id="Densitas" class="span2" maxlength="10" />
							</div>
						</div>
						
						<div class="control-group">
								<label for="Pemeriksa" class="control-label">Pemeriksa</label>
							<div class="controls controls-row">
								<input type="text" name="Pemeriksa" id="Pemeriksa" class="span5"/>
						
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" onclick="addabm02_submit()" class="button button-basic-blue">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>