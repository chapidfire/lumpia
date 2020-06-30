<?php

class kategori extends CI_Controller {

    public function goreng()
    {
        $data['goreng'] = $this->model_kategori->data_goreng()->result();
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('goreng', $data);
		$this->load->view('templates/footer');
    }
    public function basah()
        {
            $data['basah'] = $this->model_kategori->data_basah()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('basah', $data);
            $this->load->view('templates/footer');
        }



}
