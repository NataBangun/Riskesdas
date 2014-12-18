<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class import extends main {

	var $data;
	var $datahome;
	
	
	public function index($Id="")
	{	
		parent::index();
			
		if (isset($_FILES['pilihfile'])) {	
                // $type = $_FILES['pilihfile']['type'];
				// print_r($_FILES['pilihfile']);
                $data = $_FILES['pilihfile']['tmp_name'];
				$schema = file_get_contents($data);
				$query = rtrim( trim($schema), "\n;");
				$query_list = explode(";", $query);

				foreach($query_list as $query)
				$this->db->query($query);  
				
				// $import = ( select * $query ) union (select * formpenerimaan );
		}
			// if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 3)) {
				// $this->data['area_body'] = $this->load->view('404',$this->data, true);
			// } else {
				// $this->data['area_body'] = $this->load->view('import', $this->data, true);
			// }
		$this->data['area_body'] = $this->load->view('import', $this->data, true);
		$this->data['judul'] = 'Form Import';
		$this->load->view('layout', $this->data);
	}
	
	
}

/* End of file import.php */
/* Location: ./application/controllers/import.php */