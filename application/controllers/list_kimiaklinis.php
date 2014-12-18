<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_kimiaklinis extends main {

	var $data;
	var $datahome;
	
	// public function get_arr_kimiaklinis()
	// {	
		// $query = $this->db->query("SELECT * FROM formhasil where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		// $rows = $query->result_array();				
		// $this->data['arr_kimiaklinis'] = $rows;
	// }
	
	public function get_arr_kimiaklinis()
	{			
		$this->data['search'] = $this->input->post('search');
		$sql = " SELECT * FROM formhasil where no_stiker LIKE '%{$this->data['search']}%' AND kode_lab LIKE '%{$this->data['lab']}%' 
			AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_kimiaklinis'] = $rows;
		
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from formhasil where formhasil_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_kimiaklinis';</script>";
	}
	
	public function index()
	{
		parent::index();
		$this->get_arr_kimiaklinis();

			$this->data['status_addformhasil'] = "0"; // default
			
			if (isset($_POST['status_addformhasil'])) {
				// 1. update Data
				// var_dump($this->db);
				$_POST['Kreatinin'] = str_replace(",", ".", $_POST['Kreatinin']);
				$this->db->query("update formhasil set propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?,
						NamaART=?, Umur=?, JK=?, no_stiker=?, TGL_periksa=?, alamat=?, karakter=?, TtlKolestrol=?, HDLKolestrol=?, LDLKolestrol=?, Trigliserida=?, Kreatinin=?, pemeriksa=? where formhasil_id=?",
							array($_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'],
							$_POST['NamaART'], $_POST['Umur'], $_POST['JK'], $_POST['NoStiker'], $_POST['TGLPemeriksa'], $_POST['Alamat'], $_POST['Karakter'], $_POST['TtlKolestrol'], $_POST['HDLKolestrol'], $_POST['LDLKolestrol'], $_POST['Trigliserida'], $_POST['Kreatinin'], $_POST['Pemeriksa'], $_POST['formhasil_id']));
		
				$this->data['status_addformhasil'] = "1"; // sukses
				
				$this->get_arr_kimiaklinis();
			}
			
			if ($this->data['status_addformhasil'] == "1") {
				unset($_POST);
			}		
		
			$this->data['formhasil_id'] = isset($_POST['formhasil_id']) ? $_POST['formhasil_id'] : "";
			$this->data['Prov'] = isset($_POST['Prov']) ? $_POST['Prov'] : "";
			$this->data['Kota'] = isset($_POST['Kota']) ? $_POST['Kota'] : "";
			$this->data['Kec'] = isset($_POST['Kec']) ? $_POST['Kec'] : "";
			$this->data['Desa'] = isset($_POST['Desa']) ? $_POST['Desa'] : "";
			$this->data['DK'] = isset($_POST['DK']) ? $_POST['DK'] : "";
			$this->data['NoSensus'] = isset($_POST['NoSensus']) ? $_POST['NoSensus'] : "";
			$this->data['NoSubSensus'] = isset($_POST['NoSubSensus']) ? $_POST['NoSubSensus'] : "";
			$this->data['KodeSampel'] = isset($_POST['KodeSampel']) ? $_POST['KodeSampel'] : "";
			$this->data['NoUrut'] = isset($_POST['NoUrut']) ? $_POST['NoUrut'] : "";
			$this->data['NamaART'] = isset($_POST['NamaART']) ? $_POST['NamaART'] : "";
			$this->data['Umur'] = isset($_POST['Umur']) ? $_POST['Umur'] : "";
			$this->data['JK'] = isset($_POST['JK']) ? $_POST['JK'] : "";
			$this->data['NoStiker'] = isset($_POST['NoStiker']) ? $_POST['NoStiker'] : "";
			$this->data['TGLPemeriksa'] = isset($_POST['TGLPemeriksa']) ? $_POST['TGLPemeriksa'] : "";
			$this->data['Alamat'] = isset($_POST['Alamat']) ? $_POST['Alamat'] : "";
			$this->data['Karakter'] = isset($_POST['Karakter']) ? $_POST['Karakter'] : "";
			$this->data['TtlKolestrol'] = isset($_POST['TtlKolestrol']) ? $_POST['TtlKolestrol'] : "";
			$this->data['HDLKolestrol'] = isset($_POST['HDLKolestrol']) ? $_POST['HDLKolestrol'] : "";
			$this->data['LDLKolestrol'] = isset($_POST['LDLKolestrol']) ? $_POST['LDLKolestrol'] : "";
			$this->data['Trigliserida'] = isset($_POST['Trigliserida']) ? $_POST['Trigliserida'] : "";
			$this->data['Kreatinin'] = isset($_POST['Kreatinin']) ? $_POST['Kreatinin'] : "";
			$this->data['Pemeriksa'] = isset($_POST['Pemeriksa']) ? $_POST['Pemeriksa'] : "";
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_kimiaklinis', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_kimiaklinis', $this->data, true);
		$this->data['judul'] = 'Form List Hasil Kimia Klinis';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */