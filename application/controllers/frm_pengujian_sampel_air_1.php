<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class frm_pengujian_sampel_air extends main {

	var $data;
	var $datahome;
	
	
	
	public function del_sampel($Id="") {
            $this->db->query('DELETE from bm_01 where bm_01_id=? ', array($Id));
            echo "<script>location.href = '{$this->data['application_path']}/list_bm02';</script>";
	}
    
        public function no_sampel(){
            $no_sampel = $_POST['id'];
            $query = $this->db->query("SELECT * FROM v_pengujian_sampel WHERE NO_SAMPEL = $no_sampel");
            $row = $query->result_array();
            echo json_encode($row);
        }
        
        public function save(){
            
            extract($_POST);
            $data = array(
                'NO_SAMPEL'         => $NO_SAMPEL,
                'NO_KODE'           => $NO_KODE,
                'TGL_PENERIMAAN'    => $TGL_PENERIMAAN,
                'NAMA_PENGIRIM'     => $NAMA_PENGIRIM,
                'JENIS_AIR'         => $JENIS_AIR,
                'TEMPAT_PENGAMBILAN'=> $TEMPAT_PENGAMBILAN,
                'TGL_PENGAMBILAN'   => $TGL_PENGAMBILAN,
                'KEDALAMAN'         => $KEDALAMAN,
                'KETERANGAN'        => $KETERANGAN,
                'DIBUAT_OLEH'       => $DIBUAT_OLEH,
                'DISETUJUI_OLEH'    => $DISETUJUI_OLEH,
                'TEMPAT'            => $TEMPAT,
                'TANGGAL'           => $TANGGAL,
            );
            $this->db->insert('t_pengujian_sampel_hasil_sementara',$data);
            $id = $this->db->insert_id();
            foreach($metode as $key => $val){
                $this->db->insert('t_pengujian_sampel_hasil_sementara_detail',array(
                    'T_ID'          => $id,
                    'T_ID_METHOD'   => $metode[$key],
                    'HASIL'         => $hasil[$key],
                    'N_ID'          => $key
                ));
            }
         
        }
    	
	public function index()
	{	
		parent::index();
		
		
			$this->data['status_addbm01'] = "0"; // default
			
			if (isset($_POST['status_addbm01'])) {
                $status = $_POST['status_addbm01'];
				// 1. update Data
				// var_dump($this->db);
                switch($status){
                     case 2:
                        $this->db->query('
                            update bm_01 set 
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
                            nama_nakes=? 
                            where bm_01_id=?',
                           	array(
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
                            $_POST['SamGaram2'],
                            $_POST['SamAir'],
                            $_POST['SuhuDatang'],
                            $_POST['TglNakes'],
                            $_POST['NmNakes'],
                            $_POST['bm_01_id'])
                            );
                     break;
                     
                     case 0:
                        $this->db->query('
                            update data_bm01 set
                            NamaART     =?,
                            UmurART     =?,
                            NoStiker    =?,
                            JK          =?,
                            Urin        =?,
                            TglUrin     =?,
                            Darah       =?,
                            TglDarah    =?
                            where data_bm01_id =?'
                            ,array(
                            $_POST['Nama_1'],
                            $_POST['Umr_1'],
                            $_POST['NoStiker_1'],
                            $_POST['JK_1'],
                            $_POST['Urin_1'],
                            $_POST['Tgl1_1'],
                            $_POST['Darah_1'],
                            $_POST['Tgl2_1'],
                            $_POST['data_bm01_id']
                            )
                        );
                        
                     break;
                     
                     case 3:
                        $this->db->query('
                            insert data_bm01 set
                            bm01_id     =?,
                            NamaART     =?,
                            UmurART     =?,
                            NoStiker    =?,
                            JK          =?,
                            Urin        =?,
                            TglUrin     =?,
                            Darah       =?,
                            TglDarah    =?'
                            ,array(
                            $_POST['bm01_id'],
                            $_POST['Nama_1'],
                            $_POST['Umr_1'],
                            $_POST['NoStiker_1'],
                            $_POST['JK_1'],
                            $_POST['Urin_1'],
                            $_POST['Tgl1_1'],
                            $_POST['Darah_1'],
                            $_POST['Tgl2_1'],
                            )
                        );
                     break;
                     
                     
                }
				$this->data['status_addbm01'] = "1"; // sukses
				
			}
			
				
				
			if ($this->data['status_addbm01'] == "1") {
				unset($_POST);
			}

			/*$this->data['bm02_id'] = isset($_POST['bm02_id']) ? $_POST['bm02_id'] : "";
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
			$this->data['NamaNakesPendamping'] = isset($_POST['NamaNakesPendamping']) ? $_POST['NamaNakesPendamping'] : "";*/
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('frm_pengujian_sampel_air', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
		$this->data['judul'] = 'Laporan Hasil Pengujian';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */