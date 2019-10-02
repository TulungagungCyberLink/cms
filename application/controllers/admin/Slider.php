<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$data['slider'] = $this->m_data->get_slider()->result();
		$this->load->view('admin/slider', $data);
	}

	public function add(){
		$this->load->library('form_validation');
		if($this->form_validation->run('ADM.add_slider') == FALSE){
			$this->load->view('admin/add_slider');
		}
		else{
			$data = array(
				'isi_slider_text' => $this->input->post('isi_slider_text')
			);

			if($this->m_data->insert($data, 'slider_text') != 0){
				$this->session->set_flashdata('success', 'Data berhasil di tambahkan');
			}
			else{
				$this->session->set_flashdata('error', 'Data gagal di tambahkan');
			}
			redirect('admin/slider');
		}
	}

	public function delete($id=null){
		$where = array('id_slider_text' => $id);
		if($this->m_data->delete($where, 'slider_text')){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		else{
			$this->session->set_flashdata('error', 'Data gagal dihapus');
		}
		redirect('admin/slider');
	}
}
