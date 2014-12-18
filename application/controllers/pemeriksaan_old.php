<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class pemeriksaan extends main {
        
	var $data;
	var $datahome;
        
        
        public function get_arr_formpenerimaan($nobarcode)
	{	
		$query = $this->db->query("
        SELECT 
            tb6.institusi_name,
            tb1.namaART,
            tb1.umurART,
            tb1.alamatART,
            tb3.spesimen_name,
            tb4.kondisispesimen_name,
            tb1.tgl_ambil,
            tb1.tgl_terima,
            tb2.penelitian_name,
            tb5.LAB_NAME,
            tb7.simapanspesimen_name    
            
        FROM formpenerimaan tb1
        INNER JOIN penelitian tb2 ON tb1.penelitian_kode = tb2.penelitian_kode
        INNER JOIN spesimen tb3 ON tb1.spesimen_kode = tb3.spesimen_kode
        LEFT JOIN kondisispesimen tb4 ON tb1.kondisispesimen_id = tb4.kondisispesimen_id
        INNER JOIN laboraturium tb5 ON tb1.LAB_CODE = tb5.LAB_CODE
        INNER JOIN institusi tb6 ON tb1.institusi_kode = tb6.institusi_kode
        LEFT JOIN simapanspesimen tb7 ON tb1.simpanspesimen_id = tb7.simapanspesimen_id  
        WHERE no_barcode = '$nobarcode'");
       
		$rows = $query->result_array();
        		
		echo json_encode($rows);
        
	}
	
        public function get_arr_metode(){
                $query=  $this->db->query("select * from metode");
                $rows=  $query->result_array();
                $this->data['arr_metode']=$rows;
        }
        
        public function get_arr_penerimaan()
	{	
		$query = $this->db->query('SELECT * FROM formpenerimaan');
		$rows = $query->result_array();				
		$this->data['arr_penerimaan'] = $rows;
	}
        
	public function index()
	{	
		parent::index();             
                $this->get_arr_metode();
                $this->data['status_periksa'] = "0"; // default
			
			$this->data['status_periksa'] = "0"; // default
			$date = date('Y/m/d H:i:s');
            $labcode = $this->session->userdata('lab');
			if (isset($_POST['status_periksa'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query("INSERT formpemeriksaan SET 
                    no_barcode='$_POST[NoBarcode]',
                    tgl_pemeriksaan='$_POST[TGLperiksa]',
                    nm_petugas='$_POST[NmPetugas]',
                    id_metod='$_POST[MetodePenelitian]',
                    hasil='$_POST[Hasil]',
                    ket='$_POST[Ket]',
                    LAB_CODE = '$labcode',
                    date_input ='$date' 
                    ");
                    
				$this->data['status_periksa'] = "1"; // sukses
			}
			
			if ($this->data['status_periksa'] == "1") {
				unset($_POST);
			}

		
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('pemeriksaan', $this->data, true);
			}
			
		$this->data['judul'] = 'Form pemeriksaan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file penerimaan.php */
/* Location: ./application/controllers/penerimaan.php */