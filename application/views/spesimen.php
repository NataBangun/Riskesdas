<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('spesimen').focus();
	});
	
	function delete_link(spesimen_id) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('spesimen/del/' + spesimen_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 250,
			});
			
		document.dialog_click = function( spesimen_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(spesimen_id);
		}
	});
	
	function edit_link_action(spesimen_id) {  
		
		var objTR = $('#spesimen_'+spesimen_id).get(0);
		// alert(objTR);
		$('#dialog input[name="upkodespesimen"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="upspesimen"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="spesimen_id"]').val( $('#spesimen_'+spesimen_id+ ' input[name="spesimen_id"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addaspesimen_submit() {

		var vkodespesimen = document.propform.kodespesimen;
		var vspesimen = document.propform.spesimen;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodespesimen.value=='' || !(vkodespesimen.value.length==1) ){
			alert("Kode spesimen harus diisi (Harus 1 Chars).");
			vkodespesimen.focus();
			return false;
		}
		else if(vspesimen.value=='' ){
			alert("Nama spesimen harus diisi.");
			vspesimen.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addspesimen) && $status_addspesimen == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data spesimen berhasil');
	});
	<?php } ?>	
	
	function upspesimen_submit() {

		var vkodespesimen = document.uppropform.upkodespesimen;
		var vspesimen = document.uppropform.upspesimen;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vkodespesimen.value=='' || !(vkodespesimen.value.length==1) ){
			alert("Kode spesimen harus diisi (Harus 2 Chars).");
			vkodespesimen.focus();
			return false;
		}
		else if(vspesimen.value=='' ){
			alert("Nama spesimen harus diisi.");
			vspesimen.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upspesimen) && $status_upspesimen == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data spesimen berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Jenis Spesimen</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Spesimen</li>
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
								Tambah Spesimen
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Spesimen
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
									<input type="hidden" name="status_addspesimen" value="0">
									<div class="control-group">
										<label for="spesimen" class="control-label">Nama Spesimen</label>
										<div class="controls controls-row">
											<input type="text" name="spesimen" id="spesimen" class="span7" />
									
										</div>
									</div>
									<div class="control-group">
										<label for="kodespesimen" class="control-label">Kode Spesimen</label>
										<div class="controls controls-row">
											<input type="text" name="kodespesimen" id="kodespesimen" maxlength="2" class="span1"/>
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addaspesimen_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="10%">Kode Spesimen</th>
											<th width="40%">Nama Spesimen</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_spesimen as $value):
										?>
											<tr id='spesimen_<?php echo $value['spesimen_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="spesimen_id" value="<?php echo $value['spesimen_id']; ?>" />
												</td>
												<td class='table-date'>
													<?php echo $value['spesimen_kode']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['spesimen_name']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['spesimen_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['spesimen_id']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['spesimen_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit Spesimen" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upspesimen" value="0">
			<input type='hidden' name="spesimen_id" />
			<div class="control-group">
				<label for="upspesimen" class="control-label">Nama Spesimen</label>
				<div class="controls controls-row">
					<input type="text" name="upspesimen" id="upspesimen" class="span5" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="upkodespesimen" class="control-label">Kode Spesimen</label>
				<div class="controls controls-row">
					<input type="text" name="upkodespesimen" id="upkodespesimen" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upspesimen_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>