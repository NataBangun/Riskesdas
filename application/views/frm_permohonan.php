<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
body{
margin-left: 200px;
margin-right: 200px;
}
<?php echo var_dump($ATAS_NAMA);?>
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 18px; }
</style></head>

<body>
<div  style="width:900px;float:"center"">
<div align="center">
  <span class="style3">Laboratorium Farmasi<br />
  Pusat Biomedis Dan Teknologi Dasar Kesehatan<br />
  Badan Litbang Kesehatan<br />
  Kementrian Kesehatan RI</span>
</div>
<p class="style1">&nbsp;</p>
<p class="style1">Formulir  Permohonan Pengujian Sampel</p>
<p class="style1">No: <?php echo $No;?>/FPPS/<?php echo $bulan;?>/2014</p>
<table width="1002" border="0">
  <tr>
    <td width="130">Nama</td>
    <td width="8">:</td>
    <td width="842">&nbsp;<?php echo $nama;?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td>&nbsp;<?php echo $alamat;?></td>
  </tr>
  <tr>
    <td>Fax</td>
    <td>:</td>
    <td>&nbsp;<?php echo $nofax;?></td>
  </tr>
  <tr>
    <td>Telp</td>
    <td>:</td>
    <td>&nbsp;<?php echo $notelp;?></td>
  </tr>
  <tr>
    <td>Tanggal Penerimaan </td>
    <td>:</td>
    <td>&nbsp;<?php echo $tgl_penerimaan;?></td>
  </tr>
</table>
<p class="style1">Hasil pengujian atas nama:</p>

<?php
$no=0;
foreach($ATAS_NAMA as $value){
$no++;
echo"
<table width=\"1002\" border=\"0\">
  <tr>
    <td width=\"8\">$no</td>
    <td width=\"8\">.</td>
    <td width=\"964\">$value</td>
  </tr>
 ";
 }?>
</table>
<p class="style1">Menyerahkan contoh air untuk diperiksa sebanyak xxxx (sampel)</p>
<table width="829" border="1">
  <tr>
    <td width="39" rowspan="2"><div align="center">No</div></td>
    <td width="144" rowspan="2"><div align="center">No Sampel </div></td>
    <td width="186" rowspan="2"><div align="center">Jenis Air*)</div></td>
    <td colspan="3"><div align="center">Pengambilan Sampel Air Dilakukan Pada </div></td>
  </tr>
  <tr>
    <td width="123"><div align="center">Tanggal</div></td>
    <td width="174"><div align="center">Alamat</div></td>
    <td width="123"><div align="center">Kedalaman</div></td>
  </tr>
  <?php
	  $a=0;
      foreach($NO_SAMPEL as $key=>$val){
        $a++;
              echo '<tr>
                <td class="tabel"><div >'.$a.'</div></td>
                <td class="tabel"><div >'.$NO_SAMPEL[$key].'</div></td>
                <td class="tabel"><div >'.$JENIS_AIR[$key].'</div></td>
                <td class="tabel"><div >'.$TANGGAL[$key].'</div></td>
                <td class="tabel"><div >'.$ALAMAT[$key].'</div></td>
                <td class="tabel"><div >'.$KEDALAMAN[$key].'</div></td>
                
              </tr>
              ';
        
      }
      ?>
</table>
<p class="style1">*) PAM/Sumur Terbuka/Sumur Pompa Artesis/Kolom/Danau/Sungai/Mata Air/Lain-lain (sebutkan)</p>
<p class="style1">Informasi hasil analisa: telp (021) 4261088 ext. 531</p>
<p class="style1">&nbsp;</p>
<p class="style1"><?php echo $tempat;?>,<?php echo $tanggal;?></p>
<table width="864" border="0" align="center">
  <tr>
    <td width="134">Pemohon</td>
    <td width="582"><div align="center"></div></td>
    <td width="134"><div align="center">Penerima</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="left">(<?php echo $pemohon;?>) </div></td>
    <td>&nbsp;</td>
    <td><div align="center">(<?php echo $penerima;?>) </div></td>
  </tr>
</table>
<p class="style1">Form/T8-1</p>
<p class="style1">Rev: 0</p>
<p class="style1">Tanggal: <?php
							//Buat daftar nama bulan
							$bulan = array("January","Pebruary","Maret","April","Mei","Juni","Juli","Agustus","September","Okotober","Nopember","Desember");
							 
							//Buat daftar nama hari dalam bahasa indonesia
							$hari  = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
							 
							$month = intval(date('m')) - 1;
							 
							$days  = date('w');
							 
							$tg_angka = date('d');
							 
							$year  = date('Y');
							 
							echo ' '.$tg_angka.' '.$bulan[$month].' '.$year;
							//===================================
							?> </p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;  </p>

</div>
</body>

</html>
