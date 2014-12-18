
<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    include("main.php");

class list_pemeriksaan extends main {

    var $data;
    var $datahome;

    public function get_arr_hasil(){
        $query = $this->db->query("SELECT * FROM p_cb_hasil");
        $rows = $query->result_array();
        $this->data['arr_hasil']=$rows;
    }

    public function get_arr_pemeriksaan(){
        $sql = '';
        $sql_detail= '';
        $metod_id   = isset($_REQUEST['MetodePenelitian'])?$_REQUEST['MetodePenelitian']:'';
        $tgl_awal   = isset($_REQUEST['tglawal'])?$_REQUEST['tglawal']:'';
        $tgl_akhir  = isset($_REQUEST['tglakhir'])?$_REQUEST['tglakhir']:'';
        $provinsi   = isset($_REQUEST['Propinsi'])?$_REQUEST['Propinsi']:'0';
        $hal        = isset($_REQUEST['halaman'])?$_REQUEST['halaman']:'1';
        $spesimen   = isset($_REQUEST['JenisSpesimen'])?$_REQUEST['JenisSpesimen']:'0';
        $level      = $this->data['level'];

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
            case 3:
                    $sql = "SELECT
                        	t3.PCR_REALTIME_ID,
                        	t3.GAMBAR_UPLOAD,
                        	t3.HASIL_ID,
                        	t3.CVT,
                        	t3.KONTROL_POSITIF,
                        	t3.KONTROL_NEGATIF,
                        	t3.MOCK,
                        	t3.KETERANGAN,
                        	t3.KESIMPULAN,
                        	t1.P_ID,
                        	t1.id_metod,
                        	t1.PEMERIKSAAN_TGL,
                        	t1.PETUGAS,
                        	t1.lab_code,
                        	t1.penelitian_id,
                        	t1.date_input,
                        	t2.formpenerimaan_id,
                        	t2.propinsi_id,
                        	t2.kabupaten_id,
                        	t2.kecamatan_id,
                        	t2.kelurahan_id,
                        	t2.no_stiker,
                        	t2.no_barcode,
                        	t2.institusi_kode,
                        	t2.penelitian_kode,
                        	t2.namaART,
                        	t2.umurART,
                        	t2.JK,
                        	t2.alamatART,
                        	t2.spesimen_kode,
                        	t2.kondisispesimen_id,
                        	t2.visit,
                        	t2.suhudtg,
                        	t2.volspesiment,
                        	t2.jumspesimen,
                        	t2.site_kode,
                        	t2.simpanspesimen_id,
                        	t2.tgl_kirim,
                        	t2.nama_pengirim,
                        	t2.tgl_ambil,
                        	t2.tgl_terima,
                        	t2.AWB,
                        	t2.ket,
                        	t2.jumaliquot,
                        	t2.LAB_CODE,
                        	t1.NOBARCODE
                        FROM
                        	p_pemeriksaan AS t1
                        INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                        INNER JOIN p_pcr_realtime AS t3 ON t3.P_ID = t1.P_ID";
                break;
            case 4:
                $sql = "SELECT
                        t2.formpenerimaan_id,
                        t2.propinsi_id,
                        t2.kabupaten_id,
                        t2.kecamatan_id,
                        t2.kelurahan_id,
                        t2.no_stiker,
                        t2.institusi_kode,
                        t2.penelitian_kode,
                        t2.namaART,
                        t2.umurART,
                        t2.JK,
                        t2.alamatART,
                        t2.spesimen_kode,
                        t2.kondisispesimen_id,
                        t2.visit,
                        t2.suhudtg,
                        t2.volspesiment,
                        t2.jumspesimen,
                        t2.site_kode,
                        t2.simpanspesimen_id,
                        t2.tgl_kirim,
                        t2.nama_pengirim,
                        t2.tgl_ambil,
                        t2.tgl_terima,
                        t2.AWB,
                        t2.ket,
                        t2.jumaliquot,
                        t2.LAB_CODE,
                        t3.PRT_M_ID,
                        t3.GAMBAR_UPLOAD,
                        t3.KONTROL_POSITIF,
                        t3.KONTROL_NEGATIF,
                        t3.MOCK,
                        t3.KETERANGAN,
                        t3.KESIMPULAN,
                        t1.P_ID,
                        t1.NOBARCODE,
                        t1.id_metod,
                        t1.PEMERIKSAAN_TGL,
                        t1.PETUGAS,
                        t1.lab_code,
                        t1.penelitian_id,
                        t1.date_input
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                        INNER JOIN p_pcr_realtime_multiplex AS t3 ON t3.P_ID = t1.P_ID
                        ";
                $sql_detail = '
                            SELECT
                            t2.formpenerimaan_id,
                            t2.propinsi_id,
                            t2.kabupaten_id,
                            t2.kecamatan_id,
                            t2.kelurahan_id,
                            t2.no_stiker,
                            t2.institusi_kode,
                            t2.penelitian_kode,
                            t2.namaART,
                            t2.umurART,
                            t2.JK,
                            t2.alamatART,
                            t2.spesimen_kode,
                            t2.kondisispesimen_id,
                            t2.visit,
                            t2.suhudtg,
                            t2.volspesiment,
                            t2.jumspesimen,
                            t2.site_kode,
                            t2.simpanspesimen_id,
                            t2.tgl_kirim,
                            t2.nama_pengirim,
                            t2.tgl_ambil,
                            t2.tgl_terima,
                            t2.AWB,
                            t2.ket,
                            t2.jumaliquot,
                            t2.LAB_CODE,
                            t4.H_PRT_ID,
                            t4.CVT,
                            t5.HASIL_ID,
                            t5.HASIL_NM,
                            t3.PRT_M_ID,
                            t3.GAMBAR_UPLOAD,
                            t3.KONTROL_POSITIF,
                            t3.KONTROL_NEGATIF,
                            t3.MOCK,
                            t3.KETERANGAN,
                            t3.KESIMPULAN,
                            t1.P_ID,
                            t1.NOBARCODE,
                            t1.id_metod,
                            t1.PEMERIKSAAN_TGL,
                            t1.PETUGAS,
                            t1.lab_code,
                            t1.penelitian_id,
                            t1.date_input
                            FROM
                            p_pemeriksaan AS t1
                            INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                            INNER JOIN p_pcr_realtime_multiplex AS t3 ON t3.P_ID = t1.P_ID
                            INNER JOIN h_prt_multiplex AS t4 ON t4.P_ID = t3.P_ID
                            INNER JOIN p_cb_hasil AS t5 ON t4.HASIL_ID = t5.HASIL_ID';
                break;
            case 5:
                $sql = "SELECT
                        t2.formpenerimaan_id,
                        t2.propinsi_id,
                        t2.kabupaten_id,
                        t2.kecamatan_id,
                        t2.kelurahan_id,
                        t2.no_stiker,
                        t2.institusi_kode,
                        t2.penelitian_kode,
                        t2.namaART,
                        t2.umurART,
                        t2.JK,
                        t2.alamatART,
                        t2.spesimen_kode,
                        t2.kondisispesimen_id,
                        t2.visit,
                        t2.suhudtg,
                        t2.volspesiment,
                        t2.jumspesimen,
                        t2.site_kode,
                        t2.simpanspesimen_id,
                        t2.tgl_kirim,
                        t2.nama_pengirim,
                        t2.tgl_ambil,
                        t2.tgl_terima,
                        t2.AWB,
                        t2.ket,
                        t2.jumaliquot,
                        t2.LAB_CODE,
                        t1.P_ID,
                        t1.NOBARCODE,
                        t1.id_metod,
                        t1.PEMERIKSAAN_TGL,
                        t1.PETUGAS,
                        t1.lab_code,
                        t1.penelitian_id,
                        t1.date_input,
                        t3.PK_M_ID,
                        t3.GAMBAR_UPLOAD,
                        t3.KONTROL_POSITIF,
                        t3.KONTROL_NEGATIF,
                        t3.MOCK,
                        t3.KETERANGAN,
                        t3.KESIMPULAN
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                        INNER JOIN p_pcr_konvensional_multiplex AS t3 ON t1.P_ID = t3.P_ID
                        ";
                $sql_detail="SELECT
                            t2.formpenerimaan_id,
                            t2.propinsi_id,
                            t2.kabupaten_id,
                            t2.kecamatan_id,
                            t2.kelurahan_id,
                            t2.no_stiker,
                            t2.institusi_kode,
                            t2.penelitian_kode,
                            t2.namaART,
                            t2.umurART,
                            t2.JK,
                            t2.alamatART,
                            t2.spesimen_kode,
                            t2.kondisispesimen_id,
                            t2.visit,
                            t2.suhudtg,
                            t2.volspesiment,
                            t2.jumspesimen,
                            t2.site_kode,
                            t2.simpanspesimen_id,
                            t2.tgl_kirim,
                            t2.nama_pengirim,
                            t2.tgl_ambil,
                            t2.tgl_terima,
                            t2.AWB,
                            t2.ket,
                            t2.jumaliquot,
                            t2.LAB_CODE,
                            t1.P_ID,
                            t1.NOBARCODE,
                            t1.id_metod,
                            t1.PEMERIKSAAN_TGL,
                            t1.PETUGAS,
                            t1.lab_code,
                            t1.penelitian_id,
                            t1.date_input,
                            t3.PK_M_ID,
                            t3.GAMBAR_UPLOAD,
                            t3.KONTROL_POSITIF,
                            t3.KONTROL_NEGATIF,
                            t3.MOCK,
                            t3.KETERANGAN,
                            t3.KESIMPULAN,
                            t4.H_PK_ID,
                            t4.BASE_PAIR,
                            t5.HASIL_ID,
                            t5.HASIL_NM
                            FROM
                            p_pemeriksaan AS t1
                            INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                            INNER JOIN p_pcr_konvensional_multiplex AS t3 ON t1.P_ID = t3.P_ID
                            INNER JOIN h_pk_multiplex AS t4 ON t3.P_ID = t4.P_ID
                            INNER JOIN p_cb_hasil AS t5 ON t4.HASIL_ID = t5.HASIL_ID";
                break;
            case 6:
                $sql = "SELECT
                            t2.formpenerimaan_id,
                            t2.propinsi_id,
                            t2.kabupaten_id,
                            t2.kecamatan_id,
                            t2.kelurahan_id,
                            t2.no_stiker,
                            t2.institusi_kode,
                            t2.penelitian_kode,
                            t2.namaART,
                            t2.umurART,
                            t2.JK,
                            t2.alamatART,
                            t2.spesimen_kode,
                            t2.kondisispesimen_id,
                            t2.visit,
                            t2.suhudtg,
                            t2.volspesiment,
                            t2.jumspesimen,
                            t2.site_kode,
                            t2.simpanspesimen_id,
                            t2.tgl_kirim,
                            t2.nama_pengirim,
                            t2.tgl_ambil,
                            t2.tgl_terima,
                            t2.AWB,
                            t2.ket,
                            t2.jumaliquot,
                            t2.LAB_CODE,
                            t1.P_ID,
                            t1.NOBARCODE,
                            t1.id_metod,
                            t1.PEMERIKSAAN_TGL,
                            t1.PETUGAS,
                            t1.lab_code,
                            t1.penelitian_id,
                            t1.date_input,
                            t3.LUMINEX_ID,
                            t3.DATA_UPLOAD,
                            t3.GAMBAR_UPLOAD,
                            t3.KONTROL_POSITIF,
                            t3.KONTROL_NEGATIF,
                            t3.MOCK,
                            t3.KETERANGAN,
                            t3.KESIMPULAN
                            FROM
                            p_pemeriksaan AS t1
                            INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                            INNER JOIN p_luminex AS t3 ON t1.P_ID = t3.P_ID
                            ";
                $sql_detail = "SELECT
                            t2.formpenerimaan_id,
                            t2.propinsi_id,
                            t2.kabupaten_id,
                            t2.kecamatan_id,
                            t2.kelurahan_id,
                            t2.no_stiker,
                            t2.institusi_kode,
                            t2.penelitian_kode,
                            t2.namaART,
                            t2.umurART,
                            t2.JK,
                            t2.alamatART,
                            t2.spesimen_kode,
                            t2.kondisispesimen_id,
                            t2.visit,
                            t2.suhudtg,
                            t2.volspesiment,
                            t2.jumspesimen,
                            t2.site_kode,
                            t2.simpanspesimen_id,
                            t2.tgl_kirim,
                            t2.nama_pengirim,
                            t2.tgl_ambil,
                            t2.tgl_terima,
                            t2.AWB,
                            t2.ket,
                            t2.jumaliquot,
                            t2.LAB_CODE,
                            t1.P_ID,
                            t1.NOBARCODE,
                            t1.id_metod,
                            t1.PEMERIKSAAN_TGL,
                            t1.PETUGAS,
                            t1.lab_code,
                            t1.penelitian_id,
                            t1.date_input,
                            t3.LUMINEX_ID,
                            t3.DATA_UPLOAD,
                            t3.GAMBAR_UPLOAD,
                            t3.KONTROL_POSITIF,
                            t3.KONTROL_NEGATIF,
                            t3.MOCK,
                            t3.KETERANGAN,
                            t3.KESIMPULAN,
                            t4.H_LUMINEX_ID,
                            t4.MCT,
                            t5.HASIL_ID,
                            t5.HASIL_NM
                            FROM
                            p_pemeriksaan AS t1
                            INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                            INNER JOIN p_luminex AS t3 ON t1.P_ID = t3.P_ID
                            INNER JOIN h_luminex AS t4 ON t4.P_ID = t3.P_ID
                            INNER JOIN p_cb_hasil AS t5 ON t5.HASIL_ID = t4.HASIL_ID";
                break;
            case 7:
                $sql = "SELECT
                            t2.formpenerimaan_id,
                            t2.propinsi_id,
                            t2.kabupaten_id,
                            t2.kecamatan_id,
                            t2.kelurahan_id,
                            t2.no_stiker,
                            t2.institusi_kode,
                            t2.penelitian_kode,
                            t2.namaART,
                            t2.umurART,
                            t2.JK,
                            t2.alamatART,
                            t2.spesimen_kode,
                            t2.kondisispesimen_id,
                            t2.visit,
                            t2.suhudtg,
                            t2.volspesiment,
                            t2.jumspesimen,
                            t2.site_kode,
                            t2.simpanspesimen_id,
                            t2.tgl_kirim,
                            t2.nama_pengirim,
                            t2.tgl_ambil,
                            t2.tgl_terima,
                            t2.AWB,
                            t2.ket,
                            t2.jumaliquot,
                            t2.LAB_CODE,
                            t1.NOBARCODE,
                            t1.id_metod,
                            t1.PEMERIKSAAN_TGL,
                            t1.PETUGAS,
                            t1.lab_code,
                            t1.penelitian_id,
                            t1.date_input,
                            t3.SEROLOGI_ID,
                            t3.NO_ID_P,
                            t3.NO_STIKER,
                            t3.PLATE,
                            t3.JK,
                            t3.KESIMPULAN,
                            t3.KETERANGAN,
                            t3.P_ID
                            FROM
                            p_pemeriksaan AS t1
                            INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                            INNER JOIN p_serologi AS t3 ON t1.P_ID = t3.P_ID

                            ";
                $sql_detail = "
                            SELECT
                            t2.formpenerimaan_id,
                            t2.propinsi_id,
                            t2.kabupaten_id,
                            t2.kecamatan_id,
                            t2.kelurahan_id,
                            t2.no_stiker,
                            t2.institusi_kode,
                            t2.penelitian_kode,
                            t2.namaART,
                            t2.umurART,
                            t2.JK,
                            t2.alamatART,
                            t2.spesimen_kode,
                            t2.kondisispesimen_id,
                            t2.visit,
                            t2.suhudtg,
                            t2.volspesiment,
                            t2.jumspesimen,
                            t2.site_kode,
                            t2.simpanspesimen_id,
                            t2.tgl_kirim,
                            t2.nama_pengirim,
                            t2.tgl_ambil,
                            t2.tgl_terima,
                            t2.AWB,
                            t2.ket,
                            t2.jumaliquot,
                            t2.LAB_CODE,
                            t1.NOBARCODE,
                            t1.id_metod,
                            t1.PEMERIKSAAN_TGL,
                            t1.PETUGAS,
                            t1.lab_code,
                            t1.penelitian_id,
                            t1.date_input,
                            t3.SEROLOGI_ID,
                            t3.NO_ID_P,
                            t3.NO_STIKER,
                            t3.PLATE,
                            t3.JK,
                            t3.KESIMPULAN,
                            t3.KETERANGAN,
                            t3.P_ID,
                            p_isi_penyakit.ISI_PENYAKIT_ID,
                            p_isi_penyakit.DATA_PENYAKIT_ID,
                            p_isi_penyakit.ISI_PENYAKIT,
                            p_data_penyakit.PENYAKIT_ID,
                            p_data_penyakit.NAMA_DATA_PENYAKIT,
                            p_penyakit.NAMA_PENYAKIT
                            FROM
                                    p_pemeriksaan AS t1
                            INNER JOIN formpenerimaan AS t2 ON t2.no_barcode = t1.NOBARCODE
                            INNER JOIN p_serologi AS t3 ON t1.P_ID = t3.P_ID
                            INNER JOIN p_isi_penyakit ON t3.P_ID = p_isi_penyakit.P_ID
                            INNER JOIN p_data_penyakit ON p_data_penyakit.DATA_PENYAKIT_ID = p_isi_penyakit.DATA_PENYAKIT_ID
                            INNER JOIN p_penyakit ON p_data_penyakit.PENYAKIT_ID = p_penyakit.PENYAKIT_ID

                            ";

                break;
            case 8:
                $sql = "SELECT
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
                        t3.LAB_CODE,
                        t1.P_ID,
                        t1.NOBARCODE,
                        t1.id_metod,
                        t1.PEMERIKSAAN_TGL,
                        t1.PETUGAS,
                        t1.lab_code,
                        t1.penelitian_id,
                        t1.date_input,
                        t2.SEQUENCING_ID,
                        t2.DATA_UPLOAD,
                        t2.GAMBAR_UPLOAD,
                        t2.KETERANGAN,
                        t2.KESIMPULAN
                        FROM
                        formpenerimaan AS t3
                        INNER JOIN p_pemeriksaan AS t1 ON t3.no_barcode = t1.NOBARCODE
                        INNER JOIN p_sequencing AS t2 ON t1.P_ID = t2.P_ID

                ";
                break;
        }
        
        if($sql!=''){
            $sql .= " WHERE penelitian_id LIKE '{$this->data['penelitian']}'";
         }
        if($tgl_awal != '' && $tgl_akhir != ''){
            $tgl_aw = date_parse_from_format('d/m/Y',$tgl_awal);
            $tgl_ak = date_parse_from_format('d/m/Y',$tgl_akhir);
            $tgl_awal = $tgl_aw['year'].'-'.$tgl_aw['month'].'-'.$tgl_aw['day'];
            $tgl_akhir = $tgl_ak['year'].'-'.$tgl_ak['month'].'-'.$tgl_ak['day'];
            $sql .= "AND STR_TO_DATE(tgl_terima,'%d/%m/%Y')  BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if($provinsi != 0 ){
           $pos = strpos($sql,'WHERE');
            if($pos !== false){
                $sql .= " AND propinsi_id = '$provinsi' ";
            }else{
                $sql .= " WHERE propinsi_id = '$provinsi' ";
            }
        }
        if($spesimen != '0' ){
            $pos = strpos($sql,'WHERE');
            if($pos !== false){
                $sql .= " AND spesimen_kode = '$spesimen' ";
            }else{
                $sql .= " WHERE spesimen_kode = '$spesimen' ";
            }
        }
        
        


        if(trim($sql)!=''){
            $sql_count = str_replace("SELECT", "SELECT count(*) jumlah, ", $sql);
            $this->load->helper("laman2");
            laman2($this, $sql_count,10);

            $sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
            $query = $this->db->query($sql);
            $rows = $query->result_array();
            $arr_pemeriksaan=$rows;
            if($sql_detail !="" ){
                echo "<form name=printv id=printv action='{$this->data['application_path']}/export_pemeriksaan' method=post><input name=sqltread id='sqltread' type='hidden' value=\"$sql_detail\"/></form>";
            }else{
                echo "<form name=printv id=printv action='{$this->data['application_path']}/export_pemeriksaan' method=post><input name=sqltread id='sqltread' type='hidden' value=\"$sql\"/></form>";
            }

            $laman= $this->data['laman'];
        }


            if (empty($arr_pemeriksaan)) {
                echo '<tr><td colspan="6"><center><b style="color:red;"> Data Kosong. </b><center></td></tr>';
            }

            else{

                switch($metod_id){
                    case 1:

                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                                    $no = 1;
                                    foreach($arr_pemeriksaan as $value){

                                        ?>
            								<tr id='id_1_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;

                                                        foreach($value as $v => $key){
                                                           echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                                                        }
                                                   ?>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                  
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button>Download</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
                                        if (!($level == 1 || $level == 2))
                                            echo "
                                            <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',1)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                            ";
                                        if ($level == 9 && $level==5 && $level==5)
                                            echo"
                                            <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',1)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                            <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',1)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                        										";
                                        ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                                        $no++;
                                    }
                                    ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                    case 2:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_2_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;


                                                        foreach($value as $v => $key){
                                                            if(is_null($key)||empty($key)) $key="";
                                                            echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                                                        }
                                                    ?>

                                                </td>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button>Download</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
//                            if (!($level == 1 || $level == 2))
//                                echo "
//                                        											<a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
//                                ";
                            if ($level == 9 && $level==5)
                                echo"
                                <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',2)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_2=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',2)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                        										";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                    case 3:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_3_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;


                            foreach($value as $v => $key){
                                if(is_null($key)||empty($key)) $key="";
                                echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                            }
                            ?>

                                                </td>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button>Download</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
                            if (!($level == 1 || $level == 2))
                                echo "
                                        											<a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                ";
                            if ($level == 9 && $level==5)
                                echo"
                                <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',3)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_3=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',3)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                        										";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                    case 4:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_4_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;


                            foreach($value as $v => $key){
                                if(is_null($key)||empty($key)) $key="";
                                echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                            }
                            ?>

                                                </td>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button>Download</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
                            if (!($level == 1 || $level == 2))
                                echo "
                                        											<a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                ";
                            if ($level == 9 && $level==5)
                                echo"
                                    <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',4)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_4=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                    <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',4)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                ";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                    case 5:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_5_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;


                            foreach($value as $v => $key){
                                if(is_null($key)||empty($key)) $key="";
                                echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                            }
                            ?>

                                                </td>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button>Download</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
                            if (!($level == 1 || $level == 2))
                                echo "
                                        											<a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_5=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                ";
                            if ($level == 9 && $level==5)
                                echo"
                                    <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',5)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_4=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                    <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',5)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                        										";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                    case 6:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_6_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;


                            foreach($value as $v => $key){
                                if(is_null($key)||empty($key)) $key="";
                                echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                            }
                            ?>

                                                </td>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button class="button button-basic button-icon">Download Gambar</button></a>
                                                    <a href="<?php echo $value['DATA_UPLOAD'];?>"><button class="button button-basic button-icon">Download Data</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
                            if (!($level == 1 || $level == 2))
                                echo "
                                        											<a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                ";
                            if ($level == 3)
                                echo"
                                 <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',6)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_6=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                 <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',6)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                           										";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                    case 7:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>            								
											<th width='15%'><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_7_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;

                            foreach($value as $v => $key){
                                if(is_null($key)||empty($key)) $key="";
                                echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                            }
                            ?>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td>
            									<center>
            										<div class="btn-group">
            											<?php
                            if (!($level == 1 || $level == 2))
                                echo "
                                      <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                ";
                            if ($level == 9 && $level==5)
                                echo"
                                <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',7)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_3=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',7)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php

                        ;
                        break;
                    case 8:
                        ?>
                            <table class="table2 table2-striped table2-nomargin table2-mail">
            						<thead>
            							<tr>
            								<th width="1.5%">No.</th>
            								<th width="10%">No Barcode</th>
            								<th width="10%">No.Stiker</th>
            								<th width="10%">Gambar</th>
            								<th width="10%">Download</th>
            								<th width="15%"><center>Action</center></th>
            							</tr>
            						</thead>
            						<tbody>
                            <?php
                        $no = 1;
                        foreach($arr_pemeriksaan as $value){

                            ?>
            								<tr id='id_8_<?php echo $value['P_ID']; ?>'>
            									<td>
            										<?php echo $no;


                            foreach($value as $v => $key){
                                if(is_null($key)||empty($key)) $key="";
                                echo "<input type=\"hidden\" name=\"$v\" value=\"$key\" />";
                            }
                            ?>

                                                </td>
            									<td class='table-icon'>
            										<?php echo $value['NOBARCODE']; ?>
            									</td>
            									<td class='table-fixed-medium'>
                                                    <?php echo $value['no_stiker']; ?>
                                                </td>
                                                <td class='table-fixed-medium'>
                                                    <img src='<?php echo $value['GAMBAR_UPLOAD'];?>' height="50"/>
                                                </td>
            									<td class='table-fixed-medium'>
                                                    <a href="<?php echo $value['GAMBAR_UPLOAD'];?>"><button class="button button-basic button-icon">Download Gambar</button></a>
                                                    <a href="<?php echo $value['DATA_UPLOAD'];?>"><button class="button button-basic button-icon">Download Data</button></a>
            									</td>


            									<td>
            									<center>
            										<div class="btn-group">
            											<?php
                            if (!($level == 1 || $level == 2))
                                echo "
                                <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}')\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"View\" id_revco=\"{$value['P_ID']}\"><i class=\"icon-eye-open\"></i></a>
                                ";
                            if ($level == 9 && $level==5)
                                echo"
                                <a href=\"#\" onclick=\"open_dialog('{$value['P_ID']}',8)\" id=\"dialog-link\" data-toggle=\"modal\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Edit\" id_8=\"{$value['P_ID']}\"><i class=\"icon-exclamation-sign\"></i></a>
                                <a href=\"#\" onclick=\"delete_link('{$value['P_ID']}',8)\" class='button button-basic button-icon' rel=\"tooltip\" title=\"Delete\"><i class=\"icon-trash\"></i></a>
                                        										";
                            ?>
            										</div>
            									</center>
            									</td>
            								</tr>
            							<?php
                            $no++;
                        }
                        ?>
                            </tbody>
                            </table>
                                <div class='btn-group'>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman-1);?>)" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick="get_penerimaan(<?=$laman;?>)" class='button button-basic button-icon' ><i> <?=$laman;?>  </i></a>
									<a href='#' onclick="get_penerimaan(<?=($laman+1);?>)" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick="get_penerimaan(1)" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
                            <?php
                        ;
                        break;
                }


            }

    }

    public function get_laman(){

        $metode_id  = $_REQUEST['metode_id'];
        $provinsi   = $_REQUEST['prov'];
        $t_awal     = $_REQUEST['tgl_awal'];
        $t_akhir    = $_REQUEST['tgl_akhir'];

        $this->get_arr_pemeriksaan();
    }

    public function del($id){
        $this->db->query('delete from k_revco where id_revco=?', array($id));

        echo"<script>location.href='{$this->data['application_path']}/list_revco';</script>";
    }

    public function get_arr_metode(){
        $query=  $this->db->query("select * from metode order by id_metod");
        $rows=  $query->result_array();
        $this->data['arr_metode']=$rows;
    }

    public function get_arr_spesimen(){
        $query=  $this->db->query("select * from spesimen order by spesimen_name");
        $rows=  $query->result_array();
        $this->data['arr_spesimen']=$rows;
    }

    public function get_arr_detail(){
        $method_id = isset($_REQUEST['MetodePenelitian'])?$_REQUEST['MetodePenelitian']:'';
        $p_id      = isset($_REQUEST['P_ID'])?$_REQUEST['P_ID']:'';
        switch($method_id){
            case 4:
                $sql = "SELECT
                        t4.H_PRT_ID,
                        t4.CVT,
                        t3.PRT_M_ID,
                        t1.P_ID,
                        t1.NOBARCODE,
                        t5.HASIL_NM
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN p_pcr_realtime_multiplex AS t3 ON t3.P_ID = t1.P_ID
                        INNER JOIN h_prt_multiplex AS t4 ON t4.P_ID = t3.P_ID
                        INNER JOIN p_cb_hasil AS t5 ON t4.HASIL_ID = t5.HASIL_ID
                        WHERE t1.P_ID='$p_id'";
                break;
            case 5:
                $sql = "SELECT
                        t1.P_ID,
                        t1.NOBARCODE,
                        t3.PK_M_ID,
                        t4.H_PK_ID,
                        t4.BASE_PAIR,
                        t5.HASIL_ID,
                        t5.HASIL_NM
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN p_pcr_konvensional_multiplex AS t3 ON t1.P_ID = t3.P_ID
                        INNER JOIN h_pk_multiplex AS t4 ON t3.P_ID = t4.P_ID
                        INNER JOIN p_cb_hasil AS t5 ON t4.HASIL_ID = t5.HASIL_ID
                        WHERE t1.P_ID='$p_id'";
                break;
            case 6:
                $sql = "SELECT
                        t1.P_ID,
                        t1.NOBARCODE,
                        t3.LUMINEX_ID,
                        t4.H_LUMINEX_ID,
                        t4.MCT,
                        t5.HASIL_ID,
                        t5.HASIL_NM
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN p_luminex AS t3 ON t1.P_ID = t3.P_ID
                        INNER JOIN h_luminex AS t4 ON t4.P_ID = t3.P_ID
                        INNER JOIN p_cb_hasil AS t5 ON t5.HASIL_ID = t4.HASIL_ID
                        WHERE t1.P_ID='$p_id'";
                break;
            case 7:
                $sql = "SELECT
                        t1.NOBARCODE,
                        t3.SEROLOGI_ID,
                        t3.P_ID,
                        p_isi_penyakit.ISI_PENYAKIT_ID,
                        p_isi_penyakit.DATA_PENYAKIT_ID,
                        p_data_penyakit.PENYAKIT_ID,
                        p_data_penyakit.NAMA_DATA_PENYAKIT,
                        p_penyakit.NAMA_PENYAKIT,
                        p_isi_penyakit.ISI_PENYAKIT
                        FROM
                        p_pemeriksaan AS t1
                        INNER JOIN p_serologi AS t3 ON t1.P_ID = t3.P_ID
                        INNER JOIN p_isi_penyakit ON t3.P_ID = p_isi_penyakit.P_ID
                        INNER JOIN p_data_penyakit ON p_data_penyakit.DATA_PENYAKIT_ID = p_isi_penyakit.DATA_PENYAKIT_ID
                        INNER JOIN p_penyakit ON p_data_penyakit.PENYAKIT_ID = p_penyakit.PENYAKIT_ID
                        WHERE t1.P_ID='$p_id'";
                break;
        }
        $query = $this->db->query($sql);
        $rows = $query->result_array();
        echo "<table class=\"table2 table2-striped table2-nomargin table2-mail\">";
        switch($p_id){
            case 4: case 5: case 6:
                echo'<thead><tr>
            		<th width="1.5%">No.</th>
                        <th width="10%">Hasil</th>
                        <th width="10%">CVT</th>
                        <th width="15%"><center>Action</center></th>
                        </tr>
                    </thead><tbody>';
                $no = 1;
                foreach($value as $rows){
                    echo'<tr>';
                    echo'<td>';
                    echo'<select id="HASIL'.$no.'" name="HASIL'.$no.'" class="span3">';
                        foreach($this->data['arr_hasil'] as $val){
                            echo"<option value={$val['HASIL_ID']}".($val['HASIL_ID']==$value['HASIL_ID']?'selected':'').">{$val['HASIL_NM']}</option>";
                        }
                    echo'</select>';
                    echo'</td>';
                    echo'<td><input name="CVT'.$no.'" value="'.$value['CVT'].'"></td>';
                    echo'</tr>';
                    $no++;
                }
                echo '</tbody>';
                break;
        }
        
    }
    
    public function index()
    {
        parent::index();
        $this->get_arr_metode();
        $this->get_arr_hasil();
        $this->get_arr_pemeriksaan();
        $this->get_arr_spesimen();
        $this->data['status_revco'] = "0"; // default


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
