<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class site extends main {

	var $data;
	var $datahome;
	
	public function get_arr_site()
	{	
		$query = $this->db->query('SELECT * FROM site');
		$rows = $query->result_array();				
		$this->data['arr_site'] = $rows;
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from site where site_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/site';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_site();
		
			$this->data['status_addsite'] = "0"; // default
			
			if (isset($_POST['status_addsite'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert site set site_name=?, site_kode=? ',
					array($_POST['site'], $_POST['kodesite']));
		
				$this->data['status_addsite'] = "1"; // sukses
				$this->get_arr_site();
			}
			
			if ($this->data['status_addsite'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upsite'] = "0"; // default
			
			if (isset($_POST['status_upsite'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update site set site_name=?, site_kode=? where site_id=?',
					array($_POST['upsite'], $_POST['upkodesite'], $_POST['site_id']));
		
				$this->data['status_upsite'] = "1"; // sukses
				$this->get_arr_site();
			}
			
			if ($this->data['status_upsite'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodesite'] = isset($_POST['kodesite']) ? $_POST['kodesite'] : "";
			$this->data['site'] = isset($_POST['site']) ? $_POST['site'] : "";
			$this->data['upkodesite'] = isset($_POST['upkodesite']) ? $_POST['upkodesite'] : "";
			$this->data['upsite'] = isset($_POST['upsite']) ? $_POST['upsite'] : "";
			$this->data['site_id'] = isset($_POST['site_id']) ? $_POST['site_id'] : "";

		$this->data['area_body'] = $this->load->view('site', $this->data, true);
		$this->data['judul'] = 'Form Master Data Site';
		$this->load->view('layout', $this->data);
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */