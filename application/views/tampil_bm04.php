<?php
if($excel == 1){
    $file = 'laporan bm04'.date('dY').'.xls';
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file");
}

?>
<html>
<head>
<title>Data Bm04</title>
<head>
<body>
<table style="border-collapse:collapse;background:#ffc" border="1">
<tr style="background-color: rgb(100,255,100);"><th>Id</th><th>Kode Propinsi</th><th>Kode Kabupaten</th><th>Kode Kecamatan</th><th>Kode Kelurahan</th><th>DK</th><th>Kode Sampel</th><th>No Bangun Sensus</th><th>No Urut Sampel</th><th>Nama Lab</th><th>Alamat Lab</th><th>Nama Enumerator</th><th>No Telp</th><th>Nama ART</th><th>No Urut ART</th><th>Umur ART</th><th>JK</th><th>Tanya 1</th><th>No Stiker</th><th>Alamat ART</th><th>Time Ambil Darah</th><th>Nilai Kadar HB</th><th>Waktu kadar HB</th><th>Tanggal Kadar HB</th><th>Riwayat Diabet</th><th>Minum Insulin</th><th>Puasa</th><th>Waktu Akhir Makan</th><th>Waktu Pembebanan Glukosa</th><th>Time 2Jam Glukosa</th><th>Kadar Glukosa1 Waktu</th><th>Kadar Glukosa2 Nilai</th><th>Kadar Glukosa2 Waktu</th><th>Kadar Glukosa2 Tgl</th><th>Kadar Glukosa3 Nilai</th><th>Kadar Glukosa3 Waktu</th><th>Kadar Glukosa3 Tgl</th><th>Tanggal Enumerator</th><th>Tanggal Pendamping</th><th>Nama Ketua Enumerator</th><th>Nama Pendamping</th></tr>
<?php
$no=0;
foreach($arr as $row) {
    $no++;
?>
<tr><th><?=$row['bm04_id']?></th><th><?=$row['propinsi_id']?></th><th><?=$row['kabupaten_id']?></th><th><?=$row['kecamatan_id']?></th><th><?=$row['kelurahan_id']?></th><th><?=$row['DK']?></th><th><?=$row['kode_sampel']?></th><th><?=$row['no_bangun_sensus']?></th><th><?=$row['no_urut_sampel']?></th><th><?=$row['nama_lab']?></th><th><?=$row['alamat_lab']?></th><th><?=$row['nama_enumerator']?></th><th><?=$row['no_telp']?></th><th><?=$row['nama_ART']?></th><th><?=$row['no_urutART']?></th><th><?=$row['umurART']?></th><th><?=$row['JK']?></th><th><?=$row['tanya1']?></th><th><?=$row['no_stiker']?></th><th><?=$row['alamatART']?></th><th><?=$row['time_ambil_darah']?></th><th><?=$row['kadarHB_nilai']?></th><th><?=$row['kadarHB_waktu']?></th><th><?=$row['kadarHB_tgl']?></th><th><?=$row['riwayat_diabet']?></th><th><?=$row['minum_insulin']?></th><th><?=$row['puasa']?></th><th><?=$row['time_akhir_makan']?></th><th><?=$row['time_pembebanan_glukosa']?></th><th><?=$row['time_2jam_glukosa']?></th><th><?=$row['kadar_glukosa1_waktu']?></th><th><?=$row['kadar_glukosa2_nilai']?></th><th><?=$row['kadar_glukosa2_waktu']?></th><th><?=$row['kadar_glukosa2_tgl']?></th><th><?=$row['kadar_glukosa3_nilai']?></th><th><?=$row['kadar_glukosa3_waktu']?></th><th><?=$row['kadar_glukosa3_tgl']?></th><th><?=$row['tgl_enumerator']?></th><th><?=$row['tgl_pendamping']?></th><th><?=$row['nama_ketua_enumerator']?></th><th><?=$row['nama_pendamping']?></th></tr>
<?php
}
?>
</table>
</body>
</html>