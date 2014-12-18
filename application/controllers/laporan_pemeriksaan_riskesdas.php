<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class laporan_pemeriksaan_riskesdas extends main {

	var $data;
	var $datahome;
	
	public function get_arr_penelitian()
	{	
		$query = $this->db->query("SELECT * FROM penelitian where penelitian_kode = '{$this->data['penelitian']}'");
		$rows = $query->result_array();				
		$this->data['arr_penelitian'] = $rows[0]['penelitian_kode'];
	}

	public function get_arr_spesimen()
	{	
		$query = $this->db->query('SELECT * FROM spesimen');
		$rows = $query->result_array();				
		$this->data['arr_spesimen'] = $rows;
	}
	public function get_arr_revcojenis(){
		$query = $this->db->query("SELECT * FROM k_revco_jenis");
		$rows = $query->result_array();
		$this->data['arr_revcojenis']=$rows;

	}
	public function get_arr_kondisispesimen()
	{	
		$query = $this->db->query('SELECT * FROM kondisispesimen');
		$rows = $query->result_array();				
		$this->data['arr_kondisispesimen'] = $rows;
	}
	
	public function index()
	{	
		parent::index();
		$this->session->set_userdata('laporan_pemeriksaan_riskesdas', $_POST);
		$this->get_arr_penelitian();
		$this->get_arr_kondisispesimen();
		
			$this->data['status_addpenelitian'] = "0"; // default
			
			if (isset($_POST['status_addpenelitian'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert penelitian set penelitian_name=?, penelitian_kode=? ',
					array($_POST['penelitian'], $_POST['kodepenelitian']));
		
				$this->data['status_addpenelitian'] = "1"; // sukses
				$this->get_arr_penelitian();
			}
			
			if ($this->data['status_addpenelitian'] == "1") {
				unset($_POST);
			}
			
			$this->data['status_uppenelitian'] = "0"; // default
			
			if (isset($_POST['status_uppenelitian'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('update penelitian set penelitian_name=?, penelitian_kode=? where penelitian_id=?',
					array($_POST['uppenelitian'], $_POST['upkodepenelitian'], $_POST['penelitian_id']));
		
				$this->data['status_uppenelitian'] = "1"; // sukses
				$this->get_arr_penelitian();
			}
			
			if ($this->data['status_uppenelitian'] == "1") {
				unset($_POST);
			}
			

			$this->data['kodepenelitian'] = isset($_POST['kodepenelitian']) ? $_POST['kodepenelitian'] : "";
			$this->data['penelitian'] = isset($_POST['penelitian']) ? $_POST['penelitian'] : "";
			$this->data['upkodepenelitian'] = isset($_POST['upkodepenelitian']) ? $_POST['upkodepenelitian'] : "";
			$this->data['uppenelitian'] = isset($_POST['uppenelitian']) ? $_POST['uppenelitian'] : "";
			$this->data['penelitian_id'] = isset($_POST['penelitian_id']) ? $_POST['penelitian_id'] : "";

		$this->data['area_body'] = $this->load->view('laporan_pemeriksaan_riskesdas', $this->data, true);
		$this->data['judul'] = 'Form Laporan Penerimaan';
		$this->load->view('layout', $this->data);
	}
	
        public function print_form($form){
            
            
		$field['lab'] = 'LAB_CODE'; // 1
		$field['Propinsi'] = 'propinsi_id'; // 51
		$field['tglawal'] = 'tgl_enumerator'; // 07/05/2013
		$field['tglakhir'] = 'tgl_enumerator'; // 07/05/2013
		
		foreach($field as $k=>$v) {
			if ($_POST[$k] == "0") {
				$_POST[$k] = "";
			}
		}
//		var_dump($_POST);
		$sql_where = array();
		if (isset($_POST['Propinsi']) && is_numeric($_POST['Propinsi']) && $_POST['Propinsi'] > 0) {
			$sql_where[] = "{$field['Propinsi']} = '{$_POST['Propinsi']}'";
		}
		if (isset($_POST['tglawal']) && $_POST['tglawal'] != "") {
			$sql_where[] = "STR_TO_DATE({$field['tglawal']}, '%d/%m/%Y') >= STR_TO_DATE('{$_POST['tglawal']}', '%d/%m/%Y')";
		}
		if (isset($_POST['tglakhir']) && $_POST['tglakhir'] != "") {
			$sql_where[] = "STR_TO_DATE({$field['tglakhir']}, '%d/%m/%Y') <= STR_TO_DATE('{$_POST['tglakhir']}', '%d/%m/%Y')";
		}
		
		if($form=='bm02'){
                    $sql = "SELECT * FROM bm02 ";
                    $tampil = 'tampil_bm02';
                }else if($form=='bm04'){
                    $sql = "SELECT * FROM bm04 ";
                    $tampil = 'tampil_bm04';
                }
		
		if (count($sql_where) > 0) {
			$sql_where = implode(" AND ", $sql_where);
			$sql = $sql . " WHERE " . $sql_where;
		}
		
                if($_GET['p']==1){
                    $data['excel']=1;
                }else{
                    $data['excel']=0;
                }
//		 echo $sql;
			
		$query = $this->db->query($sql);
		$data['arr'] = $query->result_array();				
		
                $this->load->view($tampil,$data);
                
                
            }
        
	public function get_arr_laporanpenerimaan()
	{			
		// $sql = " SELECT * FROM formhasil where kode_lab LIKE '%{$this->data['lab']}%' 
			// AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
		$session = $this->session->userdata('laporan_penerimaan');
		
		$field['lab'] = 'LAB_CODE'; // 1
		$field['Propinsi'] = 'propinsi_id'; // 51
		$field['Penelitian'] = 'penelitian_kode'; // R1
		$field['JenisSpesimen'] = 'spesimen_kode'; // R
		$field['KondisiSpesimen'] = 'kondisispesimen_id'; // 1
		$field['tglawal'] = 'tgl_terima'; // 07/05/2013
		$field['tglakhir'] = 'tgl_terima'; // 07/05/2013
		
		foreach($field as $k=>$v) {
			if ($session[$k] == "0") {
				$session[$k] = "";
			}
		}
		
		$sql_where = array();
		if (isset($session['lab']) && is_numeric($session['lab']) && $session['lab'] > 0) {
			$sql_where[] = "{$field['lab']} = '{$session['lab']}'";
		}
		if (isset($session['Propinsi']) && is_numeric($session['Propinsi']) && $session['Propinsi'] > 0) {
			$sql_where[] = "{$field['Propinsi']} = '{$session['Propinsi']}'";
		}
		if (isset($session['Penelitian']) && $session['Penelitian'] != "") {
			$sql_where[] = "{$field['Penelitian']} = '{$session['Penelitian']}'";
		}
		if (isset($session['JenisSpesimen']) && $session['JenisSpesimen'] != "") {
			$sql_where[] = "{$field['JenisSpesimen']} = '{$session['JenisSpesimen']}'";
		}
		if (isset($session['KondisiSpesimen']) && is_numeric($session['KondisiSpesimen']) && $session['KondisiSpesimen'] > 0) {
			$sql_where[] = "{$field['KondisiSpesimen']} = '{$session['KondisiSpesimen']}'";
		}
		if (isset($session['tglawal']) && $session['tglawal'] != "") {
			$sql_where[] = "STR_TO_DATE({$field['tglawal']}, '%d/%m/%Y') >= STR_TO_DATE('{$session['tglawal']}', '%d/%m/%Y')";
		}
		if (isset($session['tglakhir']) && $session['tglakhir'] != "") {
			$sql_where[] = "STR_TO_DATE({$field['tglakhir']}, '%d/%m/%Y') <= STR_TO_DATE('{$session['tglakhir']}', '%d/%m/%Y')";
		}
		
		$sql = "SELECT * FROM v_formpenerimaan ";
		
		if (count($sql_where) > 0) {
			$sql_where = implode(" AND ", $sql_where);
			$sql = $sql . " WHERE " . $sql_where;
		}
		
		// echo $sql;
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_formpenerimaan'] = $rows;
		
	}
	
        
	public function tampilkan()
	{
		parent::index();
		if (isset($_POST['submit'])) {
			$this->session->set_userdata('laporan_pemeriksaan_riskesdas', $_POST);
		}
		$this->get_arr_laporanpenerimaan();
		// print_r($_POST);
		$this->data['area_body'] = $this->load->view('laporan_pemeriksaan_riskesdas', $this->data, true);
		$this->data['judul'] = 'Form Laporan Penerimaan';
		$this->load->view('layout', $this->data);
		// print_r($this->session->userdata('laporan_penerimaan'));
	}
}

/* End of file penelitian.php */
/* Location: ./application/controllers/penelitian.php */