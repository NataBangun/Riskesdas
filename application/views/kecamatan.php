<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('KodePropinsi').focus();
	});
	
        
        function kabupaten(){
            $.ajax({
                            url:'<?php echo $application_path;?>/kecamatan/kabupaten/'+$ID('KodePropinsi').value,
                            complete: function(res, status){
                                //var kotak = res.responseText;
                                document.getElementById('div_kota').innerHTML=res.responseText;
                            }
                        });
        }
        
        function upkabupaten(){
            $.ajax({
                            url:'<?php echo $application_path;?>/kecamatan/kabupaten/'+$ID('upkodepropinsi').value,
                            complete: function(res, status){
                                //var kotak = res.responseText;
                                document.getElementById('div_kab').innerHTML=res.responseText;
                            }
                        });
        }
        
	function delete_link(ID_KEC) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('kecamatan/del/' + ID_KEC);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 800,
			height: 300,
			});
			
		document.dialog_click = function( ID_PROP ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(ID_PROP);
		}
	});
        
    function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function edit_link_action(ID_KEC) {  
		
		var objTR = $('#prop_'+ID_KEC).get(0);
		// alert(objTR);
		combobox_select($('#dialog select[name="upkodepropinsi"]').val( $.trim( objTR.children[1].innerHTML )));
		combobox_select($('#dialog select[name="upkodekabupaten"]').val( $.trim( objTR.children[2].innerHTML )));
		$('#dialog input[name="upkodekecamatan"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="hupkodekecamatan"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="upnamakecamatan"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addakecamatan_submit() {

		var vkodepropinsi = document.propform.KodePropinsi;
                var vkodekabupaten = document.propform.kodekabupaten;
		var vkodekecamatan = document.propform.kodekecamatan;
		var vnamakecamatan = document.propform.namakecamatan;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodepropinsi.value=='' ){
			alert("Anda belum memilih kode propinsi.");
			vkodepropinsi.focus();
			return false;
		}
                else if(vkodekabupaten.value=='' ){
			alert("Anda belum memilih kode kabupaten.");
			vkodekabupaten.focus();
			return false;
		}
		else if(vkodekecamatan.value==''){
			alert("Kode kecamatan harus diisi");
			vkodekecamatan.focus();
			return false;
		}
                else if(vnamakecamatan.value==''){
			alert("Nama kecamatan harus diisi");
			vnamakecamatan.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addkecamatan) && $status_addkecamatan == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data kecamatan berhasil');
	});
	<?php } ?>	
	
	function upkecamatan_submit() {

		var vkodepropinsi = document.uppropform.upkodepropinsi;
		var vkodekabupaten = document.uppropform.upkodekabupaten;
		var vkodekecamatan = document.uppropform.upkodekecamatan;
		var vnamakecamatan = document.uppropform.upnamakecamatan;
		
		if(vkodepropinsi.value=='' || vkodepropinsi.selectedIndex==0 ){
			alert("Propinsi harus di pilih.");
			vkodepropinsi.focus();
			return false;
		}
                else if(vkodekabupaten.value=='' || vkodekabupaten.selectedIndex==0 ){
			alert("Kabupaten harus di pilih.");
			vkodekabupaten.focus();
			return false;
		}
//		else if(vkodekecamatan.value=='' ){
//			alert("Kode kecamatan harus diisi");
//			vkodekecamatan.focus();
//			return false;
//		}
		else if(vnamakecamatan.value=='' ){
			alert("Nama kecamatan harus diisi.");
			vnamakecamatan.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upkecamatan) && $status_upkecamatan == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data kecamatan berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master kecamatan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>kecamatan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head box-tabs">
					<ul class="tabs">
						<li class="active">
							<a href="#add" data-toggle="tab">
								<i class="icon-flag"></i>
								Tambah kecamatan
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List kecamatan
							</a>
						</li>
					</ul>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="tab-content">
						<div class="tab-pane active" id="add">
							<div class="row-fluid">
								<div class="span12">
									<!--h4></h4>
									<p>
										
									</p-->
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" id="frm1" name="propform" class='form-horizontal'>
									<input type="hidden" name="status_addkecamatan" value="0"/>
									<div class="control-group">
										<label for="KodePropinsi" class="control-label">Kode Propinsi</label>
										<div class="controls controls-row">
											<div class="input-xxlarge">
												<!--input type="text" name="kodekecamatan" id="kodekecamatan" maxlength="2" class="span1"/-->
                                                <select name="KodePropinsi" id="KodePropinsi" onchange="kabupaten(this.value)" >
													<option value=""> - Pilih Kode Propinsi - </option>
													<?php foreach($arr_prov as $value): ?>
													<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="kodekabupaten" class="control-label">Kode Kabupaten</label>
										<div class="controls controls-row">
											<div class="input-xxlarge" id="div_kota">
												<select name="kodekabupaten" id="kodekabupaten" >
													
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="kecamatan" class="control-label">Kode Kecamatan</label>
										<div class="controls controls-row">
											<input type="text" name="kodekecamatan" id="korwil" maxlength="3" class="span1"/>
										</div>
									</div>
									<div class="control-group">
											<label for="korwil" class="control-label">Nama kecamatan</label>
										<div class="controls controls-row">
											<input type="text" name="namakecamatan" id="namakecamatan" class="span7" />
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addakecamatan_submit()" class="button button-basic-blue">Simpan</button>
										<!--<button type="button" class="button button-basic">Cancel</button>-->
									</div>
								</form>
								
							</div>
						</div>
						<div class="tab-pane" id="list">
							<div class="row-fluid">
								<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
									<thead>
										<tr>
											<th width="1.5%">No.</th>
											<th width="10%">Kode propinsi</th>
											<th width="15%">Kode kabupaten</th>
											<th width="20%">Kode kecamatan</th>
											<th width="20%">Nama kecamatan</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php
											if (empty($arr_kec)) {
												echo '<tr><td colspan="6" style="color:red;"><center><b> Data kecamatan Masih Kosong. </b><center></td></tr>';
											}
										?>
										<?php 
											$no = 1;
											foreach($arr_kec as $value):
										?>
											<tr id='prop_<?php echo $value['ID_KEC']; ?>'>
												<td>
													<?php echo $no ?>
												</td>
												<td class='table-icon'>
													<?php echo $value['ID_PROP']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['ID_KAB']; ?>
												</td>
												<td class='table-date'>
													<?php echo $value['ID_KEC']; ?>
												</td>
                                                                                                <td class='table-date'>
													<?php echo $value['NM_KEC']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['ID_KEC']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['ID_KEC']; ?>"><i class="icon-exclamation-sign"></i></a>
                                                                                                                <a href="#" class='button button-basic button-icon' rel="tooltip" title="Delete"onclick="delete_link('<?php echo $value['ID_KEC'];?>')"><i class="icon-trash"></i></a>
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
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ui-dialog -->
<div id="dialog" title="Form Edit kecamatan" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upkecamatan" value="0">
			<div class="control-group">
				<label for="upkodepropinsi" class="control-label">Kode Propinsi</label>
				<div class="controls controls-row">
					<div class="input-xxlarge">
						<!--input type="text" name="kodekecamatan" id="kodekecamatan" maxlength="2" class="span1"/-->
						<select name="upkodepropinsi" id="upkodepropinsi" onchange="upkabupaten(this.value)">
							<option value=""> - Pilih Kode Propinsi - </option>
							<?php foreach($arr_prov as $value): ?>
							<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
                        <div class="control-group">
				<label for="upkodekabupaten" class="control-label">Kode kabupaten</label>
				<div class="controls controls-row">
					<div class="input-xxlarge" id="div_kab">
						<select name="upkodekabupaten" id="upkodekabupaten">
						<?php foreach($arr_kab as $value): ?>
                                                <option value="<?php echo $value['ID_KAB'] ?>"><?php echo $value['ID_KAB'] ?> - <?php echo $value['NM_KAB'] ?></option>
                                                <?php endforeach; ?>	
						</select>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label for="upkodekecamatan" class="control-label">Kode kecamatan</label>
				<div class="controls controls-row">
					<input type="text" name="upkodekecamatan" id="upkodekecamatan" maxlength="2" class="span1" disabled/>
					<input type="hidden" name="hupkodekecamatan" id="hupkodekecamatan" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="control-group">
					<label for="upnamakecamatan" class="control-label">Nama kecamatan</label>
				<div class="controls controls-row">
					<input type="text" name="upnamakecamatan" id="upnamakecamatan" class="span6" />
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upkecamatan_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>