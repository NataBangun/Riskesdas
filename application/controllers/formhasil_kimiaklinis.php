<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class formhasil_kimiaklinis extends main {

	var $data;
	
	public function cek($id = ""){
		$this->data['noStiker'] = $id;
		$nostiker = strip_tags($id);
		$query = $this->db->query("SELECT * FROM formhasil WHERE no_stiker='$nostiker' AND kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%'");
		$rows = $query->result_array();
		
		if(count($rows)>0){
			echo "no";
		}else{
			echo "yes";
		}
	}
	
	/*public function cekdata($id = ""){
		$this->data['noStiker'] = $id;
		$nostiker = strip_tags($id);
		// $query = $this->db->query("SELECT * FROM formhasil WHERE no_stiker='$nostiker' AND kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%'");
		$query = $this->db->query("select * from bm04 where no_stiker='$id'");
		$rows = $query->result_array();
		
		if(count($rows)>0){
			echo "0";
		}else{
			// echo "1";
			echo json_encode($rows);
		}
	}*/
	
	public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		// echo "No Stiker :" .$this->data['noStiker'];
		
		// $query = $this->db->query("select * from bm04 where no_stiker like '%{$this->data['noStiker']}%'");
		// $query = $this->db->query("select * from bm02 where noStiker='$id'");
		$query = $this->db->query("select * from bm04 where no_stiker='$id'");
		$rows = $query->result_array();
		echo json_encode($rows);
	}
	
	public function index()
	{	
		parent::index();
		
		
			$this->data['status_addbm02'] = "0"; // default
			
			if (isset($_POST['status_addbm02'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$_POST['Kreatinin'] = str_replace(",", ".", $_POST['Kreatinin']);
				$this->db->query("insert formhasil set kode_lab=?, kode_penelitian=?, propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?,
				NamaART=?, Umur=?, JK=?, no_stiker=?, TGL_periksa=?, alamat=?, karakter=?, TtlKolestrol=?, HDLKolestrol=?, LDLKolestrol=?, Trigliserida=?, Kreatinin=?, pemeriksa=? ",
					array($this->data['lab'], $this->data['penelitian'], $_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'],
					$_POST['NamaART'], $_POST['Umur'], $_POST['JK'], $_POST['NoStiker'], $_POST['TGLPemeriksa'], $_POST['Alamat'], $_POST['Karakter'], $_POST['TtlKolestrol'], $_POST['HDLKolestrol'], $_POST['LDLKolestrol'], $_POST['Trigliserida'], $_POST['Kreatinin'], $_POST['Pemeriksa']));
		
				$this->data['status_addbm02'] = "1"; // sukses
			}
			
			if ($this->data['status_addbm02'] == "1") {
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
			$this->data['Karakter'] = isset($_POST['Karakter']) ? $_POST['Karakter'] : "";
			$this->data['TtlKolestrol'] = isset($_POST['TtlKolestrol']) ? $_POST['TtlKolestrol'] : "";
			$this->data['HDLKolestrol'] = isset($_POST['HDLKolestrol']) ? $_POST['HDLKolestrol'] : "";
			$this->data['LDLKolestrol'] = isset($_POST['LDLKolestrol']) ? $_POST['LDLKolestrol'] : "";
			$this->data['Trigliserida'] = isset($_POST['Trigliserida']) ? $_POST['Trigliserida'] : "";
			$this->data['Kreatinin'] = isset($_POST['Kreatinin']) ? $_POST['Kreatinin'] : "";
			$this->data['Pemeriksa'] = isset($_POST['Pemeriksa']) ? $_POST['Pemeriksa'] : "";
			
			
			if (( $this->data['level'] == "" or $this->data['welcome'] == "") or !($this->data['penelitian'] == "R1")) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else if ( $this->data['level'] == "6" and $this->data['penelitian'] == "R1") {
				$this->data['area_body'] = $this->load->view('formhasil_kimiaklinis', $this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('formhasil_kimiaklinis', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('formhasil_kimiaklinis', $this->data, true);
		$this->data['judul'] = 'Form Hasil Kimia Klinis';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */