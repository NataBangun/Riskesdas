<script type="text/javascript">
    function no_sampel(id){
        if(event.keyCode == 13){
            $.ajax({
                url:'<?php echo $application_path;?>/frm_pengujian_sampel_air/no_sampel/',
                complete:complete_no_sampel,
                method:'post',
                data:{
                        'id':id
                }
            });
        }
    } 
				var dat = [ '-','PAM','Sumur Terbuka','Sumur Pompa Artesis','Kolam','Danau','Sungai','Mata Air','Lain - Lain'];
 
    function complete_no_sampel(res,status){
		var rows = eval(res.responseText);
        var row = rows[0];
        $ID('TGL_PENERIMAAN').value		= row.TGL_PENERIMAAN;
        $ID('NO_KODE').value      		= row.NO_KODE;
        $ID('NAMA_PENGIRIM').value      = row.NAMA_PENGIRIM;
        $ID('JENIS_AIR').value          = row.JENIS_AIR;
        $ID('TEMPAT_PENGAMBILAN').value = row.TEMPAT_PENGAMBILAN;
        $ID('TGL_PENGAMBILAN').value    = row.TGL_PENGAMBILAN;
        $ID('KEDALAMAN').value          = row.KEDALAMAN;
        $ID('KETERANGAN').value         = row.KETERANGAN;
		

    }
    
function kosong(id,val)
{
if (val==0)
	{
	$ID('kadar_'+id).value         	= '-';
	$ID('hasil_'+id).value         		= '-';
	}
}

function kosong2(id,val)
{
if (val==0)
	{
	$ID('kadar_'+id).value         	= '-';
	$ID('hasil_'+id).value         		= '-';
	}
}

    function complete_save(res,status){
        alert('Sukses di simpan');
    }
    
    function click_submit(){
        $.ajax({
            url:'<?php echo $application_path;?>/frm_pengujian_sampel_air/save/',
            method:'post',
            data:$('#frm1').serialize(),
            complete:complete_save
        })
    }
	
$(function(){	
$('#cetak').click(function(){
	pengambilan_print();
    });    
    });     
	
