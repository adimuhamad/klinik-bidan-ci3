<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller{

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
		$data['tb_obat'] = $this->m_obat->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('obat', $data);
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
		$namaobat	= $this->input->post('namaobat');
		$jenisobat	= $this->input->post('jenisobat');
		$hargamodal	= $this->input->post('hargamodal');
		$hargajual	= $this->input->post('hargajual');
		$stock		= $this->input->post('stock');

		$data = array(
			'namaobat'		=> $namaobat,
			'jenisobat'		=> $jenisobat,
			'hargamodal'	=> $hargamodal,
			'hargajual'		=> $hargajual,
			'stock'			=> $stock,
		);

		$this->m_obat->input_data($data, 'tb_obat');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil ditambahkan!</div>');
		redirect('obat');
	}

	public function hapus ($idObat)
	{
		$where = array ('idObat' => $idObat);
		$this->m_obat->hapus_data($where, 'tb_obat');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('obat');
	}

	public function edit ($idObat){
		$where = array('idObat' => $idObat);
		$data['tb_obat'] = $this->m_obat->edit_data($where, 'tb_obat')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editobat', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$idObat = $this->input->post('idObat');
		$namaobat = $this->input->post('namaobat');
		$jenisobat = $this->input->post('jenisobat');
		$hargamodal = $this->input->post('hargamodal');
		$hargajual = $this->input->post('hargajual');
		$stock = $this->input->post('stock');

		$data = array(
			'namaobat'		=> $namaobat,
			'jenisobat'		=> $jenisobat,
			'hargamodal'	=> $hargamodal,
			'hargajual'		=> $hargajual,
			'stock'			=> $stock,
		);

		$where = array(
			'idObat' => $idObat
		);

		$this->m_obat->update_data($where, $data, 'tb_obat');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('obat');
	}

	public function detail($idObat)
	{
		$this->load->model('m_obat');
		$detail = $this->m_obat->detail_data($idObat);
		$data['detail'] =  $detail;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('templates/footer');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['tb_obat'] = $this->m_obat->get_keyword($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('obat', $data);
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function print_data()
	{
		$data['obat'] = $this->m_obat->tampil_data('tb_obat')->result();
		$this->load->view('print_obat', $data);
		
	}

	public function print_pdf()
	{
		require_once("application/third_party/dompdf/dompdf_config.inc.php");
        $dompdf = new DOMPDF();

		$this->load->library('dompdf_gen');

		$data['obat'] = $this->m_obat->tampil_data('tb_obat')->result();

		$this->load->view('laporan_pdf', $data);

		$paper_size = 'A4';
		$orientation ='portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("data_obat.pdf", array('Attachment' => 0));
	}

	public function print_excel(){
		include "koneksidua.php";

		require_once 'application/third_party/PHPExcel/PHPExcel.php';

		$excel = new PHPExcel();

		$excel->getProperties()->setCreator('Admin')
		             ->setLastModifiedBy('Admin')
		             ->setTitle("Data Obat")
		             ->setSubject("Obat")
		             ->setDescription("Daftar Semua Data Obat")
		             ->setKeywords("Data Obat");

		$style_col = array(
		  'font' => array('bold' => true),
		  'alignment' => array(
		    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array(
		    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);

		$style_row = array(
		  'alignment' => array(
		    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array(
		    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA OBAT");
		$excel->getActiveSheet()->mergeCells('A1:F1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA OBAT");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "JENIS OBAT");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "HARGA MODAL");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "HARGA JUAL");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "STOCK");

		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

		$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
		$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
		$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

		$sql = $pdo->prepare("SELECT * FROM tb_obat");
		$sql->execute();

		$no = 1;
		$numrow = 4;
		while($data = $sql->fetch()){
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['namaobat']);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['jenisobat']);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['hargamodal']);  
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['hargajual']);  
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['stock']);
		  
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  
		  $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
		  
		  $no++;
		  $numrow++;
		}

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);

		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

		$excel->getActiveSheet(0)->setTitle("Daftar Data Obat");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Obat.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}