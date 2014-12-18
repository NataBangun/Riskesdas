<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class import_malaria extends main {

	var $data;
	var $datahome;
	
	
	
	public function index()
	{	
			
		
         /*   if (isset($_FILES['pilihfile'])) {	
			$data = $_FILES['pilihfile']['tmp_name'];
			$schema = file_get_contents($data);
			$query = rtrim( trim($schema), "\n;");
			$query_list = explode(";", $query);

			foreach($query_list as $query)
			$this->db->query($query);  */
			
			
		// Load the spreadsheet reader library
		$this->load->library('Spreadsheet_Excel_Reader');
 
		// Set output Encoding.
//		$this->spreadsheet_Excel_Reader->setOutputEncoding('UTF-8');
 
		$file =  $_SERVER['DOCUMENT_ROOT']."/newriskesdas/upload/HASIL MIKROSKOPIS MALARIA BTDK RKD13.xls" ;
 
		$this->Spreadsheet_Excel_Reader->read($file);
 
		error_reporting(E_ALL ^ E_NOTICE);
 
		// Sheet 1
		$data = $this->Spreadsheet_Excel_Reader->sheets[0] ;
 
		for ($i = 1; $i <= $data['numRows']; $i++) {
		for ($j = 1; $j <= $data['numCols']; $j++) {
		echo "\"".$data['cells'][$i][$j]."\",";
		}
		echo "br />";
		}
			
		$this->data['area_body'] = $this->load->view('import_malaria', $this->data, true);
		$this->data['judul'] = 'Form Import Malaria';
		$this->load->view('layout', $this->data);
	}
	
	
}

/* End of file import.php */
/* Location: ./application/controllers/import.php */