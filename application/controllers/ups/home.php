<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class home extends main {

	var $data;
	var $datahome;
	
	function lab(){
		$uplab = $this->input->post('UpLab');
		$this->session->set_userdata('lab',$uplab);
			echo "<script>location.href = '{$this->data['application_path']}/ups/home';</script>";
	}
	
	public function index()
	{	
		parent::index();

		// $this->data['area_body'] = $this->load->view('home', $this->data, true);
		
		
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('home', $this->data, true);
			}
			
		$this->data['judul'] = 'Home';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */