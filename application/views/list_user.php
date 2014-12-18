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
        
	
	function delete_link(t_suser_id) {
		if (confirm('Apakah akin? ')) {
			goto('list_user/del/' + t_suser_id);
		}
	}
	
	function edit_link_action(t_suser_id) {  
		
		var objTR = $('#userid'+t_suser_id).get(0);
		// alert(objTR);
                
		$('#dialog input[name="user"]').val($.trim(objTR.children[1].innerHTML));
		//$('#dialog input[name="email"]').val($.trim(objTR.children[2].innerHTML));
		$('#dialog input[name="t_suser_id"]').val( $('#userid'+t_suser_id+ ' input[name="userid"]').val() );
		$('#dialog input[name="email"]').val( $('#userid'+t_suser_id+ ' input[name="email"]').val() );
		//$('#dialog input[name="pass"]').val($('#bm02_'+t_user_id+'input[name="pass"]').val());
		combobox_select($('#dialog select[name="penelitian"]'), $('#userid'+t_suser_id+ ' input[name="penelitian_id"]').val());
		combobox_select($('#dialog select[name="level"]'), $('#userid'+t_suser_id+ ' input[name="lvl"]').val());
		getCheckedValue($('#dialog select[name="aktif"]'), $('#userid'+t_suser_id+ ' input[name="aktif"]').val());
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 550,
			height: 420
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
										<input type="hidden" name="userid" value="<?php echo $value['t_suser_id']; ?>" />
										<input type="hidden" name="pass" value="<?php echo $value['pass']; ?>" />
										<input type="hidden" name="email" value="<?php echo $value['email']; ?>" />
										<input type="hidden" name="penelitian_id" value="<?php echo $value['penelitian_kode']; ?>" />
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
									<td class='table-date'>
										<?php echo $value['aktif']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<!--a href="#" class='button button-basic button-icon' rel="tooltip" title="Print"><i class="icon-print"></i></a-->
											<a href="#" class='button button-basic button-icon' rel="tooltip" title="View"><i class="icon-eye-open"></i></a>
											<?php
											var_dump( $level);
											if (!($level == 3))
											echo"
											<a href=\"#\" onclick=\"document.dialog_click('{$value['t_suser_id']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm02=\"{$value['t_suser_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
											<a href=\"#\" onclick=\"delete_link('{$value['t_suser_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
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
			<div class="control-group">
				<label for="penelitian" class="control-label">Penelitian</label>
				<div class="controls controls-row">
					<select name="penelitian" id="penelitian" class='span3'>
						<option value="0"> - Silakan Pilih - </option>
						<?php foreach($arr_penelitian as $value): ?>
						<option value="<?php echo $value['penelitian_kode']; ?>"><?php echo $value['penelitian_name'] ?></option>
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