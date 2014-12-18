<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class propinsi extends main {

	var $data;
	var $datahome;
	
	public function del($Id="") {
		
		$this->db->query('DELETE from propinsi where ID_PROP=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/propinsi';</script>";
	}
	
	public function index()
	{	
		parent::index();
		
			$this->data['status_addpropinsi'] = "0"; // default
			
			if (isset($_POST['status_addpropinsi'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert propinsi set ID_PROP=?, NAMA_PROP=?, KORWIL=? ',
					array($_POST['kodepropinsi'], $_POST['propinsi'], $_POST['korwil']));
		
				$this->data['status_addpropinsi'] = "1"; // sukses
                                $this->get_arr_prop();
			}
			
			if ($this->data['status_addpropinsi'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_uppropinsi'] = "0"; // default
			
			if (isset($_POST['status_uppropinsi'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update propinsi set  NAMA_PROP=?, KORWIL=? where ID_PROP=?',
					array($_POST['uppropinsi'], $_POST['upkorwil'], $_POST['hupkodepropinsi']));
		
				$this->data['status_uppropinsi'] = "1"; // sukses
                                 $this->get_arr_prop();
			}
			
			if ($this->data['status_uppropinsi'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodepropinsi'] = isset($_POST['kodepropinsi']) ? $_POST['kodepropinsi'] : "";
			$this->data['propinsi'] = isset($_POST['propinsi']) ? $_POST['propinsi'] : "";
			$this->data['korwil'] = isset($_POST['korwil']) ? $_POST['korwil'] : "";
			$this->data['upkodepropinsi'] = isset($_POST['upkodepropinsi']) ? $_POST['upkodepropinsi'] : "";
			$this->data['uppropinsi'] = isset($_POST['uppropinsi']) ? $_POST['uppropinsi'] : "";
			$this->data['upkorwil'] = isset($_POST['upkorwil']) ? $_POST['upkorwil'] : "";

		$this->data['area_body'] = $this->load->view('propinsi', $this->data, true);
		$this->data['judul'] = 'Form Master Data Propinsi';
		$this->load->view('layout', $this->data);
	}
}

/* End of file propinsi.php */
/* Location: ./application/controllers/propinsi.php */