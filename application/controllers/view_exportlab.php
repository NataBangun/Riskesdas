<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class view_exportlab extends main {

	var $data;
	var $datahome;
	
	public function cetak($lab_code,$tgl_1,$tgl_2){
		//$lab = $_REQUEST['lab'];
		$query = $this->db->query("SELECT * FROM formpenerimaan
									inner join laboraturium on laboraturium.LAB_CODE = formpenerimaan.LAB_CODE
									inner join spesimen on spesimen.spesimen_kode = formpenerimaan.spesimen_kode
									inner join kondisispesimen on kondisispesimen.kondisispesimen_id = formpenerimaan.kondisispesimen_id
									WHERE STR_TO_DATE(formpenerimaan.tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('$tgl_1', '%d/%m/%Y') and STR_TO_DATE('$tgl_1', '%d/%m/%Y') AND formpenerimaan.LAB_CODE='$lab_code' ORDER BY formpenerimaan.no_stiker ASC");
		$rows = $query->result_array();
		// var_dump($rows);
		$this->data['view_cetaklab'] = $rows;
		echo "
			<table width='100%' border='0'>
		  <tr>
			<td colspan='6'><h3>Laporan Penerimaan Spesimen</h3></td>
		  </tr>
		  <tr>
			<td width='20%'>Laboraturium</td>
			<td width='3%' align='center'>:</td>
			<td align='left'></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>Tanggal</td>
			<td align='center'>:</td>
			<td colspan='2' align='left'>$tgl_1 sampai dengan $tgl_2</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
		
		<table border='1' class='table table-striped table-invoice'>
			<tr>
				<td width='1%' align='center'>No. </td>
				<td width='7%' align='center'>No. Lims</td>
				<td width='5%' align='center'>No. Spesimen</td>
				<td width='6%' align='center'>Tgl Penerimaan</td>
				<td width='6%' align='center'>Jenis Spesimen</td>
				<td width='4%' align='center'>Kondisi</td>
				<td width='6%' align='center'>User Penerima</td>
				<td width='4%' align='center'>Umur</td>
			</tr>
		  
		";
			foreach($this->data['view_cetaklab'] as $value){
		echo "
			<tr>
				<td align='center'></td>
				<td></td>
				<td align='center'></td>
				<td align='center'></td>
				<td align='center'></td>
				<td align='center'></td>
				<td align='center'></td>
				<td align='center'> Tahun</td>
			</tr>
		";
	}
		
	}
	
	public function index($Id="")
	{	
		
		$tgl1 = str_replace('/', '', $_POST['tglawal']);
		$tgl2 = str_replace('/', '', $_POST['tglakhir']);

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=laporan_lab_'.$tgl1.'_'.$tgl2.'.xls');
		// header('Content-Disposition: attachment; filename=laporan_kimia_klinis.xls');
	
		parent::index();
		
		// $awal = str_replace("/", "-", $this->input->post('tglawal'));
		// $akhir = str_replace("/", "-", $this->input->post('tglakhir'));
		// $prop = $this->input->post('Propinsi');
		$lab = $this->input->post('lab');
		// $penelitian = $this->input->post('penelitian');
		$tgl1 = $this->input->post('tglawal');
		// $tgl1 = str_replace('/', '', $this->input->post('tglawal'));
		// $tgl2 = str_replace('/', '', $this->input->post('tglakhir'));
		$tgl2 = $this->input->post('tglakhir');
		$this->session->set_userdata('lab',$lab);
		$this->session->set_userdata('tgl1',$tgl1);
		$this->session->set_userdata('tgl2',$tgl2);
		
		// var_dump($this->db);
		// t1.*, t2.*, t3.*, t4.* 
		// $query = $this->db->query("SELECT * FROM formhasil WHERE STR_TO_DATE(TGL_periksa, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND kode_lab='{$this->input->post('lab')}' AND kode_penelitian='{$this->input->post('penelitian')}' AND propinsi_id='{$this->input->post('Propinsi')}' ORDER BY no_stiker ASC");
		// $query = $this->db->query("SELECT * FROM formpenerimaan WHERE STR_TO_DATE(tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND LAB_CODE='{$this->input->post('lab')}' ORDER BY no_stiker ASC");
		$query = $this->db->query("SELECT * FROM formpenerimaan
									inner join laboraturium on laboraturium.LAB_CODE = formpenerimaan.LAB_CODE
									inner join spesimen on spesimen.spesimen_kode = formpenerimaan.spesimen_kode
									inner join kondisispesimen on kondisispesimen.kondisispesimen_id = formpenerimaan.kondisispesimen_id
									WHERE STR_TO_DATE(formpenerimaan.tgl_terima, '%d/%m/%Y') BETWEEN STR_TO_DATE('{$this->input->post('tglawal')}', '%d/%m/%Y') and STR_TO_DATE('{$this->input->post('tglakhir')}', '%d/%m/%Y') AND formpenerimaan.LAB_CODE='{$this->input->post('lab')}' ORDER BY formpenerimaan.no_stiker ASC");
		$rows = $query->result_array();
		// var_dump($rows);
		$this->data['view_exportlab'] = $rows;

		$this->data['area_body'] = $this->load->view('view_exportlab', $this->data, true);
		$this->data['judul'] = 'Form Export Kimia Klinis';
		$this->load->view('view_exportlab', $this->data);
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */