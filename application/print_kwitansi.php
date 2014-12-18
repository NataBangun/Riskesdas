<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
 <script type="text/javascript" src="<?php base_url();?>js/terbilang.js"></script>
 <script type="text/javascript">
 function ubah(nilai){
 //memanggil fungsi terbilang() dari file terbilang.js
 var hasil = terbilang(nilai);
 var hasil_div= document.getElementById('hasil');
 var hasil_div1= document.getElementById('hasil1');
 var hasil_div2= document.getElementById('hasil2');
 //masukkan hasil konversi ke dalam hasil_div
 hasil_div.innerHTML = hasil;
 hasil_div1.innerHTML = hasil;
 hasil_div2.innerHTML = hasil;
 }
</script>
</head>
<body>
<div align="center">
  <table width="815" border="0">
		<?php 
		$HARGA=0;
		$JUMLAH=0;
		$NO_SAMPEL='';
		foreach($row as $value)
		{
			$JUMLAH += 1;
			$HARGA +=70000;
			$NO_SAMPEL .= $value['NO_SAMPEL'].'&nbsp;'.'|'.'&nbsp;';
		}
		foreach($row as $value)
		?>
		
    <tr>
      <td width="143" height="29">No</td>
      <td width="12">:</td>
      <td colspan="2"><?php echo $NO_SAMPEL ?></td>
    </tr>
    <tr>
      <td height="30">Sudah diterima dari </td>
      <td>:</td>
      <td colspan="2"><?php echo $value['PENERIMA']; ?></td>
    </tr>
    <tr>
      <td height="37">Banyaknya uang </td>
      <td>:</td>
      <td colspan="2" style="background:url(img/print_kwitansi_clip_image001.gif); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;<div id="hasil" style="margin-top:-20px; margin-left:20px;"></div></td>
    </tr>
    <tr>
      <td height="30">Untuk pembayaran </td>
      <td>:</td>
      <td colspan="2">Pengujian Kualitas Air Sebanyak <?php echo $JUMLAH; ?> Sampel </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="355">&nbsp;</td>
      <td width="287"><div align="center"><?php echo $value['TEMPAT']; ?>, <?php echo $value['TANGGAL']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="36">Jumlah</td>
      <td>:</td>
      <td style="background:url(img/print_kwitansi_clip_image002.gif); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;Rp. <div id="nilai" style="margin-top:-20px; margin-left:40px;"><?php echo $JUMLAH * 70000;?></div></td>
      <td><div align="center">Kelik Muhammad Arifin, S.Sos</div></td>
    </tr>
  </table>
</div>
<p align="center">_____________________________________________________________________________________________________</p>
<div align="center">
  <table width="815" border="0">
    <tr>
      <td width="143" height="29">No</td>
      <td width="12">:</td>
      <td colspan="2"><?php echo $NO_SAMPEL ?></td>
    </tr>
    <tr>
      <td height="30">Sudah diterima dari </td>
      <td>:</td>
      <td colspan="2"><?php echo $value['PENERIMA']; ?></td>
    </tr>
    <tr>
      <td height="37">Banyaknya uang </td>
      <td>:</td>
      <td colspan="2" style="background:url(img/print_kwitansi_clip_image001.gif); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;<div id="hasil1" style="margin-top:-20px; margin-left:20px;"></div></td>
    </tr>
    <tr>
      <td height="30">Untuk pembayaran </td>
      <td>:</td>
      <td colspan="2">Pengujian Kualitas Air Sebanyak <?php echo $JUMLAH; ?> Sampel </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="355">&nbsp;</td>
      <td width="287"><div align="center"><?php echo $value['TEMPAT']; ?>, <?php echo $value['TANGGAL']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="36">Jumlah</td>
      <td>:</td>
      <td style="background:url(img/print_kwitansi_clip_image002.gif); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;Rp. <div id="nilai" style="margin-top:-20px; margin-left:40px;"><?php echo $JUMLAH * 70000;?></div></td>
      <td><div align="center">Purnomo</div></td>
    </tr>
  </table>
</div>
<p align="center">_____________________________________________________________________________________________________</p>
<div align="center">
  <table width="815" border="0">
    <tr>
      <td width="143" height="29">No</td>
      <td width="12">:</td>
      <td colspan="2"><?php echo $NO_SAMPEL ?></td>
    </tr>
    <tr>
      <td height="30">Sudah diterima dari </td>
      <td>:</td>
      <td colspan="2"><?php echo $value['PENERIMA']; ?></td>
    </tr>
    <tr>
      <td height="37">Banyaknya uang </td>
      <td>:</td>
      <td colspan="2" style="background:url(img/print_kwitansi_clip_image001.gif); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;<div id="hasil2" style="margin-top:-20px; margin-left:20px;"></div></td>
    </tr>
    <tr>
      <td height="30">Untuk pembayaran </td>
      <td>:</td>
      <td colspan="2">Pengujian Kualitas Air Sebanyak <?php echo $JUMLAH; ?> Sampel </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="355">&nbsp;</td>
      <td width="287"><div align="center"><?php echo $value['TEMPAT']; ?>, <?php echo $value['TANGGAL']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="36">Jumlah</td>
      <td>:</td>
      <td style="background:url(img/print_kwitansi_clip_image002.gif); background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;Rp. <div id="nilai" style="margin-top:-20px; margin-left:40px;"><?php echo $JUMLAH * 70000;?></div></td>
      <td><div align="center">Purnomo</div></td>
    </tr>
  </table>
</div>
<p align="center">_____________________________________________________________________________________________________</p>
</body>
</html>
<script>
ubah(document.getElementById('nilai').innerHTML);
</script>