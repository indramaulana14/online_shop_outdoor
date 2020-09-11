<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all kategori 
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kategori ');
		$this->db->order_by('id_kategori ', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail kategori 
	public function detail($id_kategori )
	{
		$this->db->select('*');
		$this->db->from('kategori ');
		$this->db->where('id_kategori ', $id_kategori );
		$this->db->order_by('id_kategori ', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login kategori 
	public function login($kategori,$password)
	{
		$this->db->select('*');
		$this->db->from('kategori ');
		$this->db->where(array( 'kategori name'	=> $kategori,
								'password'	=> SHA1($password)));
		$this->db->order_by('id_kategori ', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//Tambah
	public function tambah($data)
	{
		$this->db->insert('kategori ', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori',$data);
	}

}

/* End of file Kategori _model.php */
/* Location: ./application/models/kategori _model.php */
