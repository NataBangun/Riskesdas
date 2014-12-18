<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class formhasil extends main {

	var $data;
	
	public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		// echo "No Stiker :" .$this->data['noStiker'];
		
		$query = $this->db->query("select * from bm04 where no_stiker like '%{$this->data['noStiker']}%'");
		$rows = $query->result_array();
		echo json_encode($rows);
	}
	
	public function cek(){
		$nostiker = strip_tags(trim($_REQUEST['NoStiker']));
		$query = $query->db->query("SELECT * FROM formhasil WHERE no_stiker='$nostiker'");
		// $result=mysql_query($query);
		$rows = $query->result_array();
		
			if(mysql_num_rows($rows)>0){
				//username already exists
				echo "no";
			}else{
				echo "yes";
			}

	}
	
	public function index()
	{	
		parent::index();
		
		
			$this->data['status_addbm02'] = "0"; // default
			
			if (isset($_POST['status_addbm02'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert formhasil set propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?,
				NamaART=?, Umur=?, JK=?, no_stiker=?, TGL_periksa=?, alamat=?, TtlKolestrol=?, HDLKolestrol=?, LDLKolestrol=?, Trigliserida=?, Kreatinin=?, pemeriksa=? ',
					array($_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'],
					$_POST['NamaART'], $_POST['Umur'], $_POST['JK'], $_POST['NoStiker'], $_POST['TGLPemeriksa'], $_POST['Alamat'], $_POST['TtlKolestrol'], $_POST['HDLKolestrol'], $_POST['LDLKolestrol'], $_POST['Trigliserida'], $_POST['Kreatinin'], $_POST['Pemeriksa']));
		
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
			$this->data['TtlKolestrol'] = isset($_POST['TtlKolestrol']) ? $_POST['TtlKolestrol'] : "";
			$this->data['HDLKolestrol'] = isset($_POST['HDLKolestrol']) ? $_POST['HDLKolestrol'] : "";
			$this->data['LDLKolestrol'] = isset($_POST['LDLKolestrol']) ? $_POST['LDLKolestrol'] : "";
			$this->data['Trigliserida'] = isset($_POST['Trigliserida']) ? $_POST['Trigliserida'] : "";
			$this->data['Kreatinin'] = isset($_POST['Kreatinin']) ? $_POST['Kreatinin'] : "";
			$this->data['Pemeriksa'] = isset($_POST['Pemeriksa']) ? $_POST['Pemeriksa'] : "";
			
			
		$this->data['area_body'] = $this->load->view('formhasil', $this->data, true);
		$this->data['judul'] = 'Form Hasil Pemeriksaan Malaria';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */