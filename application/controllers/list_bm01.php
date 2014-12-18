<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_bm01 extends main {

	var $data;
	var $datahome;
	
	// public function get_arr_bm01()
	// {	
		// $query = $this->db->query(" SELECT * FROM bm02 where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		// $rows = $query->result_array();				
		// $this->data['arr_bm01'] = $rows;
	// }
	
    public function nostiker($id = ""){
		$this->data['noStiker'] = $id;
		
		$query = $this->db->query("select * from bm04 where no_stiker like '%{$this->data['noStiker']}%'");
		$rows = $query->result_array();
		echo json_encode($rows);
	}
    
	public function get_arr_bm01()
	{			
		$this->data['search'] = $this->input->post('search');
		$sql = " SELECT * FROM bm_01 
            RIGHT JOIN data_bm01 ON data_bm01.bm01_id = bm_01.bm_01_id
            where NoStiker LIKE '%{$this->data['search']}%' AND SamGaram LIKE '%{$this->data['search']}%' AND kode_lab LIKE '%{$this->data['lab']}%' 
			AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
        
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_bm01'] = $rows;
        
        //print_r($rows1);
//        $i=0;
//        foreach($rows1 as $key1=>$value){
//            
//            $sql2 = " SELECT * FROM data_bm01 WHERE bm01_id='{$value['bm_01_id']}'";
//            $query2= $this->db->query($sql2);
//            $rows2 = $query2->result_array();
//           // $x=0;
//            //foreach($rows2 as $key1=>$value2){
//                //$this->data['arr_bm01'][$i]= array_merge($rows2[$x],$this->data['arr_bm01'][$i]);
//            foreach($rows2 as $value2){
//                $value2 = $rows2[$key1];
//                 $value += $value2;
//                //$x++;
//                //var_dump($value);
//                
//            }
//            
//            $i++;
//            //echo($i);
//        }
//        $this->data['arr_bm01'] =$value;
//        
//		print_r($this->data['arr_bm01']);
	}
	
	public function del_sampel($Id="") {
		
		$this->db->query('DELETE from bm_01 where bm_01_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_bm02';</script>";
	}
    
    public function del_stiker($Id="") {
		
		$this->db->query('DELETE from data_bm01 where data_bm01_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_bm02';</script>";
	}
	
	public function index()
	{	
		parent::index();
		$this->get_arr_bm01();
		
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
			
				$this->get_arr_bm01();
				
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
				$this->data['area_body'] = $this->load->view('list_bm01', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
		$this->data['judul'] = 'Form List BM 01';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */