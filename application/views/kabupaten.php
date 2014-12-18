<script type="text/javascript">
	
	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function delete_link(ID_KAB) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('kabupaten/del/' + ID_KAB);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 800,
			height: 250,
			});
			
		document.dialog_click = function( ID_KAB ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(ID_KAB);
		}
	});
	
	function edit_link_action(ID_KAB) {  
		
		var objTR = $('#kab_'+ID_KAB).get(0);
		// alert(objTR);
		combobox_select($('#dialog select[name="upkodepropinsi"]'), $.trim( objTR.children[1].innerHTML ));
		$('#dialog input[name="upkodekabupaten"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="hupkodekabupaten"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="upnamakabupaten"]').val( $.trim( objTR.children[3].innerHTML ) );
		
	} 
	
	
	function addakabupaten_submit() {

		var vkodepropinsi = document.propform.kodepropinsi;
		var vkodekabupaten = document.propform.kodekabupaten;
		var vnamakabupaten = document.propform.namakabupaten;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodepropinsi.value=='' ){
			alert("Anda belum memilih kode propinsi.");
			vkodepropinsi.focus();
			return false;
		}
		else if(vkodekabupaten.value=='' ){
			alert("Kode kabupaten harus diisi.");
			vkodekabupaten.focus();
			return false;
		}
		else if(vnamakabupaten.value==''){
			alert("Nama Kabupaten harus diisi (Harus 1 Chars).");
			vnamakabupaten.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addkabupaten) && $status_addkabupaten == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data kabupaten berhasil');
	});
	<?php } ?>	
	
	function upakabupaten_submit() {

		var vupkodepropinsi = document.uppropform.upkodepropinsi;
		var vupkodekabupaten = document.uppropform.upkodekabupaten;
		var vupnamakabupaten = document.uppropform.upnamakabupaten;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vupkodepropinsi.value=='' ){
			alert("Anda belum memilih kode propinsi.");
			vupkodepropinsi.focus();
			return false;
		}
		else if(vupkodekabupaten.value=='' ){
			alert("Kode kabupaten harus diisi.");
			vupkodekabupaten.focus();
			return false;
		}
		else if(vupnamakabupaten.value=='' ){
			alert("Nama kabupaten harus diisi.");
			vupnamakabupaten.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upkabupaten) && $status_upkabupaten == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data kabupaten berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Kabupaten</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>kabupaten</li>
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
								Tambah Kabupaten
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Kabupaten
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
									<input type="hidden" name="status_addkabupaten" value="0"/>
									<div class="control-group">
										<label for="kodepropinsi" class="control-label">Kode Propinsi</label>
										<div class="controls controls-row">
											<div class="input-xxlarge">
												<!--input type="text" name="kodekabupaten" id="kodekabupaten" maxlength="2" class="span1"/-->
												<select name="kodepropinsi" id="kodepropinsi" class='chosen-select' >
													<option value=""> - Pilih Kode Propinsi - </option>
													<?php foreach($arr_prov as $value): ?>
													<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="kodekabupaten" class="control-label">Kode kabupaten</label>
										<div class="controls controls-row">
											<input type="text" name="kodekabupaten" id="kodekabupaten" maxlength="1" class="span1"/>
										</div>
									</div>
									<div class="control-group">
											<label for="namakabupaten" class="control-label">Nama kabupaten</label>
										<div class="controls controls-row">
											<input type="text" name="namakabupaten" id="namakabupaten" class="span7" />
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addakabupaten_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="40%">Nama kabupaten</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php
											if (empty($arr_kab)) {
												echo '<tr><td colspan="6" style="color:red;"><center><b> Data kabupaten Masih Kosong. </b><center></td></tr>';
											}
										?>
										<?php 
											$no = 1;
											foreach($arr_kab as $value):
										?>
											<tr id='kab_<?php echo $value['ID_PROP'].'_'.$value['ID_KAB']; ?>'>
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
													<?php echo $value['NM_KAB']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<!--a href="#" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a>
														<a href="#" class='button button-basic button-icon' rel="tooltip" title="View"><i class="icon-eye-open"></i></a-->
														<a href="#" onclick="document.dialog_click('<?php echo $value['ID_PROP'].'_'.$value['ID_KAB']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['ID_KAB']; ?>"><i class="icon-exclamation-sign"></i></a>
                                                                                                                <a href="#" class='button button-basic button-icon' rel="tooltip" title="Delete" onclick="delete_link('<?php echo $value['ID_KAB']; ?>')"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit kabupaten" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upkabupaten" value="0">
			<div class="control-group">
				<label for="upkodepropinsi" class="control-label">Kode Propinsi</label>
				<div class="controls controls-row">
						<!--input type="text" name="kodekabupaten" id="kodekabupaten" maxlength="2" class="span1"/-->
						<select name="upkodepropinsi" id="upkodepropinsi" class='span4' >
							<option value=""> - Pilih Kode Propinsi - </option>
							<?php foreach($arr_prov as $value): ?>
							<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
							<?php endforeach; ?>
						</select>
				</div>
			</div>
			<div class="control-group">
				<label for="upkodekabupaten" class="control-label">Kode kabupaten</label>
				<div class="controls controls-row">
					<input type="text" name="upkodekabupaten" id="upkodekabupaten" maxlength="2" class="span1" disabled/>
					<input type="hidden" name="hupkodekabupaten" id="hupkodekabupaten" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="control-group">
					<label for="upnamakabupaten" class="control-label">Nama kabupaten</label>
				<div class="controls controls-row">
					<input type="text" name="upnamakabupaten" id="upnamakabupaten" class="span6" />
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upakabupaten_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>