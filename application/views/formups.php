<script type="text/javascript">
	
    function penelitian(){
        $.ajax({
            url:'<?php echo $application_path;?>/formuser/peneliti/'+document.getElementById('Lab').value,
            complete: function(res, status){
                //var kotak = res.responseText;
                document.getElementById('div_penelitian').innerHTML=res.responseText;
            }
        });
    }
    
	function addsuser_submit() {

		var vuser = document.formsuser.User;
		var vpass = document.formsuser.Password;
		var vpassk = document.formsuser.PasswordK;
		var vmail = document.formsuser.Email;
//		var vpenelitian = document.formsuser.Penelitian;
//		var vlvl = document.formsuser.Lvl;
		var vdatejoin = document.formsuser.DateJoin;
		var vaktif = document.formsuser.Aktif;		
		
		if(vuser.value=='' || (vuser.value.length>=250) ){
			alert("User harus diisi");
			vuser.focus();
			return false;
		}
		else if(vpass.value=='' || (vpass.value.length>=200) ){
			alert("Password Harus Diisi.");
			vpass.focus();
			return false;
		}
                else if(vpassk.value=='' || (vpassk.value!=vpass.value) ){
			alert("Konfirmasi password harus sama.");
			vpassk.focus();
			return false;
		}
                else if(vmail.value=='' || (vmail.value.length>=200) ){
			alert("Email Harus Diisi.");
			vmail.focus();
			return false;
		}
//		else if(vpenelitian.selectedIndex==0){
//			alert("Kode penelitian harus dipilih.");
//			vpenelitian.focus();
//			return false;
//		}
//		else if(vlvl.selectedIndex==0){
//			alert("Level Harus di pilih.");
//			vlvl.focus();
//			return false;
//		}
//		else if(vdatejoin.value==''){
//			alert("D/K harus diisi (Harus 1 Chars (D atau K)).");
//			vdatejoin.focus();
//			return false;
//		}
//		else if(vlastlogin.value=='' || !(vlastlogin.value.length==7 )){
//			alert("Kode Sampel harus diisi (Harus 6 Chars).");
//			vlastlogin.focus();
//			return false;
//		}
		//else if(vaktif.value=='' ){
		//	alert("Kode Sampel harus diisi (Harus 3 Chars).");
		//	vaktif.focus();
		//	return false;
                //}
		else {
		
		$ID('frm1').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_addsuser) && $status_addsuser == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
	
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
        
	
	function delete_link(ups_user_id) {
		if (confirm('Apakah akin? ')) {
			goto('list_user/del/' + ups_user_id);
		}
	}
	
	function edit_link_action(ups_user_id) {  
		
		var objTR = $('#userid'+ups_user_id).get(0);
		// alert(objTR);
                
		$('#dialog input[name="user"]').val($.trim(objTR.children[1].innerHTML));
		//$('#dialog input[name="email"]').val($.trim(objTR.children[2].innerHTML));
		$('#dialog input[name="ups_user_id"]').val( $('#userid'+ups_user_id+ ' input[name="userid"]').val() );
		$('#dialog input[name="email"]').val( $('#userid'+ups_user_id+ ' input[name="email"]').val() );
		//$('#dialog input[name="pass"]').val($('#bm02_'+t_user_id+'input[name="pass"]').val());
		combobox_select($('#dialog select[name="penelitian"]'), $('#userid'+ups_user_id+ ' input[name="penelitian_id"]').val());
		combobox_select($('#dialog select[name="lepel"]'), $('#userid'+ups_user_id+ ' input[name="lvl"]').val());
		getCheckedValue($('#dialog select[name="aktif"]'), $('#userid'+ups_user_id+ ' input[name="aktif"]').val());
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 550,
			height: 350
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function(ups_user_id) {			
			$( "#dialog" ).dialog( "open" );
			
			edit_link_action(ups_user_id);
		}
	});
	
	function user_submit() {

		var vuser = document.formuserup.user;
		var vpass = document.formuserup.pass;
		//var vpassk = document.formuserup.PasswordK;
		var vmail = document.formuserup.email;
		//var vpenelitian = document.formuserup.penelitian;
		//var vlvl = document.formuserup.lepel;
		//var vdatejoin = document.formuserup.DateJoin;
		
		if(vuser.value=='' || (vuser.value.length>=250) ){
			alert("User harus diisi");
			vuser.focus();
			return false;
		}
        else if(vmail.value=='' || (vmail.value.length>=200) ){
			alert("Email Harus Diisi.");
			vmail.focus();
			return false;
		}
//		else if(vpenelitian.selectedIndex==0){
//			alert("Kode penelitian harus dipilih.");
//			vpenelitian.focus();
//			return false;
//		}
//		else if(vlvl.selectedIndex==0){
//			alert("Level Harus di pilih.");
//			vlvl.focus();
//			return false;
//		}
		else {
		$ID('frm2').submit();
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
		<h4>Form Manajemen User UPS</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Manajemen User UPS</li>
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
								Tambah User UPS
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List User UPS
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
							
								<form method="POST" id="frm1" name="formsuser" class='form-horizontal'>
									<input type="hidden" name="status_addsuser" value="0">
									
									<div class="control-group">
										<label for="User" class="control-label">User</label>
										<div class="controls controls-row">
											<input type="text" name="User" id="User" class="span5" />
									
										</div>
									</div>
									<div class="control-group">
											<label for="Password" class="control-label">Password</label>
										<div class="controls controls-row">
											<input type="password" name="Password" id="Password" class="span5"/>
									
										</div>
									</div>
									<div class="control-group">
										<label for="PasswordK" class="control-label">Konfirmasi Password</label>
										<div class="controls controls-row">
										<input type="password" name="PasswordK" id="PasswordK" class="span5"/>
									
										</div>        
									</div>
									<div class="control-group">
											<label for="Email" class="control-label">Email</label>
										<div class="controls controls-row">
											<input type="text" name="Email" id="Email" class="span5"/>
									
										</div>        
									</div>
									<!--
									<div class="control-group">
										<label for="Lab" class="control-label">Laboraturium</label>
										<div class="controls controls-row">
				                            <select name="Lab" id="Lab" onchange="penelitian(this.value)">
												<option value=""> - Silakan Pilih Laboraturium - </option>
												<!?php foreach($arr_lab as $value): ?>
												<option value="<!?php echo $value['LAB_CODE']; ?>"><!?php echo $value['LAB_NAME'] ?></option>
												<!?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="control-group">
											<label for="Penelitian" class="control-label">Penelitian</label>
										<div class="controls controls-row" id="div_penelitian">
											<select name="Penelitian" id="Penelitian">
												<option> - Silakan Pilih Penelitian - </option>
											</select>
										</div>
									</div>
									<div class="control-group">
											<label for="Lvl" class="control-label">Hak Akses</label>
										<div class="controls controls-row">
											<select name="Lvl" id="Lvl" >
												<option> - Silakan Pilih Hak Akses - </option>
												<!?php foreach($arr_level as $value): ?>
												<option value="<!?php echo $value['level_user_id']; ?>"><!?php echo $value['level_user_name'] ?></option>
												<!?php endforeach; ?>
											</select>
										</div>
									</div>
									-->
									<div class="control-group">
										<label for="Aktif" class="control-label">Aktif</label>
										<div class="controls controls-row">
											<label class='radio-uniformed'>
												<input class='uniform-me' type="radio" name="Aktif" value="Y" checked />Ya
											</label>
											<label class='radio-uniformed'>
												<input style="margin-left: 2.5641%;" class='uniform-me' type="radio" name="Aktif" value="T" />Tidak								
											</label>
										</div>
									</div>
									<div class="form-actions">
										<button style="padding-left:1%" type="button" onclick="addsuser_submit()" class="button button-basic-blue">Simpan</button>
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
											<th width="15%">Nama User</th>
											<th width="15%" class='table-date'>Tgl Join</th>
											<th width="2%">Aktif</th>
											<th width="15%"><center>Action</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											foreach($arr_userups as $value):
										?>
											<tr id='userid<?php echo $value['ups_user_id']; ?>'>
												<td>
													<?php echo $no ?>
													<input type="hidden" name="userid" value="<?php echo $value['ups_user_id']; ?>" />
													<input type="hidden" name="pass" value="<?php echo $value['pass']; ?>" />
													<input type="hidden" name="email" value="<?php echo $value['email']; ?>" />
													<input type="hidden" name="date_join" value="<?php echo $value['date_join']; ?>" />
													<input type="hidden" name="aktif" value="<?php echo $value['aktif']; ?>" />
												</td>
												<td class='table-icon'>
													<?php echo $value['user']; ?>
												</td>
												<td class='table-date'>
													<?php echo $value['date_join']; ?>
												</td>
												<td class='table-date'>
													<?php echo $value['aktif']; ?>
												</td>
												<td>
												<center>
													<div class="btn-group">
														<?php
														// var_dump( $level);
														if (!($level == 3))
														echo"
														<a href=\"#\" onclick=\"document.dialog_click('{$value['ups_user_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm02=\"{$value['ups_user_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
														<a href=\"#\" onclick=\"delete_link('{$value['ups_user_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
														";
														?>
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
<div id="dialog" title="Form Edit User" style="z-index:99999;">
	<div class="box-body">
		<form method="POST" id="frm2" name="formuserup" class='form-horizontal'>
			<input type='hidden' name="ups_user_id" />
			<input type="hidden" name="status_user" value="0">
			<div class="control-group">
				<label for="user" class="control-label">User</label>
				<div class="controls controls-row">
					<input type="text" name="user" id="user" class="span3" />
			
				</div>
			</div>
			<div class="control-group">
					<label for="pass" class="control-label">Password</label>
				<div class="controls">
					<input type="password" name="pass" id="pass" class="span3" placeholder="***********"/>
					<span class="help-block">
						<code>Apabila  password tidak dirubah,lewati saja.</code>
					</span>
			
				</div>
			</div>
				<div class="control-group">
				<label for="email" class="control-label">Email</label>
				<div class="controls controls-row">
					<input type="text" name="email" id="email" class="span3" />
				</div>
			</div>
			<!--
			<div class="control-group">
				<label for="penelitian" class="control-label">Penelitian</label>
				<div class="controls controls-row">
					<select name="penelitian" id="penelitian" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<!?php foreach($arr_penelitian as $value): ?>
						<option value="<!?php echo $value['penelitian_kode']; ?>"><!?php echo $value['penelitian_name'] ?></option>
						<!?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="lepel" class="control-label">Level</label>
				<div class="controls controls-row">
					<select name="lepel" id="lepel" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<!?php foreach($arr_level as $value): ?>
						<option value="<!?php echo $value['level_user_id']; ?>"><!?php echo $value['level_user_name'] ?></option>
						<!?php endforeach; ?>
					</select>
				</div>
			</div>
			-->
			<!--<div class="control-group">
				<label for="date" class="control-label">Tgl Join</label>
				<div class="controls controls-row">
					<input type="text" name="date" id="TglAmbilDrh" placeholder="dd/mm/yyyy" class="span2 datepick" />
				</div>
			</div>-->
			<div class="control-group">
					<label for="aktif" class="control-label">Aktif</label>
				<div class="controls controls-row">
					<label class='radio-uniformed'>
						<input class='uniform-me' type="radio" name="aktif" id="aktif" value="Y" />Ya
					</label>
					<label class='radio-uniformed'>
						<input style="margin-left: 2.5641%;" class='uniform-me' type="radio" name="aktif" id="aktif" value="T" />Tidak								
					</label>
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" onclick="user_submit()" class="button button-basic-blue">Simpan</button>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			</div>
		</form>
	</div>
</div>