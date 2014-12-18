<script type="text/javascript">

$(document).ajaxStart(function(){ 
    $('#imgtabel').show(); 
}).ajaxStop(function(){ 
    $('#imgtabel').hide();
});

checked=false;
function checktogle(){
	var aa= document.getElementById('frm1');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
}

function pengembalian_print(){
    $ID('status_pengembalian').value =2;    
    $.ajax({
        type    : "POST",
        url     : '<?php echo $application_path;?>/pengembalian/get_method',
        data    : $("#frm1").serialize(),
        complete: function(rs){
            var rt=rs.responseText;
            window.open("<?php echo $application_path;?>/pengembalian/print_pengembalian"+rt, "Pengembalian", '');
        }
    });
}

function selectogle(){
    
    for (var i=0; i < obj.options.length; i++) {
		if (obj.options[i].value == value) {
			obj.options[i].selected = true;
		}
	}
}

function combobox_select(obj, value) {
	for (var i=0; i < obj.options.length; i++) {
		if (obj.options[i].value == value) {
			obj.options[i].selected = true;
		}
	}
}

function get_pengambilan(laman){
    if(laman==null){laman ='';}else{laman = '?laman='+laman;}
    
    $.ajax({
        url:'<?php echo $application_path;?>/pengembalian/get_laman'+laman,
        data:{
            nopengambilan: $ID('NoPengambilanC').value,
            tglserahterima: $ID('TGLSerahTerimaC').value,
            lab: $ID('LabPenelitian').value
        },
        complete:function(res,status){
            $ID('laman').innerHTML =res.responseText;
        }
    });
}

function getJumlah(id){
    $.ajax({
        url:'<?php echo $application_path;?>/pengembalian/getJumlah/'+id,
        complete:function(res,status){
           $ID("Jumlah").value = res.responseText;             
        }
    })
}

function getAmbil(id){
    $.ajax({
        url:'<?php echo $application_path;?>/pengembalian/getAmbil/'+id,
        complete:function(res,status){
           $ID("tb1").innerHTML = res.responseText;             
        }
    });
}

function pilih(id){
    getAmbil(id);
    getJumlah(id);
    $.ajax({
        url:'<?php echo $application_path;?>/pengembalian/pilih/'+id,
        complete:function(res,status,data){
            var rows = eval(res.responseText);
            var vnopengambilan = $ID('NoPengambilan');
            var vtglserahterima = $ID('TGLSerahTerima');
            var vymk = $ID('YangMenyerahkan');
            var vymn = $ID('YangMenerima');
            var vket = $ID('Ket');
            
            
            vnopengambilan.value = rows[0].no_formpengambilan;
            vtglserahterima.value = rows[0].tgl_serahterima;
            vymk.value = rows[0].yg_menyerahkan;
            vymn.value = rows[0].yg_menerima;
            vket.value = rows[0].ket;
            
             $('#dlg_cari').dialog('close');
        }
    })
}

$(function(){
    combobox_select($ID("LabPenelitian"), "<?=$labcode;?>");
    $('#imgtabel').hide();
    
    //dialog AddSampel
    $('#dlg_cari').dialog({
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

    $('#bCari').click(function(){
        if($ID('LabPenelitian').value==''){
            alert('Penelitian harus di pilih');
            $ID('LabPenelitian').focus();
        }else{
            //get_penerimaan();
            get_pengambilan();
            $('#dlg_cari').dialog('open');
            
        }        
    });
    
    $('#btn_simpan').click(function(){
        var vtgl = $ID('TglKembali');
        if(vtgl==''){
            alert('tanggal mohon di isi.');
            vtgl.focus();
        }else{
            $ID('frm1').submit();
        }
    });
    
    $('#btn_print').click(function(){
        pengembalian_print();
    });    
});
    
<?php if (isset($status_pengambilan) && $status_pengambilan == 1) { ?>
	jQuery(document).ready(function(){
		alert('tambah data berhasil.');
        $ID('btn_tambah').disabled=true;
        $ID('btn_simpan').disabled=true;
        
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
		<h4>Form Pengembalian</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Pengembalian</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Pengembalian</span>
                </div>
                <div class="box-body">
                    <form method="POST" id="frm1" name="pengembalian" class='form-horizontal'>
                         <input type="hidden" id="status_pengembalian" name="status_pengembalian" value="<?=(isset($status_pengembalian))?$status_pengembalian:"0";?>"/>
                    
                        <div class="control-group">
                            <label for="NoPengembalian" class="control-label">No. Pengembalian</label>
                            <div class="controls controls-row">
        						<input type="text" name="NoPengembalian" id="NoPengembalian" class="span3" value="<?=$NoPengambilan;?>" />
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="NoPengambilan" class="control-label">No. Pengambilan</label>
                            <div class="controls controls-row">
        						<input type="text" name="NoPengambilan" id="NoPengambilan" class="span3" value="<?=$NoPengambilan;?>" readonly="true"/>
                                <button type="button" class="button button-basic-blue" id="bCari">Cari</button>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="TGLSerahTerima" class="control-label">Tanggal Serah Terima</label>
                            <div class="controls controls-row">
        						<input type="text" name="TGLSerahTerima" id= "TGLSerahTerima" class="span3" value="<?=$TGLSerahTerima;?>" readonly="true"/>
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
        						<input type="text" name="YangMenyerahkan" id="YangMenyerahkan" class="span3"  value="<?=$YangMenyerahkan;?>" readonly="true"/>
                                
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="YangMenerima" class="control-label">Yang Menerima</label>
                            <div class="controls controls-row">
        						<input type="text" name="YangMenerima" id="YangMenerima" class="span3"  value="<?=$YangMenerima;?>" readonly="true"/>
                                
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="Ket" class="control-label">Keterangan</label>
                            <div class="controls controls-row">
        						<textarea name="Ket" name="Ket" id="Ket" class="span3" readonly="true"> <?=$Ket;?></textarea>
                                
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="Jumlah" class="control-label">Jumlah</label>
                            <div class="controls controls-row">
        						<input type="text" name="Jumlah" id="Jumlah" class="span3"  value="<?=$Jumlah;?>" readonly="true"/>
                                <input type="hidden" value="<?=$Jumlah;?>" />
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="TglKembali" class="control-label">Tanggal Kembali</label>
                            <div class="controls controls-row">
        						<input type="text" name="TglKembali" id="TglKembali" class="span3 datepick" placeholder="dd/mm/yyyy"/> <?=$TglKembali;?></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="selectall" class="control-label">Ceklist Semua</label>
                            <div class="controls controls-row">
                                <input type="checkbox" name="selectall" onclick="checktogle(this)" />
                            </div>
                            <!--div class="controls-row">
                                <select class="span7" name="statusall" id="statusall" onclick="selecttogle()">
                                    <option value='0'>Di simpan kembali</option>
                                    <option value='2'>Di musnahkan</option>
                                    <option value='3'>Habis</option>
                                </select>
                            </div-->
                        </div>
                        
                        <div class="control-group">
                            <button id="btn_tambah" type="button" class="button button-basic-blue" >Tambah Pengembalian</button>
                            <button id="btn_simpan" type="button" class="button button-basic-blue" >Simpan Pengembalian</button>
                            <button id="btn_print" type="button" class="button button-basic-blue" >Print Pengembalian</button>
                        </div>
                        
                        
                        
                        <table class="table2 table2-striped table2-nomargin table2-mail">
						<thead>
							<tr>
								<th width="1.5%">No.</th>
                                <th width="1.5%">Kembali</th>
								<th width="15%">No Barcode</th>
								<th width="10%" class='table-date'>Tgl. Terima</th>
								<th width="10%">Kondisi</th>
								<th width="10%">Jenis</th>
                                
								<th width="15%"><center>Action</center></th>
                                
							</tr>
						</thead>
						<tbody id="tb1">
                            <?php
                            
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                        </table>
                        
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>

<!--UI DIALOG-->
<div id="dlg_cari" title="Add No Pengambilan">
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
                    <td><label for="NoPengambilanC" class="control-group">No. Pengambilan</label></td>
                    <td><input type="text" id="NoPengambilanC" name="NoPengambilanC" /></td>
                </tr>
                
                <tr>
                    <td colspan="2"><b>Atau</b></td>
                </tr>
                
                <tr>
                    <td><label for="TGLSerahTerimaC" class="control-group">Diterima di lit. Tgl </label></td>
                    <td><input type="text" name="TGLSerahTerimaC" id="TGLSerahTerimaC" placeholder="dd/mm/yyyy" class="span2 datepick" /></td>
                </tr>
                
                <tr>
                    <td><a class="button button-basic-darkblue control-group" href="#" onclick="get_pengambilan(1);">Search</a></td>
                </tr>
                
                <tr><td colspan="2">
                    
                    <div id="laman"></div></td>
                </tr>
            </table>
        </form>
    </div>
</div>