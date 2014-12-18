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
    
    function complete_no_sampel(res,status){
        var rows = eval(res.responseText);
        var row = rows[0];
        $ID('TGL_PENERIMAAN').value;
        $ID('NAMA_PENGIRIM').value      = row.NAMA_PENGIRIM;
        $ID('JENIS_AIR').value          = row.JENIS_AIR;
        $ID('TEMPAT_PENGAMBILAN').value = row.TEMPAT_PENGAMBILAN;
        $ID('TGL_PENGAMBILAN').value    = row.TGL_PENGAMBILAN;
        $ID('KEDALAMAN').value          = row.KEDALAMAN;
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
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i>Laporan Hasil Pengujian</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Laporan Hasil Pengujian</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Laporan Hasil Pengujian</span>
                                        
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
								<input type="text" name="TGL_PENERIMAAN" id="TGL_PENERIMAAN" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Nama Pengirim</label>
							<div class="controls controls-row">
								<input type="text" name="NAMA_PENGIRIM" id="NAMA_PENGIRIM" class="span2" />
							</div>
						</div>

						<div class="control-group">
							<label for="Alamat" class="control-label">Jenis Air</label>
							<div class="controls controls-row">
								<input type="text" name="JENIS_AIR" id="JENIS_AIR" class="span2" />
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
							
						</thead>
						<tbody>
							<tr>
							<td></b>A.<b></td>
							<td colspan="5"><b>FISIKA</b></td>
							</tr>
							<tr>
									<td >1</td>
									<td class='table-icon'>Bau</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>						
									</center>
									</td>
									<td class='table-date'><center>-</center></td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>Tidak Berbau</center></td>
								</tr>
							<tr>
									<td >2</td>
									<td class='table-icon'>Jumlah zat padat terlarut</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>										
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>1000</center></td>
								</tr>
								<tr>
									<td >3</td>
									<td class='table-icon'>Kekeruhan</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>Skala FTU</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>5</center></td>
								</tr>
								<tr>
									<td >4</td>
									<td class='table-icon'>Rasa</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>-</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>Tidak Berasa</center></td>
								</tr>
								<tr>
									<td >5</td>
									<td class='table-icon'>Suhu</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>&deg;C</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>Sudah berasa + 3&deg; C</center></td>
								</tr>
								<tr>
									<td >6</td>
									<td class='table-icon'>Warna</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>Skala TCU</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>15</center></td>
								</tr>
							<tr>
							<td><b>B.</b></td>
							<td colspan="5"><b>KIMIA</b></td>
							</tr>
							<tr>
							<td><b>a.</b></td>
							<td colspan="5"><b>Kimia Anorganik</b></td>
							</tr>
								<tr>
									<td >1</td>
									<td class='table-icon'>Arsen</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.01</center></td>
							</tr>
								<tr>
									<td >2</td>
									<td class='table-icon'>Flourida</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>1.5</center></td>
								</tr>
								<tr>
									<td >3</td>
									<td class='table-icon'>Kromium (valensi 6)</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>								
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.05</center></td>
								</tr>
									<td >4</td>
									<td class='table-icon'>Kadmium</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.003</center></td>
								</tr>
								<tr>
									<td >5</td>
									<td class='table-icon'>Nitrit (LOD < 0.03)</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>3</center></td>
								</tr>
								<tr>
									<td >6</td>
									<td class='table-icon'>Nitrat</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>50</center></td>
								</tr>
								<tr>
									<td >7</td>
									<td class='table-icon'>Sianida</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.07</center></td>
								</tr>
								<tr>
									<td >8</td>
									<td class='table-icon'>Selenium</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>								
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.01</center></td>
								</tr>
								<tr>
									<td >9</td>
									<td class='table-icon'>Alumunium</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.2</center></td>
								</tr>
								<tr>
									<td >10</td>
									<td class='table-icon'>Besi (LOD < 0.02)</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.3</center></td>
								</tr>
								<tr>
									<td >11</td>
									<td class='table-icon'>Kesudahan</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>								
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>500</center></td>
								</tr>
								<tr>
									<td >12</td>
									<td class='table-icon'>Klorida</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>								
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>250</center></td>
								</tr>
								<tr>
									<td >13</td>
									<td class='table-icon'>Mangan (LOD < 0.20)</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>0.4</center></td>
								</tr>
								<tr>
									<td >14</td>
									<td class='table-icon'>PH</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>								
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>6.5-8.5</center></td>
								</tr>
								<tr>
									<td >15</td>
									<td class='table-icon'>Seng</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>										
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>3</center></td>
								</tr>
								<tr>
									<td >16</td>
									<td class='table-icon'>Sulfat (LOD < 5)</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>										
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>250</center></td>
								</tr>
								<tr>
									<td >17</td>
									<td class='table-icon'>Tembaga</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>2</center></td>
								</tr>
								<tr>
									<td >18</td>
									<td class='table-icon'>Sisa Klor</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>5</center></td>
								</tr>
								<tr>
									<td >19</td>
									<td class='table-icon'>Amonia</td>
									<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
									</td>
									<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
									<td><center>1.5</center></td>
						</tbody>
								</tr>
							<tr>
							<td><b>b.</b></td>
							<td colspan="5"><b>Kimia Organik</b></td>
							</tr>
						</thead>
						<tbody>
							<td ></td>
							<td class='table-icon'>Zat Organic (KMn04)</td>
							<td>
									<center>
									<select name="metode[]" id="metode" >
									<option value="0"></option>
									<option value="1">SNI-01-3554-2006 butiri 2.2</option>
									<option value="2">SNI 01-3554-2006 Tirimetri</option>
									<option value="3">SNI 01-3554-2006 Potensiometri</option>
									<option value="4">SNI 06-6989-12-2004 Titrimetri</option>
									<option value="5">IKU/KA 01 Spektrofotometri</option>
									<option value="6">IKU/KA 02 Spektrofotometri</option>
									<option value="7">IKU/KA 04 Spektrofotometri</option>
									<option value="8">IKU/KA 05 Spektrofotometri</option>
									<option value="9">IKU/KA 06 Colorimetri</option>
									<option value="10">IKU/KA 07 Potensiometri</option>
									<option value="11">IKU/KA 08 Turbidimetri</option>
									<option value="12">IKU/KA 09 Potensiometri</option>
									</select>									
									</center>
							</td>
							<td class='table-date'>mg/1</td>
									<td><input type="text" name="hasil[]" id="hasil" class="span12" /></td>
							<td><center>10</center></td>
						</tbody>
					</table>
				</div>
                                                
							<label style="color:red; padding-left:1%;margin-left:1%;">(*) Sesuai Permenkes No. 492/Men.Kes/PER/IV/2010</label>
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
								<input type="text" name="DIBUAT_OLEH" id="pemohon" class="span3"/>
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
								<input type="text"  name="DISETUJUI_OLEH" id="penerima" class="span3"/>
								
								<input type="text" style="margin-left:17%;" name="TANGGAL" id="tgl" placeholder="dd/mm/yyyy" class="span2 datepick " />							
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%;margin-left:-4.5%;" type="button" id="simpan" onclick="click_submit()" class="button button-basic-blue">Simpan</button>
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

						



