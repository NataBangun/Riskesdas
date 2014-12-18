<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('institusi').focus();
	});
	
	function delete_link(institusi_id) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('institusi/del/' + institusi_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 210,
			});
			
		document.dialog_click = function( institusi_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(institusi_id);
		}
	});
	
	function edit_link_action(institusi_id) {  
		
		var objTR = $('#institusi_'+institusi_id).get(0);
		// alert(objTR);
		$('#dialog input[name="upkodeinstitusi"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="upinstitusi"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="institusi_id"]').val( $('#institusi_'+institusi_id+ ' input[name="institusi_id"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addainstitusi_submit() {

		var vkodeinstitusi = document.propform.kodeinstitusi;
		var vinstitusi = document.propform.institusi;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodeinstitusi.value=='' || !(vkodeinstitusi.value.length==1) ){
			alert("Kode institusi harus diisi (Harus 1 Chars).");
			vkodeinstitusi.focus();
			return false;
		}
		else if(vinstitusi.value=='' ){
			alert("Nama institusi harus diisi.");
			vinstitusi.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addinstitusi) && $status_addinstitusi == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data institusi berhasil');
	});
	<?php } ?>	
	
	function upinstitusi_submit() {

		var vkodeinstitusi = document.uppropform.upkodeinstitusi;
		var vinstitusi = document.uppropform.upinstitusi;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vkodeinstitusi.value=='' || !(vkodeinstitusi.value.length==1) ){
			alert("Kode institusi harus diisi (Harus 1 Chars).");
			vkodeinstitusi.focus();
			return false;
		}
		else if(vinstitusi.value=='' ){
			alert("Nama institusi harus diisi.");
			vinstitusi.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upinstitusi) && $status_upinstitusi == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data institusi berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Asal Institusi</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Institusi</li>
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
								Tambah Institusi
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Institusi
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
									<input type="hidden" name="status_addinstitusi" value="0">
									<div class="control-group">
										<label for="institusi" class="control-label">Nama institusi</label>
										<div class="controls controls-row">
											<input type="text" name="institusi" id="institusi" class="span7" />
									
										</div>
									</div>
									<div class="control-group">
										<label for="kodeinstitusi" class="control-label">Kode institusi</label>
										<div class="controls controls-row">
											<input type="text" name="kodeinstitusi" id="kodeinstitusi" maxlength="2" class="span1"/>
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addainstitusi_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="10%">Kode institusi</th>
											<th width="40%">Nama institusi</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_institusi as $value):
										?>
											<tr id='institusi_<?php echo $value['institusi_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="institusi_id" value="<?php echo $value['institusi_id']; ?>" />
												</td>
												<td class='table-date'>
													<?php echo $value['institusi_kode']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['institusi_name']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['institusi_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['institusi_id']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['institusi_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit Institusi" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upinstitusi" value="0">
			<input type='hidden' name="institusi_id" />
			<div class="control-group">
				<label for="upinstitusi" class="control-label">Nama institusi</label>
				<div class="controls controls-row">
					<input type="text" name="upinstitusi" id="upinstitusi" class="span5" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="upkodeinstitusi" class="control-label">Kode institusi</label>
				<div class="controls controls-row">
					<input type="text" name="upkodeinstitusi" id="upkodeinstitusi" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upinstitusi_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>