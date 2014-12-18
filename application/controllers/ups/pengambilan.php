<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('main.php');

class pengambilan extends main{
    function __construct(){
        parent::__construct();
        $this->load->helpers('kotak');
        $this->get_arr_revco();
        
        $this->data['getMethod']="?";
        
        $this->data['labcode'] = $this->session->userdata('lab');
        $this->data['NoPengambilan']    = isset($_REQUEST['NoPengambilan']) ? htmlspecialchars($_REQUEST['NoPengambilan']): "";
        $this->data['TGLSerahTerima']   = isset($_REQUEST['TGLSerahTerima']) ? htmlspecialchars($_REQUEST['TGLSerahTerima']): "";
        $this->data['YangMenyerahkan']  = isset($_REQUEST['YangMenyerahkan']) ? $_REQUEST['YangMenyerahkan']  : "";
        $this->data['YangMenerima']     = isset($_REQUEST['YangMenerima']) ? $_REQUEST['YangMenerima']        : "";
        $this->data['Ket']              = isset($_REQUEST['Ket']) ? $_REQUEST['Ket']                          : "";
        $this->data['Jumlah']           = isset($_REQUEST['Jumlah']) ? $_REQUEST['Jumlah']                    : "";
        
        $this->data['getMethod'] .= 'NoPengambilan='.$this->data['NoPengambilan'].'&'
                                        .'TGLSerahTerima='.$this->data['TGLSerahTerima'].'&'
                                        .'YangMenyerahkan='.$this->data['YangMenyerahkan'].'&'
                                        .'YangMenerima='.$this->data['YangMenerima'].'&'
                                        .'Ket='.$this->data['Ket'].'&'
                                        .'Jumlah='.$this->data['Jumlah'].'&';
                                        
                                        
        $idjml= isset($_POST['IdJumlah']) ? $_POST['IdJumlah'] : "0";
        for($i=1;$i<=$idjml;$i++){
                        $this->data['dt_ambil'][$i]['no_barcode']   = isset($_REQUEST['no_barcode'.$i])    ? $_REQUEST['no_barcode'.$i]   : "";
                        $this->data['dt_ambil'][$i]['dt_tglterima'] = isset($_REQUEST['dt_tglterima'.$i])  ? $_REQUEST['dt_tglterima'.$i] : "";
                        $this->data['dt_ambil'][$i]['dt_kondisi']   = isset($_REQUEST['dt_kondisi'.$i])    ? $_REQUEST['dt_kondisi'.$i]   : "";
                        $this->data['dt_ambil'][$i]['dt_spesimen']  = isset($_REQUEST['dt_spesimen'.$i])   ? $_REQUEST['dt_spesimen'.$i]  : "";
                        $this->data['getMethod'] .= 
                        "no_barcode$i=".$this->data['dt_ambil'][$i]['no_barcode'].'&'
                        ."dt_tglterima$i=".$this->data['dt_ambil'][$i]['dt_tglterima'].'&'
                        ."dt_kondisi$i=".$this->data['dt_ambil'][$i]['dt_kondisi'].'&'
                        ."dt_spesimen$i=".$this->data['dt_ambil'][$i]['dt_spesimen'].'&'  
                        ;
                            
        }   
        $this->data['getMethod'].='ambilJumlah='.$i.'&';
        
    }
    
    public function get_method(){
        echo $this->data['getMethod'];
    }
    
    public function get_lab_name(){
        
    }
    
     public function peneliti($idlab=""){
            $query = $this->db->query("select * from penelitian where lab_Id = '$idlab'");
            $rows = $query->result_array();
            $this->data['penelitian']=$rows;
            //var_dump($rows);
            
            ?>
            <select name="Penelitian" id="Penelitian" class='span3'>
        		<option value=""> - Silakan Pilih Penelitian - </option>
        		<?php foreach($rows as $value): ?>
        		<option value="<?php echo $value['penelitian_kode'] ?>"><?php echo $value['penelitian_kode'] ?> - <?php echo $value['penelitian_name'] ?></option>
        		<?php endforeach; ?>
    		</select>
            <?php
        }
    
