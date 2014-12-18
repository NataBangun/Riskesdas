<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class kecamatan extends main {

	var $data;
	var $datahome;
        
	
	public function del($Id="") {
		
		$this->db->query('DELETE from kecamatan where ID_KEC=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/kecamatan';</script>";
	}
        
        public function kabupaten($idprov=""){
                $query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
                $rows = $query->result_array();
                $this->data['kabu']=$rows;
                //var_dump($rows);
                
                ?>
                <select name="kodekabupaten" id="kodekabupaten">
		<option> - Silakan Pilih Kabupaten - </option>
		<?php foreach($rows as $value): ?>
		<option value="<?php echo $value['ID_KAB'] ?>"><?php echo $value['ID_KAB'] ?> - <?php echo $value['NM_KAB'] ?></option>
		<?php endforeach; ?>
		</select>
                <?php
        }
        public function upkabupaten($idprov=""){
                $query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
                $rows = $query->result_array();
                $this->data['kabu']=$rows;
                //var_dump($rows);
                
                ?>
                <select name="kodekabupaten" id="kodekabupaten">
		<option> - Silakan Pilih Kabupaten - </option>
		<?php foreach($rows as $value): ?>
		<option value="<?php echo $value['ID_KAB'] ?>"><?php echo $value['ID_KAB'] ?> - <?php echo $value['NM_KAB'] ?></option>
		<?php endforeach; ?>
		</select>
                <?php
        }
	
	public function index()
	{	
		parent::index();
                
                
		
			$this->data['status_addkecamatan'] = "0"; // default
			
			if (isset($_POST['status_addkecamatan'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert kecamatan set ID_PROP=?, ID_KAB=?, ID_KEC=?, NM_KEC=? ', 
					array($_POST['KodePropinsi'], $_POST['kodekabupaten'], $_POST['kodekecamatan'],$_POST['namakecamatan']));
		
				$this->data['status_addkecamatan'] = "1"; // sukses
                                $this->get_arr_kec();
			}
			
			if ($this->data['status_addkecamatan'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upkecamatan'] = "0"; // default
			
			if (isset($_POST['status_upkecamatan'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update kecamatan set ID_PROP=?, ID_KAB=?,NM_KEC=? where ID_KEC=?',
					array($_POST['upkodepropinsi'], $_POST['upkodekabupaten'],
                                              $_POST['upnamakecamatan'], $_POST['hupkodekecamatan']));
		
				$this->data['status_upkecamatan'] = "1"; // sukses
                                $this->get_arr_kec();
			}
			
			if ($this->data['status_upkecamatan'] == "1") {
				unset($_POST);
			}
			

			$this->data['KodePropinsi'] = isset($_POST['KodePropinsi']) ? $_POST['KodePropinsi'] : "";
			$this->data['kodekabupaten'] = isset($_POST['kodekabupaten']) ? $_POST['kodekabupaten'] : "";
			$this->data['kodekecamatan'] = isset($_POST['kodekecamatan']) ? $_POST['kodekecamatan'] : "";
			$this->data['namakecamatan'] = isset($_POST['namakecamatan']) ? $_POST['namakecamatan'] : "";
			$this->data['upkodepropinsi'] = isset($_POST['upkodepropinsi']) ? $_POST['upkodepropinsi'] : "";
			$this->data['upkodekabupaten'] = isset($_POST['upkodekabupaten']) ? $_POST['upkodekabupaten'] : "";
			$this->data['upkodekecamatan'] = isset($_POST['upkodekecamatan']) ? $_POST['upkodekecamatan'] : "";
			$this->data['hupkodekecamatan'] = isset($_POST['hupkodekecamatan']) ? $_POST['hupkodekecamatan'] : "";
			$this->data['upnamakecamatan'] = isset($_POST['upnamakecamatan']) ? $_POST['upnamakecamatan'] : "";

		$this->data['area_body'] = $this->load->view('kecamatan', $this->data, true);
		$this->data['judul'] = 'Form Master Data kecamatan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file kecamatan.php */
/* Location: ./application/controllers/kecamatan.php */