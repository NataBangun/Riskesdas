<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class institusi extends main {

	var $data;
	var $datahome;
	
	public function get_arr_institusi()
	{	
		$query = $this->db->query('SELECT * FROM institusi');
		$rows = $query->result_array();				
		$this->data['arr_institusi'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from institusi where institusi_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/institusi';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_institusi();
		
			$this->data['status_addinstitusi'] = "0"; // default
			
			if (isset($_POST['status_addinstitusi'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert institusi set institusi_name=?, institusi_kode=? ',
					array($_POST['institusi'], $_POST['kodeinstitusi']));
		
				$this->data['status_addinstitusi'] = "1"; // sukses
				$this->get_arr_institusi();
			}
			
			if ($this->data['status_addinstitusi'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upinstitusi'] = "0"; // default
			
			if (isset($_POST['status_upinstitusi'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update institusi set institusi_name=?, institusi_kode=? where institusi_id=?',
					array($_POST['upinstitusi'], $_POST['upkodeinstitusi'], $_POST['institusi_id']));
		
				$this->data['status_upinstitusi'] = "1"; // sukses
				$this->get_arr_institusi();
			}
			
			if ($this->data['status_upinstitusi'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodeinstitusi'] = isset($_POST['kodeinstitusi']) ? $_POST['kodeinstitusi'] : "";
			$this->data['institusi'] = isset($_POST['institusi']) ? $_POST['institusi'] : "";
			$this->data['upkodeinstitusi'] = isset($_POST['upkodeinstitusi']) ? $_POST['upkodeinstitusi'] : "";
			$this->data['upinstitusi'] = isset($_POST['upinstitusi']) ? $_POST['upinstitusi'] : "";
			$this->data['institusi_id'] = isset($_POST['institusi_id']) ? $_POST['institusi_id'] : "";

		$this->data['area_body'] = $this->load->view('institusi', $this->data, true);
		$this->data['judul'] = 'Form Master Data Institusi';
		$this->load->view('layout', $this->data);
	}
}

/* End of file institusi.php */
/* Location: ./application/controllers/institusi.php */