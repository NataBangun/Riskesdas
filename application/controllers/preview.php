<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class preview extends main {

	var $data;
	var $datahome;
	
	public function index($id = "")
	{	
		parent::index();
		
		$query = $this->db->query('SELECT * FROM formhasil WHERE formhasil_id =? ', array($id));
		$rows = $query->result_array();
		$this->data['preview'] = $rows;
		// var_dump($

		$this->data['area_body'] = $this->load->view('preview', $this->data, true);
		$this->data['judul'] = 'Preview Form Hasil Pemeriksaan Lab';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */