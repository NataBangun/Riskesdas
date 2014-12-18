<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class view_exportkimiaklinis extends main {

	var $data;
	var $datahome;
	
	// function export_to_csv(){
	function export_to_csv($id = ""){
		// $this->data['idProv'] = $id;
		
		$i=0;
		$data = array();
		
		// var_dump($this->db);
		$list = $this->db->query('SELECT * FROM bm04 WHERE propinsi_id = ? ORDER BY no_stiker ASC', array($id)); //contoh query
		$data[0] = array("No.", "No Stiker", "Prop", "Kab", "Kec", "Kel", "DK", "Kode Sampel", "No Bangun Sensus", "No Urut Sampel", "Nama lab", "Alamat Lab", "Nama Enumerator", "No Telp", "Nama ART", "No Urut ART", "Umur ART", "Jenis Kelamin", "Apakah Sedang Hamil", "Alamat ART", "Waktu Ambil Darah", "Kadar HB", "Waktu Pengambilan Kadar HB", "Tanggal Pengambilan Kadar HB", "Riwayat Diabet", "Minum Insulin", 
		"Puasa", "Terakhir Makan Pukul", "Pembebasan Glukosa", "2Jam Setelah Pembebasan Glukosa", "Kadar Glukosa Nilai", "Kadar Glukosa Pukul", "Kadar Glukosa Tgl", "Kadar Glukosa Nilai2", "Kadar Glukosa Pukul2", "Kadar Glukosa Tgl2", "Kadar Glukosa Nilai3", "Kadar Glukosa Pukul3", "Kadar Glukosa Tgl3", "Tgl Enumerator", "Tgl Pendamping", "Nama Ketua Enumerator", "Nama Pendamping");
		 
		foreach ($list->result() as $row) {     
			// $data[++$i] = array($i, $row->ID_PROP, $row->NAMA_PROP, $row->KORWIL, );
			$data[++$i] = array($i, $row->no_stiker, $row->propinsi_id, $row->kabupaten_id, $row->kecamatan_id, $row->kelurahan_id, $row->DK, $row->kode_sampel, $row->no_bangun_sensus, $row->no_urut_sampel, $row->nama_lab, $row->alamat_lab, $row->nama_enumerator, $row->no_telp, $row->nama_ART, $row->no_urutART, $row->umurART, $row->JK, $row->tanya1, $row->alamatART, $row->time_ambil_darah, $row->kadarHB_nilai, $row->kadarHB_waktu,
					$row->kadarHB_tgl, $row->riwayat_diabet, $row->minum_insulin, $row->puasa, $row->time_akhir_makan, $row->time_pembebanan_glukosa, $row->time_2jam_glukosa, $row->kadar_glukosa1_nilai, $row->kadar_glukosa1_waktu, $row->kadar_glukosa1_tgl, $row->kadar_glukosa2_nilai, $row->kadar_glukosa2_waktu, $row->kadar_glukosa2_tgl, $row->kadar_glukosa3_nilai, $row->kadar_glukosa3_waktu, $row->kadar_glukosa3_tgl, $row->tgl_enumerator, $row->tgl_pendamping, $row->nama_ketua_enumerator, $row->nama_pendamping,);
		}
		$this->load->helper('csv');
		echo array_to_csv($data,'report.xls');                 
		die();
	}
	
	public function index($Id="")
	{	
		
		$tgl1 = str_replace('/', '', $_POST['tglawal']);
		$tgl2 = str_replace('/', '', $_POST['tglakhir']);

		header('Content-type: application/vnd.ms-excel');
		// header('Content-Disposition: attachment; filename=laporan_kimia_klinis_'.$tgl1.'_'.$tg2.'.xls');
		header('Content-Disposition: attachment; filename=laporan_kimia_klinis.xls');
	
		parent::index();
		
		// $awal = str_replace("/", "-", $this->input->post('tglawal'));
		// $akhir = str_replace("/", "-", $this->input->post('tglakhir'));
		$prop = $this->input->post('Propinsi');
		$lab = $this->input->post('lab');
		$penelitian = $this->input->post('penelitian');
		// $tgl1 = $this->input->post('tglawal');
		// $tgl1 = str_replace('/', '', $this->input->post('tglawal'));
		// $tgl2 = str_replace('/', '', $this->input->post('tglakhir'));
		// $tgl2 = $this->input->post('tglakhir');
		
		// var_dump($this->db);
		// t1.*, t2.*, t3.*, t4.* 
		$query = $this->db->query("SELECT * FROM formhasil WHERE STR_TO_DATE(TGL_periksa, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND kode_lab='{$this->input->post('lab')}' AND kode_penelitian='{$this->input->post('penelitian')}' AND propinsi_id='{$this->input->post('Propinsi')}' ORDER BY no_stiker ASC");
		
		// SELECT * FROM formhasil WHERE TGL_periksa BETWEEN '%{$this->input->post('tglawal')}%' and '%{$this->input->post('tglakhir')}%' AND propinsi_id='%{$this->input->post('Propinsi')}%' ORDER BY no_stiker ASC
									// ,
									// array ($tgl1,$tgl2,$prop));
									
		$rows = $query->result_array();
		// var_dump($rows);
		$this->data['view_export'] = $rows;

		$this->data['area_body'] = $this->load->view('view_exportkimiaklinis', $this->data, true);
		$this->data['judul'] = 'Form Export Kimia Klinis';
		$this->load->view('view_exportkimiaklinis', $this->data);
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */