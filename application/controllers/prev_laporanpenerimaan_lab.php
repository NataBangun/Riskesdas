<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class prev_laporanpenerimaan_lab extends main {

	var $data;
	var $datahome;
	
	public function index($Id=""){	
		$lab =  $this->input->post('lab');
		$tgl1 = str_replace('/', '', $_POST['tglawal']);
		$tgl2 = str_replace('/', '', $_POST['tglakhir']);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=laporan_penerimaan_lab_'.$tgl1.'_'.$tg2.'.xls');
		// header('Content-Disposition: attachment; filename=laporan_kimia_klinis.xls');
	
		parent::index();
		
		// $awal = str_replace("/", "-", $this->input->post('tglawal'));
		// $akhir = str_replace("/", "-", $this->input->post('tglakhir'));
		// $prop = $this->input->post('Propinsi');
		// $lab = $this->input->post('lab');
		// $penelitian = $this->input->post('penelitian');
		// $tgl1 = $this->input->post('tglawal');
		// $tgl1 = str_replace('/', '', $this->input->post('tglawal'));
		// $tgl2 = str_replace('/', '', $this->input->post('tglakhir'));
		// $tgl2 = $this->input->post('tglakhir');
		
		// var_dump($this->db);
		// t1.*, t2.*, t3.*, t4.* 
		$query = $this->db->query("SELECT * FROM formpenerimaan WHERE STR_TO_DATE(tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND kode_lab='{$this->input->post('lab')}' ORDER BY no_stiker ASC");
		// $query = $this->db->query("SELECT * FROM formpenerimaan WHERE STR_TO_DATE(TGLDiterima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND kode_lab='{$this->input->post('lab')}' AND kode_penelitian='{$this->input->post('penelitian')}' AND propinsi_id='{$this->input->post('Propinsi')}' ORDER BY no_stiker ASC");
									
		$rows = $query->result_array();
		// var_dump($rows);
		$this->data['view_exportlab'] = $rows;

		$this->data['area_body'] = $this->load->view('prev_laporanpenerimaan_lab', $this->data, true);
		$this->data['judul'] = 'Form Export Laporan Penerimaan';
		$this->load->view('prev_laporanpenerimaan_lab', $this->data);
	}
}

/* End of file prev_laporanpenerimaan_lab.php */
/* Location: ./application/controllers/prev_laporanpenerimaan_lab.php */