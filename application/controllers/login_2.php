<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class login extends main {

	var $data;
	var $datahome;
		
	function proseslogin() {
		$level = $this->input->post('Level');
		$username = $this->input->post('User'); 
		$password = $this->input->post('Password'); 
		$passwordx = md5($password); 
		$q = $this->db->query("SELECT * FROM t_suser WHERE user='$username' AND pass='$passwordx' AND lvl='$level'");

		if ($q->num_rows() == 1) {
			$nama = $q->row()->user;
			$level = $q->row()->lvl;
			$this->session->set_userdata('user',$nama);
			$this->session->set_userdata('level',$level);
			echo "<script>location.href = '{$this->data['application_path']}/home';</script>";
		} else {
			$this->data['error']='!! Wrong Username or Password !!';
			
			echo "<script>location.href = '{$this->data['application_path']}/';</script>";
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		$this->data['logout'] = 'You have been logged out.';
		echo "<script>location.href = '{$this->data['application_path']}/';</script>";
	}
	
	public function index()
	{	
		
		
		parent::index();
		
		$this->data['area_body'] = $this->load->view('login', $this->data, true);
		$this->data['judul'] = 'Login';
		$this->load->view('login', $this->data);
	
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */