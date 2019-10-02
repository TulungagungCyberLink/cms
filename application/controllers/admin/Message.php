<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){

		$config['base_url'] = base_url('admin/message/index');
		$config['total_rows'] = $this->m_data->count('message');
		$config['per_page'] = $this->config->item('limit_pagination');

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data['from'] = $this->uri->segment(4);

		$data['message'] = $this->m_data->get_message($config['per_page'], $data['from'])->result();
		if($data['from'] < 1){
			$data['from'] = 1;
		}
		$this->load->view('admin/message', $data);
	}

	public function delete($id=null){
		if(is_null($id)){
			$where = '1=1';
		}
		else{
			$where = array('id_message' => $id);
		}
		if($this->m_data->delete($where, 'message')){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		else{
			$this->session->set_flashdata('error', 'Data gagal dihapus');
		}
		redirect('admin/message');
	}
}
