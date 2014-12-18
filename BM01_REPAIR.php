<?php

mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('web_lims');

$rs = mysql_query('SELECT * FROM bm01');
while($dt=mysql_fetch_array($rs)){
    $NoBM = 0;
    
    if($dt['NoStiker_1']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_1']},
           NamaART  = {$dt['NamaART_1']},
           UmurART  = {$dt['UmurART_1']},
           JK       = {$dt['JK_1']},
           Urin     = {$dt['Urin_1']},
           TglUrin  = {$dt['TglUrin_1']},
           Darah    = {$dt['Darah_1']},
           TglDarah = {$dt['TglDarah_1']}
        ");
    }
    else
    if($dt['NoStiker_2']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id  = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_2']},
           NamaART  = {$dt['NamaART_2']},
           UmurART  = {$dt['UmurART_2']},
           JK       = {$dt['JK_2']},
           Urin     = {$dt['Urin_2']},
           TglUrin  = {$dt['TglUrin_2']},
           Darah    = {$dt['Darah_2']},
           TglDarah = {$dt['TglDarah_2']}
        ");
    }
    else
    if($dt['NoStiker_3']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id  = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_3']},
           NamaART  = {$dt['NamaART_3']},
           UmurART  = {$dt['UmurART_3']},
           JK       = {$dt['JK_3']},
           Urin     = {$dt['Urin_3']},
           TglUrin  = {$dt['TglUrin_3']},
           Darah    = {$dt['Darah_3']},
           TglDarah = {$dt['TglDarah_3']}
        ");
    }
    else
    if($dt['NoStiker_4']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id  = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_4']},
           NamaART  = {$dt['NamaART_4']},
           UmurART  = {$dt['UmurART_4']},
           JK       = {$dt['JK_4']},
           Urin     = {$dt['Urin_4']},
           TglUrin  = {$dt['TglUrin_4']},
           Darah    = {$dt['Darah_4']},
           TglDarah = {$dt['TglDarah_4']}
        ");
    }
    else
    if($dt['NoStiker_5']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_5']},
           NamaART  = {$dt['NamaART_5']},
           UmurART  = {$dt['UmurART_5']},
           JK       = {$dt['JK_5']},
           Urin     = {$dt['Urin_5']},
           TglUrin  = {$dt['TglUrin_5']},
           Darah    = {$dt['Darah_5']},
           TglDarah = {$dt['TglDarah_5']}
        ");
    }
    else
    if($dt['NoStiker_6']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_6']},
           NamaART  = {$dt['NamaART_6']},
           UmurART  = {$dt['UmurART_6']},
           JK       = {$dt['JK_6']},
           Urin     = {$dt['Urin_6']},
           TglUrin  = {$dt['TglUrin_6']},
           Darah    = {$dt['Darah_6']},
           TglDarah = {$dt['TglDarah_6']}
        ");
    }
    else
    if($dt['NoStiker_7']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_7']},
           NamaART  = {$dt['NamaART_7']},
           UmurART  = {$dt['UmurART_7']},
           JK       = {$dt['JK_7']},
           Urin     = {$dt['Urin_7']},
           TglUrin  = {$dt['TglUrin_7']},
           Darah    = {$dt['Darah_7']},
           TglDarah = {$dt['TglDarah_7']}
        ");
    }
    else
    if($dt['NoStiker_8']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_8']},
           NamaART  = {$dt['NamaART_8']},
           UmurART  = {$dt['UmurART_8']},
           JK       = {$dt['JK_8']},
           Urin     = {$dt['Urin_8']},
           TglUrin  = {$dt['TglUrin_8']},
           Darah    = {$dt['Darah_8']},
           TglDarah = {$dt['TglDarah_8']}
        ");
    }
    else
    if($dt['NoStiker_9']>0){
        mysql_query("
           INSERT data_bm01 SET
           bm01_id = {$dt['bm01_id']},
           NoStiker = {$dt['NoStiker_9']},
           NamaART  = {$dt['NamaART_9']},
           UmurART  = {$dt['UmurART_9']},
           JK       = {$dt['JK_9']},
           Urin     = {$dt['Urin_9']},
           TglUrin  = {$dt['TglUrin_9']},
           Darah    = {$dt['Darah_9']},
           TglDarah = {$dt['TglDarah_9']}
        ");
    }
    else{
        $NoBM=0;
    }
}
?>