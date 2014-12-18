<script type="text/javascript">
    
        $(document).ajaxStart(function(){ 
          $('#imgtabel').show(); 
        }).ajaxStop(function(){ 
          $('#imgtabel').hide();
        });
        
        
        function bersihAliquot(){
            $('#Aliquot').val('');
            $('#Revco').val('');
            $('#Rack').val('');
            $ID('hBox').selectedIndex(0);
            $('#Kotak').val('');
        }
        
        function getbox(idrevco,norak){
            $.ajax({
                url:'<?=$application_path;?>/list_penerimaan/get_arr_box/'+idrevco+'/'+norak,
                complete:function(res,status){
                    $ID('hBox').innerHTML=res.responseText;
                }
            })
        }
        
        function kapasitasRak(idrevco){
            $.ajax({
                url:'<?=$application_path;?>/list_penerimaan/get_kapasitas/'+idrevco,
                complete:function(res,status){
                    $ID('Rack').innerHTML=res.responseText;
                }
            })
        }
        
        function jmlAliquot(){
            $.ajax({
                url:'<?=$application_path;?>/penerimaan/tampiljumlahaliquote/'+$ID('NoBarcode').value,
                complete:function(res,status){
                    $ID('jmlAliquot').value=res.responseText;
                    $ID('hjmlAliquot').value=res.responseText;
                }
            })
        }
    
        function addpenerimaan_submit(){
            if(document.penerimaan.NoBarcode.value==''){
                alert('No Barcode Harus di Isi.');
            }else if(document.penerimaan.umurART.value==''){
                alert('Umur ART  Harus di Isi.');
            }else if(document.penerimaan.TGLDiterima.value==''){
                alert('Tanggal lit Diterima Harus di Isi.');
            }else{
                $ID('frm1').submit();
            }
        }
        
        function boxadd(id){
            var obj= document.getElementById("box"+id);
            var i=$('#kotakpilih').val();
            var obj2=document.getElementById("box"+i);
            //$('#kotakpilih').val(0);
            if($('#kotakpilih').val()==0){
                obj.style.backgroundColor="yellow";
                //obj2.style.backgroundColor = "#9999ff";
                $('#kotakpilih').val(id);
            }else{
                obj.style.backgroundColor="yellow";
                obj2.style.backgroundColor="#9999ff";
                $('#kotakpilih').val(id);
            }
            $('#Kotak').val(id);
        };
        
        function addkotak(){
            $('#Kotak').val($('#kotakpilih').val());
        }
        
        function cek_kotak(){
            var vbarcode    = document.getElementById('NoBarcode');
            var valiquot    = document.getElementById('Aliquot');
            var vrevco      = document.frmAliquot.Revco;
            var vrack       = document.frmAliquot.Rack;
            var vbox        = document.frmAliquot.Box;
            var vtype       = document.frmAliquot.TypeBox;
            
            if(vbarcode.value==''){
                alert('Nomor Barcode harus diisi.');
                vbarcode.focus();
            }else if(valiquot.value==''){
                alert('Nomor Aliquot harus diisi.');
                valiquot.focus();
            }else if(vrevco.selectedIndex==0){
                alert('Nomor Revco harus dipilih.');
                vrevco.focus();
            }else if(vbox.selectedIndex==0){
                alert('Nomor Box harus dipilih.');
                vbox.focus();
            }else if(vtype.selectedIndex==0){
                alert('Type Box harus dipilih.');
                vtype.focus();
            }else{
                tampilkotak();
                tampilkotaktabel();
                $( "#dialog-view" ).dialog( "open" );
            }
        }
        
        function hapus(id){
            $.ajax({
                url:'<?php echo $application_path;?>/list_penerimaan/hapusaliquote/'+id,
                complete: function(res, status){
                    alert('Data berhasil di hapus');
                    tampiltabel();
                }
                
            });
        }
        
        function tampiltabel(){
            $.ajax({
                            url:'<?php echo $application_path;?>/list_penerimaan/tampilTabel/'+$ID('NoBarcode').value,
                            complete: function(res, status){
                                //var kotak = res.responseText;
                                document.getElementById('tabelAliquote').innerHTML=res.responseText;
                            }
                        });
        }
        
        function tampilkotak(){
         $.ajax({
                url:'<?php echo $application_path;?>/list_penerimaan/tampil_kotak/'+$('#Box').val()+'/'+$('#Revco').val()+'/'+$('#Rack').val()+'/'+$('#TypeBox').val(),
                complete: function(res, status){
                    var kotak = res.responseText;
                    document.getElementById('kotaktampil').innerHTML=res.responseText;
                }
            });
        }
        
        function tampilkotakisi(box,revco,rak,typebox,kotak){
         if(typebox==''){
                 typebox.value=0;
             }
         $.ajax({
             
                url:'<?php echo $application_path;?>/list_penerimaan/tampil_kotak/'+box+'/'+revco+'/'+rak+'/'+typebox+'/'+kotak,
                complete: function(res, status){
                    var kotak = res.responseText;
                    document.getElementById('kotaktampil').innerHTML=res.responseText;
                }
            });
        }
        
        function tampilkotaktabel(){
            $.ajax({
                url:'<?php echo $application_path;?>/list_penerimaan/tampil_tabel_kotak/'+$('#Box').val()+'/'+$('#Revco').val()+'/'+$('#Rack').val()+'/'+$('#TypeBox').val(),
                
                complete: function(res, status){
                    var kotak = res.responseText;
                    document.getElementById('tabelkotak').innerHTML=res.responseText;
                }
            });
        }
        
        function tampilkotakisitabel(box,revco,rak,typebox){
            if(typebox==''){
                 typebox.value=0;
             }
         $.ajax({
             
                url:'<?php echo $application_path;?>/list_penerimaan/tampil_tabel_kotak/'+box+'/'+revco+'/'+rak+'/'+typebox,
                complete: function(res, status){
                    var kotak = res.responseText;
                    document.getElementById('tabelkotak').innerHTML=res.responseText;
                }
            });
        }
        
       function typebox(idbox){
            
            $.ajax({
                url:'<?php echo $application_path;?>/list_penerimaan/get_typebox/'+idbox,
                complete:function(res,status){
                    combobox_selection($ID('TypeBox'), res.responseText);
                    $ID('Box').value=idbox;
                }
            });
        }
        
        function simpanAliquot(){
            var vbarcode    = document.getElementById('NoBarcode');
            var valiquot    = document.getElementById('Aliquot');
            var vrevco      = document.frmAliquot.Revco;
            var vrack       = document.frmAliquot.Rack;
            var vbox        = document.frmAliquot.Box;
            var vtype       = document.frmAliquot.TypeBox;
            var vkotak      = document.frmAliquot.Kotak;
       
            
            if(vbarcode.value==''){
                alert('Nomor Barcode harus diisi.');
                vbarcode.focus();
            }else if(valiquot.value==''){
                alert('Nomor Aliquot harus diisi.');
                valiquot.focus();
            }else if(vrevco.selectedIndex==0){
                alert('Nomor Revco harus dipilih.');
                vrevco.focus();
            }else if(vbox.selectedIndex==0){
                alert('Nomor Box harus dipilih.');
                vbox.focus();
            }else if(vtype.selectedIndex==0){
                alert('Type Box harus dipilih.');
                vtype.focus();
            }else if(vkotak.value==''){
                alert('Type Box harus dipilih.');
                vkotak.focus();
            }else{
              
                $.post('<?php echo $application_path;?>/penerimaan/simpanAliquote',
				{
                                       
                                        
                                        NoBarcode:$('#NoBarcode').val(), 
                                        Aliquote:$('#Aliquot').val(),
                                        Revco:$('#Revco').val(),
                                        Rack:$('#Rack').val(),
                                        Box:$('#Box').val(),
                                        Kotak:$('#Kotak').val(),
                                        Judul:$('#Judul').val(),
                                        Typebox:$('#TypeBox').val()
					
            },function(){tampiltabel(),jmlAliquot()});
            bersihAliquot();
            
            }
           jmlAliquot();
        
        }

