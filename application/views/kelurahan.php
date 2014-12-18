<script type="text/javascript">
	
	$(document).ready(function() {
		// var vNoStiker = $ID('NoStiker').value;

			$ID('kodepropinsi').focus();
	});
        
        function kabupaten(){
            $.ajax({
				url:'<?php echo $application_path;?>/kelurahan/kabupaten/'+$ID('kodepropinsi').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_kota').innerHTML=res.responseText;
				}
			});
        }
        function kecamatan(){
			$.ajax({
				url:'<?php echo $application_path;?>/kelurahan/kecamatan/'+$ID('kodepropinsi').value+'/'+$ID('kodekabupaten').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_kec').innerHTML=res.responseText;
				}
			});
		}
        function upkabupaten(){
            $.ajax({
				url:'<?php echo $application_path;?>/kelurahan/upkabupaten/'+$ID('upkodepropinsi').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_upkota').innerHTML=res.responseText;
					
				}
			});
        }
        function upkecamatan(){
			$.ajax({
				url:'<?php echo $application_path;?>/kelurahan/upkecamatan/'+$ID('upkodepropinsi').value+'/'+$ID('upkodekabupaten').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_upkec').innerHTML=res.responseText;
				}
			});
		}
	
	function delete_link(ID_KEL) {
		if (confirm('Apakah anda yakin akan menghapus data ini? ')) {
			goto('kelurahan/del/' + ID_KEL);
		}
	}
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 800,
			height: 400,
			});
			
		document.dialog_click = function( ID_KEL ) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(ID_KEL);
		}
	});
        
        function autokab(){
            var vhupkodekab=document.upkelform.hupkodekab;
            var vupkodekab=document.upkelform.upkodekab;
            var vupkodekabupaten=document.upkelform.upkodekabupaten;
            
            vhupkodekab.value=vupkodekabupaten.value;
            vupkodekab.value=vupkodekabupaten.value;
            
        }
        function autokec(){
            var vhupkodekec=document.upkelform.hupkodekec;
            var vupkodekec=document.upkelform.upkodekec;
            var vupkodekecamatan=document.upkelform.upkodekecamatan;
            
            vhupkodekec.value=vupkodekecamatan.value;
            vupkodekec.value=vupkodekecamatan.value;
            
        }
        
        function combobox_select(obj, value) {
			for (var i=0; i < obj[0].options.length; i++) {
				if (obj[0].options[i].value == value) {
					obj[0].options[i].selected = true;
				}
			}
		}
	
	function edit_link_action(ID_KEL) {  
		
		var objTR = $('#kel_'+ID_KEL).get(0);
		// alert(objTR);
		combobox_select($('#dialog select[name="upkodepropinsi"]').val( $.trim( objTR.children[1].innerHTML )));
//		combobox_select($('#dialog select[name="upkodekabupaten"]').val( $.trim( objTR.children[2].innerHTML )));
		$('#dialog input[name="hupkodekab"]').val( $.trim( objTR.children[2].innerHTML ) );
		$('#dialog input[name="upkodekab"]').val( $.trim( objTR.children[2].innerHTML ) );
//		combobox_select($('#dialog select[name="upkodekecamatan"]').val( $.trim( objTR.children[3].innerHTML )));
		$('#dialog input[name="hupkodekec"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="upkodekec"]').val( $.trim( objTR.children[3].innerHTML ) );
		$('#dialog input[name="hupkodekelurahan"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog input[name="upkodekelurahan"]').val( $.trim( objTR.children[4].innerHTML ) );
		$('#dialog input[name="upnamakelurahan"]').val( $.trim( objTR.children[5].innerHTML ) );
		
	} 
	
	
	function addakelurahan_submit() {

		var vkodepropinsi = document.kelform.kodepropinsi;
		var vkodekabupaten = document.kelform.kodekabupaten;
		var vkodekecamatan = document.kelform.kodekecamatan;
		var vkodekelurahan = document.kelform.kodekelurahan;
		var vnamakelurahan = document.kelform.namakelurahan;
		
		
		if(vkodepropinsi.value==''){
			alert("Kode Propinsi harus diisi.");
			vkodepropinsi.focus();
			return false;
		}
		else if(vkodekabupaten.value=='' ){
			alert("Kode kabupaten harus diisi.");
			vkodekabupaten.focus();
			return false;
		}
		else if(vkodekecamatan.value==''){
			alert("Kode kecamatan harus diisi");
			vkodekecamatan.focus();
			return false;
		}
		else if(vkodekelurahan.value==''){
			alert("Kode kecamatan harus diisi");
			vkodekecamatan.focus();
			return false;
		}
		else if(vnamakelurahan.value=='' ){
			alert("nama kecamatan harus diisi");
			vnamakelurahan.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addkelurahan) && $status_addkelurahan == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data kelurahan berhasil');
	});
	<?php } ?>	
	
	function upakelurahan_submit() {

		var vupkodepropinsi = document.upkelform.upkodepropinsi;
		var vupkodekelurahan = document.upkelform.upkodekelurahan;
		var vupnamakelurahan = document.upkelform.upnamakelurahan;
		// var v = document.upkelform.;
		// var v = document.upkelform.;
		
		
//		if(vkodekelurahan.value=='' || !(vkodekelurahan.value.length==2) ){
//			alert("Kode kelurahan harus diisi (Harus 2 Chars).");
//			vkodekelurahan.focus();
//			return false;
//		}
		if(vupkodepropinsi.value=='' ){
			alert("kode propinsi harus dipilih.");
			vupkodepropinsi.focus();
			return false;
		}
		else if(vupkodekelurahan.value=='' ){
			alert("kode kelurahan harus diisi.");
			vupkodekelurahan.focus();
			return false;
		}
		else if(vupnamakelurahan.value=='' ){
			alert("Nama kelurahan harus diisi.");
			vupnamakelurahan.focus();
			return false;
		}
		
		else {
		
		$ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upkelurahan) && $status_upkelurahan == 1) { ?>
	jQuery(document).ready(function(){
		alert('Data kelurahan berhasil di perbaharui.');
	});
	<?php } ?>	
	
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master kelurahan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>kelurahan</li>
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
								Tambah kelurahan
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List kelurahan
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
								<form method="POST" id="frm1" name="kelform" class='form-horizontal'>
									<input type="hidden" name="status_addkelurahan" value="0">
									<div class="control-group">
										<label for="KodePropinsi" class="control-label">Kode Propinsi</label>
										<div class="controls controls-row">
											<div class="input-xxlarge">
												<!--input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="2" class="span1"/-->
												<select name="kodepropinsi" id="kodepropinsi" class='chosen-select' onchange="kabupaten(this.value),kecamatan(this.value)" >
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
												<!--input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="2" class="span1"/-->
												<select name="kodekabupaten" id="kodekabupaten" onchange="kecamatan(this.value)">
													
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="kodekecamatan" class="control-label">Kode Kecamatan</label>
										<div class="controls controls-row">
											<div class="input-xxlarge" id="div_kec">
												<!--input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="2" class="span1"/-->
												<select name="kodekecamatan" id="kodekecamatan">
												
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="kodekelurahan" class="control-label">Kode kelurahan</label>
										<div class="controls controls-row">
											<input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="3" class="span1"/>
										</div>
									</div>
									<div class="control-group">
											<label for="namakelurahan" class="control-label">Nama kelurahan</label>
										<div class="controls controls-row">
											<input type="text" name="namakelurahan" id="namakelurahan" class="span7" />
										</div>
									</div>
<!--									<div class="control-group">
										<label for="nks" class="control-label">Kode NKS</label>
										<div class="controls controls-row">
											<input type="text" name="nks" id="cks" maxlength="15" class="span2"/>
										</div>
									</div>-->
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addakelurahan_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="15%">Kode kecamatan</th>
											<th width="15%">Kode kelurahan</th>
											<th width="15%">Nama kelurahan</th>
											<th width="11%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<!--?php
											if (empty($arr_kab)) {
												echo '<tr><td colspan="6" style="color:red;"><center><b> Data kelurahan Masih Kosong. </b><center></td></tr>';
											}
										?-->
										<?php 
											$no = 1;
											foreach($arr_kel as $value):
										?>
											<tr id='kel_<?php echo $value['ID_KEL']; ?>'>
												<td>
													<?php echo $no ?>
												</td>
												<td class='table-icon'>
													<?php echo $value['ID_PROP']; ?>
												</td>
												<td class='table-icon'>
													<?php echo $value['ID_KAB']; ?>
												</td>
												<td class='table-icon'>
													<?php echo $value['ID_KEC']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['ID_KEL']; ?>
												</td>
												<td class='table-date'>
													<?php echo $value['NM_KEL']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<!--a href="#" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a>
														<a href="#" class='button button-basic button-icon' rel="tooltip" title="View"><i class="icon-eye-open"></i></a-->
														<a href="#" onclick="document.dialog_click('<?php echo $value['ID_KEL']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['ID_KEL']; ?>"><i class="icon-exclamation-sign"></i></a>
														<a href="#" class='button button-basic button-icon' rel="tooltip" title="Delete" onclick="delete_link('<?php echo $value['ID_KEL'];?>')"><i class="icon-trash"></i></a>
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
<div id="dialog" title="Form Edit kelurahan" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="upkelform" class='form-horizontal'>
			<input type="hidden" name="status_upkelurahan" value="0">
			<div class="control-group">
				<label for="upkodepropinsi" class="control-label">Kode Propinsi</label>
				<div class="controls controls-row">
					<div class="input-xxlarge">
						<!--input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="2" class="span1"/-->
						<select name="upkodepropinsi" id="upkodepropinsi" onchange="upkabupaten(this.value),upkecamatan(this.value)">
							<option value=""> - Pilih Kode Propinsi - </option>
							<?php foreach($arr_prov as $value): ?>
							<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label for="upkodekabupaten" class="control-label">Kode Kabupaten</label>
				<div class="controls controls-row">
					<div class="input-xxlarge" id="div_upkota">
						<!--input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="2" class="span1"/-->
						<select name="upkodekabupaten" id="upkodekabupaten" onchange="upkecamatan(),autokab()">
						
						</select>
                                        </div>
                                </div>
                                    <div class="controls controls-row">
                                                <input type="text" name="hupkodekab" id="hupkodekab" class="span1" disabled="true"/>
                                                 <input type="hidden" name="upkodekab" id ="upkodekab"/>
					</div>
				</div>
			
			<div class="control-group">
				<label for="upkodekecamatan" class="control-label">Kode Kecamatan</label>
				<div class="controls controls-row">
					<div class="input-xxlarge" id="div_upkec">
						<!--input type="text" name="kodekelurahan" id="kodekelurahan" maxlength="2" class="span1"/-->
						<select name="upkodekecamatan" id="upkodekecamatan" onchange="autokec()">
	
						</select>
					</div>
                                </div>
                                    <div class="controls controls-row">
                                     <input type="text" name="hupkodekec" id="hupkodekec" class="span1" disabled="true"/>
                                     <input type="hidden" name="upkodekec" id ="upkodekec"/>
				</div>
			</div>
			<div class="control-group">
				<label for="upkodekelurahan" class="control-label">Kode kelurahan</label>
				<div class="controls controls-row">
					<input type="text" name="hupkodekelurahan" id="hupkodekelurahan" maxlength="2" class="span1" disabled/>
					<input type="hidden" name="upkodekelurahan" id="upkodekelurahan" maxlength="2" class="span1"/>
				</div>
			</div>
			<div class="control-group">
					<label for="upnamakelurahan" class="control-label">Nama kelurahan</label>
				<div class="controls controls-row">
					<input type="text" name="upnamakelurahan" id="upnamakelurahan" class="span6" />
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="upakelurahan_submit()" class="button button-basic-blue">Update</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>