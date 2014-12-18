<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class formbm04 extends main {

	var $data;
	var $datahome;
	
	public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		// echo "No Stiker :" .$this->data['noStiker'];
		
		// $query = $this->db->query("select * from bm02 where no_stiker like '%{$this->data['noStiker']}%'");
		$query = $this->db->query("select * from bm02 where noStiker='$id'");
		$rows = $query->result_array();
		echo json_encode($rows);
	}
	
	public function cek($id = ""){
		$this->data['noStiker'] = $id;
		$nostiker = strip_tags($id);
		$query = $this->db->query("SELECT * FROM bm04 WHERE no_stiker='$nostiker' AND kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%'");
		$rows = $query->result_array();
		
			if(count($rows)>0){
				echo "no";
			}else{
				echo "yes";
			}

	}
	public function index()
	{	
		parent::index();

			$this->data['status_addbm04'] = "0"; // default
			
			if (isset($_POST['status_addbm04'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert bm04 set kode_lab=?, kode_penelitian=?, propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?, nama_lab=?, alamat_lab=?,
				nama_enumerator=?, no_telp=?, nama_ART=?, no_urutART=?, umurART=?, JK=?, tanya1=?, no_stiker=?, alamatART=?, time_ambil_darah=?, kadarHB_nilai=?,
				kadarHB_waktu=?, kadarHB_tgl=?,
				riwayat_diabet=?, minum_insulin=?, puasa=?, time_akhir_makan=?, time_pembebanan_glukosa=?, time_2jam_glukosa=?, kadar_glukosa1_nilai=?, kadar_glukosa1_waktu=?,
				kadar_glukosa1_tgl=?, kadar_glukosa2_nilai=?, kadar_glukosa2_waktu=?, kadar_glukosa2_tgl=?,
				kadar_glukosa3_nilai=?, kadar_glukosa3_waktu=?, kadar_glukosa3_tgl=?, tgl_enumerator=?, tgl_pendamping=?, nama_ketua_enumerator=?, nama_pendamping=? ',
					array($this->data['lab'], $this->data['penelitian'], $_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'], $_POST['NamaLab'], $_POST['AlamatLab'],
					$_POST['NamaEnumerator'], $_POST['TelpEnumerator'], $_POST['NamaART'], $_POST['NoART'], $_POST['Umur'], $_POST['JK'], $_POST['Tanya1'],
					$_POST['NoStiker'], $_POST['AlamatART'], $_POST['AmbilDarah'], $_POST['KadarHB_Nilai'], $_POST['KadarHB_Waktu'], $_POST['KadarHB_Tgl'], $_POST['RDiabet'],
					$_POST['MinumInsulin'], $_POST['Puasa'], $_POST['AkhirMakan'], $_POST['PembebananGlukosa'], $_POST['DuaJPembebananGlukosa'], $_POST['KGlukosa1_Nilai'],
					$_POST['KGlukosa1_Waktu'], $_POST['KGlukosa1_Tgl'], $_POST['KGlukosa2_Nilai'], $_POST['KGlukosa2_Waktu'], $_POST['KGlukosa2_Tgl'], $_POST['KGlukosa3_Nilai'],
					$_POST['KGlukosa3_Waktu'], $_POST['KGlukosa3_Tgl'], $_POST['TGLDokterPendamping'], $_POST['TGLDokterPendamping'], $_POST['NamaEnumelator'], $_POST['NamaDokterPendamping']));
		
				$this->data['status_addbm04'] = "1"; // sukses
			}
			
			if ($this->data['status_addbm04'] == "1") {
				unset($_POST);
			}		
		
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
			//$this->data['TGLEnumerator'] = isset($_POST['TGLEnumerator']) ? $_POST['TGLEnumerator'] : "";
			$this->data['TGLDokterPendamping'] = isset($_POST['TGLDokterPendamping']) ? $_POST['TGLDokterPendamping'] : "";
			$this->data['NamaEnumelator'] = isset($_POST['NamaEnumelator']) ? $_POST['NamaEnumelator'] : "";
			$this->data['NamaDokterPendamping'] = isset($_POST['NamaDokterPendamping']) ? $_POST['NamaDokterPendamping'] : "";
			
			// $this->data[''] = isset($_POST['']) ? $_POST[''] : "";
			// $this->data[''] = isset($_POST['']) ? $_POST[''] : "";
			// $this->data[''] = isset($_POST['']) ? $_POST[''] : "";
			// $this->data[''] = isset($_POST['']) ? $_POST[''] : "";
			// $this->data[''] = isset($_POST['']) ? $_POST[''] : "";
		
		
		
			if (( $this->data['level'] == "" or $this->data['welcome'] == "") or !($this->data['penelitian'] == "R1")) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else if ( $this->data['level'] == "6" and $this->data['penelitian'] == "R1") {
				$this->data['area_body'] = $this->load->view('formbm04', $this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('formbm04', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('formbm04', $this->data, true);
		$this->data['judul'] = 'Form Hasil Pemeriksaan Lab ( BM 04 )';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */