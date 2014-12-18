<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_user extends main {

	var $data;
	var $datahome;
	
	public function del($Id="") {
		
		$this->db->query('DELETE from t_suser where t_suser_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_user';</script>";
	}
		
	public function index()
	{	
		parent::index();
		
			$this->data['status_user'] = "0"; // default
			
			if (isset($_POST['status_user'])) {
				// 1. update Data
				// var_dump($this->db);
				$pass=md5($_POST['pass']);
				
				if(empty($_POST['pass'])){
				$this->db->query('update t_suser set user=?, email=?, penelitian_id=?, lvl=?, aktif=? where t_suser_id=? ',
					array($_POST['user'], $_POST['email'], $_POST['penelitian'], $_POST['level'], $_POST['aktif'],$_POST['t_suser_id']))or die(mysql_error());
                    
					$this->data['status_user'] = "1"; // sukses
				}
				else{
					$this->db->query('update t_suser set user=?, pass=?,email=?, penelitian_id=?, lvl=?, aktif=? where t_suser_id=? ',
					array($_POST['user'], $pass,$_POST['email'], $_POST['penelitian'], $_POST['level'], $_POST['aktif'],$_POST['t_suser_id']))or die(mysql_error());
                    
					$this->data['status_user'] = "1"; // sukses
				}
				
				$this->get_arr_manuser();
			}
			
			if ($this->data['status_user'] == "1") {
				unset($_POST);
			}
			
			$this->data['user'] = isset($_POST['user']) ? $_POST['user'] : "";
			$this->data['pass'] = isset($_POST['pass']) ? $_POST['pass'] : "";
			$this->data['email'] = isset($_POST['email']) ? $_POST['email'] : "";
			$this->data['penelitian'] = isset($_POST['penelitian']) ? $_POST['penelitian'] : "";
			$this->data['level'] = isset($_POST['level']) ? $_POST['level'] : "";
			$this->data['date'] = isset($_POST['date']) ? $_POST['date'] : "";
			$this->data['aktif'] = isset($_POST['aktif']) ? $_POST['aktif'] : "";
			
			
			// if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 9)) {
			if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 9)) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_user', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_user', $this->data, true);
		$this->data['judul'] = 'Form List User';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */