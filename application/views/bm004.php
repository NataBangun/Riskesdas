
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-file-alt"></i> Forms - Form wizard</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li><a href="basic-forms.html">Forms</a><span class="divider">/</span></li>
			<li class='active'>Form wizard</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-list-ul"></i>
					<span>Wizard with validation</span>
				</div>
				<div class="box-body box-body-nopadding">
					<form action="#" method="POST" class='form-horizontal form-bordered form-wizard' id="ss">
						<div class="step" id="firstStep">
							<ul class="wizard-steps wizard-style-2 steps-3">
								<li class='active'>
									<div class="single-step">
										<span class="title">
											Step 1
										</span>
										<span class="circle">
											<span class="active"></span>
										</span>
										<span class="description">
											Basic information
										</span>
									</div>
								</li>
								<li>
									<div class="single-step">
										<span class="title">
											Step 2
										</span>
										<span class="circle">
										</span>
										<span class="description">
											Advanced information
										</span>
									</div>
								</li>
								<li>
									<div class="single-step">
										<span class="title">
											Step 3
										</span>
										<span class="circle">
										</span>
										<span class="description">
											Additional information
										</span>
									</div>
								</li>
							</ul>
							<div class="step-forms">
								<!-----Batesss---->
								<div class="control-group">
									<div class="controls controls-row">
										<label style="width:3%;text-align:left;" for="Prov" class="help-block control-label">
											Prov
										</label>
										<label style="width:3%;margin-left:6%;text-align:left;" for="Kota" class="help-block control-label">
											Kota
										</label>
										<label style="width:4%;margin-left:5%;text-align:left;" for="Kec" class="help-block control-label">
											Kec
										</label>
										<label style="width:4%;margin-left:5%;text-align:left;" for="Desa" class="help-block control-label">
											Desa
										</label>
										<label style="width:3%;margin-left:5%;text-align:left;" for="DK" class="help-block control-label">
											D/K
										</label>
										<label style="width:20%;margin-left:5%;text-align:left;" for="KodeSampel" class="help-block control-label">
											No. Kode Sampel
										</label>
										<label style="width:8%;margin-left:5%;text-align:left;" for="NoUrut" class="help-block control-label">
											No. Urut
										</label>
									</div>
								</div>
								<div class="control-group">
									<div class="controls controls-row">
										<input type="text" name="Prov" id="Prov" placeholder="32" class="span1" data-rule-required="true" />
										<input type="text" name="Kota" id="Kota" placeholder="01" class="span1" data-rule-required="true" />
										<input type="text" name="Kec" id="Kec" placeholder="110" class="span1" data-rule-required="true" />
										<input type="text" name="Desa" id="Desa" placeholder="002" class="span1" data-rule-required="true" />
										<input type="text" name="DK" id="DK" placeholder="D" class="span1" data-rule-required="true" />
										<input type="text" name="KodeSampel" id="KodeSampel" placeholder="2505002" class="span3" data-rule-required="true" />
										<input type="text" name="NoUrut" id="NoUrut" placeholder="015" class="span1" data-rule-required="true" />
									</div>
								</div>
								<div class="control-group">
										<label for="NamaLab" class="control-label">Nama Lab</label>
									<div class="controls controls-row">
										
										<input type="text" name="NamaLab" id="NamaLab" placeholder="RSUD PEMATANG SIANTAR" class="span6"/>
								
									</div>
								</div>
								<div class="control-group">
										<label for="AlamatLab" class="control-label">Alamat Lab</label>
									<div class="controls controls-row">
										
										<input type="text" name="AlamatLab" id="AlamatLab" placeholder="RSUD PEMATANG SIANTAR" class="span8"/>
								
									</div>
								</div>
								<div class="control-group">
									<label for="NamaEnumerator" class="control-label">Nama Enumerator</label>
									<div class="controls controls-row">
										<input type="text" name="NamaEnumerator" id="NamaEnumerator" placeholder="12" class="span5" />
										
										<label for="TelpEnumerator" class="control-label">No. Telp Enumerator</label>
										<!--<input style="margin-left: 2.5641%;" type="text" name="NamaKepLab" id="NamaKepLab" placeholder="DR JAMAL A NASER" class="span3"/>-->
										<input style="margin-left: 2.5641%;" type="text" name="TelpEnumerator" id="TelpEnumerator" class="span3 mask_phone">
					
									</div>
								</div>
								<div class="control-group">
									<label for="NamaART" class="control-label">Nama ART</label>
									<div class="controls controls-row">
										<input type="text" name="NamaART" id="NamaART" placeholder="73" class="span5" />
										
										<label for="NoART" class="control-label">No. Urut ART</label>
										<input style="margin-left: 2.5641%;" type="text" name="NoART" id="NoART" placeholder="" class="span3"/>
								
									</div>
								</div>
								<div class="control-group">
									<label for="Umur" class="control-label">Umur</label>
									<div class="controls controls-row">
										<input type="text" name="Umur" id="Umur" placeholder="030" class="span1" />
										<label style="width:5%" class="control-label">Tahun</label>
										<input style="margin-left: 1%;" type="text" name="bulan" id="bulan" placeholder="0" class="span1"/>
										<label style="width:5%" class="control-label">Bulan</label>
										
									</div>
								</div>
								<div class="control-group">
									<label for="JK" class="control-label">Jenis Kelamin</label>
									<div class="controls controls-row">
										<select name="JK" id="JK" class='input-large'>
											<option> - Jenis Kalamin - </option>
											<option value="1">Pria</option>
											<option value="2">Wanita</option>
											<option value="8">Tidak Mengisi</option>
											<option value="9">Tidak Tahu</option>
										</select>
								
									</div>
								</div>
								<div class="control-group">
									<label for="JK" class="control-label">Untuk Wanita<br/><small>Apakah sedang hamil</small></label>
									<div class="controls controls-row">
										<select name="JK" id="JK" class='input-large'>
											<option> - Silakan Pilih - </option>
											<option value="1">Ya</option>
											<option value="2">Tidak</option>
											<option value="8">Tidak Mengisi</option>
											<option value="9">Tidak Tahu</option>
										</select>
								
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label">No. Stiker</label>
									<div class="controls controls-row">
										<input type="text" name="NoBlokSensus" id="NoBlokSensus" placeholder="0098" class="span2" />
										
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label">Alamat ART</label>
									<div class="controls controls-row">
										<input type="text" name="NoBlokSensus" id="NoBlokSensus" placeholder="0098" class="span7" />
										
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label">Pengambilan darah pukul</label>
									<div class="controls controls-row">
										<div class="bootstrap-timepicker span1">
											<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
											<!--<span class="help-block">As dropdown</span>-->
										</div>
										
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label"><b>Kadar Haemoglobin / HB</b></label>
									<div class="controls controls-row">
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Nilai</label>
										<input style="margin-left: 2.5641%;" type="text" name="NoBlokSensus" id="NoBlokSensus" placeholder="0098" class="span1" />
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Waktu</label>
											<div class="bootstrap-timepicker span1">
												<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
												<!--<span class="help-block">As dropdown</span>-->
											</div>
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Tanggal</label>
										<input style="margin-left: 2.5641%;" type="text" name="textfield" id="textfield" placeholder="dd/mm/yyyy" class="span2 datepick" />
										
									</div>
								</div>
								<div class="control-group">
									<label for="RDiabet" class="control-label">Riwayat diabetes</label>
									<div class="controls controls-row">
										<select name="select" id="select" class='span3'>
											<option> - Silakan Pilih - </option>
											<option value="1">Ya</option>
											<option value="2">Tidak</option>
											<option value="8">Tidak Mengisi</option>
											<option value="9">Tidak Tahu</option>
										</select>
												
										<label style="margin-left: 8.5%;width:15%;" for="PembacaanRDT" class="control-label">Minum obat anti insulin</label>
										<select style="margin-left: 2.5641%;" name="select" id="select" class='span3'>
											<option> - Silakan Pilih - </option>
											<option value="1">Ya</option>
											<option value="2">Tidak</option>
											<option value="8">Tidak Mengisi</option>
											<option value="9">Tidak Tahu</option>
										</select>
																		
									</div>
								</div>
								<div class="control-group">
									<label for="RDiabet" class="control-label">Puasa</label>
									<div class="controls controls-row">
										<select name="RDiabet" id="RDiabet" class='span3'>
											<option> - Silakan Pilih - </option>
											<option value="1">Ya</option>
											<option value="2">Tidak</option>
											<option value="8">Tidak Mengisi</option>
											<option value="9">Tidak Tahu</option>
										</select>
										
										<label style="margin-left: 8.5%;width:15%;" class="control-label">Terakhir makan pukul</label>
												<div class="bootstrap-timepicker span1">
													<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
													<!--<span class="help-block">As dropdown</span>-->
												</div>
									</div>
								</div>
								<div class="control-group">
									<label for="RDiabet" class="control-label">Pembebanan Glukosa</label>
									<div class="controls controls-row">
										<div class="bootstrap-timepicker span1">
											<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
											<!--<span class="help-block">As dropdown</span>-->
										</div>
										<label style="margin-left: 8.5%;width:25%;" class="control-label">2 Jam setelah pembebanan glukosa</label>
											<div class="bootstrap-timepicker span1">
												<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
												<!--<span class="help-block">As dropdown</span>-->
											</div>
								
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label"><b>Kadar glukosa darah</b><br/><small>Sebelum puasa<small></label>
									<div class="controls controls-row">
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Nilai</label>
										<input style="margin-left: 2.5641%;" type="text" name="NoBlokSensus" id="NoBlokSensus" placeholder="0098" class="span1" />
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Waktu</label>
										<div class="bootstrap-timepicker span1">
											<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
											<!--<span class="help-block">As dropdown</span>-->
										</div>
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Tanggal</label>
										<input style="margin-left: 2.5641%;" type="text" name="textfield" id="textfield" placeholder="dd/mm/yyyy" class="span2 datepick" />
										
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label"><b>Kadar glukosa darah</b><br/><small>Sewaktu puasa<small></label>
									<div class="controls controls-row">
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Nilai</label>
										<input style="margin-left: 2.5641%;" type="text" name="NoBlokSensus" id="NoBlokSensus" placeholder="0098" class="span1" />
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Waktu</label>
										<div class="bootstrap-timepicker span1">
											<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
											<!--<span class="help-block">As dropdown</span>-->
										</div>
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Tanggal</label>
										<input style="margin-left: 2.5641%;" type="text" name="textfield" id="textfield" placeholder="dd/mm/yyyy" class="span2 datepick" />
										
									</div>
								</div>
								<div class="control-group">
									<label for="NoBlokSensus" class="control-label"><b>Kadar Haemoglobin / HB</b><br/><small>2 jam setelah pembebanan<small></label>
									<div class="controls controls-row">
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Nilai</label>
										<input style="margin-left: 2.5641%;" type="text" name="NoBlokSensus" id="NoBlokSensus" placeholder="0098" class="span1" />
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Waktu</label>
										<div class="bootstrap-timepicker span1">
											<input style="width:70%" type="text" name="rdt" id="rdt" class="input-small timepick" />
											<!--<span class="help-block">As dropdown</span>-->
										</div>
									<label style="margin-left:1%; width:5%" for="NoBlokSensus" class="control-label">Tanggal</label>
										<input style="margin-left: 2.5641%;" type="text" name="textfield" id="textfield" placeholder="dd/mm/yyyy" class="span2 datepick" />
										
									</div>
								</div>
								<div class="control-group">
									<div class="controls controls-row">
										<label style="width:20%;text-align:left;" for="TGLEnumeratorKesmas" class="help-block control-label">
											TGL Enumerator Kesmas
										</label>
										<label style="width:20%;margin-left:20%;text-align:left;" for="TGLEnumeratorBiomedis" class="help-block control-label">
											TGL Enumerator Biomedis
										</label>
									</div>
								</div>
								<div class="control-group">
									<div class="controls controls-row">
										<input type="text" name="textfield" id="textfield" placeholder="dd/mm/yyyy" class="span2 datepick" />
										<input style="margin-left:25.5%;" type="text" name="textfield" id="textfield" placeholder="dd/mm/yyyy" class="span2 datepick" />
									</div>
								</div>
								<div class="control-group">
									<div class="controls controls-row">
										<label style="width:20%;text-align:left;" for="NamaEnumelatorKesmas" class="help-block control-label">
											Nama Enumelator Kesmas
										</label>
										<label style="width:20%;margin-left:20%;text-align:left;" for="NamaEnumelatorBiomedis" class="help-block control-label">
											Nama Enumelator Biomedis
										</label>
									</div>
								</div>
								<div class="control-group">
									<div class="controls controls-row">
									
										<input type="text" name="NamaEnumelatorKesmas" id="NamaEnumelatorKesmas" placeholder="ARDE" class="span3">
										<input style="margin-left:17%;" type="text" name="NamaEnumelatorBiomedis" id="NamaEnumelatorBiomedis" placeholder="HERLINAWATI" class="span3">
									</div>
								</div>
								<!------batesss--->
							</div>
						</div>
						<div class="step" id="secondStep">
							<ul class="wizard-steps wizard-style-2 steps-3">
								<li>
									<div class="single-step">
										<span class="title">
											Step 1
										</span>
										<span class="circle">
											
										</span>
										<span class="description">
											Basic information
										</span>
									</div>
								</li>
								<li class='active'>
									<div class="single-step">
										<span class="title">
											Step 2
										</span>
										<span class="circle">
											<span class="active"></span>
										</span>
										<span class="description">
											Advanced information
										</span>
									</div>
								</li>
								<li>
									<div class="single-step">
										<span class="title">
											Step 3
										</span>
										<span class="circle">
										</span>
										<span class="description">
											Additional information
										</span>
									</div>
								</li>
							</ul>
							<div class="control-group">
								<label for="text" class="control-label">Gender</label>
								<div class="controls">
									<select name="gend" id="gend" class="uniform-me" data-rule-required="true">
										<option value="">-- Chose one --</option>
										<option value="1">Male</option>
										<option value="2">Female</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label for="text" class="control-label">Accept policy</label>
								<div class="controls">
									<label class="checkbox"><input type="checkbox" name="policy" value="agree" data-rule-required="true"> I agree the policy.</label>
								</div>
							</div>
						</div>
						<div class="step" id="thirdStep">
							<ul class="wizard-steps wizard-style-2 steps-3">
								<li>
									<div class="single-step">
										<span class="title">
											Step 1
										</span>
										<span class="circle">
											
										</span>
										<span class="description">
											Basic information
										</span>
									</div>
								</li>
								<li>
									<div class="single-step">
										<span class="title">
											Step 2
										</span>
										<span class="circle">
											
										</span>
										<span class="description">
											Advanced information
										</span>
									</div>
								</li>
								<li class='active'>
									<div class="single-step">
										<span class="title">
											Step 3
										</span>
										<span class="circle">
											<span class="active"></span>
										</span>
										<span class="description">
											Additional information
										</span>
									</div>
								</li>
							</ul>
							<div class="control-group">
								<label for="text" class="control-label">Additional information</label>
								<div class="controls">
									<textarea name="textare" id="tt333" class="span12" rows="7" placeholder="You can provide additional information in here..."></textarea>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<input type="reset" class="button button-basic" value="Back" id="back">
							<input type="submit" class="button button-basic-blue" value="Submit" id="next">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>