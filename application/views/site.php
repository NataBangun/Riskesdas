<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('site').focus();
	});
	
	function delete_link(site_id) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('site/del/' + site_id);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
			height: 210,
			});
			
		document.dialog_click = function( site_id ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(site_id);
		}
	});
	
	function edit_link_action(site_id) {  
		
		var objTR = $('#site_'+site_id).get(0);
		// alert(objTR);
		$('#dialog input[name="upkodesite"]').val( $.trim( objTR.children[1].innerHTML ) );
		$('#dialog input[name="upsite"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="site_id"]').val( $('#site_'+site_id+ ' input[name="site_id"]').val() );
		// $('#dialog input[name="AmbilDarah"]').val( $.trim( objTR.children[4].innerHTML ) );
		
	} 
	
	
	function addasite_submit() {

		var vkodesite = document.propform.kodesite;
		var vsite = document.propform.site;
		// var v = document.propform.;
		// var v = document.propform.;
		
		
		if(vkodesite.value=='' || !(vkodesite.value.length==3) ){
			alert("Kode site harus diisi (Harus 3 Chars).");
			vkodesite.focus();
			return false;
		}
		else if(vsite.value=='' ){
			alert("Nama site harus diisi.");
			vsite.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addsite) && $status_addsite == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data site berhasil');
	});
	<?php } ?>	
	
	function upsite_submit() {

		var vkodesite = document.uppropform.upkodesite;
		var vsite = document.uppropform.upsite;
		// var v = document.uppropform.;
		// var v = document.uppropform.;
		
		
		if(vkodesite.value=='' || !(vkodesite.value.length==3) ){
			alert("Kode site harus diisi (Harus 3 Chars).");
			vkodesite.focus();
			return false;
		}
		else if(vsite.value=='' ){
			alert("Nama site harus diisi.");
			vsite.focus();
			return false;
		}
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upsite) && $status_upsite == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data site berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Jenis Site</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Site</li>
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
								Tambah Site
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Site
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
									<input type="hidden" name="status_addsite" value="0">
									<div class="control-group">
										<label for="site" class="control-label">Nama site</label>
										<div class="controls controls-row">
											<input type="text" name="site" id="site" class="span7" />
									
										</div>
									</div>
									<div class="control-group">
										<label for="kodesite" class="control-label">Kode site</label>
										<div class="controls controls-row">
											<input type="text" name="kodesite" id="kodesite" maxlength="2" class="span1"/>
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addasite_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="10%">Kode site</th>
											<th width="40%">Nama site</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_site as $value):
										?>
											<tr id='site_<?php echo $value['site_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="site_id" value="<?php echo $value['site_id']; ?>" />
												</td>
												<td class='table-date'>
													<?php echo $value['site_kode']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['site_name']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<a href="#" onclick="document.dialog_click('<?php echo $value['site_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['site_id']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" onclick="delete_link('<?php echo $value['site_id']; ?>')" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit site" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="uppropform" class='form-horizontal'>
			<input type="hidden" name="status_upsite" value="0">
			<input type='hidden' name="site_id" />
			<div class="control-group">
				<label for="upsite" class="control-label">Nama site</label>
				<div class="controls controls-row">
					<input type="text" name="upsite" id="upsite" class="span5" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="upkodesite" class="control-label">Kode site</label>
				<div class="controls controls-row">
					<input type="text" name="upkodesite" id="upkodesite" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upsite_submit()" class="button button-basic-blue">Update</button>
			</div>
		</form>
	</div>
</div>