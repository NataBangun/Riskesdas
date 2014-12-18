<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include("main.php");

class export_pemeriksaan extends main {
    public function index()
    {


        parent::index();

        $prop = $this->input->post('Propinsi');
        $lab = $this->input->post('lab');
        $penelitian = $this->input->post('penelitian');
        $sqltread   = isset($_REQUEST['sqltread'])?$_REQUEST['sqltread']:'';
        echo $sqltread;
        $query_all=$this->db->query($sqltread);
        $rs_all = $query_all->result_array();
        $no=1;
        $this->data['export'] = '<tr><td>No</td>';
        foreach($rs_all[0] as $v => $key){
                 $this->data['export'] .= "<td>$v</td>";
             };
        $this->data['export'] .= '</tr>';


        foreach($rs_all as $value):
            $this->data['export'] .= "
                <tr>
                 <td>$no </td>";
            foreach($value as $v => $key){
                $this->data['export'] .= "<td>$key</td>";
            }

        $this->data['export'] .= '</tr>';
        $no++;
        endforeach;

       // $this->data['view_export'] = $rows;
        //$this->data['area_body'] = $this->load->view('view_export', $this->data, true);
        $this->data['judul'] = 'Form Export';
        $this->load->view('view_export', $this->data);
    }
}