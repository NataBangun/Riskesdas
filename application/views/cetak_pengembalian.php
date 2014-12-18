<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Form Pengembalian</title>
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
      <p>FORM PENGEMBALIAN</p>
    </div></td>
  </tr>
  <tr>
    <td width="16%">No. Pengembalian </td>
    <td width="2%">:</td>
    <td colspan="6"><?=$NoPengembalian;?></td>
    
  </tr>
  <tr>
    <td width="16%">No. Pengambilan </td>
    <td width="2%">:</td>
    <td colspan="6"><?=$NoPengambilan;?></td>
    
  </tr>
  <tr>
    <td>Tanggal Serah Terima </td>
    <td>:</td>
    <td colspan="6"><?=$TGLSerahTerima;?></td>
    
  </tr>
  <tr>
    <td>Tanggal Kembali </td>
    <td>:</td>
    <td colspan="6"><?=$TglKembali;?></td>
    
  </tr>
  <tr>
    <td>Kode Laboratorium</td>
    <td>: </td>
    <td colspan="6"><?=$labcode;?></td>
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
        <td class="tabel"><div align="center"><strong>Status</strong></div></td>
        
      </tr>
      <?php
      $i=$_GET['Jumlah'];
      for($a=1;$a<=$i;$a++){
        if(isset($_GET['dt_barcode'.$a])||($_GET['dt_barcode'.$a]!='')||($_GET['dt_kembali'.$a]==1)){
              echo '<tr>
                <td class="tabel"><div >'.$a.'</div></td>
                <td class="tabel"><div >'.$_GET['dt_barcode'.$a].'</div></td>
                <td class="tabel"><div >'.$_GET['dt_tglterima'.$a].'</div></td>
                <td class="tabel"><div >'.$_GET['dt_kondisi'.$a].'</div></td>
                <td class="tabel"><div >'.$_GET['dt_spesimen'.$a].'</div></td>
                <td class="tabel"><div >';
                switch($_GET['dt_status'.$a]){
                    case 0 :echo'Disimpan Kembali';break;
                    case 2 :echo'Dimusnahkan';break;
                    case 3 :echo'Habis';break;
                    default:echo'Tidak Ada';break;  
                }
                echo'</div></td>
              </tr>
              ';
        }
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

