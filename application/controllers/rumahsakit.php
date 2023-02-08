<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumahsakit extends CI_Controller{

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
		$data['tb_rumkit'] = $this->m_rumkit->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('rumahsakit', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('rumahsakit');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$namarumkit			= $this->input->post('namarumkit');
		$alamatrumkit		= $this->input->post('alamatrumkit');
		$notelp				= $this->input->post('notelp');
		$jadwalbuka			= $this->input->post('jadwalbuka');
		$jamoperasional		= $this->input->post('jamoperasional');
		$lat				= $this->input->post('lat');
		$long				= $this->input->post('long');

		$data = array(
			'namarumkit'		=> $namarumkit,
			'alamatrumkit'		=> $alamatrumkit,
			'notelp'			=> $notelp,
			'jadwalbuka'		=> $jadwalbuka,
			'jamoperasional'	=> $jamoperasional,
			'lat'				=> $lat,
			'long'				=> $long
		);

		$this->m_rumkit->input_data($data, 'tb_rumkit');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil ditambahkan!</div>');
		redirect('rumahsakit');
	}

	public function hapus($idRumkit)
	{
		$where = array ('idRumkit' => $idRumkit);
		$this->m_rumkit->hapus_data($where, 'tb_rumkit');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('rumahsakit');
	}

	public function edit($idRumkit){
		$where = array('idRumkit' => $idRumkit);
		$data['tb_rumkit'] = $this->m_rumkit->edit_data($where, 'tb_rumkit')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editrumkit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$idRumkit 			= $this->input->post('idRumkit');
		$namarumkit			= $this->input->post('namarumkit');
		$alamatrumkit		= $this->input->post('alamatrumkit');
		$notelp				= $this->input->post('notelp');
		$jadwalbuka			= $this->input->post('jadwalbuka');
		$jamoperasional		= $this->input->post('jamoperasional');
		$lat				= $this->input->post('lat');
		$long				= $this->input->post('long');

		$data = array(
			'namarumkit'		=> $namarumkit,
			'alamatrumkit'		=> $alamatrumkit,
			'notelp'			=> $notelp,
			'jadwalbuka'		=> $jadwalbuka,
			'jamoperasional'	=> $jamoperasional,
			'lat'				=> $lat,
			'long'				=> $long
		);

		$where = array(
			'idRumkit' => $idRumkit
		);

		$this->m_rumkit->update_data($where, $data, 'tb_rumkit');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('rumahsakit');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['tb_rumkit'] = $this->m_rumkit->get_keyword($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('rumahsakit', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}