<?php
class model_lumpia extends CI_Model {
    public function tampil_data(){
        return $this->db->get('tb_lumpia');

    }

    public function tambah_lumpia($data,$table){
        $this->db->insert($table,$data);

    }
    public function edit_lumpia($where,$table){
      return $this->db->get_where($table,$where);

    }
    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
  
      }
    public function hapus_lumpia($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
  
      }
    public function find($id)
    {
        $result = $this->db->where('id_lumpia',$id)
                        ->limit(1)
                        ->get('tb_lumpia');
        if($result->num_rows() > 0 ){
                return $result->row();
        }else{
            return array();
        }
    }

    public function detail_lumpia($id_lumpia)
    {
        $result = $this->db->where('id_lumpia',$id_lumpia)
                        ->get('tb_lumpia');
        if($result->num_rows() > 0 ){
                return $result->result();
        }else{
            return false();
        }
    }
}