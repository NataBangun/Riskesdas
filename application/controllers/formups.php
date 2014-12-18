<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class formups extends main {

	var $data;
	var $datahome;
	
    public function peneliti($idlab=""){
        $query = $this->db->query("select * from penelitian where lab_Id = '$idlab'");
        $rows = $query->result_array();
        $this->data['penelitian']=$rows;
        //var_dump($rows);
        
        ?>
        <select name="Penelitian" id="Penelitian">
    		<option value=""> - Silakan Pilih Penelitian - </option>
    		<?php foreach($rows as $value): ?>
    		<option value="<?php echo $value['penelitian_kode'] ?>"><?php echo $value['penelitian_kode'] ?> - <?php echo $value['penelitian_name'] ?></option>
    		<?php endforeach; ?>
		</select>
        <?php
    }

	public function index(){
		parent::index();
		$this->get_arr_penelitian();
		
			$this->data['status_addsuser'] = "0"; // default
			
			if (isset($_POST['status_addsuser'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert ups_user set user=?, pass=?, email=?, date_join=now(), aktif=?',
					array($_POST['User'], md5($_POST['Password']), $_POST['Email'], $_POST['Aktif']));
		
				$this->data['status_addsuser'] = "1"; // sukses
				$this->get_arr_userups();
			}
			
			if ($this->data['status_addsuser'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_user'] = "0"; // default update
			
			if (isset($_POST['status_user'])) {
				// 1. update Data
				// var_dump($this->db);
				$pass=md5($_POST['pass']);
				
				if(empty($_POST['pass'])){
				$this->db->query('update ups_user set user=?, email=?, aktif=? where ups_user_id=? ',
					array($_POST['user'], $_POST['email'], $_POST['aktif'],$_POST['ups_user_id']))or die(mysql_error());
                    
					$this->data['status_user'] = "1"; // sukses
				}
				else{
					$this->db->query('update ups_user set user=?, pass=?,email=?, aktif=? where ups_user_id=? ',
					array($_POST['user'], $pass,$_POST['email'], $_POST['aktif'],$_POST['ups_user_id']))or die(mysql_error());
                    
					$this->data['status_user'] = "1"; // sukses
				}
				
				$this->get_arr_userups();
			}
			
			if ($this->data['status_user'] == "1") {
				unset($_POST);
			}
			
			$this->data['user'] = isset($_POST['user']) ? $_POST['user'] : "";
			$this->data['pass'] = isset($_POST['pass']) ? $_POST['pass'] : "";
			$this->data['email'] = isset($_POST['email']) ? $_POST['email'] : "";
//			$this->data['penelitian'] = isset($_POST['penelitian']) ? $_POST['penelitian'] : "";
//			$this->data['lepel'] = isset($_POST['lepel']) ? $_POST['lepel'] : "";
			$this->data['date'] = isset($_POST['date']) ? $_POST['date'] : "";
			$this->data['aktif'] = isset($_POST['aktif']) ? $_POST['aktif'] : "";
			

			$this->data['User'] = isset($_POST['User']) ? $_POST['User'] : "";
			$this->data['Password'] = isset($_POST['Password']) ? $_POST['Password'] : "";
			$this->data['Email'] = isset($_POST['Email']) ? $_POST['Email'] : "";
//			$this->data['Penelitian'] = isset($_POST['Penelitian']) ? $_POST['Penelitian'] : "";
//			$this->data['Lvl'] = isset($_POST['Lvl']) ? $_POST['Lvl'] : "";
			$this->data['Aktif'] = isset($_POST['Aktif']) ? $_POST['Aktif'] : "";
			
			
			if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 9)) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('formups', $this->data, true);
			}
			
		// $this->data['area_body'] = $this->load->view('formuser', $this->data, true);
		$this->data['judul'] = 'Form Manajemen User UPS)';
		$this->load->view('layout', $this->data);
	}
}
