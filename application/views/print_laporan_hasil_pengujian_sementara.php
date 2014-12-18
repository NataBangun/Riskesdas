<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Hasil Pengujian Sementara</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
 <?php           
				$data = array
				(
				'0'    	=> '-',
                '1'    	=> 'SNI-01-3554-2006 butiri 2.2',
                '2'    	=> 'SNI 01-3554-2006 Tirimetri',
                '3'    	=> 'SNI 01-3554-2006 Potensiometri',
                '4'    	=> 'SNI 06-6989-12-2004 Titrimetri',
                '5'    	=> 'IKU/KA 01 Spektrofotometri',
                '6'		=> 'IKU/KA 02 Spektrofotometri',
                '7'   	=> 'IKU/KA 04 Spektrofotometri',
                '8'    	=> 'IKU/KA 05 Spektrofotometri',
                '9'    	=> 'IKU/KA 06 Colorimetri',
                '10'    => 'IKU/KA 07 Potensiometri',
                '11'    => 'IKU/KA 08 Turbidimetri',
                '12'    => 'IKU/KA 09 Potensiometri'
            );
?>


<p align="center" class="style1">LAPORAN HASIL PENGUJIAN SEMENTARA</p>
<p align="center"><strong>LABORATORIUM FARMASI</strong></p>
<p align="center">NO.LB.02.03.11/_____/2014  </p>
<div align="center">
  <table width="944" border="0">
    <tr>
      <td width="146">No. Sampel </td>
      <td width="8">:</td>
      <td width="768"><?=$NO_SAMPEL;?></td>
    </tr>
    <tr>
      <td>No. Kode </td>
      <td>:</td>
      <td><?=$NO_KODE;?></td>
    </tr>
    <tr>
      <td>Tanggal Penelitian </td>
      <td>:</td>
      <td><?=$TGL_PENERIMAAN;?></td>
    </tr>
    <tr>
      <td>Nama Pengirim </td>
      <td>:</td>
      <td><?=$NAMA_PENGIRIM;?></td>
    </tr>
    <tr>
      <td>Jenis Air </td>
      <td>:</td>
      <td><?=$JENIS_AIR;?></td>
    </tr>
    <tr>
      <td>Tempat Pengambilan </td>
      <td>:</td>
      <td><?=$TEMPAT_PENGAMBILAN;?></td>
    </tr>
    <tr>
      <td>Tanggal Pengambilan </td>
      <td>:</td>
      <td><?=$TGL_PENGAMBILAN;?></td>
    </tr>
    <tr>
      <td>Kedalaman</td>
      <td>:</td>
      <td><?=$KEDALAMAN;?></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><?=$KETERANGAN;?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="943" border="1">
    <tr>
      <td width="25"><div align="center"><strong>NO</strong></div></td>
      <td width="196"><div align="center"><strong>PARAMETER</strong></div></td>
      <td width="196"><div align="center"><strong>METODE</strong></div></td>
      <td width="153"><div align="center"><strong>SATUAN</strong></div></td>
      <td width="153"><div align="center"><strong>HASIL</strong></div></td>
      <td width="180"><div align="center"><strong>KADAR MAKSIMUM YANG DIPERBOLEHKAN </strong></div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>A.</strong></div></td>
      <td><div align="center"><strong>FISIKA</strong></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center">1</div></td>
      <td><div align="center">Bau</div></td>
      <td><div align="center"><?=$data[$metode[0]];?> </div></td>
      <td><div align="center">-</div></td>
      <td><div align="center"><?=$hasil[0];?></div></td>
      <td><div align="center">Tidak Berbau </div></td>
    </tr>
    <tr>
      <td><div align="center">2</div></td>
      <td><div align="center">Jumlah zat padat terlarut (TDS) </div></td>
      <td><div align="center"><?=$data[$metode[1]];?> </div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[1];?></div></td>
      <td><div align="center">1000</div></td>
    </tr>
    <tr>
      <td><div align="center">3</div></td>
      <td><div align="center">Kekeruhan</div></td>
      <td><div align="center"><?=$data[$metode[2]];?></div></td>
      <td><div align="center">Skala FTU </div></td>
      <td><div align="center"><?=$hasil[2];?></div></td>
      <td><div align="center">5</div></td>
    </tr>
    <tr>
      <td><div align="center">4</div></td>
      <td><div align="center">Rasa</div></td>
      <td><div align="center"><?=$data[$metode[3]];?></div></td>
      <td><div align="center">-</div></td>
      <td><div align="center"><?=$hasil[3];?></div></td>
      <td><div align="center">Tidak Berasa </div></td>
    </tr>
    <tr>
      <td><div align="center">5</div></td>
      <td><div align="center">Suhu</div></td>
      <td><div align="center"><?=$data[$metode[4]];?></div></td>
      <td><div align="center">C</div></td>
      <td><div align="center"><?=$hasil[4];?></div></td>
      <td><div align="center">Suhu udara + 3 C </div></td>
    </tr>
    <tr>
      <td><div align="center">6</div></td>
      <td><div align="center">Warna</div></td>
      <td><div align="center"><?=$data[$metode[5]];?></div></td>
      <td><div align="center">Skala TCU </div></td>
      <td><div align="center"><?=$hasil[5];?></div></td>
      <td><div align="center">15</div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>B</strong></div></td>
      <td><div align="center"><strong>KIMIA</strong></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>a</strong></div></td>
      <td><div align="center"><strong>Kimia Anorganic </strong></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center">1</div></td>
      <td><div align="center">Arsen</div></td>
      <td><div align="center"><?=$data[$metode[6]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[6];?></div></td>
      <td><div align="center">0.01</div></td>
    </tr>
    <tr>
      <td><div align="center">2</div></td>
      <td><div align="center">Fluorida</div></td>
      <td><div align="center"><?=$data[$metode[7]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[7];?></div></td>
      <td><div align="center">1.5</div></td>
    </tr>
    <tr>
      <td><div align="center">3</div></td>
      <td><div align="center">Kromium (valensi 6) </div></td>
      <td><div align="center"><?=$data[$metode[8]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[8];?></div></td>
      <td><div align="center">0.05</div></td>
    </tr>
    <tr>
      <td><div align="center">4</div></td>
      <td><div align="center">Kadmium</div></td>
      <td><div align="center"><?=$data[$metode[9]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[9];?></div></td>
      <td><div align="center">0.003</div></td>
    </tr>
    <tr>
      <td><div align="center">5</div></td>
      <td><div align="center">Nitrit (LOD &lt; 0.03) </div></td>
      <td><div align="center"><?=$data[$metode[10]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[10];?></div></td>
      <td><div align="center">3</div></td>
    </tr>
    <tr>
      <td><div align="center">6</div></td>
      <td><div align="center">Nitrat</div></td>
      <td><div align="center"><?=$data[$metode[11]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[11];?></div></td>
      <td><div align="center">50</div></td>
    </tr>
    <tr>
      <td><div align="center">7</div></td>
      <td><div align="center">Sianida</div></td>
      <td><div align="center"><?=$data[$metode[12]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[12];?></div></td>
      <td><div align="center">0.07</div></td>
    </tr>
    <tr>
      <td><div align="center">8</div></td>
      <td><div align="center">Selenium</div></td>
      <td><div align="center"><?=$data[$metode[13]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[13];?></div></td>
      <td><div align="center">0.01</div></td>
    </tr>
    <tr>
      <td><div align="center">9</div></td>
      <td><div align="center">Alumunium</div></td>
      <td><div align="center"><?=$data[$metode[14]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[14];?></div></td>
      <td><div align="center">0.2</div></td>
    </tr>
    <tr>
      <td><div align="center">10</div></td>
      <td><div align="center">Besi (LOD &lt; 0.03) </div></td>
      <td><div align="center"><?=$data[$metode[15]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[15];?></div></td>
      <td><div align="center">0.3</div></td>
    </tr>
    <tr>
      <td><div align="center">11</div></td>
      <td><div align="center">Kesudahan</div></td>
      <td><div align="center"><?=$data[$metode[16]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[16];?></div></td>
      <td><div align="center">500</div></td>
    </tr>
    <tr>
      <td><div align="center">12</div></td>
      <td><div align="center">Klorida</div></td>
      <td><div align="center"><?=$data[$metode[17]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[17];?></div></td>
      <td><div align="center">250</div></td>
    </tr>
    <tr>
      <td><div align="center">13</div></td>
      <td><div align="center">Mangan (LOD &lt; 0.20) </div></td>
      <td><div align="center"><?=$data[$metode[18]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[18];?></div></td>
      <td><div align="center">0.4</div></td>
    </tr>
    <tr>
      <td><div align="center">14</div></td>
      <td><div align="center">PH</div></td>
      <td><div align="center"><?=$data[$metode[19]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[19];?></div></td>
      <td><div align="center">6.5-8.5</div></td>
    </tr>
    <tr>
      <td><div align="center">15</div></td>
      <td><div align="center">Seng</div></td>
      <td><div align="center"><?=$data[$metode[20]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[20];?></div></td>
      <td><div align="center">3</div></td>
    </tr>
    <tr>
      <td><div align="center">16</div></td>
      <td><div align="center">Sulfat (LOD &lt; 5) </div></td>
      <td><div align="center"><?=$data[$metode[21]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[21];?></div></td>
      <td><div align="center">250</div></td>
    </tr>
    <tr>
      <td><div align="center">17</div></td>
      <td><div align="center">Tembaga</div></td>
      <td><div align="center"><?=$data[$metode[22]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[22];?></div></td>
      <td><div align="center">2</div></td>
    </tr>
    <tr>
      <td><div align="center">18</div></td>
      <td><div align="center">Sisa Klor </div></td>
      <td><div align="center"><?=$data[$metode[23]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[23];?></div></td>
      <td><div align="center">5</div></td>
    </tr>
    <tr>
      <td><div align="center">19</div></td>
      <td><div align="center">Amonia</div></td>
      <td><div align="center"><?=$data[$metode[24]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[24];?></div></td>
      <td><div align="center">1.5</div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>b</strong></div></td>
      <td><div align="center"><strong>Kimia Organic </strong></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center">Zat Organic (KMnO4) </div></td>
      <td><div align="center"><?=$data[$metode[25]];?></div></td>
      <td><div align="center">mg/l</div></td>
      <td><div align="center"><?=$hasil[25];?></div></td>
      <td><div align="center">10</div></td>
    </tr>
  </table>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <p align="left">(*) Sesuai Permenkes No. 492/Men.Kes/PER/IV/2010  </p>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
  <table width="943" border="0">
    <tr>
      <td width="87"><div align="center"></div></td>
      <td width="545"><div align="center"></div></td>
      <td width="289"><div align="left"><?=$TEMPAT;?>, <?=$TANGGAL;?></div></td>
    </tr>
    <tr>
      <td><div align="left">Dibuat Oleh</div></td>
      <td><div align="center"></div></td>
      <td><div align="left">Di setujui Oleh</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="left"></div></td>
    </tr>
    <tr>
      <td width="289"><div align="left"><?=$DIBUAT_OLEH;?></div></td>
      <td><div align="center"></div></td>
      <td><div align="left"><?=$DISETUJUI_OLEH;?></div></td>
    </tr>
    <tr>
      <td><div align="left">Penyelia</div></td>
      <td><div align="center"></div></td>
      <td><div align="left">Manajer Teknis</div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="left"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="left"></div></td>
    </tr>
    <tr>
      <td><div align="left">Form/T10-1</div></td>
    </tr>
  <tr>
      <td><div align="left">Revisi : 0</div></td>
    </tr>
  </</table>
  <p align="left">&nbsp;</p>
</div>
<blockquote>
  <p align="right">&nbsp;</p>
</blockquote>
</body>
</html>
