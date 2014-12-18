<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_bm04 extends main {

	var $data;
	var $datahome;
	
	// public function get_arr_bm04()
	// {	
		// $query = $this->db->query(" SELECT * FROM bm04 where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		// $rows = $query->result_array();				
		// $this->data['arr_bm04'] = $rows;
	// }
	
	public function get_arr_bm04()
	{			
		$this->data['search'] = $this->input->post('search');
		$sql = " SELECT * FROM bm04 where no_stiker LIKE '%{$this->data['search']}%' AND kode_lab LIKE '%{$this->data['lab']}%' 
			AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_bm04'] = $rows;
		
	}
		
	public function del($Id="") {
		
		$this->db->query('DELETE from bm04 where bm04_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_bm04';</script>";
	}
	
	public function index()
	{
		parent::index();
		$this->get_arr_bm04();

			$this->data['status_addbm04'] = "0"; // default
			
			if (isset($_POST['status_addbm04'])) {
				// 1. update Data
				// var_dump($this->db);
				$this->db->query('update bm04 set propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?, nama_lab=?, alamat_lab=?,
				nama_enumerator=?, no_telp=?, nama_ART=?, no_urutART=?, umurART=?, JK=?, tanya1=?, no_stiker=?, alamatART=?, time_ambil_darah=?, kadarHB_nilai=?,
				kadarHB_waktu=?, kadarHB_tgl=?,
				riwayat_diabet=?, minum_insulin=?, puasa=?, time_akhir_makan=?, time_pembebanan_glukosa=?, time_2jam_glukosa=?, kadar_glukosa1_nilai=?, kadar_glukosa1_waktu=?,
				kadar_glukosa1_tgl=?, kadar_glukosa2_nilai=?, kadar_glukosa2_waktu=?, kadar_glukosa2_tgl=?,
				kadar_glukosa3_nilai=?, kadar_glukosa3_waktu=?, kadar_glukosa3_tgl=?, tgl_enumerator=?, tgl_pendamping=?, nama_ketua_enumerator=?, nama_pendamping=? where bm04_id=? ',
					array($_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'], $_POST['NamaLab'], $_POST['AlamatLab'],
					$_POST['NamaEnumerator'], $_POST['TelpEnumerator'], $_POST['NamaART'], $_POST['NoART'], $_POST['Umur'], $_POST['JK'], $_POST['Tanya1'],
					$_POST['NoStiker'], $_POST['AlamatART'], $_POST['AmbilDarah'], $_POST['KadarHB_Nilai'], $_POST['KadarHB_Waktu'], $_POST['KadarHB_Tgl'], $_POST['RDiabet'],
					$_POST['MinumInsulin'], $_POST['Puasa'], $_POST['AkhirMakan'], $_POST['PembebananGlukosa'], $_POST['DuaJPembebananGlukosa'], $_POST['KGlukosa1_Nilai'],
					$_POST['KGlukosa1_Waktu'], $_POST['KGlukosa1_Tgl'], $_POST['KGlukosa2_Nilai'], $_POST['KGlukosa2_Waktu'], $_POST['KGlukosa2_Tgl'], $_POST['KGlukosa3_Nilai'],
					$_POST['KGlukosa3_Waktu'], $_POST['KGlukosa3_Tgl'], $_POST['TGLEnumerator'], $_POST['TGLDokterPendamping'], $_POST['NamaEnumelator'], $_POST['NamaDokterPendamping'], $_POST['bm04_id']));
		
				$this->data['status_addbm04'] = "1"; // sukses
			}
			
			if ($this->data['status_addbm04'] == "1") {
				unset($_POST);
			}		
		
			$this->data['bm04_id'] = isset($_POST['bm04_id']) ? $_POST['bm04_id'] : "";
			$this->data['Prov'] = isset($_POST['Prov']) ? $_POST['Prov'] : "";
			$this->data['Kota'] = isset($_POST['Kota']) ? $_POST['Kota'] : "";
			$this->data['Kec'] = isset($_POST['Kec']) ? $_POST['Kec'] : "";
			$this->data['Desa'] = isset($_POST['Desa']) ? $_POST['Desa'] : "";
			$this->data['DK'] = isset($_POST['DK']) ? $_POST['DK'] : "";
			$this->data['KodeSampel'] = isset($_POST['KodeSampel']) ? $_POST['KodeSampel'] : "";
			$this->data['NoSensus'] = isset($_POST['NoSensus']) ? $_POST['NoSensus'] : "";
			$this->data['NoUrut'] = isset($_POST['NoUrut']) ? $_POST['NoUrut'] : "";
			$this->data['NamaLab'] = isset($_POST['NamaLab']) ? $_POST['NamaLab'] : "";
			$this->data['AlamatLab'] = isset($_POST['AlamatLab']) ? $_POST['AlamatLab'] : "";
			$this->data['NamaEnumerator'] = isset($_POST['NamaEnumerator']) ? $_POST['NamaEnumerator'] : "";
			$this->data['TelpEnumerator'] = isset($_POST['TelpEnumerator']) ? $_POST['TelpEnumerator'] : "";
			$this->data['NamaART'] = isset($_POST['NamaART']) ? $_POST['NamaART'] : "";
			$this->data['NoART'] = isset($_POST['NoART']) ? $_POST['NoART'] : "";
			$this->data['Umur'] = isset($_POST['Umur']) ? $_POST['Umur'] : "";
			$this->data['JK'] = isset($_POST['JK']) ? $_POST['JK'] : "";
			$this->data['Tanya1'] = isset($_POST['Tanya1']) ? $_POST['Tanya1'] : "";
			$this->data['NoStiker'] = isset($_POST['NoStiker']) ? $_POST['NoStiker'] : "";
			$this->data['AlamatART'] = isset($_POST['AlamatART']) ? $_POST['AlamatART'] : "";
			$this->data['AmbilDarah'] = isset($_POST['AmbilDarah']) ? $_POST['AmbilDarah'] : "";
			$this->data['KadarHB_Nilai'] = isset($_POST['KadarHB_Nilai']) ? $_POST['KadarHB_Nilai'] : "";
			$this->data['KadarHB_Waktu'] = isset($_POST['KadarHB_Waktu']) ? $_POST['KadarHB_Waktu'] : "";
			$this->data['KadarHB_Tgl'] = isset($_POST['KadarHB_Tgl']) ? $_POST['KadarHB_Tgl'] : "";
			$this->data['RDiabet'] = isset($_POST['RDiabet']) ? $_POST['RDiabet'] : "";
			$this->data['MinumInsulin'] = isset($_POST['MinumInsulin']) ? $_POST['MinumInsulin'] : "";
			$this->data['Puasa'] = isset($_POST['Puasa']) ? $_POST['Puasa'] : "";
			$this->data['AkhirMakan'] = isset($_POST['AkhirMakan']) ? $_POST['AkhirMakan'] : "";
			$this->data['PembebananGlukosa'] = isset($_POST['PembebananGlukosa']) ? $_POST['PembebananGlukosa'] : "";
			$this->data['DuaJPembebananGlukosa'] = isset($_POST['DuaJPembebananGlukosa']) ? $_POST['DuaJPembebananGlukosa'] : "";
			$this->data['KGlukosa1_Nilai'] = isset($_POST['KGlukosa1_Nilai']) ? $_POST['KGlukosa1_Nilai'] : "";
			$this->data['KGlukosa1_Waktu'] = isset($_POST['KGlukosa1_Waktu']) ? $_POST['KGlukosa1_Waktu'] : "";
			$this->data['KGlukosa1_Tgl'] = isset($_POST['KGlukosa1_Tgl']) ? $_POST['KGlukosa1_Tgl'] : "";			
			$this->data['KGlukosa2_Nilai'] = isset($_POST['KGlukosa2_Nilai']) ? $_POST['KGlukosa2_Nilai'] : "";
			$this->data['KGlukosa2_Waktu'] = isset($_POST['KGlukosa2_Waktu']) ? $_POST['KGlukosa2_Waktu'] : "";
			$this->data['KGlukosa2_Tgl'] = isset($_POST['KGlukosa2_Tgl']) ? $_POST['KGlukosa2_Tgl'] : "";			
			$this->data['KGlukosa3_Nilai'] = isset($_POST['KGlukosa3_Nilai']) ? $_POST['KGlukosa3_Nilai'] : "";
			$this->data['KGlukosa3_Waktu'] = isset($_POST['KGlukosa3_Waktu']) ? $_POST['KGlukosa3_Waktu'] : "";
			$this->data['KGlukosa3_Tgl'] = isset($_POST['KGlukosa3_Tgl']) ? $_POST['KGlukosa3_Tgl'] : "";
			$this->data['TGLEnumerator'] = isset($_POST['TGLEnumerator']) ? $_POST['TGLEnumerator'] : "";
			$this->data['TGLDokterPendamping'] = isset($_POST['TGLDokterPendamping']) ? $_POST['TGLDokterPendamping'] : "";
			$this->data['NamaEnumelator'] = isset($_POST['NamaEnumelator']) ? $_POST['NamaEnumelator'] : "";
			$this->data['NamaDokterPendamping'] = isset($_POST['NamaDokterPendamping']) ? $_POST['NamaDokterPendamping'] : "";
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_bm04', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_bm04', $this->data, true);
		$this->data['judul'] = 'Form List BM 04';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */