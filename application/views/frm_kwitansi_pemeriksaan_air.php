<script type="text/javascript">
    
        $(document).ajaxStart(function(){ 
          $('#imgtabel').show(); 
        }).ajaxStop(function(){ 
          $('#imgtabel').hide();
        })
		.ready(function(){
		  $('#imgtabel').hide();
		});
		;

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

$(function(){
	
    $('#cetak').click(function(){
var sList = 0;
$('input[type=checkbox][id=select]').each(function () {
    var sThisVal = (this.checked ? "1" : "0");
    sList += sThisVal;
});
if(sList > 0)
{
		pengujian_sampel_print();
}
else
{
alert("Silihkan pilih data yang akan di print");
}
    });    
    });    
	
function pengujian_sampel_print(){
    $ID('status_pengujian').value =2;
    $.ajax({
		method:"POST",
        data    : $("#frm1").serialize(),
		url: "<?php echo $application_path;?>/frm_kwitansi_pemeriksaan_air/print_pengujian/",
        complete: function(rs){
            var rt=rs.responseText;
            x = window.open("", "frm_kwitansi_pemeriksaan_air", '');
			x.document.write(rt);
        }
    });
}


	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
		});
	});

	function dialog_action(id){
			$( "#dialog" ).dialog( "open" );
       $.ajax({
		method:"POST",
        data    : $("#frm1").serialize(),
		url: "<?php echo $application_path;?>/frm_kwitansi_pemeriksaan_air/ajax_sampel/"+id,
        complete: function(rs){
            var rt=rs.responseText;
            $ID('ajax_sampel').innerHTML=rt;
        }
			});   	event.preventDefault();
	}

		// function tampiltabel(ID){
         //   $.ajax({
           //                 url:'<?php echo $application_path;?>/frm_kwitansi2/tampilTabel/'+ID,
             //               complete: function(res, status){
                                //var kotak = res.responseText;
               //                 document.getElementById('tabelAliquote').innerHTML=res.responseText;
                 //           }
                   //     });
        //}
        
	
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
		<h4><i class="icon-table"></i> Form Kwitansi</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="#">List</a><span class="divider">/</span></li>			
			<li class='active'>Form Kwitansi</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form Kwitansi</span>
				</div>
				<div class="box-body box-body-nopadding">
					<div class="highlight-toolbar">
						<div class="pull-left">
							<!--div class="btn-toolbar">
								<div class="btn-group"-->
				<!--form action="<!?php echo $application_path; ?>/search_bm02/index" method="POST" class='form-horizontal'-->
				<form method="POST" class='form-horizontal'>
									<!--<a href="#" class="button button-basic button-icon" rel="tooltip" title="Refresh results" onclick="reloadPage()"><i class="icon-refresh"></i></a>-->
									<label><span>Search:</span><input name="search" rel="tooltip" title="Search dengan Nomor Barcode" id="search" type="text" placeholder="Search here" /></label>
				</form>
								<!--/div>
							</div-->
						</div>
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong><?php echo $laman_row_awal."-".$laman_row_akhir ?></strong> of <strong><?php echo $laman_jumlah ?></strong></span>
								</div>
								<div class="btn-group">
									<a href="#" onclick="goto('list_penerimaan/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
								</div>
							</div>
						</div>
					</div>
					<!--<table class="table table-nomargin table-bordered dataTable table-striped table-hover">-->
					<table class="table table-nomargin table-bordered table-pagination">
						<thead>
							<tr>
								<th width="1%">No.</th>
								<th width="10%">No Formulir</th>
								<th width="10%">Nama</th>
								<th width="5%">No. Telpon</th>
								<th width="10%">Tanggal</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_t_pengujian_sampel )) {
									echo '<tr><td colspan="13" style="color:red;"><center><b> Data Form PENERIMAAN Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_t_pengujian_sampel as $value):
							?>
								<tr id='t_pengujian_sampel_<?php echo $value['T_PENGUJIAN_SAMPEL_ID']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="T_PENGUJIAN_SAMPEL_ID" id="<?php echo $value['T_PENGUJIAN_SAMPEL_ID']; ?>" value="<?php echo $value['T_PENGUJIAN_SAMPEL_ID']; ?>" />
										<input type="hidden" name="NAMA" value="<?php echo $value['NAMA']; ?>" />
										<input type="hidden" name="NO_TELPON" value="<?php echo $value['NO_TELPON']; ?>" />
										<input type="hidden" name="TANGGAL" value="<?php echo $value['TANGGAL']; ?>" />
									</td>
									<td class='table-icon' >
										<?php echo $value['T_PENGUJIAN_SAMPEL_ID']; ?>
									</td>
									<td class='table-icon' >
										<?php echo $value['NAMA']; ?>
									</td>
									<td>
										<?php echo $value['NO_TELPON']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['TANGGAL']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
								<button style='margin-left: 2.5641%;' class='button button-basic button-icon' id='dialog-link' onclick="dialog_action(<?php echo $value['T_PENGUJIAN_SAMPEL_ID']; ?>)" type='button'>Detail</button>
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
						<div class="pull-right">
							<div class="btn-toolbar">
								<div class="btn-group">
									<span><strong><?php echo $laman_row_awal."-".$laman_row_akhir ?></strong> of <strong><?php echo $laman_jumlah ?></strong></span>
								</div>
								<div class="btn-group">
									<a href="#" onclick="goto('list_penerimaan/?laman=1')" class="button button-basic button-icon" ><i>First</i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=<?php echo ($laman-1) ?>')" class="button button-basic button-icon" ><i>Previous</i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=<?php echo $laman ?>')" class="button button-basic button-icon" ><i> <?php echo $laman ?> </i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=<?php echo ($laman+1) ?>')" class="button button-basic button-icon" ><i>Next</i></a>
									<a href="#" onclick="goto('list_penerimaan/?laman=-1')" class="button button-basic button-icon" ><i>Last</i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ui-dialog -->

<div id="dialog" title="Tabel Pengujian Sampel">
	<div class="box-body" style="padding:.5em 1em;">
		<form method="POST" id="frm1" name="frm1" class='form-horizontal'>
		<input type="hidden" id="status_pengujian" name="status_pengujian" value="<?=(isset($status_pengujian))?$status_pengujian:"0";?>"/>
	                    
	<table class="table2 table2-striped table2-nomargin table2-mail">
				<thead>
					<tr>
					<th width='12%' align='center'>NO</th>
					<th width='12%' align='center'>No Sampel</th>
					<th width='12%' align='center'>Jenis Air</th>
					<th width='12%' align='center'>Tanggal</th>
					<th width='15%' align='center'>Alamat</th>
					<th width='12%' align='center'>Kedalaman</th>
					<th width='15%'>Action</th>
										</tr>
									</thead>
									<tbody id="ajax_sampel">
																		</tbody>
								</table>								
<div class="pull-left">
        <label for="selectall" class="control-label">Pilih Semua</label>
        <div class="controls controls-row">
		<input type="checkbox"  name="selectall" onclick="checktogle(this)" />
        </div>
</div>

<div class="pull-right">
<button type="button" class="btn btn-large" id="cetak">Print</button>
</div>
		</form>
	</div>
</div>