<html>
    <head>
        <title>Daftar Isi Box Spesimen</title>
    </head>
    <body style="width: 95%;">
    <center><h3>DAFTAR ISI BOX SPESIMEN</h3></center>
    <table width="90%" style=" margin-left:1%; margin-right:1%; margin-bottom:2%;">
        <tr>
		<td>
		<table>
        <tr>
            <td>No. Revco</td>
            <td><input type="text" value="<?=$no_revco;?>"</td>
            <td>Jenis Revco</td>
            <td><input type="checkbox"/>Berdiri<input type="checkbox"/>Tidur</td>
        </tr>
        <tr>
            <td>No. Rack</td>
            <td><input type="text" value="<?=$no_rack;?>"</td>
            <td>Jenis Rack</td>
            <td><input type="checkbox"/>Berdiri<input type="checkbox"/>Tidur</td>
        </tr>
        <tr>
            <td>No. Box</td>
            <td><input type="text" value="<?=$no_box;?>"/></td>
            <td>Kapasitas Box</td>
            <td><input type="text" value="<?=$kapasitas;?>"/></td>
        </tr>
        <tr>
            <td>Judul Box</td>
            <td><input type="text" value=""/></td>
            <td>Petugas</td>
            <td><input type="text" value=""/></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" value="<?=$tanggal;?>"/></td>
            <td></td>
            <td></td>
        </tr>
	</table>
	<table width="98%">
		<tr>
			<td>
    <?php
    $r = array();
    foreach($arr_umur as $value){
        $r[$value['no_kotak']]=$value['no_kotak'];
    }
    $dt =$r;
    
     $hasil = $panjang*$lebar;
        $lebarkotak=(1+$lebar)*135;
        echo "<div id='kotak' style='width:".$lebarkotak."px;display:table;'>";
        for($i=1;$i<=$hasil;$i++){
           
                    if(in_array($i, $dt)){
                        if($arr_umur[$i]['umur']<15){$tanda = '+';}
                        else{$tanda = '';}
                        echo "<div id='box$i' style=\"border:solid 1px black;width:135px;height:45px;float:left;display:table-cell;text-align:center;vertical-align:middle;\">$i<div>$tanda<u><b><small>".$arr_umur[$i]['no_barcode']."</small></b></u>$tanda</div></div>";
                    }else{
                        echo "<div id='box$i' style=\"border:solid 1px black;width:135px;height:45px;float:left;display:table-cell;text-align:center;vertical-align:middle;\">$i</div>";   
                    }
        }
        ?>
			</td>
		</tr>
    </table>
		<div style=" float:inherit; vertical-align:bottom;"><small><p>Ket : Penambahan tanda ( <b style="color:red;">+</b> ) nomer Barcode dimaksudkan untuk penandaan <u>spesiment</u> yang berumur 0 hingga 15 Tahun.</p></small></div>
		</td>
	</tr>
</table>
    </body>
</html>