function pengambilan_print(){
            $.ajax({
                method  : "POST",
                url     : '<?php echo $application_path?>/frm_pengujian_sampel_air/print_form',
                data    : $('#frm1').serialize(),
                complete: function(res,status){
                    win = window.open("","Cetak","status=0,toolbar=1");
                    win.document.write(res.responseText);
                }
            });
}
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i>Laporan Hasil Pengujian Sementara</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Laporan Hasil Pengujian Sementara</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Laporan Hasil Pengujian Sementara</span>
                                        
				</div>
				<form method="POST" id="frm1" name="frm1" class='form-horizontal'>
						<input type="hidden" name="status_addbm01" value="0">
						
						<div class="control-group">
							<label for="Alamat" class="control-label">No. Sampel</label>
							<div class="controls controls-row">
								<input type="text" name="NO_SAMPEL" id="NO_SAMPEL" class="span3" onkeyup="no_sampel(this.value)"/>
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">No. Kode</label>
							<div class="controls controls-row">
								<input type="text" name="NO_KODE" id="NO_KODE" class="span1" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Tanggal Penerimaan</label>
							<div class="controls controls-row">
								<input type="text" name="TGL_PENERIMAAN" id="TGL_PENERIMAAN" class="span2 datepick" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Nama Pengirim</label>
							<div class="controls controls-row">
								<input type="text" value="-"name="NAMA_PENGIRIM" id="NAMA_PENGIRIM" class="span2" />
							</div>
						</div>
						<div class="control-group">
							<label for="Alamat" class="control-label">Jenis Air</label>
							<div class="controls controls-row">
								<input type="text" value="0"name="JENIS_AIR" id="JENIS_AIR" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Tempat Pengambilan Air</label>
							<div class="controls controls-row">
								<input type="text" name="TEMPAT_PENGAMBILAN" id="TEMPAT_PENGAMBILAN" class="span4" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Tanggal Pengambilan</label>
							<div class="controls controls-row">
								<input type="text" name="TGL_PENGAMBILAN" id="TGL_PENGAMBILAN" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Kedalaman</label>
							<div class="controls controls-row">
								<input type="text" name="KEDALAMAN" id="KEDALAMAN" class="span2" />
							</div>
						</div>
						
						<div class="control-group">
							<label for="Alamat" class="control-label">Keterangan</label>
							<div class="controls controls-row">
                                                            <textarea name="KETERANGAN" id="KETERANGAN" class="textarea" ></textarea>
							</div>
						</div>

					
					
				<div class="box-body box-body-nopadding">
					<!--<table class="table table-nomargin table-bordered dataTable table-striped table-hover">-->
					<table class="table-bordered table-striped table-hover table2 table2-striped table2-nomargin table2-mail">
						<thead>
							<tr>
								<th width="1%">No.</td>
								<th width="10%"><center>Parameter</center></td>
								<th width="10%"><center>Metode</center></td>
								<th width="7%"><center>Satuan</center></td>
								<th width="7%"><center>Hasil</center></td>
								<th width="14%"><center>Kadar Maksimum Yang Diperbolehkan</center></td>
							</tr>
						
							<?php
							$param=array(
								1=>'Bau',
								2=>'Jumlah zat padat terlarut',
								3=>'Kekeruhan',
								4=>'Rasa',
								5=>'Suhu',
								6=>'Warna'
							);
							
							$param2=array(
								1=>'Arsen',
								2=>'Flourida',
								3=>'Kromium (valensi 6)',
								4=>'Kadmium',
								5=>'Nitrit (LOD < 0.03)',
								6=>'Nitrat',
								7=>'Sianida',
								8=>'Belenium',
								9=>'Alumunium',
								10=>'Besi (LOD < 0.02)',
								11=>'Kesudahan',
								12=>'Klorida',
								13=>'Mangan (LOD < 0.20)',
								14=>'PH',
								15=>'Seng',
								16=>'Sulfat (LOD < 5)',
								17=>'Tembaga',
								18=>'Sisa Klor',
								19=>'Amonia'								
							);
							
							
							?>
							
						</thead>
						<tbody>
							<tr>
							<td></b>A.<b></td>
							<td colspan="5"><b>FISIKA</b></td>		
							</tr>
							<?php
							$no=1;
							foreach($param as $prm){
							echo"<tr>
									<td>$no</td>
									<td class='table-icon'>$param[$no]</td>
									<td>
									<center>
									<select onchange='kosong($no,this.value)' name='metode[]' id='metode_$no' >
									<option value='0'>-PILIH METODE-</option>
									<option value='1'>SNI-01-3554-2006 butiri 2.2</option>
									<option value='2'>SNI 01-3554-2006 Tirimetri</option>
									<option value='3'>SNI 01-3554-2006 Potensiometri</option>
									<option value='4'>SNI 06-6989-12-2004 Titrimetri</option>
									<option value='5'>IKU/KA 01 Spektrofotometri</option>
									<option value='6'>IKU/KA 02 Spektrofotometri</option>
									<option value='7'>IKU/KA 04 Spektrofotometri</option>
									<option value='8'>IKU/KA 05 Spektrofotometri</option>
									<option value='9'>IKU/KA 06 Colorimetri</option>
									<option value='10'>IKU/KA 07 Potensiometri</option>
									<option value='11'>IKU/KA 08 Turbidimetri</option>
									<option value='12'>IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'><center>-</center></td>
									<td><input type='text' value='-' name='hasil[]' id='hasil_$no' class='span12' /></td>
									<td><input type='text' value='-' name='kadar[]' id='kadar_$no' class='span12' /></td>
								</tr>";
								$no++;
							}
								?>
							<tr>
							<td><b>B.</b></td>
							<td colspan="5"><b>KIMIA</b></td>
							</tr>
							<tr>
							<td><b>a.</b></td>
							<td colspan="5"><b>Kimia Anorganik</b></td>
							</tr>
							<?php
							$no2=1;
							foreach($param2 as $prm){
							echo"<tr>
									<td>$no2</td>
									<td class='table-icon'>$param2[$no2]</td>
									<td>
									<center>
									<select onchange='kosong2($no,this.value)' name='metode[]' id='metode_$no' >
									<option value='0'>-PILIH METODE-</option>
									<option value='1'>SNI-01-3554-2006 butiri 2.2</option>
									<option value='2'>SNI 01-3554-2006 Tirimetri</option>
									<option value='3'>SNI 01-3554-2006 Potensiometri</option>
									<option value='4'>SNI 06-6989-12-2004 Titrimetri</option>
									<option value='5'>IKU/KA 01 Spektrofotometri</option>
									<option value='6'>IKU/KA 02 Spektrofotometri</option>
									<option value='7'>IKU/KA 04 Spektrofotometri</option>
									<option value='8'>IKU/KA 05 Spektrofotometri</option>
									<option value='9'>IKU/KA 06 Colorimetri</option>
									<option value='10'>IKU/KA 07 Potensiometri</option>
									<option value='11'>IKU/KA 08 Turbidimetri</option>
									<option value='12'>IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'><center>-</center></td>
									<td><input type='text' value='-' name='hasil[]' id='hasil_$no' class='span12' /></td>
									<td><input type='text' value='-' name='kadar[]' id='kadar_$no' class='span12' /></td>
								</tr>";
								$no2++;
								$no++;
							}
								?>
							<tr>
							<td><b>b.</b></td>
							<td colspan="5"><b>Kimia Organik</b></td>
							</tr>
							<?php
							echo"<tr>
									<td>$no</td>
									<td class='table-icon'>Zat Organic (KMn04)</td>
									<td>
									<center>
									<select onchange='kosong($no,this.value)' name='metode[]' id='metode_$no' >
									<option value='0'>-PILIH METODE-</option>
									<option value='1'>SNI-01-3554-2006 butiri 2.2</option>
									<option value='2'>SNI 01-3554-2006 Tirimetri</option>
									<option value='3'>SNI 01-3554-2006 Potensiometri</option>
									<option value='4'>SNI 06-6989-12-2004 Titrimetri</option>
									<option value='5'>IKU/KA 01 Spektrofotometri</option>
									<option value='6'>IKU/KA 02 Spektrofotometri</option>
									<option value='7'>IKU/KA 04 Spektrofotometri</option>
									<option value='8'>IKU/KA 05 Spektrofotometri</option>
									<option value='9'>IKU/KA 06 Colorimetri</option>
									<option value='10'>IKU/KA 07 Potensiometri</option>
									<option value='11'>IKU/KA 08 Turbidimetri</option>
									<option value='12'>IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'><center>-</center></td>
									<td><input type='text' value='-' name='hasil[]' id='hasil_$no' class='span12' /></td>
									<td><input type='text' value='-' name='kadar[]' id='kadar_$no' class='span12' /></td>
								</tr>";
								$no++;
								?>
					</table>
				</div>
                                                
							<label style="color:red; padding-left:1%;margin-left:1%;">(*) Sesuai Permenkes No. 492/Men.Kes/PER/IV/2010</label>
							<label style=" padding-left:1%;margin-left:1%;">Form/T10-1</label>
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
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						
                                                <div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">

						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="DIBUAT_OLEH" class="span2 ">
								Dibuat oleh
								</label>
								<label style="margin-left:26%;text-align:left;" for="TEMPAT" class="span2">
								Tempat
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text" name="DIBUAT_OLEH" id="dibuat_oleh" value="Kelik Muhammad Arifin, S.Sos"class="span3"/>
								<input type="text" style="margin-left:17%;" name="TEMPAT" id="tempat" class="span3"/>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<label style="text-align:left;" for="DISETUJUI_OLEH" class="span2 ">
									Disetujui oleh
								</label>
								<label style="text-align:left;margin-left:26%;" for="TANGGAL" class="span2 ">
									Tanggal
								</label>
							</div>
						</div>
						<div class="control-group">
							<div class="controls controls-row">
								<input type="text"  name="DISETUJUI_OLEH" id="disetujui_oleh" value="Dra. Ani Isnawati, M.Kes, Apt"class="span3"/>
								
								<input type="text" style="margin-left:17%;" name="TANGGAL" id="tgl" placeholder="dd/mm/yyyy" class="span2 datepick " />							
							</div>
						</div>
						<div class="form-actions">
	<button style="padding-left:1%;margin-left:-4.5%;" type="button" id="simpan" onclick="click_submit()" class="button button-basic-blue">Simpan</button>
                            <button type="button" class="btn btn-large" id="cetak" >Print</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>

			</div>
		</div>
	</div>
</div>
			</div>
		</div>
	</div>
</div>

						



