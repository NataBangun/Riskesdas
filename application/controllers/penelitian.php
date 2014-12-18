<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class penelitian extends main {

	var $data;
	var $datahome;
	
	public function get_arr_penelitian()
	{	
		$query = $this->db->query('SELECT * FROM penelitian');
		$rows = $query->result_array();				
		$this->data['arr_penelitian'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from penelitian where penelitian_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/penelitian';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_penelitian();
		
			$this->data['status_addpenelitian'] = "0"; // default
			
			if (isset($_POST['status_addpenelitian'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert penelitian set lab_Id=?, penelitian_name=?, penelitian_kode=? ',
					array($_POST['Lab'], $_POST['penelitian'], $_POST['kodepenelitian']));
		
				$this->data['status_addpenelitian'] = "1"; // sukses
				$this->get_arr_penelitian();
			}
			
			if ($this->data['status_addpenelitian'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_uppenelitian'] = "0"; // default
			
			if (isset($_POST['status_uppenelitian'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update penelitian set lab_Id=?, penelitian_name=?, penelitian_kode=? where penelitian_id=?',
					array($_POST['upLab'], $_POST['uppenelitian'], $_POST['upkodepenelitian'], $_POST['penelitian_id']));
		
				$this->data['status_uppenelitian'] = "1"; // sukses
				$this->get_arr_penelitian();
			}
			
			if ($this->data['status_uppenelitian'] == "1") {
				unset($_POST);
			}
			

			$this->data['Lab'] = isset($_POST['Lab']) ? $_POST['Lab'] : "";
			$this->data['kodepenelitian'] = isset($_POST['kodepenelitian']) ? $_POST['kodepenelitian'] : "";
			$this->data['penelitian'] = isset($_POST['penelitian']) ? $_POST['penelitian'] : "";
			$this->data['upkodepenelitian'] = isset($_POST['upkodepenelitian']) ? $_POST['upkodepenelitian'] : "";
			$this->data['upLab'] = isset($_POST['upLab']) ? $_POST['upLab'] : "";
			$this->data['uppenelitian'] = isset($_POST['uppenelitian']) ? $_POST['uppenelitian'] : "";
			$this->data['penelitian_id'] = isset($_POST['penelitian_id']) ? $_POST['penelitian_id'] : "";

		$this->data['area_body'] = $this->load->view('penelitian', $this->data, true);
		$this->data['judul'] = 'Form Master Data Penelitian';
		$this->load->view('layout', $this->data);
	}
}

/* End of file penelitian.php */
/* Location: ./application/controllers/penelitian.php */