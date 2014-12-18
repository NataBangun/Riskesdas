<?php
class tes1 extends Controller {
public function tes1() {
parent::__construct();
$this->load->model('tes1');//load the model
$this->load->library('pagination');
}
//function to get the data from tb_book
function getBuku() {
$data['title'] = 'menampilkan isi propinsi';
$data['detail'] = $this->tes1->getBuku();//call the model and save the result in $detail
$this->load->view('tes1', $data);
}
//function to export to excel
function toExcelAll() {
$query['data1'] = $this->tes1->ToExcelAll();
$this->load->view('excelview',$query);
}
}