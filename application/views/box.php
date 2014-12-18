<script type="text/javascript">
	function ceknol(obj){
		if(obj.value<=9){
			return '0'+obj.value;
		}else{
			return obj.value;
		}
	}
	function kabupaten(){
		$.ajax({
			url:'<?php echo $application_path;?>/box/kabupaten/'+$ID('Prov').value,
			complete: function(res, status){
				//var kotak = res.responseText;
				document.getElementById('div_kab').innerHTML=res.responseText;
			}
		});
	}
	function nobox(){
		var vnopenelitian = document.box.NoPenelitian;
		var vprov = document.box.Prov;
		var vkab = $ID('Kab');
		var vtypebox = document.box.TypeBox;
		var vulangan =document.box.Ulangan;
		var vbox = document.box.NoBox;
		var vhbox = document.box.hNoBox;
		if(vnopenelitian.selectedIndex == 0){
			vnopenelitian.value = '';
		}
		if(vprov.selectedIndex == 0){
			vprov.value = '';
		}
		if(vkab.selectedIndex == 0){
			vkab.value = '';
		}
		if(vtypebox.selectedIndex == 0){
			vtypebox.value = '';
		}
		vbox.value=ceknol(vnopenelitian) + ceknol(vprov) + ceknol(vkab) + vtypebox.value + vulangan.value;  
		vhbox.value = vbox.value;
	}
	function addbox_submit() {
		var vnopenelitian = $ID('NoPenelitian');
		var vprov = $ID('Prov');
		var vkab = $ID('Kab');
		var vjenis = $ID('TypeBox');
		var vulangan = $ID('Ulangan');
		var cekkode;
		// var v = document.bm2form.;
		// var v = document.bm2form.;
		if(vnopenelitian.value=='' || vnopenelitian.selectedIndex==0 ){
			alert("Jenis penelitian harus di pilih.");
			vnopenelitian.focus();
			return false;
		}
		else if(vprov.value=='' || vprov.selectedIndex==0 ){
			alert("Provinsi harus di pilih.");
			vprov.focus();
			return false;
		}
		else if(vkab.value=='' || vkab.selectedIndex==0 ){
			alert("Kabupaten harus di pilih.");
			vkab.focus();
			return false;
		}
		else if(vjenis.value=='' || !(vjenis.value.length==1) ){
			alert("Jenis Box harus di isi dan tidak boleh lebih dari 1 digit.");
			vjenis.focus();
			return false;
		}
		else if(vulangan.value=='' || !(vulangan.value.length==1) ){
			alert("Ulangan tidak boleh kosong dan harus 1 digit.");
			vulangan.focus();
			return false;
		}
		else {
			$.post()
			$ID('frm1').submit();
			// return true;
		}
	}
	<?php if (isset($status_addbox) && $status_addbox == 1) { ?>
		jQuery(document).ready(function(){
			alert('Penambahan data berhasil');
		});
	<?php } ?>	    function delete_link(id_box){            if(confirm('anda yakin akan menghapus data ini ?')){                goto('box/del/'+id_box);            }    }   function ceknol(obj){		if(obj.value<=9){			return '0'+obj.value;		}else{			return obj.value;		}	}		function upkabupaten(){		$.ajax({			url:'<?php echo $application_path;?>/box/kabupaten/'+$ID('UpProv').value,			complete: function(res, status){				//var kotak = res.responseText;				document.getElementById('div_upkab').innerHTML=res.responseText;			}		});	}	function upnobox(){		var vnopenelitian = document.box.UpNoPenelitian;		var vprov = document.box.UpProv;		var vkab = $ID('UpKab');		var vtypebox = document.box.UpTypeBox;		var vulangan =document.box.UpUlangan;		var vbox = document.box.UpNoBox;		var vhbox = document.box.hUpNoBox;				if(vnopenelitian.selectedIndex == 0){			vnopenelitian.value = '';		}		if(vprov.selectedIndex == 0){			vprov.value = '';		}		if(vkab.selectedIndex == 0){			vkab.value = '';		}		if(vtypebox.selectedIndex == 0){			vtypebox.value = '';		}				vhbox.value=ceknol(vnopenelitian) + ceknol(vprov) + ceknol(vkab) + vtypebox.value + vulangan.value;  		vbox.value = vhbox.value;	}		function combobox_select(obj, value) {		for (var i=0; i < obj[0].options.length; i++) {			if (obj[0].options[i].value == value) {				obj[0].options[i].selected = true;			}		}	}		function edit_link_action(id_box) {  				var objTR = $('#id_box_'+id_box).get(0);		// alert(objTR);		combobox_select($('#dialog select[name="UpNoPenelitian"]').val( $('#id_box_'+id_box+ ' input[name="UpNoPenelitian"]').val()));		combobox_select($('#dialog select[name="UpTypeBox"]').val( $('#id_box_'+id_box+ ' input[name="UpTypeBox"]').val()));		combobox_select($('#dialog select[name="UpProv"]').val( $.trim( objTR.children[3].innerHTML )));		combobox_select($('#dialog select[name="UpKab"]').val( $.trim( objTR.children[4].innerHTML )));		$('#dialog input[name="UpUlangan"]').val( $.trim( objTR.children[6].innerHTML ));		$('#dialog input[name="UpNoBox"]').val( $.trim( objTR.children[1].innerHTML ));			} 		$(function() {		$( "#dialog" ).dialog({			autoOpen: false,			width: 900,		});		document.dialog_click = function(id_box) {						$( "#dialog" ).dialog( "open" );						edit_link_action(id_box);		}	});		function updatebox_submit() {		var vnopen = $ID('UpNoPenelitian');		var vprov = $ID('UpProv');		var vkab = $ID('UpKab');		var vtype = $ID('UpTypeBox');		var vul = $ID('UpUlangan');		var vhbox = $ID('hUpNoBox');		// var v = document.bm2form.;		// var v = document.bm2form.;						if(vnopen.value=='' || vnopen.selectedIndex==0 ){			alert("Nomor Penelitian harus di pilih.");			vnopen.focus();			return false;		}		else if(vprov.value=='' || vprov.selectedIndex==0 ){			alert("Provinsi harus di pilih.");			vprov.focus();			return false;		}		else if(vkab.value=='' || vkab.selectedIndex==0 ){			alert("Kabupaten harus di pilih.");			vkab.focus();			return false;		}                else if(vtype.value=='' || vtype.selectedIndex==0 ){			alert("Type Box harus di pilih.");			vtype.focus();			return false;		}		else if(vul.value=='' || !(vul.value.length==1) ){			alert("Ulangan tidak boleh kosong dan harus 1 digit.");			vul.focus();			return false;		}		else {		$ID('box').submit();		// return true;		}	}        		<?php if (isset($status_revco) && $status_revco == 1) { ?>	jQuery(document).ready(function(){		alert('Update data berhasil');	});	<?php } ?>
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form Master Box</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Box</li>
		</ul>
	</div>
</div>
<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">				<div class="box-head box-tabs">					<ul class="tabs">						<li class="active">							<a href="#add" data-toggle="tab">								<i class="icon-flag"></i>								Tambah Box							</a>						</li>						<li>							<a href="#list" data-toggle="tab">								List Box							</a>						</li>					</ul>				</div>
				<div class="box-body box-body-nopadding">					<div class="tab-content">						<div class="tab-pane active" id="add">							<div class="row-fluid">								<div class="span12">									<!--h4></h4>									<p>																			</p-->								</div>							</div>
							<form method="POST" id="frm1" name="box" class='form-horizontal'>
								<input type="hidden" name="status_addbox" value="0">
								<div class="control-group">
									<label for="NoPenelitian" class="control-label">Jenis Penelitian</label>
									<div class="controls controls-row">
										<select name="NoPenelitian" id="NoPenelitian" class='span3' onchange="nobox()">
											<option> - Silakan Pilih - </option>
												<?php
													foreach($arr_penelitian as $value){
														echo "<option value='$value[penelitian_kode]'>$value[penelitian_id] - $value[penelitian_name] - $value[penelitian_kode]</option>";
													}
												?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="Prov" class="control-label" >Provinsi</label>
									<div class="controls controls-row">
										<select name="Prov" id="Prov" class='span3' onchange="kabupaten();nobox();">
											<option> - Silakan Pilih - </option>
											<?php
												foreach($arr_prov as $value){
													echo "<option value='$value[ID_PROP]'>$value[ID_PROP] - $value[NAMA_PROP]</option>";
												}
											?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="Kab" class="control-label" >Kabupaten</label>
									<div class="controls controls-row" id="div_kab">
										<select name="Kab" id="Kab" class='span3' onchange="nobox()">
											<option> - Silakan Pilih - </option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="TypeBox" class="control-label" >Typebox</label>
									<div class="controls controls-row">
										<select name="TypeBox" id="TypeBox" class='span3' onchange="nobox();">
											<option> - Silakan Pilih - </option>
											<?php
												foreach($arr_typebox as $value){
												echo "<option value='$value[typebox_id]'>$value[typebox_id] - $value[typebox_name]</option>";
												}
											?>
										</select>
									</div>
								</div>								<div class="control-group">
									<label for="Ulangan" class="control-label">Ulangan</label>
									<div class="controls controls-row">
										<input type="text" name="Ulangan" id="Ulangan" class="span2" onkeyup="nobox()"/>
									</div>
								</div>
								<div class="control-group">
									<label for="NoBox" class="control-label">No. Box</label>
									<div class="controls controls-row">
										<input type="text" name="hNoBox" id="hNoBox" class="span2" disabled="true"/>
										<input type="hidden" name="NoBox" id ="NoBox"/>
									</div>
								</div>
								<div class="form-actions">
									<button style="padding-left:1%" type="button" onclick="addbox_submit()" class="button button-basic-blue">Simpan</button>
									<!--<button type="button" class="button button-basic">Cancel</button>-->
								</div>
							</form>						</div>						<div class="tab-pane" id="list">							<div class="row-fluid">								<table class="table table-nomargin table-bordered dataTable table-striped table-hover">									<thead>										<tr>											<th width="1.5%">No.</th>											<th width="10%">No box</th>											<th width="10%">Penelitian</th>											<th width="10%">Propinsi</th>											<th width="10%">Kabupaten</th>											<th width="10%">Jenis</th>											<th width="10%">Ulangan</th>											<th width="15%"><center>Action</center></th>										</tr>									</thead>									<tbody>										<?php 											$no = 1;											foreach($arr_box as $value):																			   										?>											<tr id='id_box_<?php echo $value['id_box']; ?>'>												<td>													<?php echo $no ?>													<input type="hidden" name="id_box" value="<?php echo $value['id_box']; ?>" />													<input type="hidden" name="UpNoPenelitian" value="<?php echo $value['penelitian_kode']; ?>" />													<input type="hidden" name="UpTypeBox" value="<?php echo $value['typebox_id']; ?>" />												</td>												<td class='table-icon'>													<?php echo $value['no_box']; ?>												</td>												<td class='table-fixed-medium'>													<?php echo $value['penelitian_name']; ?>												</td>												<td class='table-fixed-medium'>													<?php echo  substr($value['no_box'],2,2);?>												</td>												<td class='table-fixed-medium'>													<?php echo substr($value['no_box'],4,2); ?>												</td>												<td class='table-fixed-medium'>													<?php echo $value['typebox_name']; ?>												</td>												<td class='table-fixed-medium'>														<?php echo substr($value['no_box'],7,1);?>												</td>												<td>												<center>													<div class="btn-group">														<?php															if (!($level == 1 || $level == 2 || $level == 9))															echo "														<a href=\"#\" onclick=\"document.dialog_click('{$value['id_box']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_box=\"{$value['id_box']}\"><i class=\"icon-eye-open\"></i></a>															";														?>													<?php														if (!($level == 3))														echo"														<a href=\"#\" onclick=\"document.dialog_click('{$value['id_box']}');document.box.id_box.value=$value[id_box]\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_box=\"{$value['id_box']}\"><i class=\"icon-exclamation-sign\"></i></a>														<a href=\"#\" onclick=\"delete_link('{$value['id_box']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>													";													?>													</div>												</center>												</td>											</tr>										<?php											$no++;											endforeach;										?>									</tbody>								</table>							</div>						</div>					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- ui-dialog --><?php	if (!($level == 3))	echo"<div id=\"dialog\" title=\"Form Edit box\" style=\"z-index:99999;\">	";?><?php	if ($level == 3)	echo"<div id=\"dialog\" title=\"Form View box\" style=\"z-index:99999;\">	";?>	<div class="box-body">		<form method="POST" id="box" name="box" class='form-horizontal'>			<input type='hidden' name="id_box" />			<input type="hidden" name="status_box" value="0">			<div class="control-group">				<label for="UpNoPenelitian" class="control-label">Jenis Penelitian</label>				<div class="controls controls-row">						<select name="UpNoPenelitian" id="UpNoPenelitian" class='span3' onchange="upnobox()">						<option> - Silakan Pilih - </option>						<?php							foreach($arr_penelitian as $value){								echo "<option value='$value[penelitian_kode]'>$value[penelitian_id] - $value[penelitian_name] - $value[penelitian_kode]</option>";							}						?>					</select>				</div>			</div>			<div class="control-group">					<label for="UpProv" class="control-label" >Provinsi</label>				<div class="controls controls-row">						<select name="UpProv" id="UpProv" class='span3' onchange="upkabupaten();upnobox();">						<option> - Silakan Pilih - </option>						<?php							foreach($arr_prov as $value){								echo "<option value='$value[ID_PROP]'>$value[ID_PROP] - $value[NAMA_PROP]</option>";							}						?>					</select>				</div>			</div>			<div class="control-group">				<label for="UpKab" class="control-label" >Kabupaten</label>				<div class="controls controls-row" id="div_upkab">						<select name="UpKab" id="UpKab" class='span3' onchange="upnobox()">						<option> - Silakan Pilih Kabupaten -</option>						<?php foreach($arr_kab as $value):?>						<option value="<?php echo $value['ID_KAB']?>"><?php echo $value['ID_KAB']?> - <?php echo $value['NM_KAB']?></option>						<?php endforeach; ?>					</select>				</div>			</div>			<div class="control-group">				<label for="UpTypeBox" class="control-label" >Typebox</label>				<div class="controls controls-row">					<select name="UpTypeBox" id="UpTypeBox" class='span3' onchange="upnobox();">						<option> - Silakan Pilih - </option>						<?php							foreach($arr_typebox as $value){								echo "<option value='$value[typebox_id]'>$value[typebox_id] - $value[typebox_name]</option>";							}						?>					</select>				</div>			</div>			<div class="control-group">				<label for="UpUlangan" class="control-label">Ulangan</label>				<div class="controls controls-row">					<input type="text" name="UpUlangan" id="UpUlangan" class="span2" onkeyup="upnobox()"/>				</div>			</div>			<div class="control-group">				<label for="UpNoBox" class="control-label">No. Box</label>				<div class="controls controls-row">					<input type="text" name="UpNoBox" id="UpNoBox" class="span2" disabled="true"/>					<input type="hidden" name="hUpNoBox" id ="hUpNoBox"/>				</div>			</div>			<?php				if (!($level == 3))				echo"				<button style=\"padding-left:1%\" type=\"button\" onclick=\"updatebox_submit()\" class=\"button button-basic-blue\">Update</button>				";			?>		</form>	</div></div>