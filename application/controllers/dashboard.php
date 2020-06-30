<?php

class dashboard extends CI_Controller
{


	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		} else {
			echo "Maaf, Pesanan Anda Gagal Diproses !";
		}
	}
	public function tambah_ke_keranjang($id)
	{
		$lumpia = $this->model_lumpia->find($id);
		$data = array(
			'id'      => $lumpia->id_lumpia,
			'qty'     => 1,
			'price'   => $lumpia->harga,
			'name'    => $lumpia->nama_lumpia,

		);

		$this->cart->insert($data);
		redirect('welcome');
	}
	public function detail_keranjang()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}
	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome');
	}
	public function detail($id_lumpia)
	{
		$data['lumpia'] = $this->model_lumpia->detail_lumpia($id_lumpia);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_lumpia', $data);
		$this->load->view('templates/footer');
	}
	public function daftar_lumpia()
	{
		$data['lumpia'] = $this->model_lumpia->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('daftar_lumpia', $data);
		$this->load->view('templates/footer');
	}

	public function kontak_info()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kontak_info');
		$this->load->view('templates/footer');
	}
}
