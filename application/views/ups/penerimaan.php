<script type="text/javascript">
        
        $(document).ajaxStart(function(){ 
          $('#imgtabel').show(); 
        }).ajaxStop(function(){ 
          $('#imgtabel').hide();
        });
        
        function cekKotakAda(){
			var cek = $ID('CekKotak').value;
			if(cek>0){
				alert('Aliquot di dalam kotak yang di pilih sudah ada.');
				$ID('Kotak').value = '';
				return false;
			}
		}
		
        function cekKotak(){
           $.ajax({
                url:'<?php echo $application_path;?>/penerimaan/cek_kotak/'+$('#Box').val()+'/'+$('#Revco').val()+'/'+$('#Rack').val()+'/'+$('#Kotak').val(),
                complete: function(res, status){
                     var cek;
                     cek = res.responseText
                     $ID('CekKotak').value = cek;
                                        
                }
            });
        
        }
        
        
        function bersihAliquot(){
            // $('#Aliquot').val('');
            $('#Revco').val('');
            $('#Rack').val('');
            //$ID('hBox').value=0;
            $('#Kotak').val('');
        }
        
        function getbox(idrevco,norak){
            $.ajax({
                url:'<?=$application_path;?>/penerimaan/get_arr_box/'+idrevco+'/'+norak,
                complete:function(res,status){
                    $ID('hBox').innerHTML=res.responseText;
                }
            })
        }
        
        function kapasitasRak(idrevco){
            $.ajax({
                url:'<?=$application_path;?>/penerimaan/get_kapasitas/'+idrevco,
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
                url:'<?php echo $application_path;?>/penerimaan/hapusaliquote/'+id,
                complete: function(res, status){
                    alert('Data berhasil di hapus');
                    tampiltabel();
                }
                
            });
        }
        
        function tampiltabel(){
            $.ajax({
				url:'<?php echo $application_path;?>/penerimaan/tampilTabel/'+$ID('NoBarcode').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('tabelAliquote').innerHTML=res.responseText;
				}
			});
        }
        
        function tampilkotak(){
         $.ajax({
                url:'<?php echo $application_path;?>/penerimaan/tampil_kotak/'+$('#Box').val()+'/'+$('#Revco').val()+'/'+$('#Rack').val()+'/'+$('#TypeBox').val(),
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
             
                url:'<?php echo $application_path;?>/penerimaan/tampil_kotak/'+box+'/'+revco+'/'+rak+'/'+typebox+'/'+kotak,
                complete: function(res, status){
                    var kotak = res.responseText;
                    document.getElementById('kotaktampil').innerHTML=res.responseText;
                }
            });
        }
        
        function tampilkotaktabel(){
            $.ajax({
                url:'<?php echo $application_path;?>/penerimaan/tampil_tabel_kotak/'+$('#Box').val()+'/'+$('#Revco').val()+'/'+$('#Rack').val()+'/'+$('#TypeBox').val(),
                
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
             
                url:'<?php echo $application_path;?>/penerimaan/tampil_tabel_kotak/'+box+'/'+revco+'/'+rak+'/'+typebox,
                complete: function(res, status){
                    var kotak = res.responseText;
                    document.getElementById('tabelkotak').innerHTML=res.responseText;
                }
            });
        }
        
        function combobox_select(obj, value) {
			for (var i=0; i < obj.options.length; i++) {
				if (obj.options[i].value == value) {
					obj.options[i].selected = true;
				}
			}
		}

        function typebox(idbox){
            
            $.ajax({
                url:'<?php echo $application_path;?>/penerimaan/get_typebox/'+idbox,
                complete:function(res,status){
                    combobox_select($ID('TypeBox'), res.responseText);
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
            var cekkotak    = $ID('CekKotak').value;
            
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
                alert('No Kotak harus dipilih.');
                vkotak.focus();
            }else if(cekkotak>0){
                alert('Aliquot di dalam kotak yang di pilih sudah ada.');
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
        
        //fungsi provinsi, kelurahan, kabupaten, dan kecamatan
        //<<<START>>>>
        function kabupaten(){
            $.ajax({
				url:'<?php echo $application_path;?>/penerimaan/kabupaten/'+$ID('hProv').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_kota').innerHTML=res.responseText;
				}
			});
        }
        function kecamatan(){
			$.ajax({
				url:'<?php echo $application_path;?>/penerimaan/kecamatan/'+$ID('hProv').value+'/'+$ID('Kota').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_kec').innerHTML=res.responseText;
				}
			});
		}
        function kelurahan(){
			$.ajax({
				url:'<?php echo $application_path;?>/penerimaan/kelurahan/'+$ID('hProv').value+'/'+$ID('Kota').value+'/'+$ID('Kec').value,
				complete: function(res, status){
					//var kotak = res.responseText;
					document.getElementById('div_kel').innerHTML=res.responseText;
				}
			});
		}
        //<<<ENDOF THIS>>>
        

	$(document).ready(function() {
		// var vNoBarcode = $ID('NoBarcode').value;
		$('#imgtabel').hide();
		$('#barcodevalid').hide();
		$ID('NoBarcode').focus();
	});

	
	
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 700,
                        buttons: [
				 {
					 text: "Simpan",
					 click: function() {
                                             cekKotak();
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
			         cekKotak();
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
			url:'<?php echo $application_path; ?>/penerimaan/nobarcode/'+value,
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
				$ID('AsalInstitusi').value = vNoBarcode.substring(0,1);
				combobox_select(document.penerimaan.hAsalInstitusi,vNoBarcode.substring(0,1));
				$ID('NamaPenelitian').value = vNoBarcode.substring(1,3);
				combobox_select(document.penerimaan.hNamaPenelitian,vNoBarcode.substring(1,3));
				// alert ('Nama Penelitian : '+ vNoBarcode.substring(1,3));
				combobox_select(document.penerimaan.hProv,vNoBarcode.substring(3,5));
				kabupaten();
				$ID('Prov').value = vNoBarcode.substring(3,5);
				//alert ('Kode Propinsi : '+ vNoBarcode.substring(3,5));
				$ID('hVisit').value = vNoBarcode.substring(11,12);
				$ID('Visit').value = vNoBarcode.substring(11,12);
				$ID('JenisSpesimen').value = vNoBarcode.substring(12,13);
				combobox_select(document.penerimaan.hJenisSpesimen,vNoBarcode.substring(12,13));
				// reload($ID('NoStiker').value);
				jmlAliquot();
				cek();
			}          
		}
	}

	
	<?php if (isset($status_terima) && $status_terima == 1) { ?>
	jQuery(document).ready(function(){
		alert('Penambahan data berhasil');
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
		<h4>Form Penerimaan  </h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/ups/home">Home</a><span class="divider">/</span></li>
			<li class='active'>Form Penerimaan</li>
		</ul>
	</div>
</div>
<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<span>Form Penerimaan</span>
				</div>
				<div class="box-body">
					<form method="POST" id="frm1" name="penerimaan" class='form-horizontal'>
						<input type="hidden" name="status_terima" value="0">
						<div class="control-group">
							<label for="NoStiker" class="control-label">No. Stiker</label>
							<div class="controls controls-row">
								<input type="text" name="hNoStiker" id="NoStiker" placeholder="" onchange="document.frm1.NoStiker.value=this.value" maxlength="30" class="span4" />
								<label for="JenisSpesimen" class="control-label">Jenis Spesimen</label>
								<select style="margin-left: 2.5641%;" name="hJenisSpesimen" id="hJenisSpesimen" class='span3' onchange="document.frm1.JenisSpesimen.value=this.value" disabled="true">
									<option value="0"> - Jenis Spesimen - </option>
									<?php foreach($arr_spesimen as $value): ?>
									<option value="<?php echo $value['spesimen_kode']; ?>"><?php echo $value['spesimen_kode']; ?> - <?php echo $value['spesimen_name']; ?></option>
									<?php endforeach; ?>
								</select>
								<input type="hidden" name="JenisSpesimen" id="JenisSpesimen"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="NoBarcode" class="control-label">No. Barcode</label>
							<div class="controls controls-row">
								<input type="text" name="NoBarcode" id="NoBarcode" class="span3" onkeyup="nobarcode(event);" /><label id="barcodevalid" style="color:red;"><b>&nbsp; *sudah ada</b></label>
								
								<label style="margin-left: 8.5%;" for="KondisiSpesimen" class="control-label">Kondisi Spesimen</label>
								<select style="margin-left: 2.5641%;" name="KondisiSpesimen" id="KondisiSpesimen" class='span3'  >
									<option value="0"> - Kondisi Spesimen - </option>
									<?php foreach($arr_kondisispesimen as $value): ?>
									<option value="<?php echo $value['kondisispesimen_id']; ?>"><?php echo $value['kondisispesimen_id']; ?> - <?php echo $value['kondisispesimen_name']; ?></option>
									<?php endforeach; ?>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="AsalInstitusi" class="control-label">Asal Institusi</label>
							<div class="controls controls-row">
								<select name="hAsalInstitusi" id="hAsalInstitusi" class='span3'  disabled="true" onchange="document.frm1.AsalInstitusi.value=this.value">
									<option value="0"> - Asal Institusi - </option>
									<?php foreach($arr_institusi as $value): ?>
									<option value="<?php echo $value['institusi_kode']; ?>"><?php echo $value['institusi_kode']; ?> - <?php echo $value['institusi_name']; ?></option>
									<?php endforeach; ?>
								</select>
                                <input type="hidden" name="AsalInstitusi" id="AsalInstitusi"/>
								
								<label style="margin-left: 8.5%;" for="Visit" class="control-label">Visit ke</label>
								<input style="margin-left: 2.5641%;" type="text" name="hVisit" id="hVisit" placeholder="" class="span1" onchange="document.frm1.Visit.value=this.value"  disabled="true"/>
								<input type ="hidden" name="Visit" id="Visit"/>
                                <label style="width:12%" for="SuhuDtg" class="control-label">Suhu Datang</label>
								<input style="margin-left: 1%;" type="text" name="SuhuDtg" id="SuhuDtg" placeholder="" class="span1"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="NamaPenelitian" class="control-label">Nama Penelitian</label>
							<div class="controls controls-row">
								<select name="hNamaPenelitian" id="hNamaPenelitian" class='span3'  disabled="true" >
									<option value="0"> - Nama Penelitian - </option>
									<?php foreach($arr_penelitian as $value): ?>
									<option value="<?php echo $value['penelitian_kode']; ?>"><?php echo $value['penelitian_kode']; ?> - <?php echo $value['penelitian_name']; ?></option>
									<?php endforeach; ?>
								</select>
								<input type="hidden" name="NamaPenelitian" id="NamaPenelitian"/>
								
								<label style="margin-left: 7.5%;width:15%;" for="VSpesimen" class="control-label">Volume Spesimen (mm)</label>
								<input style="margin-left: 2.5641%;" type="text" name="VSpesimen" id="VSpesimen" placeholder="" class="span1"/>
								<label style="width:12%" for="JSpesimen" class="control-label">Jumlah Spesimen</label>
								<input style="margin-left: 1%;" type="text" name="JSpesimen" id="JSpesimen" placeholder="" class="span1"/>
						
							</div>
						</div>
						<div class="control-group">
							
							<div class="controls controls-row">
								<label style="margin-left:31.5%" for="NamaSite" class="control-label">Nama Site</label>
								<select style="margin-left: 2.5641%;" name="NamaSite" id="NamaSite" class='span3'>
									<option value="0"> - Nama Site - </option>
									<?php foreach($arr_site as $value): ?>
									<option value="<?php echo $value['site_id']; ?>"><?php echo $value['site_kode']; ?> - <?php echo $value['site_name']; ?></option>
									<?php endforeach; ?>
								</select>
						
							</div>
						</div>
						<div class="control-group">
							<label for="NamaART" class="control-label">Nama</label>
							<div class="controls controls-row">
								<input type="text" name="NamaART" id="NamaART" placeholder="" class="span4" />
								
								<label style="margin-left:0%" for="SimpanSpesimen" class="control-label">Spesimen disimpan di</label>
								<select style="margin-left: 2.5641%;" name="SimpanSpesimen" id="SimpanSpesimen" class='span3'  >
									<option value="0"> - Simpan Spesimen - </option>
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
								<label style="width:5%" class="control-label">Tahun</label>
								
								<label style="margin-left:20.5%" for="TGLKirim" class="control-label">TGL Kirim</label>
								<input style="margin-left: 2.5641%;" type="text" name="TGLKirim" id="TGLKirim" placeholder="dd/mm/yyyy" class="span2 datepick" />
								<label style="width:10%" for="Pengirim" class="control-label">Nama Pengirim</label>
								<input style="margin-left: 1%;" type="text" name="Pengirim" id="Pengirim" placeholder="" class="span3"/>
						
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
										
								<label style="margin-left: 8.5%;" for="DiambilTanggal" class="control-label">Diambil Tanggal</label>
								<input style="margin-left: 2.5641%;" type="text" name="DiambilTanggal" id="DiambilTanggal" placeholder="dd/mm/yyyy" class="span2 datepick" />
								<label style="width:12%" for="TGLDiterima" class="control-label">Diterima di Lit. TGL</label>
								<input style="margin-left: 2.5641%;" type="text" name="TGLDiterima" id="TGLDiterima" placeholder="dd/mm/yyyy" class="span2 datepick" />
						
							</div>
						</div>
						<div class="control-group">
							<label for="Alamat" class="control-label">Alamat</label>
							<div class="controls controls-row">
								<input type="text" name="Alamat" id="Alamat" placeholder="" class="span4" />
								
								<label for="AWB" class="control-label">AWB</label>
								<input style="margin-left: 2.5641%;" type="text" name="AWB" id="AWB" placeholder="" class="span3"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="Prov" class="control-label">Propinsi</label>
							<div class="controls controls-row">
								<!--input type="text" name="Prov" id="Prov" placeholder="" class="span1" />
								<input style="margin-left: 2.5641%;" type="text" name="KProv" id="KProv" placeholder="" class="span3" /-->
								<div class="span4">
									<select name="hProv" id="hProv"  onchange="kabupaten(this.value);document.frm1.Prov.value=this.value;" disabled="true">
										<option value="0"> - Silakan Pilih Propinsi - </option>
										<?php foreach($arr_prop as $value): ?>
										<option value="<?php echo $value['ID_PROP'] ?>"><?php echo $value['ID_PROP'] ?> - <?php echo $value['NAMA_PROP'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<input type="hidden" name="Prov" id="Prov"/>
								
								<label for="Ket" class="control-label">Keterangan</label>
								<input style="margin-left: 2.5641%;" type="text" name="Ket" id="Ket" placeholder="" class="span3"/>
						
							</div>
						</div>
						<div class="control-group">
							<label for="Kota" class="control-label">Kabupaten</label>
							<div class="controls controls-row">
								<!--input type="text" name="Kota" id="Kota" placeholder="" class="span1" />
								<input style="margin-left: 2.5641%;" type="text" name="KKota" id="KKota" placeholder="" class="span3" /-->
								<div class="span4" id="div_kota">
									<select name="Kota" id="Kota"   onchange="kecamatan(this.value)">
										<option value="0"> - Silakan Pilih Kota - </option>
										
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
								<!--input type="text" name="Kec" id="Kec" placeholder="" class="span1" />
								<input style="margin-left: 2.5641%;" type="text" name="KKec" id="KKec" placeholder="" class="span3" /-->
								<div class="span4" id="div_kec">
									<select name="Kec" id="Kec"   onchange="kelurahan(this.value)">
										<option value="0"> - Silakan Pilih Kecamatan - </option>
										
									</select>
								</div>
								
							</div>
						</div>
						<div class="control-group">
							<label for="Desa" class="control-label">Kelurahan</label>
							<div class="controls controls-row">
								<!--input type="text" name="Desa" id="Desa" placeholder="" class="span1" />
								<input style="margin-left: 2.5641%;" type="text" name="KDesa" id="KDesa" placeholder="" class="span3" /-->
								<div class="span4" id="div_kel">
									<select name="Desa" id="Desa"    >
										<option value="0"> - Silakan Pilih Desa - </option>
										
									</select>
								</div>
								
							</div>
						</div>
						<div class="form-actions">
							<button style="padding-left:1%" type="button" class="button button-basic-blue" onclick="addpenerimaan_submit()" id="simpanpenerimaan">Simpan</button>
							<!--<button type="button" class="button button-basic">Cancel</button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ui-dialog -->
<div id="dialog" title="Aliquot">
	<div class="box-body" style="padding:.5em 1em;">
		<form method="POST" id="frm1" name="frmAliquot" class='form-horizontal'>
			<input type="hidden" name="status_Aliquot" value="0">
<table width="100%">
  <tr>
    <td width="30%"><label>No. Aliquot</label></td>
    <td width="18%">
		<input type="text" name="Aliquot" id="Aliquot" placeholder="" maxlength="6" class="span1" value="1"/>
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
		<!--input type="text" name="Revco" id="Revco" placeholder="" maxlength="6" class="span1" /-->
                <select name="Revco" id="Revco" class='span2' onchange="kapasitasRak(this.value)">
			<option value=""> - Pilih No Revco - </option>
                        <?php foreach($arr_revco as $value): ?>
			<option value="<?php echo $value['id_revco']; ?>"><?php echo $value['no_revco']; ?></option>
			<?php endforeach; ?>
		</select>
	</td>
    <td>&nbsp;</td>
    <td><label>Kotak Nomor</label></td>
    <td>
        <input type="text" name="Kotak" id="Kotak" placeholder="" maxlength="6" class="span1" disabled/>
        <input type="hidden" name="CekKotak" id="CekKotak"/>
    </td>
  </tr>
  <tr>
    <td><label>No. Rack</label></td>
    <td>
                <input type="hidden" name="noRack" id="noRack"/>
		<!--input type="text" name="Rack" id="Rack" placeholder="" maxlength="6" class="span1" /-->
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
		<!--input type="text" name="Box" id="Box" placeholder="" maxlength="6" class="span1" /-->
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
								<i class="icon-tasks"></i>
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
							<div class="row-fluid" >
								<table class="table table-nomargin table-bordered dataTable table-striped table-hover" >
									<thead>
									<tr>
										<th width="1%">No.Kotak</th>
										<th width="60%">No.Barcode</th>
									</tr>
                                    </thead>
                                    <tbody id="tabelkotak">
                                    </tbody>
        </table>
                                                            
							</div>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>