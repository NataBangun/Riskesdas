<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function delete_link(formhasil_id) {
		if (confirm('Anda yakin akan menghapus data ini? ')) {
			goto('list_kimiaklinis/del/' + formhasil_id);
		}
	}
	
	function edit_link_action(formhasil_id) {  
		
		var objTR = $('#formhasil_'+formhasil_id).get(0);
		// alert(objTR);
		$('#dialog input[name="NoStiker"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="Alamat"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="TGLPemeriksa"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog input[name="formhasil_id"]').val( $('#formhasil_'+formhasil_id+ ' input[name="formhasil_id"]').val() );
		$('#dialog input[name="Prov"]').val( $('#formhasil_'+formhasil_id+ ' input[name="propinsi_id"]').val() );
		$('#dialog input[name="Kota"]').val( $('#formhasil_'+formhasil_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialog input[name="Kec"]').val( $('#formhasil_'+formhasil_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialog input[name="Desa"]').val( $('#formhasil_'+formhasil_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialog input[name="DK"]').val( $('#formhasil_'+formhasil_id+ ' input[name="DK"]').val() );
		$('#dialog input[name="KodeSampel"]').val( $('#formhasil_'+formhasil_id+ ' input[name="kode_sampel"]').val() );
		$('#dialog input[name="NoSensus"]').val( $('#formhasil_'+formhasil_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialog input[name="NoUrut"]').val( $('#formhasil_'+formhasil_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialog input[name="NoART"]').val( $('#formhasil_'+formhasil_id+ ' input[name="no_urutART"]').val() );
		$('#dialog input[name="Umur"]').val( $('#formhasil_'+formhasil_id+ ' input[name="Umur"]').val() );
		combobox_select($('#dialog select[name="JK"]'), $('#formhasil_'+formhasil_id+ ' input[name="JK"]').val());
		combobox_select($('#dialog select[name="Karakter"]'), $('#formhasil_'+formhasil_id+ ' input[name="karakter"]').val());
		$('#dialog input[name="TtlKolestrol"]').val( $('#formhasil_'+formhasil_id+ ' input[name="TtlKolestrol"]').val() );
		$('#dialog input[name="HDLKolestrol"]').val( $('#formhasil_'+formhasil_id+ ' input[name="HDLKolestrol"]').val() );
		$('#dialog input[name="LDLKolestrol"]').val( $('#formhasil_'+formhasil_id+ ' input[name="LDLKolestrol"]').val() );
		$('#dialog input[name="Trigliserida"]').val( $('#formhasil_'+formhasil_id+ ' input[name="Trigliserida"]').val() );
		$('#dialog input[name="Kreatinin"]').val( $('#formhasil_'+formhasil_id+ ' input[name="Kreatinin"]').val() );
		$('#dialog input[name="Pemeriksa"]').val( $('#formhasil_'+formhasil_id+ ' input[name="pemeriksa"]').val() );
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 990,
			height: 500,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( formhasil_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(formhasil_id);
			//alert(obj.attr('formhasil'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('formhasil'))
			edit_link_action(formhasil_id);
		}
		//);
	});
	
	function addaformhasil_submit() {

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
			alert("Riwayat penyakit berat harus diisi.");
			vriwayatsakit.focus();
			return false;
		}
		else if(vPemeriksa.value==''){
			alert("Pertanyaan : Apakah ART mengalami riwayat demam dalam 2 hari terakhir? (harus diisi).");
			vPemeriksa.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
		
	}
	
	<?php if (isset($status_addformhasil) && $status_addformhasil == 1) { ?>
	jQuery(document).ready(function(){
		alert('Edit data berhasil');
	});
	<?php } ?>	
	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> List Data Kimia Klinis</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="#">List</a><span class="divider">/</span></li>			
			<li class='active'>Form List Kimia Klinis</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Kimia Klinis</span>
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
									<a href="#" onclick="goto('list_kimiaklinis/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
								<th width="18%" class='table-date'>Tgl Pemeriksaan</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_kimiaklinis)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form KIMIA KLINIS Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_kimiaklinis as $value):
							?>
								<tr id='formhasil_<?php echo $value['formhasil_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="formhasil_id" value="<?php echo $value['formhasil_id']; ?>" />
										<input type="hidden" name="propinsi_id" value="<?php echo $value['propinsi_id']; ?>" />
										<input type="hidden" name="kabupaten_id" value="<?php echo $value['kabupaten_id']; ?>" />
										<input type="hidden" name="kecamatan_id" value="<?php echo $value['kecamatan_id']; ?>" />
										<input type="hidden" name="kelurahan_id" value="<?php echo $value['kelurahan_id']; ?>" />
										<input type="hidden" name="DK" value="<?php echo $value['DK']; ?>" />
										<input type="hidden" name="kode_sampel" value="<?php echo $value['kode_sampel']; ?>" />
										<input type="hidden" name="no_bangun_sensus" value="<?php echo $value['no_bangun_sensus']; ?>" />
										<input type="hidden" name="no_urut_sampel" value="<?php echo $value['no_urut_sampel']; ?>" />
										<input type="hidden" name="Umur" value="<?php echo $value['Umur']; ?>" />
										<input type="hidden" name="JK" value="<?php echo $value['JK']; ?>" />
										<input type="hidden" name="karakter" value="<?php echo $value['karakter']; ?>" />
										<input type="hidden" name="TtlKolestrol" value="<?php echo $value['TtlKolestrol']; ?>" />
										<input type="hidden" name="HDLKolestrol" value="<?php echo $value['HDLKolestrol']; ?>" />
										<input type="hidden" name="LDLKolestrol" value="<?php echo $value['LDLKolestrol']; ?>" />
										<input type="hidden" name="Trigliserida" value="<?php echo $value['Trigliserida']; ?>" />
										<input type="hidden" name="Kreatinin" value="<?php echo $value['Kreatinin']; ?>" />
										<input type="hidden" name="pemeriksa" value="<?php echo $value['pemeriksa']; ?>" />
									
									</td>
									<td class='table-icon' >
										<?php echo $value['no_stiker']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['NamaART']; ?>
									</td>
									<td>
										<?php echo $value['alamat']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['TGL_periksa']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 ))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['formhasil_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" ><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<a href="#" onclick="goto('preview/index/<?php echo $value['formhasil_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a>
											<?php
												if (!($level == 3))
												echo"
												<a href=\"#\" onclick=\"document.dialog_click('{$value['formhasil_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" formhasil=\"{$value['formhasil_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
												<a href=\"#\" onclick=\"delete_link('{$value['formhasil_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
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
							<div class=\"btn-group\">
								<a href=\"#\" onclick=\"goto('formhasil_kimiaklinis/')\" class=\"button button-basic\">Tambah Data</a>
							</div>
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
									<a href="#" onclick="goto('list_kimiaklinis/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_kimiaklinis/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
<div id=\"dialog\" title=\"Form Edit Kimia Klinis\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View Kimia Klinis\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm1" name="formhasil" class='form-horizontal'>
			<input type='hidden' name="formhasil_id" />
			<input type="hidden" name="status_addformhasil" value="0">
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
					<label style="width:3%;margin-left:5%;text-align:left;" for="Desa" class="help-block control-label">
						Desa
					</label>
					<label style="width:3%;margin-left:6%;text-align:left;" for="DK" class="help-block control-label">
						D/K
					</label>
					<label style="width:14%;margin-left:6%;text-align:left;" for="KodeSampel" class="help-block control-label">
						No. Kode Sampel
					</label>
					<label style="width:19%;margin-left:3%;text-align:left;" for="NoSensus" class="help-block control-label">
						No. Bangunan Sensus
					</label>
					<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width:3%;" type="text" name="Prov" id="Prov" placeholder="" class="span1" maxlength="2" />
					<input style="width:3%;margin-left:3%" type="text" name="Kota" id="Kota" placeholder="" class="span1" maxlength="2" />
					<input style="width:4%;margin-left:3%" type="text" name="Kec" id="Kec" placeholder="" class="span1" maxlength="3" />
					<input style="width:4%;margin-left:3%" type="text" name="Desa" id="Desa" placeholder="" class="span1" maxlength="3" />
					<input style="width:3%;" type="text" name="DK" id="DK" placeholder="" class="span1" maxlength="1" />
					<input style="width:8%;margin-left:4%"  type="text" name="KodeSampel" id="KodeSampel" placeholder="" class="span2" maxlength="7" />
					<input style="width:4%;margin-left:8%" type="text" name="NoSensus" id="NoSensus" placeholder="" class="span1" maxlength="3" />
					<input style="margin-left:15%" type="text" name="NoUrut" id="NoUrut" placeholder="" class="span1" maxlength="2" />
				</div>
			</div>
			<div class="control-group">
					<label for="NamaART" class="control-label">Nama</label>
				<div class="controls controls-row">
					<input type="text" name="NamaART" id="NamaART" placeholder="" class="span5" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="Umur" class="control-label">Umur</label>
				<div class="controls controls-row">
					<input type="text" name="Umur" id="Umur" placeholder="" class="span1" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="JK" class="control-label">Jenis Kelamin</label>
				<div class="controls controls-row">
					<select name="JK" id="JK" class='input-large'>
						<option> - Jenis Kalamin - </option>
						<option value="1">Pria</option>
						<option value="2">Wanita</option>
						<option value="8">Tidak Mengisi</option>
						<option value="9">Tidak Tahu</option>
					</select>
			
				</div>
			</div>
			<div class="control-group">
					<label for="NoStiker" class="control-label">Nomer Stiker</label>
				<div class="controls controls-row">
					<input type="text" name="NoStiker" id="NoStiker" placeholder="" class="span2" onkeyup="nostiker(event)"/>
			
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
					<input type="text" name="Alamat" id="Alamat" placeholder="" class="span7" />
			
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
					<label style="width:13%;text-align:left;" for="TtlKolestrol" class="help-block control-label">
						Kolestrol total
					</label>
					<label style="width:13%;margin-left:5%;text-align:left;" for="HDLKolestrol" class="help-block control-label">
						Kolestrol HDL
					</label>
					<label style="width:18%;margin-left:5%;text-align:left;" for="LDLKolestrol" class="help-block control-label">
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
					<input style="margin-left:9%;" type="text" name="HDLKolestrol" id="HDLKolestrol" placeholder="" class="span1" />
					<input style="margin-left:9%;" type="text" name="LDLKolestrol" id="LDLKolestrol" placeholder="" class="span1" />
					<input style="margin-left:15%;" type="text" name="Trigliserida" id="Trigliserida" placeholder="" class="span1" />
					<input style="margin-left:6%;" type="text" name="Kreatinin" id="Kreatinin" placeholder="" class="span1" />
				</div>
			</div>
			<div class="control-group">
					<label for="Pemeriksa" class="control-label">Pemeriksa</label>
				<div class="controls controls-row">
					<input type="text" name="Pemeriksa" id="Pemeriksa" placeholder="" class="span5"/>
			
				</div>
			</div>
			<?php
				if ($level == 1 || $level == 2 )
				echo"
			<div class=\"form-actions\">
				<button style=\"padding-left:1%\" type=\"button\" onclick=\"addaformhasil_submit()\" class=\"button button-basic-blue\">Update</button>
			</div>
				";
			?>
		</form>
	</div>
</div>