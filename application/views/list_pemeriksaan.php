<script type="text/javascript">

function view(lm){
    $.ajax({
        type    : "POST",
        url     : '<?php echo $application_path;?>/list_pemeriksaan/get_arr_pemeriksaan?laman='+lm,
        data    : $("#frm").serialize(),
        complete: function(rs){
            var rt=rs.responseText;
            $ID("tabelisi").innerHTML = rt;
        }
    });
}

function exp_view(){
   $ID("printv").submit();
}

//function delete_link(id_revco){
//    if(confirm('anda yakin akan menghapus data ini ?')){
//        goto('list_revco/del/'+id_revco);
//    }
//}

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

function image_view(obj,value){
    obj.attr('src', value);
}

function edit_link_detail(METHOD_ID){
    $("#view_detail").dialog("open");
    P_ID = 
    $.ajax({
        type    : "POST",
        url     : '<?php echo $application_path;?>/list_pemeriksaan/get_arr_detail',
        data    : {
            'P_ID':P_ID,
            'METHOD_ID':METHOD_ID
        },
        complete: function(rs){
            var rt=rs.responseText;
            $ID("view_detail").innerHTML = rt;
        }
    });
}

function edit_link_action(P_ID,METHOD_ID) {
    var objId = '#id_' + METHOD_ID + '_' + P_ID;
    var objTR = $('#id_' + METHOD_ID + '_' + P_ID).get(0);
    $('#dialog_'+METHOD_ID+' input[name="hNoBarcode_'+METHOD_ID+'"]').val( $.trim(objTR.children[1].innerHTML));
    $('#dialog_'+METHOD_ID+' input[name="NoBarcode_'+METHOD_ID+'"]').val( $.trim(objTR.children[1].innerHTML));
    switch(METHOD_ID){
        case 1 :
            $('#dialog_1 input[name="TanggalPemeriksaan_1"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_1 input[name="NamaPetugas_1"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_1 textarea[name="Keterangan_1"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_1 textarea[name="Kesimpulan_1"]').val($(objId+' input[name=KESIMPULAN]').val());
            image_view($('#dialog_1 img[name="Gambar_1"]'),$(objId+' input[name=GAMBAR_UPLOAD]').val());
            break;
        case 2 :
            $('#dialog_2 input[name="TanggalPemeriksaan_2"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_2 input[name="NamaPetugas_2"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_2 textarea[name="Keterangan_2"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_2 textarea[name="Kesimpulan_2"]').val($(objId+' input[name=KESIMPULAN]').val());
            combobox_select($('#dialog_2 select[name="Hasil_2"]').val($(objId+' input[name=HASIL_ID]').val()));
            $('#dialog_2 input[name="BasePair_2"]').val($(objId+' input[name=BASE_PAIR]').val());
            image_view($('#dialog_2 img[name="Gambar_2"]'),$(objId+' input[name=GAMBAR_UPLOAD]').val());
            combobox_select($('#dialog_2 select[name="KontrolPositif_2"]').val($(objId+' input[name=KONTROL_POSITIF]').val()));
            combobox_select($('#dialog_2 select[name="KontrolNegatif_2"]').val($(objId+' input[name=KONTROL_NEGATIF]').val()));
            combobox_select($('#dialog_2 select[name="Mock_2"]').val($(objId+' input[name=MOCK]').val()));
            break;
        case 3 :
            $('#dialog_3 input[name="TanggalPemeriksaan_3"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_3 input[name="NamaPetugas_3"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_3 textarea[name="Keterangan_3"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_3 textarea[name="Kesimpulan_3"]').val($(objId+' input[name=KESIMPULAN]').val());
            combobox_select($('#dialog_3 select[name="Hasil_3"]').val($(objId+' input[name=HASIL_ID]').val()));
            $('#dialog_3 input[name="CVT_3"]').val($(objId+' input[name=CVT]').val());
            image_view($('#dialog_3 img[name="Gambar_3"]'),$(objId+' input[name=GAMBAR_UPLOAD]').val());
            combobox_select($('#dialog_3 select[name="KontrolPositif_3"]').val($(objId+' input[name=KONTROL_POSITIF]').val()));
            combobox_select($('#dialog_3 select[name="KontrolNegatif_3"]').val($(objId+' input[name=KONTROL_NEGATIF]').val()));
            combobox_select($('#dialog_3 select[name="Mock_3"]').val($(objId+' input[name=MOCK]').val()));
            break;
        case 4 :
            $('#dialog_4 input[name="TanggalPemeriksaan_4"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_4 input[name="NamaPetugas_4"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_4 textarea[name="Keterangan_4"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_4 textarea[name="Kesimpulan_4"]').val($(objId+' input[name=KESIMPULAN]').val());
            image_view($('#dialog_4 img[name="Gambar_4"]'),$(objId+' input[name=GAMBAR_UPLOAD]').val());
            combobox_select($('#dialog_4 select[name="KontrolPositif_4"]').val($(objId+' input[name=KONTROL_POSITIF]').val()));
            combobox_select($('#dialog_4 select[name="KontrolNegatif_4"]').val($(objId+' input[name=KONTROL_NEGATIF]').val()));
            combobox_select($('#dialog_4 select[name="Mock_4"]').val($(objId+' input[name=MOCK]').val()));
            break;
        case 5 :
            $('#dialog_5 input[name="TanggalPemeriksaan_5"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_5 input[name="NamaPetugas_5"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_5 textarea[name="Keterangan_5"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_5 textarea[name="Kesimpulan_5"]').val($(objId+' input[name=KESIMPULAN]').val());
            image_view($('#dialog_5 img[name="Gambar_5"]'),$(objId+' input[name=GAMBAR_UPLOAD]').val());
            combobox_select($('#dialog_5 select[name="KontrolPositif_5"]').val($(objId+' input[name=KONTROL_POSITIF]').val()));
            combobox_select($('#dialog_5 select[name="KontrolNegatif_5"]').val($(objId+' input[name=KONTROL_NEGATIF]').val()));
            combobox_select($('#dialog_5 select[name="Mock_5"]').val($(objId+' input[name=MOCK]').val()));
            break;
        case 6 :
            $('#dialog_6 input[name="TanggalPemeriksaan_6"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_6 input[name="NamaPetugas_6"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_6 textarea[name="Keterangan_6"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_6 textarea[name="Kesimpulan_6"]').val($(objId+' input[name=KESIMPULAN]').val());
            image_view($('#dialog_6 img[name="Gambar_6"]'),$(objId+' input[name=GAMBAR_UPLOAD]').val());
            combobox_select($('#dialog_6 select[name="KontrolPositif_6"]').val($(objId+' input[name=KONTROL_POSITIF]').val()));
            combobox_select($('#dialog_6 select[name="KontrolNegatif_6"]').val($(objId+' input[name=KONTROL_NEGATIF]').val()));
            combobox_select($('#dialog_6 select[name="Mock_6"]').val($(objId+' input[name=MOCK]').val()));
            break;
        case 7 :
            $('#dialog_7 input[name="TanggalPemeriksaan_7"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_7 input[name="NamaPetugas_7"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_7 textarea[name="Keterangan_7"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_7 textarea[name="Kesimpulan_7"]').val($(objId+' input[name=KESIMPULAN]').val());
            $('#dialog_7 input[name="Plate_7"]').val($(objId+' input[name=PLATE]').val());
            
            break;
        case 8 :
            $('#dialog_8 input[name="TanggalPemeriksaan_8"]').val($(objId+' input[name=PEMERIKSAAN_TGL]').val());
            $('#dialog_8 input[name="NamaPetugas_8"]').val($(objId+' input[name=PETUGAS]').val());
            $('#dialog_8 textarea[name="Keterangan_8"]').val($(objId+' input[name=KETERANGAN]').val());
            $('#dialog_8 textarea[name="Kesimpulan_8"]').val($(objId+' input[name=KESIMPULAN]').val());
            break;
    }
//    var objTR = $('#id_revco_'+id_revco).get(0);
//    // alert(objTR);
//    $('#dialog input[name="hNoRevco"]').val( $.trim( objTR.children[1].innerHTML ));
//    $('#dialog input[name="NoRevco"]').val( $.trim( objTR.children[1].innerHTML ));
//    combobox_select($('#dialog select[name="Lab"]').val( $('#id_revco_'+id_revco+ ' input[name="Lab"]').val()));
//    $('#dialog input[name="NoUrut"]').val( $.trim( objTR.children[3].innerHTML ) );
//    combobox_select($('#dialog select[name="jenisrev"]').val( $('#id_revco_'+id_revco+ ' input[name="jenisrev"]').val()));
//    $('#dialog input[name="kapasitas_rak"]').val( $.trim( objTR.children[5].innerHTML ) );
}

function open_dialog(method_id,id){
    $( "#dialog_"+id ).dialog( "open");
    edit_link_action(method_id, id)
}

$(function() {
    view(1);
    $( "#dialog_1" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_2" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_3" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_4" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_5" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_6" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_7" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#dialog_8" ).dialog({autoOpen: false, width: 600, height: 500});
    $( "#view_detail" ).dialog({autoOpen: false, width: 600, height: 500});
    //$( "#dialog-link" ).click(
//    document.dialog_click = function(id_revco) {
//        $( "#dialog" ).dialog( "open");
//        edit_link_action(id_revco);
//    }
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
		<h4><i class="icon-table"></i> List Data Pemeriksaan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form List Pemeriksaan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Pemeriksaan</span>
				</div>
				<div class="box-body">
				<form class='form-horizontal' id='frm'>
                <div class="control-group">
            			<label for="MetodePenelitian" class="control-label">Metode Penelitian</label>
            			<div class="controls controls-row">
            				<select name="MetodePenelitian" id="MetodePenelitian" class='span5'>
            					<option value="null"> - Metode Penelitian - </option>
            					<?php foreach($arr_metode as $value): ?>
            					<option value="<?php echo $value['id_metod']; ?>"><?php echo $value['id_metod']; ?> - <?php echo $value['nm_metod']; ?></option>
            					<?php endforeach; ?>
            				</select>
            			</div>
            	</div>

            	<div class="control-group">
        			<label for="tglawal" class="control-label">Taggal Awal</label>
        			<div class="controls controls-row">
        				<input type="text" name="tglawal" id="tglawal" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />

        				<label for="tglakhir" class="control-label">Tanggal Akhir</label>
        				<input style="margin-left: 2.5641%;" type="text" name="tglakhir" id="tglakhir" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />

        			</div>
        		</div>

				<div class="control-group">
            		<label for="Propinsi" class="control-label">Propinsi</label>
            		<div class="controls controls-row">
        				<select name="Propinsi" id="Propinsi" class="span5"  >
        					<option value="0"> - ALL </option>
        					<?php foreach($arr_prov as $value): ?>
        					<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
        					<?php endforeach; ?>
        				</select>

            		</div>
            	</div>

            	<div class="control-group">
            		<label for="JenisSpesimen" class="control-label">Jenis Spesimen</label>
            		<div class="controls controls-row">
        				<select name="JenisSpesimen" id="JenisSpesimen" class="span4"  >
        					<option value="0"> - ALL </option>
        					<?php foreach($arr_spesimen as $value): ?>
        					<option value="<?php echo $value['spesimen_kode']; ?>"><?php echo $value['spesimen_kode']; ?> - <?php echo $value['spesimen_name']; ?></option>
        					<?php endforeach; ?>
        				</select>

            		</div>
            	</div>

            	<div class="control-group">
            	    <div class="controls-row">
            	        <a href='#' id="tampil" class="button button-basic" onclick="view(1)">Tampil</a>
            	        <a href='#' id="print" class="button button-basic" onclick="exp_view()">Print</a>
                    </div>
                </div>

				</form>
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
					<div id=tabelisi>

					</div>
		<div class="bottom-table">
			<div class="pull-left">
				<?php
if (!( $this->data['level'] ==3 ))
    echo "
    <a href=\"#\" onclick=\"goto('frmrevco/')\" class=\"button button-basic\">Tambah Data</a>
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
//if (!($level == 3))
//    echo"
//<div id=\"dialog\" title=\"Form Edit Revco\" style=\"z-index:99999;\">
//    ";
//if ($level == 3)
//    echo"
//<div id=\"dialog\" title=\"Form View Revco\" style=\"z-index:99999;\">
//    ";
?>

<div id="dialog_1" title="Form Edit Isolasi" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_1" name="frm_1" class='form-horizontal'>
			<input type='hidden' name="id_1" />
			<input type="hidden" name="status_1" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_1" />
                            <label for="NoBarcode_1" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_1" id="NoBarcode_1" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_1" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_1" id="TanggalPemeriksaan_1" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_1" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_1" id="NamaPetugas_1" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Gambar_1" class="control-label" >Gambar</label>
                            <div class="controls controls-row">
                                <img name="Gambar_1" width="200" src="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_1_Gambar" class="control-label" >Upload Gambar Isolasi</label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_1_Gambar" id="Upload_1_Gambar" class="span3" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Keterangan_1" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_1" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_1" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_1" class="textarea"></textarea>
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

<div id="dialog_2" title="Form Edit PCR Konvensional" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_2" name="frm_2" class='form-horizontal'>
			<input type='hidden' name="id_2" />
			<input type="hidden" name="status_2" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_2" />
                            <label for="NoBarcode_2" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_2" id="NoBarcode_2" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_2" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_2" id="TanggalPemeriksaan_2" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_2" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_2" id="NamaPetugas_2" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Gambar_2" class="control-label" >Gambar</label>
                            <div class="controls controls-row">
                                <img name="Gambar_2" width="200" src="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_2_Gambar" class="control-label" >Upload Gambar PCR</label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_2_Gambar" id="Upload_2_Gambar" class="span3" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Hasil_2" class="control-label">HASIL</label>
                            <div class="controls controls-row">
                                <select name="Hasil_2" id="jenisrev" class='span3' >
                                            <option> - Silakan Pilih - </option>
				<?php
                        foreach($arr_hasil as $value){
                            echo "<option value='$value[HASIL_ID]'>$value[HASIL_ID] - $value[HASIL_NM]</option>";
                        }
                        ?>
                                </select>
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="BasePair_2" class="control-label" >Base Pair</label>
                            <div class="controls controls-row">
                                <input type="text" name="BasePair_2" id="BasePair_2" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolPositif_2" class="control-label" >Kontrol Positif</label>
                            <div class="controls controls-row">
                                <select name="KontrolPositif_2" id="KontrolPositif_2" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolNegatif_2" class="control-label" >Kontrol Negatif</label>
                            <div class="controls controls-row">
                                <select name="KontrolNegatif_2" id="KontrolNegatif_2" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Mock_2" class="control-label" >Mock</label>
                            <div class="controls controls-row">
                                <select name="Mock_2" id="Mock_2" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Keterangan_2" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_2" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_2" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_2" class="textarea"></textarea>
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

<div id="dialog_3" title="Form Edit PCR Realtime" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_3" name="frm_3" class='form-horizontal'>
			<input type='hidden' name="id_3" />
			<input type="hidden" name="status_3" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_3" />
                            <label for="NoBarcode_3" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_3" id="NoBarcode_3" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_3" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_3" id="TanggalPemeriksaan_3" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_3" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_3" id="NamaPetugas_3" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Gambar_3" class="control-label" >Gambar</label>
                            <div class="controls controls-row">
                                <img name="Gambar_3" width="200" src="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_3_Gambar" class="control-label" >Upload Gambar PCR Realtime</label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_3_Gambar" id="Upload_3_Gambar" class="span3" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Hasil_3" class="control-label">HASIL</label>
                            <div class="controls controls-row">
                                <select name="Hasil_3" id="jenisrev" class='span3' >
                                            <option> - Silakan Pilih - </option>
				<?php
                        foreach($arr_hasil as $value){
                            echo "<option value='$value[HASIL_ID]'>$value[HASIL_ID] - $value[HASIL_NM]</option>";
                        }
                        ?>
                                </select>
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="CVT_3" class="control-label" >CVT</label>
                            <div class="controls controls-row">
                                <input type="text" name="CVT_3" id="CVT_3" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolPositif_3" class="control-label" >Kontrol Positif</label>
                            <div class="controls controls-row">
                                <select name="KontrolPositif_3" id="KontrolPositif_3" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="3">3 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolNegatif_3" class="control-label" >Kontrol Negatif</label>
                            <div class="controls controls-row">
                                <select name="KontrolNegatif_3" id="KontrolNegatif_3" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Mock_3" class="control-label" >Mock</label>
                            <div class="controls controls-row">
                                <select name="Mock_3" id="Mock_3" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Keterangan_3" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_3" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_3" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_3" class="textarea"></textarea>
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

<div id="dialog_4" title="Form Edit Realtime Multiplex" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_4" name="frm_4" class='form-horizontal'>
			<input type='hidden' name="id_4" />
			<input type="hidden" name="status_4" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_4" />
                            <label for="NoBarcode_4" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_4" id="NoBarcode_4" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_4" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_4" id="TanggalPemeriksaan_4" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_4" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_4" id="NamaPetugas_4" class="span4" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Gambar_4" class="control-label" >Gambar</label>
                            <div class="controls controls-row">
                                <img name="Gambar_4" width="200" src="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_4_Gambar" class="control-label" >Upload Gambar </label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_4_Gambar" id="Upload_4_Gambar" class="span4" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="KontrolPositif_4" class="control-label" >Kontrol Positif</label>
                            <div class="controls controls-row">
                                <select name="KontrolPositif_4" id="KontrolPositif_4" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolNegatif_4" class="control-label" >Kontrol Negatif</label>
                            <div class="controls controls-row">
                                <select name="KontrolNegatif_4" id="KontrolNegatif_4" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Mock_4" class="control-label" >Mock</label>
                            <div class="controls controls-row">
                                <select name="Mock_4" id="Mock_4" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Keterangan_4" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_4" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_4" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_4" class="textarea"></textarea>
                            </div>
                        </div>
                        <?php
                            if (!($level == 3))
                                echo"
                                <button style=\"padding-left:1%\" type=\"button\" onclick=\"updaterevco_submit()\" class=\"button button-basic-blue\">Update</button>
                                <button style=\"padding-left:1%\" type=\"button\" onclick=\"edit_link_detail(4)\" class=\"button button-basic-blue\">Update</button>
                                ";
                        ?>
				<!--<button type="button" class="button button-basic">Cancel</button>-->

		</form>
	</div>
</div>

<div id="dialog_5" title="Form Edit Konvensional Multiplex" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_5" name="frm_5" class='form-horizontal'>
			<input type='hidden' name="id_5" />
			<input type="hidden" name="status_5" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_5" />
                            <label for="NoBarcode_5" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_5" id="NoBarcode_5" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_5" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_5" id="TanggalPemeriksaan_5" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_5" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_5" id="NamaPetugas_5" class="span5" />
                            </div>
                        </div>  
                        <div class="control-group">
                            <label for="Gambar_5" class="control-label" >Gambar</label>
                            <div class="controls controls-row">
                                <img name="Gambar_5" width="200" src="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_5_Gambar" class="control-label" >Upload Gambar </label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_5_Gambar" id="Upload_5_Gambar" class="span5" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="KontrolPositif_5" class="control-label" >Kontrol Positif</label>
                            <div class="controls controls-row">
                                <select name="KontrolPositif_5" id="KontrolPositif_5" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolNegatif_5" class="control-label" >Kontrol Negatif</label>
                            <div class="controls controls-row">
                                <select name="KontrolNegatif_5" id="KontrolNegatif_5" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Mock_5" class="control-label" >Mock</label>
                            <div class="controls controls-row">
                                <select name="Mock_5" id="Mock_5" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Keterangan_5" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_5" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_5" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_5" class="textarea"></textarea>
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

<div id="dialog_6" title="Form Edit Luminex" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_6" name="frm_6" class='form-horizontal'>
			<input type='hidden' name="id_6" />
			<input type="hidden" name="status_6" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_6" />
                            <label for="NoBarcode_6" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_6" id="NoBarcode_6" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_6" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_6" id="TanggalPemeriksaan_6" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_6" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_6" id="NamaPetugas_6" class="span5" />
                            </div>
                        </div>  
                        <div class="control-group">
                            <label for="Gambar_6" class="control-label" >Gambar</label>
                            <div class="controls controls-row">
                                <img name="Gambar_6" width="200" src="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_6_Gambar" class="control-label" >Upload Gambar </label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_6_Gambar" id="Upload_6_Gambar" class="span5" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Upload_6_Data" class="control-label" >Upload Gambar </label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_6_Data" id="Upload_6_Data" class="span5" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="KontrolPositif_6" class="control-label" >Kontrol Positif</label>
                            <div class="controls controls-row">
                                <select name="KontrolPositif_6" id="KontrolPositif_6" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="KontrolNegatif_6" class="control-label" >Kontrol Negatif</label>
                            <div class="controls controls-row">
                                <select name="KontrolNegatif_6" id="KontrolNegatif_6" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Mock_6" class="control-label" >Mock</label>
                            <div class="controls controls-row">
                                <select name="Mock_6" id="Mock_6" class="span3">
                                        <option value="0">0 - Positif</option>
                                        <option value="1">1 - Negatif</option>
                                        <option value="2">2 - Kontaminan</option>
                                        <option value="3">3 - Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Keterangan_6" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_6" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_6" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_6" class="textarea"></textarea>
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

<div id="dialog_7" title="Form Edit Serologi" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_7" name="frm_7" class='form-horizontal'>
			<input type='hidden' name="id_7" />
			<input type="hidden" name="status_7" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_7" />
                            <label for="NoBarcode_7" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_7" id="NoBarcode_7" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_7" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_7" id="TanggalPemeriksaan_7" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_7" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_7" id="NamaPetugas_7" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Plate_7" class="control-label" >Plate</label>
                            <div class="controls controls-row">
                                <input type="text" name="Plate_7" id="Plate_7" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Keterangan_7" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_7" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_7" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_7" class="textarea"></textarea>
                            </div>
                        </div>
                        <?php
                            if (!($level == 3))
                                echo"
                                <button style=\"padding-left:1%\" type=\"button\" onclick=\"updaterevco_submit()\" class=\"button1 button-basic-blue\">Update</button>
                                ";
                        ?>
				<!--<button type="button" class="button button-basic">Cancel</button>-->

		</form>
	</div>
</div>

<div id="dialog_8" title="Form Edit Isolasi" style ="z-index: 9999;">
    
        <div class="box-body">
		<form method="POST" id="frm_8" name="frm_8" class='form-horizontal'>
			<input type='hidden' name="id_8" />
			<input type="hidden" name="status_8" value="0">
			<div class="control-group">
                            <input type='hidden' name="hNoBarcode_8" />
                            <label for="NoBarcode_8" class="control-label">No.Barcode</label>
                                <div class="controls controls-row">
                                    <input type="text" name="NoBarcode_8" id="NoBarcode_8" class="span2" readonly="true"/>
                                </div>
                        </div>
                        <div class="control-group">
                            <label for="TanggalPemeriksaan_8" class="control-label" >Tanggal Pemeriksaan</label>
                            <div class="controls controls-row">
                                <input type="text" name="TanggalPemeriksaan_8" id="TanggalPemeriksaan_8" class="span2 datepick" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="NamaPetugas_8" class="control-label" >Nama Petugas</label>
                            <div class="controls controls-row">
                                <input type="text" name="NamaPetugas_8" id="NamaPetugas_8" class="span3" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="Upload_8_Data" class="control-label" >Upload Data Sequencing</label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_8_Data" id="Upload_8_Data" class="span3" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Upload_8_Gambar" class="control-label" >Upload Gambar Sequencing</label>
                            <div class="controls controls-row">
                                <input type="file" name="Upload_8_Gambar" id="Upload_8_Gambar" class="span3" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Keterangan_8" class="control-label" >Keterangan</label>
                            <div class="controls controls-row">
                                <textarea name="Keterangan_8" class="textarea"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label for="Kesimpulan_8" class="control-label" >Kesimpulan</label>
                            <div class="controls controls-row">
                                <textarea name="Kesimpulan_8" class="textarea"></textarea>
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

<div id="view_detail" title="Form Edit Detail" style ="z-index: 9999;">
    <div>
        
    </div>
</div>

<!--						<div class="control-group">
								<label for="jenisrev" class="control-label">Jenis Revco</label>
							<div class="controls controls-row">
                                                            <select name="jenisrev" id="jenisrev" class='span3' onchange="norevco()">
									<option> - Silakan Pilih - </option>
									<?php
//foreach($arr_revcojenis as $value){
//    echo "<option value='$value[no_revco_jenis]'>$value[no_revco_jenis] - $value[nama_revco_jenis]</option>";
//}
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
-->


