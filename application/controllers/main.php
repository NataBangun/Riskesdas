<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->data = array();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		$this->data['user_id'] = $this->session->userdata('user_id');
		$this->data['welcome'] = $this->session->userdata('user');
		$this->data['level'] = $this->session->userdata('level');
		$this->data['penelitian'] = $this->session->userdata('penelitian');
		$this->data['lab'] = $this->session->userdata('lab');
		
		$this->load->database();
		$this->get_arr_prov();	
		$this->get_arr_level();
		$this->get_arr_prop();
		$this->get_arr_kab();
		$this->get_arr_kec();
		$this->get_arr_kel();
		$this->get_arr_user();
		$this->get_arr_lab();
		$this->get_arr_manuser();
		$this->get_arr_userups();
		
		// $this->get_arr_bm02();
		// $this->get_arr_bm04();
		// $this->get_arr_kimiaklinis();
		// $this->get_arr_malaria();
		// $this->get_arr_formpenerimaan();
		// $this->get_arr_institusi();
		// $this->get_arr_spesimen();
		// $this->get_arr_penelitian();
		// $this->get_arr_kondisispesimen();
		// $this->get_arr_site();
		// $this->get_arr_simapanspesimen();
		// $this->get_arr_typebox();
		// $this->get_arr_revco();
		// $this->get_arr_revcojenis();
		// $this->get_arr_box();
		
		
		$this->data['user_id'] = $this->session->userdata('user_id');
		$this->data['welcome'] = $this->session->userdata('user');
		$this->data['level'] = $this->session->userdata('level');
		$this->data['application_path'] = $this->config->item('application_path');
		
	}
	

	public function get_arr_box(){
		$query = $this->db->query("SELECT * FROM k_box inner join typebox 
									on typebox.typebox_id=substr(k_box.no_box,7,1)
									inner join penelitian on 
									penelitian.penelitian_kode=substr(k_box.no_box,1,2)");
		$rows = $query->result_array();
		$this->data['arr_box']=$rows;
	}
	
	public function get_arr_revcojenis(){
		$query = $this->db->query("SELECT * FROM k_revco_jenis");
		$rows = $query->result_array();
		$this->data['arr_revcojenis']=$rows;

	}
	
	public function get_arr_revco(){
		 $query = $this->db->query("SELECT * FROM k_revco inner join laboraturium 
									on laboraturium.LAB_CODE=substr(k_revco.no_revco,1,2)
									inner join k_revco_jenis on 
									k_revco_jenis.no_revco_jenis=substr(k_revco.no_revco,5,1)");
		$rows = $query->result_array();
		$this->data['arr_revco']=$rows;
	}        

	public function get_arr_user()
	{	
		$query = $this->db->query("SELECT * FROM t_suser WHERE user like '%{$this->data['welcome']}%' limit 1");
		$rows = $query->result_array();				
		$this->data['arr_user'] = $rows;
	}
	
	public function get_arr_typebox()
	{	
		$query = $this->db->query('SELECT * FROM typebox');
		$rows = $query->result_array();				
		$this->data['arr_typebox'] = $rows;
	}
	
	public function get_arr_site()
	{	
		$query = $this->db->query('SELECT * FROM site');
		$rows = $query->result_array();				
		$this->data['arr_site'] = $rows;
	}
	
	public function get_arr_kec()
	{	
		$query = $this->db->query('SELECT * FROM kecamatan');
		$rows = $query->result_array();				
		$this->data['arr_kec'] = $rows;
	}
	
	public function get_arr_kel()
	{	
		$query = $this->db->query('SELECT * FROM kelurahannew');
		$rows = $query->result_array();				
		$this->data['arr_kel'] = $rows;
	}
	
	public function get_arr_kab()
	{	
		$query = $this->db->query('SELECT * FROM kabupaten');
		$rows = $query->result_array();				
		$this->data['arr_kab'] = $rows;
	}
	
	public function get_arr_prop()
	{	
		$query = $this->db->query('SELECT * FROM propinsi');
		$rows = $query->result_array();				
		$this->data['arr_prop'] = $rows;
	}
	
	public function get_arr_simapanspesimen()
	{	
		$query = $this->db->query('SELECT * FROM simapanspesimen');
		$rows = $query->result_array();				
		$this->data['arr_simapanspesimen'] = $rows;
	}
	
	public function get_arr_kondisispesimen()
	{	
		$query = $this->db->query('SELECT * FROM kondisispesimen');
		$rows = $query->result_array();				
		$this->data['arr_kondisispesimen'] = $rows;
	}
	
	public function get_arr_spesimen()
	{	
		$query = $this->db->query('SELECT * FROM spesimen');
		$rows = $query->result_array();				
		$this->data['arr_spesimen'] = $rows;
	}
	
	public function get_arr_penelitian()
	{	
		$query = $this->db->query('SELECT * FROM penelitian');
		$rows = $query->result_array();				
		$this->data['arr_penelitian'] = $rows;
	}
	
	public function get_arr_institusi()
	{	
		$query = $this->db->query('SELECT * FROM institusi');
		$rows = $query->result_array();				
		$this->data['arr_institusi'] = $rows;
	}
	
	public function get_arr_bm02()
	{	
		$query = $this->db->query(" SELECT * FROM bm02 where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		$rows = $query->result_array();				
		$this->data['arr_bm02'] = $rows;
	}

	public function get_arr_bm04()
	{	
		$query = $this->db->query(" SELECT * FROM bm04 where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		$rows = $query->result_array();				
		$this->data['arr_bm04'] = $rows;
	}
	
	public function get_arr_kimiaklinis()
	{	
		$query = $this->db->query("SELECT * FROM formhasil where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		$rows = $query->result_array();				
		$this->data['arr_kimiaklinis'] = $rows;
	}
	
	public function get_arr_formpenerimaan()
	{	
		$query = $this->db->query('SELECT * FROM formpenerimaan');
		// $query = $this->db->query('SELECT distinct no_barcode,
									// formpenerimaan_id, propinsi_id, kabupaten_id, kecamatan_id, kelurahan_id, no_stiker, institusi_kode, penelitian_kode, namaART, umurART, JK, alamatART, spesimen_kode, kondisispesimen_id,
		// visit, suhudtg, volspesiment, jumspesimen, site_kode, simpanspesimen_id, tgl_kirim, nama_pengirim, tgl_ambil, tgl_terima, AWB, ket, jumaliquot
		// FROM formpenerimaan');
		$rows = $query->result_array();				
		$this->data['arr_formpenerimaan'] = $rows;
	}
	
	public function get_arr_malaria()
	{	
		$query = $this->db->query("SELECT * FROM formmalaria where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		$rows = $query->result_array();				
		$this->data['arr_malaria'] = $rows;
	}	
	
	public function get_arr_prov()
	{	
		$query = $this->db->query('SELECT * FROM propinsi');
		$rows = $query->result_array();				
		$this->data['arr_prov'] = $rows;
	}
	
	public function get_arr_level()
	{	
		$query = $this->db->query('SELECT * FROM level_user');
		$rows = $query->result_array();				
		$this->data['arr_level'] = $rows;
	}
	
    public function get_arr_lab()
	{	
		$query = $this->db->query('SELECT * FROM laboraturium');
		$rows = $query->result_array();				
		$this->data['arr_lab'] = $rows;
	}
	public function get_arr_manuser()
	{
			$query=  $this->db->query('SELECT * FROM t_suser,penelitian,level_user 
										WHERE t_suser.penelitian_id=penelitian.penelitian_kode 
										AND t_suser.lvl=level_user.level_user_id');
			$rows=$query->result_array();
			$this->data['arr_manuser']=$rows;
	}
	public function get_arr_userups()
	{
			$query=  $this->db->query('SELECT * FROM ups_user');
			$rows=$query->result_array();
			$this->data['arr_userups']=$rows;
	}
	
	public function index()
	{
	
		$this->data['area_sidebar'] = $this->load->view("sidebar", $this->data, true);
		$this->data['area_top'] = $this->load->view("top", $this->data, true);
		// $this->data['area_footer'] = $this->load->view("footer", $this->data, true);
		
		
		// $this->data['judul']="Home Aplikasi Monitoring ATM";
		// $this->load->view("home",$this->data);
		
	}
}