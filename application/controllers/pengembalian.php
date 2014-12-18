<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class pengembalian extends main{
    
    function __construct(){
        parent::__construct();
        $this->load->helpers('kotak');
        $this->get_arr_revco();
        
        $this->data['getMethod']="?";
           
        $this->data['labcode'] = $this->session->userdata('lab');
        $this->data['NoPengembalian']   = isset($_REQUEST['NoPengembalian']) ? $_REQUEST['NoPengembalian']    : "";
        $this->data['NoPengambilan']    = isset($_REQUEST['NoPengambilan']) ? $_REQUEST['NoPengambilan']      : "";
        $this->data['TGLSerahTerima']   = isset($_REQUEST['TGLSerahTerima']) ? $_REQUEST['TGLSerahTerima']    : "";
        $this->data['YangMenyerahkan']  = isset($_REQUEST['YangMenyerahkan']) ? $_REQUEST['YangMenyerahkan']  : "";
        $this->data['YangMenerima']     = isset($_REQUEST['YangMenerima']) ? $_REQUEST['YangMenerima']        : "";
        $this->data['Ket']              = isset($_REQUEST['Ket']) ? $_REQUEST['Ket']                          : "";
        $this->data['Jumlah']           = isset($_REQUEST['Jumlah']) ? $_REQUEST['Jumlah']                    : "";
        $this->data['TglKembali']       = isset($_REQUEST['TglKembali']) ? $_REQUEST['TglKembali']            : "";
        $this->data['getMethod'] .= 'NoPengambilan='        .$this->data['NoPengambilan'].'&'
                                        .'NoPengembalian='  .$this->data['NoPengembalian'].'&'
                                        .'TGLSerahTerima='  .$this->data['TGLSerahTerima'].'&'
                                        .'YangMenyerahkan=' .$this->data['YangMenyerahkan'].'&'
                                        .'YangMenerima='    .$this->data['YangMenerima'].'&'
                                        .'Ket='             .$this->data['Ket'].'&'
                                        .'TglKembali='      .$this->data['TglKembali'].'&'
                                        .'Jumlah='          .$this->data['Jumlah'].'&';
                                        
                                        
        $idjml= isset($_POST['Jumlah']) ? $_POST['Jumlah'] : "0";
        for($i=1;$i<=$idjml;$i++){
                        $this->data['dt_ambil'][$i]['dt_barcode']   = isset($_REQUEST['dt_barcode'.$i])    ? $_REQUEST['dt_barcode'.$i]   : "";
                        $this->data['dt_ambil'][$i]['dt_tglterima'] = isset($_REQUEST['dt_tglterima'.$i])  ? $_REQUEST['dt_tglterima'.$i] : "";
                        $this->data['dt_ambil'][$i]['dt_kondisi']   = isset($_REQUEST['dt_kondisi'.$i])    ? $_REQUEST['dt_kondisi'.$i]   : "";
                        $this->data['dt_ambil'][$i]['dt_spesimen']  = isset($_REQUEST['dt_spesimen'.$i])   ? $_REQUEST['dt_spesimen'.$i]  : "";
                        $this->data['dt_ambil'][$i]['dt_status']    = isset($_REQUEST['dt_status'.$i])     ? $_REQUEST['dt_status'.$i]    : "";
                        $this->data['dt_ambil'][$i]['dt_kembali']   = isset($_REQUEST['dt_kembali'.$i])    ? $_REQUEST['dt_kembali'.$i]   : "";
                        $this->data['getMethod'] .= 
                        "dt_barcode$i=".$this->data['dt_ambil'][$i]['dt_barcode'].'&'
                        ."dt_tglterima$i=".$this->data['dt_ambil'][$i]['dt_tglterima'].'&'
                        ."dt_kembali$i=".$this->data['dt_ambil'][$i]['dt_kembali'].'&'
                        ."dt_kondisi$i=".$this->data['dt_ambil'][$i]['dt_kondisi'].'&'
                        ."dt_status$i=".$this->data['dt_ambil'][$i]['dt_status'].'&'
                        ."dt_spesimen$i=".$this->data['dt_ambil'][$i]['dt_spesimen'].'&'  
                        ;
                            
        }   
        
    }
    
    public function get_method(){
        echo $this->data['getMethod'];
    }
    
    public function pilih($id){
        $sql = "SELECT * FROM formpengambilan WHERE no_formpengambilan = '$id' AND status = 0";
        
        $query = $this->db->query($sql);
        $rows = $query->result_array();
        echo json_encode($rows);
    }
    
    public function getJumlah($id){
        $sql = "SELECT count(*) jumlah FROM formpengambilansampel WHERE no_formpengambilan ='$id' AND status =0";
        $query = $this->db->query($sql);
        $rows = $query->result_array();
        echo $rows[0]['jumlah'];
    }
    
    public function print_pengembalian(){
        $this->load->view('cetak_pengembalian',$this->data);
    }
    
    public function get_arr_formpengambilan(){
        $lab           = !empty($_REQUEST['lab'])?" LAB_CODE = '$_REQUEST[lab]' ":'';
        $nopengambilan = !empty($_REQUEST['nopengambilan'])?" no_formpengambilan = '$_REQUEST[nopengambilan]' ":'';
        $tglserahterima= !empty($_REQUEST['tglserahterima'])?" tgl_serahterima = '$_REQUEST[tglserahterima]' ":'';
        
        
        
        $sql = "SELECT * FROM formpengambilan WHERE status = 0 ";
        
         if(!empty($lab)){
            $sql .= " AND ";
            $sql .= " $lab ";
            if(!empty($nopengambilan)){
                $sql .= " AND $nopengambilan ";
                if(!empty($tglserahterima)){
                    $sql .= " AND $tglserahterima";
                }
            }else{
                if(!empty($tglserahterima)){
                    $sql .= " AND $tglserahterima";
                }
            }
        }else{
            if(!empty($nopengambilan)){
                $sql .= " AND $nopengambilan ";
                if(!empty($tglserahterima)){
                    $sql .= " AND $tglserahterima";
                }
            }else{
                if(!empty($tglserahterima)){
                    $sql .= " AND $tglserahterima";
                }
            }
        }
        
        $sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman2");
		laman2($this, $sql_count,20);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_formpengambilan'] = $rows;
    }
    
    public function getAmbil($id){
        $sql = "SELECT * FROM formpengambilansampel WHERE no_formpengambilan = '$id' AND status =0";
        $query = $this->db->query($sql);
        $rows = $query->result_array();
        if(isset($rows)){
            $i=1;
            foreach($rows as $value){
                echo"
                <tr>
                    <td>$i</td>
                    <td>
                        <input type='checkbox' value='1' name=\"dt_kembali$i\" id=\"dt_kembali$i\"/>
                    </td>
                    <td>$value[no_barcode] <input type=\"hidden\" id=\"dt_barcode$i\" name=\"dt_barcode$i\" value=\"$value[no_barcode]\" ></td>
                    <td>$value[tglterima] <input type=\"hidden\" id=\"dt_tglterima$i\" name=\"dt_tglterima$i\" value=\"$value[tglterima]\" ></td>
                    <td>$value[kondisi] <input type=\"hidden\" id=\"dt_kondisi$i\" name=\"dt_kondisi$i\" value=\"$value[kondisi]\" ></td>
                    <td>$value[spesimen] <input type=\"hidden\" id=\"dt_spesimen$i\" name=\"dt_spesimen$i\" value=\"$value[spesimen]\" ></td>
                    <td><center>
                        <select class=\"span7\" name=\"dt_status$i\" id=\"dt_status$i\">
                            <option value='0'>Di simpan kembali</option>
                            <option value='2'>Di musnahkan</option>
                            <option value='3'>Habis</option>
                        </select>
                        
                    </td>
                    
                </tr>
                ";
                $i++;
            }
            
                                
        }
    }
    
    public function get_laman(){
        $this->get_arr_formpengambilan();
        $laman= $this->data['laman'];
        
        echo "
        <div class=\"btn-group\">
									<span><strong>".$this->data['laman_row_awal']."-".$this->data['laman_row_akhir']."</strong> dari <strong>".$this->data['laman_jumlah']."</strong></span>
	   </div>
        <table class=\"table2 table2-striped table2-nomargin table2-mail\">
						<thead>
							<tr>
                                <th width=\"1.5%\">No.</th>
								<th width=\"13%\">No.Pengambilan</th>
								<th width=\"15%\" class='table-date'>Tgl. Serah Terima</th>
								<th width=\"10%\">Yang Menyerahkan</th>
								<th width=\"10%\">Yang Menerima</th>
								<th width=\"5%\"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
                        ";
                            $i=1;
                            if($this->data['arr_formpengambilan']==null){
                                echo'
                                    <tr><td colspan=7><center><b style="color:red">Tidak Ada Data</b></center></td></tr>
                                ';
                            }
                            foreach($this->data['arr_formpengambilan'] as $value){
                            echo'<tr id="tr'.$i.'">
                                <td><input type="text" id="'.$i.'" value="'.$i.'" style="border:none;width:15px;background:none" disabled></td>
                                <td><input type="text" id="nopengambilan'.$i.'" value="'.$value['no_formpengambilan'].'" style="border:none;width:auto;background:none" readonly="true"></td>
                                <td><input type="text" id="tgl_serahterima'.$i.'" value="'.$value['tgl_serahterima'].'" style="border:none;width:100px;background:none" readonly="true"></td>
                                <td><input type="text" id="yangmenerima'.$i.'" value="'.$value['yg_menyerahkan'].'" style="border:none;width:100px;background:none" readonly="true"></td>
                                <td><input type="text" id="yangmenyerahkan'.$i.'" value="'.$value['yg_menerima'].'" style="border:none;width:100px;background:none" readonly="true">
                                <input type="hidden" id="keterangan'.$i.'" value="'.$value['ket'].'" style="border:none;width:100px;background:none" readonly="true"></td></td>
                                <td>
                                    <a id="pilih'.$i.'" href="#" class="btn" onclick="pilih(\''.$value['no_formpengambilan'].'\')">Pilih</a>
                                </td>
                            </tr>
                            ';
                            $i++;
                            }
                            
                            echo"
                        </tbody>
                    </table>
        <div class='btn-group'>
									<a href='#' onclick=\"get_pengambilan(1)\" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick=\"get_pengambilan(".($laman-1).")\" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick=\"get_pengambilan($laman)\" class='button button-basic button-icon' ><i> $laman  </i></a>
									<a href='#' onclick=\"get_pengambilan(".($laman+1).")\" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick=\"get_pengambilan(".-1 .")\" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
        ";
    }
    
    public function index(){
        parent::index();
        $this->data['status_pengembalian']=0;
        $date = date('Y/m/d H:i:s');
        $labcode = $this->session->userdata('lab');
        if (isset($_POST['status_pengembalian'])) {
            if($_POST['status_pengembalian']==0){
                $this->db->query("
                    INSERT formpengembalian SET
                    no_formpengembalian = '$_POST[NoPengembalian]',
                    no_formpengambilan  = '$_POST[NoPengambilan]',
                    tgl_kembali         = '$_POST[TglKembali]',
                    date_input          = '$date',
                    LAB_CODE            = '$labcode'
                ");
                
                
                $idjml=$_POST['Jumlah'];
                //if($idjml>0){
                    for($i=1;$i<=$idjml;$i++){
                        
                        
                        if($this->data['dt_ambil'][$i]['dt_kembali']==1){
                            echo $_POST['dt_kembali'.$i].$this->data['dt_ambil'][$i]['dt_kembali'];
                            $sql="
                                UPDATE formpenerimaanbox SET
                                status = ".$_POST['dt_status'.$i]."
                                WHERE no_barcode = '".$_POST['dt_barcode'.$i]."'
                            ";
                            $this->db->query($sql);
                            
                            
                            //if($this->data['Jumlah']<1){
                                
                            //}
                             
                             $sql3="
                                UPDATE formpengambilansampel SET
                                status = 1
                                WHERE no_barcode = '".$_POST['dt_barcode'.$i]."'";
                             $this->db->query($sql3);
                        }
                        
                    }
                    $s = "SELECT COUNT(*) jml FROM formpengambilansampel WHERE no_formpengambilan = '".$_POST['NoPengambilan']."' AND status = 0";
                    $query = $this->db->query($s);
                    $rows = $query->result_array();
                    if($rows[0]['jml']==0){
                        $sql2="
                                UPDATE formpengambilan SET
                                status = 1
                                WHERE no_formpengambilan = '".$_POST['NoPengambilan']."'";
                                $this->db->query($sql2);
                    }
                    
                        
                    //}
                //}else if($_POST['status_pengembalian']==2){
                    //$doc=$this->print_pengambilan();
                }
                $this->data['status_pengembalian'] = "1";
                if($this->data['status_pengembalian'] == "1"){
                    unset($_POST);
            }
        }
    	if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
			$this->data['area_body'] = $this->load->view('404',$this->data, true);
		} else {
			$this->data['area_body'] = $this->load->view('pengembalian', $this->data, true);
		}
			
		// $this->data['area_body'] = $this->load->view('penerimaan', $this->data, true);
		$this->data['judul'] = 'Form Pengambilan';
		$this->load->view('layout', $this->data);
        //if($_POST['status_pengembalian']==2) $this->print_pengambilan();
    }
}