<?php

class uplodfile{
    var $fname;
    var $ftype;
    var $fsize;
    var $fsavetmp;
    var $ferror;
    private $limit = 0;
    private $type = '';
    private $ftmpdir = '';


    public function set_file($file){
        $this->fname = $file['name'];
        $this->ftype = $file['type'];
        $this->fsize = $file['size'];
        $this->fsavetmp = $file['tmp_name'];
    }

    public function set_dir($dir){
        $this->ftmpdir = $dir;
    }

    public function set_size_limit($limit){
        $this->limit = $limit;
    }

    public function set_type($type){
        $this->type = explode(',',trim($type));
    }

    public function set_name($name){
        $this->fname = $name;
    }

    public function get_fullpath(){
        return $this->ftmpdir.'/'.$this->fname;
    }

    public function get_name(){
        return $this->fname();
    }

    public function do_upload(){
        try{
            if($this->type!=''){
                if(!in_array($this->ftype, $this->type)){
                    echo "<script>alert('File type harus berupa (\"".implode(',',$this->type ).".\"))</script>";
                    return FALSE;
                }
            }

            if($this->limit>$this->fsize){
                echo "<script>alert('Besar file tidak boleh lebih dari $this->limit.')</script>";
                return FALSE;
            }

            if ($this->ftmpdir=='') {
                echo "<script>alert('Direktori tidak ditemukan.')</script>";
                return FALSE;
            }

            if (file_exists($this->get_fullpath())) {
                echo "<script>alert('file gambar sudah ada.')</script>";
                return FALSE;
            }


            if(!$sukses = move_uploaded_file($this->fsavetmp,$this->get_fullpath() )){
                echo "<script>alert('File gagal di upload.')</script>";
            }else{
                echo "<script>alert('File Berhasil di upload.')</script>";
            }
            //echo "<script>alert('berhasil')</script>";
        }catch(Exception $e){
            echo "<script>alert('$e')</script>";
        }
    }
}

?>