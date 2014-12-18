<script type="text/javascript">
    
    function reload(value) {
				
					jQuery.ajax({
						url:'<?php echo $application_path; ?>/pemeriksaan/get_arr_formpenerimaan/'+value,
						complete: function(res, status, data) {
                                var rows = eval(res.responseText);
								//var institusi = document.frm1.Institusi;
								var nama = document.frm1.NamaART;
								var umur = document.frm1.UmurART;
								var alamat = document.frm1.AlamatART;
								var spesimen = document.frm1.Spesimen;
								var kondisi = document.frm1.Kondisi;
								var diambil = document.frm1.TglAmbil;
								var diterima = document.frm1.TglTerima;
								var penelitian = document.frm1.Penelitian;
								var lab = document.frm1.Laboraturium;
								var simpandi= document.frm1.SpesimenSimpan;
								
								//institusi.value = rows[0].institusi_name;
								nama.value = rows[0].namaART;
								umur.value = rows[0].umurART;
								alamat.value = rows[0].alamatART;
								spesimen.value = rows[0].spesimen_name;
								kondisi.value = rows[0].kondisispesimen_name;
								diambil.value = rows[0].tgl_ambil;
								diterima.value = rows[0].tgl_terima;
								penelitian.value = rows[0].penelitian_name;
								lab.value = rows[0].LAB_NAME;
								simpandi.value = rows[0].simapanspesimen_name;
								
						}
					
			});
	}
    
        function pemeriksaan_submit() {

		var vno = document.frm1.NoBarcode;
		var vtgl = document.frm1.TGLperiksa;
		var vpetugas = document.frm1.NmPetugas;
		var vmetolit = document.frm1.MetodePenelitian;
		var vhasil = document.frm1.Hasil;
		var vket = document.frm1.Ket;
		
		
		if(vno.value=='' || !(vno.value.length==13) ){
			alert("Propinsi harus diisi (Harus 13 Chars).");
			vno.focus();
			return false;
		}
		else if(vtgl.value==''){
			alert("tanggal harus diisi.");
			vtgl.focus();
			return false;
		}
		else if(vpetugas.value==''){
			alert("Nama Petugas Harus diisi");
			vpetugas.focus();
			return false;
		}
		else if(vmetolit.value=='' || (vmetolit.selectedIndex==0 )){
			alert("Metode Penelitian harus diisi.");
			vmetolit.focus();
			return false;
		}
		else if(vhasil.value==''){
			alert("Hasil harus diisi");
			vhasil.focus();
			return false;
		}
		else if(vket.alue==''){
			alert("keterangan harus diisi");
			vket.focus();
			return false;
		}
		
		else {
		$ID('frm1').submit();
		// return true;
		}
		
	}
	
	<?php if (isset($status_periksa) && $status_periksa == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>
            
    function nobarcode(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoBarcode').value;
			// $ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload($ID('NoBarcode').value);
		}
	}
       function show_data(pm_) {  
		
		var objTR = $('#frm1'+id_pemeriksaan).get(0);
		// alert(objTR);
		$('#dialog input[name="jenispenelititan"]').val( $('#frm1'+id_pemeriksaan+ ' input[name="jenispenelitian"]').val() );
		$('#dialog input[name="nama"]').val( $('#frm1'+id_pemeriksaan+ ' input[name="nama"]').val() );
	}
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4>Form Pemeriksaan </h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Pemeriksaan</li>
		</ul>
	</div>
