<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class pemeriksaan extends main {

	var $data;
	var $datahome;


    public function get_arr_formpenerimaan($nobarcode)
	{
		$query = $this->db->query("
        SELECT
            tb6.institusi_name,
            tb1.namaART,
            tb1.umurART,
            tb1.alamatART,
            tb3.spesimen_name,
            tb4.kondisispesimen_name,
            tb1.tgl_ambil,
            tb1.tgl_terima,
            tb2.penelitian_name,
            tb5.LAB_NAME,
            tb7.simapanspesimen_name

        FROM formpenerimaan tb1
        INNER JOIN penelitian tb2 ON tb1.penelitian_kode = tb2.penelitian_kode
        INNER JOIN spesimen tb3 ON tb1.spesimen_kode = tb3.spesimen_kode
        LEFT JOIN kondisispesimen tb4 ON tb1.kondisispesimen_id = tb4.kondisispesimen_id
        INNER JOIN laboraturium tb5 ON tb1.LAB_CODE = tb5.LAB_CODE
        INNER JOIN institusi tb6 ON tb1.institusi_kode = tb6.institusi_kode
        LEFT JOIN simapanspesimen tb7 ON tb1.simpanspesimen_id = tb7.simapanspesimen_id
        WHERE no_barcode = '$nobarcode'");

		$rows = $query->result_array();

		echo json_encode($rows);

	}

    public function get_arr_hasil(){
        $query= $this->db->query("select * from p_cb_hasil");
        $rows = $query->result_array();
        $this->data['arr_hasil']=$rows;
    }

    public function get_arr_metode(){
                $query=  $this->db->query("select * from metode order by id_metod");
                $rows=  $query->result_array();
                $this->data['arr_metode']=$rows;
        }

    public function get_arr_penerimaan()
	{
		$query = $this->db->query('SELECT * FROM formpenerimaan');
		$rows = $query->result_array();
		$this->data['arr_penerimaan'] = $rows;
	}

    public function get_arr_penyakit(){
        $query = $this->db->query('SELECT * FROM p_penyakit');
        $rows = $query->result_array();
        $this->data['arr_penyakit'] = $rows;
    }

    public function get_arr_dtpenyakit($id){
        $query = $this->db->query("select * from p_data_penyakit where PENYAKIT_ID = '$id'");
        $rows = $query->result_array();
        foreach ($rows as $row) {
            echo "<option value='{$row['DATA_PENYAKIT_ID']}'>{$row['NAMA_DATA_PENYAKIT']}</option>";
        }
    }


	public function index()
	{

		parent::index();
        $this->load->library('uplodfile');
        $this->get_arr_metode();
        $this->get_arr_hasil();
	    $this->get_arr_penyakit();
        $this->data['status_periksa'] = "0"; // default

			$this->data['status_periksa'] = "0"; // default
			$date = date('Y/m/d H:i:s');
            $p = $this->db->query("SELECT max(P_ID) + 1 as p FROM p_pemeriksaan");
	        $p = $p->result_array();
	        $p_id = $p[0]['p'];

			if (isset($_POST['status_periksa'])) {

             if(isset($_POST['MetodePenelitian'])){
                $MP = $_POST['MetodePenelitian'];

                $fupgambar  = (isset($_FILES['Fup'.$MP.'gambar']))? $_FILES['Fup'.$MP.'gambar']:null;
                $fupdata    = (isset($_FILES['Fup'.$MP.'data']))? $_FILES['Fup'.$MP.'data']:null;
               // $fupgambar  = $_FILES['Fup'.$MP.'gambar'];
                //$fupdata    = $_FILES['Fup'.$MP.'data'];
			    if(isset($fupgambar)){
			        $upg        = new uplodfile();
			        $upg->set_file($fupgambar);
			        $upg->set_dir("upload/gambar");
			        $upg->set_type(" image/gif,image/jpeg,image/jpg");
			        $fupgambar  = $upg->get_fullpath();
			        $upg->do_upload();
			    }else{
			        $fupgambar = '';
			    }

                if(isset($fupdata)){
                    $upd        = new uplodfile();
                    $upd->set_file($fupdata);
                    $upd->set_dir("upload/data");
                    $fupdata    = $upd->get_fullpath();
                    $upd->do_upload();
                }else{
                    $fupdata = '';
                }




                $ket    = $_POST['KETERANGAN'.$MP];
                $kes    = $_POST['KESIMPULAN'.$MP];

                $hasil  = (isset($_POST['HASIL'.$MP]))? $_POST['HASIL'.$MP]:'';

                $plate  = (isset($_POST['PLATE'.$MP]))? $_POST['PLATE'.$MP]:'';
                $cvt    = (isset($_POST['CVT'.$MP]))? $_POST['CVT'.$MP]:'';
                $mct    = (isset($_POST['MCT'.$MP]))? $_POST['MCT'.$MP]:'';
                $bspair = (isset($_POST['BASEPAIR']))? $_POST['BASEPAIR']:'';

                $kpos   = (isset($_POST['KONTROL_POSITIF'.$MP]))? $_POST['KONTROL_POSITIF'.$MP]:'';
                $kneg   = (isset($_POST['KONTROL_NEGATIF'.$MP]))? $_POST['KONTROL_NEGATIF'.$MP]:'';
                $mock   = (isset($_POST['MOCK'.$MP]))? $_POST['MOCK'.$MP]:'';

                $jml_hsl= (isset($_POST['JmlData']))? $_POST['JmlData']:'0';
                $jml_pyk= (isset($_POST['JmlPenyakit']))? $_POST['JmlPenyakit']:'0';

                $noidp  = (isset($_POST['NO_ID_P']))? $_POST['NO_ID_P']:'0';


                switch($MP){
                    case '1':
                        $this->db->query("INSERT p_isolasi SET
                            P_ID        = $p_id,
                            GAMBAR_UPLOAD = '$fupgambar',
                            KETERANGAN  = '$ket',
                            KESIMPULAN  = '$kes'
                        ");
                    break;
                    case '2':
                        $this->db->query("INSERT p_pcr_konvensional SET
                            P_ID            = $p_id,
                            GAMBAR_UPLOAD   = '$fupgambar',
                            HASIL_ID        = $hasil,
                            BASE_PAIR       = '$bspair',
                            KONTROL_POSITIF = $kpos,
                            KONTROL_NEGATIF = $kneg,
                            MOCK            = $mock,
                            KETERANGAN      = '$ket',
                            KESIMPULAN      = '$kes'
                        ");
                    break;
                    case '3':
                        $this->db->query("INSERT p_pcr_realtime SET
                            P_ID            = $p_id,
                            GAMBAR_UPLOAD   = '$fupgambar',
                            HASIL_ID        = $hasil,
                            KONTROL_POSITIF = $kpos,
                            KONTROL_NEGATIF = $kneg,
                            MOCK            = $mock,
                            CVT             = '$cvt',
                            KETERANGAN      = '$ket',
                            KESIMPULAN      = '$kes'
                        ");
                    break;
                    case '4':
                        $this->db->query("INSERT p_pcr_realtime_multiplex SET
                            P_ID            = $p_id,
                            GAMBAR_UPLOAD   = '$fupgambar',
                            KONTROL_POSITIF = '$kpos',
                            KONTROL_NEGATIF = '$kneg',
                            MOCK            = '$mock',
                            KETERANGAN      = '$ket',
                            KESIMPULAN      = '$kes'
                        ");

                        $v=1;
                        $x=1;
                        while($_POST['JmlData']>=$v){
                            if(isset($_POST['Hasil'.$MP.$x])){
                                $this->db->query("INSERT h_prt_multiplex SET
                                    P_ID        = $p_id,
                                    HASIL_ID    = ".$_POST['Hasil'.$MP.$x].",
                                    CVT         = '".$_POST['CVT'.$MP.$x]."'
                                ");
                                $v++;
                            }
                            $x++;
                        }
                    break;
                    case '5':
                        $this->db->query("INSERT p_pcr_konvensional_multiplex SET
                            P_ID            = $p_id,
                            GAMBAR_UPLOAD   = '$fupgambar',
                            KONTROL_POSITIF = $kpos,
                            KONTROL_NEGATIF = $kneg,
                            MOCK            = $mock,
                            KETERANGAN      = '$ket',
                            KESIMPULAN      = '$kes'
                        ");

                        $v=1;
                        $x=1;
                        while($_POST['JmlData']>=$v){
                            if(isset($_POST['Hasil'.$MP.$x])){
                                $this->db->query("INSERT h_pk_multiplex SET
                                    P_ID        = $p_id,
                                    HASIL_ID    = ".$_POST['Hasil'.$MP.$x].",
                                    BASE_PAIR   = '".$_POST['BASE_PAIR'.$MP.$x]."'
                                ");
                                $v++;
                            }
                            $x++;
                        }
                    break;
                    case '6':
                        $this->db->query("INSERT p_luminex SET
                            P_ID            = $p_id,
                            DATA_UPLOAD     = '$fupdata',
                            GAMBAR_UPLOAD   = '$fupgambar',
                            KONTROL_POSITIF = $kpos,
                            KONTROL_NEGATIF = $kneg,
                            MOCK            = $mock,
                            KETERANGAN      = '$ket',
                            KESIMPULAN      = '$kes'
                        ");

                        $v=1;
                        $x=1;
                        while($_POST['JmlData']>=$v){

                            if(isset($_POST['Hasil'.$MP.$x])){
                                $this->db->query("INSERT h_luminex SET
                                    P_ID        = $p_id,
                                    HASIL_ID    = ".$_POST['Hasil'.$MP.$x].",
                                    MCT         = '".$_POST['MCT'.$MP.$x]."'
                                ");
                                $v++;

                            }
                            else{
                                $v++;
                            }

                            $x++;
                        }
                    break;
                    case '7':
                        $this->db->query("INSERT p_serologi SET
                            P_ID            = $p_id,
                            PLATE           = '$plate',
                            NO_ID_P         = $noidp,
                            KETERANGAN      = '$ket',
                            KESIMPULAN      = '$kes'
                        ");

                        $v=1;
                        $x=1;
                        while($_POST['JmlData']>=$v){
                            if(isset($_POST['Nama_'.$x])){
                                $this->db->query("INSERT p_isi_penyakit
                                    P_ID                = $p_id,
                                    DATA_PENYAKIT_ID    = ".$_POST['DATA_PENYAKIT_ID'.$MP.$x].",
                                    ISI_PENYAKIT        = ".$_POST['ISI_PENYAKIT'.$MP.$x]."
                                ");
                                $v++;
                            }
                            $x++;
                        }
                    break;
                    case '8':
                        $this->db->query("INSERT p_sequencing SET
                            P_ID        = $p_id,
                            GAMBAR_UPLOAD = $fupgambar,
                            DATA_UPLOAD = '$fupdata',
                            KETERANGAN  ='$ket',
                            KESIMPULAN  = '$kes'
                        ");
                    break;
                }
             }


				$this->db->query("INSERT p_pemeriksaan SET
                    NOBARCODE       ='$_POST[NoBarcode]',
                    PEMERIKSAAN_TGL ='$_POST[TGLperiksa]',
                    PETUGAS         ='$_POST[NmPetugas]',
                    id_metod        ='$_POST[MetodePenelitian]',
                    penelitian_id   = '{$this->data['penelitian']}',
                    lab_code        = '{$this->data['lab']}',
                    date_input      = date(now())
                    ");

				$this->data['status_periksa'] = "1"; // sukses
			}

			if ($this->data['status_periksa'] == "1") {
				unset($_POST);
			}


			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('pemeriksaan', $this->data, true);
			}

		$this->data['judul'] = 'Form pemeriksaan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file penerimaan.php */
/* Location: ./application/controllers/penerimaan.php */