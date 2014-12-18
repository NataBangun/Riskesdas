<?php

if($excel == 1){
    $file = 'laporan bm02'.date('dY').'.xls';
    header("Content-type: application/vnd.ms-excel");
    //header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$file");
}

?>
<html>
<head>
<title>Data Bm02</title>
<head>
<body>

<table  style="border-collapse:collapse;background:#ffc" border="1" width="100%">
<tr style="background-color: rgb(100,255,100);"><th>Id</th><th>Kode Propinsi</th><th>Kode Kabupaten</th><th>Kode Kecamatan</th><th>Kode Kelurahan</th><th>DK</th><th>Kode Sampel</th><th>No Bangun Sensus</th><th>No Urut Sampel</th><th>Alamat</th><th>Nama ART</th><th>No ART</th><th>No Stiker</th><th>Riwayat Sakit Berat</th><th>Tanggal Ambil Darah</th><th>Nama Lab</th><th>Time Penetasan Buffer</th><th>Time Pembacaan RDT</th><th>Hasil RDT</th><th>ART Riwayat Panas</th><th>Duplo</th><th>Tanggal Enumerator</th><th>Tanggal Nakes</th><th>Nama Enumerator</th><th>Nama Nakes</th></tr>
<?php
$no = 0;
foreach($arr as $row) {
    $no++;
?>
<tr><th><?=$no?></th><th><?=$row['propinsi_id']?></th><th><?=$row['kabupaten_id']?></th><th><?=$row['kecamatan_id']?></th><th><?=$row['kelurahan_id']?></th><th><?=$row['DK']?></th><th><?=$row['kode_sampel']?></th><th><?=$row['no_bangun_sensus']?></th><th><?=$row['no_urut_sampel']?></th><th><?=$row['alamat']?></th><th><?=$row['namaART']?></th><th><?=$row['noART']?></th><th><?=$row['noStiker']?></th><th><?=$row['riwayat_sakit_berat']?></th><th><?=$row['tgl_ambildarah']?></th><th><?=$row['nama_lab']?></th><th><?=$row['time_penetasan_buffer']?></th><th><?=$row['time_pembacaan_rdt']?></th><th><?=$row['hasil_rdt']?></th><th><?=$row['art_riwayat_panas']?></th><th><?=$row['duplo']?></th><th><?=$row['tgl_enumerator']?></th><th><?=$row['tgl_nakes']?></th><th><?=$row['nama_enumerator']?></th><th><?=$row['nama_nakes']?></th></tr>
<?php
}
?>
</table>
</body>
</html>