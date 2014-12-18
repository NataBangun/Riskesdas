<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class search extends main {

	var $data;
	
	public function index($Id="")
	{	
		parent::index();
		
		// if (isset($_POST['search'])){
			$query = $this->db->query('select * from bm04 where no_stiker LIKE ? ',array($_POST['search']));
			$rows = $query->result_array();
			$this->data['search4']=$rows;
			
			// if(count($rows)>0){
				// echo "no";
			// }
			// else{
			
				$query2 = $this->db->query('select * from bm02 where noStiker LIKE ? ',array($_POST['search']));
				$rows2 = $query2->result_array();
				$this->data['search2']=$rows2;
				
				// if(count($rows2)>0){
					// echo "no";
				// }
				// else{
					$query3 = $this->db->query('select * from formhasil where no_stiker LIKE ? ',array($_POST['search']));
					$rows3 = $query3->result_array();
					$this->data['searchkimia']=$rows3;
				
					// if(count($rows3)>0){
						// echo "no";
					// }
					// else{
						$query4 = $this->db->query('select * from formmalarianew where no_stiker LIKE ? ',array($_POST['search']));
						$rows4 = $query4->result_array();
						$this->data['searchmalaria']=$rows4;
						
						// if(count($rows4)>0){
							// echo "no";
						// }
						// else{
							// echo "kosong";
						// }
					// }
				// }
			// }
		// }
			
			$this->data['search'] = isset($_POST['search']) ? $_POST['search'] : "";

		$this->data['area_body'] = $this->load->view('search', $this->data, true);
		$this->data['judul'] = 'Form Search';
		$this->load->view('layout', $this->data);
	}
}

/* End of file propinsi.php */
/* Location: ./application/controllers/propinsi.php */