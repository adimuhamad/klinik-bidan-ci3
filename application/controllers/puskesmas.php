<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Puskesmas extends CI_Controller{

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
		$data['tb_pkm'] = $this->m_pkm->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('puskesmas', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('puskesmas');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$namapkm			= $this->input->post('namapkm');
		$alamatpkm			= $this->input->post('alamatpkm');
		$notelp				= $this->input->post('notelp');
		$jadwalbuka			= $this->input->post('jadwalbuka');
		$jamoperasional		= $this->input->post('jamoperasional');
		$lat				= $this->input->post('lat');
		$long				= $this->input->post('long');

		$data = array(
			'namapkm'			=> $namapkm,
			'alamatpkm'			=> $alamatpkm,
			'notelp'			=> $notelp,
			'jadwalbuka'		=> $jadwalbuka,
			'jamoperasional'	=> $jamoperasional,
			'lat'				=> $lat,
			'long'				=> $long
		);

		$this->m_pkm->input_data($data, 'tb_pkm');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil ditambahkan!</div>');
		redirect('puskesmas');
	}

	public function hapus($idPkm)
	{
		$where = array ('idPkm' => $idPkm);
		$this->m_pkm->hapus_data($where, 'tb_pkm');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('puskesmas');
	}

	public function edit($idPkm){
		$where = array('idPkm' => $idPkm);
		$data['tb_pkm'] = $this->m_pkm->edit_data($where, 'tb_pkm')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editpkm', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$idPkm 				= $this->input->post('idPkm');
		$namapkm			= $this->input->post('namapkm');
		$alamatpkm			= $this->input->post('alamatpkm');
		$notelp				= $this->input->post('notelp');
		$jadwalbuka			= $this->input->post('jadwalbuka');
		$jamoperasional		= $this->input->post('jamoperasional');
		$lat				= $this->input->post('lat');
		$long				= $this->input->post('long');

		$data = array(
			'namapkm'			=> $namapkm,
			'alamatpkm'			=> $alamatpkm,
			'notelp'			=> $notelp,
			'jadwalbuka'		=> $jadwalbuka,
			'jamoperasional'	=> $jamoperasional,
			'lat'				=> $lat,
			'long'				=> $long
		);

		$where = array(
			'idPkm' => $idPkm
		);

		$this->m_pkm->update_data($where, $data, 'tb_pkm');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('puskesmas');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['tb_pkm'] = $this->m_pkm->get_keyword($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('puskesmas', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}