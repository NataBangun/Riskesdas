<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_bm02 extends main {

	var $data;
	var $datahome;
	
	// public function get_arr_bm02()
	// {	
		// $query = $this->db->query(" SELECT * FROM bm02 where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		// $rows = $query->result_array();				
		// $this->data['arr_bm02'] = $rows;
	// }
		
	public function get_arr_bm02()
	{			
		$this->data['search'] = $this->input->post('search');
		$sql = " SELECT * FROM bm02 where noStiker LIKE '%{$this->data['search']}%' AND kode_lab LIKE '%{$this->data['lab']}%' 
			AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_bm02'] = $rows;
		
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from bm02 where bm02_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_bm02';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_bm02();
		
			$this->data['status_addbm02'] = "0"; // default
			
			if (isset($_POST['status_addbm02'])) {
				// 1. update Data
				// var_dump($this->db);
				$this->db->query('update bm02 set propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?, alamat=?,
								namaART=?, noART=?, noStiker=?, riwayat_sakit_berat=?, tgl_ambildarah=?, nama_lab=?, time_penetasan_buffer=?, time_pembacaan_rdt=?,
								hasil_rdt=?, art_riwayat_panas=?, duplo=?, tgl_enumerator=?, tgl_nakes=?, nama_enumerator=?, nama_nakes=? where bm02_id=? ',
					array($_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'], $_POST['Alamat'],
							$_POST['NamaART'], $_POST['NoART'], $_POST['NoStiker'], $_POST['RiwayatSakit'], $_POST['TglAmbilDrh'], $_POST['NamaLab'], $_POST['PenetasanBuffer'],
							$_POST['BacaRDT'], $_POST['RDT'], $_POST['Tanya1'], $_POST['Tanya2'], $_POST['TGLEnumerator'], $_POST['TGLNakes'], $_POST['NamaEnumelator'],
							$_POST['NamaNakesPendamping'], $_POST['bm02_id']));
		
				$this->data['status_addbm02'] = "1"; // sukses
				
			}
			
				$this->get_arr_bm02();
				
			if ($this->data['status_addbm02'] == "1") {
				unset($_POST);
			}

			$this->data['bm02_id'] = isset($_POST['bm02_id']) ? $_POST['bm02_id'] : "";
			$this->data['Prov'] = isset($_POST['Prov']) ? $_POST['Prov'] : "";
			$this->data['Kota'] = isset($_POST['Kota']) ? $_POST['Kota'] : "";
			$this->data['Kec'] = isset($_POST['Kec']) ? $_POST['Kec'] : "";
			$this->data['Desa'] = isset($_POST['Desa']) ? $_POST['Desa'] : "";
			$this->data['DK'] = isset($_POST['DK']) ? $_POST['DK'] : "";
			$this->data['KodeSampel'] = isset($_POST['KodeSampel']) ? $_POST['KodeSampel'] : "";
			$this->data['NoSensus'] = isset($_POST['NoSensus']) ? $_POST['NoSensus'] : "";
			$this->data['NoUrut'] = isset($_POST['NoUrut']) ? $_POST['NoUrut'] : "";
			$this->data['Alamat'] = isset($_POST['Alamat']) ? $_POST['Alamat'] : "";
			$this->data['NamaART'] = isset($_POST['NamaART']) ? $_POST['NamaART'] : "";
			$this->data['NoART'] = isset($_POST['NoART']) ? $_POST['NoART'] : "";
			$this->data['NoStiker'] = isset($_POST['NoStiker']) ? $_POST['NoStiker'] : "";
			$this->data['RiwayatSakit'] = isset($_POST['RiwayatSakit']) ? $_POST['RiwayatSakit'] : "";
			$this->data['TglAmbilDrh'] = isset($_POST['TglAmbilDrh']) ? $_POST['TglAmbilDrh'] : "";
			$this->data['NamaLab'] = isset($_POST['NamaLab']) ? $_POST['NamaLab'] : "";
			$this->data['PenetasanBuffer'] = isset($_POST['PenetasanBuffer']) ? $_POST['PenetasanBuffer'] : "";
			$this->data['BacaRDT'] = isset($_POST['BacaRDT']) ? $_POST['BacaRDT'] : "";
			$this->data['RDT'] = isset($_POST['RDT']) ? $_POST['RDT'] : "";
			$this->data['Tanya1'] = isset($_POST['Tanya1']) ? $_POST['Tanya1'] : "";
			$this->data['Tanya2'] = isset($_POST['Tanya2']) ? $_POST['Tanya2'] : "";
			$this->data['TGLEnumerator'] = isset($_POST['TGLEnumerator']) ? $_POST['TGLEnumerator'] : "";
			$this->data['TGLNakes'] = isset($_POST['TGLNakes']) ? $_POST['TGLNakes'] : "";
			$this->data['NamaEnumelator'] = isset($_POST['NamaEnumelator']) ? $_POST['NamaEnumelator'] : "";
			$this->data['NamaNakesPendamping'] = isset($_POST['NamaNakesPendamping']) ? $_POST['NamaNakesPendamping'] : "";
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
		$this->data['judul'] = 'Form List BM 02';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */