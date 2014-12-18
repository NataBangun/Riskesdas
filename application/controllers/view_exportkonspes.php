<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class view_exportkonspes extends main {

	var $data;
	var $datahome;
	
	public function index($Id="")
	{	
		
		// $tgl1 = str_replace('/', '', $_POST['tglawal']);
		// $tgl2 = str_replace('/', '', $_POST['tglakhir']);

		header('Content-type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment; filename=laporan_Kondisi_Spesimen_'.$tgl1.'_'.$tgl2.'.xls');
		header('Content-Disposition: attachment; filename=laporan_Kondisi_Spesimen.xls');
	
		parent::index();
		
		// $awal = str_replace("/", "-", $this->input->post('tglawal'));
		// $akhir = str_replace("/", "-", $this->input->post('tglakhir'));
		// $prop = $this->input->post('Propinsi');
		// $penelitian = $this->input->post('penelitian');
		// $tgl1 = str_replace('/', '', $this->input->post('tglawal'));
		// $tgl2 = str_replace('/', '', $this->input->post('tglakhir'));
		$KondisiSpesimen = $this->input->post('kondisispesimen');
		$tgl1 = $this->input->post('tglawal');
		$tgl2 = $this->input->post('tglakhir');
		$this->session->set_userdata('lab',$lab);
		$this->session->set_userdata('tgl1',$tgl1);
		$this->session->set_userdata('tgl2',$tgl2);
		
		// var_dump($this->db);
		// t1.*, t2.*, t3.*, t4.* 
		// $query = $this->db->query("SELECT * FROM formhasil WHERE STR_TO_DATE(TGL_periksa, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND kode_lab='{$this->input->post('lab')}' AND kode_penelitian='{$this->input->post('penelitian')}' AND propinsi_id='{$this->input->post('Propinsi')}' ORDER BY no_stiker ASC");
		// $query = $this->db->query("SELECT * FROM formpenerimaan WHERE STR_TO_DATE(tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND LAB_CODE='{$this->input->post('lab')}' ORDER BY no_stiker ASC");
		$query = $this->db->query("SELECT * FROM formpenerimaan
									inner join spesimen on spesimen.spesimen_kode = formpenerimaan.spesimen_kode
									inner join kondisispesimen on kondisispesimen.kondisispesimen_id = formpenerimaan.kondisispesimen_id
									WHERE STR_TO_DATE(formpenerimaan.tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND formpenerimaan.kondisispesimen_id='{$this->input->post('KondisiSpesimen')}' ORDER BY formpenerimaan.no_stiker ASC");
		$rows = $query->result_array();
		// var_dump($rows);
		$this->data['view_exportkonspes'] = $rows;
		
		$query3 = $this->db->query("SELECT * FROM kondisispesimen WHERE kondisispesimen_id ='{$this->input->post('kondisispesimen')}' ");
		$rows3 = $query3->result_array();
		// var_dump($rows);
		$this->data['konspes'] = $rows3;

		$this->data['area_body'] = $this->load->view('view_exportkonspes', $this->data, true);
		$this->data['judul'] = 'Form Export Kimia Klinis';
		$this->load->view('view_exportkonspes', $this->data);
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */