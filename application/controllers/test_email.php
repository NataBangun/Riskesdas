<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_email extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->library('email');
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'localhost';
		$config['smtp_user'] = 'arisbaskoro';
		$config['smtp_pass'] = 'root';
		$config['smtp_port'] = 25;
		$config['mailtype'] = 'html';

		$this->email->initialize($config);		
	}
	
	function index()
	{
		$this->email->from('arisbaskoro@localhost', 'Kemendag');
		$this->email->to('arisbaskoro@windowslive.com'); 
		// $this->email->cc('another@another-example.com'); 
		// $this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Example');
		$this->email->message('Testing the email class. <br/>Tanggal: '.date('Y-m-d H:i:s').'<br/><b>Terima Kasih</b>');	

		$this->email->send();
	}

}