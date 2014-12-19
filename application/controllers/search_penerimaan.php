<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("main.php");

class search_penerimaan extends main{
    protected $datas;
    protected $field;


    public function __construct()   
    {
        parent::__construct();
        parent::index();
        
//        $arr_helper=array(
//            'form',
//            'url'
//        );
        
        $this->datas['application_path'] = '/Riskesdas';
        $this->load->database();
        
//        $this->load->helper($arr_helper);
        $this->load->library('pagination_bas');
        
        //--pagination--array
        $this->field=array(
            array(
                'field'=>'no_barcode',
                'label'=>'No Surat',
                'attribut'=>array(
                    'class'=>'form-control'
                    )
            ),
            array(
                'field'=>'no_stiker',
                'label'=>'Dari',
                'attribut'=>array(
                    'class'=>'form-control'
                    )
            ),
            array(
                'field'=>'institusi_kode',
                'label'=>'Perihal',
                'attribut'=>array(
                    'class'=>'form-control'
                    )
            ),
            array(
                'field'=>'penelitian_kode',
                'label'=>'Tanggal',
                'attribut'=>array(
                    'class'=>'form-control'
                    )
            )
        );
    }

    public function index()
    {
        $this->pagination_bas->set_controler('search_penerimaan');
		$this->pagination_bas->set_attr_input_page(array('class'=>'form-control'));
        $this->pagination_bas->set_pagination_type(2);
        $this->pagination_bas->set_link('suratmasuk/edit','Edit',array('class'=>'btn btn-default btn-sm'));
        
        //start---pagination
        $this->pagination_bas->set_attr_table('class="table table-bordered table-condensed table-hover table-striped"');
        $this->pagination_bas->set_field($this->field);
        $this->pagination_bas->set_ajax_url($this->datas['application_path'].'/search_penerimaan/search');
        $this->datas['link_pager']       = $this->pagination_bas->generate_link_pager();
		$this->datas['table_content']    = $this->pagination_bas->generate_table_content();
        $this->datas['ajax_script']      = $this->pagination_bas->generate_ajax_script();
        $this->datas['link_pagination']  = $this->pagination_bas->generate_link_pagination();
        //end---pagination
		$this->data['area_body'] = $this->load->view('search_penerimaan', $this->datas, true);
        $this->load->view('layout', $this->data);
    }
    
    public function frm()
    {
        $this->data['arr_pegawai'] = $this->m_pegawai->select();
        $this->layout->display('search_penerimaan', $this->data);
    }
       
    public function edit($id)
    {
        $data = $this->m_surat_masuk->view($id);
        //var_dump($data);
        foreach($data as $val){
            if(in_array($val['diteruskan'])){
                if(($val['diteruskan'])!=null){
                    $data['id_diterus'][]=$val['diteruskan']['id_pegawai'];
                }    
            }
        }
        
        //var_dump($data['diteruskan']['id_pegawai']);
	//var_dump($data);
	$data['application_path']= $this->data['application_path'];
        $data['arr_pegawai'] = $this->m_pegawai->select();
//        var_dump($data);
        $this->layout->display('suratmasuk/edit', $data);
    }
    
    public function view($id)
    {
        $data = $this->m_surat_masuk->view($id);
	//var_dump($data);
	$data['application_path']= $this->data['application_path'];
        //$data['arr_pegawai'] = $this->m_pegawai->select();
		
        $this->layout->display('suratmasuk/view', $data);
    }
	
    public function search($page){
        //start---pagination
        $this->pagination_bas->set_link_delete(true,'delete',array('class'=>'btn btn-default btn-sm'));
        $this->pagination_bas->set_link('suratmasuk/view','Baca',array('class'=>'btn btn-default btn-sm'));
        $this->pagination_bas->set_link('suratmasuk/edit','Edit',array('class'=>'btn btn-default btn-sm'));
        $this->pagination_bas->set_table_id('formpenerimaan_id');
        $this->pagination_bas->set_field($this->field);
        $this->pagination_bas->set_table('v_formpenerimaan');
        $this->pagination_bas->set_paging($_POST,5,$page);
        $this->pagination_bas->generate_table_data();
        //end---pagination
    }

