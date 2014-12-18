<script type="text/javascript">
    
    function delete_link(id_revco){
            if(confirm('anda yakin akan menghapus data ini ?')){
                goto('list_revco/del/'+id_revco);
            }
    }
	
	function ceknol(obj){
		if(obj.value<=9){
			return '0'+obj.value;
		}else{
			return obj.value;
		}
	}
        
        function norevco(){
            var vnolab = document.frmrevco.Lab;
            var vnourut = document.frmrevco.NoUrut;
            var vjenis = document.frmrevco.jenisrev;
            var vhrevco = document.frmrevco.hNoRevco;
            var vrevco =document.frmrevco.NoRevco;
            if(vnolab.selectedIndex == 0){
                vnolab.value = '';
            }
            if(vjenis.selectedIndex ==0){
                vjenis.value = '';
            }
            vrevco.value=ceknol(vnolab) + vnourut.value + vjenis.value;  
            vhrevco.value = vrevco.value;
        }
        

	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
	
	function edit_link_action(id_revco) {  
		
		var objTR = $('#id_revco_'+id_revco).get(0);
		// alert(objTR);
                $('#dialog input[name="hNoRevco"]').val( $.trim( objTR.children[1].innerHTML ));
		$('#dialog input[name="NoRevco"]').val( $.trim( objTR.children[1].innerHTML ));
		combobox_select($('#dialog select[name="Lab"]').val( $('#id_revco_'+id_revco+ ' input[name="Lab"]').val()));
                $('#dialog input[name="NoUrut"]').val( $.trim( objTR.children[3].innerHTML ) );
		combobox_select($('#dialog select[name="jenisrev"]').val( $('#id_revco_'+id_revco+ ' input[name="jenisrev"]').val()));
		$('#dialog input[name="kapasitas_rak"]').val( $.trim( objTR.children[5].innerHTML ) );
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 900,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function(id_revco) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(bm02_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(id_revco);
		}
		//);
	});
	
	function updaterevco_submit() {

                var vnolab = $ID('Lab');
		var vnourut = $ID('NoUrut');
		var vjenis = $ID('jenisrev');
		var vkapasitas = $ID('kapasitas_rak');
		// var v = document.bm2form.;
		// var v = document.bm2form.;
		
		
		if(vnolab.value=='' || vnolab.selectedIndex==0 ){
			alert("Laboratorium harus di pilih.");
			vnolab.focus();
			return false;
		}
		else if(vnourut.value=='' || !(vnourut.value.length==2) ){
			alert("No Urut tidak boleh kosong dan harus 2 digit.");
			vnourut.focus();
			return false;
		}
		else if(vjenis.value=='' || vjenis.selectedIndex==0 ){
			alert("Jenis Revco harus di pilih.");
			vjenis.focus();
			return false;
		}else if(vkapasitas.value=='' || vkapasitas.selectedIndex==0 ){
			alert("kapasitas rak harus di isi.");
			kapasitas.focus();
			return false;
		}		
		else {
		$ID('frmrevco').submit();
		// return true;
		}
	}
        
	
	<?php if (isset($status_revco) && $status_revco == 1) { ?>
	jQuery(document).ready(function(){
		alert('Update data berhasil');
	});
	<?php } ?>
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> List Data Revco</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form List Data Revco</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Data Revco</span>
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
								<th width="10%">No Revco</th>
								<th width="10%">Laboraturium</th>
								<th width="10%">Urutan</th>
								<th width="10%">Jenis Revco</th>
								<th width="10%">Kapasitas Rak</th>
								<th width="15%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_revco)) {
									echo '<tr><td colspan="6" style="color:red;"><center><b> Data Form Revco Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_revco as $value):
                                                                   
							?>
								<tr id='id_revco_<?php echo $value['id_revco']; ?>'>
									<td>
										<?php echo $no ?>
                                                                                <input type="hidden" name="id_revco" value="<?php echo $value['id_revco']; ?>" />
                                                                                <input type="hidden" name="Lab" value="<?php echo $value['LAB_CODE']; ?>" />
                                                                                <input type="hidden" name="jenisrev" value="<?php echo $value['no_revco_jenis']; ?>" />
                                                                        </td>
									<td class='table-icon'>
										<?php echo $value['no_revco']; ?>
									</td>
									<td class='table-fixed-medium'>
                                                                                <?php // echo substr($value['no_revco'],0,2);
                                                                                 echo $value['LAB_NAME']; ?>
                                                                        </td>
									<td class='table-fixed-medium'>
                                                                                <?php echo substr($value['no_revco'],2,2);?>
									</td>
									<td class='table-fixed-medium'>
                                                                                <?php echo $value['nama_revco_jenis'];?>
                                                                        </td>
                                                                        <td class='table-fixed-medium'>
										<?php echo $value['kapasitas_rak']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['id_revco']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['id_revco']}\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
										<?php
											if (!($level == 3))
											echo"
											<a href=\"#\" onclick=\"document.dialog_click('{$value['id_revco']}');document.frmrevco.id_revco.value=$value[id_revco]\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_revco=\"{$value['id_revco']}\"><i class=\"icon-exclamation-sign\"></i></a>
											<a href=\"#\" onclick=\"delete_link('{$value['id_revco']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
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
				<?php
				if (!( $this->data['level'] ==3 ))
				echo "
				<a href=\"#\" onclick=\"goto('frmrevco/')\" class=\"button button-basic\">Tambah Data</a>
				";
				?>
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
<?php
	if (!($level == 3))
	echo"
