<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class penerimaan extends main {

	var $data;
	var $datahome;

        function __construct() {
            parent::__construct();
            $this->load->helpers('kotak');
            $this->get_arr_revco();
        }


    public function cek_kotak($no_box,$no_revco,$no_rak,$no_kotak){
        // $query1= $this->db->query("
            // SELECT count(formpenerimaanbox.formpenerimaanbox_id) as w from formpenerimaanbox
            // INNER JOIN k_box ON k_box.id_box = formpenerimaanbox.id_box
            // INNER JOIN k_revco ON k_revco.id_revco = k_box.id_revco
            // WHERE
                // formpenerimaanbox.no_kotak  = $no_kotak AND
                // formpenerimaanbox.id_box    = $no_box AND
                // k_box.id_revco              = $no_revco AND
                // k_box.no_rak                = $no_rak
        // ");
		$query = $this->db->query("SELECT * FROM formpenerimaanbox
                        inner join k_box on formpenerimaanbox.id_box = k_box.id_box
                        inner join k_revco on k_box.id_revco = k_revco.id_revco
                        inner join typebox on typebox.typebox_id=k_box.typebox_id
                        WHERE formpenerimaanbox.id_box = $no_box AND formpenerimaanbox.no_kotak = $no_kotak");
        $row = $query->result_array();
        $rcount = $query->num_rows();
        echo $rcount;
    }

	public function cek(){
		$nobarcode = strip_tags(trim($_REQUEST['NoBarcode']));
		$query = $this->db->query("SELECT * FROM formpenerimaan WHERE no_barcode='$nobarcode'");
		$rcount = $query->num_rows();
			if($rcount>0){
				echo "no";
			}else{
				echo "yes";
			}

	}

        public function get_kapasitas($id_revco){
            $query = $this->db->query("SELECT kapasitas_rak FROM k_revco WHERE id_revco = $id_revco");
            $rows = $query->result_array();
            $a = $rows[0]['kapasitas_rak'];
            echo "<option>-Silakan Pilih-</option>";
            for($i=1;$i<=$a;$i++){
		echo "	<option value='$i'> $i</option>";
            }
        }

        public function get_typebox($no_box){
            $query=  $this->db->query("SELECT typebox_id FROM k_box WHERE id_box = '$no_box'");
            $rows = $query->result_array();
            echo $rows[0]['typebox_id'];

        }

        //input aliquote
        public function tampilJumlahAliquote($barcode="0"){
                $query=$this->db->query("SELECT COUNT(no_barcode) AS jmlbaris FROM formpenerimaanbox WHERE no_barcode='$barcode'");
                $rows=$query->result_array();
                //var_dump($rows);
                echo $rows[0]['jmlbaris'];

        }


        public function tampilTabel($barcode="1"){
                $query = $this->db->query("SELECT * FROM formpenerimaanbox
                    inner join k_box on k_box.id_box = formpenerimaanbox.id_box
                    inner join typebox on typebox.typebox_id = k_box.typebox_id
                    inner join k_revco on k_revco.id_revco = k_box.id_revco

                    where formpenerimaanbox.no_barcode='$barcode'");
		$rows = $query->result_array();
		$this->data['arr_penerimaan'] = $rows;
            echo "

                            <tr>
                                <th width='12%' align='center'>No Aliquote</th>
                                <th width='12%' align='center'>No Revco</th>
                                <th width='12%' align='center'>No Rack</th>
                                <th width='12%' align='center'>No Box</th>
                                <th width='15%' align='center'>Type Box</th>
                                <th width='12%' align='center'>No. kotak</th>
                                <th width='15%'>Action</th>
                            </tr>

                           ";
                            foreach($this->data['arr_penerimaan'] as $value){
                                echo"

                            <tr='kotak_$value[no_kotak]'>
                                <td align='center'>
                                    <input type='hidden' name='id_kotak' value='$value[no_kotak]'/>
                                    $value[no_aliquote]
                                </td>
                                <td align='center'>
                                    $value[no_revco]
                                </td>
                                <td align='center'>
                                    $value[no_rak]
                                </td>
                                <td align='center'>
                                    $value[no_box]
                                </td>
                                <td align='center'>
                                    $value[typebox_name]
                                </td>
                                <td align='center'>
                                    $value[no_kotak]
                                </td>
                                <td>
                                    <center>
                                        <div clas='tn-group'>
                                            <a href='#' class='button button-basic button-icon' rel='tooltip' title='View' onclick='window.setTimeout(function(){
                                                                                                                                    $( \"#dialog-view\" ).dialog( \"open\" ),
                                                                                                                                    document.frmAliquot.Box.value=$value[id_box],
                                                                                                                                    combobox_select(document.frmAliquot.Revco,$value[id_revco]),
                                                                                                                                    document.frmAliquot.Rack.selectedIndex=($value[no_rak]-1),
                                                                                                                                    document.frmAliquot.noRack.value = ($value[no_rak]-1),
                                                                                                                                    tampilkotakisi(\"$value[id_box]\",
                                                                                                                                    \"$value[id_revco]\",
                                                                                                                                    \"$value[no_rak]\",
                                                                                                                                    \"0\",
                                                                                                                                    \"$value[no_kotak]\")},1000);
                                                                                                                                    tampilkotakisitabel(\"$value[id_box]\",
                                                                                                                                    \"$value[id_revco]\",
                                                                                                                                    \"$value[no_rak]\");
                                                                                                                                    event.preventDefault();'><i class='icon-eye-open'></i></a>
                                            <a href='#' class='button button-basic button-icon' rel='tooltip' title='Delete' onclick='hapus($value[formpenerimaanbox_id])'><i class='icon-trash'></i></a>
                                        </div>
                                    </center>
                                </td>
                            </tr>

                           ";
                            }

        }

        public function get_arr_revco(){
                $query = $this->db->query('SELECT * FROM k_revco');
		$rows = $query->result_array();
		$this->data['arr_revco'] = $rows;

        }

        public function get_arr_box($id_revco, $no_rak){
                $query = $this->db->query("SELECT * FROM k_box WHERE id_revco = '$id_revco' AND no_rak = '$no_rak' ORDER BY no_box");
		$countr = $query->num_rows();
                if($countr>0){
                    $rows = $query->result_array();
                    echo '<option>-Silakan Pilih-</option>';
                    foreach($rows as $value):
                            echo"<option value='$value[id_box]'>$value[no_box]</option>";
                    endforeach;
                }else{
                    echo '<option>-Data box kosong-</option>';
                }
        }

        public function tampil_kotak($nobox,$norevco,$norak,$typebox,$nokotak=""){
            $rs = array();
            $i=0;
            $query = $this->db->query("SELECT * FROM formpenerimaanbox
                        inner join k_box on formpenerimaanbox.id_box = k_box.id_box
                        inner join k_revco on k_box.id_revco = k_revco.id_revco
                        inner join typebox on typebox.typebox_id=k_box.typebox_id
                        WHERE formpenerimaanbox.id_box = $nobox");
            $jmlbaris = $query->num_rows();
            if($jmlbaris<1){
                $query = $this->db->query("SELECT * FROM k_box INNER JOIN typebox ON typebox.typebox_id = k_box.typebox_id WHERE id_box = $nobox");

            }
            $rows =  $query->result_array();
            $lebar = $rows[0]['lebar'];
            $panjang = $rows[0]['panjang'];
            if($jmlbaris>0){
                foreach($rows as $value){
                    $rs[$i]=$value['no_kotak'];
                    $i++;
                }
            }
            kotak($lebar,$panjang , $rs,$nokotak);

        }

        public function tampil_tabel_kotak($nobox,$norevco,$norak,$typebox,$nokotak=""){
            $query = $this->db->query("SELECT * FROM formpenerimaanbox
                        inner join k_box on formpenerimaanbox.id_box = k_box.id_box
                        inner join k_revco on k_box.id_revco = k_revco.id_revco
                        inner join typebox on typebox.typebox_id=k_box.typebox_id
                        WHERE formpenerimaanbox.id_box = $nobox AND no_rak = '$norak' AND k_revco.id_revco = '$norevco' order by no_kotak asc");
            $rows =  $query->result_array();



            foreach($rows as $value){
                echo"

					<tr>
						<td>$value[no_kotak]</td>
						<td>$value[no_barcode]</td>"
                   .
                    "</tr>

                ";
                ////<td><a href='#' class='button button-basic button-icon' rel='tooltip' title='View'><i class='icon-eye-open'></i></a></td>
            }

        }

        public function hapusAliquote($barcode){
            $this->db->query("DELETE FROM formpenerimaanbox WHERE formpenerimaanbox_id=$barcode");
        }



        public function simpanAliquote(){
                $this->db->query('insert formpenerimaanbox set no_barcode=?, no_aliquote=?, id_box=?, no_kotak=?',
					array($_REQUEST['NoBarcode'],$_REQUEST['Aliquote'],$_REQUEST['Box'],$_REQUEST['Kotak']));
            }

            //->>YAN YNG DI RUBAH <<BEGIN
        public function kelurahan($idprov="",$idkab="",$idkec=""){
                $query = $this->db->query("select * from kelurahannew where ID_KEC = '$idkec' and ID_KAB = '$idkab' and ID_PROP = '$idprov'");
                $rows = $query->result_array();
                $this->data['kelu']=$rows;

                ?>
                <!--<select name="Kel" id="Desa" class='chosen-select'>-->
                <select name="Desa" id="Desa" class='chosen-select'>
		<option value="0"> - Silakan Pilih Kelurahan - </option>
		<?php foreach($rows as $value): ?>
		<option value="<?php echo $value['ID_KEL'] ?>"><?php echo $value['ID_KEL'] ?> - <?php echo $value['NM_KEL'] ?></option>
		<?php endforeach; ?>
		</select>
                <?php

        }

        public function kecamatan($idprov="",$idkab=""){
                //echo "select * from kecamatan where ID_KAB = '$idkab' and ID_PROP = '$idprov'";
                $query = $this->db->query("select * from kecamatan where ID_KAB = '$idkab' and ID_PROP = '$idprov'");
                $rows = $query->result_array();
                $this->data['keca']=$rows;

                ?>
                <select name="Kec" id="Kec" class='chosen-select' onchange="kelurahan(this.value)">
		<option value="0"> - Silakan Pilih Kecamatan - </option>
		<?php foreach($rows as $value): ?>
		<option value="<?php echo $value['ID_KEC'] ?>"><?php echo $value['ID_KEC'] ?> - <?php echo $value['NM_KEC'] ?></option>
		<?php endforeach; ?>
		</select>
                <?php

        }

        public function kabupaten($idprov=""){
                $query = $this->db->query("select * from kabupaten where ID_PROP = '$idprov'");
                $rows = $query->result_array();
                $this->data['kabu']=$rows;
                //var_dump($rows);

                ?>
                <select name="Kota" id="Kota" class='chosen-select' onchange="kecamatan(this.value)">
		<option value="0"> - Silakan Pilih Kabupaten - </option>
		<?php foreach($rows as $value): ?>
		<option value="<?php echo $value['ID_KAB'] ?>"><?php echo $value['ID_KAB'] ?> - <?php echo $value['NM_KAB'] ?></option>
		<?php endforeach; ?>
		</select>
                <?php
        }
        //END



	public function index()
	{
		parent::index();

//$this->get_arr_formpenerimaan();
		$this->get_arr_institusi();
		$this->get_arr_spesimen();
		$this->get_arr_penelitian();
		$this->get_arr_kondisispesimen();
		$this->get_arr_site();
		$this->get_arr_simapanspesimen();
		$this->get_arr_typebox();
		$this->get_arr_revco();



			$this->data['status_terima'] = "0"; // default

			if (isset($_POST['status_terima'])) {
				// 1. Insert Data
				var_dump($_POST);
                            
				$this->db->query('insert formpenerimaan set propinsi_id=?, kabupaten_id=?, kecamatan_id=?, kelurahan_id=?, no_stiker=?, no_barcode=?, institusi_kode=?, penelitian_kode=?, namaART=?,
				umurART=?, JK=?, darah=?, alamatART=?, spesimen_kode=?, kondisispesimen_id=?, visit=?, suhudtg=?, volspesiment=?, jumspesimen=?, site_kode=?, simpanspesimen_id=?, tgl_kirim=?,
				nama_pengirim=?, tgl_ambil=?, tgl_terima=?, AWB=?, ket=?, jumaliquot=?, LAB_CODE=?',
					array($_POST['Prov'], $_POST['Kota'], $_POST['Kec'], $_POST['Desa'], $_POST['hNoStiker'], $_POST['NoBarcode'], $_POST['AsalInstitusi'], $_POST['NamaPenelitian'],
					$_POST['NamaART'], $_POST['umurART'], $_POST['JK'], $_POST['darah'], $_POST['Alamat'], $_POST['JenisSpesimen'], $_POST['KondisiSpesimen'], $_POST['Visit'], $_POST['SuhuDtg'],
					$_POST['VSpesimen'], $_POST['JSpesimen'], $_POST['NamaSite'], $_POST['SimpanSpesimen'], $_POST['TGLKirim'], $_POST['Pengirim'], $_POST['DiambilTanggal'],
					$_POST['TGLDiterima'], $_POST['AWB'], $_POST['Ket'], $_POST['hjmlAliquot'], $this->data['lab']));

				$this->data['status_terima'] = "1"; // sukses
			}

			if ($this->data['status_terima'] == "1") {
				unset($_POST);
			}


		// propinsi_id kabupaten_id kecamatan_id kelurahan_id no_stiker no_barcode institusi_kode penelitian_kode namaART umurART JK darah alamatART spesimen_kode kondisispesimen_id
		// visit suhudtg volspesiment jumspesimen site_kode simpanspesimen_id tgl_kirim nama_pengirim tgl_ambil tgl_terima AWB ket jumaliquot

		// Prov Kota Kec Desa NoStiker NoBarcode AsalInstitusi NamaPenelitian NamaART umurART JK darah Alamat
		// JenisSpesimen KondisiSpesimen Visit SuhuDtg VSpesimen JSpesimen NamaSite SimpanSpesimen TGLKirim Pengirim DiambilTanggal TGLDiterima AWB Ket Aliquot
			$this->data['Prov'] = isset($_POST['Prov']) ? $_POST['Prov'] : "";
			$this->data['Kota'] = isset($_POST['Kota']) ? $_POST['Kota'] : "";
			$this->data['Kec'] = isset($_POST['Kec']) ? $_POST['Kec'] : "";
			$this->data['Desa'] = isset($_POST['Desa']) ? $_POST['Desa'] : "";
			$this->data['NoStiker'] = isset($_POST['hNoStiker']) ? $_POST['hNoStiker'] : "";
			$this->data['NoBarcode'] = isset($_POST['NoBarcode']) ? $_POST['NoBarcode'] : "";
			$this->data['AsalInstitusi'] = isset($_POST['AsalInstitusi']) ? $_POST['AsalInstitusi'] : "";
			$this->data['NamaPenelitian'] = isset($_POST['NamaPenelitian']) ? $_POST['NamaPenelitian'] : "";
			$this->data['NamaART'] = isset($_POST['NamaART']) ? $_POST['NamaART'] : "-";
			$this->data['umurART'] = isset($_POST['umurART']) ? $_POST['umurART'] : "-";
			$this->data['darah'] = isset($_POST['darah']) ? $_POST['darah'] : "";
			$this->data['JK'] = isset($_POST['JK']) ? $_POST['JK'] : "";
			$this->data['Alamat'] = isset($_POST['Alamat']) ? $_POST['Alamat'] : "-";
			$this->data['JenisSpesimen'] = isset($_POST['JenisSpesimen']) ? $_POST['JenisSpesimen'] : "";
			$this->data['KondisiSpesimen'] = isset($_POST['KondisiSpesimen']) ? $_POST['KondisiSpesimen'] : "";
			$this->data['Visit'] = isset($_POST['Visit']) ? $_POST['Visit'] : "";
			$this->data['SuhuDtg'] = isset($_POST['SuhuDtg']) ? $_POST['SuhuDtg'] : "0";
			$this->data['VSpesimen'] = isset($_POST['VSpesimen']) ? $_POST['VSpesimen'] : "0";
			$this->data['JSpesimen'] = isset($_POST['JSpesimen']) ? $_POST['JSpesimen'] : "";
			$this->data['NamaSite'] = isset($_POST['NamaSite']) ? $_POST['NamaSite'] : "";
			$this->data['SimpanSpesimen'] = isset($_POST['SimpanSpesimen']) ? $_POST['SimpanSpesimen'] : "";
			$this->data['TGLKirim'] = isset($_POST['TGLKirim']) ? $_POST['TGLKirim'] : "";
			$this->data['Pengirim'] = isset($_POST['Pengirim']) ? $_POST['Pengirim'] : "";
			$this->data['DiambilTanggal'] = isset($_POST['DiambilTanggal']) ? $_POST['DiambilTanggal'] : "";
			$this->data['TGLDiterima'] = isset($_POST['TGLDiterima']) ? $_POST['TGLDiterima'] : "";
			$this->data['AWB'] = isset($_POST['AWB']) ? $_POST['AWB'] : "";
			$this->data['Ket'] = isset($_POST['Ket']) ? $_POST['Ket'] : "";
			$this->data['Aliquot'] = isset($_POST['jmlAliquot']) ? $_POST['jmlAliquot'] : "-";


		$query = $this->db->query('SELECT * FROM propinsi');
		$rows = $query->result_array();
		$this->data['arr_propinsi'] = $rows;


			if ( $this->data['level'] == "" or $this->data['welcome'] == "") {
				$this->data['area_body'] = $this->load->view('404',$this->data, true);
			} else {
				$this->data['area_body'] = $this->load->view('penerimaan', $this->data, true);
			}

		// $this->data['area_body'] = $this->load->view('penerimaan', $this->data, true);
		$this->data['judul'] = 'Form Penerimaan';
		$this->load->view('layout', $this->data);
	}
}

/* End of file penerimaan.php */
/* Location: ./application/controllers/penerimaan.php */