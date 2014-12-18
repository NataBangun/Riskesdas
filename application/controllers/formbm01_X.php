<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class formbm01 extends main {

	var $data;
	var $datahome;
	
	
	public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		
		$query = $this->db->query("select * from bm01 where NoStiker like '%{$this->data['noStiker']}%'");
//		$query = $this->db->query("select * from bm02 where noStiker='$id'");
		$rows = $query->result_array();
		echo json_encode($rows);
	}
	
	public function cek($id = ""){
		$this->data['noStiker'] = $id;
		$nostiker = strip_tags($id);
		$query = $this->db->query("SELECT * FROM bm01 WHERE NoStiker='$nostiker' AND kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%'");
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
		
		
			$this->data['status_addbm01'] = "0"; // default
			
			if (isset($_POST['status_addbm01'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert bm01 set 
                kode_lab=?, 
                kode_penelitian=?, 
                propinsi_id=?, 
                kabupaten_id=?, 
                kecamatan_id=?, 
                kelurahan_id=?, 
                DK=?, 
                kode_sampel=?, 
                no_bangun_sensus=?, 
                no_urut_sampel=?, 
                alamat=?, 
                tgl_kumpul=?, 
                hari_kumpul=?, 
                jam_kumpul=?, 
                Lab_lap=?, 
                NamaART_1=?, 
                NamaART_2=?, 
                NamaART_3=?, 
                NamaART_4=?, 
                NamaART_5=?, 
                NamaART_6=?, 
                NamaART_7=?, 
                NamaART_8=?, 
                NamaART_9=?, 
                UmurART_1=?, 
                UmurART_2=?, 
                UmurART_3=?, 
                UmurART_4=?, 
                UmurART_5=?, 
                UmurART_6=?, 
                UmurART_7=?, 
                UmurART_8=?, 
                UmurART_9=?,
                NoStiker_1=?, 
                NoStiker_2=?, 
                NoStiker_3=?, 
                NoStiker_4=?, 
                NoStiker_5=?, 
                NoStiker_6=?, 
                NoStiker_7=?, 
                NoStiker_8=?, 
                NoStiker_9=?,
                JK_1=?, 
                JK_2=?, 
                JK_3=?, 
                JK_4=?, 
                JK_5=?, 
                JK_6=?, 
                JK_7=?, 
                JK_8=?, 
                JK_9=?,
                Urin_1=?, 
                Urin_2=?, 
                Urin_3=?, 
                Urin_4=?, 
                Urin_5=?, 
                Urin_6=?, 
                Urin_7=?, 
                Urin_8=?, 
                Urin_9=?,
                TglUrin_1=?, 
                TglUrin_2=?, 
                TglUrin_3=?, 
                TglUrin_4=?, 
                TglUrin_5=?, 
                TglUrin_6=?, 
                TglUrin_7=?, 
                TglUrin_8=?, 
                TglUrin_9=?,
                Darah_1=?, 
                Darah_2=?, 
                Darah_3=?, 
                Darah_4=?, 
                Darah_5=?, 
                Darah_6=?, 
                Darah_7=?, 
                Darah_8=?, 
                Darah_9=?,
                TglDarah_1=?, 
                TglDarah_2=?, 
                TglDarah_3=?, 
                TglDarah_4=?, 
                TglDarah_5=?, 
                TglDarah_6=?, 
                TglDarah_7=?, 
                TglDarah_8=?, 
                TglDarah_9=?, 
                SamGaram=?,
                SamAir=?,
                SuhuDatang=?,
                tgl_nakes=?,
                nama_nakes=?',
					
                    array(
                $this->data['lab'], 
                $this->data['penelitian'], 
                $_POST['Prov'], 
                $_POST['Kota'], 
                $_POST['Kec'], 
                $_POST['Desa'], 
                $_POST['DK'], 
                $_POST['KodeSampel'], 
                $_POST['NoSensus'], 
                $_POST['NoUrut'], 
                $_POST['Alamat'], 
                $_POST['TglKumpul'], 
                $_POST['HarKumpul'], 
                $_POST['JamKumpul'], 
                $_POST['LabLap'], 
                $_POST['Nama_1'], 
                $_POST['Nama_2'],
                $_POST['Nama_3'],
                $_POST['Nama_4'],
                $_POST['Nama_5'],
                $_POST['Nama_6'],
                $_POST['Nama_7'],
                $_POST['Nama_8'],
                $_POST['Nama_9'],
                $_POST['Umr_1'],
                $_POST['Umr_2'],
                $_POST['Umr_3'],
                $_POST['Umr_4'],
                $_POST['Umr_5'],
                $_POST['Umr_6'],
                $_POST['Umr_7'],
                $_POST['Umr_8'],
                $_POST['Umr_9'],
                $_POST['NoStiker_1'],
                $_POST['NoStiker_2'],
                $_POST['NoStiker_3'],
                $_POST['NoStiker_4'],
                $_POST['NoStiker_5'],
                $_POST['NoStiker_6'],
                $_POST['NoStiker_7'],
                $_POST['NoStiker_8'],
                $_POST['NoStiker_9'],
                $_POST['JK_1'],
                $_POST['JK_2'],
                $_POST['JK_3'],
                $_POST['JK_4'],
                $_POST['JK_5'],
                $_POST['JK_6'],
                $_POST['JK_7'],
                $_POST['JK_8'],
                $_POST['JK_9'],
                $_POST['Urin_1'],
                $_POST['Urin_2'],
                $_POST['Urin_3'],
                $_POST['Urin_4'],
                $_POST['Urin_5'],
                $_POST['Urin_6'],
                $_POST['Urin_7'],
                $_POST['Urin_8'],
                $_POST['Urin_9'],
                $_POST['Tgl1_1'],
                $_POST['Tgl1_2'],
                $_POST['Tgl1_3'],
                $_POST['Tgl1_4'],
                $_POST['Tgl1_5'],
                $_POST['Tgl1_6'],
                $_POST['Tgl1_7'],
                $_POST['Tgl1_8'],
                $_POST['Tgl1_9'],
                $_POST['Darah_1'],
                $_POST['Darah_2'],
                $_POST['Darah_3'],
                $_POST['Darah_4'],
                $_POST['Darah_5'],
                $_POST['Darah_6'],
                $_POST['Darah_7'],
                $_POST['Darah_8'],
                $_POST['Darah_9'],
                $_POST['Tgl2_1'],
                $_POST['Tgl2_2'],
                $_POST['Tgl2_3'],
                $_POST['Tgl2_4'],
                $_POST['Tgl2_5'],
                $_POST['Tgl2_6'],
                $_POST['Tgl2_7'],
                $_POST['Tgl2_8'],
                $_POST['Tgl2_9'],
                $_POST['SamGaram'], 
                $_POST['SamAir'], 
                $_POST['SuhuDatang'], 
                $_POST['TglNakes'], 
                $_POST['NmNakes']));
		
				$this->data['status_addbm01'] = "1"; // sukses
			}
			
			if ($this->data['status_addbm01'] == "1") {
				unset($_POST);
			}
			

			/*
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
			*/
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('formbm01', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('formbm02', $this->data, true);
		$this->data['judul'] = 'Form Mikroskopis ( BM 01 )';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */