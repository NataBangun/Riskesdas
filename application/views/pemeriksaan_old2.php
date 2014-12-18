<script type="text/javascript">
    $(document).ready(function(){
		$('#null').hide();
		$('#1').hide();
		$('#2').hide();
		$('#3').hide();
		$('#4').hide();
		$('#5').hide();
		$('#6').hide();
		$('#7').hide();
		
		$("#MetodePenelitian").change(function(){
			$("#" + this.value).show().siblings().hide();
		});

		$("#MetodePenelitian").change();
		
		
		
		var count = 0;
		var count_mltpx = 0;
		var count_komltpx = 0;
		var count_lum = 0;

		$("#add_btn").click(function(){
			count += 1;
			/*if (count == 7) {
				$('#add_btn').hide();
			}*/
			$('#container').append(
			
				'<div class="control-group records" >'
				+'<input readonly="" style="width: 2.5%; text-align: left;" type="text" name="No_' + count + '" id="No_' + count + '" value="' + count + '" maxlength="2" class="span1" />'
				+'<select style="width: 18%; margin-left: 1.5%" name="Urin_' + count + '" id="Urin_' + count + '" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>'
				+'<select style="width: 18%; margin-left: 2%" name="Darah_' + count + '" id="Darah_' + count + '" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>'
				+'<input style="margin-left: 2%" type="text" name="Tgl2_' + count + '" id="Tgl2_' + count + '" class="span5 datepick" />'
				+'<a class="remove_item" href="#" >Delete</a>'
				+'<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden">'
				+'</div>'
			);
            $ID('JmlData').value = count;
			
		});
		
		$("#add_btnmltpx").click(function(){
			count_mltpx += 1;
			$('#container_mltpx').append(
			
				'<div class="control-group records_mltpx">'
				+'<label for="Hasil" class="control-label">Hasil ' + count_mltpx + '</label>'
				+'<div class="controls controls-row">'
				+'<select name="Hasil" id="Hasil" class="span3"><option value="0">0 - None</option><option value="1">1 - Positif</option><option value="2">2 - Negatif</option></select>'
				+'<label for="CT" class="control-label">CT ' + count_mltpx + '</label>'
				+'<input style="margin-left: 2%" type="text" name="CT" class="span1"/>'
				+'<a class="remove_itemmltpx" href="#" >Delete</a>'
				+'<input id="rows_' + count_mltpx + '" name="rows[]" value="' + count_mltpx + '" type="hidden">'
				+'</div>'
				+'</div>'
			);
            $ID('JmlData_mltpx').value = count_mltpx;
			
		});

		$(".remove_itemmltpx").live('click', function (ev) {
			if (ev.type == 'click') {
				$(this).parents(".records_mltpx").fadeOut();
				$(this).parents(".records_mltpx").remove();
                count_mltpx -=1;
                $ID('JmlData_mltpx').value = count_mltpx;
			}
		});
		
		$("#add_btnkomltpx").click(function(){
			count_komltpx += 1;
			$('#container_komltpx').append(
			
				'<div class="control-group records_komltpx">'
				+'<label for="Hasil" class="control-label">Hasil ' + count_komltpx + '</label>'
				+'<div class="controls controls-row">'
				+'<select name="Hasil" id="Hasil" class="span3"><option value="0">0 - None</option><option value="1">1 - Positif</option><option value="2">2 - Negatif</option></select>'
				+'<label for="CT" class="control-label">CT ' + count_komltpx + '</label>'
				+'<input style="margin-left: 2%" type="text" name="CT" class="span1"/>'
				+'<a class="remove_itemkomltpx" href="#" >Delete</a>'
				+'<input id="rows_' + count_komltpx + '" name="rows[]" value="' + count_komltpx + '" type="hidden">'
				+'</div>'
				+'</div>'
			);
            $ID('JmlData_mltpx').value = count_komltpx;
			
		});

		$(".remove_itemkomltpx").live('click', function (ev) {
			if (ev.type == 'click') {
				$(this).parents(".records_komltpx").fadeOut();
				$(this).parents(".records_komltpx").remove();
                count_komltpx -=1;
                $ID('JmlData_komltpx').value = count_komltpx;
			}
		});
		
		$("#add_btnlum").click(function(){
			count_lum += 1;
			$('#container_lum').append(
			
				'<div class="control-group records_lum">'
				+'<label for="Hasil' + count_lum + '" class="control-label">Hasil ' + count_lum + '</label>'
				+'<div class="controls controls-row">'
				+'<select name="Hasil" id="Hasil' + count_lum + '" class="span3"><option value="0">0 - None</option><option value="1">1 - Positif</option><option value="2">2 - Negatif</option></select>'
				+'<label for="CT" class="control-label">CT ' + count_lum + '</label>'
				+'<input style="margin-left: 2%" type="text" name="CT' + count_lum + '" class="span1"/>'
				+'<a class="remove_itemlum" href="#" >Delete</a>'
				+'<input id="rows_' + count_lum + '" name="rows[]" value="' + count_lum + '" type="hidden">'
				+'</div>'
				+'</div>'
			);
            $ID('JmlData_lum').value = count_lum;
			
		});

		$(".remove_itemlum").live('click', function (ev) {
			if (ev.type == 'click') {
				$(this).parents(".records_lum").fadeOut();
				$(this).parents(".records_lum").remove();
                count_lum -=1;
                $ID('JmlData_lum').value = count_lum;
			}
		});
		
	});
	
