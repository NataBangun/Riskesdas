<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="200%" border="1">
  <tr style=" background-color:#d9d9d9; color:#000000;">
    <td align="center"><strong>No.</strong></td>
    <td align="center"><strong>No Stiker</strong></td>
    <td align="center"><strong>Kode Lab</strong></td>
    <td align="center"><strong>Kode Penelitian</strong></td>
    <td align="center"><strong>Id Propinsi</strong></td>
    <td align="center"><strong>Id Kabupaten</strong></td>
    <td align="center"><strong>Id Kecamatan</strong></td>
    <td align="center"><strong>Id Kelurahan</strong></td>
    <td align="center"><strong>DK</strong></td>
    <td align="center"><strong>Kode Sampel</strong></td>
    <td align="center"><strong>No Bangun Sunsus</strong></td>
    <td align="center"><strong>No Urut Sampel</strong></td>
    <td align="center"><strong>Nama ART</strong></td>
    <td align="center"><strong>Umur</strong></td>
    <td align="center"><strong>Jenis Kelamin</strong></td>
    <td align="center"><strong>Tanggal Periksa</strong></td>
    <td width="6%" align="center"><strong>Alamat</strong></td>
    <td align="center"><strong>Total Kolestrol</strong></td>
    <td align="center"><strong>HDL Kolestrol</strong></td>
    <td align="center"><strong>LDL Kolestrol</strong></td>
    <td align="center"><strong>Trigliserida</strong></td>
    <td align="center"><strong>Kreatinin</strong></td>
    <td align="center"><strong>Pemeriksa</strong></td>
  </tr>
	<?php
		if (empty($view_export)) {
			echo '<tr><td colspan="23" style="color:red;"><center><b> Data Masih Kosong. </b><center></td></tr>';
		}
	?>
	<?php
		$no=1;
		foreach($view_export as $value):
	?>
  <tr>
    <td><?php echo $no ?></td>
    <td>'<?php echo $value['no_stiker']; ?></td>
    <td><?php echo $value['kode_lab']; ?></td>
    <td><?php echo $value['kode_penelitian']; ?></td>
    <td><?php echo $value['propinsi_id']; ?></td>
    <td><?php echo $value['kabupaten_id']; ?></td>
    <td><?php echo $value['kecamatan_id']; ?></td>
    <td><?php echo $value['kelurahan_id']; ?></td>
    <td><?php echo $value['DK']; ?></td>
    <td><?php echo $value['kode_sampel']; ?></td>
    <td><?php echo $value['no_bangun_sensus']; ?></td>
    <td><?php echo $value['no_urut_sampel']; ?></td>
    <td><?php echo $value['NamaART']; ?></td>
    <td><?php echo $value['Umur']; ?></td>
    <td><?php echo $value['JK']; ?></td>
    <td><?php echo $value['TGL_periksa']; ?></td>
    <td><?php echo $value['alamat']; ?></td>
	<!-- Bates KK -->
    <td><?php echo $value['TtlKolestrol']; ?></td>
    <td><?php echo $value['HDLKolestrol']; ?></td>
    <td><?php echo $value['LDLKolestrol']; ?></td>
    <td><?php echo $value['Trigliserida']; ?></td>
    <td><?php echo $value['Kreatinin']; ?></td>
    <td><?php echo $value['pemeriksa']; ?></td>
  </tr>
	<?php
		$no++;
		endforeach;
	?>
</table>

</body>
</html>
