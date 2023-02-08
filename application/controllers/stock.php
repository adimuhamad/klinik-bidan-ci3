<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Login Terlebih Dahulu
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>!</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['tb_stock'] = $this->m_stock->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('stock', $data);
		$this->load->view('templates/footer');
	}

	

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('obat');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
	include "koneksi.php";

	$tb_obat	= $this->input->post('namaobat');
	$jumlah		= $this->input->post('jumlah');

	$insert = mysqli_query($mysqli, "insert into tb_stock set idObat='$tb_obat', jumlah='$jumlah', tanggal=now()  ");
	if($insert){
	    mysqli_query($mysqli, "update tb_obat set stock=stock+$jumlah where idObat='$tb_obat' ");
	    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Stock telah berhasil ditambahkan!</div>');
	    redirect ('stock');
		}

	}

	public function hapus ($idStock)
	{
		$where = array ('idStock' => $idStock);
		$this->m_stock->hapus_data($where, 'tb_stock');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('stock');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['tb_stock'] = $this->m_stock->get_keyword($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('stock', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
}