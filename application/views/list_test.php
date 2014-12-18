<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	
	function nostiker_1(event) {
		if (event.keyCode == 13) {
			var vNoStiker = $ID('NoStiker_1').value;
			//$ID('NoStiker').value = vNoStiker.substring(5,11);
			// alert(vNoStiker.substring(5,11));
			reload1($ID('NoStiker_1').value);
		}
	}
	function reload1(value) {
//		$('#simpan').show();
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/list_bm01/nostiker/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
                try{
				var vnamaart = document.S_bm1form1.Nama_1;
				var vumurart = document.S_bm1form1.Umr_1;
				var vjk = document.S_bm1form1.JK_1;
				}catch(e){
                
                var vnamaart = document.A_bm1form.Nama_1;
				var vumurart = document.A_bm1form.Umr_1;
				var vjk = document.A_bm1form.JK_1;
				}
				vnamaart.value = rows[0].nama_ART;
				vumurart.value = rows[0].umurART;
				vjk.value = rows[0].JK;
			}
		});
	} 
	
	
	function del_stiker(bm_01_id) {
		if (confirm('Apa anda yakin akan menghapus data stiker ini? ')) {
			goto('list_bm01/del_stiker/' + bm_01_id);
		}
	}
	
	function del_sampel(bm_01_id) {
		if (confirm('Apa anda yakin akan menghapus data sampel ini? ')) {
			goto('list_bm01/del_sampel/' + bm_01_id);
		}
	}
	
	function editstiker_link_action(data_bm01_id) {  
		
		var objTR = $('#bm01_'+data_bm01_id).get(0);
//		 alert(objTR);
		$('#dialog input[name="NoStiker_1"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="Nama_1"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="data_bm01_id"]').val( $('#bm01_'+data_bm01_id+ ' input[name="data_bm01_id"]').val() );	
		$('#dialog input[name="Umr_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Umr1"]').val() );	
		$('#dialog input[name="JK_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="JK1"]').val() );
		combobox_select($('#dialog select[name="Urin_1"]'), $('#bm01_'+data_bm01_id+ ' input[name="Urin1"]').val());
		$('#dialog input[name="Tgl1_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl11"]').val() );
		combobox_select($('#dialog select[name="Darah_1"]'), $('#bm01_'+data_bm01_id+ ' input[name="Darah1"]').val());
		$('#dialog input[name="Tgl2_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl21"]').val() );
	} 
    
	function edit_link_action(data_bm01_id) {  
		
		var objTR = $('#bm01_'+data_bm01_id).get(0);
//		 alert(objTR);
		$('#dialog2 input[name="SamGaram2"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog2 input[name="TglKumpul"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog2 input[name="bm_01_id"]').val( $('#bm01_'+data_bm01_id+ ' input[name="bm_01_id"]').val() );
		$('#dialog2 input[name="Prov"]').val( $('#bm01_'+data_bm01_id+ ' input[name="propinsi_id"]').val() );
		$('#dialog2 input[name="Kota"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kabupaten_id"]').val() );
		$('#dialog2 input[name="Kec"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kecamatan_id"]').val() );  
		$('#dialog2 input[name="Desa"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kelurahan_id"]').val() );
		$('#dialog2 input[name="DK"]').val( $('#bm01_'+data_bm01_id+ ' input[name="DK"]').val() );
		$('#dialog2 input[name="KodeSampel"]').val( $('#bm01_'+data_bm01_id+ ' input[name="kode_sampel"]').val() );
		$('#dialog2 input[name="NoSensus"]').val( $('#bm01_'+data_bm01_id+ ' input[name="no_bangun_sensus"]').val() );
		$('#dialog2 input[name="NoUrut"]').val( $('#bm01_'+data_bm01_id+ ' input[name="no_urut_sampel"]').val() );
		$('#dialog2 input[name="Alamat"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Alamat"]').val() );
		$('#dialog2 input[name="LabLap"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Lab_lap"]').val() );
		$('#dialog2 input[name="JamKumpul"]').val( $('#bm01_'+data_bm01_id+ ' input[name="JamKummpul"]').val() );
		
		$('#dialog2 input[name="SamAir"]').val( $('#bm01_'+data_bm01_id+ ' input[name="SamAir"]').val() );
		$('#dialog2 input[name="Umr_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Umr1"]').val() );		
		$('#dialog2 input[name="NoStiker_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="NoStiker1"]').val() );
		$('#dialog2 input[name="JK_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="JK1"]').val() );
		$('#dialog2 input[name="Urin_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Urin1"]').val() );
		$('#dialog2 input[name="Tgl1_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl11"]').val() );
		$('#dialog2 input[name="Darah_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Darah1"]').val() );		
		$('#dialog2 input[name="Tgl2_1"]').val( $('#bm01_'+data_bm01_id+ ' input[name="Tgl21"]').val() );
		
		$('#dialog2 input[name="SuhuDatang"]').val( $('#bm01_'+data_bm01_id+ ' input[name="SuDat"]').val() );
		$('#dialog2 input[name="TglNakes"]').val( $('#bm01_'+data_bm01_id+ ' input[name="tgl_nakes"]').val() );
		$('#dialog2 input[name="NmNakes"]').val( $('#bm01_'+data_bm01_id+ ' input[name="nama_nakes"]').val() );
		combobox_select($('#dialog2 select[name="HarKumpul"]'), $('#bm01_'+data_bm01_id+ ' input[name="HarKumpul"]').val());
	} 
	
	
	function add_link_action(data_bm01_id) {  
		
		var objTR = $('#bm01_'+data_bm01_id).get(0);
//		 alert(objTR);
		$('#dialog3 input[name="bm01_id"]').val( $('#bm01_'+data_bm01_id+ ' input[name="bm_01_id"]').val() );	
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 900,
			height: 240,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function( data_bm01_id ) {			
			$( "#dialog" ).dialog( "open" );
			
//			 alert(data_bm01_id);
//			alert(obj.attr('data_bm01'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			editstiker_link_action(data_bm01_id);
		}
		//);
	});
	
	$(function() {
		$( "#dialog3" ).dialog({
			autoOpen: false,
			width: 900,
			height: 240,
		});

		//$( "#dialog-link" ).click(
		document.dialog3_click = function( data_bm01_id ) {			
			$( "#dialog3" ).dialog( "open" );
			
//			 alert(data_bm01_id);
//			alert(obj.attr('data_bm01'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			add_link_action(data_bm01_id);
		}
		//);
	});
	
	$(function() {
		
		$( "#dialog2" ).dialog({
			autoOpen: false,
			width: 900,
			height: 500,
		});

		//$( "#dialog-link" ).click(
		document.dialog2_click = function( data_bm01_id ) {			
			$( "#dialog2" ).dialog( "open" );
			
			// alert(data_bm01_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(data_bm01_id);
		}
	}
	)
	
	
	function A_addabm01_submit() {

		/*var vkota = document.S_bm1form1.Nama_1;
		var vkec = document.S_bm1form1.Umr_1;
		var vdesa = document.S_bm1form1.NoStiker_1;
		var vdk = document.S_bm1form1.JK_1;
		var vkodesampel = document.S_bm1form1.Urin_1;
		var vNoSensus = document.S_bm1form1.Tgl1_1;
		var vnourut = document.S_bm1form1.Darah_1;
		var vtglambildarah = document.S_bm1form1.Tgl2_1;
		
		if(vkota.value=='' ){
			alert("Kota/Kabupaten harus diisi (Harus 2 Chars).");
			vkota.focus();
			return false;
		}
		else if(vkec.value=='' ){
			alert("Kecamatan harus diisi (Harus 3 Chars).");
			vkec.focus();
			return false;
		}
		else if(vdesa.value=='' ){
			alert("Desa/Kelurahan harus diisi (Harus 3 Chars).");
			vdesa.focus();
			return false;
		}
		else if(vdk.value=='' ){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vkodesampel.value=='' ){
			alert("Kode Sampel harus diisi (Harus 6 Chars).");
			vkodesampel.focus();
			return false;
		}
		else if(vNoSensus.value=='' ){
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
			vNoSensus.focus();
			return false;
		}
		else if(vnourut.value=='' ){
			alert("No Urut Sampel harus diisi (Harus 2 Chars).");
			vnourut.focus();
			return false;
		}
		else {*/
		
		$ID('frm99').submit();
		// return true;
		/*}*/
	}
	
	function S_addabm01_submit() {

		var vkota = document.S_bm1form1.Nama_1;
		var vkec = document.S_bm1form1.Umr_1;
		var vdesa = document.S_bm1form1.NoStiker_1;
		var vdk = document.S_bm1form1.JK_1;
		var vkodesampel = document.S_bm1form1.Urin_1;
		var vNoSensus = document.S_bm1form1.Tgl1_1;
		var vnourut = document.S_bm1form1.Darah_1;
		var vtglambildarah = document.S_bm1form1.Tgl2_1;
		
		if(vkota.value=='' ){
			alert("Kota/Kabupaten harus diisi (Harus 2 Chars).");
			vkota.focus();
			return false;
		}
		else if(vkec.value=='' ){
			alert("Kecamatan harus diisi (Harus 3 Chars).");
			vkec.focus();
			return false;
		}
		else if(vdesa.value=='' ){
			alert("Desa/Kelurahan harus diisi (Harus 3 Chars).");
			vdesa.focus();
			return false;
		}
		else if(vdk.value=='' ){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vkodesampel.value=='' ){
			alert("Kode Sampel harus diisi (Harus 6 Chars).");
			vkodesampel.focus();
			return false;
		}
		else if(vNoSensus.value=='' ){
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
			vNoSensus.focus();
			return false;
		}
		else if(vnourut.value=='' ){
			alert("No Urut Sampel harus diisi (Harus 2 Chars).");
			vnourut.focus();
			return false;
		}
		else {
		
		$ID('frm1000').submit();
		// return true;
		}
	}
	
	function addabm01_submit2() {

		var vprov = document.E_bm1form.Prov;
		var vkota = document.E_bm1form.Kota;
		var vkec = document.E_bm1form.Kec;
		var vdesa = document.E_bm1form.Desa;
		var vdk = document.E_bm1form.DK;
		var vkodesampel = document.E_bm1form.KodeSampel;
		var vNoSensus = document.E_bm1form.NoSensus;
		var vnourut = document.E_bm1form.NoUrut;
		var vtglambildarah = document.E_bm1form.TglKumpul;
		var valamat = document.E_bm1form.Alamat;
		var vnamalab = document.E_bm1form.LabLap;
		var vtglnakes = document.E_bm1form.TglNakes;
		var vnamanakespendamping = document.E_bm1form.NmNakes;
		
		if(vprov.value=='' || !(vprov.value.length==2) ){
			alert("Propinsi harus diisi (Harus 2 Chars).");
			vprov.focus();
			return false;
		}
		else if(vkota.value=='' || !(vkota.value.length==2) ){
			alert("Kota/Kabupaten harus diisi (Harus 2 Chars).");
			vkota.focus();
			return false;
		}
		else if(vkec.value=='' || !(vkec.value.length==3 )){
			alert("Kecamatan harus diisi (Harus 3 Chars).");
			vkec.focus();
			return false;
		}
		else if(vdesa.value=='' || !(vdesa.value.length==3 )){
			alert("Desa/Kelurahan harus diisi (Harus 3 Chars).");
			vdesa.focus();
			return false;
		}
		else if(vdk.value=='' || !(vdk.value=='1' || vdk.value=='2')){
			alert("D/K harus diisi (Harus 1 Chars (1 atau 2)).");
			vdk.focus();
			return false;
		}
		else if(vkodesampel.value=='' || !(vkodesampel.value.length==7 )){
			alert("Kode Sampel harus diisi (Harus 6 Chars).");
			vkodesampel.focus();
			return false;
		}
		else if(vNoSensus.value=='' || !(vNoSensus.value.length==3 )){
			alert("Kode Sampel harus diisi (Harus 3 Chars).");
			vNoSensus.focus();
			return false;
		}
		else if(vnourut.value=='' || !(vnourut.value.length==2 )){
			alert("No Urut Sampel harus diisi (Harus 2 Chars).");
			vnourut.focus();
			return false;
		}
		else if(valamat.value==''){
			alert("Alamat harus diisi.");
			valamat.focus();
			return false;
		}
		else if(vtglambildarah.value==''){
			alert("Tanggal pengambilan darah harus diisi.");
			vtglambildarah.focus();
			return false;
		}
		else if(vnamalab.value==''){
			alert("Nama Lab. harus diisi.");
			vnamalab.focus();
			return false;
		}
		else if(vtglnakes.value==''){
			alert("Tanggal nakes pendamping harus diisi.");
			vtglnakes.focus();
			return false;
		}
		else if(vnamanakespendamping.value==''){
			alert("Nama nakes pendamping harus diisi.");
			vnamanakespendamping.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addbm02) && $status_addbm02 == 1) { ?>
	jQuery(document).ready(function(){
		alert('Update data berhasil');
	});
	<?php } ?>
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> List Data BM01</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form List Data BM.01</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Data BM.01</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
				<form method="POST" class='form-horizontal'>
									<label><span>Search:</span><input name="search" id="search" rel="tooltip" title="Search dengan Nomor Stiker." type="text" placeholder="Search here" /></label>
				</form>
						</div>
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong><?php echo $laman_row_awal."-".$laman_row_akhir ?></strong> of <strong><?php echo $laman_jumlah ?></strong></span>
								</div>
								<div class="btn-group">
									<a href="#" onclick="goto('list_bm01/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_bm01/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_bm01/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_bm01/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_bm01/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
								</div>
							</div>
						</div>
					</div>
					<!--<table class="table table-nomargin table-bordered dataTable table-striped table-hover">-->
                                        <?=$table_bm01;?>
					<table class="table table-nomargin table-bordered table-pagination">
						<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="10%">Sampel Garam</th>
								<th width="10%">No Stiker</th>
								<th width="25%">Nama ART</th>
								<th width="14%">Tgl Pengumpulan Darah</th>
								<th width="11%"><center>Action Stiker</center></th>
								<th width="11%"><center>Action Sampel</center></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no = 1;
								foreach($arr_bm01 as $value):
							?>
								<tr id='bm01_<?php echo $value['data_bm01_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="bm_01_id" value="<?php echo $value['bm_01_id']; ?>" />
										<input type="hidden" name="data_bm01_id" value="<?php echo $value['data_bm01_id']; ?>" />
										<input type="hidden" name="propinsi_id" value="<?php echo $value['propinsi_id']; ?>" />
										<input type="hidden" name="kabupaten_id" value="<?php echo $value['kabupaten_id']; ?>" />
										<input type="hidden" name="kecamatan_id" value="<?php echo $value['kecamatan_id']; ?>" />
										<input type="hidden" name="kelurahan_id" value="<?php echo $value['kelurahan_id']; ?>" />
										<input type="hidden" name="DK" value="<?php echo $value['DK']; ?>" />
										<input type="hidden" name="kode_sampel" value="<?php echo $value['kode_sampel']; ?>" />
										<input type="hidden" name="no_bangun_sensus" value="<?php echo $value['no_bangun_sensus']; ?>" />
										<input type="hidden" name="no_urut_sampel" value="<?php echo $value['no_urut_sampel']; ?>" />
										<input type="hidden" name="TglKumpul" value="<?php echo $value['tgl_kumpul']; ?>" />
										<input type="hidden" name="HarKumpul" value="<?php echo $value['hari_kumpul']; ?>" />
										<input type="hidden" name="JamKummpul" value="<?php echo $value['jam_kumpul']; ?>" />
										<input type="hidden" name="Lab_lap" value="<?php echo $value['Lab_lap']; ?>" />
										
										<input type="hidden" name="SamAir" value="<?php echo $value['SamAir']; ?>" />
										
										<input type="hidden" name="Umr1" value="<?php echo $value['UmurART']; ?>" />
										
										<input type="hidden" name="Alamat" value="<?php echo $value['alamat']; ?>" />
										
										<input type="hidden" name="JK1" value="<?php echo $value['JK']; ?>" />
										
										<input type="hidden" name="Urin1" value="<?php echo $value['Urin']; ?>" />
										
										<input type="hidden" name="Tgl11" value="<?php echo $value['TglUrin']; ?>" />
										
										<input type="hidden" name="Darah1" value="<?php echo $value['Darah']; ?>" />

										<input type="hidden" name="Tgl21" value="<?php echo $value['TglDarah']; ?>" />
										
										
										<input type="hidden" name="SuDat" value="<?php echo $value['SuhuDatang']; ?>" />
										<input type="hidden" name="tgl_nakes" value="<?php echo $value['tgl_nakes']; ?>" />
										<input type="hidden" name="nama_nakes" value="<?php echo $value['nama_nakes']; ?>" />
									</td>
									<td class='table-icon'>
										<?php echo $value['SamGaram']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['NoStiker']; ?>
									</td>
									<td>
										<?php echo $value['NamaART']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['tgl_kumpul']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 ))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['data_bm01_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" bm01=\"{$value['data_bm01_id']}\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<?php
												if (!($level == 3))
												echo"
												<a href=\"#\" onclick=\"document.dialog_click('{$value['data_bm01_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit No Stiker\" bm01=\"{$value['data_bm01_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
												<a href=\"#\" onclick=\"del_stiker('{$value['data_bm01_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
											";
											?>
										</div>
									</center>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 ))
												echo "
											<a href=\"#\" onclick=\"document.dialog2_click('{$value['data_bm01_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" bm01=\"{$value['data_bm01_id']}\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
											<?php
												if (!($level == 3))
												echo"
												<a href=\"#\" onclick=\"document.dialog3_click('{$value['data_bm01_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Add No Stiker\" bm01=\"{$value['data_bm01_id']}\"><i class=\"icon-eye-open\"></i></a>
												<a href=\"#\" onclick=\"document.dialog2_click('{$value['data_bm01_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit Sampel Garam\" bm01=\"{$value['data_bm01_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
												<a href=\"#\" onclick=\"delete_link('{$value['data_bm01_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
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
							<a href=\"#\" onclick=\"goto('formbm01/')\" class=\"button button-basic\">Tambah Data</a>
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
									<a href="#" onclick="goto('list_bm01/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_bm01/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_bm01/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_bm01/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_bm01/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
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
<div id=\"dialog\" title=\"Form Edit BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm1000" name="S_bm1form1" class='form-horizontal'>
			<input type='hidden' name="data_bm01_id" />
			<!--<input type='hidden' name="data_bm_01_id" />-->
						<input type="hidden" name="status_addbm01" value="0">
						<div class="control-group">
								<label style="width:2%;text-align:left;" for="Prov" class="help-block control-label">
									No.
								</label>
								<label style="width:18%;margin-left:2%;text-align:left;" for="Kota" class="help-block control-label">
									Nama ART
								</label>
								<label style="width:4%;margin-left:2%;text-align:left;" for="Kec" class="help-block control-label">
									Umur
								</label>
								<label style="width:8%;margin-left:2.5%;text-align:left;" for="Desa" class="help-block control-label">
									No Stiker
								</label>
								<label style="width:5%;margin-left:2%;text-align:left;" for="DK" class="help-block control-label">
									JK
								</label>
								<label style="width:10%;margin-left:2.5%;text-align:left;" for="KodeSampel" class="help-block control-label">
									Ambil Urin
								</label>
								<label style="width:10%;margin-left:1.5%;text-align:left;" for="NoSensus" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Ambil Darah
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
						</div>
						
						<div class="control-group" >
							<input readonly="" style="width: 1.5%; text-align: left;" type="text" name="data_bm01_id" id="data_bm01_id" maxlength="2" class="span1" />
							<input readonly="" style="width: 15.5%; margin-left: 0.5%" type="text" name="Nama_1" id="Nama_1" maxlength="2" class="span1" />
							<input readonly="" style="width: 2.5%; margin-left: 2%" type="text" name="Umr_1" id="Umr_1" maxlength="3" class="span1" />
							<input style="width: 6%; margin-left: 2%" type="text" name="NoStiker_1" id="NoStiker_1" maxlength="6" class="span1" onkeyup="nostiker_1(event)" />
							<input readonly="" style="width: 3%; margin-left: 1%" type="text" name="JK_1" id="JK_1" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_1" id="Urin_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 9%; margin-left: 2%" type="text" name="Tgl1_1" id="Tgl1_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 0.5%" name="Darah_1" id="Darah_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 1.5%" type="text" name="Tgl2_1" id="Tgl2_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"S_addabm01_submit()\" class=\"button button-basic-blue\">Simpan</button>
					";
				?>
			</div>
		</form>
	</div>
</div>





<!-- ui-dialog -->
<?php
	if (!($level == 3))
	echo"
<div id=\"dialog2\" title=\"Form Edit BM01 [Sampel Garam]\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog2\" title=\"Form View BM01 [Sampel Garam]\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm2" name="E_bm1form" class='form-horizontal'>
			<input type='hidden' name="bm_01_id" />
			<input type="hidden" name="status_addbm01" value="2">
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
					<label style="width:3%;margin-left:5%;text-align:left;" for="DK" class="help-block control-label">
						D/K
					</label>
					<label style="width:15%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
						No. Kode Sampel
					</label>
					<label style="width:15%;margin-left:2%;text-align:left;" for="NoSensus" class="help-block control-label">
						No. Sensus
					</label>
					<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width: 3%;" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
					<input style="width: 3%;" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
					<input style="width: 4%;margin-left: 3%" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
					<input style="width: 4%;margin-left: 3%" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
					<input style="width: 2%;margin-left: 3%" type="text" name="DK" id="DK" maxlength="1" class="span1" />
					<input style="width: 8%;" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
					<input style="width: 10%;margin-left: 7%" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
					<input style="width: 3%; margin-left:5%;" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
				</div>
			</div>
			<div class="control-group">
				<label for="Alamat" class="control-label">Alamat Lengkap</label>
				<div class="controls controls-row">
					<input type="text" name="Alamat" id="Alamat" class="span7" />
			
				</div>
			</div>
			<!--<div class="control-group">
					<label for="NamaART" class="control-label">Nama ART</label>
				<div class="controls controls-row">
					<input readonly="" type="text" name="NamaART" id="NamaART" class="span5"/>
			
				</div>
			</div>-->
			<div class="control-group">
					<label for="TglKumpul" class="control-label">Pengambilan Darah</label>
				<div class="controls controls-row">
					<input style="width: 15%;" type="text" name="TglKumpul" id="TglKumpul" class="span2 datepick"/>
					
					<select style="width: 25%;" name="HarKumpul" id="HarKumpul" class='span3'>
						<option> - Silakan Pilih Hari - </option>
						<option value="1">Senin</option>
						<option value="2">Selasa</option>
						<option value="3">Rabu</option>
						<option value="4">Kamis</option>
						<option value="5">Jumat</option>
						<option value="6">Sabtu</option>
						<option value="7">Minggu</option>
					</select>
					
					<label for="JamKumpul" class="control-label">Jam</label>
					<input style="margin-left: 2.5641%;" type="text" name="JamKumpul" id="JamKumpul" class="span1 mask_wkt"/>
				</div>
			</div>
			<div class="control-group">
					<label for="LabLap" class="control-label">Lab. Lapangan</label>
				<div class="controls controls-row">
					<input style="" type="text" name="LabLap" id="LabLap" class="span5" />
					
			
				</div>
			</div>
	
			<!--div id="container" >
			</div>
			<div class="control-group">
                <input type="button" name="add_btn" value="Add" id="add_btn">
			</div-->
			<div class="control-group">
				<label for="SamGaram2" class="control-label">Sampel Garam</label>
				<div class="controls controls-row">
					<input type="text" name="SamGaram2" id="SamGaram2" class="span2" />
					<!--<input type="text" name="SamGaram" id="SamGaram" class="span2" data-placement="right" rel="tooltip" title="Masukkan No NKS, kemudian ENTER." />-->
			
				</div>
			</div>
			<div class="control-group">
				<label for="SamAir" class="control-label">Sampel Air</label>
				<div class="controls controls-row">
					<input type="text" name="SamAir" id="SamAir" class="span2" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="SuhuDatang" class="control-label">Suhu Datang</label>
				<div class="controls controls-row">
					<input type="text" name="SuhuDatang" id="SuhuDatang" class="span2" />
			
				</div>
			</div>
			<hr/>
			<div class="control-group">
				<div class="controls controls-row">
					<label style="text-align:left;" for="TglNakes" class="help-block control-label">
						TGL Nakes
					</label>
					<!--<label style="width:20%;text-align:left;" for="TGLEnumerator" class="help-block control-label">
						TGL Enumerator
					</label>-->
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<!--<input type="text" name="TGLEnumerator" id="TGLEnumerator" placeholder="dd/mm/yyyy" class="span2 datepick" />-->
					<input style="" type="text" name="TglNakes" id="TglNakes" placeholder="dd/mm/yyyy" class="span2 datepick" />
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<label style="text-align:left;width: 25%" for="NmNakes" class="help-block control-label">
						Nama Enumelator
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
				
					<input type="text" name="NmNakes" id="NmNakes" class="span3"/>
				</div>
			</div>
			<!--div class="form-actions">
				<button style="padding-left:1%" type="button" id="simpan" onclick="addabm01_submit()" class="button button-basic-blue">Simpan</button-->
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			<!--/div-->
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"addabm01_submit2()\" class=\"button button-basic-blue\">Simpan</button>
					";
				?>
			</div>
		</form>
	</div>
</div>




<!-- ui-dialog -->
<?php
	if (!($level == 3))
	echo"
<div id=\"dialog3\" title=\"Form Tambah No Stiker BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog3\" title=\"Form View BM01 [No Stiker]\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frm99" name="A_bm1form" class='form-horizontal'>
			<!--<input type='hidden' name="data_bm01_id" />-->
			<input type='hidden' name="bm01_id" />
						<input type="hidden" name="status_addbm01" value="3">
						<div class="control-group">
								<label style="width:2%;text-align:left;" for="Prov" class="help-block control-label">
									No.
								</label>
								<label style="width:18%;margin-left:2%;text-align:left;" for="Kota" class="help-block control-label">
									Nama ART
								</label>
								<label style="width:4%;margin-left:2%;text-align:left;" for="Kec" class="help-block control-label">
									Umur
								</label>
								<label style="width:8%;margin-left:2.5%;text-align:left;" for="Desa" class="help-block control-label">
									No Stiker
								</label>
								<label style="width:5%;margin-left:2%;text-align:left;" for="DK" class="help-block control-label">
									JK
								</label>
								<label style="width:10%;margin-left:2.5%;text-align:left;" for="KodeSampel" class="help-block control-label">
									Ambil Urin
								</label>
								<label style="width:10%;margin-left:1.5%;text-align:left;" for="NoSensus" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Ambil Darah
								</label>
								<label style="width:10%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
									Tgl/Bln/Thn
								</label>
						</div>
						
						<div class="control-group" >
							<input readonly="" style="width: 1.5%; text-align: left;" type="text" name="data_bm01_id" id="data_bm01_id" maxlength="2" class="span1" />
							<input readonly="" style="width: 15.5%; margin-left: 0.5%" type="text" name="Nama_1" id="Nama_1" maxlength="2" class="span1" />
							<input readonly="" style="width: 2.5%; margin-left: 2%" type="text" name="Umr_1" id="Umr_1" maxlength="3" class="span1" />
							<input style="width: 6%; margin-left: 2%" type="text" name="NoStiker_1" id="NoStiker_1" maxlength="6" class="span1" onkeyup="nostiker_1(event)" />
							<input readonly="" style="width: 3%; margin-left: 1%" type="text" name="JK_1" id="JK_1" maxlength="1" class="span1" />
							<select style="width: 10%; margin-left: 2%" name="Urin_1" id="Urin_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 9%; margin-left: 2%" type="text" name="Tgl1_1" id="Tgl1_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							<select style="width: 10%; margin-left: 0.5%" name="Darah_1" id="Darah_1" class="span2"><option> - Pilih - </option><option value="1">Ya</option><option value="2">Tidak</option></select>
							<input style="width: 10%; margin-left: 1.5%" type="text" name="Tgl2_1" id="Tgl2_1" placeholder="dd/mm/yyyy" class="span1 datepick" />
							
						</div>
			<div class="form-actions">
				<?php
					if (!($level == 3))
					echo"
					<button style=\"padding-left:1%\" type=\"button\" onclick=\"A_addabm01_submit()\" class=\"button button-basic-blue\">Simpan</button>
					";
				?>
			</div>
		</form>
	</div>
</div>

