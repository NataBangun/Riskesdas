<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class frm_kwitansi_pemeriksaan_air extends main {

	function __construct(){
        parent::__construct();        
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

	public function get_arr_t_pengujian_sampel()
	{			
		$this->data['search'] = $this->input->post('search');
		$sql = "SELECT * FROM t_pengujian_sampel where T_PENGUJIAN_SAMPEL_ID LIKE '%{$this->data['search']}%'";
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_t_pengujian_sampel'] = $rows;
		
	}
			
		    public function get_arr_kwitansi($id){
                $query=  $this->db->query("select * from t_pengujian_sampel_detail where T_PENGUJIAN_SAMPEL_ID='$id'");
                $rows=  $query->result_array();
                return $rows;
        }
		
		public function ajax_sampel($id){
											$no = 1;
											$arr=$this->get_arr_kwitansi($id);
											foreach($arr as $value):
										?>
											<tr id='level_<?php echo $value['NO_SAMPEL']; ?>'>
												<td>
													<?php echo $no ?>
												</td>
												<td class='table-icon'>
													<?php echo $value['NO_SAMPEL']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['JENIS_AIR']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['TANGGAL']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['ALAMAT']; ?>
												</td>
												<td class='table-fixed-medium'>
													<?php echo $value['KEDALAMAN']; ?>
												</td>
												<td>
												<center>
												<div class='tn-group'>		
												<input type='checkbox' id='select' name='select[]' value='<?php echo $value['NO_SAMPEL']?>' />
												</div>
												</center>
												</td>
											</tr>
										<?php
											$no++;
											endforeach;
					}
        //public function tampilTabel($id=1){
			//$query = $this->db->query("SELECT * FROM t_pengujian_sampel_detail where T_PENGUJIAN_SAMPEL_ID='$id'");
			//$rows = $query->result_array();				
			//$this->data['arr_penerimaan'] = $rows;
            //echo "
				//<tr>
					//<th width='12%' align='center'>NO</th>
					//<th width='12%' align='center'>No Sampel</th>
					//<th width='12%' align='center'>Jenis Air</th>
					//<th width='12%' align='center'>Tanggal</th>
					//<th width='15%' align='center'>Alamat</th>
					//<th width='12%' align='center'>Kedalaman</th>
					//<th width='15%'>Action</th>
				//</tr>
			   //";
			//foreach($this->data['arr_penerimaan'] as $value){
				//echo"
				//<tr>
					//<td align='center'>
				//		<input type='hidden' name='T_PENGUJIAN_SAMPEL_ID' ID='T_PENGUJIAN_SAMPEL_ID' value='$value[T_PENGUJIAN_SAMPEL_ID]'/>
			//			$value[T_PENGUJIAN_SAMPEL_ID]
					//</td>
					//<td align='center'>
					//	<input type='hidden' name='no'>
		//				$value[NO_SAMPEL]
//					</td>
	//				<td align='center'>
		//				$value[JENIS_AIR]
			//		</td>
				//	<td align='center'>
					//	$value[TANGGAL]
					//</td>
//					<td align='center'>
	//					$value[ALAMAT]
		//			</td>
			//		<td align='center'>
				//		$value[KEDALAMAN]
					//</td>
//					<td>
	//					<center>
		//					<div clas='tn-group'>
	      //      <input type='checkbox' name='select[]' value='$value[T_PENGUJIAN_SAMPEL_ID]' onclick='' />
                    
			//				</div>
				//		</center>
					//</td>
				//</tr>
				
//			   ";
	//		}
      //  }
        
        
			
        
	public function print_pengujian()
	{	
		$data['arr'] = $_POST;
		$and='';
		extract($_POST);
		foreach($_POST['select'] as $key => $val){
			if($key>0) $and .= ' OR ';
			$and .= ' NO_SAMPEL = \''.$val.'\'';
			
		}
		$query=$this->db->query("select * from v_pengujian_sampel where $and ");
		$data['row']=$query->result_array();
		$this->load->view('print_kwitansi',$data);
    }
        
	public function del($Id="") {
		
		$this->db->query('DELETE from formpenerimaan where formpenerimaan_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_penerimaan';</script>";
	}
	
	public function index()
	{
		parent::index();
		$this->get_arr_t_pengujian_sampel();

		$this->data['status_pengujian'] = "0"; // default
			
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('frm_kwitansi_pemeriksaan_air', $this->data, true);
			}
		$this->data['judul'] = 'Form Kwitansi';
		$this->load->view('layout', $this->data);
	}
}