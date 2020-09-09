<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Home extends CI_Controller {

	//Halaman Utama Website - Homepage
	public function index()
	{
		$data = array( 'title'   => 'sasakala outdoor - Toko Online',
					   'isi'	 => 'home/list'
					   );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */