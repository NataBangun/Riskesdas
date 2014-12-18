<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class frmbox extends main {

	var $data;
	var $datahome;
	
        public function del($id=""){
            $this->db->query('delete from k_box where id_box=?', array($id));
            
            echo"<script>location.href='{$this->data['application_path']}/frmbox';</script>";
        }
        
        public function get_arr_revcojenis(){
            $query = $this->db->query("SELECT * FROM k_revco_jenis");
            $rows = $query->result_array();
            $this->data['arr_revcojenis']=$rows;
        }
        
        public function get_arr_spesimen(){
            $query = $this->db->query("SELECT * FROM spesimen");
            $rows = $query->result_array();
            $this->data['arr_spesimen']=$rows;
        }
        
        public function get_arr_typebox(){
            $query = $this->db->query("SELECT * FROM typebox");
            $rows = $query->result_array();
            $this->data['arr_typebox']=$rows;
        }
        
        public function get_arr_box(){
             $query = $this->db->query("SELECT * FROM k_box inner join typebox 
                                        on typebox.typebox_id=k_box.typebox_id
                                        inner join penelitian on 
                                        penelitian.penelitian_kode=substr(k_box.no_box,1,2)");             
            $rows = $query->result_array();
            $this->data['arr_box']=$rows;
        }
        
        public function get_arr_revco(){
                $query = $this->db->query('SELECT * FROM k_revco');
		$rows = $query->result_array();				
		$this->data['arr_revco'] = $rows;
        }
        
        public function get_kapasitas($id_revco){
            $query = $this->db->query("SELECT kapasitas_rak FROM k_revco WHERE id_revco = $id_revco");
            $rows = $query->result_array();
            $a = $rows[0]['kapasitas_rak'];
            
            echo"<option value=''> - Pilih No Rack - </option>";
            for($i=1;$i<=$a;$i++){
		echo "	<option value='$i'> $i</option>";
            }
        }
        
        
        public function cek_kode($kode){
                $query = $this->db->query("SELECT * FROM k_box WHERE no_box = $kode");
                if($query){
                    return true;
                }else{
                    return false;
                }
        }
        
        public function kabupaten($idprov=""){
                $query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
                $rows = $query->result_array();
                
                //var_dump($rows);
                
                ?>
                <select name="Kab" id="Kab" class='chosen-select span3' onchange="nobox()">
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
		$this->get_arr_revcojenis();
		$this->get_arr_box();
		$this->get_arr_revco();
		$this->get_arr_spesimen();
		$this->get_arr_typebox();
		$this->get_arr_penelitian();
		
		
			$this->data['status_addbox'] = "0"; // default
			
			if (isset($_POST['status_addbox'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert k_box set no_box=?, typebox_id =?, no_rak=?, id_revco=?',
					array($_POST['NoBox'],$_POST['typebox'], $_POST['NoRak'], $_POST['IdRevco']));
		
				$this->data['status_addbox'] = "1"; // sukses
                                $this->get_arr_box();
			}
			
			if ($this->data['status_addbox'] == "1") {
				unset($_POST);
			}
                        
                        
                        $this->data['status_upbox'] = "0"; // default
			
			if (isset($_POST['status_upbox'])) {
				// 1. update Data
				// var_dump($this->db);
                            
//                            echo "$_POST[upNoBox],$_POST[uptypebox], $_POST[upNoRak], $_POST[upIdRevco], $_POST[id_box]";
                            
				$this->db->query('update k_box set no_box=?, typebox_id=?, no_rak=?,id_revco=? where id_box=?',
					array($_POST['upNoBox'],$_POST['uptypebox'], $_POST['nomorRak'], $_POST['upIdRevco'], $_POST['id_box']));
		
				$this->data['status_upbox'] = "1"; // sukses
				
				$this->get_arr_box();
				
			}
			
			if ($this->data['status_upbox'] == "1") {
				unset($_POST);
			}
			

			$this->data['NoBox'] = isset($_POST['NoBox']) ? $_POST['NoBox'] : "";
			
			
			
        	if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 9)) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('frmbox', $this->data, true);
			}
		//$this->data['area_body'] = $this->load->view('frmbox', $this->data, true);
		$this->data['judul'] = 'Form Box';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */