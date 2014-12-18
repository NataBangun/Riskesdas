<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class cb_hasil  extends main {

	var $data;
	var $datahome;
	
	public function get_arr_cb_hasil()
	{	
		$query = $this->db->query('SELECT * FROM p_cb_hasil');
		$rows = $query->result_array();				
		$this->data['arr_cb_hasil'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from p_cb_hasil where HASIL_ID=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/cb_hasil';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_cb_hasil();
		
			$this->data['status_addcb_hasil'] = "0"; // default
			
			if (isset($_POST['status_addcb_hasil'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert p_cb_hasil set HASIL_NM=? ',
					array($_POST['cb_hasil']));
		
				$this->data['status_addcb_hasil'] = "1"; // sukses
				$this->get_arr_cb_hasil();
			}
			
			if ($this->data['status_addcb_hasil'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upcb_hasil'] = "0"; // default
			
			if (isset($_POST['status_upcb_hasil'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update p_cb_hasil set HASIL_NM=? where HASIL_ID=?',
					array($_POST['upcb_hasil'], $_POST['']));
		
				$this->data['status_upcb_hasil'] = "1"; // sukses
				$this->get_arr_cb_hasil();
			}
			
			if ($this->data['status_upcb_hasil'] == "1") {
				unset($_POST);
			}
			

			$this->data['cb_hasil'] = isset($_POST['cb_hasil']) ? $_POST['cb_hasil'] : "";
			$this->data['upcb_hasil'] = isset($_POST['upcb_hasil']) ? $_POST['upcb_hasil'] : "";
			$this->data['HASIL_ID'] = isset($_POST['HASIL_ID']) ? $_POST['HASIL_ID'] : "";

		$this->data['area_body'] = $this->load->view('cb_hasil', $this->data, true);
		$this->data['judul'] = 'Form Master Data Combo Box Hasil';
		$this->load->view('layout', $this->data);
	}
}

/* End of file kondisi_spesimen.php */
/* Location: ./application/controllers/kondisi_spesimen.php */