<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class kondisi_spesimen extends main {

	var $data;
	var $datahome;
	
	public function get_arr_kondisispesimen()
	{	
		$query = $this->db->query('SELECT * FROM kondisispesimen');
		$rows = $query->result_array();				
		$this->data['arr_kondisispesimen'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from kondisispesimen where kondisispesimen_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/kondisi_spesimen';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_kondisispesimen();
		
			$this->data['status_addkondisispesimen'] = "0"; // default
			
			if (isset($_POST['status_addkondisispesimen'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert kondisispesimen set kondisispesimen_name=? ',
					array($_POST['kondisispesimen']));
		
				$this->data['status_addkondisispesimen'] = "1"; // sukses
				$this->get_arr_kondisispesimen();
			}
			
			if ($this->data['status_addkondisispesimen'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upkondisispesimen'] = "0"; // default
			
			if (isset($_POST['status_upkondisispesimen'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update kondisispesimen set kondisispesimen_name=? where kondisispesimen_id=?',
					array($_POST['upkondisispesimen'], $_POST['kondisispesimen_id']));
		
				$this->data['status_upkondisispesimen'] = "1"; // sukses
				$this->get_arr_kondisispesimen();
			}
			
			if ($this->data['status_upkondisispesimen'] == "1") {
				unset($_POST);
			}
			

			$this->data['kondisispesimen'] = isset($_POST['kondisispesimen']) ? $_POST['kondisispesimen'] : "";
			$this->data['upkondisispesimen'] = isset($_POST['upkondisispesimen']) ? $_POST['upkondisispesimen'] : "";
			$this->data['kondisispesimen_id'] = isset($_POST['kondisispesimen_id']) ? $_POST['kondisispesimen_id'] : "";

		$this->data['area_body'] = $this->load->view('kondisi_spesimen', $this->data, true);
		$this->data['judul'] = 'Form Master Data Kondisi Spesimen';
		$this->load->view('layout', $this->data);
	}
}

/* End of file kondisi_spesimen.php */
/* Location: ./application/controllers/kondisi_spesimen.php */