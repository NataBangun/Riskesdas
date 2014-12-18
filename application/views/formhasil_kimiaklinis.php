<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;
			$ID('NoStiker').focus();
	});
	
	function reload(value) {
		$.post('<?php echo $application_path;?>/formhasil_kimiaklinis/cek/'+value,
		function(data){
		
			if (data=='no'){
				alert("No Stiker Sudah Terdaftar.");
				$('#simpan').hide();
			} else {
			
				// $.post('<?php echo $application_path;?>/formhasil_kimiaklinis/cekdata/'+value,
				// function(res, status, data){
					
					// if (data=='0'){
						// alert("Data belum tersedia.");
					// } else {
				$('#simpan').show();
				jQuery.ajax({
					url:'<?php echo $application_path; ?>/formhasil_kimiaklinis/nostiker/'+value,
					complete: function(res, status, data) {
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
							var vumur = document.formhasil.Umur;
							var vjk = document.formhasil.JK;
							var valamat = document.formhasil.Alamat;
							
							vprov.value = rows[0].propinsi_id;
							vkota.value = rows[0].kabupaten_id;
							vkec.value = rows[0].kecamatan_id;
							vdesa.value = rows[0].kelurahan_id;
							vdk.value = rows[0].DK;
							vkodesampel.value = rows[0].kode_sampel;
							vNoSensus.value = rows[0].no_bangun_sensus;
							vnourut.value = rows[0].no_urut_sampel;
							vnamaart.value = rows[0].nama_ART;
							vumur.value = rows[0].umurART;
							vjk.value = rows[0].JK;
							valamat.value = rows[0].alamatART;
					}
				});
					// }
				// });
				
			}
		});
	}

	function nostiker(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker').value;
			// $ID('NoStiker').value = vNoStiker.substring(5,11);
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
		var vTtlKolestrol = document.formhasil.TtlKolestrol;
		var vHDLKolestrol = document.formhasil.HDLKolestrol;
		var vLDLKolestrol = document.formhasil.LDLKolestrol;
		var vTrigliserida = document.formhasil.Trigliserida;
		var vKreatinin = document.formhasil.Kreatinin;
		var vPemeriksa = document.formhasil.Pemeriksa;
		
		
		if(vdk.value=='' || !(vdk.value=='1' || vdk.value=='2') ){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vnostiker.value=='' || !(vnostiker.value.length==6) ){
			alert("No. stiker harus diisi (Harus 6 Chars).");
			vnostiker.focus();
			return false;
		}
		else if(vTGLPemeriksa.value==''){
			alert("Tanggal pemeriksaan harus diisi.");
			vTGLPemeriksa.focus();
			return false;
		}
		else if(vTtlKolestrol.value==''){
			alert("Total kolestrol harus diisi.");
			vTtlKolestrol.focus();
			return false;
		}
		else if(vHDLKolestrol.value==''){
			alert("HDL kolestrol harus diisi.");
			vHDLKolestrol.focus();
			return false;
		}
		else if(vLDLKolestrol.value==''){
			alert("LDL kolestrol harus diisi.");
			vLDLKolestrol.focus();
			return false;
		}
		else if(vTrigliserida.value==''){
			alert("Trigliserida harus diisi.");
			vTrigliserida.focus();
			return false;
		}
		else if(vKreatinin.value==''){
			alert("Kreatinin harus diisi.");
			vKreatinin.focus();
			return false;
		}
		else if(vPemeriksa.value==''){
			alert("Nama Pemeriksa harus diisi.");
			vPemeriksa.focus();
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
		<h4>Form Hasil Kimia Klinis</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Hasil Kimia Klinis</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Hasil Kimia Klinis</span>
					<!--<div class="actions">
						<a href="javascript:print()" rel='tooltip' title="Print statistics"><i class="icon-print"></i> Print</a>
					</div>-->
				</div>
				<!--<div class="box-body box-body-nopadding">-->
				<div class="box-body">
					<form method="POST" id="frm1" name="formhasil" class='form-horizontal'>
						<input type="hidden" name="status_addbm02" value="0">
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
								<!--
								<label style="width:14%;margin-left:2%;text-align:left;" for="NoSubSensus" class="help-block control-label">
									No. Sub Blok Sensus
								</label>
								-->
								<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									No. Urut
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text" readonly="" name="Prov" id="Prov" placeholder="" class="span1" />
								<input type="text" readonly="" name="Kota" id="Kota" placeholder="" class="span1" />
								<input type="text" readonly="" name="Kec" id="Kec" placeholder="" class="span1" />
								<input type="text" readonly="" name="Desa" id="Desa" placeholder="" class="span1" />
								<input style="width:3%;" readonly="" type="text" name="DK" id="DK" placeholder="" class="span1" />
								<input style="margin-left:4.5%;" readonly="" type="text" name="KodeSampel" id="KodeSampel" placeholder="" class="span2" />
								<input style="margin-left:4%;" readonly="" type="text" name="NoSensus" id="NoSensus" placeholder="" class="span1" />
								<!--<input style="margin-left:8%;" type="text" name="NoSubSensus" id="NoSubSensus" placeholder="015" class="span1" />-->
								<input style="margin-left:11%" readonly="" type="text" name="NoUrut" id="NoUrut" placeholder="" class="span1" />
							</div>
						</div>
						<div class="control-group">
								<label for="NamaART" class="control-label">Nama</label>
							<div class="controls controls-row">
								<input type="text" readonly="" name="NamaART" id="NamaART" placeholder="" class="span5" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="Umur" class="control-label">Umur</label>
							<div class="controls controls-row">
								<input type="text" readonly="" name="Umur" id="Umur" placeholder="" class="span1" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="JK" class="control-label">Jenis Kelamin</label>
							<div class="controls controls-row">
								<input readonly="" type="text" name="JK" id="JK" placeholder="" class="span2" />
						
							</div>
						</div>
						<div class="control-group">
								<label for="NoStiker" class="control-label">Nomer Stiker</label>
							<div class="controls controls-row">
								<input type="text" name="NoStiker" id="NoStiker" placeholder="" class="span2" data-placement="right" rel="tooltip" title="Masukkan No Barcode, kemudian ENTER." onkeyup="nostiker(event)"/>
						
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
								<input readonly="" type="text" name="Alamat" id="Alamat" placeholder="" class="span7" />
						
							</div>
						</div>
						<hr/>
						<div class="control-group">
								<label for="Karakter" class="control-label">Karakteristik</label>
							<div class="controls controls-row">
								<select name="Karakter" id="Karakter" class='span3'>
									<option value="0"> - Silakan Pilih - </option>
									<option value="1">1 - Normal</option>
									<option value="2">2 - Hemolisis</option>
									<option value="3">3 - Ikferik</option>
									<option value="4">4 - Lipemik</option>
								</select>
								
						
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="width:10%;text-align:left;" for="TtlKolestrol" class="help-block control-label">
									Kolestrol total
								</label>
								<label style="width:10%;margin-left:6%;text-align:left;" for="HDLKolestrol" class="help-block control-label">
									Kolestrol HDL
								</label>
								<label style="width:14%;margin-left:5%;text-align:left;" for="LDLKolestrol" class="help-block control-label">
									Kolestrol LDL direct
								</label>
								<label style="width:10%;margin-left:5%;text-align:left;" for="Trigliserida" class="help-block control-label">
									Trigliserida
								</label>
								<label style="width:10%;margin-left:5%;text-align:left;" for="Kreatinin" class="help-block control-label">
									Kreatinin
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text" name="TtlKolestrol" id="TtlKolestrol" placeholder="" class="span1" />
								<input style="margin-left:10%;" type="text" name="HDLKolestrol" id="HDLKolestrol" placeholder="" class="span1" />
								<input style="margin-left:9%;" type="text" name="LDLKolestrol" id="LDLKolestrol" placeholder="" class="span1" />
								<input style="margin-left:13%;" type="text" name="Trigliserida" id="Trigliserida" placeholder="" class="span1" />
								<input style="margin-left:9%;" type="text" name="Kreatinin" id="Kreatinin" placeholder="" class="span1" />
							</div>
						</div>
						<div class="control-group">
								<label for="Pemeriksa" class="control-label">Pemeriksa</label>
							<div class="controls controls-row">
								<input type="text" name="Pemeriksa" id="Pemeriksa" placeholder="" class="span5"/>
						
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" onclick="addabm02_submit()" id="simpan" class="button button-basic-blue">Simpan</button>
							<!--button type="button" onclick="goto('preview/index/')" class="button button-basic">Print</button-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>