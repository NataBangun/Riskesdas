<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class laporan_penerimaan extends main {

	var $data;
	var $datahome;
	
	public function get_arr_penelitian()
	{	
		$query = $this->db->query('SELECT * FROM penelitian');
		$rows = $query->result_array();				
		$this->data['arr_penelitian'] = $rows;
	}

	public function get_arr_spesimen()
	{	
		$query = $this->db->query('SELECT * FROM spesimen');
		$rows = $query->result_array();				
		$this->data['arr_spesimen'] = $rows;
	}
	public function get_arr_revcojenis(){
		$query = $this->db->query("SELECT * FROM k_revco_jenis");
		$rows = $query->result_array();
		$this->data['arr_revcojenis']=$rows;

	}
	public function get_arr_kondisispesimen()
	{	
		$query = $this->db->query('SELECT * FROM kondisispesimen');
		$rows = $query->result_array();				
		$this->data['arr_kondisispesimen'] = $rows;
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_penelitian();
		$this->get_arr_spesimen();
		$this->get_arr_revcojenis();
		$this->get_arr_kondisispesimen();
		
			$this->data['status_addpenelitian'] = "0"; // default
			
			if (isset($_POST['status_addpenelitian'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert penelitian set penelitian_name=?, penelitian_kode=? ',
					array($_POST['penelitian'], $_POST['kodepenelitian']));
		
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
				$this->db->query('update penelitian set penelitian_name=?, penelitian_kode=? where penelitian_id=?',
					array($_POST['uppenelitian'], $_POST['upkodepenelitian'], $_POST['penelitian_id']));
		
				$this->data['status_uppenelitian'] = "1"; // sukses
				$this->get_arr_penelitian();
			}
			
			if ($this->data['status_uppenelitian'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodepenelitian'] = isset($_POST['kodepenelitian']) ? $_POST['kodepenelitian'] : "";
			$this->data['penelitian'] = isset($_POST['penelitian']) ? $_POST['penelitian'] : "";
			$this->data['upkodepenelitian'] = isset($_POST['upkodepenelitian']) ? $_POST['upkodepenelitian'] : "";
			$this->data['uppenelitian'] = isset($_POST['uppenelitian']) ? $_POST['uppenelitian'] : "";
			$this->data['penelitian_id'] = isset($_POST['penelitian_id']) ? $_POST['penelitian_id'] : "";

		$this->data['area_body'] = $this->load->view('ups/laporan_penerimaan', $this->data, true);
		$this->data['judul'] = 'Form Laporan Penerimaan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file penelitian.php */
/* Location: ./application/controllers/penelitian.php */