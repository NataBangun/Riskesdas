<?php if(!defined(‘BASEPATH’)) exit(‘Akses langsung tidak diperbolehkan’);

class Sample_form extends Controller {
	function Sample_form(){
	// fungsi constructor
	parent::Controller();
	
	}
	
	function index(){
		// fungsi pada waktu class ini diload

		$this->load->helper(‘url’);
		$this->load->view(‘sample_form_view’);
	}
	
	function ambil_kota(){
		// fungsi untuk mengambil nama-nama kota berdasarkan id provinsi yang diambil dari data POST
		$res = $this->db->query("SELECT * FROM tabel_kota WHERE id_prov = '" . $this->input->post(‘id_prov’) . "'");

		// masukan id_kota dan nama_kota yang dipilih oleh user ke dalam array $hasil[i]
		$i=0;
		foreach ($res->result_array() as $rows) {
			$hasil[$i]['id_kota'] = $rows['id'];
			$hasil[$i]['nama_kota'] = $rows['nama'];
			$i++;
		}
		$this->output->set_output(json_encode($hasil));
	}

}