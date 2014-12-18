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
	
        public function get_arr_metode(){
                $query=  $this->db->query("select * from metode ORDER BY id_metod");
                $rows=  $query->result_array();
                $this->data['arr_metode']=$rows;
        }
        
        public function get_arr_penerimaan()
	{	
		$query = $this->db->query('SELECT * FROM formpenerimaan');
		$rows = $query->result_array();				
		$this->data['arr_penerimaan'] = $rows;
	}
        
    public function get_metode($metode){
		if(isset($metode)){
			switch ($metode) {
				case 1:
					echo "
					<form method='POST' id='frm1' name='export' enctype='multipart/form-data' action='".$this->data['application_path']."/import/index/' class='form-horizontal'>
						<div class='control-group'>
							<label for='textfield' class='control-label'></label>
							<div class='controls'>
								<div class='fileupload fileupload-new' data-provides='fileupload'>
									<div class='fileupload-new thumbnail' style='width: 200px; height: 150px;'><img src='".$this->data['application_path']."/img/no+image.gif' /></div>
									<div class='fileupload-preview fileupload-exists thumbnail' style='max-width: 200px; max-height: 150px; line-height: 20px;'></div>
									<div>
										<span class='button button-basic btn-file'><span class='fileupload-new'>Select image</span>
										<span class='fileupload-exists'>Change</span><input type='file' /></span>
										<a href='#' class='button button-basic fileupload-exists' data-dismiss='fileupload'>Remove</a>
									</div>
								</div>
							</div>
						</div>
						
							
						
						
						<div class='control-group'>
							<label for='Hasil' class='control-label'>Hasil</label>
							<div class='controls controls-row'>
								<select name='Hasil' id='Hasil' class='span3'>
									<option value='1'>1 - Positif</option>
									<option value='2'>2 - Negatif</option>
									<option value='3'>3 - Borderline</option>
									<option value='4'>4 - Diulang</option>
								</select> 
								<label for='CT' class='control-label'>CT</label>
								<input type='text' name='CT' class='mask_wkt span1'/>
							</div>
						</div>
						
						<div class='control-group'>
							<label for='KontrolPositif' class='control-label'>Kontrol Positif</label>
							<div class='controls controls-row'>
								<select name='KontrolPositif' id='KontrolPositif' class='span3'>
									<option value='1'>1 - Ok</option>
									<option value='2'>2 - Kontaminan</option>
									<option value='3'>3 - Tidak Ada</option>
								</select>
							</div>
						</div>
						
						<div class='control-group'>
							<label for='KontrolNegatif' class='control-label'>Kontrol Negatif</label>
							<div class='controls controls-row'>
								<select name='KontrolNegatif' id='KontrolNegatif' class='span3'>
									<option value='1'>1 - Ok</option>
									<option value='2'>2 - Kontaminan</option>
									<option value='3'>3 - Tidak Ada</option>
								</select>
							</div>
						</div>
						
						<div class='control-group'>
							<label for='Mock' class='control-label'>Mock</label>
							<div class='controls controls-row'>
								<select name='Mock' id='Mock' class='span3'>
									<option value='1'>1 - Ok</option>
									<option value='2'>2 - Kontaminan</option>
									<option value='3'>3 - Tidak Ada</option>
								</select>
							</div>
						</div>
					</form>
					";
					break;
				case 2:
					
				break;
				
				default:
					echo "";
					break;
			}
		}
    }
   
	public function index()
	{	
		parent::index();             
                $this->get_arr_metode();
                $this->data['status_periksa'] = "0"; // default
			
			$this->data['status_periksa'] = "0"; // default
			$date = date('Y/m/d H:i:s');
            $labcode = $this->session->userdata('lab');
			if (isset($_POST['status_periksa'])) {
				$fup = (isset($_FILES['Fup']))? $_FILES['Fup']:'';
				
				if($fup!=''){
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					if (in_array($extension, $allowedExts)){
							if (file_exists("upload/" . $_FILES["file"]["name"]))
      						{
      							echo $_FILES["file"]["name"] . " already exists. ";
      						}
    						else
      						{
      							move_uploaded_file($_FILES["file"]["tmp_name"],
      							"upload/" . $_FILES["file"]["name"]);
      							echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      						}
					}		
				}else{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
				}
				
				
				
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query("INSERT formpemeriksaan SET 
                    no_barcode='$_POST[NoBarcode]',
                    tgl_pemeriksaan='$_POST[TGLperiksa]',
                    nm_petugas='$_POST[NmPetugas]',
                    id_metod='$_POST[MetodePenelitian]',
                    hasil='$_POST[Hasil]',
                    d_file='$fup',
                    k_positif='$_POST[KontrolPositif]',
                    k_negatif='$_POST[KontrolNegatif]',
                    ct='$_POST[CT]',
                    mock='$_POST[Mock],
                    LAB_CODE = '$labcode',
                    date_input ='$date' 
                    ");
                    
				$this->data['status_periksa'] = "1"; // sukses
			}
			
			if ($this->data['status_periksa'] == "1") {
				unset($_POST);
			}

		
			/*if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('pemeriksaan', $this->data, true);
			}*/
			
		$this->data['area_body'] = $this->load->view('pemeriksaan', $this->data, true);
		$this->data['judul'] = 'Form pemeriksaan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file penerimaan.php */
/* Location: ./application/controllers/penerimaan.php */