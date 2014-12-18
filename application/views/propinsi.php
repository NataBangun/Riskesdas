<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('kodepropinsi').focus();
	});
	
	function delete_link(ID_PROP) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('propinsi/del/' + ID_PROP);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 690,
			height: 250,
			});
			
		document.dialog_click = function( ID_PROP ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(ID_PROP);
		}
	});
	
	function edit_link_action(ID_PROP) {  
		
		var objTR = $('#prop_'+ID_PROP).get(0);
		// alert(objTR);
		$('#dialog input[name="upkodepropinsi"]').val( $.trim( objTR.children[1].innerHTML ) );
                $('#dialog input[name="hupkodepropinsi"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="uppropinsi"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="upkorwil"]').val( $.trim( objTR.children[3].innerHTML ) );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addapropinsi_submit() {

		var vkodepropinsi = document.propform.kodepropinsi;
		var vpropinsi = document.propform.propinsi;
		var vkorwil = document.propform.korwil;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodepropinsi.value=='' || !(vkodepropinsi.value.length==2) ){
			alert("Kode propinsi harus diisi (Harus 2 Chars).");
			vkodepropinsi.focus();
			return false;
		}
		else if(vpropinsi.value=='' ){
			alert("Nama propinsi harus diisi.");
			vpropinsi.focus();
			return false;
		}
		else if(vkorwil.value=='' || !(vkorwil.value.length==1 )){
			alert("Kode korwil harus diisi (Harus 1 Chars).");
			vkorwil.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addpropinsi) && $status_addpropinsi == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data propinsi berhasil');
	});
	<?php } ?>	
	
	function upapropinsi_submit() {

		var vkodepropinsi = document.uppropform.upkodepropinsi;
		var vpropinsi = document.uppropform.uppropinsi;
		var vkorwil = document.uppropform.upkorwil;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vkodepropinsi.value=='' || !(vkodepropinsi.value.length==2) ){
			alert("Kode propinsi harus diisi (Harus 2 Chars).");
			vkodepropinsi.focus();
			return false;
		}
		else if(vpropinsi.value=='' ){
			alert("Nama propinsi harus diisi.");
			vpropinsi.focus();
			return false;
		}
		else if(vkorwil.value=='' || !(vkorwil.value.length==1 )){
			alert("Kode korwil harus diisi (Harus 1 Chars).");
			vkorwil.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_uppropinsi) && $status_uppropinsi == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data propinsi berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Propinsi</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Propinsi</li>
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
								Tambah Propinsi
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Propinsi
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
									<input type="hidden" name="status_addpropinsi" value="0">
									<div class="control-group">
										<label for="kodepropinsi" class="control-label">Kode Propinsi</label>
										<div class="controls controls-row">
											<input type="text" name="kodepropinsi" id="kodepropinsi" maxlength="2" class="span1"/>
										</div>
									</div>
									<div class="control-group">
										<label for="propinsi" class="control-label">Nama Propinsi</label>
										<div class="controls controls-row">
											<input type="text" name="propinsi" id="propinsi" class="span7" />
									
										</div>
									</div>
									<div class="control-group">
											<label for="korwil" class="control-label">Korwil</label>
										<div class="controls controls-row">
											<input type="text" name="korwil" id="korwil" maxlength="1" class="span1"/>
									
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addapropinsi_submit()" class="button button-basic-blue">Simpan</button>
										<!--<button type="button" class="button button-basic">Cancel</button>-->
									</div>
								</form>
								
							</div>
						</div>
						<div class="tab-pane" id="list">
							<!--<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<table class="table2 table2-striped table2-nomargin table2-mail">-->
							<div class="row-fluid">
								<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
									<thead>
										<tr>
											<th width="1.5%">No.</th>
											<th width="10%">Kode Propinsi</th>
											<th width="40%">Nama Propinsi</th>
											<th width="20%">Kode Korwil</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php
											if (empty($arr_prop)) {
												echo '<tr><td colspan="6" style="color:red;"><center><b> Data Propinsi Masih Kosong. </b><center></td></tr>';
											}
										?>
										<?php 
											$no = 1;
											foreach($arr_prop as $value):
										?>
											<tr id='prop_<?php echo $value['ID_PROP']; ?>'>
												<td>
													<?php echo $no ?>
												</td>
												<td class='table-icon'>
													<?php echo $value['ID_PROP']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['NAMA_PROP']; ?>
												</td>
												<td class='table-date'>
													<?php echo $value['KORWIL']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<!--a href="#" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a>
														<a href="#" class='button button-basic button-icon' rel="tooltip" title="View"><i class="icon-eye-open"></i></a-->
														<a href="#" onclick="document.dialog_click('<?php echo $value['ID_PROP']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['ID_PROP']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['ID_PROP']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit Propinsi" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_uppropinsi" value="0">
			<div class="control-group">
				<label for="upkodepropinsi" class="control-label">Kode Propinsi</label>
				<div class="controls controls-row">
                                        
					<input type="text" name="upkodepropinsi" id="upkodepropinsi"  maxlength="2" class="span1" disabled/>
					<input type="hidden" name="hupkodepropinsi" id="hupkodepropinsi"  maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="control-group">
				<label for="uppropinsi" class="control-label">Nama Propinsi</label>
				<div class="controls controls-row">
                             
					<input type="text" name="uppropinsi" id="uppropinsi" class="span5"/>
			
				</div>
			</div>
			<div class="control-group">
					<label for="upkorwil" class="control-label">Korwil</label>
				<div class="controls controls-row">
					<input type="text" name="upkorwil" id="upkorwil" maxlength="1" class="span1"/>
			
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upapropinsi_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>