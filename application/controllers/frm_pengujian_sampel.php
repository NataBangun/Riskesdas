<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class frm_pengujian_sampel extends main {

	function __construct(){
        parent::__construct();        
            $this->data['getMethod']="?";

        $this->data['No']   = isset($_REQUEST['No']) ? $_REQUEST['No']    : "";
        $this->data['bulan']   = isset($_REQUEST['bulan']) ? $_REQUEST['bulan']    : "";
        $this->data['nama']    = isset($_REQUEST['nama']) ? $_REQUEST['nama']      : "";
		$this->data['JmlData']    = isset($_REQUEST['JmlData']) ? $_REQUEST['JmlData']      : "";
        $this->data['tempat']   = isset($_REQUEST['tempat']) ? $_REQUEST['tempat']    : "";
        $this->data['tanggal']  = isset($_REQUEST['tanggal']) ? $_REQUEST['tanggal']  : "";
        $this->data['penerima']     = isset($_REQUEST['penerima']) ? $_REQUEST['penerima']        : "";
										'No='        .$this->data['No'].'&'
                                        .'bulan='  .$this->data['bulan'].'&'
                                        .'nama='  .$this->data['nama'].'&'
										.'JmlData='  .$this->data['JmlData'].'&'
                                        .'tempat='  .$this->data['tempat'].'&'
                                        .'tanggal=' .$this->data['tanggal'].'&'
                                        .'penerima='          .$this->data['penerima'].'&';
                                                                   
    }

	public function get_method()
	{
        echo $this->data['getMethod'];
    }

	public function print_pengujian()
	{
        $this->load->view('print_kwitansi',$this->data);
    }

	public function pengujian_sampel_print()
	{
        $this->load->view('frm_permohonan',$_POST);
    }
	
	var $data;
	var $datahome;
	
	public function print_kwitansi()
	{
		$this->load->view('print_kwitansi');
	}
	    public function get_arr_ujisampel(){
                $query=  $this->db->query("select * from t_pengujian_sampel_detail order by T_PENGUJIAN_SAMPEL_DETAIL_ID");
                $rows=  $query->result_array();
                $this->data['arr_ujisampel']=$rows;
        }

	public function index()
	{	
		parent::index();
		
		

			$this->data['status_addujisam'] = "0"; // default
			
			if (isset($_POST['status_addujisam'])) {		
				$NO_PENGUJIAN=$_POST['No'].'/FPPS/'.$_POST['bulan'].'/'.date('Y');
		
					$this->db->query('insert t_pengujian_sampel set NAMA=?, ALAMAT=?, NO_TELPON=?, NO_FAX=?, PEMOHON=?, PENERIMA=?, TEMPAT=?, TANGGAL=?, CREATE_DATE=DATE(NOW()), TGL_PENERIMAAN=?, NO_PENGUJIAN=?',
					array($_POST['nama'], $_POST['alamat'], $_POST['notelp'], $_POST['nofax'], $_POST['pemohon'], $_POST['penerima'], $_POST['tempat'], $_POST['tanggal'], $_POST['tgl_penerimaan'], $NO_PENGUJIAN));
					$insert_id=$this->db->insert_id();
					foreach($_POST['ATAS_NAMA'] as $key => $val){
					$this->db->query("insert t_pengujian_atas_nama set 
						NAMA='{$_POST['ATAS_NAMA'][$key]}',
						T_PENGUJIAN_SAMPEL_ID='$insert_id'"
					);
				}	
					foreach($_POST['NO_SAMPEL'] as $key => $val){
					$this->db->query("insert t_pengujian_sampel_detail set 
						NO_SAMPEL='{$_POST['NO_SAMPEL'][$key]}'
						, JENIS_AIR='{$_POST['JENIS_AIR'][$key]}'
						, TANGGAL='{$_POST['TANGGAL'][$key]}'
						, ALAMAT='{$_POST['ALAMAT'][$key]}'
						, KEDALAMAN='{$_POST['KEDALAMAN'][$key]}',
						T_PENGUJIAN_SAMPEL_ID='$insert_id'"
					);
					
				}
				$this->data['status_addujisam'] = "1"; // sukses
                                
			}
			
			if ($this->data['status_addujisam'] == "1") {
				unset($_POST);
			}
		
			if (( $this->data['level'] == "" or $this->data['welcome'] == "") or !($this->data['penelitian'] == "K2")) {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else if ( $this->data['level'] == "6" and $this->data['penelitian'] == "K2") {
				$this->data['area_body'] = $this->load->view('frm_pengujian_sampel', $this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('frm_pengujian_sampel', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('formbm02', $this->data, true);
		$this->data['judul'] = 'Form Pengujian Sampel';
		$this->load->view('layout', $this->data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */