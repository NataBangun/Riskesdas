<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ("main.php");
class print_laporan_hasil_pengujian extends main{

function index()
{
$this->load->view('print_laporan_hasil_pengujian', $this->data);
}
}
?>