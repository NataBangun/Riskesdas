<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Form Pengambilan</title>
<style type="text/css">
<!--
#judul {
	font-size: 36px;
	font-weight: bold;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	padding: 2px;
}
.tabel {
	border: 1px solid #000000;
}
.trow {
	border: 1px solid #000000;
}

-->
</style>
</head>

<body>
<table width="1000" height="100%" border="0" align="center" cellpadding="4">
  <tr>
    <td colspan="8"><div align="center" id="judul">
      <p>FORM SERAH TERIMA</p>
    </div></td>
  </tr>
  <tr>
    <td width="16%">No. Pengambilan </td>
    <td width="2%">:</td>
    <td colspan="6"><?=htmlspecialchars_decode($NoPengambilan);?></td>
    
  </tr>
  <tr>
    <td>Tanggal Serah Terima </td>
    <td>:</td>
    <td colspan="6"><?=htmlspecialchars_decode($TGLSerahTerima);?></td>
    
  </tr>
  <tr>
    <td>Kode Laboratorium</td>
    <td>: </td>
    <td colspan="6"><?=$LabPenelitian;?> / <?=$Penelitian;?></td>
  </tr>
  <tr>
    <td valign="top">Keterangan</td>
    <td valign="top">:</td>
    <td colspan="6"><div style="text-wrap: normal;width: 500px;"><?=$Ket;?></div></td>
  </tr>
  <tr>
    <td colspan="8"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="tabel">
      <tr>
        <td class="tabel"><div align="center"><strong>No.</strong></div></td>
        <td class="tabel"><div align="center"><strong>No.Barcode</strong></div></td>
        <td class="tabel"><div align="center"><strong>Tanggal Terima </strong></div></td>
        <td class="tabel"><div align="center"><strong>Kondisi</strong></div></td>
        <td class="tabel"><div align="center"><strong>Spesimen</strong></div></td>
      </tr>
      <?php
	  $a=0;
      foreach($no_barcode as $key=>$val){
        $a++;
              echo '<tr>
                <td class="tabel"><div >'.$a.'</div></td>
                <td class="tabel"><div >'.$no_barcode[$key].'</div></td>
                <td class="tabel"><div >'.$dt_tglterima[$key].'</div></td>
                <td class="tabel"><div >'.$dt_kondisi[$key].'</div></td>
                <td class="tabel"><div >'.$dt_spesimen[$key].'</div></td>
                
              </tr>
              ';
        
      }
      ?>
    </table></td>
  </tr>
</table>

<table height="100" width="1000" align="center" style="margin-top: 20px;">
  <tr>
    <td colspan="3"><div align="center">Yang Menyerahkan </div></td>
    <td width="47%" >&nbsp;</td>
    <td colspan="4"><div align="center">Yang Menerima </div></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><?=$YangMenyerahkan;?></div></td>
    <td></td>
    <td colspan="4"><div align="center"><?=$YangMenerima;?></div></td>
  </tr>
</table>
</body>
</html>

