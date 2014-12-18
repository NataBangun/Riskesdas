<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_box extends main {

	var $data;
	var $datahome;
	
        public function get_arr_revcojenis(){
            $query = $this->db->query("SELECT * FROM k_revco_jenis");
            $rows = $query->result_array();
            $this->data['arr_revcojenis']=$rows;
        }
        
        public function cek_kode($kode){
			$query=  $this->db->query("select * from k_box where no_box='$kode'");
			if($query){
				return true;
			}else{
				return false;
			}   
        }
       
        public function kabupaten($idprov=""){
                $query=$this->db->query("select * from kabupaten where ID_PROP='$idprov'");
                $rows=$query->result_array();
                $this->data['combo_kab']=$rows;
                
                ?>
                <select name="Kab" id="Kab" onchange="nobox();">
                    <option> - Silakan Pilih Kabupaten -</option>
                    <?php foreach($rows as $value):?>
                    <option value="<?php echo $value['ID_KAB']?>"><?php echo $value['ID_KAB']?> - <?php echo $value['NM_KAB']?></option>
                    <?php endforeach; ?>
                </select>
                <?php
        }
		
        public function get_arr_box(){
             $query = $this->db->query("SELECT * FROM k_box inner join typebox 
                                        on typebox.typebox_id=substr(k_box.no_box,7,1)
                                        inner join penelitian on 
                                        penelitian.penelitian_kode=substr(k_box.no_box,1,2)");
//             							  $query = $this->db->query("SELECT * FROM k_box inner join typebox 
//                                        on typebox.typebox_id=substr(k_box.no_box,7,1)
//                                        inner join penelitian on 
//                                        penelitian.penelitian_kode=substr(k_box.no_box,1,2)
//                                        inner join propinsi on
//                                        propinsi.ID_PROP=substr(k_box.no_box,3,2)
//                                        inner join kabupaten on
//                                        kabupaten.ID_KAB=substr(k_box.no_box,5,2)");
             
             
                         $rows = $query->result_array();
            $this->data['arr_box']=$rows;
        }
        
        public function del($id=""){
            $this->db->query('delete from k_box where id_box=?', array($id));
            
            echo"<script>location.href='{$this->data['application_path']}/list_box';</script>";
        }
		
	public function index()
	{	
		parent::index();
                $this->get_arr_revcojenis();
                $this->get_arr_box();
//		$this->kabupaten($idprov="");
                
			$this->data['status_box'] = "0"; // default
			
			if (isset($_POST['status_box'])) {
				// 1. update Data
				// var_dump($this->db);
				$this->db->query('update k_box set no_box=?, typebox_id=? where id_box=?',
					array($_POST['hNoBox'], $_POST['TypeBox'], $_POST['id_box']));
		
				$this->data['status_box'] = "1"; // sukses
				
				$this->get_arr_box();
				
			}
			
			if ($this->data['status_box'] == "1") {
				unset($_POST);
			}

			$this->data['id_box'] = isset($_POST['id_box']) ? $_POST['id_box'] : "";
			$this->data['hNoBox'] = isset($_POST['hNoBox']) ? $_POST['hNobox'] : "";
			$this->data['TypeBox'] = isset($_POST['TypeBox']) ? $_POST['TypeBox'] : "";

			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_box', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
		$this->data['judul'] = 'Form List box';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

