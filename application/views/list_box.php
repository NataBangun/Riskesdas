<script type="text/javascript">
    
    function delete_link(id_box){
            if(confirm('anda yakin akan menghapus data ini ?')){
                goto('list_box/del/'+id_box);
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
                            url:'<?php echo $application_path;?>/list_box/kabupaten/'+$ID('Prov').value,
                            complete: function(res, status){
                                //var kotak = res.responseText;
                                document.getElementById('div_kab').innerHTML=res.responseText;
                            }
                        });
        }
        
        function nobox(){
            var vnopenelitian = document.box.NoPenelitian;
            var vprov = document.box.Prov;
            var vkab = $ID('Kab');
            var vtypebox = document.box.TypeBox;
            var vulangan =document.box.Ulangan;
            var vbox = document.box.NoBox;
            var vhbox = document.box.hNoBox;
            
            if(vnopenelitian.selectedIndex == 0){
                vnopenelitian.value = '';
            }
            if(vprov.selectedIndex == 0){
                vprov.value = '';
            }
            if(vkab.selectedIndex == 0){
                vkab.value = '';
            }
            if(vtypebox.selectedIndex == 0){
                vtypebox.value = '';
            }
            
            vhbox.value=ceknol(vnopenelitian) + ceknol(vprov) + ceknol(vkab) + vtypebox.value + vulangan.value;  
            vbox.value = vhbox.value;
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
		// alert(objTR);
                combobox_select($('#dialog select[name="NoPenelitian"]').val( $('#id_box_'+id_box+ ' input[name="NoPenelitian"]').val()));
                combobox_select($('#dialog select[name="TypeBox"]').val( $('#id_box_'+id_box+ ' input[name="TypeBox"]').val()));
                combobox_select($('#dialog select[name="Prov"]').val( $.trim( objTR.children[3].innerHTML )));
                combobox_select($('#dialog select[name="Kab"]').val( $.trim( objTR.children[4].innerHTML )));
//                combobox_select($('#dialog select[name="Kab"]').val( $('#id_box_'+id_box+ ' input[name="Kab"]').val()));
                //combobox_select($('#dialog select[name="TypeBox"]').val( $.trim( objTR.children[5].innerHTML )));
		$('#dialog input[name="Ulangan"]').val( $.trim( objTR.children[6].innerHTML ));
		$('#dialog input[name="NoBox"]').val( $.trim( objTR.children[1].innerHTML ));
		
	} 
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 900,
		});

		//$( "#dialog-link" ).click(
		document.dialog_click = function(id_box) {			
			$( "#dialog" ).dialog( "open" );
			
			// alert(bm02_id);
			//alert(obj.attr('bm04'));
			//event.preventDefault();
				
			//var $this = $(this)
			//alert($this.attr('bm04'))
			edit_link_action(id_box);
		}
		//);
	});
	
	function updatebox_submit() {

                var vnopen = $ID('NoPenelitian');
		var vprov = $ID('Prov');
		var vkab = $ID('Kab');
		var vtype = $ID('TypeBox');
                var vul = $ID('Ulangan');
                var vhbox = $ID('hNoBox');
		// var v = document.bm2form.;
		// var v = document.bm2form.;
		
		
		if(vnopen.value=='' || vnopen.selectedIndex==0 ){
			alert("Nomor Penelitian harus di pilih.");
			vnopen.focus();
			return false;
		}
		else if(vprov.value=='' || vprov.selectedIndex==0 ){
			alert("Provinsi harus di pilih.");
			vprov.focus();
			return false;
		}
		else if(vkab.value=='' || vkab.selectedIndex==0 ){
			alert("Kabupaten harus di pilih.");
			vkab.focus();
			return false;
		}
                else if(vtype.value=='' || vtype.selectedIndex==0 ){
			alert("Type Box harus di pilih.");
			vtype.focus();
			return false;
		}
		else if(vul.value=='' || !(vul.value.length==1) ){
			alert("Ulangan tidak boleh kosong dan harus 1 digit.");
			vul.focus();
			return false;
		}
				
		else {
		$ID('box').submit();
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
		<h4><i class="icon-table"></i> List Data box</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form List Data box</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Data box</span>
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
								<th width="10%">No box</th>
								<th width="10%">Penelitian</th>
								<th width="10%">Propinsi</th>
								<th width="10%">Kabupaten</th>
								<th width="10%">Jenis</th>
                                                                <th width="10%">Ulangan</th>
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
                                                                            <input type="hidden" name="NoPenelitian" value="<?php echo $value['penelitian_kode']; ?>" />
                                                                            <input type="hidden" name="TypeBox" value="<?php echo $value['typebox_id']; ?>" />
                                                                            
                                                                            
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
                                                                                <?php echo substr($value['no_box'],4,2);
//                                                                                        echo $value['NM_KAB']; ?>
                                                                        </td>
                                                                        <td class='table-fixed-medium'>
										<?php echo $value['typebox_name']; ?>
									</td>
                                                                        <td class='table-fixed-medium'>
                                                                                <?php echo substr($value['no_box'],7,1);?>
                                                                        </td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9))
												echo "
											<a href=\"#\" onclick=\"document.dialog_click('{$value['id_box']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_box=\"{$value['id_box']}\"><i class=\"icon-eye-open\"></i></a>
												";
											?>
										<?php
											if (!($level == 3))
											echo"
											<a href=\"#\" onclick=\"document.dialog_click('{$value['id_box']}');document.box.id_box.value=$value[id_box]\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_box=\"{$value['id_box']}\"><i class=\"icon-exclamation-sign\"></i></a>
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
		<div class="bottom-table">
			<div class="pull-left">
				<?php
				if (!( $this->data['level'] ==3 ))
				echo "
				<a href=\"#\" onclick=\"goto('frmbox/')\" class=\"button button-basic\">Tambah Data</a>
				";
				?>
			</div>
			
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
<div id=\"dialog\" title=\"Form Edit box\" style=\"z-index:99999;\">
	";
?>
<?php
	if ($level == 3)
	echo"
<div id=\"dialog\" title=\"Form View box\" style=\"z-index:99999;\">
	";
?>
	<div class="box-body">
		<form method="POST" id="box" name="box" class='form-horizontal'>
			<input type='hidden' name="id_box" />
			<input type="hidden" name="status_box" value="0">
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
                                                            <select name="Prov" id="Prov" class='span3' onchange="kabupaten();nobox();">
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
								<label for="Kab" class="control-label" >Kabupaten</label>
							<div class="controls controls-row" id="div_kab">
                                                            <select name="Kab" id="Kab" class='span3' onchange="nobox()">
									<option> - Silakan Pilih Kabupaten -</option>
                                                                        <?php foreach($arr_kab as $value):?>
                                                                        <option value="<?php echo $value['ID_KAB']?>"><?php echo $value['ID_KAB']?> - <?php echo $value['NM_KAB']?></option>
                                                                        <?php endforeach; ?>
									
								</select>
						
							</div>
						</div>
						
						<div class="control-group">
								<label for="TypeBox" class="control-label" >Typebox</label>
							<div class="controls controls-row">
                                                            <select name="TypeBox" id="TypeBox" class='span3' onchange="nobox();">
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
								<label for="Ulangan" class="control-label">Ulangan</label>
							<div class="controls controls-row">
                                                            <input type="text" name="Ulangan" id="Ulangan" class="span2" onkeyup="nobox()"/>
                                                        </div>
						</div>
                                                
						
                                                
                                                
                                                <div class="control-group">
								<label for="NoBox" class="control-label">No. Box</label>
							<div class="controls controls-row">
								<input type="text" name="NoBox" id="NoBox" class="span2" disabled="true"/>
                                                                <input type="hidden" name="hNoBox" id ="hNoBox"/>
							</div>
						</div>
                            
				
			<?php
				if (!($level == 3))
				echo"
				<button style=\"padding-left:1%\" type=\"button\" onclick=\"updatebox_submit()\" class=\"button button-basic-blue\">Update</button>
				";
			?>
				<!--<button type="button" class="button button-basic">Cancel</button>-->
			
		</form>
	</div>


