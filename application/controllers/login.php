<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class login extends main {

	var $data;
	var $datahome;
    
        public function peneliti($idlab=""){
            $query = $this->db->query("select * from penelitian where lab_Id = '$idlab'");
            $rows = $query->result_array();
            $this->data['penelitian']=$rows;
            //var_dump($rows);
            
            ?>
            <select name="Penelitian" id="Penelitian" class='input-block-level'>
        		<option value=""> - Silakan Pilih Penelitian - </option>
        		<?php foreach($rows as $value): ?>
        		<option value="<?php echo $value['penelitian_kode'] ?>"><?php echo $value['penelitian_kode'] ?> - <?php echo $value['penelitian_name'] ?></option>
        		<?php endforeach; ?>
    		</select>
            <?php
        }
    
		
	function proseslogin() {
            
		$lab = $this->input->post('Lab');
                $penelitian=  $this->input->post('Penelitian');
		$username = $this->input->post('User'); 
		$password = $this->input->post('Password'); 
		$passwordx = md5($password); 
		$q = $this->db->query("SELECT * FROM t_suser WHERE user='$username' AND pass='$passwordx' 
                                        AND penelitian_id='$penelitian' AND aktif='Y'");
                
		if ($q->num_rows() == 1) {
			$user_id = $q->row()->t_suser_id;
			$nama = $q->row()->user;
			$level = $q->row()->lvl;
			$penelitian = $q->row()->penelitian_id;
			$this->session->set_userdata('user_id',$user_id);
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
		$this->data['area_body'] = $this->load->view('login', $this->data, true);
		$this->data['judul'] = 'Login';
		$this->load->view('login', $this->data);
	
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */