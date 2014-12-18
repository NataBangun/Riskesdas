<script type="text/javascript">

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
        
        
        function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
        }
        
	
	function edit_link_action(t_suser_id) {  
		
		var objTR = $('#userid'+t_suser_id).get(0);
		// alert(objTR);
                
                $('#dialog input[name="user"]').val($.trim(objTR.children[1].innerHTML));
                //$('#dialog input[name="email"]').val($.trim(objTR.children[2].innerHTML));
               $('#dialog input[name="email"]').val( $('#userid'+t_suser_id+ ' input[name="email"]').val() );
                //$('#dialog input[name="pass"]').val($('#bm02_'+t_user_id+'input[name="pass"]').val());
                combobox_select($('#dialog select[name="penelitian"]'), $('#userid'+t_suser_id+ ' input[name="penelitian_id"]').val());
                combobox_select($('#dialog select[name="level"]'), $('#userid'+t_suser_id+ ' input[name="lvl"]').val());
                getCheckedValue($('#dialog select[name="aktif"]'), $('#userid'+t_suser_id+ ' input[name="aktif"]').val());
		
                //$('#dialog input[name="NoStiker"]').val( $.trim( objTR.children[1].innerHTML ) );
		//$('#dialog input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
		//$('#dialog input[name="Alamat"]').val( $.trim( objTR.children[3].innerHTML ) );
		//$('#dialog input[name="TglAmbilDrh"]').val( $.trim( objTR.children[4].innerHTML ) );
		//$('#dialog input[name="bm02_id"]').val( $('#bm02_'+bm02_id+ ' input[name="bm02_id"]').val() );
		//$('#dialog input[name="Prov"]').val( $('#bm02_'+bm02_id+ ' input[name="propinsi_id"]').val() );
		//$('#dialog input[name="Kota"]').val( $('#bm02_'+bm02_id+ ' input[name="kabupaten_id"]').val() );
		//$('#dialog input[name="Kec"]').val( $('#bm02_'+bm02_id+ ' input[name="kecamatan_id"]').val() );  
		//$('#dialog input[name="Desa"]').val( $('#bm02_'+bm02_id+ ' input[name="kelurahan_id"]').val() );
		//$('#dialog input[name="DK"]').val( $('#bm02_'+bm02_id+ ' input[name="DK"]').val() );
		//$('#dialog input[name="KodeSampel"]').val( $('#bm02_'+bm02_id+ ' input[name="kode_sampel"]').val() );
		//$('#dialog input[name="NoSensus"]').val( $('#bm02_'+bm02_id+ ' input[name="no_bangun_sensus"]').val() );
		//$('#dialog input[name="NoUrut"]').val( $('#bm02_'+bm02_id+ ' input[name="no_urut_sampel"]').val() );
		//$('#dialog input[name="NoART"]').val( $('#bm02_'+bm02_id+ ' input[name="noART"]').val() );
		//combobox_select($('#dialog select[name="RiwayatSakit"]'), $('#bm02_'+bm02_id+ ' input[name="riwayat_sakit_berat"]').val());
                //$('#dialog input[name="RiwayatSakit"]').val( $('#bm02_'+bm02_id+ ' input[name="riwayat_sakit_berat"]').val() );
		//$('#dialog input[name="NamaLab"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_lab"]').val() );
		//$('#dialog input[name="PenetasanBuffer"]').val( $('#bm02_'+bm02_id+ ' input[name="time_penetasan_buffer"]').val() );
		//$('#dialog input[name="BacaRDT"]').val( $('#bm02_'+bm02_id+ ' input[name="time_pembacaan_rdt"]').val() );
		//combobox_select($('#dialog select[name="RDT"]'), $('#bm02_'+bm02_id+ ' input[name="hasil_rdt"]').val());
		//$('#dialog input[name="RDT"]').val( $('#bm02_'+bm02_id+ ' input[name="hasil_rdt"]').val() );
		//combobox_select($('#dialog select[name="Tanya1"]'), $('#bm02_'+bm02_id+ ' input[name="art_riwayat_panas"]').val());
		//combobox_select($('#dialog select[name="Tanya2"]'), $('#bm02_'+bm02_id+ ' input[name="duplo"]').val());
                //$('#dialog input[name="Tanya1"]').val( $('#bm02_'+bm02_id+ ' input[name="art_riwayat_panas"]').val() );
		//$('#dialog input[name="Tanya2"]').val( $('#bm02_'+bm02_id+ ' input[name="duplo"]').val() );
		//$('#dialog input[name="TGLEnumerator"]').val( $('#bm02_'+bm02_id+ ' input[name="tgl_enumerator"]').val() );
		//$('#dialog input[name="TGLNakes"]').val( $('#bm02_'+bm02_id+ ' input[name="tgl_nakes"]').val() );
		//$('#dialog input[name="NamaEnumelator"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_enumerator"]').val() );
		//$('#dialog input[name="NamaNakesPendamping"]').val( $('#bm02_'+bm02_id+ ' input[name="nama_nakes"]').val() );
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 750,
			height: 400
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function(t_suser_id) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(bm02_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(t_suser_id);
		}
		//);
	});
	
	function user_submit() {

		var vuser = document.formsuser.user;
		var vpass = document.formsuser.pass;
                //var vpassk = document.formsuser.PasswordK;
                var vmail = document.formsuser.email;
		var vpenelitian = document.formsuser.penelitian;
		var vlvl = document.formsuser.level;
                //var vdatejoin = document.formsuser.DateJoin;
		
		
		if(vuser.value=='' || (vuser.value.length>=250) ){
			alert("User harus diisi");
			vuser.focus();
			return false;
		}
		//else if(vpass.value=='' || (vpass.value.length>=200) ){
		//	alert("Password Harus Diisi.");
		//	vpass.focus();
		//	return false;
		//}
                //else if(vpassk.value=='' || (vpassk.value!=vpass.value) ){
		//	alert("Konfirmasi password harus sama.");
		//	vpassk.focus();
		//	return false;
		//}
                else if(vmail.value=='' || (vmail.value.length>=200) ){
			alert("Email Harus Diisi.");
			vmail.focus();
			return false;
		}
		else if(vpenelitian.selectedIndex==0){
			alert("Kode penelitian harus dipilih.");
			vpenelitian.focus();
			return false;
		}
		else if(vlvl.selectedIndex==0){
			alert("Level Harus di pilih.");
			vlvl.focus();
			return false;
		}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_user) && $status_user == 1) { ?>
	jQuery(document).ready(function(){
		alert('Update data berhasil');
	});
	<?php } ?>
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> List User</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form List User</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List User</span>
				</div>
				<div class="box-body">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<div class="btn-toolbar">
								<div class="btn-group">
									<a href="#" class="button button-basic button-icon" rel="tooltip" title="Refresh results" onclick="reloadPage()"><i class="icon-refresh"></i></a>
								</div>
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong>1-25</strong> of <strong>348</strong></span>
								</div>
								<div class="btn-group">
									<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
									<a href="#" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<table class="table2 table2-striped table2-nomargin table2-mail">
						<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="15%">Nama User</th>
								<th width="25%">Penelitian</th>
								<th width="20%">Level</th>
								<th width="15%" class='table-date'>Tgl Join</th>
                                                                <th width="2%">Aktif</th>
								<th width="15%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_manuser)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form user Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_manuser as $value):
							?>
								<tr id='userid<?php echo $value['t_suser_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="user" value="<?php echo $value['user']; ?>" />
										<input type="hidden" name="pass" value="<?php echo $value['pass']; ?>" />
										<input type="hidden" name="email" value="<?php echo $value['email']; ?>" />
										<input type="hidden" name="penelitian_id" value="<?php echo $value['penelitian_id']; ?>" />
										<input type="hidden" name="lvl" value="<?php echo $value['lvl']; ?>" />
										<input type="hidden" name="date_join" value="<?php echo $value['date_join']; ?>" />
										<input type="hidden" name="aktif" value="<?php echo $value['aktif']; ?>" />
									</td>
									<td class='table-icon'>
										<?php echo $value['user']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['penelitian_name']; ?>
									</td>
									<td>
										<?php echo $value['level_user_name']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['date_join']; ?>
									</td>
                                                                        </td>
									<td class='table-date'>
										<?php echo $value['aktif']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<!--a href="#" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a-->
											<a href="#" class='button button-basic button-icon' rel="tooltip" title="View"><i class="icon-eye-open"></i></a>
											<a href="#" onclick="document.dialog_click('<?php echo $value['t_suser_id']; ?>')" id="dialog-link" data-toggle="modal" class='button button-basic button-icon' rel="tooltip" title="Edit" bm02="<?php echo $value['t_suser_id']; ?>"><i class="icon-exclamation-sign"></i></a>
											<a href="#" class='button button-basic button-icon' rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
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
		<div class="bottom-table">
			<div class="pull-left">
				<a href="#" onclick="goto('form_suser/')" class="button button-basic">Tambah Data</a>
			</div>
			<!--<div class="pull-right"><div class="pagination pagination-custom">
				<ul>
					<li><a href="#"><i class="icon-double-angle-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li class='active'><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><i class="icon-double-angle-right"></i></a></li>
				</ul>
			</div></div>-->
		</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ui-dialog -->
<div id="dialog" title="Form Edit User" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm1" name="formsuser" class='form-horizontal'>
			<input type='hidden' name="t_suser_id" />
			<input type="hidden" name="status_user" value="0">
			<!--<div class="control-group">
				<div class="controls controls-row">
					<label style="width:3%;text-align:left;" for="Prov" class="help-block control-label">
						Prov
					</label>
					<label style="width:3%;margin-left:5%;text-align:left;" for="Kota" class="help-block control-label">
						Kota
					</label>
					<label style="width:4%;margin-left:5%;text-align:left;" for="Kec" class="help-block control-label">
						Kec
					</label>
					<label style="width:4%;margin-left:5%;text-align:left;" for="Desa" class="help-block control-label">
						Desa
					</label>
					<label style="width:3%;margin-left:5%;text-align:left;" for="DK" class="help-block control-label">
						D/K
					</label>
					<label style="width:16%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
						No. Kode Sampel
					</label>
					<label style="width:22%;margin-left:2%;text-align:left;" for="NoSensus" class="help-block control-label">
						No. Bangunan Sensus
					</label>
					<label style="width:8%;margin-left:2%;text-align:left;" for="NoUrut" class="help-block control-label">
						No. Urut
					</label>
				</div>
			</div>
			<div class="control-group">
				<div class="controls controls-row">
					<input style="width:3%;" type="text" name="Prov" id="Prov" maxlength="2" class="span1" />
					<input style="width:3%;margin-left:3%" type="text" name="Kota" id="Kota" maxlength="2" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Kec" id="Kec" maxlength="3" class="span1" />
					<input style="width:4%;margin-left:3%" type="text" name="Desa" id="Desa" maxlength="3" class="span1" />
					<input style="width:2%;margin-left:3%" type="text" name="DK" id="DK" maxlength="1" class="span1" />
					<input style="width:8%;margin-left:4%" type="text" name="KodeSampel" id="KodeSampel" maxlength="7" class="span2" />
					<input style="width:4%;margin-left:8%" type="text" name="NoSensus" id="NoSensus" maxlength="3" class="span1" />
					<input style="width:3%;margin-left:18%" type="text" name="NoUrut" id="NoUrut" maxlength="2" class="span1" />
				</div>
			</div>-->
			<div class="control-group">
				<label for="user" class="control-label">User</label>
				<div class="controls controls-row">
					<input type="text" name="user" id="user" class="span3" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="pass" class="control-label">Password</label>
				<div class="controls controls-row">
                                    <input type="password" name="pass" id="pass" class="span3" placeholder="***********"/>  &nbsp;
                                    <label for="passket" class="span3">
                                    Apabila  password tidak dirubah,lewati saja<label>
			
				</div>
			</div>
                        <div class="control-group">
				<label for="email" class="control-label">Email</label>
				<div class="controls controls-row">
					<input type="text" name="email" id="email" class="span3" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="penelitian" class="control-label">Penelitian</label>
				<div class="controls controls-row">
					<select name="penelitian" id="penelitian" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<?php foreach($arr_penelitian as $value): ?>
                                                <option value="<?php echo $value['penelitian_id']; ?>"><?php echo $value['penelitian_name'] ?></option>
                                                <?php endforeach; ?>
					</select>
				</div>
			</div>
                        <div class="control-group">
					<label for="level" class="control-label">Level</label>
				<div class="controls controls-row">
					<select name="level"" id="level" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<?php foreach($arr_level as $value): ?>
                                                <option value="<?php echo $value['level_user_id']; ?>"><?php echo $value['level_user_name'] ?></option>
                                                <?php endforeach; ?>
					</select>
				</div>
			</div>
			<!--<div class="control-group">
				<label for="date" class="control-label">Tgl Join</label>
				<div class="controls controls-row">
					<input type="text" name="date" id="TglAmbilDrh" placeholder="dd/mm/yyyy" class="span2 datepick" />
				</div>
			</div>-->
			<div class="control-group">
					<label for="aktif" class="control-label">Aktif</label>
				<div class="controls controls-row">
                                    <input type="radio" name="aktif" id="aktif" class="span1"/>
                                        <label for="aktif">Ya</label>
                                    <input type="radio" name="aktif" id="aktif" class="span1"/>
                                        <label for="aktif">Tidak</label>
                                </div>
                                    <!--<input type="radio" name="aktif" id="NamaLab" class="span6"/>T-->
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="user_submit()" class="button button-basic-blue">Simpan</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>