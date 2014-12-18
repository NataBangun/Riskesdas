<script type="text/javascript">

$(document).ajaxStart(function(){ 
    $('#imgtabel').show(); 
}).ajaxStop(function(){ 
    $('#imgtabel').hide();
});

function get_penerimaan(laman){
    if(laman==null){laman ='';}else{laman = '?laman='+laman;}
    
    $.ajax({
        url:'<?php echo $application_path;?>/pengambilan/get_laman'+laman,
        data:{
            nobarcode: $ID('nobarcode').value,
            tglterima: $ID('TGLDiterima').value
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
        get_penerimaan();
        
        $('#dlg_addsampel').dialog('open');
        //even.preventDefault();
    });    
});


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
                        <input type="hidden" name="status_ambil" value="0"/>
                        
                        
                        <div class="control-group">
                            <label for="NoPengambilan" class="control-label">No. Pengambilan</label>
                            <div class="controls controls-row">
        						<input type="text" name="NoPengambilan" id="NoPengambilan" class="span3" />
                            </div>
                        </div>
                        
                    	<!--div class="control-group">
                            <label for="TGLDiterima" class="control-label">Tanggal Diterima Di Lit.</label>
                            <div class="controls controls-row">
        						<input type="text" name="TGLDiterima" id="TGLDiterima" placeholder="dd/mm/yyyy" class="span2 datepick" />
                            </div>
                        </div-->
                        
                        <div class="control-group">
                            <label for="TGLSerahTerima" class="control-label">Tanggal Serah Terima</label>
                            <div class="controls controls-row">
        						<input type="text" name="TGLSerahTerima" id="TGLSerahTerima" placeholder="dd/mm/yyyy" class="span2 datepick" />
                            </div>
                        </div>
                        
                        <!--div class="control-group">
                            <label for="LabPenelitian" class="control-label">Laboratorium Penelitian</label>
                            <div class="controls controls-row">
                                <select name="LabPenelitian" id="LabPenelitian" class='span3'  >
        									<option value="0"> - Laboratorium Penelitian - </option>
        									<?php foreach($arr_lab as $value): ?>
        									<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_CODE']; ?> - <?php echo $value['LAB_NAME']; ?></option>
        									<?php endforeach; ?>
        					    </select>
                                
                            </div>
                        </div-->
                        
                        <div class="control-group">
                            <label for="YangMenyerahkan" class="control-label">Yang Menyerahkan</label>
                            <div class="controls controls-row">
        						<input type="text" name="YangMenyerahkan" id="YangMenyerahkan" class="span3" />
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="YangMenerima" class="control-label">Yang Menerima</label>
                            <div class="controls controls-row">
        						<input type="text" name="YangMenerima" id="YangMenerima" class="span3" />
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="Ket" class="control-label">Keterangan</label>
                            <div class="controls controls-row">
        						<textarea name="Ket" id="Ket" class="span3" ></textarea>
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
                                <th width="2%">Aktif</th>
								<th width="15%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <td>1</td>
                                <td>1234509</td>
                                <td>1234509</td>
                                <td>1234509</td>
                                <td>1234509</td>
                                <td>1234509</td>
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
                        
                        </div>
                        <div class="form-actions">
							<button type="button" class="btn btn-large" onclick="addpenerimaan_submit()" id="simpanpenerimaan">Simpan</button>
                            <button type="button" class="btn btn-large" onclick="addpenerimaan_submit()" id="simpanpenerimaan">Print</button>
							<button type="button" class="btn btn-large">Cancel</button>
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
            <table width="100%"">
                <tr>
                    <td><label for="LabPenelitian" class="control-group">Laboratorium Penelitian</label></td>
                    <td><select name="LabPenelitian" id="LabPenelitian" class='span3'  >
        									<option value="0"> - Laboratorium Penelitian - </option>
        									<?php foreach($arr_lab as $value): ?>
        									<option value="<?php echo $value['LAB_CODE']; ?>"><?php echo $value['LAB_CODE']; ?> - <?php echo $value['LAB_NAME']; ?></option>
        									<?php endforeach; ?>
        					    </select></td>
                </tr>
                <tr>
                    <td><label for="TGLDiterima" class="control-group">Diterima di lit. Tgl </label></td>
                    <td><input type="text" name="TGLDiterima" id="TGLDiterima" placeholder="dd/mm/yyyy" class="span2 datepick" /></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Atau</b></td>
                </tr>
                <tr>
                    <td><label for="nobarcode" class="control-group">No. Barcode</label></td>
                    <td><input type="text" id="nobarcode" name="nobarcode" /></td>
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