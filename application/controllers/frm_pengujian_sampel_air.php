<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class frm_pengujian_sampel_air extends main {

	var $data;
	var $datahome;
			    
        public function no_sampel(){
            $no_sampel = $_POST['id'];
            $query = $this->db->query("SELECT * FROM v_pengujian_sampel WHERE NO_SAMPEL = '$no_sampel'");
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
                    'N_ID'          => $key,
                    'KADAR'          => $kadar[$key]
                ));
            }
         
        }
	
	public function print_form(){
        $this->load->view('print_laporan_hasil_pengujian_sementara',$_POST);                               
		
	}
        

	public function index()
	{	
		parent::index();		
		
						
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