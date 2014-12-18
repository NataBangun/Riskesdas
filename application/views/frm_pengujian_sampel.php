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
				+'<input style="width: 8%; margin-left: 1.5%" type="text" name="NO_SAMPEL[]" id="NO_SAMPEL_' + count + '"  class="span1" />'
				+'<select onchange="Jenisair(this.value)"; style="width: 10%; margin-left: 2%" name="JENIS_AIR[]" id="JENIS_AIR_' + count + '" class="span2"><option> - Pilih - </option><option value="1">PAM</option><option value="2">Sumur Terbuka</option><option value="3">Sumur Pompa Artesis</option><option value="4">Kolam</option><option value="5">Danau</option><option value="6">Sungai</option><option value="7">Mata Air</option><option value="8">Air Isi Ulang</option><option value="9" >Air RO</option><option value="10" id="lain2">Lain-lain</option></select>'
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
	
function Jenisair(id)
{
var x;
if (id==10)
	{
	var person=prompt("Silahkan masukkan Jenis air","");

		if (person!=null)
		  {
		  document.getElementById("lain2").innerHTML=person;
		  }
	}
}	

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
	
$(function(){
    $('#cetak').click(function(){
		pengujian_sampel_print();
    });    
    });    	

function pengujian_sampel_print(){
            $.ajax({
                method  : "POST",
                url     : "<?php echo $application_path;?>/frm_pengujian_sampel/pengujian_sampel_print/",
                data    : $('#frm1').serialize(),
                complete: function(res,status){
                    win = window.open("","Cetak","status=0,toolbar=1");
                    win.document.write(res.responseText);
                }
            });
}
	

	function addujisam_submit() 
	{			
		$ID('frm1').submit();
	}
	
	<?php if (isset($status_addujisam) && $status_addujisam == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form Permohonan Pengujian Sampel</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Permohonan Pengujian Sampel</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Permohonan Pengujian Sampel</span>
<p id="JENIS_AIR"></p>		
		</div>
				<div class="box-body">
					<form method="POST" id="frm1" name="formsam" class='form-horizontal'>
                        <input type="hidden" id="status_pengujian" name="status_pengujian" value="<?=(isset($status_pengujian))?$status_pengujian:"0";?>"/>
						<input type="hidden" name="status_addujisam" id="status_addujisam" value="0">
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
								<input type="text" name="nama" id="nama" class="span4" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Alamat Lengkap</label>
							<div class="controls controls-row">
								<input type="text" name="alamat" id="alamat" class="span7" />
							</div>
						</div>
						
						<div class="control-group">
								<label for="TglKumpul" class="control-label">No. Telpon</label>
							<div class="controls controls-row">
								<input type="text" name="notelp" id="notelp" class="span2 "/>
							</div>
						</div>

						<div class="control-group">
								<label for="TglKumpul" class="control-label">No. Fax</label>
							<div class="controls controls-row">
								<input type="text" name="nofax" id="nofax" class="span2 "/>
							</div>
						</div>

						<div class="control-group">
							<label for="tgl_penerimaan" class="control-label">Tanggal Penerimaan</label>
							<div class="controls controls-row">
								<input type="text" name="tgl_penerimaan" id="tgl_penerimaan" placeholder="dd/mm/yyyy" class="span2 datepick " />
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
								
								<input type="text" style="margin-left:17%;" name="tanggal" id="tanggal" placeholder="dd/mm/yyyy" class="span2 datepick " />							
								<!--input style="margin-left:17%;" type="text" name="NamaNakesPendamping" id="NamaNakesPendamping" class="span3"/-->
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%;margin-left:-4.5%;" type="button" id="simpan" onclick="addujisam_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
							<button style="padding-left:1%;margin-left:4.5%;" type="button" id="cetak"  class="button button-basic-blue">Cetak</button>
						</div>	
					</form>
						
				</div>
				<div class="form-actions">
							<label style=" padding-left:1%;margin-left:1%;">Form/T8-1</label>
							<label style=" padding-left:1%;margin-left:1%;">Rev : 0</label>
							<label style=" padding-left:1%;margin-left:1%;"> Tanggal : 
							<?php
							//Buat daftar nama bulan
							$bulan = array("January","Pebruary","Maret","April","Mei","Juni","Juli","Agustus","September","Okotober","Nopember","Desember");
							 
							//Buat daftar nama hari dalam bahasa indonesia
							$hari  = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
							 
							$month = intval(date('m')) - 1;
							 
							$days  = date('w');
							 
							$tg_angka = date('d');
							 
							$year  = date('Y');
							 
							echo ' '.$tg_angka.' '.$bulan[$month].' '.$year;
							//===================================
							?> 
							</label>
						</div>
			</div>
		</div>
	</div>
</div>