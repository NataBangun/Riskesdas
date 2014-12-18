<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class formhasil_malaria extends main {

	var $data;
	
	public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		// echo "No Stiker :" .$this->data['noStiker'];
		
		// $query = $this->db->query("select * from bm04 where no_stiker like '%{$this->data['noStiker']}%'");
		$query = $this->db->query("select * from bm04 where no_stiker = '$id'");
//		$query = $this->db->query("select * from bm02 where noStiker='$id'");
		$rows = $query->result_array();
		echo json_encode($rows);
	}
	
	public function cek($id = ""){
		$this->data['noStiker'] = $id;
		$nostiker = strip_tags($id);
		$query = $this->db->query("SELECT * FROM formmalaria WHERE no_stiker='$nostiker' AND kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%'");
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
		
		
			$this->data['status_addmalaria'] = "0"; // default
			
			if (isset($_POST['status_addmalaria'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query("insert formmalaria set kode_lab=?, kode_penelitian=?, propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?,
				NamaART=?, Umur=?, JK=?, no_stiker=?, TGL_periksa=?, alamat=?, pn_loka=?, spesies_loka=?, pn_pbtdk=?, spesies_pbtdk=?, par_pbtdk=?, lemkos_pbtdk=?, densitas_pbtdk=?, pemeriksa=? ",
					array($this->data['lab'], $this->data['penelitian'], $_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'],
					$_POST['NamaART'], $_POST['Umur'], $_POST['JK'], $_POST['NoStiker'], $_POST['TGLPemeriksa'], $_POST['Alamat'], $_POST['PN2'], $_POST['SpesiesLoka'], $_POST['PN1'], $_POST['SpesiesPBTDK'], $_POST['Par'], $_POST['Lemkos'], $_POST['Densitas'], $_POST['Pemeriksa']));
		
				$this->data['status_addmalaria'] = "1"; // sukses
			}
			
			if ($this->data['status_addmalaria'] == "1") {
				unset($_POST);
			}
			
			$this->data['Prov'] = isset($_POST['Prov']) ? $_POST['Prov'] : "";
			$this->data['Kota'] = isset($_POST['Kota']) ? $_POST['Kota'] : "";
			$this->data['Kec'] = isset($_POST['Kec']) ? $_POST['Kec'] : "";
			$this->data['Desa'] = isset($_POST['Desa']) ? $_POST['Desa'] : "";
			$this->data['DK'] = isset($_POST['DK']) ? $_POST['DK'] : "";
			$this->data['NoSensus'] = isset($_POST['NoSensus']) ? $_POST['NoSensus'] : "";
			$this->data['NoSubSensus'] = isset($_POST['NoSubSensus']) ? $_POST['NoSubSensus'] : "";
			$this->data['KodeSampel'] = isset($_POST['KodeSampel']) ? $_POST['KodeSampel'] : "";
			$this->data['NoUrut'] = isset($_POST['NoUrut']) ? $_POST['NoUrut'] : "";
			$this->data['NamaART'] = isset($_POST['NamaART']) ? $_POST['NamaART'] : "";
			$this->data['Umur'] = isset($_POST['Umur']) ? $_POST['Umur'] : "";
			$this->data['JK'] = isset($_POST['JK']) ? $_POST['JK'] : "";			
			$this->data['NoStiker'] = isset($_POST['NoStiker']) ? $_POST['NoStiker'] : "";
			$this->data['TGLPemeriksa'] = isset($_POST['TGLPemeriksa']) ? $_POST['TGLPemeriksa'] : "";
			$this->data['Alamat'] = isset($_POST['Alamat']) ? $_POST['Alamat'] : "";
			$this->data['PN2'] = isset($_POST['PN2']) ? $_POST['PN2'] : "";
			$this->data['SpesiesLoka'] = isset($_POST['SpesiesLoka']) ? $_POST['SpesiesLoka'] : "";
			$this->data['PN1'] = isset($_POST['PN1']) ? $_POST['PN1'] : "";
			$this->data['SpesiesPBTDK'] = isset($_POST['SpesiesPBTDK']) ? $_POST['SpesiesPBTDK'] : "";
			$this->data['Par'] = isset($_POST['Par']) ? $_POST['Par'] : "";
			$this->data['Lemkos'] = isset($_POST['Lemkos']) ? $_POST['Lemkos'] : "";
			$this->data['Densitas'] = isset($_POST['Densitas']) ? $_POST['Densitas'] : "";
			$this->data['Pemeriksa'] = isset($_POST['Pemeriksa']) ? $_POST['Pemeriksa'] : "";
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('formhasil_malaria', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('formhasil_malaria', $this->data, true);
		$this->data['judul'] = 'Form Hasil Pemeriksaan Malaria';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */