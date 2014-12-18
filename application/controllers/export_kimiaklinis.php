<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class export_kimiaklinis extends main {

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
		parent::index();
		
		// var_dump($this->db);
		// $query = $this->db->query('SELECT t1.*, t2.*, t3.*, t4.* FROM bm04 t1 
									// left join bm02 t2 on t1.no_stiker=t2.noStiker 
									// left join formhasil t3 on t2.noStiker=t3.no_stiker 
									// left join formmalaria t4 on t3.no_stiker=t4.no_stiker 
									// WHERE t1.propinsi_id=? ORDER BY t1.no_stiker ASC', array ($Id));
		// $rows = $query->result_array();
		// $this->data['view_export'] = $rows;
		
		
			if ( ($this->data['level'] == "" or $this->data['welcome'] == "" ) or !($this->data['level'] == 3)) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('export_kimiaklinis', $this->data, true);
			}
			
		$this->data['judul'] = 'Form Export Kimia Klinis';
		$this->load->view('layout', $this->data);
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */