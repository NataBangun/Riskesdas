<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('cb_hasil').focus();
	});
	
	function delete_link(HASIL_ID) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('cb_hasil/del/' + HASIL_ID);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 190,
			});
			
		document.dialog_click = function( HASIL_ID ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(HASIL_ID);
		}
	});
	
	function edit_link_action(HASIL_ID) {  
		
		var objTR = $('#cb_hasil_'+HASIL_ID).get(0);
		// alert(objTR);
		$('#dialog input[name="upcb_hasil"]').val( $.trim( objTR.children[1].innerHTML ) );
		// $('#dialog input[name="upkondisispesimen"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="HASIL_ID"]').val( $('#cb_hasil_'+HASIL_ID+ ' input[name="HASIL_ID"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addacb_hasil_submit() {

		var vcb_hasil = document.propform.cb_hasil;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vcb_hasil.value=='' ){
			alert("Nama Combo Box Hasil harus diisi.");
			vcb_hasil.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addcb_hasil) && $status_addcb_hasil == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data combo box hasil berhasil');
	});
	<?php } ?>	
	
	function upcb_hasil_submit() {

		var vcb_hasil = document.uppropform.upcb_hasil;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vcb_hasil.value=='' ){
			alert("Combo box hasil harus diisi.");
			vcb_hasil.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upcb_hasil) && $status_upcb_hasil == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data combo box hasil berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Combo Box Hasil</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Combo Box Hasil</li>
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
								Tambah Combo Box Hasil
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Combo Box Hasil
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
									<input type="hidden" name="status_addcb_hasil" value="0">
									<div class="control-group">
										<label for="cb_hasil" class="control-label">Combo Box Hasil</label>
										<div class="controls controls-row">
											<input type="text" name="cb_hasil" id="cb_hasil" class="span7" />
									
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addacb_hasil_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="40%">Combo Box Hasil</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_cb_hasil as $value):
										?>
											<tr id='cb_hasil_<?php echo $value['HASIL_ID']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="HASIL_ID" value="<?php echo $value['HASIL_ID']; ?>" />
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['HASIL_NM']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['HASIL_ID']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['HASIL_ID']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['HASIL_ID']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit Combo Box Hasil" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upcb_hasil" value="0">
			<input type='hidden' name="HASIL_ID" />
			<div class="control-group">
				<label for="upcb_hasil" class="control-label">Combo Box Hasil</label>
				<div class="controls controls-row">
					<input type="text" name="upcb_hasil" id="upcb_hasil" class="span5" />
			
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upcb_hasil_submit()" class="button button-basic-blue">Update</button>
			</div>
		</form>
	</div>
</div>