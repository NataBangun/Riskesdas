<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class view_exportspes extends main {

	var $data;
	var $datahome;
	
	public function index($Id="")
	{	
		
		$tgl1 = str_replace('/', '', $_POST['tglawal']);
		$tgl2 = str_replace('/', '', $_POST['tglakhir']);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=laporan_spesimen_'.$tgl1.'_'.$tgl2.'.xls');
		// header('Content-Disposition: attachment; filename=laporan_kimia_klinis.xls');
	
		parent::index();
		
		// $awal = str_replace("/", "-", $this->input->post('tglawal'));
		// $akhir = str_replace("/", "-", $this->input->post('tglakhir'));
		// $prop = $this->input->post('Propinsi');
		$Spesimen = $this->input->post('JenisSpesimen');
		// $penelitian = $this->input->post('penelitian');
		$tgl1 = $this->input->post('tglawal');
		// $tgl1 = str_replace('/', '', $this->input->post('tglawal'));
		// $tgl2 = str_replace('/', '', $this->input->post('tglakhir'));
		$tgl2 = $this->input->post('tglakhir');
		$this->session->set_userdata('Spesimen',$Spesimen);
		$this->session->set_userdata('tgl1',$tgl1);
		$this->session->set_userdata('tgl2',$tgl2);
		
		// var_dump($this->db);
		// t1.*, t2.*, t3.*, t4.* 
		// $query = $this->db->query("SELECT * FROM formhasil WHERE STR_TO_DATE(TGL_periksa, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND kode_lab='{$this->input->post('lab')}' AND kode_penelitian='{$this->input->post('penelitian')}' AND propinsi_id='{$this->input->post('Propinsi')}' ORDER BY no_stiker ASC");
		// $query = $this->db->query("SELECT * FROM formpenerimaan
									// inner join propinsi on propinsi.ID_PROP = formpenerimaan.propinsi_id
									// inner join kabupaten on kabupaten.ID_KAB = formpenerimaan.kabupaten_id AND kabupaten on kabupaten.ID_PROP = formpenerimaan.propinsi_id
									// inner join kecamatan on kecamatan.ID_KEC = formpenerimaan.kecamatan_id AND join kecamatan on kecamatan.ID_KAB = formpenerimaan.kabupaten_id AND kecamatan on kecamatan.ID_PROP = formpenerimaan.propinsi_id
									// inner join kelurahan on kelurahan.ID_KEL = formpenerimaan.kelurahan_id AND kelurahan on kelurahan.ID_KEC = formpenerimaan.kecamatan_id AND kelurahan on kelurahan.ID_KAB = formpenerimaan.kabupaten_id AND kelurahan on kelurahan.ID_PROP = formpenerimaan.propinsi_id
									// WHERE STR_TO_DATE(formpenerimaan.tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND formpenerimaan.propinsi_id='{$this->input->post('Propinsi')}' ORDER BY formpenerimaan.no_stiker ASC");
		$query = $this->db->query("SELECT * FROM formpenerimaan 
								inner join spesimen on spesimen.spesimen_kode = formpenerimaan.spesimen_kode
								inner join laboraturium on laboraturium.LAB_CODE = formpenerimaan.LAB_CODE
								inner join kondisispesimen on kondisispesimen.kondisispesimen_id = formpenerimaan.kondisispesimen_id
								WHERE STR_TO_DATE(formpenerimaan.tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND formpenerimaan.spesimen_kode='{$this->input->post('JenisSpesimen')}' ORDER BY formpenerimaan.no_stiker ASC");
		$rows = $query->result_array();
		// var_dump($rows);
		$this->data['view_exportspes'] = $rows;

		$query2 = $this->db->query("SELECT * FROM spesimen WHERE spesimen_kode LIKE '%{$this->input->post('JenisSpesimen')}%' ");
		$rows2 = $query2->result_array();
		// var_dump($rows);
		$this->data['spes'] = $rows2;

		$this->data['area_body'] = $this->load->view('view_exportspes', $this->data, true);
		$this->data['judul'] = 'Form Export Kimia Klinis';
		$this->load->view('view_exportspes', $this->data);
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */