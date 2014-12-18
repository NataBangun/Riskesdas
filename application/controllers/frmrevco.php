<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include("main.php");
class frmrevco extends main {
	var $data;
	var $datahome;

        public function get_arr_revcojenis(){
            $query = $this->db->query("SELECT * FROM k_revco_jenis");
            $rows = $query->result_array();
            $this->data['arr_revcojenis']=$rows;
        }        // public function get_arr_revcojenis(){            // $query = $this->db->query("SELECT * FROM k_revco_jenis");            // $rows = $query->result_array();            // $this->data['arr_revcojenis']=$rows;        // }                public function get_arr_revco(){//            $query = $this->db->query("SELECT * FROM k_revco,laboraturium,k_revco_jenis where//                                      laboraturium.LAB_CODE=substr(k_revco.no_revco,1,2) and//                                      k_revco_jenis.no_revco_jenis=substr(k_revco.no_revco,4,1)");             $query = $this->db->query("SELECT * FROM k_revco inner join laboraturium                                         on laboraturium.LAB_CODE=substr(k_revco.no_revco,1,2)                                        inner join k_revco_jenis on                                         k_revco_jenis.no_revco_jenis=substr(k_revco.no_revco,5,1)");            $rows = $query->result_array();            $this->data['arr_revco']=$rows;        }        
	
        public function get_arr_revco(){
             $query = $this->db->query("SELECT * FROM k_revco inner join laboraturium 
                                        on laboraturium.LAB_CODE=substr(k_revco.no_revco,1,2)
                                        inner join k_revco_jenis on 
                                        k_revco_jenis.no_revco_jenis=substr(k_revco.no_revco,5,1)");
            $rows = $query->result_array();
            $this->data['arr_revco']=$rows;
        }
        
        public function del($id=""){
            $this->db->query('delete from k_revco where id_revco=?', array($id));
            
            echo"<script>location.href='{$this->data['application_path']}/frmrevco';</script>";
        }
        
        public function index()
	{	
		parent::index();
		$this->get_arr_revcojenis(); 
                $this->get_arr_revco();
	
                    $this->data['status_addrevco'] = "0"; // default			
			if (isset($_POST['status_addrevco'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert k_revco set no_revco=?, kapasitas_rak=?',
					array($_POST['norevco'],$_POST['kapasitas']));
				$this->data['status_addrevco'] = "1"; // sukses
                                
                                $this->get_arr_revco();
                                
			}
			if ($this->data['status_addrevco'] == "1") {
				unset($_POST);
			}
                        
                        
                        $this->data['status_uprevco'] = "0"; // default
			
			if (isset($_POST['status_uprevco'])) {
				// 1. update Data
				// var_dump($this->db);
				$this->db->query('update k_revco set no_revco=?, kapasitas_rak=? where id_revco=?',
					array($_POST['hupnorevco'], $_POST['upkapasitas'], $_POST['id_revco']));
		
				$this->data['status_uprevco'] = "1"; // sukses
				
				$this->get_arr_revco();
				
			}
			
			if ($this->data['status_uprevco'] == "1") {
				unset($_POST);
			}
                        
			$this->data['NoRevco'] = isset($_POST['NoRevco']) ? $_POST['NoRevco'] : "";			
			$this->data['area_body'] = $this->load->view('frmrevco', $this->data, true);
                        $this->data['id_revco'] = isset($_POST['id_revco']) ? $_POST['id_revco'] : "";
			$this->data['hNoRevco'] = isset($_POST['hNoRevco']) ? $_POST['hNoRevco'] : "";
			$this->data['kapasitas_rak'] = isset($_POST['kapasitas_rak']) ? $_POST['kapasitas_rak'] : "";
                        
			$this->data['judul'] = 'Form Revco';
			$this->load->view('layout', $this->data);
	}
}

/* End of file frmrevco.php */
/* Location: ./application/controllers/frmrevco.php */