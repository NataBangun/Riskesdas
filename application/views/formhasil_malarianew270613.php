<script type="text/javascript">

	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('NoStiker').focus();
	});
	
	function reload(value) {
		$.post('<?php echo $application_path;?>/formhasil_malarianew/cek/'+value,
		function(data){
			
				if (data=='no'){
					alert("No Stiker Sudah Terdaftar.");
				} else {
				
					jQuery.ajax({
						url:'<?php echo $application_path; ?>/formhasil_malarianew/nostiker/'+value,
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
	
    function autodensitas(){
		var vpar = document.formhasil.Par;
		var vlemkos = document.formhasil.Lemkos;
		var vdensitas = document.formhasil.Densitas;
		
        hasil = ( parseInt(vpar.value) / parseInt(vlemkos.value) ) * 8000;

		vdensitas.value = hasil;
	}
	
    function autodensitas2(){
		var vpar2 = document.formhasil.Par2;
		var vlemkos2 = document.formhasil.Lemkos2;
		var vdensitas2 = document.formhasil.Densitas2;
		
        hasil = ( parseInt(vpar2.value) / parseInt(vlemkos2.value) ) * 8000;

		vdensitas2.value = hasil;
	}
    
    function autodensitas3(){
		var vpar3 = document.formhasil.Par3;
		var vlemkos3 = document.formhasil.Lemkos3;
		var vdensitas3 = document.formhasil.Densitas3;
	
        hasil = ( parseInt(vpar3.value) / parseInt(vlemkos3.value) ) * 8000;

		vdensitas3.value = hasil;
	}
    
    function autodensitas4(){
		var vpar4 = document.formhasil.Par4;
		var vlemkos4 = document.formhasil.Lemkos4;
		var vdensitas4 = document.formhasil.Densitas4;
        
        hasil = ( parseInt(vpar4.value) / parseInt(vlemkos4.value) ) * 8000;
	
		vdensitas4.value = hasil;
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
		var vPF = document.formhasil.PF;
		//var vPF = document.getElementById(PF);
		var vpv = document.formhasil.PV;
		var vpo = document.formhasil.PO;
		var vpm = document.formhasil.PM;
		var vSpesiesLoka = document.formhasil.SpesiesLoka;
	    var vPar = document.formhasil.Par;
	    var vPar2 = document.formhasil.Par2;
	    var vPar3 = document.formhasil.Par3;
	    var vPar4 = document.formhasil.Par4;
		var vLemkos = document.formhasil.Lemkos;
		var vLemkos2 = document.formhasil.Lemkos2;
		var vLemkos3 = document.formhasil.Lemkos3;
		var vLemkos4 = document.formhasil.Lemkos4;
		// var vDensitas = document.formhasil.Densitas;
		var vPemeriksa = document.formhasil.Pemeriksa;
		
		
		if(vnostiker.value=='' || !(vnostiker.value.length==6) ){
			alert("No. stiker harus diisi (Harus 6 Chars).");
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
		else if(vSpesiesLoka.value==''){
			alert("Spesies Huruf (Loka), harus diisi 1 Chars.");
			vSpesiesLoka.focus();
			return false;
		}
		else if(vPemeriksa.value==''){
			alert("Pemeriksa (harus diisi).");
			vPemeriksa.focus();
			return false;
		}
//		else if(!(vPF.value=='1'){
//			alert("PF hanya dapat di isi dengan angka (1).");
//			vPF.focus();
//			return false;
//		}
		else {
		
    		if(vPF.value=='1'){
    		  //if (vPF.checked.value=='1'){
    			if(vPar.value=='' ){
        			alert("Parasit PF harus diisi (Harus 4 Chars).");
        			vPar.focus();
        			return false;
        		}
        		else if(vLemkos.value==''){
        			alert("Lemkos PF harus diisi (Harus 4 Chars).");
        			vLemkos.focus();
        			return false;
        		}
		     //return false;
    		}
            if (vpv.value=='1'){
                if(vPar2.value==''){
                    alert("Parasit PV Harus diisi (Harus 4 Chart).");
                    vPar2.focus();
                    return false;     
                } else if (vLemkos2.value==''){
                    alert("Lemkos PV Harus diisi (Harus 4 Chart).");
                    vLemkos2.focus();
                    return false;
                }
			//return false;
    		}
            if (vpo.value=='1'){
                if(vPar3.value==''){
                    alert("Parasit PO Harus diisi (Harus 4 Chart).");
                    vPar3.focus();
                    return false;     
                } else if (vLemkos3.value==''){
                    alert("Lemkos PO Harus diisi (Harus 4 Chart).");
                    vLemkos3.focus();
                    return false;
                }
			//return false;
    		}
            if (vpm.value=='1'){
                if(vPar4.value==''){
                    alert("Parasit PM Harus diisi (Harus 4 Chart).");
                    vPar4.focus();
                    return false;     
                } else if (vLemkos4.value==''){
                    alert("Lemkos PM Harus diisi (Harus 4 Chart).");
                    vLemkos4.focus();
                    return false;
                }
			//return false;
    		}
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
							<label style="margin-left:32%;" for="Alamat" class="control-label"><b><u>Parameter di Loka</u></b></label>
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
                                    <option value="3">Pecah</option>
                                    <option value="4">Jamur</option>
                                    <option value="5">Tidak Bisa Dibaca</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
							<label style="margin-left:22%;" for="PN2" class="control-label">Positif/Negatif</label>
								<select style="margin-left:2.5%;" name="PN2" id="PN2" class='span3'>
									<option value="0"> - Silakan Pilih - </option>
									<option value="1">Positif</option>
									<option value="2">Negatif</option>
                                    <option value="3">Pecah</option>
                                    <option value="4">Jamur</option>
                                    <option value="5">Tidak Bisa Dibaca</option>
									<option value="8">Tidak Mengisi</option>
									<option value="9">Tidak Tahu</option>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="PF" class="control-label">PF</label>
							<div class="controls controls-row">
                                <!--<div class="span1">
                                    <input type="checkbox" name="PF" id="PF" value="1" />
                                </div>-->
								<input type="text" name="PF" id="PF" class="span1" maxlength="1" />
                                
							<label style="width: 2%;margin-left:2%;" for="PV" class="control-label">PV</label>
								<input style="margin-left:2%;" type="text" name="PV" id="PV" class="span1" maxlength="1" />
							<label style="width: 2%;margin-left:2%;" for="PO" class="control-label">PO</label>
								<input style="margin-left:2%;" type="text" name="PO" id="PO" class="span1" maxlength="1" />
							<label style="width: 2%;margin-left:2%;" for="PM" class="control-label">PM</label>
								<input style="margin-left:2%;" type="text" name="PM" id="PM" class="span1" maxlength="1" />
                                
							<label style="margin-left:3%;" for="SpesiesLoka" class="control-label">Spesies</label>
								<input style="margin-left:2.5%;" type="text" name="SpesiesLoka" id="SpesiesLoka" class="span1" maxlength="1" />
						
							</div>
						</div>
						<div class="control-group">
							<label for="Par" class="control-label">Parasit</label>
							<div class="controls controls-row">
								<input type="text" name="Par" id="Par" class="span1" maxlength="4" onchange="autodensitas()" />
								<input style="margin-left:6%;" type="text" name="Par2" id="Par2" class="span1" maxlength="4" onchange="autodensitas2()" />
								<input style="margin-left:6%;" type="text" name="Par3" id="Par3" class="span1" maxlength="4" onchange="autodensitas3()" />
								<input style="margin-left:6%;" type="text" name="Par4" id="Par4" class="span1" maxlength="4" onchange="autodensitas4()" />
							</div>
						</div>
						<div class="control-group">
							<label for="Lemkos" class="control-label">Leukosit</label>
							<div class="controls controls-row">
								<input type="text" name="Lemkos" id="Lemkos" class="span1" maxlength="4" onchange="autodensitas()" />
								<input style="margin-left:6%;" type="text" name="Lemkos2" id="Lemkos2" class="span1" maxlength="4" onchange="autodensitas2()" />
								<input style="margin-left:6%;" type="text" name="Lemkos3" id="Lemkos3" class="span1" maxlength="4" onchange="autodensitas3()" />
								<input style="margin-left:6%;" type="text" name="Lemkos4" id="Lemkos4" class="span1" maxlength="4" onchange="autodensitas4()" />
							</div>
						</div>
						<div class="control-group">
							<label for="Densitas" class="control-label">Densitas</label>
							<div class="controls controls-row">
								<input style="width: 8.5%;" type="text" name="Densitas" id="Densitas" class="span2" maxlength="8" />
								<input style="width: 8.5%;margin-left:3.5%;" type="text" name="Densitas2" id="Densitas2" class="span2" maxlength="8" />
								<input style="width: 8.5%;margin-left:3.5%;" type="text" name="Densitas3" id="Densitas3" class="span2" maxlength="8" />
								<input style="width: 8.5%;margin-left:3.5%;" type="text" name="Densitas4" id="Densitas4" class="span2" maxlength="8" />
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