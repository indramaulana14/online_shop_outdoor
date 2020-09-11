<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Produk extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		// Proteksi halaman 
		$this->simple_login->cek_login();
	}

	//Data Produk
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title'		=> 'Data Produk',
						'produk'	=> $produk,
						'isi'		=> 'admin/produk/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah produk
	public function tambah()
	{
		// Ambil data kategori
		$kategori = $this->kategori_model->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk','Nama Produk','required',
			array( 'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode Produk','required|is_unique[produk.kode_produk]',
			array( 'required'		=> '%s harus diisi',
				   'is_unique'		=> '%s sudah ada. Buat kode produk baru'));

		if($valid->run()) {
			$config['upload_path']		= './asssets/uploads/image/';
			$config['allowed_types']	= '.gif|jpg|png|jpeg';
			$config['max_size']			= '.2400';
			$config['max_width']		= '.2024';
			$config['max_height']		= '.2024';
			$config['thumb_marker']		= '';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){			
		// End validasi

		$data = array(	'title'		=> 'Tambah Produk',
						'kategori'	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// Create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image']	 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create thumbnail

			$i = $this->input;
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'id_kategori'		=> $i->post('id_kategori'),
							'kode_produk'		=> $i->post('kode_produk'),
							'nama_produk'		=> $i->post('nama_produk'),
							'slug_produk'		=> $slug_produk,
							'keterangan'		=> $i->post('keterangan'),
							'keywords'			=> $i->post('keywords'),
							'harga'				=> $i->post('harga'),
							'stok'				=> $i->post('stok'),
							// Disimpan nama file gambar
							'gambar'			=> $upload_gambar['upload_data']['file_name'],
							'berat'				=> $i->post('berat'),
							'ukuran'			=> $i->post('ukuran'),
							'status_produk'		=> $i->post('status_produk'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}}
		//End masuk database
		$data = array(	'title'		=> 'Tambah Produk',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit produk
	public function edit($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk','Nama Produk','required',
			array( 'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array( 'required'		=> '%s harus diisi',
				   'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('password','password','required',
			array( 'required'		=> '%s harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Produk',
						'produk'	=> $produk,
						'isi'		=> 'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_produk'		=> $id_produk,
							'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'produkname'	=> $i->post('produkname'),
							'password'		=> SHA1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}
		//End masuk database
	}

	// Delete produk
	public function delete($id_produk)
	{
		$data = array('id_produk' => $id_produk);
		$this->produk_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/produk'),'refresh');
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */