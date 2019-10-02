<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$data['member'] = $this->m_data->get_member()->result();
		$this->load->view('admin/member', $data);
	}

	public function add(){
		$this->load->library('form_validation');
		if($this->form_validation->run('ADM.add_member') == FALSE){
			$data['role'] = $this->m_data->get('role')->result();
			$this->load->view('admin/add_member', $data);
		}
		else{
			$data = array(
				'nickname' => $this->input->post('nickname'),
				'id_role' => $this->input->post('role')
			);

			$config = array(
				'file_name' => time(),
				'upload_path' => './uploads/',
				'allowed_types' => 'gif|png|jpg',
				'max_size' => 4096
			);

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				$data['image'] = null;
			}
			else{
				$gbr = $this->upload->data();
				$data['image'] = $gbr['file_name'];

				$resize = array(
					'image_library' => 'gd2',
					'source_image' => './uploads/'.$gbr['file_name'],
					'maintain_ratio' => true,
					'width' => 500,
					'height' => 500,
					'quality' => 75
				);

				$this->load->library('image_lib', $resize);
				$this->image_lib->resize();
			}
			if($this->m_data->insert($data, 'member') != 0){
				$this->session->set_flashdata('success', 'Data berhasil di tambahkan');
			}
			else{
				$this->session->set_flashdata('error', 'Data gagal di tambahkan');
			}
			redirect('admin/member');
		}
	}

	public function delete($id=null){
		$where = array('id_member' => $id);
		$member = $this->m_data->get_where($where, 'member')->row();
		if(!empty($member)){
			if($this->m_data->delete($where, 'member')){
				if(!empty($member->image)){
					unlink('./uploads/'.$member->image);
				}
				$this->session->set_flashdata('success', 'Data berhasil dihapus');
			}
			else{
				$this->session->set_flashdata('error', 'Data gagal dihapus');
			}
		}
		else{
			$this->session->set_flashdata('error', 'Data member tidak ditemukan');
		}
		redirect('admin/member');
	}
}
