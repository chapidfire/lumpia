<?php
class model_kategori extends CI_Model{
    public function data_goreng(){
   return     $this->db->get_where("tb_lumpia",array('kategori'=>'goreng') );
    }
    public function data_basah(){
        return     $this->db->get_where("tb_lumpia",array('kategori'=>'basah') );
    }

}