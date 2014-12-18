<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";
 
// koneksi ke mysql
mysql_connect("localhost", "root", "");
mysql_select_db("web_lims_v3");
 
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
 
// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);
 
// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
 
// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
// membaca data no.sampel (kolom ke-1)
$namaART= $data->val($i, 1);
$no_barcode = $data->val($i, 2);
// membaca data tgl_ambil (kolom ke-2)
$tgl_ambil = $data->val($i, 3);
// membaca data alamat (kolom ke-3)
$tgl_kirim = $data->val($i, 4);
$tgl_terima = $data->val($i, 5);
$suhudtg = $data->val($i, 6);
$ket = $data->val($i, 7);

// setelah data dibaca, sisipkan ke dalam tabel mhs
$query = "INSERT INTO formpenerimaan(namaART,no_barcode,tgl_ambil,tgl_kirim,tgl_terima,suhudtg,ket) VALUES ('$namaART','$no_barcode', '$tgl_ambil', '$tgl_kirim', '$tgl_terima', '$suhudtg','$ket')";
$hasil = mysql_query($query);
 
// jika proses insert data sukses, maka counter $sukses bertambah
// jika gagal, maka counter $gagal yang bertambah
if ($hasil) $sukses++;
else $gagal++;
}
 
// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
 
?>