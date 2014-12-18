<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_revco extends main {

	var $data;
	var $datahome;
	
        public function get_arr_revcojenis(){
            $query = $this->db->query("SELECT * FROM k_revco_jenis");
            $rows = $query->result_array();
            $this->data['arr_revcojenis']=$rows;
        }
        
//        public function get_arr_revco(){
//            $query = $this->db->query("SELECT * FROM k_revco");
//            $rows = $query->result_array();
//            $this->data['arr_revco']=$rows;
//        }
        public function get_arr_revco(){
//            $query = $this->db->query("SELECT * FROM k_revco,laboraturium,k_revco_jenis where
//                                      laboraturium.LAB_CODE=substr(k_revco.no_revco,1,2) and
//                                      k_revco_jenis.no_revco_jenis=substr(k_revco.no_revco,4,1)");
             $query = $this->db->query("SELECT * FROM k_revco inner join laboraturium 
                                        on laboraturium.LAB_CODE=substr(k_revco.no_revco,1,2)
                                        inner join k_revco_jenis on 
                                        k_revco_jenis.no_revco_jenis=substr(k_revco.no_revco,5,1)");
            $rows = $query->result_array();
            $this->data['arr_revco']=$rows;
        }
        
        public function del($id=""){
            $this->db->query('delete from k_revco where id_revco=?', array($id));
            
            echo"<script>location.href='{$this->data['application_path']}/list_revco';</script>";
        }
		
	public function index()
	{	
		parent::index();
                $this->get_arr_revcojenis();
                $this->get_arr_revco();
		
			$this->data['status_revco'] = "0"; // default
			
			if (isset($_POST['status_revco'])) {
				// 1. update Data
				// var_dump($this->db);
				$this->db->query('update k_revco set no_revco=?, kapasitas_rak=? where id_revco=?',
					array($_POST['hNoRevco'], $_POST['kapasitas_rak'], $_POST['id_revco']));
		
				$this->data['status_revco'] = "1"; // sukses
				
				$this->get_arr_revco();
				
			}
			
			if ($this->data['status_revco'] == "1") {
				unset($_POST);
			}

			$this->data['id_revco'] = isset($_POST['id_revco']) ? $_POST['id_revco'] : "";
			$this->data['hNoRevco'] = isset($_POST['hNoRevco']) ? $_POST['hNoRevco'] : "";
			$this->data['kapasitas_rak'] = isset($_POST['kapasitas_rak']) ? $_POST['kapasitas_rak'] : "";

			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_revco', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
		$this->data['judul'] = 'Form List Revco';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
