<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('main.php');

class pengambilan extends main{
    public function index() {
        $this->data['session1'] = $this->session->userdata('lab');
        $this->data['session1'] = $this->session->userdata('penelitian');
        $this->data['area_body'] = $this->load->view('tes', $this->data, true);
        $this->data['judul'] = 'Form Pengambilan';
	$this->load->view('tes', $this->data);
    }
}