<script type="text/javascript">
	
	function addsuser_submit() {

		var vuser = document.formsuser.User;
		var vpass = document.formsuser.Password;
                var vpassk = document.formsuser.PasswordK;
                var vmail = document.formsuser.Email;
		var vpenelitian = document.formsuser.Penelitian;
		var vlvl = document.formsuser.Lvl;
                var vdatejoin = document.formsuser.DateJoin;
		
		var vaktif = document.formsuser.Aktif;
		
		// var v = document.formsuser.;
		// var v = document.formsuser.;
		
		
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
	
</script>

<div class="page-header">
	<div class="pull-left">
		<h4>Form Manajemen User</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Manajemen User</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Manajemen User</span>
				</div>
				<!--<div class="box-body box-body-nopadding">-->
				<div class="box-body">
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
						<div class="control-group">
								<label for="Penelitian" class="control-label">Penelitian</label>
							<div class="controls controls-row">
								<select name="Penelitian" id="Penelitian">
                                                                        <option> - Silakan Pilih Penelitian - </option>
                                                                        <?php foreach($arr_penelitian as $value): ?>
                                                                        <option value="<?php echo $value['penelitian_id']; ?>"><?php echo $value['penelitian_name']." ($value[penelitian_kode])" ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
								
						
							</div>
						</div>
                                                <div class="control-group">
								<label for="Lvl" class="control-label">Hak Akses</label>
							<div class="controls controls-row">
								<select name="Lvl" id="Lvl" >
                                                                        <option> - Silakan Pilih Hak Akses - </option>
                                                                        <?php foreach($arr_level as $value): ?>
                                                                        <option value="<?php echo $value['level_user_id']; ?>"><?php echo $value['level_user_name'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
								
						
							</div>
						</div>
                                                <input name="DateJoin" type="hidden" value="<? date("Y-m-d");?>"/>
						<div class="control-group">
							<label for="Aktif" class="control-label">Aktif</label>
							<div class="controls controls-row">
                                                            <input type="radio" name="Aktif" value="Y" checked />Ya
                                                            <input type="radio" name="Aktif" value="T" />Tidak								
							</div>
						</div>

						<div class="form-actions">
							<button style="padding-left:1%" type="button" onclick="addsuser_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
