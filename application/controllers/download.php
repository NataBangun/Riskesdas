<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class download extends main {

// class download extends Controller {
public function download() {
parent::__construct();
// $this->load->model('tes1');//load the model
// $this->load->library('pagination');
}

	//function to get the data from tb_book
	function getBuku() {
	$data['title'] = 'menampilkan isi buku';
	$data['detail'] = $this->tes1->getBuku();//call the model and save the result in $detail
	$this->load->view('buku_view', $data);
	}
	
	//function to export to excel
	// function toExcelAll() {
		// $query['data1'] = $this->tes1->ToExcelAll();
		// $this->load->view('excelview',$query);
	// }
	
	
	// function export_to_csv(){
	function export_to_csv($id = ""){
		$this->data['idProv'] = $id;
		
		$i=0;
		$data = array();
		// $list = $this->db->query('SELECT * FROM propinsi WHERE KORWIL = 1 ORDER BY ID_PROP ASC'); //contoh query
		// $data[0] = array("No.", "ID Prop", "Nama Propinsi",  "Korwil");
		$list = $this->db->query('SELECT * FROM bm04 WHERE propinsi_id = ? ORDER BY no_stiker ASC', array($this->data['idProv'])); //contoh query
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

}
?>