<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class simpan_spesimen extends main {

	var $data;
	var $datahome;
	
	public function get_arr_simapanspesimen()
	{	
		$query = $this->db->query('SELECT * FROM simapanspesimen');
		$rows = $query->result_array();				
		$this->data['arr_simapanspesimen'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from simapanspesimen where simapanspesimen_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/simpan_spesimen';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_simapanspesimen();
		
			$this->data['status_addsimapanspesimen'] = "0"; // default
			
			if (isset($_POST['status_addsimapanspesimen'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert simapanspesimen set simapanspesimen_name=? ',
					array($_POST['simapanspesimen']));
		
				$this->data['status_addsimapanspesimen'] = "1"; // sukses
				$this->get_arr_simapanspesimen();
			}
			
			if ($this->data['status_addsimapanspesimen'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upsimapanspesimen'] = "0"; // default
			
			if (isset($_POST['status_upsimapanspesimen'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update simapanspesimen set simapanspesimen_name=? where simapanspesimen_id=?',
					array($_POST['upsimapanspesimen'], $_POST['simapanspesimen_id']));
		
				$this->data['status_upsimapanspesimen'] = "1"; // sukses
				$this->get_arr_simapanspesimen();
			}
			
			if ($this->data['status_upsimapanspesimen'] == "1") {
				unset($_POST);
			}
			

			$this->data['simapanspesimen'] = isset($_POST['simapanspesimen']) ? $_POST['simapanspesimen'] : "";
			$this->data['upsimapanspesimen'] = isset($_POST['upsimapanspesimen']) ? $_POST['upsimapanspesimen'] : "";
			$this->data['simapanspesimen_id'] = isset($_POST['simapanspesimen_id']) ? $_POST['simapanspesimen_id'] : "";

		$this->data['area_body'] = $this->load->view('simpan_spesimen', $this->data, true);
		$this->data['judul'] = 'Form Master Data Kondisi Spesimen';
		$this->load->view('layout', $this->data);
	}
}

/* End of file simpan_spesimen.php */
/* Location: ./application/controllers/simpan_spesimen.php */