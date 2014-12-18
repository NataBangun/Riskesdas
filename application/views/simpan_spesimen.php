<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('simapanspesimen').focus();
	});
	
	function delete_link(simapanspesimen_id) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('kondisi_spesimen/del/' + simapanspesimen_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 190,
			});
			
		document.dialog_click = function( simapanspesimen_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(simapanspesimen_id);
		}
	});
	
	function edit_link_action(simapanspesimen_id) {  
		
		var objTR = $('#simapanspesimen_'+simapanspesimen_id).get(0);
		// alert(objTR);
		$('#dialog input[name="upsimapanspesimen"]').val( $.trim( objTR.children[1].innerHTML ) );
		// $('#dialog input[name="upsimapanspesimen"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="simapanspesimen_id"]').val( $('#simapanspesimen_'+simapanspesimen_id+ ' input[name="simapanspesimen_id"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addasimapanspesimen_submit() {

		var vsimapanspesimen = document.propform.simapanspesimen;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vsimapanspesimen.value=='' ){
			alert("Nama penyimpanan spesimen harus diisi.");
			vsimapanspesimen.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addsimapanspesimen) && $status_addsimapanspesimen == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data penyimpanan spesimen berhasil');
	});
	<?php } ?>	
	
	function upsimapanspesimen_submit() {

		var vsimapanspesimen = document.uppropform.upsimapanspesimen;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vsimapanspesimen.value=='' ){
			alert("Penyimpanan spesimen harus diisi.");
			vsimapanspesimen.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upsimapanspesimen) && $status_upsimapanspesimen == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data penyimpanan spesimen berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Penyimpanan Spesimen</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Penyimpanan Spesimen</li>
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
								Tambah Penyimpanan Spesimen
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Penyimpanan Spesimen
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
									<input type="hidden" name="status_addsimapanspesimen" value="0">
									<div class="control-group">
										<label for="simapanspesimen" class="control-label">Penyimpanan Spesimen</label>
										<div class="controls controls-row">
											<input type="text" name="simapanspesimen" id="simapanspesimen" class="span7" />
									
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addasimapanspesimen_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="40%">Penyimpanan Spesimen</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_simapanspesimen as $value):
										?>
											<tr id='simapanspesimen_<?php echo $value['simapanspesimen_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="simapanspesimen_id" value="<?php echo $value['simapanspesimen_id']; ?>" />
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['simapanspesimen_name']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['simapanspesimen_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['simapanspesimen_id']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['simapanspesimen_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit Penyimpanan Spesimen" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upsimapanspesimen" value="0">
			<input type='hidden' name="simapanspesimen_id" />
			<div class="control-group">
				<label for="upsimapanspesimen" class="control-label">Penyimpanan Spesimen</label>
				<div class="controls controls-row">
					<input type="text" name="upsimapanspesimen" id="upsimapanspesimen" class="span5" />
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upsimapanspesimen_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>