/*	$(document).ready(function () {
		function showTab( name ) 
		{
			name = '#' + name;
//			$('div').not(name).hide();
			$(name).show();
		}
		$('#MetodePenelitian').change( function() {
			showTab( $( this ).val() );
		});
		showTab( $('#MetodePenelitian').val() );
	});*/
    
    $(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
            buttons: [
				 {
					 text: "Simpan",
					 click: function() {
                                             // cekKotak();
                                             // simpanAliquot();
					 }
				 },
				 {
					 text: "Close",
					 click: function() {
						 $( this ).dialog( "close" );
					 }
				 }
                        ]
		});
		});
    
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
	
	function view(){
		$("#dialog").dialog("open");
	}
	
	function metod(id){
		$.ajax({
			url:"<?=$application_path?>/pemeriksaan/get_metode/"+$ID("MetodePenelitian").value,
			complete:function(res,status){
				$ID("metod").innerHTML = res.responseText;
			}
		})
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
					<form method="POST" id="frm1" name="frm1" class='form-horizontal' enctype='multipart/form-data'>
						<input type="hidden" name="status_periksa" value="0">
						<div class="control-group">
							<label for="NoBarcode" class="control-label">No. Barcode</label>
							<div class="controls controls-row">
								<input type="text" name="NoBarcode" id="NoBarcode" placeholder="" maxlength="13" class="span2" onkeyup="nobarcode(event)"/>
									<label style="margin-left: 20%" for="Spesimen" class="control-label">Jenis Spesimen</label>
									<input style="margin-left: 10%" type="text" name="Spesimen" id="Spesimen" placeholder="" class="span3" readonly="true"/>                                                               
							</div>
						</div>
						<div class="control-group">
							<label for="Penelitian" class="control-label">Penelitian</label>
							<div class="controls controls-row">
                                <input type="text" name="Penelitian" id="Penelitian" class="span3" readonly="true"/>
									<label style="margin-left: 13%" for="Kondisi" class="control-label">Kondisi Spesimen</label>
									<input style="margin-left: 8.5%" type="text" name="Kondisi" id="Kondisi" placeholder="" class="span3" readonly="true" />
							</div>
						</div>
						<div class="control-group">
                        <label for="NamaART" class="control-label">Nama ART</label>
							<div class="controls controls-row">
                                <input type="text" name="NamaART" id="NamaART" class="span3" readonly="true"/>
                                	<label style="margin-left: 10%" for="Laboraturium" class="control-label">Laboraturium</label>
									<input style="margin-left: 11.5%" type="text" name="Laboraturium" id="Laboraturium" placeholder="" class="span4" readonly="true"/>
						
						</div>
						<div class="control-group">
							<label for="UmurART" class="control-label">Umur</label>
							<div class="controls controls-row">
								<input type="text" name="UmurART" id="UmurART" class='span1' readonly="true"/>
								<label style="width:5%" class="control-label">Tahun</label>
									
                             		<label style="margin-left: 26.5%" for="SpesimenSimpan" class="control-label">Spesimen Disimpan</label>
                             		<input style="margin-left: 7.5%" type="text" name="SpesimenSimpan" id="SpesimenSimpan" placeholder="" class="span4" readonly="true"/>
							</div>
						</div>
						<div class="control-group">
							<label  for="AlamatART" class="control-label">Alamat</label>
							<div class="controls controls-row">
								<input type="text" name="AlamatART" id="AlamatART" class="span4" readonly="true"/>
									<label style="margin-left:3.25%" for="TglAmbil" class="control-label">Diambil Tanggal</label>
									<input style="margin-left: 10%" type="text" name="TglAmbil" id="TglAmbil" placeholder="dd/mm/yyyy" class="span2 datepick" readonly="true" />                                          
							</div>
						</div>
						
						<div class="control-group">
							<label  for="TglTerima" class="control-label">Diterima di Lit. TGL</label>
							<div class="controls controls-row">
								<input type="text" name="TglTerima" id="TglTerima" placeholder="dd/mm/yyyy" class="span2 datepick"  readonly="true"/>
								
							</div>
						</div>
					
						</div>
						<div class="control-group">
							<label for="TGLperiksa" class="control-label">TGL Pemeriksaan</label>
							<div class="controls controls-row">
								<input type="text" name="TGLperiksa" id="TGLperiksa" placeholder="dd/mm/yyyy" class="span2 datepick" />
							</div>
						</div>
						<div class="control-group">
							<label for="NmPetugas" class="control-label">Nama Petugas</label>
							<div class="controls controls-row">
								<input type="text" name="NmPetugas" id="NmPetugas" class="span3"  />
							</div>
						</div>
						
						<div class="control-group">
							<label for="MetodePenelitian" class="control-label">Metode Penelitian</label>
							<div class="controls controls-row">	
								<select name="MetodePenelitian" id="MetodePenelitian" class='span5' onchange="metod(this.value)">
									<option value="null"> - Metode Penelitian - </option>
									<?php foreach($arr_metode as $value): ?>
									<option value="<?php echo $value['id_metod']; ?>"><?php echo $value['id_metod']; ?> - <?php echo $value['nm_metod']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<hr style="border:0.2px solid">
							<div id="boxes">
								<div id="null">
<!--<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span10">
			<div class="box">
				<div class="box-head">
					<span>Form Pemeriksaan</span>
				</div>
				<div class="box-body">-->
									<center><h1>Silakan Pilih Metode Penelitian</h1></center>
				<!--</div>
			</div>
		</div>
	</div>
</div>	-->
								</div>
								
								<div id="1">
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data Isolasi</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Keterangan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span3'/>
											</div>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span3'/>
											</div>
										</div>
										
								</div>
								
								<div id="2">	
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data PCR</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Hasil' class='control-label'>Hasil</label>
										<div class='controls controls-row'>
											<select name='Hasil' id='Hasil' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Positif</option>
												<option value='2'>2 - Negatif</option>
												<option value='3'>3 - Borderline</option>
												<option value='4'>4 - Diulang</option>
											</select> 
											<label for='CT' class='control-label'>CT</label>
											<input style='margin-left: 2%'type='text' name='CT' class='span1'/>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Base Pair</label>
										<div class='controls controls-row'>
											<input type='text' name='BasePair' class='span3'/>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Kontrol Positif</label>
										<div class='controls controls-row'>
											<select name='KontrolPositif' id='KontrolPositif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolNegatif' class='control-label'>Kontrol Negatif</label>
										<div class='controls controls-row'>
											<select name='KontrolNegatif' id='KontrolNegatif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Mock' class='control-label'>Mock</label>
										<div class='controls controls-row'>
											<select name='Mock' id='Mock' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Keterangan</label>
											<div class='controls controls-row'>
												<input type='text' name='BasePair' class='mask_nilaict span5'/>
											</div>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
											<div class='controls controls-row'>
												<textarea class="span5"></textarea>
											</div>
										</div>
										
										
									</div>
									
								</div>
								
								<div id="3">	
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data PCR</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Hasil' class='control-label'>Hasil</label>
										<div class='controls controls-row'>
											<select name='Hasil' id='Hasil' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Positif</option>
												<option value='2'>2 - Negatif</option>
												<option value='3'>3 - Borderline</option>
												<option value='4'>4 - Diulang</option>
											</select> 
											<label for='CT' class='control-label'>CT</label>
											<input style='margin-left: 2%'type='text' name='CT' class='mask_nilaict span1'/>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Kontrol Positif</label>
										<div class='controls controls-row'>
											<select name='KontrolPositif' id='KontrolPositif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolNegatif' class='control-label'>Kontrol Negatif</label>
										<div class='controls controls-row'>
											<select name='KontrolNegatif' id='KontrolNegatif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Mock' class='control-label'>Mock</label>
										<div class='controls controls-row'>
											<select name='Mock' id='Mock' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Keterangan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span5'/>
											</div>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
											<div class='controls controls-row'>
												<textarea class="span5"></textarea>
											</div>
										</div>
										
										
									</div>
									
								</div>
								
								
								<div id="4">	
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data PCR</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									
									<div class="control-group" style=" ">
			                            <input type="button" name="add_btnmltpx" value="Add" id="add_btnmltpx">
									</div>
						<div id="container_mltpx" >
						</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Kontrol Positif</label>
										<div class='controls controls-row'>
											<select name='KontrolPositif' id='KontrolPositif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolNegatif' class='control-label'>Kontrol Negatif</label>
										<div class='controls controls-row'>
											<select name='KontrolNegatif' id='KontrolNegatif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Mock' class='control-label'>Mock</label>
										<div class='controls controls-row'>
											<select name='Mock' id='Mock' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Keterangan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span5'/>
											</div>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
											<div class='controls controls-row'>
												<textarea class="span5"></textarea>
											</div>
										</div>
										
										
									</div>
									
								</div>
								
								
								<div id="5">	
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data PCR</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									<div class="control-group" style=" ">
			                            <input type="button" name="add_btnkomltpx" value="Add" id="add_btnkomltpx">
									</div>
						<div id="container_komltpx" >
						</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Kontrol Positif</label>
										<div class='controls controls-row'>
											<select name='KontrolPositif' id='KontrolPositif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolNegatif' class='control-label'>Kontrol Negatif</label>
										<div class='controls controls-row'>
											<select name='KontrolNegatif' id='KontrolNegatif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Mock' class='control-label'>Mock</label>
										<div class='controls controls-row'>
											<select name='Mock' id='Mock' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Keterangan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span5'/>
											</div>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
											<div class='controls controls-row'>
												<textarea class="span5"></textarea>
											</div>
										</div>
										
										
									</div>
									
								</div>
								
								<div id="6">
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data Luminex</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									
									<div class="control-group" style=" ">
			                            <input type="button" name="add_btnlum" value="Add" id="add_btnlum">
									</div>
						<div id="container_lum" >
						</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Kontrol Positif</label>
										<div class='controls controls-row'>
											<select name='KontrolPositif' id='KontrolPositif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolNegatif' class='control-label'>Kontrol Negatif</label>
										<div class='controls controls-row'>
											<select name='KontrolNegatif' id='KontrolNegatif' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='Mock' class='control-label'>Mock</label>
										<div class='controls controls-row'>
											<select name='Mock' id='Mock' class='span3'>
												<option value='0'>0 - None</option>
												<option value='1'>1 - Ok</option>
												<option value='2'>2 - Kontaminan</option>
												<option value='3'>3 - Tidak Ada</option>
											</select>
										</div>
									</div>
									
									
								</div>
								
								<div id="7">
									<div class='control-group'>
										<label for='Fup' class='control-label'>Plate</label>
										<div class='controls controls-row'>
											<input style=''type='text' name='Plate' class='span5'/>
											
										</div>
									</div>
									
									<div class="control-group" style=" ">
			                            <input type="button" name="add_btn" value="Add" id="add_btn">
									</div>
						<div class="control-group">
							<label style="width:2%;text-align:left;" for="Prov" class="help-block control-label">
								No.
							</label>
							<label style="width:18%;margin-left:2%;text-align:left;" for="Kota" class="help-block control-label">
								Nama Penyakit
							</label>
							<label style="width:18%;margin-left:2%;text-align:left;" for="Kec" class="help-block control-label">
								Data Penyakit
							</label>
							<label style="width:35%;margin-left:2%;text-align:left;" for="Kec" class="help-block control-label">
								Isi Penyakit
							</label>
						</div>
						<div id="container" >
						</div>
						
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Keterangan</label>
										<div class='controls controls-row'>
											<input style="" type='text' name='BasePair' class='mask_nilaict span5'/>
										</div>
									</div>
									
									<div class='control-group'>
										<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
										<div class='controls controls-row'>
											<textarea class="span5"></textarea>
										</div>
									</div>
									
									
									
								</div>
									
								<div id="8">
									<div class='control-group'>
										<label for='Fup' class='control-label'>Upload Data Isolasi</label>
										<div class='controls controls-row'>
											<input type="file" name="Fup"> 
											
										</div>
									</div>
									
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Keterangan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span3'/>
											</div>
										</div>
										
										<div class='control-group'>
											<label for='KontrolPositif' class='control-label'>Kesimpulan</label>
											<div class='controls controls-row'>
												<input style="" type='text' name='BasePair' class='mask_nilaict span3'/>
											</div>
										</div>
										
								</div>
								
							</div>
						
							
						
						<hr style="border:0.2px solid">
						
							
						<div class="form-actions">
							<button style="padding-left:1%" type="button" class="button button-basic-blue" onclick="pemeriksaan_submit()" id="btn_simpan">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
