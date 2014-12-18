<script type="text/javascript">

$(document).ajaxStart(function(){ 
    $('#imgtabel').show(); 
}).ajaxStop(function(){ 
    $('#imgtabel').hide();
});


function rem(no){
    var jml = $ID('Jumlah').value;
    var index = $ID('barcode'+no).value;
    var data = $ID('DataAmbil');
    var idA = $ID('IdAmbil');
    
    if(no==1){
        data.value = data.value.replace(index,'');
        idA.value = idA.value.replace(no,'');
    }else if(jml>1){
        data.value = data.value.replace(','+index,'');
        idA.value = idA.value.replace(','+no,'');        
    }else{
        data.value = data.value.replace(index,'');
        idA.value = idA.value.replace(no,'');
    }
    
    $('#tb2'+no).remove();
    $ID('Jumlah').value -= 1;
    $ID('iJumlah').value -= 1;
    
}

function ambil(no){
    var jml = $ID('Jumlah').value;
    var idjml = $ID('IdJumlah');
    jml = parseInt(jml);
    if(jml==0){
        jml=1;
        idjml.value = 1;
    }else{
        jml+=1;
        idjml.value = parseInt(idjml.value) + 1;
    }
    $ID('Jumlah').value = jml;
    $ID('iJumlah').value = jml;
    $('#tb1').append(
        '<tr id="tb2'+idjml.value+'">'
        +   '<td>'+jml+'<input type="hidden" id="" value="'+jml+'" style="border:none;width:15px;background:none"></td>'
        +   '<td>'+ $('#nobarcode'+no).val() +'<input type="hidden" name="dt_barcode'+idjml.value+'" value="'+ $('#nobarcode'+no).val() +'" ></td>'
        +   '<td>'+ $('#tgl_terima'+no).val() +'<input type="hidden" name="dt_tglterima'+idjml.value+'" value="'+ $('#tgl_terima'+no).val() +'" ></td>'
        +   '<td>'+ $('#kondisi'+no).val() +'<input type="hidden" name="dt_kondisi'+idjml.value+'" value="'+ $('#kondisi'+no).val() +'" ></td>'
        +   '<td>'+ $('#spesimen'+no).val() +'<input type="hidden" name="dt_spesimen'+idjml.value+'" value="'+ $('#spesimen'+no).val() +'"  ></td>'
        +   '<td>'
        +       '<input type="hidden" id="barcode'+jml+'" value="'+$('#nobarcode'+no).val()+'"/>'
        +       '<center><a href="#" class="button icon-eye-open" onclick="rem('+jml+')"> Hapus</a></center>'
        +   '</td>'
        +'</tr>'
    );
    $("#ambil"+no).hide();
    
    if($ID('DataAmbil').value=='Null'||$ID('DataAmbil').value==''){
        $ID('DataAmbil').value = $ID('nobarcode'+no).value;
    }else{
        $ID('DataAmbil').value = $ID('DataAmbil').value +',' + $ID('nobarcode'+no).value;
    }
    
    if($ID('IdAmbil').value=='Null'||$ID('IdAmbil').value==''){
        $ID('IdAmbil').value = jml;
    }else{
        $ID('IdAmbil').value = $ID('IdAmbil').value +',' + idjml.value;
    }
    
}


function get_penerimaan(laman){
    if(laman==null){laman ='';}else{laman = '?laman='+laman;}
    
    $.ajax({
        url:'<?php echo $application_path;?>/pengambilan/get_laman'+laman,
        data:{
            nobarcode: $ID('nobarcode').value,
            tglterima: $ID('TGLDiterima').value,
            lab: $ID('LabPenelitian').value,
            dataambil: $ID('DataAmbil').value
        },
        complete:function(res,status){
            $ID('laman').innerHTML =res.responseText;
        }
    });
}

$(function(){
    $('#imgtabel').hide();
    $('#TGLSerahTerima').val(function(){
        var d = new Date();
        var d_d = d.getDate();
        var d_m = (d.getMonth()<=9)?'0'+d.getMonth():d.getMonth();
        var d_y = d.getFullYear();
        return d_d+'/'+d_m+'/'+d_y;
    });
    //dialog AddSampel
    $('#dlg_addsampel').dialog({
        autoOpen:false,
        width:800,
        height:500,
        buttons:[
            {
                text:'OK',
                click: function (){
                    $(this).dialog('close');
                }
            }
        ]
    });

    $('#btn_addsampel').click(function(){
        if($ID('LabPenelitian').value==''){
            alert('Penelitian harus di pilih');
            $ID('LabPenelitian').focus();
        }else{
            get_penerimaan();
            $('#dlg_addsampel').dialog('open');
        }        
        
        
    });    
});

function pengambilan_submit(){
    var ymk = $ID('YangMenyerahkan');
    var ymn = $ID('YangMenerima');
    if(ymk.value==''){
        alert('Data yang menyerahkan harap diisi');
        ymk.focus();
    }else if(ymn.value==''){
        alert('Data yang menerima harap diisi');
        ymn.focus();
    }else{
        $ID('frm1').submit();
    }
}

function combobox_select(obj, value) {
	for (var i=0; i < obj.options.length; i++) {
		if (obj.options[i].value == value) {
			obj.options[i].selected = true;
		}
	}
}

function pengambilan_print(){
    $ID('status_pengambilan').value =2;    
    $.ajax({
        type    : "POST",
        url     : '<?php echo $application_path;?>/pengambilan/get_method',
        data    : $("#frm1").serialize(),
        complete: function(rs){
            var rt=rs.responseText;
            window.open("<?php echo $application_path;?>/pengambilan/print_pengambilan"+rt, "Pengambilan", '');
        }
    });
}

<?php if (isset($status_pengambilan) && $status_pengambilan == 1) { ?>
	jQuery(document).ready(function(){
		alert('tambah data berhasil.');
        $ID('simpanpengambilan').disabled=true;
        $ID('btn_addsampel').disabled=true;
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
	text-align: center;" src='<?=$application_path;?>/img/spinner.gif'/>
</div>
<div class="page-header">
	<div class="pull-left">
		<h4>Form Pengambilan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Pengambilan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Pengambilan</span>
                </div>
                <div class="box-body">
                    <form method="POST" id="frm1" name="pengambilana" class='form-horizontal'>
                        <input type="hidden" id="status_pengambilan" name="status_pengambilan" value="<?=(isset($status_pengambilan))?$status_pengambilan:"0";?>"/>                        
                        
                        <div class="control-group">
                            <label for="NoPengambilan" class="control-label">No. Pengambilan</label>
                            <div class="controls controls-row">
        						<input type="text" name="NoPengambilan" id=   "NoPengambilan" class="span3" value="<?=$NoPengambilan;?>"/>
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label for="TGLSerahTerima" class="control-label">Tanggal Serah Terima</label>
                            <div class="controls controls-row">
        						<input type="text" name="TGLSerahTerima" id="TGLSerahTerima" placeholder="dd/mm/yyyy" class="span2 datepick" value="<?=$TGLSerahTerima;?>"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="LabPenelitian" class="control-label">Laboratorium Penelitian</label>
                            <div class="controls controls-row">
                                        <select name="LabPenelitian" id="LabPenelitian" class='span3'  >
                									<option value=''> - Laboratorium - </option>
                									<?php foreach($arr_lab as $value): ?>
                									<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_CODE']; ?> - <?php echo $value['LAB_NAME']; ?></option>
                									<?php endforeach; ?>
                					    </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="YangMenyerahkan" class="control-label">Yang Menyerahkan</label>
                            <div class="controls controls-row">
        						<input type="text" name="YangMenyerahkan" id="YangMenyerahkan" class="span3"  value="<?=$YangMenyerahkan;?>"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="YangMenerima" class="control-label">Yang Menerima</label>
                            <div class="controls controls-row">
        						<input type="text" name="YangMenerima" id="YangMenerima" class="span3"  value="<?=$YangMenerima;?>"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="Ket" class="control-label">Keterangan</label>
                            <div class="controls controls-row">
        						<textarea name="Ket" id="Ket" class="span3" > <?=$Ket;?></textarea>
                            </div>
                        </div>
                        <div>
                        <div class="control-group">
                            <div class="control-label">
                                <button id="btn_addsampel" type="button" class="button button-basic-blue" >Add Sampel</button>
                            </div>                        
                        </div>
                        <table class="table2 table2-striped table2-nomargin table2-mail">
						<thead>
							<tr>
								<th width="1.5%">No.</th>
								<th width="15%">No Barcode</th>
								<th width="10%" class='table-date'>Tgl. Terima</th>
								<th width="10%">Kondisi</th>
								<th width="10%">Jenis</th>
                                
								<th width="15%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody id="tb1">
                            <?php
                            if(isset($dt_ambil)){
                                $i=1;
                                foreach($dt_ambil as $value){
                                    echo"
                                    <tr>
                                        <td>$i</td>
                                        <td>$value[dt_barcode] <input type=\"hidden\" name=\"dt_barcode$i\" value=\"$value[dt_barcode]\" ></td>
                                        <td>$value[dt_tglterima] <input type=\"hidden\" name=\"dt_tglterima$i\" value=\"$value[dt_tglterima]\" ></td>
                                        <td>$value[dt_kondisi] <input type=\"hidden\" name=\"dt_kondisi$i\" value=\"$value[dt_kondisi]\" ></td>
                                        <td>$value[dt_spesimen] <input type=\"hidden\" name=\"dt_spesimen$i\" value=\"$value[dt_spesimen]\" ></td>
                                        <td></td>
                                    </tr>
                                    ";
                                    $i++;
                                }
                                
                            }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            
                        </tbody>
                        </table>
                        <b>Jumlah Data Yang di ambil:
                        <input type="text" id="iJumlah" value="<?=(!empty($Jumlah))? $Jumlah:'0';?>" disabled="true"/></b>
                        <input type="hidden" name="Jumlah" id="Jumlah" value="<?=(!empty($Jumlah))? $Jumlah:'0';?>"/>
                        <input type="hidden" name="IdAmbil" id="IdAmbil"/>
                        <input type="hidden" name="IdJumlah" id="IdJumlah"/>
                        <input type="hidden" name="DataAmbil" id="DataAmbil"/>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-large" onclick="goto('<?=$application_path;?>/pengambilan')" id="addpengambilan">Tambah baru</button>
							<button type="button" class="btn btn-large" onclick="pengambilan_submit()" id="simpanpengambilan">Simpan</button>
                            <button type="button" class="btn btn-large" onclick="pengambilan_print()" id="print">Print</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>

<!--UI DIALOG-->
<div id="dlg_addsampel" title="Add Sampel">
    <div class="box-body" style="padding:.5em 1em;">
        <form method="GET" id="frmaddsampel" name="frmaddsampel" class='form-horizontal'>
            <input type="hidden" name="status_addsampel"/>
            <table width="100%">
                <!--tr>
                    <td><label for="LabPenelitian" class="control-group">Laboratorium Penelitian</label></td>
                    <td><select name="LabPenelitian" id="LabPenelitian" class='span3'  >
        									<option value=''> - Laboratorium Penelitian - </option>
        									<?php foreach($arr_lab as $value): ?>
        									<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_CODE']; ?> - <?php echo $value['LAB_NAME']; ?></option>
        									<?php endforeach; ?>
        					    </select></td>
                </tr-->
                <tr>
                    <td><label for="nobarcode" class="control-group">No. Barcode</label></td>
                    <td><input type="text" id="nobarcode" name="nobarcode" /></td>
                </tr>
                
                <tr>
                    <td colspan="2"><b>Atau</b></td>
                </tr>
                
                <tr>
                    <td><label for="TGLDiterima" class="control-group">Diterima di lit. Tgl </label></td>
                    <td><input type="text" name="TGLDiterima" id="TGLDiterima" placeholder="dd/mm/yyyy" class="span2 datepick" /></td>
                </tr>
                
                <tr>
                    <td><a class="button button-basic-darkblue control-group" href="#" onclick="get_penerimaan(1);">Search</a></td>
                </tr>
                
                <tr><td colspan="2">
                    
                    <div id="laman"></div></td>
                </tr>
            </table>
        </form>
    </div>
</div>