</div>
<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Pemeriksaan</span>
				</div>
                            
                                

				<div class="box-body">
					<form method="POST" id="frm1" name="frm1" class='form-horizontal'>
						<input type="hidden" name="status_periksa" value="0">
                                                
                                                
                                                
						<div class="control-group">
							<label for="NoBarcode" class="control-label">No. Barcode</label>
							<div class="controls controls-row">
								<input type="text" name="NoBarcode" id="NoBarcode" placeholder="" maxlength="13" class="span2" onkeyup="nobarcode(event)"/>
								<label style="margin-left:19%" for="TGLperiksa" class="control-label">TGL Pemeriksaan</label>
								<input style="margin-left: 2%;" type="text" name="TGLperiksa" id="TGLperiksa" placeholder="dd/mm/yyyy" class="span2 datepick" />
							</div>
						</div>
						<div class="control-group">
							<label for="Penelitian" class="control-label">Penelitian</label>
							<div class="controls controls-row">
                                                            <input type="text" name="Penelitian" id="Penelitian" class="span3" readonly="true"/>
                                                            
								<label style="margin-left: 10.5%;" for="NmPetugas" class="control-label">Nama Petugas</label>
								<input style="margin-left: 2%;" type="text" name="NmPetugas" id="NmPetugas" class="span3" " />
							</div>
						</div>
						<div class="control-group">
                                                    <label for="NamaART" class="control-label">Nama ART</label>
							<div class="controls controls-row">
                                                                <input type="text" name="NamaART" id="NamaART" class="span3" readonly="true"/>
                                                                
								<label style="margin-left: 10.5%;" for="MetodePenelitian" class="control-label">Metode Penelitian</label>
								<select style="margin-left: 2%;" name="MetodePenelitian" id="MetodePenelitian" class='span3'>
									<option value=""> - Metode Penelitian - </option>
									<?php foreach($arr_metode as $value): ?>
									<option value="<?php echo $value['id_metod']; ?>"><?php echo $value['id_metod']; ?> - <?php echo $value['nm_metod']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="UmurART" class="control-label">Umur</label>
							<div class="controls controls-row">
								<input type="text" name="UmurART" id="UmurART" class='span1' readonly="true"/>
								
                                                                 <label style="width:5%" class="control-label">Tahun</label>
							</div>
						</div>
						<div class="control-group">
							<label  for="AlamatART" class="control-label">Alamat</label>
							<div class="controls controls-row">
								<input type="text" name="AlamatART" id="AlamatART" class="span4" readonly="true"/>
                                                                
                                                                <label style="margin-left: 2%;" for="Hasil" class="control-label">Hasil Pemeriksaan</label>
								<textarea style="margin-left:2%;" rows="5" cols="200" name="Hasil" id="Hasil" placeholder="" class=""/></textarea>
							</div>
						</div>
						<div class="control-group">
							<label for="Spesimen" class="control-label">Jenis Spesimen</label>
							<div class="controls controls-row">
								<input type="text" name="Spesimen" id="Spesimen" placeholder="" class="span4" readonly="true"/>
                                                                 <label style="margin-left: 2%;" for="Ket" class="control-label">Keterangan</label>
								<input style="margin-left: 2%;" type="text" name="Ket" id="Ket" class="span4" />
							</div>
						</div>
						<div class="control-group">
							<label for="Kondisi" class="control-label">Kondisi Spesimen</label>
							<div class="controls controls-row">
								<input type="text" name="Kondisi" id="Kondisi" placeholder="" class="span4" readonly="true" />
								
							</div>
						</div>
						<div class="control-group">
							<label for="TglAmbil" class="control-label">Diambil Tanggal</label>
							<div class="controls controls-row">
								<input type="text" name="TglAmbil" id="TglAmbil" placeholder="dd/mm/yyyy" class="span2 datepick" readonly="true" />
							</div>
						</div>
						<div class="control-group">
							<label  for="TglTerima" class="control-label">Diterima di Lit. TGL</label>
							<div class="controls controls-row">
								<input type="text" name="TglTerima" id="TglTerima" placeholder="dd/mm/yyyy" class="span2 datepick"  readonly="true"/>
								
							</div>
						</div>
						
						<div class="control-group">
							<label for="Laboraturium" class="control-label">Laboraturium</label>
							<div class="controls controls-row">
                                                                   <input type="text" name="Laboraturium" id="Laboraturium" placeholder="" class="span4" readonly="true"/>
                                                                   
							</div>
						</div>
						<div class="control-group">
							<label for="SpesimenSimpan" class="control-label">Spesimen Disimpan di</label>
							<div class="controls controls-row">
                                                                   <input type="text" name="SpesimenSimpan" id="SpesimenSimpan" placeholder="" class="span4" readonly="true"/>
                                                                   
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" class="button button-basic-blue" onclick="pemeriksaan_submit()" id="btn_simpan">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
