
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-reorder"></i> Preview Form Hasil Pemeriksaan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li class='active'>Preview Form Hasil Pemeriksaan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid no-print">
		<div class="span12">
			<div class="alert alert-info">
				<i class="icon-info-sign"></i>
				Preview Form Hasil Pemeriksaan
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-list"></i>
					<span>Preview Form Hasil Pemeriksaan</span>
					<div class="actions">
						<a href="javascript:print()" rel='tooltip' title="Print Hasil Kimia Klinis"><i class="icon-print"></i> Print</a>
					</div>
				</div>
				<div class="box-body box-body-nopadding">
					<table border="1" class="table table-striped table-invoice">
					<!--<table width="100%" border="1">-->
						  <tr>
							<td colspan="23" align="center" valign="middle">
							<div class="row-fluid">
								<div class="span2">
									<img style="float:right;" src="<?php echo $application_path; ?>/img/logo-dinkes.png" width="66" height="85" alt="Logo">
								</div>
									<!--/td>
									<td colspan="20" style="font-size:16px;margin-bottom:10px;padding: 10px;height:80px;"-->
								<div class="span10" style="padding-right:14%;">
											<center>
												<b style="margin-top:10px;">KEMENTERIAN KESEHATAN REPUBLIK INDONESIA<br/>BADAN PENELITIAN DAN PENGEMBANGAN KESEHATAN<br/>RISKESDAS 2013<br/><br/>FORMULIR HASIL PEMERIKSAAN LABORATORIUM KIMIA KLINIK</b>
											</center>
								</div>
							</div>
							</td>
						  </tr>
						  <tr style="background-color:#CCC;">
							<td colspan="23"><center><b>PENGENALAN TEMPAT</b><br/>(Kutip dari Form BM.02 Block.I Pengenalan Tempat)</center></td>
						  </tr>
						  <tr>
							<td colspan="2"><center><b>Prop</b></center></td>
							<td colspan="2"><center><b>Kab</b></center></td>
							<td colspan="3"><center><b>Kec</b></center></td>
							<td colspan="3"><center><b>Desa</b></center></td>
							<td><center><b>D/K</b></center></td>
							<td colspan="7"><center><b>NO. Kode Sampel</b></center></td>
							<td colspan="3"><center><b>No. Bangunan Sensus</b></center></td>
							<td colspan="2"><center><b>No. Urut Sampel</b></center></td>
						  </tr>
						  <?php foreach($preview as $value): ?>
						  <tr>
							<td width="4.4%"><center><b><?php echo $value['propinsi_id']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['propinsi_id']{1}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kabupaten_id']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kabupaten_id']{1}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kecamatan_id']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kecamatan_id']{1}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kecamatan_id']{2}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kelurahan_id']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kelurahan_id']{1}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kelurahan_id']{2}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['DK']; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{1}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{2}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{3}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{4}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{5}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['kode_sampel']{6}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['no_bangun_sensus']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['no_bangun_sensus']{1}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['no_bangun_sensus']{2}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['no_urut_sampel']{0}; ?></b></center></td>
							<td width="4.4%"><center><b><?php echo $value['no_urut_sampel']{1}; ?></b></center></td>
						  </tr>
						  <tr>
							<td>1</td>
							<td colspan="6">Nama</td>
							<td colspan="16"><?php echo $value['NamaART']; ?></td>
						  </tr>
						  <tr>
							<td>2</td>
							<td colspan="6">Umur</td>
							<td colspan="16"><?php echo $value['Umur']; ?></td>
						  </tr>
						  <tr>
							<td>3</td>
							<td colspan="6">Jenis Kelamin</td>
							<td colspan="16"><?php $jk = $value['JK'];
								if ($jk ==1)
									echo "Pria";
								else if ($jk ==2)
									echo "Wanita";
								else if ($jk ==8)
									echo "Tidak Mengisi";
								else if ($jk ==9)
									echo "Tidak Tau";
							?></td>
						  </tr>
						  <tr>
							<td>4</td>
							<td colspan="6">Nomer Stikker</td>
							<td colspan="16"><?php echo $value['no_stiker']; ?></td>
						  </tr>
						  <tr>
							<td>5</td>
							<td colspan="6">Tanggal Pemeriksaan</td>
							<td colspan="16"><?php echo $value['TGL_periksa']; ?></td>
						  </tr>
						  <tr>
							<td>6</td>
							<td colspan="6">Alamat</td>
							<td colspan="16"><?php echo $value['alamat']; ?></td>
						  </tr>
						  <tr>
							<td>7</td>
							<td colspan="6">Karakteristik</td>
							<td colspan="16"><?php echo $value['karakter']; ?> - <?php $karakter = $value['karakter'];
								if ($karakter ==1)
									echo "Normal";
								else if ($karakter ==2)
									echo "Hemolisis";
								else if ($karakter ==3)
									echo "Ikferik";
								else if ($karakter ==4)
									echo "Lipemik";
							?></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td colspan="6"><center><b><h5>Parameter Kimia Klinis</h5></b></center></td>
							<td colspan="6"><center><b><h5>Hasil Pemeriksaan</h5></b></center></td>
							<td colspan="3"><center><b><h5>Satuan</h5></b></center></td>
							<td colspan="7"><center><b><h5>Nilai Rujukan</h5></b></center></td>
						  </tr>
						  <tr>
							<td>1</td>
							<td colspan="6">Kolestrol total</td>
							<td colspan="6"><center><b><?php echo $value['TtlKolestrol']; ?></b></center></td>
							<td colspan="3"><center><b>mg/dL</b></center></td>
							<td colspan="7"><center><b>< 200</b></center></td>
						  </tr>
						  <tr>
							<td>2</td>
							<td colspan="6">Kolestrol HDL</td>
							<td colspan="6"><center><b><?php echo $value['HDLKolestrol']; ?></b></center></td>
							<td colspan="3"><center><b>mg/dL</b></center></td>
							<td colspan="7"><center><b>Wanita > 65, Pria > 55</b></center></td>
						  </tr>
						  <tr>
							<td>3</td>
							<td colspan="6">Kolestrol LDL direct</td>
							<td colspan="6"><center><b><?php echo $value['LDLKolestrol']; ?></b></center></td>
							<td colspan="3"><center><b>mg/dL</b></center></td>
							<td colspan="7"><center><b>< 100</b></center></td>
						  </tr>
						  <tr>
							<td>4</td>
							<td colspan="6">Trigliserida</td>
							<td colspan="6"><center><b><?php echo $value['Trigliserida']; ?></b></center></td>
							<td colspan="3"><center><b>mg/dL</b></center></td>
							<td colspan="7"><center><b>< 200</b></center></td>
						  </tr>
						  <tr>
							<td>5</td>
							<td colspan="6">Kreatinin</td>
							<td colspan="6"><center><b><?php echo $value['Kreatinin']; ?></b></center></td>
							<td colspan="3"><center><b>mg/dL</b></center></td>
							<td colspan="7"><center><b>Wanita 0.51 - 0.95 , Pria 0.67 - 1.17</b></center></td>
						  </tr>
								
						<!--</table>-->
					</table>
					<table width="100%" style="float: right;">
						<tr>
							<td width="25%"></td>
							<td width="25%"></td>
							<td width="15%"></td>
							<td width="35%" align="center">
						<span><h4>Pemeriksa</h4></span></td>
						</tr>
						<tr>
							<td style="height:80px;" colspan="4"></td>
						</tr>
						<tr>
							<td width="25%"></td>
							<td width="25%"></td>
							<td width="15%"></td>
							<td width="35%" align="center"><span><h4><?php echo $value['pemeriksa']; ?></h4></span></td>
						</tr>
					</table>
				</div>				
				<?php
					endforeach;
				?>
			</div>
		</div>
	</div>
</div>