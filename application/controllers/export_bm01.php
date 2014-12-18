<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class export_bm01 extends main {

	var $data;
	var $datahome;
	
	
	public function index($Id="")
	{	
		parent::index();
        if(isset($_POST['status_export'])){
		$sql = " SELECT * FROM bm_01 
            RIGHT JOIN data_bm01 ON data_bm01.bm01_id = bm_01.bm_01_id
            where kode_lab LIKE '%{$this->data['lab']}%' 
			AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
            
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_bm01'] = $rows;
        $this->load->view('view_bm01',$this->data);
        }
			if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 9)) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('export_bm01', $this->data, true);
			}
			
		$this->data['judul'] = 'Form Export B01';
		$this->load->view('layout', $this->data);
	}
}

/* End of file export_bm01.php */
/* Location: ./application/controllers/export_bm01.php */