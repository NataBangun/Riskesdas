
<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    include("main.php");

class list_pemeriksaan extends main {

    var $data;
    var $datahome;

    public function get_arr_revcojenis(){
        $query = $this->db->query("SELECT * FROM k_revco_jenis");
        $rows = $query->result_array();
        $this->data['arr_revcojenis']=$rows;
    }

    public function get_arr_pemeriksaan($metod_id){
        $sql = '';
        switch($metod_id){
            case 1:
                $sql = "SELECT
                        t1.P_ID,
                        t1.id_metod,
                        t1.PEMERIKSAAN_TGL,
                        t1.PETUGAS,
                        t1.lab_code,
                        t1.penelitian_id,
                        t1.date_input,
                        t2.ISOLASI_ID,
                        t2.GAMBAR_UPLOAD,
                        t2.KETERANGAN,
                        t2.KESIMPULAN,
                        t3.formpenerimaan_id,
                        t3.propinsi_id,
                        t3.kabupaten_id,
                        t3.kecamatan_id,
                        t3.kelurahan_id,
                        t3.no_stiker,
                        t3.institusi_kode,
                        t3.penelitian_kode,
                        t3.namaART,
                        t3.umurART,
                        t3.JK,
                        t3.alamatART,
                        t3.spesimen_kode,
                        t3.kondisispesimen_id,
                        t3.visit,
                        t3.suhudtg,
                        t3.volspesiment,
                        t3.jumspesimen,
                        t3.site_kode,
                        t3.simpanspesimen_id,
                        t3.tgl_kirim,
                        t3.nama_pengirim,
                        t3.tgl_ambil,
                        t3.tgl_terima,
                        t3.AWB,
                        t3.ket,
                        t3.jumaliquot,
                        t1.NOBARCODE
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN p_isolasi AS t2 ON t1.P_ID = t2.P_ID
                        INNER JOIN formpenerimaan AS t3 ON t3.no_barcode = t1.NOBARCODE";
                break;

            case 2:
                $sql = "SELECT
                        t1.P_ID,
                        t1.NOBARCODE,
                        t1.id_metod,
                        t1.PEMERIKSAAN_TGL,
                        t1.PETUGAS,
                        t1.lab_code,
                        t1.penelitian_id,
                        t1.date_input,
                        t2.PCR_KONVENSIONAL_ID,
                        t2.GAMBAR_UPLOAD,
                        t2.HASIL_ID,
                        t2.BASE_PAIR,
                        t2.KONTROL_POSITIF,
                        t2.KONTROL_NEGATIF,
                        t2.MOCK,
                        t2.KETERANGAN,
                        t2.KESIMPULAN,
                        t3.formpenerimaan_id,
                        t3.propinsi_id,
                        t3.kabupaten_id,
                        t3.kecamatan_id,
                        t3.kelurahan_id,
                        t3.no_stiker,
                        t3.institusi_kode,
                        t3.penelitian_kode,
                        t3.namaART,
                        t3.umurART,
                        t3.JK,
                        t3.alamatART,
                        t3.spesimen_kode,
                        t3.kondisispesimen_id,
                        t3.visit,
                        t3.suhudtg,
                        t3.volspesiment,
                        t3.jumspesimen,
                        t3.site_kode,
                        t3.simpanspesimen_id,
                        t3.tgl_kirim,
                        t3.nama_pengirim,
                        t3.tgl_ambil,
                        t3.tgl_terima,
                        t3.AWB,
                        t3.ket,
                        t3.jumaliquot
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN p_pcr_konvensional AS t2 ON t1.P_ID = t2.P_ID
                        INNER JOIN formpenerimaan AS t3 ON t1.NOBARCODE = t3.no_barcode
                        ";
                break;


        }

        $query = $this->db->query($sql);
        $rows = $query->result_array();
        $this->data['arr_pemeriksaan']=$rows;
    }

    public function del($id=""){
        $this->db->query('delete from k_revco where id_revco=?', array($id));

        echo"<script>location.href='{$this->data['application_path']}/list_revco';</script>";
    }

    public function get_arr_metode(){
        $query=  $this->db->query("select * from metode order by id_metod");
        $rows=  $query->result_array();
        $this->data['arr_metode']=$rows;
    }

    public function index()
    {
        parent::index();
        $this->get_arr_metode();
        $this->get_arr_revcojenis();
        $this->get_arr_pemeriksaan(1);

        $this->data['status_revco'] = "0"; // default

        if (isset($_POST['status_revco'])) {
            // 1. update Data
            // var_dump($this->db);
            $this->db->query('update k_revco set no_revco=?, kapasitas_rak=? where id_revco=?',
            	array($_POST['hNoRevco'], $_POST['kapasitas_rak'], $_POST['id_revco']));

            $this->data['status_revco'] = "1"; // sukses

            $this->get_arr_revco();

        }

        if ($this->data['status_revco'] == "1") {
            unset($_POST);
        }


        if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
            $this->data['area_body'] = $this->load->view('404',$this->data, true);
        } else {
            $this->data['area_body'] = $this->load->view('list_pemeriksaan', $this->data, true);
        }
        // $this->data['area_body'] = $this->load->view('list_bm02', $this->data, true);
        $this->data['judul'] = 'Form List Pemeriksaan';
        $this->load->view('layout', $this->data);
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
