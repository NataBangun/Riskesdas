<script type="text/javascript">
	
        $(document).ajaxStart(function(){ 
          $('#imgtabel').show(); 
        }).ajaxStop(function(){ 
          $('#imgtabel').hide();
        });
        
        $(document).ready(function() {
                        $('#imgtabel').hide();
                        $('#barcodevalid').hide();
	});
        
        function kapasitasRak(idrevco){
            $.ajax({
                url:'<?=$application_path;?>/frmbox/get_kapasitas/'+idrevco,
                complete:function(res,status){
                    $ID('NoRak').innerHTML=res.responseText;
                }
            })
        }
        
        function upkapasitasRak(idrevco){
            $.ajax({
                url:'<?=$application_path;?>/frmbox/get_kapasitas/'+idrevco,
                complete:function(res,status){
                    $ID('upNoRak').innerHTML=res.responseText;
                }
            })
        }
        
        function delete_link(id_box){
            if(confirm('anda yakin akan menghapus data ini ?')){
                goto('frmbox/del/'+id_box);
            }
        }
        
        function ceknol(obj){
            if(obj.value<=9){
                return '0'+obj.value;
            }else{
                return obj.value;
            }
        }
        
        function kabupaten(){
            $.ajax({
				url:'<?php echo $application_path;?>/frmbox/kabupaten/'+$ID('Prov').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_kab').innerHTML=res.responseText;
				}
			});
        }
        
        function autorak(){
            var vhnomorRak=document.box2.hnomorRak;
            var vnomorRak=document.box2.nomorRak;
            var vupNoRak=document.box2.upNoRak;
            
            vnomorRak.value=vupNoRak.value;
            vhnomorRak.value=vupNoRak.value;
            
        }
        
        function nobox(){
            var vnopenelitian = document.box.NoPenelitian;
            var vprov = document.box.Prov;
            var vnorutbox = document.box.norutbox;
            var vjenis = document.box.jenis;
            var vulangan =document.box.Ulangan;
            var vbox = document.box.NoBox;
            var vhbox = document.box.hNoBox;
            
            if(vnopenelitian.selectedIndex == 0){
                vnopenelitian.value = '';
            }
            if(vprov.selectedIndex == 0){
                vprov.value = '';
            }
            if(vjenis.selectedIndex == 0){
                vjenis.value = '';
            }
            
            vbox.value=vnopenelitian.value + vprov.value + vnorutbox.value +vjenis.value + vulangan.value;  
            vhbox.value = vbox.value;
        }
		
        function nobox2(){
            var vnopenelitian = document.box2.upNoPenelitian;
            var vprov = document.box2.upProv;
            var vnorutbox = document.box2.upnorutbox;
            var vjenis = document.box2.upjenis;
            var vulangan =document.box2.upUlangan;
            var vbox = document.box2.upNoBox;
            var vhbox = document.box2.hupNoBox;
            
            if(vnopenelitian.selectedIndex == 0){
                vnopenelitian.value = '';
            }
            if(vprov.selectedIndex == 0){
                vprov.value = '';
            }
            if(vjenis.selectedIndex == 0){
                vjenis.value = '';
            }
            
            vbox.value=vnopenelitian.value + vprov.value + vnorutbox.value +vjenis.value + vulangan.value;  
            vhbox.value = vbox.value;
        }
        
        function combobox_select(obj, value) {
			for (var i=0; i < obj[0].options.length; i++) {
				if (obj[0].options[i].value == value) {
					obj[0].options[i].selected = true;
				}
			}
		}
	
	function edit_link_action(id_box) {  
		
		var objTR = $('#id_box_'+id_box).get(0);
		combobox_select($('#dialog select[name="upNoPenelitian"]').val( $('#id_box_'+id_box+ ' input[name="nopenelitian"]').val()));
		combobox_select($('#dialog select[name="uptypebox"]').val( $('#id_box_'+id_box+ ' input[name="typebox"]').val()));
		combobox_select($('#dialog select[name="upProv"]').val( $.trim( objTR.children[3].innerHTML )));
		$('#dialog input[name="upnorutbox"]').val( $.trim( objTR.children[4].innerHTML ));
		combobox_select($('#dialog select[name="upjenis"]').val( $.trim( objTR.children[5].innerHTML )));
		combobox_select($('#dialog select[name="upIdRevco"]').val( $.trim( objTR.children[8].innerHTML )));
//                combobox_select($('#dialog select[name="upNoRak"]').val( $.trim( objTR.children[9].innerHTML )));
		$('#dialog input[name="hnomorRak"]').val( $.trim( objTR.children[9].innerHTML ));
		$('#dialog input[name="nomorRak"]').val( $.trim( objTR.children[9].innerHTML ));
//                combobox_select($('#dialog select[name="upNoRak"]').val( $('#id_box_'+id_box+ ' input[name="upNoRak"]').val()));
		$('#dialog input[name="upUlangan"]').val( $.trim( objTR.children[6].innerHTML ));
		$('#dialog input[name="hupNoBox"]').val( $.trim( objTR.children[1].innerHTML ));
		$('#dialog input[name="upNoBox"]').val( $.trim( objTR.children[1].innerHTML ));
		
	} 
        
	function addbox_submit() {

		var vnopenelitian = $ID('NoPenelitian');
		var vprov = $ID('Prov');
		var vnorutbox = $ID('norutbox');
		var vjenis = $ID('jenis');
		var vulangan = $ID('Ulangan');
		var vtypebox = $ID('typebox');
		var vidrevco = $ID('IdRevco');
		var vnorak = $ID('NoRak');
		
		if(vnopenelitian.value=='' || vnopenelitian.selectedIndex==0 ){
			alert("Jenis penelitian harus di pilih.");
			vnopenelitian.focus();
			return false;
		}
		else if(vprov.value=='' || vprov.selectedIndex==0 ){
			alert("Provinsi harus di pilih.");
			vprov.focus();
			return false;
		}
		else if(vnorutbox.value=='' || !(vnorutbox.value.length==3 )){
			alert("No urut harus diisi (min 3 character)");
			vnorutbox.focus();
			return false;
		}
		else if(vjenis.value==''){
			alert("Jenis Spesimen harus dipilih");
			vjenis.focus();
			return false;
		}
		else if(vulangan.value=='' || !(vulangan.value.length==1) ){
			alert("Ulangan tidak boleh kosong dan harus 1 digit.");
			vulangan.focus();
			return false;
		}
		else if(vtypebox.value=='' || vtypebox.selectedIndex==0 ){
			alert("typebox harus di pilih.");
			vtypebox.focus();
			return false;
		}
		else if(vidrevco.value=='' || vidrevco.selectedIndex==0 ){
			alert("No Revco Harus Dipilih.");
			vulangan.focus();
			return false;
		}else if(vnorak.value=='' || vnorak.selectedIndex==0 ){
			alert("No.Rak Harus Dipilih.");
			vulangan.focus();
			return false;
		}		
                
		else {
		$.post()
                $ID('frm1').submit();
		// return true;
		}
	}
	<?php if (isset($status_addbox) && $status_addbox == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
	});
	<?php } ?>	
            
        $(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 900,
		});

		document.dialog_click = function(id_box) {			
			$( "#dialog" ).dialog( "open" );
			edit_link_action(id_box);
		}
	});
	
	function updatebox_submit() {

		var vnopenelitian = $ID('upNoPenelitian');
		var vprov = $ID('upProv');
		var vnorutbox = $ID('upnorutbox');
		var vjenis = $ID('upjenis');
		var vulangan = $ID('upUlangan');
		var vtypebox = $ID('uptypebox');
		var vidrevco = $ID('upIdRevco');
		var vnorak = $ID('upNoRak');
		
		if(vnopenelitian.value=='' || vnopenelitian.selectedIndex==0 ){
			alert("Jenis penelitian harus di pilih.");
			vnopenelitian.focus();
			return false;
		}
		else if(vprov.value=='' || vprov.selectedIndex==0 ){
			alert("Provinsi harus di pilih.");
			vprov.focus();
			return false;
		}
		else if(vnorutbox.value=='' || !(vnorutbox.value.length==3 )){
			alert("No urut harus diisi (min 3 character)");
			vnorutbox.focus();
			return false;
		}
		
		else if(vjenis.value==''){
			alert("Jenis Spesimen harus dipilih");
			vjenis.focus();
			return false;
		}
		else if(vulangan.value=='' || !(vulangan.value.length==1) ){
			alert("Ulangan tidak boleh kosong dan harus 1 digit.");
			vulangan.focus();
			return false;
		}
		else if(vtypebox.value=='' || vtypebox.selectedIndex==0 ){
			alert("Provinsi harus di pilih.");
			vtypebox.focus();
			return false;
		}
		else if(vidrevco.value=='' || vidrevco.selectedIndex==0 ){
			alert("No Revco Harus Dipilih.");
			vulangan.focus();
			return false;
		}		
                
		else {
		$.post()
                $ID('frm2').submit();
		// return true;
		}
	}
	
	<?php if (isset($status_upbox) && $status_upbox == 1) { ?>
	jQuery(document).ready(function(){
		alert('Update data berhasil');
	});
	<?php } ?>
	
</script>

<div id="imgtabel" style="width:100%;
	height:100%;
	position:fixed;
	background:rgba(0,0,0,.7);
	z-index:9999;
	top:0;
	left:0;">
	<img style="
	background:rgba(255,255,255,.3);
	border-radius:10px;
	top:50%;
	left:50%;
	position:relative;
	padding:10px;
	box-shadow:0 0 0 5px rgba(0,0,0,.4);
	text-align: center;" src='<?=$application_path;?>/img/spinner.gif'/></div>

<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Master Box</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Master</a><span class="divider">/</span></li>			
			<li class='active'>Box</li>
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
								Tambah Box
							</a>
						</li>
						<li>
							<a href="#list" data-toggle="tab">
								List Box
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
					<form method="POST" id="frm1" name="box" class='form-horizontal'>
						<input type="hidden" name="status_addbox" value="0">
						
						<div class="control-group">
							<label for="NoPenelitian" class="control-label">Jenis Penelitian</label>
							<div class="controls controls-row">
								<select name="NoPenelitian" id="NoPenelitian" class='span3' onchange="nobox()">
									<option> - Silakan Pilih - </option>
									<?php
										foreach($arr_penelitian as $value){
											echo "<option value='$value[penelitian_kode]'>$value[penelitian_id] - $value[penelitian_name] - $value[penelitian_kode]</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="Prov" class="control-label" >Provinsi</label>
							<div class="controls controls-row">
								<select name="Prov" id="Prov" class='span3' onchange="nobox()">
									<option> - Silakan Pilih - </option>
									<?php
										foreach($arr_prov as $value){
											echo "<option value='$value[ID_PROP]'>$value[ID_PROP] - $value[NAMA_PROP]</option>";
										}
									?>
								</select>
						
							</div>
						</div>
                                                
						<div class="control-group">
							<label for="norutbox" class="control-label" >No urut box</label>
							<div class="controls controls-row">
								<input type="text" name="norutbox" id="norutbox" class="span2" maxlength="3" onkeyup="nobox()"/>
						
							</div>
						</div>
						
						<div class="control-group">
								<label for="jenis" class="control-label" >Jenis Spesimen</label>
							<div class="controls controls-row">
								<select name="jenis" id="jenis" class='span3' onchange="nobox();">
									<option> - Silakan Pilih - </option>
									<?php
										foreach($arr_spesimen as $value){
											echo "<option value='$value[spesimen_kode]'>$value[spesimen_kode] - $value[spesimen_name]</option>";
										}
									?>
								</select>
						
							</div>
						</div>
                                                
						<div class="control-group">
							<label for="Ulangan" class="control-label">Ulangan</label>
							<div class="controls controls-row">
								<input type="text" name="Ulangan" id="Ulangan" class="span2" maxlength="1" onkeyup="nobox()"/>
							</div>
						</div>
						<div class="control-group">
							<label for="typebox" class="control-label" >Type Box</label>
							<div class="controls controls-row">
								<select name="typebox" id="typebox" class='span2'>
									<option> - Silakan Pilih - </option>
									<?php
										foreach($arr_typebox as $value){
											echo "<option value='$value[typebox_id]'>$value[typebox_id] - $value[typebox_name]</option>";
										}
									?>
								</select>
						
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">No. Penyimpanan</label>
							<div class="controls controls-row">
								<select name="IdRevco" id="IdRevco" class='span2' onchange="kapasitasRak(this.value)">
									<option value=""> - Pilih No Revco - </option>
									<?php foreach($arr_revco as $value): ?>
									<option value="<?php echo $value['id_revco']; ?>"><?php echo $value['no_revco']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
                                                
						<div class="control-group">
							<label class="control-label">No. Rak</label>
							<div class="controls controls-row">
								<select name="NoRak" id="NoRak" class='span2' >
									<option value=""> - Pilih No Rack - </option>
								</select>
							</div>
						</div>
                                                
						<div class="control-group">
							<label for="NoBox" class="control-label">No. Box</label>
							<div class="controls controls-row">
								<input type="text" name="hNoBox" id="hNoBox" class="span2" disabled="true"/>
									<input type="hidden" name="NoBox" id ="NoBox"/>
							</div>
						</div>
                                                
						<div class="form-actions">
							<button style="padding-left:1%" type="button" onclick="addbox_submit()" class="button button-basic-blue">Simpan</button>
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
							<th width="2%">No.</th>
							<th width="10%">No box</th>
							<th width="10%">Penelitian</th>
							<th width="10%">Propinsi</th>
							<th width="10%">No urut</th>
							<th width="10%">Jenis Spesimen</th>
							<th width="10%">Ulangan</th>
							<th width="10%">TypeBox</th>
							<th width="10%">No revco</th>
							<th width="10%">No Rak</th>
							<th width="15%"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php
							if (empty($arr_box)) {
								echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form box Masih Kosong. </b><center></td></tr>';
							}
						?>
						<?php 
							$no = 1;
							foreach($arr_box as $value):
															   
						?>
							<tr id='id_box_<?php echo $value['id_box']; ?>'>
								<td>
									<?php echo $no ?>
									<input type="hidden" name="id_box" value="<?php echo $value['id_box']; ?>" />
									<input type="hidden" name="nopenelitian" value="<?php echo $value['penelitian_kode']; ?>" />
									<input type="hidden" name="typebox" value="<?php echo $value['typebox_id']; ?>" />
									<input type="hidden" name="upNoRak" value="<?php echo $value['no_rak']; ?>" />
									
									
								</td>
								<td class='table-icon'>
									<?php echo $value['no_box']; ?>
								</td>
								<td class='table-fixed-medium'>
									<?php echo $value['penelitian_name']; ?>
								</td>
								<td class='table-fixed-medium'>
									<?php echo  substr($value['no_box'],2,2);
//                                                                                        echo $value['NAMA_PROP'];?>
								</td>
								<td class='table-fixed-medium'>
									<?php echo substr($value['no_box'],4,3);
	//                                                                                        echo $value['NM_KAB']; ?>
								</td>
								<td class='table-fixed-medium'>
									<?php echo substr($value['no_box'],7,1); ?>
								</td>
								<td class='table-fixed-medium'>
										<?php echo substr($value['no_box'],8,1);?>
								</td>
								<td class='table-fixed-medium'>
										<?php echo $value['typebox_name'];?>
								</td>
								<td class='table-fixed-medium'>
										<?php echo $value['id_revco']; ?>
								</td>
								<td class='table-fixed-medium'>
										<?php echo $value['no_rak']; ?>
								</td>
								<td>
								<center>
									<div class="btn-group">
									<?php
										if (!($level == 3))
										echo"
										<a href=\"#\" onclick=\"document.dialog_click('{$value['id_box']}');document.box2.id_box.value=$value[id_box]\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_box=\"{$value['id_box']}\"><i class=\"icon-exclamation-sign\"></i></a>
										<a href=\"#\" onclick=\"delete_link('{$value['id_box']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
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

<div id="dialog" title="Form Edit Revco" style="z-index:99999;">
	<div class="box-body">
            <form method="POST" id="frm2" name="box2" class='form-horizontal'>
                <input type="hidden" name="id_box"/>
						<input type="hidden" name="status_upbox" value="0">
						
						<div class="control-group">
							<label for="upNoPenelitian" class="control-label">Jenis Penelitian</label>
							<div class="controls controls-row">
                                                            <select name="upNoPenelitian" id="upNoPenelitian" class='span3' onchange="nobox2()">
									<option> - Silakan Pilih - </option>
									<?php
                                                                        foreach($arr_penelitian as $value){
                                                                            echo "<option value='$value[penelitian_kode]'>$value[penelitian_id] - $value[penelitian_name] - $value[penelitian_kode]</option>";
                                                                        }
                                                                        ?>
								</select>
							</div>
						</div>
						<div class="control-group">
								<label for="upProv" class="control-label" >Provinsi</label>
							<div class="controls controls-row">
                                                            <select name="upProv" id="upProv" class='span3' onchange="nobox2()">
									<option> - Silakan Pilih - </option>
									<?php
                                                                        foreach($arr_prov as $value){
                                                                            echo "<option value='$value[ID_PROP]'>$value[ID_PROP] - $value[NAMA_PROP]</option>";
                                                                        }
                                                                        ?>
								</select>
						
							</div>
						</div>
                                                
                                                <div class="control-group">
								<label for="upnorutbox" class="control-label" >No urut box</label>
							<div class="controls controls-row">
                                                            <input type="text" name="upnorutbox" id="upnorutbox" class="span2" maxlength="3" onkeyup="nobox2()"/>
						
							</div>
						</div>
						
						<div class="control-group">
								<label for="upjenis" class="control-label" >Jenis Spesimen</label>
							<div class="controls controls-row">
                                                            <select name="upjenis" id="upjenis" class='span3' onchange="nobox2();">
									<option> - Silakan Pilih - </option>
									<?php
                                                                        foreach($arr_spesimen as $value){
                                                                            echo "<option value='$value[spesimen_kode]'>$value[spesimen_kode] - $value[spesimen_name]</option>";
                                                                        }
                                                                        ?>
								</select>
						
							</div>
						</div>
                                                
                                                <div class="control-group">
								<label for="upUlangan" class="control-label">Ulangan</label>
							<div class="controls controls-row">
                                                            <input type="text" name="upUlangan" id="upUlangan" class="span2" maxlength="1" onkeyup="nobox2()"/>
                                                        </div>
						</div>
                                                <div class="control-group">
								<label for="uptypebox" class="control-label" >Type Box</label>
							<div class="controls controls-row">
                                                            <select name="uptypebox" id="uptypebox" class='span2'>
									<option> - Silakan Pilih - </option>
									<?php
                                                                        foreach($arr_typebox as $value){
                                                                            echo "<option value='$value[typebox_id]'>$value[typebox_id] - $value[typebox_name]</option>";
                                                                        }
                                                                        ?>
								</select>
						
							</div>
						</div>

						<div class="control-group">
								<label class="control-label">No. Penyimpanan</label>
							<div class="controls controls-row">
								<select name="upIdRevco" id="upIdRevco" class='span2' onchange="upkapasitasRak(this.value)">
                                                                        <option value=""> - Pilih No Revco - </option>
                                                                        <?php foreach($arr_revco as $value): ?>
                                                                        <option value="<?php echo $value['id_revco']; ?>"><?php echo $value['no_revco']; ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
							</div>
						</div>
                                                
                                                <div class="control-group">
								<label class="control-label">No. Rak</label>
							<div class="controls controls-row">
								<select name="upNoRak" id="upNoRak" class='span2'  onchange="autorak()">
                                                                            <option value=""> - Pilih No Rack - </option>
                                                                
                                                                </select>
                                                            
                                                            <input type="text" name="hnomorRak" id="hnomorRak" class="span1" disabled="true"/>
                                                            <input type="hidden" name="nomorRak" id ="nomorRak"/>
							</div>
						</div>
                                                
                                                <div class="control-group">
								<label for="upNoBox" class="control-label">No. Box</label>
							<div class="controls controls-row">
								<input type="text" name="hupNoBox" id="hNoBox" class="span2" disabled="true"/>
                                                                <input type="hidden" name="upNoBox" id ="NoBox"/>
							</div>
						</div>
                                                
						<div class="form-actions">
                                                    <button style="padding-left:1%" type="button" onclick="updatebox_submit()" class="button button-basic-blue">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
            	</div>
</div>