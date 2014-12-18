<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class logintes extends main {

	var $data;
	var $datahome;
		
	function proseslogintes() {
            
		$lab = $this->input->post('Lab');
                $penelitian=  $this->input->post('Penelitian');
		$username = $this->input->post('User'); 
		$password = $this->input->post('Password'); 
		$passwordx = md5($password); 
		$q = $this->db->query("SELECT * FROM t_suser WHERE user='$username' AND pass='$passwordx' 
                                        AND penelitian_id='$penelitian' AND aktif='Y'");
                
		if ($q->num_rows() == 1) {
			$nama = $q->row()->user;
			$level = $q->row()->lvl;
			$penelitian = $q->row()->penelitian_id;
			$this->session->set_userdata('user',$nama);
			$this->session->set_userdata('level',$level);
			$this->session->set_userdata('penelitian',$penelitian);
			$this->session->set_userdata('lab',$lab);
			echo "<script>location.href = '{$this->data['application_path']}/home';</script>";
		} else {
			//$this->data['error']='!! Wrong Username or Password !!';
                        
	
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
		$this->get_arr_penelitian();
		$this->data['area_body'] = $this->load->view('logintes', $this->data, true);
		$this->data['judul'] = 'logintes';
		$this->load->view('logintes', $this->data);
	
	}
	
}

/* End of file logintes.php */
/* Location: ./application/controllers/logintes.php */