    public function save()
    {
        //validasi form
        $validation_config =array(
            array(
                'field' => 'no_surat',
                'label' => 'No. Surat',
                'rules' => 'required'
            ),
            array(
                'field' => 'date',
                'label' => 'Tanggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'dari',
                'label' => 'Dari',
                'rules' => 'required'
            ),
            array(
                'field' => 'perihal',
                'label' => 'Perihal',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_kegiatan',
                'label' => 'Nama Kegiatan',
                'rules' => 'required'
            ),array(
                'field' => 'diteruskan',
                'label' => 'Diteruskan Kepada',
                'rules' => 'required'
            ),array(
                'field' => 'date_pelaksanaan',
                'label' => 'Tanggal Pelaksanaan',
                'rules' => 'required'
            )
        );
        
        $this->form_validation->set_rules($validation_config);
        
        //jalanin validasinya
        if($this->form_validation->run()){
        //jika tidak ada file maka $_FILES kosong/null
            $file = ($_FILES['lampiran']!=''||$_FILES['lampiran']!=null)?$_FILES:null;
            $result = $this->m_surat_masuk->insert($_POST,$file);
            
        }else{
            $result['status'] = 0;
            
            $result['validation_message'] = validation_errors();
            foreach($validation_config as $arr_valid){
                $result['validation_error'][$arr_valid['field']] = form_error($arr_valid['field']);
            }
        }
        
        //notification for all
        $this->notification->set_table('t_pegawai');
        $this->notification->set_field_email('email');
        $this->notification->set_field_phone('no_handphone');
        $this->notification->set_field_id('id_pegawai');
        $this->notification->set_message_email('
            hello world
        ');
        $this->notification->set_message_sms('
            hello world
        ');
        $this->notification->set_subject($_POST['disposisi']);
        $this->notification->set_my_email('arisbaskoro@localhost.com');
        $this->notification->set_sending($_POST['diteruskan']);
        $this->notification->send();
        
        echo json_encode($result);
    }
	
    public function delete($id){
        $this->m_surat_masuk->delete($id);
        echo $id;
    }
    
    public function update()
    {
        //validasi form
        $validation_config =array(
            array(
                'field' => 'no_surat',
                'label' => 'No. Surat',
                'rules' => 'required'
            ),
            array(
                'field' => 'date',
                'label' => 'Tanggal',
                'rules' => 'required'
            ),
            array(
                'field' => 'dari',
                'label' => 'Dari',
                'rules' => 'required'
            ),
            array(
                'field' => 'perihal',
                'label' => 'Perihal',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_kegiatan',
                'label' => 'Nama Kegiatan',
                'rules' => 'required'
            ),array(
                'field' => 'diteruskan',
                'label' => 'Diteruskan Kepada',
                'rules' => 'required'
            ),array(
                'field' => 'date_pelaksanaan',
                'label' => 'Tanggal Pelaksanaan',
                'rules' => 'required'
            )
        );
        
        $this->form_validation->set_rules($validation_config);
        
        //jalanin validasinya
        if($this->form_validation->run()){
        //jika tidak ada file maka $_FILES kosong/null
            $file = ($_FILES['lampiran']!=''||$_FILES['lampiran']!=null)?$_FILES:null;
            $result = $this->m_surat_masuk->insert($_POST,$file);
            
        }else{
            $result['status'] = 0;
            
            $result['validation_message'] = validation_errors();
            foreach($validation_config as $arr_valid){
                $result['validation_error'][$arr_valid['field']] = form_error($arr_valid['field']);
            }
        }
        
        echo json_encode($result);
    }
}
