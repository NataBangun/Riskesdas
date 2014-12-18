<script type="text/javascript">
	
	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
    
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('penelitian').focus();
	});
	
	function delete_link(penelitian_id) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('penelitian/del/' + penelitian_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 315,
			});
			
		document.dialog_click = function( penelitian_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(penelitian_id);
		}
	});
	
	function edit_link_action(penelitian_id) {  
		
		var objTR = $('#penelitian_'+penelitian_id).get(0);
		// alert(objTR);
		combobox_select($('#dialog select[name="upLab"]'), $.trim( objTR.children[1].innerHTML ));
		$('#dialog input[name="upkodepenelitian"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="uppenelitian"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="penelitian_id"]').val( $('#penelitian_'+penelitian_id+ ' input[name="penelitian_id"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addapenelitian_submit() {

		var vkodepenelitian = document.propform.kodepenelitian;
		var vpenelitian = document.propform.penelitian;
		var vlab = document.propform.Lab;
		// var v = document.propform.;
		
		
		if(vlab.value=='' ){
			alert("Anda belum memilih laboraturium.");
			vlab.focus();
			return false;
		}
		else if(vkodepenelitian.value=='' || !(vkodepenelitian.value.length==2) ){
			alert("Kode penelitian harus diisi (Harus 2 Chars).");
			vkodepenelitian.focus();
			return false;
		}
		else if(vpenelitian.value=='' ){
			alert("Nama penelitian harus diisi.");
			vpenelitian.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addpenelitian) && $status_addpenelitian == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data penelitian berhasil');
	});
	<?php } ?>	
	
	function uppenelitian_submit() {

		var vkodepenelitian = document.uppropform.upkodepenelitian;
		var vpenelitian = document.uppropform.uppenelitian;
		var vlab = document.uppropform.upLab;
		// var v = document.uppropform.;
		
		
		if(vlab.value=='' ){
			alert("Anda belum memilih laboraturium.");
			vlab.focus();
			return false;
		}
		else if(vkodepenelitian.value=='' || !(vkodepenelitian.value.length==2) ){
			alert("Kode penelitian harus diisi (Harus 2 Chars).");
			vkodepenelitian.focus();
			return false;
		}
		else if(vpenelitian.value=='' ){
			alert("Nama penelitian harus diisi.");
			vpenelitian.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_uppenelitian) && $status_uppenelitian == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data penelitian berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Jenis Penelitian</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Penelitian</li>
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
								Tambah Penelitian
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Penelitian
							</a>
						</li>
					</ul>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="tab-content">
						<div class="tab-pane active" id="add">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								<form method="POST" id="frm1" name="propform" class='form-horizontal'>
									<input type="hidden" name="status_addpenelitian" value="0"/>
									<div class="control-group">
										<label for="Lab" class="control-label">Nama laboraturium</label>
										<div class="controls controls-row">
											<!--<input type="text" name="penelitian" id="penelitian" class="span7" />-->
				                            <select name="Lab" id="Lab" class='input-block-level span7'>
												<option value=""> - Silakan Pilih Laboraturium - </option>
												<?php foreach($arr_lab as $value): ?>
												<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_NAME'] ?></option>
												<?php endforeach; ?>
											</select>
									
										</div>
									</div>
									<div class="control-group">
										<label for="penelitian" class="control-label">Nama penelitian</label>
										<div class="controls controls-row">
											<input type="text" name="penelitian" id="penelitian" class="span7" />
									
										</div>
									</div>
									<div class="control-group">
										<label for="kodepenelitian" class="control-label">Kode penelitian</label>
										<div class="controls controls-row">
											<input type="text" name="kodepenelitian" id="kodepenelitian" maxlength="2" class="span1"/>
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addapenelitian_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="10%">Kode laboraturium</th>
											<th width="10%">Kode penelitian</th>
											<th width="40%">Nama penelitian</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_penelitian as $value):
										?>
											<tr id='penelitian_<?php echo $value['penelitian_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="penelitian_id" value="<?php echo $value['penelitian_id']; ?>" />
												</td>
												<td class='table-date'>
													<?php echo $value['lab_Id']; ?>
												</td>
												<td class='table-date'>
													<?php echo $value['penelitian_kode']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['penelitian_name']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['penelitian_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['penelitian_id']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['penelitian_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit penelitian" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_uppenelitian" value="0"/>
			<input type='hidden' name="penelitian_id" />
			<div class="control-group">
				<label for="upLab" class="control-label">Nama laboraturium</label>
				<div class="controls controls-row">
					<!--<input type="text" name="penelitian" id="penelitian" class="span7" />-->
                    <select name="upLab" id="upLab" class='input-block-level span5'>
						<option value=""> - Silakan Pilih Laboraturium - </option>
						<?php foreach($arr_lab as $value): ?>
						<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_NAME'] ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="uppenelitian" class="control-label">Nama penelitian</label>
				<div class="controls controls-row">
					<input type="text" name="uppenelitian" id="uppenelitian" class="span5" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="upkodepenelitian" class="control-label">Kode penelitian</label>
				<div class="controls controls-row">
					<input type="text" name="upkodepenelitian" id="upkodepenelitian" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="uppenelitian_submit()" class="button button-basic-blue">Update</button>
			</div>
		</form>
	</div>
</div>