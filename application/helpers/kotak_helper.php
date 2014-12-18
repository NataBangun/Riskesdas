<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if( !function_exists('kotak'))
{
    function kotak($panjang,$lebar,$arr_isi,$isi=""){
        $tanda = $arr_isi;
        echo"
<script>

</script>
            ";
        //$dt = explode(',',$tanda);
	$dt=$tanda;
        $hasil = $panjang*$lebar;
        $lebarkotak=(1+$lebar)*30;
        echo "<div id='kotak' style='width:".$lebarkotak."px;'>";
        for($i=1;$i<=$hasil;$i++){
            
                if($isi!=''){
                    if($isi==$i){
                        echo "<div id='box$i' style=\"border:solid 1px black;width:30px;height:30px;float:left;background-color:yellow;\">$i</div>";
                    }else if(in_array($i, $dt)){
                        echo "<div id='box$i' style=\"border:solid 1px black;width:30px;height:30px;float:left;background-color:red;\">$i</div>";
                    }else{
                        echo "<div id='box$i' style=\"border:solid 1px black;width:30px;height:30px;float:left;background-color:#9999ff;\">$i</div>";   
                    }
                }else{
                    if(in_array($i, $dt)){
                        echo "<div id='box$i' style=\"border:solid 1px black;width:30px;height:30px;float:left;background-color:red;\">$i</div>";
                    }else{
                        echo "<a href='#' onclick='boxadd($i)'><div id='box$i' style=\"border:solid 1px black;width:30px;height:30px;float:left;background-color:#9999ff;\">$i</div></a>";   
                    }
                }
        }
        echo "<input id='kotakpilih' type=hidden name='kotakpilih' value=''/>";
        echo "</div>";
        
    }
}