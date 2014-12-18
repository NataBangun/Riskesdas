
<div class="page-header">
	<div class="pull-left">
		<h4><i class="icon-reorder"></i> Preview Form Hasil Pemeriksaan</h4>
	</div>
	<div class="pull-right">
		<ul class="bread">
			<li><a href="dashboard.html">Home</a><span class="divider">/</span></li>
			<li class='active'>Laporan Penerimaan<span class="divider">/</span></li>
			<li class='active'>Laporan Penerimaan</li>
		</ul>
	</div>
</div>

<div class="container-fluid" id="content-area">
	<div class="row-fluid no-print">
		<div class="span12">
			<div class="alert alert-info">
				<i class="icon-info-sign"></i>
				Preview Form Laporan Penerimaan
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-list"></i>
					<span>Preview Form Laporan Penerimaan</span>
					<div class="actions">
						<a href="javascript:print()" rel='tooltip' title="Print Laporan Penerimaan"><i class="icon-print"></i> Print</a>
					</div>
				</div>
				<div class="box-body box-body-nopadding">
					<h3>Laporan Penerimaan Spesimen</h3><br/>
					<p>Laboraturium : <?php  ?></p><br/>
					<p>Tanggal : <?php  ?></p>
					<table border="1" class="table table-striped table-invoice">
					<!--<table width="100%" border="1">-->
						<tr>
							<td>No. </td>
							<td>No. Lims</td>
							<td>No. Spesimen</td>
							<td>Tgl Penerimaan</td>
							<td>Jenis Spesimen</td>
							<td>Kondisi</td>
							<td>User Penerima</td>
							<td>Umur</td>
						</tr>
					  
						<?php
							if (empty($view_exportlab)) {
								echo '<tr><td colspan="23" style="color:red;"><center><b> Data Masih Kosong. </b><center></td></tr>';
							}
						?>
						<?php
							$no=1;
							foreach($view_exportlab as $value):
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $value['no_barcode']; ?></td>
							<td><?php echo $value['no_stiker']; ?></td>
							<td><?php echo $value['tgl_terima']; ?></td>
							<td><?php echo $value['spesimen_kode']; ?></td>
							<td><?php echo $value['kondisispesimen_id']; ?></td>
							<td><?php echo $value['nama_pengirim']; ?></td>
							<td><?php echo $value['umurART']; ?> Tahun</td>
						</tr>				
						<?php
							endforeach;
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>