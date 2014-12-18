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
				+'<input readonly="" style="margin-left: 12%;width: 2.5%; text-align: left;" type="text" name="No_' + count + '" id="No_' + count + '" value="' + count + '" maxlength="2" class="span1" />'
				+'<input style="width: 8%; margin-left: 1.5%" type="text" name="NOMOR_SAMPEL[]" id="NOMOR_SAMPEL_' + count + '" maxlength="6" class="span1" />'
				+'<select style="width: 10%; margin-left: 2%" name="JENIS_AIR[]" id="JENIS_AIR_' + count + '" class="span2"><option> - Pilih - </option><option value="1">PAM</option><option value="2">Sumur Terbuka</option><option value="2">Sumur Pompa Artesis</option><option value="2">Kolam</option><option value="2">Danau</option><option value="2">Sungai</option><option value="2">Mata Air</option><option value="2">Lain-lain</option></select>'
				+'<input style="width: 10%; margin-left: 2.4%" type="text" name="TANGGAL[]" id="TANGGAL_' + count + '" placeholder="dd/mm/yyyy" class="span1 datepick" />'
				+'<input style="width: 24%; margin-left: 2%" type="text" name="ALAMAT[]" id="ALAMAT_' + count + '" " class="span2 " />'
				+'<input style="width: 10%; margin-left: 2%" type="text" name="KEDALAMAN[]" id="KEDALAMAN_' + count + '" " class="span1 " />'
				+'<a class="remove_item btn btn-default" href="#" >Delete</a>'
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
                            if (count <= 7) {
                                    $('#add_btn').show();
                            }
			}
		});
        
        
	});
	
		$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

		//$ID('NoStiker').focus();
		
		var count_1 = 0;

		$("#add_btn2").click(function(){
			count_1 += 1;
			if (count_1 == 7) {
				$('#add_btn2').hide();
			}
			$('#container2').append(
			
				'<div class="controls controls-row records_1" style="margin-bottom:10px" >'
                                +'<input readonly="" style="" type="text" name="No_' + count_1 + '" id="No_' + count_1 + '" value="' + count_1 + '" maxlength="2" class="span1" />'
				+'<input style="" type="text" name="ATAS_NAMA[]" class="span2" />'
				+'<a class="remove_item_1 btn btn-default" href="#" >Delete</a>'
				+'<input id="rows_' + count_1 + '" name="rows[]" value="'+ count_1 +'" type="hidden">'
				+'</div>'
			);
            $ID('JmlData_1').value = count_1;
			
		});

		$(".remove_item_1").live('click', function (ev) {
			if (ev.type == 'click') {
                            $(this).parents(".records_1").fadeOut();
                            $(this).parents(".records_1").remove();
                            count_1 -=1;
                            $ID('JmlData_1').value = count_1;
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
	
	
	
	
	function nostiker_1(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_1').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload($ID('NoStiker_1').value);
		}
	}
	
	
	function addabm01_submit() {

			
		var vnamanakespendamping = document.bm1form.NmNakes;
		if(vnamanakespendamping.value==''){
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
		<h4>Form Pengujian Sampel</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Pengujian Sampel</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Pengujian Sampel</span>
				</div>
				<!--<div class="box-body box-body-nopadding">-->
				<div class="box-body">
					<form method="POST" id="frm1" name="bm1form" class='form-horizontal'>
						<input type="hidden" name="status_addbm01" value="0">
						<input type="hidden" id="JmlData" name="JmlData" value="0">
                                                <input type="hidden" id="JmlData_1" name="JmlData_1" value="0">
						<div class="control-group">
							<label for="Alamat" class="control-label">No. Pengujian</label>
							<div class="controls controls-row">
								<input type="text" name="No" id="No" class="span1" />
                                                                <label class="" style="float:left"> &nbsp;/FFPS/&nbsp; </label>
								<select style="float:left" name="bulan" id="bulan" class="span2">
                                                                    <option> - Bulan - </option>
                                                                    <option value="1">Jan</option>
                                                                    <option value="2">Feb</option>
                                                                    <option value="3">Mar</option>
                                                                    <option value="4">Apr</option>
                                                                    <option value="5">Mei</option>
                                                                    <option value="6">Jun</option>
                                                                    <option value="7">Jul</option>
                                                                    <option value="8">Agu</option>
                                                                    <option value="9">Sep</option>
                                                                    <option value="10">Okt</option>
                                                                    <option value="11">Nov</option>
                                                                    <option value="12">Des</option>
								</select>								
								<?php
								date_default_timezone_set('Asia/Jakarta');
								$sekarang = date('Y');
								?>
								<label class="" style="float:left">&nbsp;/
								<?php echo $sekarang; ?>

								</label>
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Nama</label>
							<div class="controls controls-row">
								<input type="text" name="Nama" id="Nama" class="span4" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Alamat Lengkap</label>
							<div class="controls controls-row">
								<input type="text" name="Alamat" id="Alamat" class="span7" />
							</div>
						</div>
						
						<div class="control-group">
								<label for="TglKumpul" class="control-label">No. Telpon</label>
							<div class="controls controls-row">
								<input type="text" name="Notelp" id="Notelp" class="span2 "/>
							</div>
						</div>

						<div class="control-group">
								<label for="TglKumpul" class="control-label">No. Fax</label>
							<div class="controls controls-row">
								<input type="text" name="Nofax" id="Nofax" class="span2 "/>
							</div>
						</div>
		
						<div class="control-group" id="container2">
							<label for="TglKumpul" class="control-label">Hasil Pengujian Atas Nama</label>
							<div class="controls controls-row" >
								<input type="button" style=""name="add_btn2" value="Add" id="add_btn2">
							</div>
						</div>				

						

						

						<hr/>
						<div class="control-group">
							<label for="TglKumpul" class="control-label">Menyerahkan contoh air untuk diperiksa sebanyak</label>
							<div class="controls controls-row">
								<input type="button" style="" name="add_btn" value="Add" id="add_btn">

						</div>				
						<div class="control-group">
								<label style="width:2%;text-align:left;margin-left:12%;" for="Prov" class="help-block control-label">
									No.
								</label>
								<label style="width:8%;margin-left:2%;text-align:left;" for="Kota" class="help-block control-label">
									Nomor Sampel
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="Kec" class="help-block control-label">
									Jenis Air
								</label>
								<label style="width:10%;margin-left:2.5%;text-align:left;" for="Desa" class="help-block control-label">
									Tanggal
								</label>
								<label style="width:23.2%;margin-left:2%;text-align:left;" for="DK" class="help-block control-label">
									Alamat
								</label>
								<label style="width:10%;margin-left:2.5%;text-align:left;" for="KodeSampel" class="help-block control-label">
									Kedalaman
								</label>
						</div>
						
						
				
						<div id="container" >
						</div>
						<div class="control-group">
                            
						</div>
						<hr/>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="NmNakes" class="span2 ">
								Pemohon
								</label>
								<label style="margin-left:26%;text-align:left;" for="Kota" class="span2">
								Tempat
								</label>
<!--<label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
									TGL Enumerator
								</label>-->
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<!--<input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" />-->
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
								<!--label style="width:20%;margin-left:20%;text-align:left;" for="NmNakes" class="help-block control-label">
									Nakes Pendamping
								</label-->
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text"  name="penerima" id="penerima" class="span3"/>
								
								<input type="text" style="margin-left:17%;" name="tgl" id="tgl" placeholder="dd/mm/yyyy" class="span2 datepick " />							
								<!--input style="margin-left:17%;" type="text" name="NamaNakesPendamping" id="NamaNakesPendamping" class="span3"/-->
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%;margin-left:-4.5%;" type="button" id="simpan" onclick="addabm01_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>