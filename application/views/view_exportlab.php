<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

		<table width="100%" border="0">
		  <tr>
			<td colspan="6"><h3>Laporan Penerimaan Spesimen</h3></td>
		  </tr>
		  <tr>
			<td width="20%">Laboraturium</td>
			<td width="3%" align="center">:</td>
			<!--td align="left"><!?php echo $this->session->userdata('lab'); ?> - ( <!?php if ($this->session->userdata('lab') == '1' ) echo "BAKTERI"; elseif ($this->session->userdata('lab') == '2') echo "STEAM CELL"; elseif ($this->session->userdata('lab') == '3') echo "VIROLOGI"; elseif ($this->session->userdata('lab') == '4') echo "PARASIT"; elseif ($this->session->userdata('lab') == '5') echo "IMUNOLOGI"; elseif ($this->session->userdata('lab') == '6') echo "FARMASI"; elseif ($this->session->userdata('lab') == '7') echo "MAMALOGI"; elseif ($this->session->userdata('lab') == '8') echo "BSL 3"; elseif ($this->session->userdata('lab') == '9') echo "HEWAN COBA"; elseif ($this->session->userdata('lab') == '0') echo "SEMUA"; ?> )</td-->
			<td align="left"><?php echo $value['LAB_NAME']; ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>Tanggal</td>
			<td align="center">:</td>
			<td colspan="2" align="left"><?php echo $this->session->userdata('tgl1'); ?> <b><u>s/d</u></b> <?php echo $this->session->userdata('tgl2'); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		</table>

		<table border="1" class="table table-striped table-invoice">
		<!--<table width="100%" border="1">-->
			<tr>
				<td width="1%" align="center">No. </td>
				<td width="7%" align="center">No. Lims</td>
				<td width="5%" align="center">No. Spesimen</td>
				<td width="6%" align="center">Tgl Penerimaan</td>
				<td width="6%" align="center">Jenis Spesimen</td>
				<td width="4%" align="center">Kondisi</td>
				<td width="6%" align="center">User Penerima</td>
				<td width="4%" align="center">Umur</td>
			</tr>
		  
			<?php
				if (empty($view_exportlab)) {
					echo '<tr><td colspan="8" style="color:red;"><center><b> Data Masih Kosong. </b><center></td></tr>';
				}
			?>
			<?php
				$no=1;
				foreach($view_exportlab as $value):
			?>
				<tr>
					<td align="center"><?php echo $no ?></td>
					<td><?php echo $value['no_barcode']; ?></td>
					<td align="center">'<?php echo $value['no_stiker']; ?></td>
					<td align="center"><?php echo $value['tgl_terima']; ?></td>
					<td align="center"><?php echo $value['spesimen_name']; ?></td>
					<td align="center"><?php echo $value['kondisispesimen_name']; ?></td>
					<td align="center"><?php echo $value['nama_pengirim']; ?></td>
					<td align="center"><?php echo $value['umurART']; ?> Tahun</td>
				</tr>				
			<?php
				$no++;
				endforeach;
			?>
		</table>
	</body>
</html>
