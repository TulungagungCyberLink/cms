<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sc extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$data['members'] = $this->m_data->get_nick_sc()->result();
		$this->load->view('admin/sc', $data);
	}

	public function add(){
		$this->load->library('form_validation');
		if($this->form_validation->run('ADM.add_sc') == FALSE){
			$this->load->view('admin/add_sc');
		}
		else{
			$data = array(
				'nick' => $this->input->post('nickname'),
			);

			if($this->m_data->insert($data, 'nick_sc') != 0){
				$this->session->set_flashdata('success', 'Data berhasil di tambahkan');
			}
			else{
				$this->session->set_flashdata('error', 'Data gagal di tambahkan');
			}
			redirect('admin/sc');
		}
	}

	public function delete($id=null){
		$where = array('id_nick' => $id);
		$member = $this->m_data->get_where($where, 'nick_sc')->row();
		if(!empty($member)){
			if($this->m_data->delete($where, 'nick_sc')){
				$this->session->set_flashdata('success', 'Data berhasil dihapus');
			}
			else{
				$this->session->set_flashdata('error', 'Data gagal dihapus');
			}
		}
		else{
			$this->session->set_flashdata('error', 'Data member tidak ditemukan');
		}
		redirect('admin/sc');
	}

	public function update(){
		$data = $this->input->post('data');
		if(!empty($data)){
			if($this->m_data->update_batch('nick_sc', $data, 'id_nick')){
				echo json_encode(array('status' => 'success'));
			}
			else{
				show_404();
			}
		}
		else{
			show_404();
		}
	}
}
