<?php

class data_lumpia extends CI_Controller {
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '1'){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('auth/login');

        }
}

	public function index()
	{
        $data['lumpia'] = $this->model_lumpia->tampil_data()->result(); 
        $this->load->view('templates_admin/header'); 
        $this->load->view('templates_admin/sidebar'); 
        $this->load->view('admin/data_lumpia', $data);
        $this->load->view('templates_admin/footer'); 
    }
    public function tambah_aksi()
    {
        $nama_lumpia    =$this->input->post('nama_lumpia');
        $keterangan    =$this->input->post('keterangan');
        $kategori    =$this->input->post('kategori');
        $harga    =$this->input->post('harga');
        $stok    =$this->input->post('stok');
        $gambar    =$_FILES['gambar']['name'];
        if ($gambar =''){}else{
            $config ['upload_path'] ='./uploads';
            $config ['allowed_types'] ='jpg|jpeg|png|gif';
            
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('gambar'))
            {
                echo "gambar gagal di upload !";
            }
            else
            {
                $gambar=$this->upload->data('file_name');
            }
        }
        $data=array 
        (
            'nama_lumpia'       => $nama_lumpia,
            'keterangan'       => $keterangan,
            'kategori'       => $kategori,
            'harga'       => $harga,
            'stok'       => $stok,
            'gambar'       => $gambar,
        );
        $this->model_lumpia->tambah_lumpia($data,'tb_lumpia');
        redirect('admin/data_lumpia/index');
    }
	public function edit($id)
	{
        $where = array('id_lumpia'=>$id);
        $data ['lumpia'] = $this->model_lumpia->edit_lumpia($where,'tb_lumpia')->result();
        $this->load->view('templates_admin/header'); 
        $this->load->view('templates_admin/sidebar'); 
        $this->load->view('admin/edit_lumpia', $data);
        $this->load->view('templates_admin/footer'); 
    }

    public function update()
	{
        $id             =$this->input->post('id_lumpia');
        $nama_lumpia    =$this->input->post('nama_lumpia');
        $keterangan     =$this->input->post('keterangan');
        $kategori       =$this->input->post('kategori');
        $harga          =$this->input->post('harga');
        $stok           =$this->input->post('stok');
       
        $data=array 
        (
            'nama_lumpia'       => $nama_lumpia,
            'keterangan'       => $keterangan,
            'kategori'       => $kategori,
            'harga'       => $harga,
            'stok'       => $stok,      
        );
        $where = array('id_lumpia'=>$id);
        $this->model_lumpia->update_data($where,$data,'tb_lumpia');
        redirect('admin/data_lumpia/index');
    }
    public function hapus($id)
	{
        $where = array('id_lumpia'=>$id);
        $this->model_lumpia->hapus_lumpia($where,'tb_lumpia');
        redirect('admin/data_lumpia/index');
       
    }
}