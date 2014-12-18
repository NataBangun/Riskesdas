<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include("main.php");
class box extends main {
	var $data;
	var $datahome;
	public function cek_kode($kode){
		$query = $this->db->query("SELECT * FROM k_box WHERE no_box = $kode");
				if($query){
			return true;
		}else{
			return false;
		}
	}	
	public function kabupaten($idprov=""){
		$query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
		$rows = $query->result_array();
		//var_dump($rows);
		?>
			<select name="Kab" id="Kab" class='span3' onchange="nobox()">
				<option> - Silakan Pilih Kabupaten - </option>
				<?php foreach($rows as $value): ?>
				<option value="<?php echo $value['ID_KAB'] ?>"><?php echo $value['ID_KAB'] ?> - <?php echo $value['NM_KAB'] ?></option>
				<?php endforeach; ?>
			</select>
		<?php
	}
	public function index()
	{	
		parent::index();
			$this->data['status_addbox'] = "0"; // default			if (isset($_POST['status_addbox'])) {
				// 1. Insert Data
				// var_dump($this->db);
				$this->db->query('insert k_box set no_box=?, typebox_id =?',
					array($_POST['NoBox'],$_POST['TypeBox']));
				$this->data['status_addbox'] = "1"; // sukses
			}
			if ($this->data['status_addbox'] == "1") {
				unset($_POST);
			}
			$this->data['NoBox'] = isset($_POST['NoBox']) ? $_POST['NoBox'] : "";
		$this->data['area_body'] = $this->load->view('box', $this->data, true);
		$this->data['judul'] = 'Form Master Box';
		$this->load->view('layout', $this->data);
	}
}
/* End of file box.php */
/* Location: ./application/controllers/box.php */