    public function get_arr_formpenerimaan()
	{  
	   $lab       = !empty($_REQUEST['lab'])?" LAB_CODE = '$_REQUEST[lab]' ":'';
	   $nobarcode = !empty($_REQUEST['nobarcode'])?" no_barcode = '$_REQUEST[nobarcode]' ":'';
       $tglterima = !empty($_REQUEST['tglterima'])?" tgl_terima = '$_REQUEST[tglterima]' ":'';
	
        $sql = " SELECT * FROM formpenerimaan 
             LEFT JOIN kondisispesimen ON formpenerimaan.kondisispesimen_id = kondisispesimen.kondisispesimen_id  
             LEFT JOIN spesimen ON formpenerimaan.spesimen_kode = spesimen.spesimen_kode ";
        
        if(!empty($lab)){
            $sql .= " WHERE ";
            $sql .= " $lab ";
            if(!empty($nobarcode)){
                $sql .= " AND $nobarcode ";
                if(!empty($tglterima)){
                    $sql .= " AND $tglterima";
                }
            }else{
                if(!empty($tglterima)){
                    $sql .= " AND $tglterima";
                }
            }
        }else{
            if(!empty($nobarcode)){
                $sql .= " WHERE $nobarcode ";
                if(!empty($tglterima)){
                    $sql .= " AND $tglterima";
                }
            }else{
                if(!empty($tglterima)){
                    $sql .= " WHERE $tglterima";
                }
            }
        }
        
        
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman2");
		laman2($this, $sql_count,10);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_formpenerimaan'] = $rows;
        $i = 0;
        foreach($rows as $value){
            $sql2 = "SELECT * FROM formpenerimaanbox WHERE no_barcode = '{$value['no_barcode']}'";
            $qry2 = $this->db->query($sql2);
            $rows2 = $qry2->result_array();
            if(empty($rows2)){
                
            }else{
                $this->data['arr_formpenerimaan'][$i] = array_merge($rows2[0],$this->data['arr_formpenerimaan'][$i]);
                $i++;
            }
        }
		
	}
    
    public function get_laman(){
        $this->get_arr_formpenerimaan();
        $laman= $this->data['laman'];
        $dataambil = explode(',',$_REQUEST['dataambil']);
        echo "
        <div class=\"btn-group\">
									<span><strong>".$this->data['laman_row_awal']."-".$this->data['laman_row_akhir']."</strong> dari <strong>".$this->data['laman_jumlah']."</strong></span>
	   </div>
        <table class=\"table2 table2-striped table2-nomargin table2-mail\">
						<thead>
							<tr>
								<th width=\"1.5%\">No.</th>
								<th width=\"15%\">No Barcode</th>
								<th width=\"10%\" class='table-date'>Tgl. Terima</th>
								<th width=\"10%\">Kondisi</th>
								<th width=\"10%\">Jenis</th>
                                <th width=\"2%\">Status</th>
								<th width=\"300\"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
                        ";
                            $i=1;
                            if($this->data['arr_formpenerimaan']==null){
                                echo'
                                    <tr><td colspan=7><center><b style="color:red">Tidak Ada Data</b></center></td></tr>
                                ';
                            }
                            foreach($this->data['arr_formpenerimaan'] as $value){
                            echo'<tr id="tr'.$i.'">
                                <td><input type="text" id="'.$i.'" value="'.$i.'" style="border:none;width:15px;background:none" disabled></td>
                                <td><input type="text" id="nobarcode'.$i.'" value="'.$value['no_barcode'].'" style="border:none;width:auto;background:none" disabled></td>
                                <td><input type="text" id="tgl_terima'.$i.'" value="'.$value['tgl_terima'].'" style="border:none;width:50px;background:none" disabled></td></td>
                                <td><input type="text" id="kondisi'.$i.'" value="'.(isset($value['kondisispesimen_name'])?$value['kondisispesimen_name']:'-').'" style="border:none;width:100px;background:none" disabled></td></td>
                                <td><input type="text" id="spesimen'.$i.'" value="'.$value['spesimen_name'].'" style="border:none;width:100px;background:none" disabled></td></td>
                                <td>';
                                switch(isset($value['status'])?$value['status']:'')
                                {
                                    case 0 :echo'Tersedia';break;
                                    case 1 :echo'Diambil';break;
                                    case 2 :echo'Dimusnahkan';break;
                                    default:echo'Tidak Ada';break;    
                                }
                            echo'</td>
                                <td>
                                    ';
                                    if(!in_array($value['no_barcode'],$dataambil)){
                                        echo ((isset($value['status'])==0)?'<a id="ambil'.$i.'" href="#" class="btn" onclick="ambil('.$i.')">Ambil</a>':'');
                                    }
                                    '
                                </td>
                            </tr>
                            ';
                            $i++;
                            }
                            
                            echo"
                        </tbody>
                    </table>
        <div class='btn-group'>
									<a href='#' onclick=\"get_penerimaan(1)\" class='button button-basic button-icon' ><i>First</i></a>
									<a href='#' onclick=\"get_penerimaan(".($laman-1).")\" class='button button-basic button-icon' ><i>Previous</i></a>
									<a href='#' onclick=\"get_penerimaan($laman)\" class='button button-basic button-icon' ><i> $laman  </i></a>
									<a href='#' onclick=\"get_penerimaan(".($laman+1).")\" class='button button-basic button-icon' ><i>Next</i></a>
									<a href='#' onclick=\"get_penerimaan(".-1 .")\" class='button button-basic button-icon' ><i>Last</i></a>
								</div>
        ";
    }
    
    public function print_pengambilan(){
        $this->load->view('cetak_pengambilan',$this->data);
    }
    
    public function index(){
        parent::index();
        $this->get_arr_penelitian();
        
        $this->data['status_pengambilan']=0;
        $date = date('Y/m/d H:i:s');
        $labcode = $this->data['lab'];
        $penelitiancode = $this->data['penelitian'];
        if (isset($_POST['status_pengambilan'])) {
            if($_POST['status_pengambilan']==0){
                $this->db->query("
                    INSERT formpengambilan SET
                    no_formpengambilan  = '$_POST[NoPengambilan]',
                    tgl_serahterima     = '$_POST[TGLSerahTerima]',
                    yg_menyerahkan      = '$_POST[YangMenyerahkan]',
                    yg_menerima         = '$_POST[YangMenerima]',
                    ket                 = '$_POST[Ket]',
                    date_input          = '$date',
                    LAB_CODE            = '$_POST[LabPenelitian]',
                    penelitian_kode     = '$_POST[Penelitian]'
                ");
                $idjml=$_POST['Jumlah'];
                //$idjml=$_POST['IdJumlah'];
                if($idjml>0){
                    for($i=1;$i<=$idjml;$i++){
                        
                        $no_barcode     = (isset($_POST['no_barcode'.$i]))?" no_barcode ='".$_POST['no_barcode'.$i]."' ":'';
                        $dt_tglterima   = (isset($_POST['dt_tglterima'.$i]))?", tglterima ='".$_POST['dt_tglterima'.$i]."' ":'';
                        $dt_kondisi     = (isset($_POST['dt_kondisi'.$i]))?", kondisi ='".$_POST['dt_kondisi'.$i]."' ":'';
                        $dt_spesimen    = (isset($_POST['dt_spesimen'.$i]))?", spesimen ='".$_POST['dt_spesimen'.$i]."' ":'';
                        if(isset($no_barcode)&&!empty($no_barcode)&&$no_barcode!=''){
                            $this->db->query("
                                UPDATE formpenerimaanbox SET
                                status = 1
                                WHERE no_barcode = '".$_POST['no_barcode'.$i]."'
                            ");
                            $this->db->query("
                                INSERT formpengambilansampel SET
                                no_formpengambilan = '$_POST[NoPengambilan]',
                                $no_barcode
                                $dt_tglterima
                                $dt_kondisi
                                $dt_spesimen
                            ");
                        }
                        
                    }
                        
                    }
                //}else if($_POST['status_pengambilan']==2){
                    //$doc=$this->print_pengambilan();
                }
                $this->data['status_pengambilan'] = "1";
                if($this->data['status_pengambilan'] == "1"){
                    unset($_POST);
            }
        }
    	if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
			$this->data['area_body'] = $this->load->view('404',$this->data, true);
		} else {
			$this->data['area_body'] = $this->load->view('ups/pengambilan', $this->data, true);
		}
			
		// $this->data['area_body'] = $this->load->view('penerimaan', $this->data, true);
		$this->data['judul'] = 'Form Pengambilan';
		$this->load->view('layout', $this->data);
        //if($_POST['status_pengambilan']==2) $this->print_pengambilan();
    }
}