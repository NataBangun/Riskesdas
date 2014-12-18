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
	<?php } ?>	
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
			<div class="box">
				<div class="box-body box-body-nopadding">
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
								</div>
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
							</form>
				</div>
			</div>
		</div>
	</div>
</div>