//file penerimaan
	function combobox_select(obj, value) {
		for (var i=0; i < obj[0].options.length; i++) {
			if (obj[0].options[i].value == value) {
				obj[0].options[i].selected = true;
			}
		}
	}
        function combobox_selection(obj, value) {
		for (var i=0; i < obj.options.length; i++) {
			if (obj.options[i].value == value) {
				obj.options[i].selected = true;
			}
		}
	}
	
	function delete_link(formpenerimaan_id) {
		if (confirm('Anda yakin akan menghapus data ini? ')) {
			goto('list_penerimaan/del/' + formpenerimaan_id);
		}
	}
	
        function kabupaten(){
            $.ajax({
                            url:'<?php echo $application_path;?>/list_penerimaan/kabupaten/'+$ID('Prov').value,
                            complete: function(res, status){
                                //var kotak = res.responseText;
                                document.getElementById('div_kota').innerHTML=res.responseText;
                            }
                        });
        }
        function kecamatan(){
                    $.ajax({
                                    url:'<?php echo $application_path;?>/list_penerimaan/kecamatan/'+$ID('Prov').value+'/'+$ID('Kota').value,
                                    complete: function(res, status){
                                        //var kotak = res.responseText;
                                        document.getElementById('div_kec').innerHTML=res.responseText;
                                    }
                                });
                }
        function kelurahan(){
                    $.ajax({
                                    url:'<?php echo $application_path;?>/list_penerimaan/kelurahan/'+$ID('Prov').value+'/'+$ID('Kota').value+'/'+$ID('Kec').value,
                                    complete: function(res, status){
                                        //var kotak = res.responseText;
                                        document.getElementById('div_kel').innerHTML=res.responseText;
                                    }
                                });
                }
        
	function edit_link_action(formpenerimaan_id) {  
		
		var objTR = $('#formpenerimaan_'+formpenerimaan_id).get(0);
		// alert(objTR);
                $('#dialog-update input[name="formpenerimaan_id"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="formpenerimaan_id"]').val() );
		$('#dialog-update input[name="NoStiker"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="NoStiker"]').val() );
                combobox_select($('#dialog-update select[name="JenisSpesimen"]').val( $.trim( objTR.children[5].innerHTML )));
                $('#dialog-update input[name="NoBarcode"]').val( $.trim( objTR.children[1].innerHTML ));
                combobox_select( $('#dialog-update select[name="KondisiSpesimen"]').val( $.trim( objTR.children[6].innerHTML )));
                combobox_select($('#dialog-update select[name="AsalInstitusi"]').val( $.trim( objTR.children[3].innerHTML )));
                $('#dialog-update input[name="Visit"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Visit"]').val());
                $('#dialog-update input[name="SuhuDtg"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="SuhuDtg"]').val());
                combobox_select($('#dialog-update select[name="NamaPenelitian"]').val( $.trim( objTR.children[4].innerHTML )));
                $('#dialog-update input[name="VSpesimen"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="VSpesimen"]').val() );
                $('#dialog-update input[name="JSpesimen"]').val( $.trim( objTR.children[7].innerHTML ));
                combobox_select($('#dialog-update select[name="NamaSite"]'), $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="NamaSite"]').val());
                $('#dialog-update input[name="NamaART"]').val( $.trim( objTR.children[2].innerHTML ) );
                combobox_select($('#dialog-update select[name="SimpanSpesimen"]').val( $.trim( objTR.children[8].innerHTML )));
                $('#dialog-update input[name="umurART"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="umurART"]').val() );
                $('#dialog-update input[name="TGLKirim"]').val( $.trim( objTR.children[11].innerHTML ) );
                $('#dialog-update input[name="Pengirim"]').val( $.trim( objTR.children[9].innerHTML ) );
                $('#dialog-update input[name="JK"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="JK"]').val() );
                $('#dialog-update input[name="DiambilTanggal"]').val( $.trim( objTR.children[10].innerHTML ) );
                $('#dialog-update input[name="TGLDiterima"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="TGLDiterima"]').val() );
                $('#dialog-update input[name="Alamat"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Alamat"]').val() );
                $('#dialog-update input[name="AWB"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="AWB"]').val() );
                combobox_select($('#dialog-update select[name="Prov"]'), $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Prov"]').val());
                kabupaten();
                $('#dialog-update input[name="Ket"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Ket"]').val() );
                combobox_select($('#dialog-update select[name="Kota"]'), $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Kota"]').val());
                kecamatan();
                $('#dialog-update input[name="jmlAliquot"]').val( $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="jmlAliquot"]').val() );
                combobox_select($('#dialog-update select[name="Kec"]'), $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Kec"]').val());
                kelurahan();
                combobox_select($('#dialog-update select[name="Desa"]'), $('#formpenerimaan_'+formpenerimaan_id+ ' input[name="Desa"]').val());
                jmlAliquot();
        } 
	
//        $(document).ready(function(){
////            $ID('NoBarcode').disabled=true;
////            $ID('NoStiker').disabled=true;
////            $ID('AsalInstitusi').disabled=true;
////            $ID('NamaPenelitian').disabled=true;
////            $ID('Prov').disabled=true;
////            $ID('JenisSpesimen').disabled=true;
////            $ID('Visit').disabled=true;
//        });
	$(function() {
		$( "#dialog-update" ).dialog({
			autoOpen: false,
			width: 1100,
			height: 500
			
		});

		//$( "#dialog-link" ).click(function(){
		document.dialog_click = function( formpenerimaan_id ) {			
			$( "#dialog-update" ).dialog( "open" );
			edit_link_action(formpenerimaan_id);
                }
                
		
	});
        
        
        $(document).ready(function() {
		// var vNoBarcode = $ID('NoBarcode').value;
                        $('#imgtabel').hide();
                        $('#barcodevalid').hide();
			$ID('NoBarcode').focus();
	});

	
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 750,
                        buttons: [
				 {
					 text: "Simpan",
					 click: function() {
                                             simpanAliquot();
					 }
				 },
				 {
					 text: "Close",
					 click: function() {
						 $( this ).dialog( "close" );
					 }
				 }
                        ]
		});

		$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
                        tampiltabel();
                        bersihAliquot();
			event.preventDefault();
		});
	});


	$(function() {
		$( "#dialog-view" ).dialog({
			autoOpen: false,
			width: 700,
			 height:450,
			 buttons: [
			{
					 text: "Ok",
					 click: function() {
					 $( this ).dialog( "close" );
					 }
			},
			{
					 text: "Cancel",
                                        click: function() {
                                            $('#Kotak').val('');
					 $( this ).dialog( "close" );
				}
			},
			{
					 text: "Print",
					 click: function() {
                                             a =parseInt($('#noRack').val());
                                             b = a +1;
                                             c = parseInt($('#Box').val());
                                             d = c + 1;
					 // print("<?php echo $application_path;?>/cetak_box_spesimen/cetak_isi_box/"+$('#Box').val()+'/'+$('#Revco').val()+'/'+$('#Rack').val(),"Cetak","status=1,toolbar=1");;
					 window.open ("<?php echo $application_path;?>/cetak_box_spesimen/cetak_isi_box/"+$('#Box').val()+'/'+b +'/'+$('#Revco').val(),"Cetak","status=1,toolbar=1");;
					 }
			},
                        ]
		});

		$( "#dialog-link2" ).click(function( event ) {
			
                        cek_kotak();
			event.preventDefault();
		});
	});
	
	function reload(value) {
		jQuery.ajax({
			url:'<?php echo $application_path; ?>/list_penerimaan/nobarcode/'+value,
			complete: function(res, status) {
				var rows = eval(res.responseText);
				var vprov = document.penerimaan.Prov;
				var vkota = document.penerimaan.Kota;
				var vkec = document.penerimaan.Kec;
				var vdesa = document.penerimaan.Desa;
				var vnamaart = document.penerimaan.NamaART;
				var vumur = document.penerimaan.umurART;
				var vjk = document.penerimaan.JK;
				var valamat = document.penerimaan.Alamat;
				
				vprov.value = rows[0].propinsi_id;
				vkota.value = rows[0].kabupaten_id;
				vkec.value = rows[0].kecamatan_id;
				vdesa.value = rows[0].kelurahan_id;
				vnamaart.value = rows[0].nama_ART;
				vumur.value = rows[0].umurART;
				vjk.value = rows[0].JK;
				valamat.value = rows[0].alamatART;
			}
		}); 
	}
        
        function cek(){
            $.post('<?php echo $application_path;?>/penerimaan/cek',
            {NoBarcode:$('#NoBarcode').val()} ,
            function(data){
				if (data=='no'){
					//alert("No barcode sudah terdaftar.");
                                        $('#simpanpenerimaan').hide();
                                        $('#barcodevalid').show();
				}
                                else {
                                        $('#simpanpenerimaan').show();
                                        $('#barcodevalid').hide();
                                }				
            });
        }
	
        
	
        function nobarcode(event) {
		//alert(event.keyCode);
		if (event.keyCode == 13) {
			//alert('hi')
			var vNoBarcode = $ID('NoBarcode').value;
			var vNoStiker = $ID('NoStiker').value;
			if(document.penerimaan.NoBarcode.value.length==13){
			$ID('NoBarcode').value = vNoBarcode;
			$ID('NoStiker').value = vNoBarcode.substring(5,11);
			combobox_selection(document.penerimaan.AsalInstitusi,vNoBarcode.substring(0,1));
			combobox_selection(document.penerimaan.NamaPenelitian,vNoBarcode.substring(1,3));
			combobox_selection(document.penerimaan.Prov,vNoBarcode.substring(3,5));
			kabupaten();
			$ID('Visit').value = vNoBarcode.substring(11,12);
			combobox_selection(document.penerimaan.JenisSpesimen,vNoBarcode.substring(12,13));
			}
//                        jmlAliquot();
		}
	}
        
	function editpenerimaan_submit() {

            if(document.penerimaan.NoBarcode.value==''){
                alert('No Barcode Harus di Isi.');
            }else if(document.penerimaan.umurART.value==''){
                alert('Umur ART  Harus di Isi.');
            }else{
                $ID('frm1').submit();
            }
		
	}
	
	<?php if (isset($status_upmalaria) && $status_upmalaria == 1) { ?>
	jQuery(document).ready(function(){
		alert('Edit data berhasil');
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
		<h4><i class="icon-table"></i> List Data Penerimaan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="#">List</a><span class="divider">/</span></li>			
			<li class='active'>Form List Penerimaan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Form List Penerimaan</span>
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
								<th width="10%">No Barcode</th>
								<th width="10%">Nama ART</th>
								<th width="10%">Institusi</th>
								<th width="5%">Penelitian</th>
								<th width="7%">Spesimen</th>
								<th width="7%">Kondisi</th>
								<th width="3%">Jumlah</th>
								<th width="10%">Simpan di</th>
								<th width="8%">Pengirim</th>
								<th width="10%" class="table-data">Tgl Ambil</th>
								<th width="10%" class='table-date'>Tgl Kirim</th>
								<th width="11%"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (empty($arr_formpenerimaan )) {
									echo '<tr><td colspan="13" style="color:red;"><center><b> Data Form PENERIMAAN Masih Kosong. </b><center></td></tr>';
								}
							?>
							<?php 
								$no = 1;
								foreach($arr_formpenerimaan as $value):
							?>
								<tr id='formpenerimaan_<?php echo $value['formpenerimaan_id']; ?>'>
									<td>
										<?php echo $no ?>
										<input type="hidden" name="formpenerimaan_id" value="<?php echo $value['formpenerimaan_id']; ?>" />
										<input type="hidden" name="NoStiker" value="<?php echo $value['no_stiker']; ?>" />
										<input type="hidden" name="Visit" value="<?php echo $value['visit']; ?>" />
										<input type="hidden" name="VSpesimen" value="<?php echo $value['volspesiment']; ?>" />
										<input type="hidden" name="SuhuDtg" value="<?php echo $value['suhudtg']; ?>" />
										<input type="hidden" name="NamaSite" value="<?php echo $value['site_kode']; ?>" />
										<input type="hidden" name="umurART" value="<?php echo $value['umurART']; ?>" />
										<input type="hidden" name="JK" value="<?php echo $value['JK']; ?>" />
										<input type="hidden" name="TGLDiterima" value="<?php echo $value['tgl_terima']; ?>" />
										<input type="hidden" name="Alamat" value="<?php echo $value['alamatART']; ?>" />
										<input type="hidden" name="Prov" value="<?php echo $value['propinsi_id']; ?>" />
										<input type="hidden" name="AWB" value="<?php echo $value['AWB']; ?>" />
										<input type="hidden" name="Kota" value="<?php echo $value['kabupaten_id']; ?>" />
										<input type="hidden" name="Ket" value="<?php echo $value['ket']; ?>" />
										<input type="hidden" name="jmlAliquot" value="<?php echo $value['jumaliquot']; ?>" />
										<input type="hidden" name="Kec" value="<?php echo $value['kecamatan_id']; ?>" />
										<input type="hidden" name="Desa" value="<?php echo $value['kelurahan_id']; ?>" />
									</td>
									<td class='table-icon' >
										<?php echo $value['no_barcode']; ?>
									</td>
									<td class='table-icon' >
										<?php echo $value['namaART']; ?>
									</td>
									<td class='table-fixed-medium'>
										<?php echo $value['institusi_kode']; ?>
									</td>
									<td>
										<?php echo $value['penelitian_kode']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['spesimen_kode']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['kondisispesimen_id']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['jumaliquot']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['simpanspesimen_id']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['nama_pengirim']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['tgl_ambil']; ?>
									</td>
									<td class='table-date'>
										<?php echo $value['tgl_kirim']; ?>
									</td>
									<td>
									<center>
										<div class="btn-group">
											<?php
												if (!($level == 1 || $level == 2 || $level == 9 )){
													echo "
														<a href=\"#\" onclick=\"dialog_click('{$value['formpenerimaan_id']}')\" id=\"dialog-linkupdate\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\"><i class=\"icon-eye-open\"></i></a>
													";
												}else{	
													echo "
														<a href=\"#\" onclick=\"dialog_click('{$value['formpenerimaan_id']}')\" id=\"dialog-linkupdate\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" bm04=\"{$value['formpenerimaan_id']}\"><i class=\"icon-exclamation-sign\"></i></a>
														<a href=\"#\" onclick=\"delete_link('{$value['formpenerimaan_id']}')\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
													";
												}
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
							<div class="btn-toolbar">
								<div class="btn-group">
								<?php
								if (!( $this->data['level'] ==3 ))
								echo "
								<a href=\"#\" onclick=\"goto('penerimaan/')\" class=\"button button-basic button-icon\">Tambah Data</a>
								";
								?>
								</div>
							</div>
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
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ui-dialog -->

<div id="dialog-update" title="Form Edit Penerimaan" >
	

	<div class="box-body">
		<form method="POST" id="frm1" name="penerimaan" class='form-horizontal'>
			<input type="hidden" name="status_editpenerimaan" value="0">
                        <input type="hidden" name="formpenerimaan_id" id="formpenerimaan_id">
			<div class="control-group">
				<label for="NoStiker" class="control-label">No. Stiker</label>
				<div class="controls controls-row">
					<input type="text" name="NoStiker" id="NoStiker" placeholder="" maxlength="6" class="span2" />
					
					<label style="margin-left: 15%;" for="JenisSpesimen" class="control-label">Jenis Spesimen</label>
					<select style="margin-left: 2.5641%;" name="JenisSpesimen" id="JenisSpesimen" class='span3' >
						<option value=""> - Jenis Spesimen - </option>
						<?php foreach($arr_spesimen as $value): ?>
						<option value="<?php echo $value['spesimen_kode']; ?>"><?php echo $value['spesimen_kode']; ?> - <?php echo $value['spesimen_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="NoBarcode" class="control-label">No. Barcode</label>
				<div class="controls controls-row">
					<input type="text" name="NoBarcode" id="NoBarcode" class="span3"  onkeyup="nobarcode(event)"/>
					
					<label style="margin-left: 4%;" for="KondisiSpesimen" class="control-label">Kondisi Spesimen</label>
					<select style="margin-left: 2.5641%;" name="KondisiSpesimen" id="KondisiSpesimen" class='span3'  >
						<option value=""> - Kondisi Spesimen - </option>
						<?php foreach($arr_kondisispesimen as $value): ?>
						<option value="<?php echo $value['kondisispesimen_id']; ?>"><?php echo $value['kondisispesimen_id']; ?> - <?php echo $value['kondisispesimen_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="AsalInstitusi" class="control-label">Asal Institusi</label>
				<div class="controls controls-row">
					<select name="AsalInstitusi" id="AsalInstitusi" class='span3' >
						<option value=""> - Asal Institusi - </option>
						<?php foreach($arr_institusi as $value): ?>
						<option value="<?php echo $value['institusi_kode']; ?>"><?php echo $value['institusi_kode']; ?> - <?php echo $value['institusi_name']; ?></option>
						<?php endforeach; ?>
					</select>
					
					<label style="margin-left: 4%;" for="Visit" class="control-label">Visit ke</label>
					<input style="margin-left: 2.5641%;" type="text" name="Visit" id="Visit" placeholder="" class="span1" />
					<label style="width:12%" for="SuhuDtg" class="control-label">Suhu Datang</label>
					<input style="margin-left: 1%;" type="text" name="SuhuDtg" id="SuhuDtg" placeholder="" class="span1"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="NamaPenelitian" class="control-label">Nama Penelitian</label>
				<div class="controls controls-row">
					<select name="NamaPenelitian" id="NamaPenelitian" class='span3' >
						<option value=""> - Nama Penelitian - </option>
						<?php foreach($arr_penelitian as $value): ?>
						<option value="<?php echo $value['penelitian_kode']; ?>"><?php echo $value['penelitian_kode']; ?> - <?php echo $value['penelitian_name']; ?></option>
						<?php endforeach; ?>
					</select>
					
					<label style="margin-left: 6%;width:12%;" for="VSpesimen" class="control-label">Volume Spesimen</label>
					<input style="margin-left: 2.5641%;" type="text" name="VSpesimen" id="VSpesimen" placeholder="" class="span1"/>
					<label style="width:12%" for="JSpesimen" class="control-label">Jumlah Spesimen</label>
					<input style="margin-left: 1%;" type="text" name="JSpesimen" id="JSpesimen" placeholder="" class="span1"/>
			
				</div>
			</div>
			<div class="control-group">
				
				<div class="controls controls-row">
					<label style="margin-left:34.5%" for="NamaSite" class="control-label">Nama Site</label>
					<select style="margin-left: 2.2%;" name="NamaSite" id="NamaSite" class='span3'>
						<option> - Nama Site - </option>
						<?php foreach($arr_site as $value): ?>
						<option value="<?php echo $value['site_id']; ?>"><?php echo $value['site_id']; ?> - <?php echo $value['site_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="NamaART" class="control-label">Nama</label>
				<div class="controls controls-row">
					<input type="text" name="NamaART" id="NamaART" placeholder="" class="span3" />
					
					<label style="margin-left:4.5%" for="SimpanSpesimen" class="control-label">Spesimen disimpan</label>
					<select style="margin-left: 2%;" name="SimpanSpesimen" id="SimpanSpesimen" class='span3'  >
						<option value=""> - Simpan Spesimen - </option>
						<?php foreach($arr_simapanspesimen as $value): ?>
						<option value="<?php echo $value['simapanspesimen_id']; ?>"><?php echo $value['simapanspesimen_id']; ?> - <?php echo $value['simapanspesimen_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="umurART" class="control-label">Umur</label>
				<div class="controls controls-row">
					<input type="text" name="umurART" id="umurART" placeholder="" class="span1" />
					<label style="width:3%" class="control-label">Tahun</label>
					
					<label style="margin-left:1%" for="TGLKirim" class="control-label">TGL Kirim</label>
					<input style="margin-left: 2.5641%;" type="text" name="TGLKirim" id="TGLKirim" placeholder="dd/mm/yyyy" class="span2 datepick" />
					<label style="width:13%" for="Pengirim"class="control-label">Nama Pengirim</label>
					<input style="margin-left: 1%;" type="text" name="Pengirim" id="Pengirim" placeholder="" class="span2"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="JK" class="control-label">Jenis Kelamin</label>
				<div class="controls controls-row">
					<select name="JK" id="JK" class='span3'>
						<option value="0"> - Jenis Kelamin - </option>
						<option value="1">Pria</option>
						<option value="2">Wanita</option>
						<option value="8">Tidak Mengisi</option>
						<option value="9">Tidak Tahu</option>
					</select>
							
					<label style="margin-left: 14.5%;" for="DiambilTanggal" class="control-label">Diambil Tanggal</label>
					<input style="margin-left: 2.5641%;" type="text" name="DiambilTanggal" id="DiambilTanggal" placeholder="dd/mm/yyyy" class="span2 datepick" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="TGLDiterima" class="control-label">Diterima Tgl</label>
				<div class="controls controls-row">
					<input type="text" name="TGLDiterima" id="TGLDiterima" placeholder="dd/mm/yyyy" class="span2 datepick" />
				</div>
			</div>
			<div class="control-group">
				<label for="Alamat" class="control-label">Alamat</label>
				<div class="controls controls-row">
					<input type="text" name="Alamat" id="Alamat" placeholder="" class="span4" />
					
					<label style="margin-left: 3.5%;" for="AWB" class="control-label">AWB</label>
					<input style="margin-left: 2.5641%;" type="text" name="AWB" id="AWB" placeholder="" class="span3"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="Prov" class="control-label">Propinsi</label>
				<div class="controls controls-row">
					<div>
						<select class="span4" name="Prov" id="Prov" onchange="kabupaten(this.value)">
						<option> - Silakan Pilih Propinsi - </option>
															
						<?php foreach($arr_prop as $value): ?>
						<option value="<?php echo $value['ID_PROP'] ?>"><?php echo $value['ID_PROP'] ?> - <?php echo $value['NAMA_PROP'] ?></option>
						<?php endforeach; ?>
					</select></div>
					
					<label for="Ket" class="control-label">Keterangan</label>
					<input style="margin-left: 2.5641%;" type="text" name="Ket" id="Ket" placeholder="" class="span3"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="Kota" class="control-label">Kabupaten</label>
				<div class="controls controls-row">
					<div id="div_kota">
						<select class="span4" name="Kota" id="Kota" onchange="kecamatan(this.value)">
							
						</select>
					</div>
					
					<label for="jmlAliquot" class="control-label">Jumlah Aliquot</label>
					<input style="margin-left: 2.5641%;" type="text" name="jmlAliquot" id="jmlAliquot" placeholder="" class="span1" disabled ="true"/>
						<input type="hidden" name="hjmlAliquot" id="hjmlAliquot"/>
					<button style="margin-left: 2.5641%;" class='button button-basic-blue' id="dialog-link" type="button">View</button>
			
				</div>
			</div>
			<div class="control-group">
				<label for="Kec" class="control-label">Kecamatan</label>
				<div class="controls controls-row">
					<div id="div_kec">
						<select class="span4" name="Kec" id="Kec" onchange="kelurahan(this.value)">
							
						</select>
					</div>
					
				</div>
			</div>
			<div class="control-group">
				<label for="Desa" class="control-label">Kelurahan</label>
				<div class="controls controls-row">
					<div id="div_kel">
						<select class="span4" name="Desa" id="Desa">
							
						</select>
					</div>
					
				</div>
			</div>
			<div class="form-actions">
				<button style="padding-left:1%" type="button" class="button button-basic-blue" onclick="editpenerimaan_submit()">Update</button>
			</div>
		</form>
	</div>
</div>
<div id="dialog" title="Aliquot">
	<div class="box-body" style="padding:.5em 1em;">
		<form method="POST" id="frm1" name="frmAliquot" class='form-horizontal'>
			<input type="hidden" name="status_Aliquot" value="0">
<table width="100%">
  <tr>
    <td width="30%"><label>No. Aliquot</label></td>
    <td width="18%">
		<input type="text" name="Aliquot" id="Aliquot" placeholder="" maxlength="6" class="span1" />
	</td>
    <td width="8%">&nbsp;</td>
    <td width="25%"><label>Type Box</label></td>
    <td width="30%">
        <select name="TypeBox" id="TypeBox" class='span2' onchange="tampilkotak()" disabled="true">
			<option value=""> - Type - </option>
			<?php foreach($arr_typebox as $value): ?>
			<option value="<?php echo $value['typebox_id']; ?>"><?php echo $value['typebox_name']; ?></option>
			<?php endforeach; ?>
		</select>
	</td>
  </tr>
  <tr>
    <td><label>No. Penyimpanan</label></td>
    <td>
		<select name="Revco" id="Revco" class='span2' onchange="kapasitasRak(this.value)">
			<option value=""> - Pilih No Revco - </option>
			<?php foreach($arr_revco as $value): ?>
			<option value="<?php echo $value['id_revco']; ?>"><?php echo $value['no_revco']; ?></option>
			<?php endforeach; ?>
		</select>
	</td>
    <td>&nbsp;</td>
    <td><label>Kotak Nomor</label></td>
    <td><input type="text" name="Kotak" id="Kotak" placeholder="" maxlength="6" class="span1" disabled/></td>
  </tr>
  <tr>
    <td><label>No. Rack</label></td>
    <td>
		<input type="hidden" name="noRack" id="noRack"/>
			<select name="Rack" id="Rack" class='span2' onchange="getbox($ID('Revco').value, this.value)">
				<option value=""> - Pilih No Rack - </option>
			
			</select>
	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button class='button button-basic-blue' id="dialog-link2">Pilih Kotak</button></td>
  </tr>
  <tr>
    <td><label>No. Box</label></td>
    <td>
		<input type="hidden" id="Box" name="Box"/>
		<select name="hBox" id="hBox" class='span2' onchange="typebox(this.value)" >
			<option value=""> - Pilih No Box - </option>
			
		</select>
	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
                       
<table class="table2 table2-striped table2-nomargin table2-mail" id="tabelAliquote">
						
</table>
		</form>
	</div>
</div>


<!-- ui-dialog -->
<div id="dialog-view" title="View Box">
	<div class="box-body">
		<form method="POST" id="frm1" name="box" class='form-horizontal'>
			<input type="hidden" name="status_box" value="0">
				<div class="row-fluid">
					<div class="span6">
						<div class="box">
							<div class="box-head">
								<span>BOX : </span>
							</div>
							<div class="box-body" id="kotaktampil">

							</div>     
						</div>
					</div>
					<div class="span6">
						<div class="box">
							<div class="box-head">
								<i class="icon-tasks"></i>
								<span>List Kotak</span>
							</div>
							<div class="box-body box-body-nopadding" id="tabelkotak">
								
                                                            
							</div>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>