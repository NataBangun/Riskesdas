<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function delete_link(formmalaria_id) {
		if (confirm('Anda yakin akan menghapus data ini? ')) {
			goto('list_malaria/del/' + formmalaria_id);
		}
	}
	
	function edit_link_action(formmalaria_id) {  
		
		var objTR = $('#formmalaria_'+formmalaria_id).get(0);
		// alert(objTR);
		$('#dialog input[name="NoStiker"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="Alamat"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="TGLPemeriksa"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog input[name="formmalaria_id"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="formmalaria_id"]').val() );
		$('#dialog input[name="Prov"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="propinsi_id"]').val() );
		$('#dialog input[name="Kota"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialog input[name="Kec"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialog input[name="Desa"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialog input[name="DK"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="DK"]').val() );
		$('#dialog input[name="KodeSampel"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="kode_sampel"]').val() );
		$('#dialog input[name="NoSensus"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialog input[name="NoUrut"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialog input[name="Umur"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="Umur"]').val() );
		combobox_select($('#dialog select[name="JK"]'), $('#formmalaria_'+formmalaria_id+ ' input[name="JK"]').val());
		// $('#dialog input[name="JK"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="JK"]').val() );
		combobox_select($('#dialog select[name="PN1"]'), $('#formmalaria_'+formmalaria_id+ ' input[name="pn_pbtdk"]').val());
		combobox_select($('#dialog select[name="PN2"]'), $('#formmalaria_'+formmalaria_id+ ' input[name="pn_loka"]').val());
		// $('#dialog input[name="Tanya1"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="tanya1"]').val() );
		$('#dialog input[name="SpesiesPBTDK"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="spesies_pbtdk"]').val() );
		$('#dialog input[name="SpesiesLoka"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="spesies_loka"]').val() );
		$('#dialog input[name="Par"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="par_pbtdk"]').val() );
		$('#dialog input[name="Lemkos"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="lemkos_pbtdk"]').val() );
		$('#dialog input[name="Densitas"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="densitas_pbtdk"]').val() );
		$('#dialog input[name="Pemeriksa"]').val( $('#formmalaria_'+formmalaria_id+ ' input[name="pemeriksa"]').val() );
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 990,
			height: 500,
			// buttons: [
				// {
					// text: "Update",
					// onclick: function(addaformmalaria_submit) {
						// // (addaformmalaria_submit);
						// alert('hi');
						// // $( this ).dialog( "close" );
					// }
				// },
				// {
					// text: "Batal",
					// click: function() {
						// $( this ).dialog( "close" );
					// }
				// }
			// ]
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( formmalaria_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(formmalaria_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(formmalaria_id);
		}
		//);
	});
	
	function addaformmalaria_submit() {

		var vprov = document.malariaform.Prov;
		var vkota = document.malariaform.Kota;
		var vkec = document.malariaform.Kec;
		var vdesa = document.malariaform.Desa;
		var vdk = document.malariaform.DK;
		var vkodesampel = document.malariaform.KodeSampel;
		var vNoSensus = document.malariaform.NoSensus;
		var vnourut = document.malariaform.NoUrut;		
		var vnamaart = document.malariaform.NamaART;
		var vumur = document.malariaform.umur;
		var vjk = document.malariaform.JK;
		
		var vnostiker = document.malariaform.NoStiker;
		var vTGLPemeriksa = document.malariaform.TGLPemeriksa;
		var vPN1 = document.malariaform.PN1;
		var vPN2 = document.malariaform.PN2;
		var vSpesiesPBTDK = document.malariaform.SpesiesPBTDK;
		var vSpesiesLoka = document.malariaform.SpesiesLoka;
		var vPar = document.malariaform.Par;
		var vLemkos = document.malariaform.Lemkos;
		var vDensitas = document.malariaform.Densitas;
		var vPemeriksa = document.malariaform.Pemeriksa;
		
		
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
		else if(vSpesiesPBTDK.value==''){
			alert("Spesies Huruf (PBTDK), harus diisi.");
			vSpesiesPBTDK.focus();
			return false;
		}
		else if(vSpesiesLoka.value==''){
			alert("Spesies Huruf (Loka), harus diisi.");
			vSpesiesLoka.focus();
			return false;
		}
		else if(vPar.value==''|| !(vPar.value.length==5 )){
			alert("Par Num 5 (harus diisi 5 Chars).");
			vPar.focus();
			return false;
		}
		else if(vLemkos.value==''|| !(vLemkos.value.length==5 )){
			alert("Lemkos Num 5 (harus diisi 5 Chars).");
			vLemkos.focus();
			return false;
		}
		else if(vDensitas.value==''|| !(vDensitas.value.length==10 )){
			alert("Densitas Num (harus diisi 10 Chars).");
			vDensitas.focus();
			return false;
		}
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
	
	<?php if (isset($status_upmalaria) && $status_upmalaria == 1) { ?>
	jQuery(document).ready(function(){
		alert('Edit data berhasil');
	});
	<?php } ?>	
	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> List Data Malaria</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="#">List</a><span class="divider">/</span></li>			
			<li class='active'>Form List Malaria</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Malaria</span>
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
									<a href="#" onclick="goto('list_malaria/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_malaria/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_malaria/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_malaria/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_malaria/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
								<th width="18%" class='table-date'>Tgl Periksa</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_malaria)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form MALARIA Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_malaria as $value):
							?>
								<tr id='formmalaria_<?php echo $value['formmalaria_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="formmalaria_id" value="<?php echo $value['formmalaria_id']; ?>" />
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
										<input type="hidden" name="pn_loka" value="<?php echo $value['pn_loka']; ?>" />
										<input type="hidden" name="spesies_loka" value="<?php echo $value['spesies_loka']; ?>" />
										<input type="hidden" name="pn_pbtdk" value="<?php echo $value['pn_pbtdk']; ?>" />
										<input type="hidden" name="pf" value="<?php echo $value['PF']; ?>" />
										<input type="hidden" name="pv" value="<?php echo $value['PV']; ?>" />
										<input type="hidden" name="po" value="<?php echo $value['PO']; ?>" />
										<input type="hidden" name="pm" value="<?php echo $value['PM']; ?>" />
										<input type="hidden" name="par_pf" value="<?php echo $value['par_PF']; ?>" />
										<input type="hidden" name="par_pv" value="<?php echo $value['par_PV']; ?>" />
										<input type="hidden" name="par_po" value="<?php echo $value['par_PO']; ?>" />
										<input type="hidden" name="par_pm" value="<?php echo $value['par_PM']; ?>" />
										<input type="hidden" name="lemkos_pf" value="<?php echo $value['lemkos_PF']; ?>" />
										<input type="hidden" name="lemkos_pv" value="<?php echo $value['lemkos_PV']; ?>" />
										<input type="hidden" name="lemkos_po" value="<?php echo $value['lemkos_PO']; ?>" />
										<input type="hidden" name="lemkos_pm" value="<?php echo $value['lemkos_PM']; ?>" />
										<input type="hidden" name="densitas_pf" value="<?php echo $value['densitas_PF']; ?>" />
										<input type="hidden" name="densitas_pv" value="<?php echo $value['densitas_PV']; ?>" />
										<input type="hidden" name="densitas_po" value="<?php echo $value['densitas_PO']; ?>" />
										<input type="hidden" name="densitas_pm" value="<?php echo $value['densitas_PM']; ?>" />
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
											<a href=\"#\" onclick=\"document.dialog_click('{$value['formmalaria_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<?php
												if (!($level == 3))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['formmalaria_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm04=\"{$value['formmalaria_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
											<a href=\"#\" onclick=\"delete_link('{$value['formmalaria_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
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
							<a href=\"#\" onclick=\"goto('formhasil_malaria/')\" class=\"button button-basic\">Tambah Data</a>
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
									<a href="#" onclick="goto('list_malaria/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_malaria/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_malaria/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_malaria/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_malaria/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
<div id=\"dialog\" title=\"Form Edit Malaria\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View Malaria\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm1" name="malariaform" class='form-horizontal'>
			<input type='hidden' name="formmalaria_id" />
			<input type="hidden" name="status_upmalaria" value="0">
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
					<label style="width:4%;margin-left:4%;text-align:left;" for="Desa" class="help-block control-label">
						Desa
					</label>
					<label style="width:3%;margin-left:5%;text-align:left;" for="DK" class="help-block control-label">
						D/K
					</label>
					<label style="width:16%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
						No. Kode Sampel
					</label>
					<label style="width:22%;margin-left:1%;text-align:left;" for="NoSensus" class="help-block control-label">
						No. Bangunan Sensus
					</label>
					<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width:3%;" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
					<input style="width:3%;margin-left:3%" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
					<input style="width:2%;margin-left:3%" type="text" name="DK" id="DK" maxlength="1" class="span1" />
					<input style="width:8%;margin-left:4%" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
					<input style="width:4%;margin-left:8%" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
					<input style="width:3%;margin-left:18%" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
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
				<label for="Alamat" class="control-label"><b><u>Parameret PBTDK</u></b></label>
				<div class="controls controls-row">
				<label style="width:18%" for="Alamat" class="control-label"><b><u>Hasil Pemeriksaan</u></b></label>
				<label style="margin-left:15%;width:18%" for="Alamat" class="control-label"><b><u>Parameret Loka</u></b></label>
				<label style="margin-left:2.5%;width:18%" for="Alamat" class="control-label"><b><u>Hasil Pemeriksaan</u></b></label>
			
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
				<label style="margin-left:29%;" for="SpesiesLoka" class="control-label">Spesies</label>
					<input style="margin-left:2.5%;" type="text" name="SpesiesLoka" id="SpesiesLoka" class="span1" maxlength="1" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="Par" class="control-label">Par</label>
				<div class="controls controls-row">
					<input type="text" name="Par" id="Par" class="span1" maxlength="5" />
				</div>
			</div>
			<div class="control-group">
				<label for="Lemkos" class="control-label">Lemkos</label>
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
			<?php
				if (!($level == 3))
				echo"
			<div class=\"form-actions\">
				<button style=\"padding-left:1%\" type=\"button\" onclick=\"addaformmalaria_submit()\" class=\"button button-basic-blue\">Update</button>
			</div>
				";
			?>
		</form>
	</div>
</div>