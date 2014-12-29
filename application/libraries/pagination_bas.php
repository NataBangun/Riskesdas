<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//ci pagination_bas v 1.1a
//pagination baskoro ajax system
//author Aris Baskoro
//Copyright 2014


class CI_Pagination_Bas {
    private $table;
    private $ci;
    private $url='';
    private $controler;
            
    private $attr_table = array();
    private $attr_input_page;
    
    private $field = array();
    private $link = array();
    private $link_delete=false;
    private $link_del = array();
    private $link_del_func ='delete';
    private $result=array();
    
    private $data;
    private $offset;
    private $limit;
    private $page;
    private $table_id=null;
    private $order_by =array('field'=>null);
    private $pagination_type=1;
    
    
    function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->database();
    }
    
    public function set_attr_input_page($attr){
        $this->attr_input_page = $this->set_attr($attr);
    }
    
    public function set_table_id($id){
        $this->table_id = $id;
    }
    
    public function set_paging($data,$limit,$page){
        $this->data = $data;
        $this->limit = $limit;
        $this->page = $page;
    }
    
    public function set_table($table){
        $this->table = $table;
    }
    
    public function get_rows_limit(){
       // var_dump($this->data);
        if($this->check_order_by()){
            $this->ci->db->order_by($this->order_by['field'], $this->order_by['order']);
        }
		$this->ci->db->distinct('no_surat');
		
        //var_dump($this->data);
        $this->ci->db->limit($this->limit,$this->offset);
        $this->ci->db->like($this->data);
        $select = $this->ci->db->get($this->table);
        return $select->result_array();
    }
    
    private function check_order_by(){
        //var_dump($this->data);
        if(isset($this->data['_order_by'])&&isset($this->data['_order'])){
            $this->order_by['field'] = $this->data['_order_by']!=''?$this->data['_order_by']:$this->table_id;
            $this->order_by['order'] = $this->data['_order']!=''?$this->data['_order']:'asc';
            unset($this->data['_order_by'],$this->data['_order']);
            return true;
        }else{
            unset($this->data['_order_by'],$this->data['_order']);
            return false;
        }        
    }
    
    public function get_rows_count(){
        $s = $this->data;
        unset($s['_order_by'],$s['_order']);
        $this->ci->db->distinct('no_surat');
		
        $this->ci->db->like($s);
        $select = $this->ci->db->get($this->table); 
        return $select->num_rows();
    }
    
    public function page()
    {		
        $result['count'] =  $this->get_rows_count();
        $this->page =  ($this->page>0) ? $this->page : 1;
        $page_count = ceil($result['count'] / $this->limit);
        $this->offset = ($this->page - 1) * $this->limit;
        if ($this->offset < 0) $this->offset = 0;		
        $result['page'] = $this->page;
        $result['page_offset'] = $this->offset;
        $result['limit'] = $this->limit;
        $result['page_back'] = $this->offset + 1;		
        $result['page_next'] = $this->offset + $this->limit;	
        $result['page_count'] = $page_count;
        if ($result['page_next'] > $result['count']) $result['page_next'] = $result['count'];
        $result['result_array']= $this->get_rows_limit();
        return $result;
    }
    
    public function set_ajax_url($url){
        $this->url = $url;
    }
    
    public function set_field($field,$label='',$attribut=null){
        if(is_array($field)){
            $this->field = $field;
        }else{
            $this->field[] = array('field'=>$field,'label'=>$label,'attribut'=>$attribut);
        }
    }
    
    public function set_controler($controler_name){
        $this->controler = $controler_name;
    }
    
    public function set_link($link,$label,$attribut=null){
        if(is_array($link)){
            $this->link = $link;
        }else{
            $this->link[] = array('link'=>$link,'label'=>$label, 'attribut'=>$attribut);
        }
    }
    
    public function set_attr_table($attribut){
        if(is_array($attribut)){
            foreach ($attribut as $key => $value) {
                $this->attr_table[]="$key='$value'";
            }
        }else{
            $this->attr_table[]=$attribut;
        }
    }
    
    public function set_attr($attribut){
        if(is_array($attribut)){
            foreach ($attribut as $key => $value) {
                $attr="$key='$value'";
            }
        }else{
            $attr=$attribut;
        }
        return $attr;
    }
    
    public function set_attr_delete($attribut){
        if(is_array($attribut)){
            foreach ($attribut as $key => $value) {
                $attr="$key='$value'";
            }
        }else{
            $attr=$attribut;
        }
        return $attr;
    }
    
    public function set_pagination_type($type_id){
        $this->pagination_type=$type_id;
    }
    
    public function set_link_delete($bool,$function,$attri=null){
        $this->link_delete = $bool;
        $this->link_del_func = $function;
        $this->link_del = $attri;
    }
    
    private function get_thead(){
        $res = '<thead><tr>';
        foreach($this->field as $field){
            $res .= '<th id="th_'.$field['field'].'"><a href="#" onclick=\'cari_order("'.$field['field'].'")\'>'.$field['label'].'</a></th>';
        }
        $res .= (count($this->link)==0)?'':'<th>Aksi</th>';
        $res .= '</tr>';
        $res .= '<tr>';
        foreach($this->field as $field){
            $res .= '<td><input type="text" id="'.$field['field'].'" name="'.$field['field'].'" onkeyup="cari(1)" '.$this->set_attr($field['attribut']).'"/></td>'; 
        }
        $res .= (count($this->link)==0)?'':'<td></td>';
        $res .= '</tr></thead>';
        return $res;
    }
    
    public function generate_table_content(){
        $s = 
        "<form id=\"frm_src\" action=\"#\">
            <table ".implode(' ',$this->attr_table).">
              ".$this->get_thead()."
              <tbody id=\"body_table\">
              </tbody>
            </table>
            <input type='hidden' name='_order_by' id='_order_by'>
            <input type='hidden' name='_order' id='_order'>
            
        </form>
        " ;
        return $s;
    }
    
    public function generate_link_pager(){
        $s = '<div class="pager"></div>';
        return $s;
    }
    
    public function generate_link_pagination(){
        $s = '<ul class="pagination input-grup"></ul>';
        return $s;
    }
    
    public function generate_ajax_script(){
        
        if(!is_null($this->pagination_type)){
            switch($this->pagination_type){
                case 1:
                    $t = ' for(var i=1;page_count>=i;i++){
                             var dis;
                             var x ;
                                 x = i;
                             if(page==i){
                                 dis = "disabled";
                             }
                             list += "<li><a "+ dis +" href="#" onclick=\'cari("+ i +")\'>"+i+"</a></li>";
                         }';
                    break;
                case 2:
                    $t = ' input_page = "<input '.$this->attr_input_page.' name=\"page\" id=\"page\" type=\"text\" onkeyup=\"cari_enter(this.value,"+ page_count +")\" value=\""+ page +"\">"';
                    break;
            }
            
            $s = '<script type="text/javascript">
                    
                    function cari_order(id){
                        $("#_order_by").val(id);
                        var ord = $("#_order").val()=="asc"?"desc":"asc";
                        $("#_order").val(ord);
                        cari(1);
                    }   
                    
                    function delete_link(id){
                        if(confirm("Yakin ingin menghapus data?")){
                            $.ajax({
                               url : "'.$this->controler.'/'.$this->link_del_func.'/"+id,
                                complete :function(){
                                    cari($("#page").val());
                                }
                            });
                        }
                    }
                    
                    function cari(page){
                        $.ajax({
                             url : "'.$this->url.'/"+page,
                             data : $("#frm_src").serialize(),
                             method: "post",
                             complete: cari_complete
                        })
                    }

                    function cari_enter(data,page_count){
                        $("#page").keyup(function(even){
                            if(even.keyCode==13){
                                if(data<=page_count){
                                    cari(data);
                                }
                            }
                        });
                    }
                    
                    function cari_complete(data,status){
                        var input_page="";
                        var xhr = data.responseText;
                        var rs = eval("("+xhr+")");
                        document.getElementById("body_table").innerHTML  = rs.isi_table;
                        var limit = rs.rs.limit;
                        var count = rs.rs.count;
                        var page = rs.rs.page;
                        var page_back = rs.rs.page_back;
                        var page_next = rs.rs.page_next;
                        var page_offset = rs.rs.offset;
                        var page_count = rs.rs.page_count;
                        var dis1= (page == 1)?"disabled":"" ;
                        var dis2=(page == page_count)?"disabled":"" ;
                        var list="";
						
                        list += "<li class=\"btn\" onclick=\"cari(1)\"><a "+ dis1 +" href=\'#\' ><<</a></li>";
                        list += "<li class=\"btn\" onclick=\"cari("+ (parseInt(page-1)) +")\"><a "+ dis1 +" href=\'#\' ><</a></li>";
                        '.$t.'
                        list += "<li  class=\"btn\" onclick=\"cari("+ ((page<page_count)?parseInt(page)+1:page) +")\"><a "+ dis2 +" href=\'#\' >></a></li>";
                        list += "<li  class=\"btn\" onclick=\"cari("+ page_count +")\"><a "+ dis2 +" href=\"#\" >>></a></li>";
                        $(".pagination").html(list);
                        $(".pager").html(input_page);
                    }
                    $(document).ready(function(){
                        cari(1);
                    });
                </script>
                ';
        }
        return $s;
    }
    
    public function generate_table_data(){
        $isi_table='';
        $arr_result ='';
        $arr_table = $this->page();
        
        //var_dump($arr_table['result_array']);
        foreach($arr_table['result_array'] as $value){ 
            $id = ($this->table_id != null) ? '/'.$value[$this->table_id] : '#' ;
            $isi_table .= '<tr>';
            
            foreach($this->field as $val){
                $s=$val['field'];
                $isi_table .= '<td>'.$value[$s].'</td>';
            }
            
            if(count($this->link)>0){
                $isi_table .= '<td >';
                foreach($this->link as $val){
                    $isi_table .= '<a href="'.$val['link'].$id.'" '.$this->set_attr($val['attribut']).'>'.$val['label'].'</a>';
                }
                if($this->link_delete){
                    $isi_table .= '<a href="#" onclick="delete_link('.$value[$this->table_id].')" '.$this->set_attr_delete($this->link_del).'>Delete</a>';
                }
                $isi_table .='</td>';
            }
            
            $isi_table .='</tr>';
        }
        $arr_result['isi_table']=$isi_table;
        $arr_result['rs'] = $this->page();
        //$arr_result['halaman'] = $page['halaman'];	
        
        echo json_encode($arr_result);
    }
}
