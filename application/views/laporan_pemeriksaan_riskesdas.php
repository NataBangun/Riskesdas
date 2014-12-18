<script type="text/javascript">
	function addabm04_submit() {
		$ID('frm1').submit();
	}
        
        
        
        function print(id){
            if($ID('FormPemeriksaan').value==''){
                return false;
            }
            if(id==0){
                $.ajax({
                    method  : "POST",
                    url     : './print_form/'+$ID('FormPemeriksaan').value+'?p='+id,
                    data    : $('#frm1').serialize(),
                    complete: function(res,status){
                        win = window.open("","Cetak","status=0,toolbar=1");
                        win.document.write(res.responseText);
                    }
                });
            }else{
            window.open('./print_form/'+$ID('FormPemeriksaan').value+'?p='+id, '', '');
            }
            
        }
        
        
        
        function combobox_select(obj, value) {
            for (var i=0; i < obj.options.length; i++) {
                    if (obj.options[i].value == value) {
                            obj.options[i].selected = true;
                    }
            }
        }
		
	$(function(){
            $("input:radio[name=FormPemeriksaan]").click(function(){
                $ID('FormPemeriksaan').value = $(this).val();
            });
            $("#print_cetak").click(function(){
	    var lab = $("#lab").val();
	    var tgl1 = $("#tglawal").val();
	    var tgl2 = $("#tglakhir").val();
	    //var x = window.open("<?php echo $application_path; ?>/view_exportlab/cetak/"+lab tglawal +'/'+tgl1 +'/'+tgl2, "Cetak Lab","toolbar=0,menubar=0,resizable=0");
	    });
	});

	 $(document).ready(function(){

            $("#cetak_submit").click(function(){
            //combobox_select($('#frm1 select[name=lab]'), '<?=$lab;?>');
	    var lab = $("#lab").val();
	    var tgl1 = $("#tglawal").val();
	    var tgl2 = $("#tglakhir").val();
		window.open("<?php echo $application_path; ?>/view_exportlab/cetak/lab="+lab+"&tgl1="+tgl1+"&tgl2="+tgl2,"Cetak","status=1,toolbar=1")

			

		return false;

		});

	});
</script>
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-table"></i> Data Laporan Pemeriksaan Riskesdas</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="<?php echo $application_path; ?>/home">Home</a><span class="divider">/</span></li>
			<li><a href="#">Laporan</a><span class="divider">/</span></li>			
			<li class='active'>Laporan Pemeriksaan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-inbox"></i>
					<span>Laporan Pemeriksaan</span>
				</div>
				
				<div class="box-body box-body-nopadding">
					<div class="tab-content">
						<div class="tab-pane active">
							<div class="row-fluid">
								<div class="span12">
								</div>
							</div>
							<div class="row-fluid">
								
								<form method="POST" id="frm1" name="labform" class='form-horizontal' action="">
                                                                    <input type="hidden" id="Penelitian" name="Penelitian" value="<?=$arr_penelitian;?>">
                                                                    <input type="hidden" id="lab" name="lab" value="<?=$lab;?>">
									
            						<div class="control-group">
            							<label for="FormPemeriksaan" class="control-label">Form Pemeriksaan</label>
            							<div class="controls">
            								<input type="radio" name="FormPemeriksaan" id="FormPemeriksaan_1" value="bm02"/> Form BM02
                                                                        
            							</div>
                                                                <div class="controls">
                                                                    <input type="radio" name="FormPemeriksaan" id="FormPemeriksaan_2" value="bm04"/> Form BM04
                                                                </div>
                                                                <input type="hidden" id="FormPemeriksaan"/>
            						</div>
                                                                    
                                                        <div class="control-group">
            								<label for="Propinsi" class="control-label">Propinsi</label>
            							<div class="controls">
            								<select name="Propinsi" id="Propinsi" class="span5"  >
            									<option value="0"> - Pilih Propinsi - </option>
            									<?php foreach($arr_prov as $value): ?>
            									<option value="<?php echo $value['ID_PROP']; ?>"><?php echo $value['ID_PROP']; ?> - <?php echo $value['NAMA_PROP']; ?></option>
            									<?php endforeach; ?>
            								</select>
            						
            							</div>
            						</div>
            						            						
            						<div class="control-group">
            							<label for="tglawal" class="control-label">Tanggal Awal</label>
            							<div class="controls controls-row">
            								<input type="text" name="tglawal" id="tglawal" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />
            								
            								<label for="tglakhir" class="control-label">Tanggal Akhir</label>
            								<input style="margin-left: 2.5641%;" type="text" name="tglakhir" id="tglakhir" placeholder="dd/mm/yyyy" class="span2 datepick" maxlength="10" />
            						
            							</div>
            						</div>
                                                        <div class="form-actions">
                                                            <input class="button button-darkblue" name="button" type="button" value="Print" onclick='print(0)'/>
                                                            <input class="button button-darkblue" name="button" type="button" value="Export .xls" onclick='print(1)'/>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>