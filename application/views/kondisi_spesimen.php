<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('kondisispesimen').focus();
	});
	
	function delete_link(kondisispesimen_id) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('kondisi_spesimen/del/' + kondisispesimen_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 190,
			});
			
		document.dialog_click = function( kondisispesimen_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(kondisispesimen_id);
		}
	});
	
	function edit_link_action(kondisispesimen_id) {  
		
		var objTR = $('#kondisispesimen_'+kondisispesimen_id).get(0);
		// alert(objTR);
		$('#dialog input[name="upkondisispesimen"]').val( $.trim( objTR.children[1].innerHTML ) );
		// $('#dialog input[name="upkondisispesimen"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="kondisispesimen_id"]').val( $('#kondisispesimen_'+kondisispesimen_id+ ' input[name="kondisispesimen_id"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addakondisispesimen_submit() {

		var vkondisispesimen = document.propform.kondisispesimen;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkondisispesimen.value=='' ){
			alert("Nama kondisi spesimen harus diisi.");
			vkondisispesimen.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addkondisispesimen) && $status_addkondisispesimen == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data kondisi spesimen berhasil');
	});
	<?php } ?>	
	
	function upkondisispesimen_submit() {

		var vkondisispesimen = document.uppropform.upkondisispesimen;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vkondisispesimen.value=='' ){
			alert("Kondisi spesimen harus diisi.");
			vkondisispesimen.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upkondisispesimen) && $status_upkondisispesimen == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data kondisi spesimen berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Kondisi Spesimen</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Kondisi Spesimen</li>
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
								Tambah Kondisi Spesimen
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Kondisi Spesimen
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
									<input type="hidden" name="status_addkondisispesimen" value="0">
									<div class="control-group">
										<label for="kondisispesimen" class="control-label">Kondisi Spesimen</label>
										<div class="controls controls-row">
											<input type="text" name="kondisispesimen" id="kondisispesimen" class="span7" />
									
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addakondisispesimen_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="40%">Kondisi Spesimen</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_kondisispesimen as $value):
										?>
											<tr id='kondisispesimen_<?php echo $value['kondisispesimen_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="kondisispesimen_id" value="<?php echo $value['kondisispesimen_id']; ?>" />
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['kondisispesimen_name']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['kondisispesimen_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['kondisispesimen_id']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['kondisispesimen_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit Kondisi Spesimen" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upkondisispesimen" value="0">
			<input type='hidden' name="kondisispesimen_id" />
			<div class="control-group">
				<label for="upkondisispesimen" class="control-label">Kondisi Spesimen</label>
				<div class="controls controls-row">
					<input type="text" name="upkondisispesimen" id="upkondisispesimen" class="span5" />
			
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upkondisispesimen_submit()" class="button button-basic-blue">Update</button>
			</div>
		</form>
	</div>
</div>