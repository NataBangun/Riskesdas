<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class frm_kwitansi extends main {

	var $data;
	var $datahome;
	
	public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		
		$query = $this->db->query("select * from bm04 where no_stiker like '%{$this->data['noStiker']}%'");
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
                
				
                $this->db->query('insert bm_01 set 
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
                $_POST['SamGaram'], 
                $_POST['SamAir'], 
                $_POST['SuhuDatang'], 
                $_POST['TglNakes'], 
                $_POST['NmNakes']));
                $idbo=$this->db->insert_id();
                $v=1;
                $x=1;
                while($_POST['JmlData']>=$v){
                    if(isset($_POST['Nama_'.$x])){
                        echo $_POST['JmlData'];
                        echo $idbo.
                        $_POST['Nama_'.$x]. 
                        $_POST['Umr_'.$x].
                        $_POST['NoStiker_'.$x].
                        $_POST['JK_'.$x].
                        $_POST['Urin_'.$x].
                        $_POST['Tgl1_'.$x].
                        $_POST['Darah_'.$x].
                        $_POST['Tgl2_'.$x];
                        
                        $this->db->query("insert data_bm01 set
                        bm01_id=?,
                        NamaART=?,
                        UmurART=?,
                        NoStiker=?, 
                        JK=?, 
                        Urin=?, 
                        TglUrin=?, 
                        Darah=?, 
                        TglDarah=?
                        ",
                        array($idbo,
                        $_POST['Nama_'.$x], 
                        $_POST['Umr_'.$x],
                        $_POST['NoStiker_'.$x],
                        $_POST['JK_'.$x],
                        $_POST['Urin_'.$x],
                        $_POST['Tgl1_'.$x],
                        $_POST['Darah_'.$x],
                        $_POST['Tgl2_'.$x])
                        );
                      $v++;  
                    }
                    $x++;
                }
                
                
		  
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
			
			if (( $this->data['level'] == "" or $this->data['welcome'] == "") or !($this->data['penelitian'] == "R1")) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else if ( $this->data['level'] == "6" and $this->data['penelitian'] == "R1") {
				$this->data['area_body'] = $this->load->view('frm_kwitansi', $this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('frm_kwitansi', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('formbm02', $this->data, true);
		$this->data['judul'] = 'Kwitansi';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */