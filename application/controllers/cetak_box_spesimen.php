<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	include("main.php");
	class cetak_box_spesimen extends main{
		var $data;
		var $datahome;
		
		public function index(){
			parent::index();
			$this->data['status_cetak']=0;
			
		}
		
				public function cetak_isi_box($no_box,$no_rack,$no_revco){
                    $i=0;
                    $arr_umur= array();
//			$query = $this->db->query("SELECT formpenerimaan.umurART, formpenerimaanbox.formpenerimaanbox_id, formpenerimaanbox.no_barcode, formpenerimaanbox.no_aliquote, formpenerimaanbox.no_penyimpanan, formpenerimaanbox.no_rack, formpenerimaanbox.type_box, k_box.no_box, k_box.id_box, k_revco.no_revco, k_rak.no_rak, typebox.panjang, typebox.lebar, typebox.typebox_name, formpenerimaanbox.no_kotak
//                                                            FROM formpenerimaanbox INNER JOIN typebox ON typebox.typebox_id = formpenerimaanbox.type_box
//										   INNER JOIN k_revco ON k_revco.id_revco = formpenerimaanbox.no_penyimpanan
//                                                                                   INNER JOIN k_rak   ON k_rak.id_rak = formpenerimaanbox.no_rack
//                                                                                   INNER JOIN k_box   ON k_box.id_box = formpenerimaanbox.no_box
//                                                                                   INNER JOIN formpenerimaan ON formpenerimaan.no_barcode = formpenerimaanbox.no_barcode
//                                                                                   WHERE formpenerimaanbox.no_box = '$no_box' AND formpenerimaanbox.no_rack= '$no_rack' AND formpenerimaanbox.no_penyimpanan='$no_revco'");
			$query = $this->db->query("SELECT formpenerimaanbox.formpenerimaanbox_id, formpenerimaanbox.no_barcode, formpenerimaanbox.no_aliquote, k_box.no_box, k_box.id_box, k_box.no_rak, k_revco.no_revco,  typebox.panjang, typebox.lebar, typebox.typebox_name, formpenerimaanbox.no_kotak
                                                                                    FROM formpenerimaanbox
                                                                                    INNER JOIN k_box   ON k_box.id_box = formpenerimaanbox.id_box
                                                                                    INNER JOIN k_revco ON k_revco.id_revco = k_box.id_revco
                                                                                    inner join typebox on typebox.typebox_id=k_box.typebox_id 
                                                                                    WHERE formpenerimaanbox.id_box = '$no_box' AND k_box.no_rak = '$no_rack' AND k_box.id_revco = '$no_revco'");
                        
                        $jmlbaris = $query->num_rows();
                        if($jmlbaris<1){
                            $query = $this->db->query("SELECT * FROM k_box INNER JOIN typebox ON typebox.typebox_id = k_box.typebox_id 
                                                                           INNER JOIN k_revco ON k_revco.id_revco = $no_revco
                                                                           WHERE id_box = '$no_box'");
                        }
                        $rows=$query->result_array();
                        
                        if($jmlbaris>0){
                            foreach($rows as $value){
                                $query1 = $this->db->query("SELECT umurART FROM formpenerimaan WHERE no_barcode = '$value[no_barcode]'");
                                $rows1 = $query1->result_array();
                                $arr_umur[$value['no_kotak']]['no_kotak']=$value['no_kotak'];
                                $arr_umur[$value['no_kotak']]['no_barcode']=$value['no_barcode'];
                                if(($query1->num_rows)>0){
                                    $arr_umur[$value['no_kotak']]['umur']=$rows1[0]['umurART'];
                                }else{
                                    $arr_umur[$value['no_kotak']]['umur']=0;
                                }
                                
                                
                            }
                            
                        }
                        
                        
                        $this->data['no_revco']=$rows[0]['no_revco'];
                        $this->data['no_rack'] = isset($rows[0]['no_rack'])? $rows[0]['no_rack'] : $no_rack ;
                         
			$this->data['no_box']=$rows[0]['no_box'];
			$this->data['tanggal']=date('d-m-Y');
                        $this->data['panjang'] = $rows[0]['panjang'];
                        $this->data['lebar'] = $rows[0]['lebar'];
			$this->data['kapasitas']=$this->data['panjang'] ." X ". $this->data['lebar'];
                        $this->data['arr_box']=$rows;
			$this->data['arr_umur']=$arr_umur;
                        $this->load->view('cetak_box_spesimen',$this->data);
			
			
    			
			
		}
	
	
	}
        