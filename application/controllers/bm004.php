<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class bm004 extends main {

	var $data;
	var $datahome;
	
	public function index()
	{	
		parent::index();

		$this->data['area_body'] = $this->load->view('bm004', $this->data, true);
		$this->data['judul'] = 'Form Hasil Pemeriksaan Lab ( BM 004 )';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */