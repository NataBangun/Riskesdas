<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
<tr>
<td>Id</td>
<td>Nama</td>
<td>Korwil</td>
</tr>
<?
foreach($data1 as $item) {
?>
<tr>
<td><?=$item['ID_PROP']?></td>
<td><?=$item['NAMA_PROP']?></td>
<td><?=$item['KORWIL']?></td>
</tr>
<? } ?>
</table>