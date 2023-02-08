<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class changelog extends CI_Controller {

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
		$data['tb_changelog'] = $this->m_changelog->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('changelog', $data);
		$this->load->view('templates/footer');
	}

}
