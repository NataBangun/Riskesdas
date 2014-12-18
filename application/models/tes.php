<?php
if (!defined ('BASEPATH')) exit ('No direct access allowed');

class tes extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function download_to_excel(){
		$this->db->get('propinsi');
	}
	
}