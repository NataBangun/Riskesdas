<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class list_malaria extends main {

	var $data;
	var $datahome;
	
	// public function get_arr_malaria()
	// {	
		// $query = $this->db->query("SELECT * FROM formmalaria where kode_lab LIKE '%{$this->data['lab']}%' AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ");
		// $rows = $query->result_array();				
		// $this->data['arr_malaria'] = $rows;
	// }
	
	public function get_arr_malaria()
	{			
		//$sql = " SELECT * FROM formmalaria where kode_lab LIKE '%{$this->data['lab']}%' 
		//	AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
		$this->data['search'] = $this->input->post('search');
		$sql = " SELECT * FROM formmalarianew where no_stiker LIKE '%{$this->data['search']}%' AND kode_lab LIKE '%{$this->data['lab']}%' 
			AND kode_penelitian LIKE '%{$this->data['penelitian']}%' ";
			
		$sql_count = str_replace(" * ", " count(*) jumlah ", $sql);
		
		$this->load->helper("laman");
		laman($this, $sql_count);
				
		$sql = $sql . " LIMIT {$this->data['laman_offset']}, {$this->data['laman_limit']} ";
		$query = $this->db->query($sql);
		$rows = $query->result_array();				
		$this->data['arr_malaria'] = $rows;
		
	}
	
	public function del($Id="") {
		
		$this->db->query('DELETE from formmalaria where formmalaria_id=? ', array($Id));
		
		echo "<script>location.href = '{$this->data['application_path']}/list_malaria';</script>";
	}
	
	public function index()
	{
		parent::index();
		$this->get_arr_malaria();

			$this->data['status_upmalaria'] = "0"; // default
			
			if (isset($_POST['status_upmalaria'])) {
				// 1. update Data
				// var_dump($this->db);
				
				$this->db->query('update formmalaria set propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, DK=?, kode_sampel=?, no_bangun_sensus=?, no_urut_sampel=?,
				NamaART=?, Umur=?, JK=?, no_stiker=?, TGL_periksa=?, alamat=?, pn_loka=?, spesies_loka=?, pn_pbtdk=?, PF=?, PV=?, PO=?, PM=?, par_PF=?, par_PV=?, par_PO=?, par_PM=?,
                 lemkos_PF=?, lemkos_PV=?, lemkos_PO=?, lemkos_PM=?, densitas_PF=?, densitas_PV=?, densitas_PO=?, densitas_PM=?, pemeriksa=? where formmalaria_id=?',
					array($_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['DK'], $_POST['KodeSampel'], $_POST['NoSensus'], $_POST['NoUrut'],
					$_POST['NamaART'], $_POST['Umur'], $_POST['JK'], $_POST['NoStiker'], $_POST['TGLPemeriksa'], $_POST['Alamat'], $_POST['PN2'], $_POST['SpesiesLoka'], $_POST['PN1'], $_POST['PF'], $_POST['PV'], $_POST['PO'], $_POST['PM'],
                     $_POST['Par'], $_POST['Par2'], $_POST['Par3'], $_POST['Par4'], $_POST['Lemkos'], $_POST['Lemkos2'], $_POST['Lemkos3'], $_POST['Lemkos4'], $_POST['Densitas'], $_POST['Densitas2'], $_POST['Densitas3'], $_POST['Densitas4'], $_POST['Pemeriksa'], $_POST['formmalaria_id']));
		
				$this->data['status_upmalaria'] = "1"; // sukses
				
				$this->get_arr_malaria();
			}
			
			if ($this->data['status_upmalaria'] == "1") {
				unset($_POST);
			}		
		
			$this->data['formmalaria_id'] = isset($_POST['formmalaria_id']) ? $_POST['formmalaria_id'] : "";
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
			$this->data['PN2'] = isset($_POST['PN2']) ? $_POST['PN2'] : "";
			$this->data['SpesiesLoka'] = isset($_POST['SpesiesLoka']) ? $_POST['SpesiesLoka'] : "";
			$this->data['PN1'] = isset($_POST['PN1']) ? $_POST['PN1'] : "";
			$this->data['PF'] = isset($_POST['PF']) ? $_POST['PF'] : "";
			$this->data['PV'] = isset($_POST['PV']) ? $_POST['PV'] : "";
			$this->data['PO'] = isset($_POST['PO']) ? $_POST['PO'] : "";
			$this->data['PM'] = isset($_POST['PM']) ? $_POST['PM'] : "";
			$this->data['Par'] = isset($_POST['Par']) ? $_POST['Par'] : "";
			$this->data['Par2'] = isset($_POST['Par2']) ? $_POST['Par2'] : "";
			$this->data['Par3'] = isset($_POST['Par3']) ? $_POST['Par3'] : "";
			$this->data['Par4'] = isset($_POST['Par4']) ? $_POST['Par4'] : "";
			$this->data['Lemkos'] = isset($_POST['Lemkos']) ? $_POST['Lemkos'] : "";
			$this->data['Lemkos2'] = isset($_POST['Lemkos2']) ? $_POST['Lemkos2'] : "";
			$this->data['Lemkos3'] = isset($_POST['Lemkos3']) ? $_POST['Lemkos3'] : "";
			$this->data['Lemkos4'] = isset($_POST['Lemkos4']) ? $_POST['Lemkos4'] : "";
			$this->data['Densitas'] = isset($_POST['Densitas']) ? $_POST['Densitas'] : "";
			$this->data['Densitas2'] = isset($_POST['Densitas2']) ? $_POST['Densitas2'] : "";
			$this->data['Densitas3'] = isset($_POST['Densitas3']) ? $_POST['Densitas3'] : "";
			$this->data['Densitas4'] = isset($_POST['Densitas4']) ? $_POST['Densitas4'] : "";
			$this->data['Pemeriksa'] = isset($_POST['Pemeriksa']) ? $_POST['Pemeriksa'] : "";
			
			
			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('list_malaria', $this->data, true);
			}
		// $this->data['area_body'] = $this->load->view('list_malaria', $this->data, true);
		$this->data['judul'] = 'Form List Hasil Malaria';
		$this->load->view('layout', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */