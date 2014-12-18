<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class kabupaten extends main {

	var $data;
	var $datahome;
	
	public function del($Id="") {
		
		$this->db->query('DELETE from kabupaten where ID_KAB=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/kabupaten';</script>";
	}
	
	public function index()
	{	
		parent::index();
		
			$this->data['status_addkabupaten'] = "0"; // default
			
			if (isset($_POST['status_addkabupaten'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert kabupaten set ID_PROP=?, ID_KAB=?, NM_KAB=? ',
					array($_POST['kodepropinsi'], $_POST['kodekabupaten'], $_POST['namakabupaten']));
		
				$this->data['status_addkabupaten'] = "1"; // sukses
                                $this->get_arr_kab();
			}
			
			if ($this->data['status_addkabupaten'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upkabupaten'] = "0"; // default
			
			if (isset($_POST['status_upkabupaten'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update kabupaten set ID_PROP=?, NM_KAB=? where ID_KAB=?',
					array($_POST['upkodepropinsi'], $_POST['upnamakabupaten'], $_POST['hupkodekabupaten']));
		
				$this->data['status_upkabupaten'] = "1"; // sukses
                                $this->get_arr_kab();
			}
			
			if ($this->data['status_upkabupaten'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodekabupaten'] = isset($_POST['kodekabupaten']) ? $_POST['kodekabupaten'] : "";
			$this->data['kabupaten'] = isset($_POST['kabupaten']) ? $_POST['kabupaten'] : "";
			$this->data['korwil'] = isset($_POST['korwil']) ? $_POST['korwil'] : "";
			$this->data['upkodekabupaten'] = isset($_POST['upkodekabupaten']) ? $_POST['upkodekabupaten'] : "";
			$this->data['upkabupaten'] = isset($_POST['upkabupaten']) ? $_POST['upkabupaten'] : "";
			$this->data['upkorwil'] = isset($_POST['upkorwil']) ? $_POST['upkorwil'] : "";

		$this->data['area_body'] = $this->load->view('kabupaten', $this->data, true);
		$this->data['judul'] = 'Form Master Data kabupaten';
		$this->load->view('layout', $this->data);
	}
}

/* End of file kabupaten.php */
/* Location: ./application/controllers/kabupaten.php */