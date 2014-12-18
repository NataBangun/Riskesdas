<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class view_export extends main {

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
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=laporan.xls');
	
		parent::index();
		
		$prop = $this->input->post('Propinsi');
		$lab = $this->input->post('lab');
		$penelitian = $this->input->post('penelitian');
		// $tgl1 = $this->input->post('tglawal');
		// $tgl2 = $this->input->post('tglakhir');
		// var_dump($this->db);
		// t1.*, t2.*, t3.*, t4.* 
		$query = $this->db->query("SELECT 
											t1.no_stiker,
											t1.kode_lab,
											t1.kode_penelitian,
											t1.propinsi_id,
											t1.kabupaten_id,
											t1.kecamatan_id,
											t1.kelurahan_id,
											t1.DK,
											t1.kode_sampel,
											t1.no_bangun_sensus,
											t1.no_urut_sampel,
											t1.nama_lab,
											t1.alamat_lab,
											t1.nama_enumerator,
											t1.no_telp,
											t1.nama_ART,
											t1.no_urutART,
											t1.umurART,
											t1.JK,
											t1.tanya1,
											t1.alamatART,
											t1.time_ambil_darah,
											t1.kadarHB_nilai,
											t1.kadarHB_waktu,
											t1.kadarHB_tgl,
											t1.riwayat_diabet,
											t1.minum_insulin,
											t1.puasa,
											t1.time_akhir_makan,
											t1.time_pembebanan_glukosa,
											t1.time_2jam_glukosa,
											t1.kadar_glukosa1_nilai,
											t1.kadar_glukosa1_waktu,
											t1.kadar_glukosa1_tgl,
											t1.kadar_glukosa2_nilai,
											t1.kadar_glukosa2_waktu,
											t1.kadar_glukosa2_tgl,
											t1.kadar_glukosa3_nilai,
											t1.kadar_glukosa3_waktu,
											t1.kadar_glukosa3_tgl,
											t1.tgl_enumerator,
											t1.tgl_pendamping,
											t1.nama_ketua_enumerator,
											t1.nama_pendamping,
											t1.kode_lab,
											t1.kode_penelitian,
											t2.riwayat_sakit_berat,
											t2.tgl_ambildarah,
											t2.time_penetasan_buffer,
											t2.time_pembacaan_rdt,
											t2.hasil_rdt,
											t2.art_riwayat_panas,
											t2.duplo,
											t2.tgl_nakes,
											t2.nama_nakes,
											t3.TtlKolestrol,
											t3.HDLKolestrol,
											t3.LDLKolestrol,
											t3.Trigliserida,
											t3.Kreatinin,
											t3.pemeriksa,
											t4.pn_loka,
											t4.spesies_loka,
											t4.pn_pbtdk,
											t4.PF,
											t4.par_PF,
											t4.lemkos_PF,
											t4.densitas_PF,
											t4.PV,
											t4.par_PV,
											t4.lemkos_PV,
											t4.densitas_PV,
											t4.PO,
											t4.par_PO,
											t4.lemkos_PO,
											t4.densitas_PO,
											t4.PM,
											t4.par_PM,
											t4.lemkos_PM,
											t4.densitas_PM
									FROM bm04 t1 
									left join bm02 t2 on t1.no_stiker=t2.noStiker 
									left join formhasil t3 on t2.noStiker=t3.no_stiker 
									left join formmalarianew t4 on t3.no_stiker=t4.no_stiker 
									WHERE t1.propinsi_id=? AND t1.kode_lab=? AND t1.kode_penelitian=? ORDER BY t1.no_stiker ASC", array ($prop,$lab,$penelitian));
		$rows1 = $query->result_array();
		$query = $this->db->query("SELECT 
											t1.no_stiker,
											t1.kode_lab,
											t1.kode_penelitian,
											t1.propinsi_id,
											t1.kabupaten_id,
											t1.kecamatan_id,
											t1.kelurahan_id,
											t1.DK,
											t1.kode_sampel,
											t1.no_bangun_sensus,
											t1.no_urut_sampel,
											t1.nama_lab,
											t1.alamat_lab,
											t1.nama_enumerator,
											t1.no_telp,
											t1.nama_ART,
											t1.no_urutART,
											t1.umurART,
											t1.JK,
											t1.tanya1,
											t1.alamatART,
											t1.time_ambil_darah,
											t1.kadarHB_nilai,
											t1.kadarHB_waktu,
											t1.kadarHB_tgl,
											t1.riwayat_diabet,
											t1.minum_insulin,
											t1.puasa,
											t1.time_akhir_makan,
											t1.time_pembebanan_glukosa,
											t1.time_2jam_glukosa,
											t1.kadar_glukosa1_nilai,
											t1.kadar_glukosa1_waktu,
											t1.kadar_glukosa1_tgl,
											t1.kadar_glukosa2_nilai,
											t1.kadar_glukosa2_waktu,
											t1.kadar_glukosa2_tgl,
											t1.kadar_glukosa3_nilai,
											t1.kadar_glukosa3_waktu,
											t1.kadar_glukosa3_tgl,
											t1.tgl_enumerator,
											t1.tgl_pendamping,
											t1.nama_ketua_enumerator,
											t1.nama_pendamping,
											t1.kode_lab,
											t1.kode_penelitian,
											t2.riwayat_sakit_berat,
											t2.tgl_ambildarah,
											t2.time_penetasan_buffer,
											t2.time_pembacaan_rdt,
											t2.hasil_rdt,
											t2.art_riwayat_panas,
											t2.duplo,
											t2.tgl_nakes,
											t2.nama_nakes,
											t3.TtlKolestrol,
											t3.HDLKolestrol,
											t3.LDLKolestrol,
											t3.Trigliserida,
											t3.Kreatinin,
											t3.pemeriksa,
											t4.pn_loka,
											t4.spesies_loka,
											t4.pn_pbtdk,
											t4.PF,
											t4.par_PF,
											t4.lemkos_PF,
											t4.densitas_PF,
											t4.PV,
											t4.par_PV,
											t4.lemkos_PV,
											t4.densitas_PV,
											t4.PO,
											t4.par_PO,
											t4.lemkos_PO,
											t4.densitas_PO,
											t4.PM,
											t4.par_PM,
											t4.lemkos_PM,
											t4.densitas_PM
									FROM bm04 t1 
									right join bm02 t2 on t1.no_stiker=t2.noStiker 
									left join formhasil t3 on t2.noStiker=t3.no_stiker 
									left join formmalarianew t4 on t3.no_stiker=t4.no_stiker 
									WHERE t1.propinsi_id is null and t2.propinsi_id=? AND t1.kode_lab=? AND t1.kode_penelitian=? ORDER BY t1.no_stiker ASC", array ($prop,$lab,$penelitian));
		$rows2 = $query->result_array();
        $rows = array_merge($rows1, $rows2);
		// var_dump($rows);
		$this->data['view_export'] = $rows;

		$this->data['area_body'] = $this->load->view('view_export', $this->data, true);
		$this->data['judul'] = 'Form Export';
		$this->load->view('view_export', $this->data);
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */