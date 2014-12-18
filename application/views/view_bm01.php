<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=laporan'.date('Ymd').$_POST['Propinsi'].'.xls');
        ?>
<body>
<table border="1">
  <tr style=" background-color:#d9d9d9; color:#000000;">
    <td align="center"><strong>No.</strong></td>
    <td align="center"><strong>Sampel Garam</strong></td>
    <td align="center"><strong>Sampel Air</strong></td>
    <td align="center"><strong>Id Propinsi</strong></td>
    <td align="center"><strong>Id Kabupaten</strong></td>
    <td align="center"><strong>Id Kecamatan</strong></td>
    <td align="center"><strong>Id Kelurahan</strong></td>
    <td align="center"><strong>DK</strong></td>
    <td align="center"><strong>Kode Sampel</strong></td>
    <td align="center"><strong>No Bangun Sensus</strong></td>
    <td align="center"><strong>No Urut Sampel</strong></td>
    <td align="center"><strong>Nama Lab</strong></td>
    <td width="6%" align="center"><strong>Alamat Lab</strong></td>
    <td align="center"><strong>Tangal Kumpul</strong></td>
    <td align="center"><strong>Hari Kumpul</strong></td>
    <td align="center"><strong>Jam Kumpul</strong></td>
    <td align="center"><strong>No Stiker</strong></td>
    <td align="center"><strong>Nama ART</strong></td>
    <td align="center"><strong>Umur ART</strong></td>
    <td align="center"><strong>Jenis Kelamin</strong></td>
    <td align="center"><strong>Diambil Darah</strong></td>
    <td align="center"><strong>Wkt Ambil darah</strong></td>
    <td align="center"><strong>Diambil Urin</strong></td>
    <td align="center"><strong>Wkt Ambil Urin</strong></td>
    <td align="center"><strong>Suhu Datang</strong></td>
    <td align="center"><strong>Tgl Enumerator</strong></td>
    <td align="center"><strong>Ketua Enumerator</strong></td>
    <td align="center"><strong>Kode Lab</strong></td>
    <td align="center"><strong>Kode Penelitian</strong></td>
  </tr>
	<?php
		if (empty($arr_bm01)) {
			echo '<tr><td colspan="79" style="color:red;"><center><b> Data Masih Kosong. </b><center></td></tr>';
		}
	?>
	<?php
		$no=1;
		foreach($arr_bm01 as $value):
	?>
  <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $value['SamGaram']; ?></td>
    <td><?php echo $value['SamAir']; ?></td>
    <td><?php echo $value['propinsi_id']; ?></td>
    <td><?php echo $value['kabupaten_id']; ?></td>
    <td><?php echo $value['kecamatan_id']; ?></td>
    <td><?php echo $value['kelurahan_id']; ?></td>
    <td><?php echo $value['DK']; ?></td>
    <td><?php echo $value['kode_sampel']; ?></td>
    <td><?php echo $value['no_bangun_sensus']; ?></td>
    <td><?php echo $value['no_urut_sampel']; ?></td>
    <td><?php echo $value['Lab_lap']; ?></td>
    <td><?php echo $value['alamat']; ?></td>
    <td><?php echo $value['tgl_kumpul']; ?></td>
    <td><?php echo $value['hari_kumpul']; ?></td>
    <td><?php echo $value['jam_kumpul']; ?></td>
    <td><?php echo $value['NoStiker']; ?></td>
    <td><?php echo $value['NamaART']; ?></td>
    <td><?php echo $value['UmurART']; ?></td>
    <td><?php echo $value['JK']; ?></td>
    <td><?php echo $value['Urin']; ?></td>
    <td><?php echo $value['TglUrin']; ?></td>
    <td><?php echo $value['Darah']; ?></td>
    <td><?php echo $value['TglDarah']; ?></td>
    <td><?php echo $value['SuhuDatang']; ?></td>
    <td><?php echo $value['tgl_nakes']; ?></td>
    <td><?php echo $value['nama_nakes']; ?></td>
    <td><?php echo $value['kode_lab']; ?></td>
    <td><?php echo $value['kode_penelitian']; ?></td>
	
	
  </tr>
	<?php
		$no++;
		endforeach;
	?>
</table>

</body>
</html>
