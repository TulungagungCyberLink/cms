<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
		$this->load->model('m_kas');
	}

	public function index($id=1){
		$data = array('nominal' => $this->m_data->config('default_kas'));
		$this->load->view('admin/kas/dashboard.php', $data);
	}

	public function data(){
		if($this->input->is_ajax_request()){

			$this->load->library('ssp');

			$table = 'kas_checkpoint';
			$primaryKey = 'id_kas';
			$columns = array(
				array('db' => 'id_kas', 'dt' => 0),
				array(
					'db' => 'date', 
					'dt' => 1,
					'formatter' => function($d, $row){
						return fix_date($d);
					}
				),
				array(
					'db' => 'amount', 
					'dt' => 2,
					'formatter' => function($d, $row){
						return idr($d);
					}
				),
				array(
					'db' => 'id_kas', 
					'dt' => 3,
					'formatter' => function($d, $row){
						return $this->m_kas->total_unpaid($d)." Orang";
					}
				),
				array(
					'db' => 'id_kas', 
					'dt' => 4,
					'formatter' => function($d, $row){
						return '<a href="'.base_url("admin/kas/cetak/$d").'" class="btn btn-success"><i class="fa fa-print"></i></a> <a href="'.base_url("admin/kas/lihat/$d").'" class="btn btn-primary"><i class="fa fa-eye"></i></a> <a href="'.base_url("admin/kas/hapus/$d").'" class="btn btn-danger" onclick="return window.confirm(\'Apakah kamu yakin? Menghapus checkpoint kas berarti juga menghapus data pembayaran yang telah ada\')"><i class="fa fa-trash"></i></a>';
					}
				)
			);

			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
			);

			echo json_encode(
				SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
			);
		}
		else{
			show_404();
		}
	}

	public function lihat($id){
		$data['kas'] = $this->m_kas->info($id);
		if(!empty($data)){
			$data['unpaid'] = $this->m_kas->get_unpaid($id);
			$data['paid'] = $this->m_kas->get_paid($id);
			$this->load->view('admin/kas/lihat.php', $data);
		}
		else{
			$this->session->set_flashdata('error', 'Cekpoint kas tidak ditemukan');
			redirect('admin/kas');
		}
	}
	
	public function bayar($kas=null, $member=null){
		$where = array(
			'id_member' => $member,
			'id_kas' => $kas,
			'status' => 0
		);
		$data = array('status' => '1');
		$this->m_data->update($where, $data, 'kas_detail');
		$this->session->set_flashdata('success', 'Transaksi berhasil');
		redirect('admin/kas/lihat/'.$kas);
	}

	public function reverse($kas=null, $member=null){
		$where = array(
			'id_member' => $member,
			'id_kas' => $kas,
			'status' => 1
		);
		$data = array('status' => '0');
		$this->m_data->update($where, $data, 'kas_detail');
		$this->session->set_flashdata('success', 'Transaksi berhasil');
		redirect('admin/kas/lihat/'.$kas);
	}

	public function tambah(){
		$this->load->library('form_validation');
		if($this->form_validation->run('ADM.tambah_kas')){
			$data = array(
				'date' => date_now(),
				'amount' => $this->input->post('amount')
			);
			$id = $this->m_data->insert($data, 'kas_checkpoint');
			redirect('admin/kas/lihat/'.$id);
		}
		else{
			$this->session->set_flashdata('error', 'Gagal membuat cekpoin kas');
			redirect('admin/kas');
		}
	}

	public function hapus($id){
		$where = array('id_kas' => $id);
		$this->m_data->delete($where, 'kas_checkpoint');
		$this->session->set_flashdata('success', 'Cekpoin kas berhasil berhasil dihapus');
		redirect('admin/kas');
	}

	public function cetak($cetak=null){
		if(is_null($cetak)){
			$where = array('1=1');
		}
		else{
			$where = array('kas_checkpoint.id_kas' => $cetak);
		}

		$data = $this->m_kas->get_print($where);

		$this->load->library('fpdf/fpdf');

		$pdf = new FPDF();
		if(count($data) > 0){
			$pdf->SetSubject('Kas TCL '.fix_date($data[0]['date']).' - '.fix_date($data[count($data)-1]['date']));
			$pdf->SetTitle('Kas TCL '.fix_date($data[0]['date']).' - '.fix_date($data[count($data)-1]['date']));
			$pdf->SetAuthor('Tulungagung Cyber Link');
			$pdf->SetCreator('MYXZLPLTK');
			foreach($data as $row){
				/* Membuat Header Tabel */
				$pdf->AddPage('P', 'A4');
				$pdf->SetFont('Arial','I',8);
				$pdf->Cell(100, 10, 'Generated from Tulungagung Cyber Link server on '.fix_datetime(date('Y-m-d H:i:s')), 0, 1, 'L');
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(0, 6, 'Tanggal : '.fix_date($row['date']), 0, 1, 'L');
				$pdf->Cell(0, 6, 'Nominal : '.idr($row['amount']), 0, 1, 'L');
				$pdf->Ln();

				/* Membuat Header Tabel */
				$pdf->SetFont('Arial', '', 10);
				$pdf->Cell(10, 8, 'No.', 1, 0, 'R');
				$pdf->Cell(135, 8, 'Nama', 1, 0, 'L');
				$pdf->Cell(40, 8, 'Status', 1, 0, 'C');
				$pdf->Ln();

				$no = 1;
				foreach($row['payment'] as $p){
					$pdf->SetFont('Arial', '', 10);
					$pdf->Cell(10, 6, $no++, 1, 0, 'R');
					$pdf->Cell(135, 6, $p['nickname'], 1, 0, 'L');
					if($p['status'] == 1){
						$pdf->setTextColor(0, 0, 255);
						$pdf->Cell(40, 6, 'YA', 1, 0, 'C');
					}
					else{
						$pdf->setTextColor(255, 0, 0);
						$pdf->Cell(40, 6, 'TIDAK', 1, 0, 'C');
					}
					$pdf->setTextColor(0, 0, 0);
					$pdf->Ln();
				}
			}
		}
		else{
			$pdf->AddPage('P', 'A4');
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(0, 10, 'NO DATA', 0, 1, 'C');
		}

		$pdf->Output('D', 'Kas TCL '.fix_date($data[0]['date']).' - '.fix_date($data[count($data)-1]['date']).'.pdf');
		exit();
	}

	/* MEMBER */

	public function data_member(){
		if($this->input->is_ajax_request()){

			$this->load->library('ssp');

			$table = 'kas_member';
			$primaryKey = 'id_member';
			$columns = array(
				array('db' => 'nickname', 'dt' => 0),
				array(
					'db' => 'id_member', 
					'dt' => 1,
					'formatter' => function($d, $row){
						$data = $this->m_kas->get_member_kas($d);
						$output = '-';
						if(count($data)>0){
							$output = '';
							foreach ($data as $d) {
								$output .= '<a href="'.base_url('admin/kas/lihat/'.$d->id_kas).'" class="label label-primary">'.fix_date($d->date).'</a>';
							}
						}
						return $output;
					}
				),
				array(
					'db' => 'id_member', 
					'dt' => 2,
					'formatter' => function($d, $row){
						return '<a href="#" class="btn btn-warning edit" data-id="'.$d.'"><i class="fa fa-edit"></i></a> <a href="#" class="btn btn-danger delete" data-id="'.$d.'"><i class="fa fa-trash"></i></a>';
					}
				)
			);
			$where = "status IS NULL";

			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
			);

			echo json_encode(
				SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
			);
		}
		else{
			show_404();
		}
	}

	public function tambah_member(){
		$this->load->library('form_validation');
		if($this->input->is_ajax_request() && $this->form_validation->run('ADM.tambah_member_kas')){
			$data['nickname'] = $this->input->post('nickname');
			$output = array(
				'status' => true,
				'id' => $this->m_data->insert($data, 'kas_member')
			);
			echo json_encode($output);
		}
		else{
			show_404();
		}
	}

	public function hapus_member(){
		$this->load->library('form_validation');
		if($this->input->is_ajax_request() && $this->form_validation->run('ADM.hapus_member_kas')){
			$where = array('id_member' => $this->input->post('id'));
			$data = array('status' => '1');
			$output = array(
				'status' => true,
				'id' => $this->m_data->update($where, $data, 'kas_member'),
			);
			echo json_encode($output);
		}
		else{
			show_404();
		}
	}

	public function edit_member(){
		$this->load->library('form_validation');
		if($this->input->is_ajax_request() && $this->form_validation->run('ADM.edit_member_kas')){
			$where = array('id_member' => $this->input->post('id'));
			$data = array('nickname' => $this->input->post('nickname'));
			$output = array(
				'status' => true,
				'id' => $this->m_data->update($where, $data, 'kas_member'),
			);
			echo json_encode($output);
		}
		else{
			show_404();
		}
	}
}
