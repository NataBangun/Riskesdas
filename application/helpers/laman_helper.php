<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if( !function_exists('laman'))
{
    function laman($controller, $sql_count){
	
		$query_count = $controller->db->query($sql_count);
		$row_count = $query_count->row_array();				

		$laman_jumlah = $row_count['jumlah'];
		$laman_limit = 25;		
		$laman = isset($_GET['laman']) ? $_GET['laman'] : 1;
		if (!is_numeric($laman)) {
		} else if (intval($laman) == -1) { 
			$laman = ceil($laman_jumlah / $laman_limit); 
		} else if ($laman < 1) { // batas halaman paling awal
			$laman = 1; 
		} else if ($laman > ceil($laman_jumlah / $laman_limit)) { // batas halaman paling akhir
			$laman = ceil($laman_jumlah / $laman_limit); 
		}
		$laman_offset = ($laman - 1) * $laman_limit;
		
		if ($laman_offset < 0) $laman_offset = 0;		
		
		$controller->data['laman'] = $laman;
		$controller->data['laman_offset'] = $laman_offset;
		$controller->data['laman_limit'] = $laman_limit;
		$controller->data['laman_row_awal'] = $laman_offset + 1;		
		$controller->data['laman_row_akhir'] = $laman_offset + $laman_limit;		
		if ($controller->data['laman_row_akhir'] > $laman_jumlah) $controller->data['laman_row_akhir'] = $laman_jumlah;
		$controller->data['laman_jumlah'] = $laman_jumlah;
		
    }
}