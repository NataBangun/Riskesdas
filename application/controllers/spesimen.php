<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class spesimen extends main {

	var $data;
	var $datahome;
	
	public function get_arr_spesimen()
	{	
		$query = $this->db->query('SELECT * FROM spesimen');
		$rows = $query->result_array();				
		$this->data['arr_spesimen'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from spesimen where spesimen_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/spesimen';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_spesimen();
		
			$this->data['status_addspesimen'] = "0"; // default
			
			if (isset($_POST['status_addspesimen'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert spesimen set spesimen_name=?, spesimen_kode=? ',
					array($_POST['spesimen'], $_POST['kodespesimen']));
		
				$this->data['status_addspesimen'] = "1"; // sukses
				$this->get_arr_spesimen();
			}
			
			if ($this->data['status_addspesimen'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upspesimen'] = "0"; // default
			
			if (isset($_POST['status_upspesimen'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update spesimen set spesimen_name=?, spesimen_kode=? where spesimen_id=?',
					array($_POST['upspesimen'], $_POST['upkodespesimen'], $_POST['spesimen_id']));
		
				$this->data['status_upspesimen'] = "1"; // sukses
				$this->get_arr_spesimen();
			}
			
			if ($this->data['status_upspesimen'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodespesimen'] = isset($_POST['kodespesimen']) ? $_POST['kodespesimen'] : "";
			$this->data['spesimen'] = isset($_POST['spesimen']) ? $_POST['spesimen'] : "";
			$this->data['upkodespesimen'] = isset($_POST['upkodespesimen']) ? $_POST['upkodespesimen'] : "";
			$this->data['upspesimen'] = isset($_POST['upspesimen']) ? $_POST['upspesimen'] : "";
			$this->data['spesimen_id'] = isset($_POST['spesimen_id']) ? $_POST['spesimen_id'] : "";

		$this->data['area_body'] = $this->load->view('spesimen', $this->data, true);
		$this->data['judul'] = 'Form Master Data Spesimen';
		$this->load->view('layout', $this->data);
	}
}

/* End of file spesimen.php */
/* Location: ./application/controllers/spesimen.php */