<div id=\"dialog\" title=\"Form Edit Revco\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View Revco\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="frmrevco" name="frmrevco" class='form-horizontal'>
			<input type='hidden' name="id_revco" />
			<input type="hidden" name="status_revco" value="0">
			<div class="control-group">
                            <label for="Lab" class="control-label">Laboratorium</label>
							<div class="controls controls-row">
                                                            <select name="Lab" id="Lab" class='span3' onchange="norevco()">
									<option> - Silakan Pilih - </option>
									<?php
                                                                        foreach($arr_lab as $value){
                                                                            echo "<option value='$value[LAB_CODE]'>$value[LAB_CODE] - $value[LAB_NAME]</option>";
                                                                        }
                                                                        ?>
								</select>
							</div>
						</div>
						<div class="control-group">
								<label for="NoUrut" class="control-label" >No. Urut Revco</label>
							<div class="controls controls-row">
                                                            <input type="text" name="NoUrut" id="NoUrut" class="span1" onkeyup="norevco()"/>
						
							</div>
						</div>
						
						<div class="control-group">
								<label for="jenisrev" class="control-label">Jenis Revco</label>
							<div class="controls controls-row">
                                                            <select name="jenisrev" id="jenisrev" class='span3' onchange="norevco()">
									<option> - Silakan Pilih - </option>
									<?php
                                                                        foreach($arr_revcojenis as $value){
                                                                            echo "<option value='$value[no_revco_jenis]'>$value[no_revco_jenis] - $value[nama_revco_jenis]</option>";
                                                                        }
                                                                        ?>
								</select>
							</div>
						</div>
                                                <div class="control-group">
								<label for="kapasitas_rak" class="control-label" >Kapasitas Rak</label>
							<div class="controls controls-row">
                                                            <input type="text" name="kapasitas_rak" id="kapasitas_rak" class="span1" onkeyup=""/>
						
							</div>
						</div>
						<div class="control-group">
								<label for="NoRevco" class="control-label">No. Revco</label>
							<div class="controls controls-row">
								<input type="text" name="NoRevco" id="NoRevco" class="span2" disabled="true"/>
                                                                <input type="hidden" name="hNoRevco" id="hNoRevco" class="span2"/>
							</div>
						</div>
                            
				
			<?php
				if (!($level == 3))
				echo"
				<button style=\"padding-left:1%\" type=\"button\" onclick=\"updaterevco_submit()\" class=\"button button-basic-blue\">Update</button>
				";
			?>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			
		</form>
	</div>
</div>
