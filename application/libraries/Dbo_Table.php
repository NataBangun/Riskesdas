<?php
/*
 * Author by Aris Baskoro
 * Copyright 2014
 * Pembuatan library table agar lebih mudah dikit
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Dbo_Table{
    private $controler;
    
    private $result_array = array();
    
    private $sql_get_table;
    private $table_name;
    private $table_field;
    private $query = null;
    public  $page;
    public  $page_limit = null;
    private $page_offset;
    private $page_count;
    private $page_first;
    private $page_last;
    private $page_total;
    
    private $table_db_head = array();
    private $table_db_row = array();
    
    private $table_attribut_head = ' ';
    private $table_attribut_row  = ' ';
    private $table_attribut_row_data  = ' ';    
    private $table_attribut_table= ' ';
    
    private $table_edit = '';
    private $table_view = '';
    private $table_delete = '';
    private $table_head = '';
    
    private $table_generated = '';
    protected $CI ;
        
    //konstruksi class
    public function __construct() {
        
        $this->page = isset($_POST['page'])?$_POST['page']:'0';
        $this->CI =& get_instance();
    }
    
    public function set_table($table_name){
        $this->table_name = $table_name;
    }
    
    public function set_query($query){
        $this->query = $query;
    }
    
    public function set_limit($limit){
        $this->page_limit = $limit;
    }
    
    public function get_page(){
        if(isset($_REQUEST['p'])){
            $count = $this->get_count();
            $page = $_REQUEST['p'];
            if(is_numeric($page)){
               if($page==-1){
                   $page = ceil($count/$this->page_limit);
               }else if($page<1){
                   $page = 1;
               }else if($page > ceil($count/$this->page_limit)){
                   $page = ceil($count/$this->page_limit);
               }
               
               $this->page_offset = ($page-1) * $this->page_limit;
               if($this->page_offset < 0)$this->page_offset = 0;
               $this->page_first = $this->page_offset + 1;
               $this->page_last = $this->page_offset + $this->page_limit;
               
            }
        }
    }
    
    private function get_db_rows_all(){
        if($this->query == ''||$this->query == null){
            if(is_null($this->table_db_head)||count($this->table_db_head)==0){
                $qry_rows = $this->CI->db->query("SELECT * FROM $this->table_name");
            }else{
                $field = implode(',',  $this->table_db_head);
                $qry_rows = $this->CI->db->query("SELECT $field FROM $this->table_name");
            }
        }else{
            if(is_null($this->table_db_head)||count($this->table_db_head)==0){
                $qry_rows = $this->CI->db->query($this->query);
            }else{
                $field = implode(',',  $this->table_db_head);
                $qry_rows = $this->CI->db->query(str_replace('*', $field, $this->query));
                
            }
        }
        $rows = $qry_rows->result_array();
        return $rows;
    }
  
    public function get_count(){
        if($this->query == ""||$this->query == null){
            $qry_count = $this->CI->db->query("SELECT COUNT(*) as count FROM $this->table_name");
            $result = $qry_count->result_array();
            $count = $result[0]['count'];
        }else{
            $qry_count = $this->CI->db->query($this->query);
            $count = $qry_count->num_rows();
        }
        return $count;
    }
    
    public function set_atribut_table($atribut){
        if(is_array($atribut)){
            foreach($atribut as $attr => $value){
                $this->table_attribut_table .= $attr.'='.'"'.$value.'"' ;
            }
        }else{
            $this->table_attribut_table .= $atribut;
        }
    }
    
    public function set_atribut_head($atribut){
        if(is_array($atribut)){
            foreach($atribut as $attr => $value){
                $this->table_attribut_head .= $attr.'='.'"'.$value.'"' ;
            }
        }else{
            $this->table_attribut_head .= $atribut;
        }
    }
    
    public function set_atribut_row_data($atribut){
        if(is_array($atribut)){
            foreach($atribut as $attr => $value){
                $this->table_attribut_row_data .= $attr.'='.'"'.$value.'"' ;
            }
        }else{
            $this->table_attribut_row_data .= $atribut;
        }
    }

    public function set_atribut_row($atribut){
        if(is_array($atribut)){
            foreach($atribut as $attr => $value){
                $this->table_attribut_row .= $attr.'='.'"'.$value.'"' ;
            }
        }else{
            $this->table_attribut_row .= $atribut;
        }
    }
    
    public function set_table_head($array){
        foreach($array as $field=>$title){
            $this->table_head .= '<th'.$this->table_attribut_head.'>'.$title.'</th>';
            $this->table_db_head[] = $field;
        }
       
    }
    
    public function generate_table(){
        $i = 1;
        $this->table_db_row = $this->get_db_rows_all();
        $this->table_generated .= '<table'.$this->table_attribut_table.'>';
        $this->table_generated .= '<thead'.$this->table_attribut_head.'>';
        $this->table_generated .= $this->table_head;
        $this->table_generated .= '</thead>';
        $this->table_generated .= '<tbody>';
        foreach($this->table_db_row as $row){
            $this->table_generated .= '<tr'.$this->table_attribut_row.'>';
            foreach($row as $field=>$value){
                $this->table_generated .= '<td id="'.$field.'_'.$i.'"'.$this->table_attribut_row_data.'>'.$value.'</td>';
            }
            $this->table_generated .= '</tr>';
            $i++;
        }
        $this->table_generated .= '</tbody>';
        $this->table_generated .= '</table>';
        
        return $this->table_generated;
    }
    
    public function addDboHead($field,$title,$table_combo){
        
    }
    
    public function addActionView($title){
        
    }
    
    public function addActionEdit($title){
        
    }
    
    public function addActionDelete($title){
        
    }
    
    public function search($field,$search){
        
    }
    
    public function addHeadSearch(){
        
    }
}
?>
