<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('main.php');

class pengambilan extends main{
    function __construct(){
        parent::__construct();
        $this->load->helpers('kotak');
        $this->get_arr_revco();
    }
    
    public function get_arr_formpenerimaan()
	{  
	   
	   $nobarcode = !empty($_REQUEST['nobarcode'])?" no_barcode = '$_REQUEST[nobarcode]' ":'';
       $tglterima = !empty($_REQUEST['tglterima'])?" tgl_terima = '$_REQUEST[tglterima]' ":'';
		// $sql = " SELECT * FROM formhasil where kode_lab LIKE '%{$this->data['lab']}%' 
			// AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
		$sql = "SELECT * FROM formpenerimaan
        LEFT JOIN kondisispesimen ON formpenerimaan.kondisispesimen_id = kondisispesimen.kondisispesimen_id  
        LEFT JOIN spesimen ON formpenerimaan.spesimen_kode = spesimen.spesimen_kode
        INNER JOIN formpenerimaanbox ON formpenerimaanbox.no_barcode = formpenerimaan.no_barcode
        ";
        if(!empty($nobarcode)&&!empty($tglterima)){
            $sql .= " WHERE ";
            $sql .= $nobarcode . ' AND ' . $tglterima;
        }else if(!empty($nobarcode)||!empty($tglterima)){
            $sql .= " WHERE ";
            $sql .= $nobarcode.$tglterima;
        }
        
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman2");
		laman2($this, $sql_count,10);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_formpenerimaan'] = $rows;
		
	}
    
    public function get_laman(){
        $this->get_arr_formpenerimaan();
        $laman= $this->data['laman'];
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
								<th width=\"15%\"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
                        ";
                            $i=1;
                            foreach($this->data['arr_formpenerimaan'] as $value){
                            echo'<tr>
                                <td>'.$i.'</td>
                                <td>'.$value['no_barcode'].'</td>
                                <td>'.$value['tgl_terima'].'</td>
                                <td>'.$value['kondisispesimen_name'].'</td>
                                <td>'.$value['spesimen_name'].'</td>
                                <td>'.$value['status'].'</td>
                                <td>
                                    <button class=\"btn\">Ambil</button>
                                    <button class=\"btn\">Kotak</button>
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
    
    
    public function index(){
        parent::index();
    	if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
			$this->data['area_body'] = $this->load->view('404',$this->data, true);
		} else {
			$this->data['area_body'] = $this->load->view('pengambilan', $this->data, true);
		}
			
		// $this->data['area_body'] = $this->load->view('penerimaan', $this->data, true);
		$this->data['judul'] = 'Form Pengambilan';
		$this->load->view('layout', $this->data);
    }
}