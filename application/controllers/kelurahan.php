<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class kelurahan extends main {

	var $data;
	var $datahome;
	
	public function del($Id="") {
		
		$this->db->query('DELETE from kelurahan where ID_KEL=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/kelurahan';</script>";
	}
        
         public function kecamatan($idprov="",$idkab=""){
                //echo "select * from kecamatan where ID_KAB = '$idkab' and ID_PROP = '$idprov'";
                $query = $this->db->query("select * from kecamatan where ID_KAB = '$idkab' and ID_PROP = '$idprov'");
                $rows = $query->result_array();
                $this->data['keca']=$rows;
                
                ?>
                <select name="kodekecamatan" id="kodekecamatan" onchange="kelurahan(this.value)">
            		<option> - Silakan Pilih Kecamatan - </option>
            		<?php foreach($rows as $value): ?>
            		<option value="<?php echo $value['ID_KEC'] ?>"><?php echo $value['ID_KEC'] ?> - <?php echo $value['NM_KEC'] ?></option>
            		<?php endforeach; ?>
        		</select>
                <?php
                
        }
        
        public function kabupaten($idprov=""){
			$query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
			$rows = $query->result_array();
			$this->data['kabu']=$rows;
			//var_dump($rows);
			
			?>
			<select name="kodekabupaten" id="kodekabupaten"  onchange="kecamatan(this.value)">
				<option> - Silakan Pilih Kabupaten - </option>
				<?php foreach($rows as $value): ?>
				<option value="<?php echo $value['ID_KAB'] ?>"><?php echo $value['ID_KAB'] ?> - <?php echo $value['NM_KAB'] ?></option>
				<?php endforeach; ?>
			</select>
			<?php
        }
	
         public function upkecamatan($idprov="",$idkab=""){
			//echo "select * from kecamatan where ID_KAB = '$idkab' and ID_PROP = '$idprov'";
			$query = $this->db->query("select * from kecamatan where ID_KAB = '$idkab' and ID_PROP = '$idprov'");
			$rows = $query->result_array();
			$this->data['keca']=$rows;
			
			?>
			<select name="upkodekecamatan" id="upkodekecamatan" onchange="autokec()">
				<option> - Silakan Pilih Kecamatan - </option>
				<?php foreach($rows as $value): ?>
				<option value="<?php echo $value['ID_KEC'] ?>"><?php echo $value['ID_KEC'] ?> - <?php echo $value['NM_KEC'] ?></option>
				<?php endforeach; ?>
			</select>
			<?php
                
        }
        
        public function upkabupaten($idprov=""){
			$query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
			$rows = $query->result_array();
			$this->data['upkabu']=$rows;
			//var_dump($rows);
			
			?>
			<select name="upkodekabupaten" id="upkodekabupaten"  onchange="upkecamatan(this.value),autokab()">
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
//                $this->upkabupaten();
		
			$this->data['status_addkelurahan'] = "0"; // default
			
			if (isset($_POST['status_addkelurahan'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert kelurahan set ID_PROP=?, ID_KAB=?,ID_KEC=?,ID_KEL=?,NM_KEL=?',
					array($_POST['kodepropinsi'], $_POST['kodekabupaten'],$_POST['kodekecamatan'], 
                                            $_POST['kodekelurahan'], $_POST['namakelurahan']));
		
				$this->data['status_addkelurahan'] = "1"; // sukses
                   //$this->get_arr_kel2();
                   $this->get_arr_kel();
			}
			
			if ($this->data['status_addkelurahan'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_upkelurahan'] = "0"; // default
			
			if (isset($_POST['status_upkelurahan'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update kelurahan set ID_PROP=?,ID_KAB=?,ID_KEC=?,NM_KEL=? where ID_KEL=?',
					array($_POST['upkodepropinsi'], $_POST['upkodekab'], $_POST['upkodekec'],
                                              $_POST['upnamakelurahan'],$_POST['upkodekelurahan']));
		
				$this->data['status_upkelurahan'] = "1"; // sukses
                    //$this->get_arr_kel2();
                    $this->get_arr_kel();
			}
			
			if ($this->data['status_upkelurahan'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodekelurahan'] = isset($_POST['kodekelurahan']) ? $_POST['kodekelurahan'] : "";
			$this->data['kelurahan'] = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : "";
			$this->data['korwil'] = isset($_POST['korwil']) ? $_POST['korwil'] : "";
			$this->data['upkodekelurahan'] = isset($_POST['upkodekelurahan']) ? $_POST['upkodekelurahan'] : "";
			$this->data['upkelurahan'] = isset($_POST['upkelurahan']) ? $_POST['upkelurahan'] : "";
			$this->data['upkorwil'] = isset($_POST['upkorwil']) ? $_POST['upkorwil'] : "";

        	if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 9)) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('kelurahan', $this->data, true);
			}

		//$this->data['area_body'] = $this->load->view('kelurahan', $this->data, true);
		$this->data['judul'] = 'Form Master Data kelurahan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file kelurahan.php */
/* Location: ./application/controllers/kelurahan.php */